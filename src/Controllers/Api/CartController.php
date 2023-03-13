<?php

namespace Phont\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\OptionRepository;
use Phobrv\BrvCore\Repositories\PostRepository;
use Phobrv\BrvCore\Repositories\ReceiveDataRepository;
use Phobrv\BrvCore\Repositories\UserRepository;
use Phobrv\BrvCore\Services\HandleMenuServices;
use Phobrv\BrvCore\Services\NotificationService;
use Phobrv\BrvCore\Services\OptionServices;
use Phobrv\BrvCore\Services\PostServices;
use Phont\Frontend\Services\CartServices;
use Phont\Frontend\Services\NganLuongService;

class CartController extends Controller
{
    protected $postRepository;

    protected $cartService;

    protected $postService;

    protected $receiveDataRepository;

    protected $nganLuongService;

    protected $configs;

    protected $notificationService;

    protected $userRepository;

    public function __construct(
        HandleMenuServices $handleMenuService,
        NotificationService $notificationService,
        OptionServices $optionServices,
        OptionRepository $optionRepository,
        NganLuongService $nganLuongService,
        PostRepository $postRepository,
        PostServices $postService,
        ReceiveDataRepository $receiveDataRepository,
        UserRepository $userRepository,
        CartServices $cartService
    ) {
        $this->userRepository = $userRepository;

        $this->notificationService = $notificationService;
        $this->cartService = $cartService;
        $this->nganLuongService = $nganLuongService;
        $this->postRepository = $postRepository;
        $this->postService = $postService;
        $this->receiveDataRepository = $receiveDataRepository;
        $this->configs = $optionServices->getConfigs($optionRepository->all());
    }

    public function success(Request $request, $order_id)
    {
        $dataRequest = $request->all();
        $data = $this->receiveDataRepository->with('receiveDataMetas')->find($order_id);
        if (empty($data)) {
            return redirect()->route('home');
        }

        if (! empty($dataRequest['payment_id'])) {
            $transaction_info = $dataRequest['transaction_info'];
            $order_code = $dataRequest['order_code'];
            $price = $dataRequest['price'];
            $payment_id = $dataRequest['payment_id'];
            $payment_type = $dataRequest['payment_type'];
            $error_text = $dataRequest['error_text'];
            $secure_code = $dataRequest['secure_code'];
            if ($this->nganLuongService->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code)) {
                $meta_gw = [
                    'gw_transaction_info' => $transaction_info,
                    'gw_order_code' => $order_code,
                    'gw_price' => $price,
                    'gw_payment_id' => $payment_id,
                    'gw_payment_type' => $payment_type,
                    'gw_error_text' => $error_text ?? '',
                    'gw_secure_code' => $secure_code,
                ];
                $data = $this->receiveDataRepository->update(['status' => 2], $order_id);
                $data['meta'] = $this->receiveDataRepository->getMeta($data['receiveDataMetas']);

                $this->receiveDataRepository->insertMeta($data, $meta_gw);
            }
        }
        $data['meta'] = $this->receiveDataRepository->getMeta($data['receiveDataMetas']);
        $data['cart'] = json_decode($data['meta']['cart']);

        return view('phont::frontend.page.checkout.success', ['data' => $data, 'configs' => $this->configs]);
    }

    public function cancel(Request $request, $order_id)
    {
        $data = $this->receiveDataRepository->find($order_id);
        if (! empty($data) && $data->status == 0) {
            $data = $this->receiveDataRepository->update(['status' => '-1'], $order_id);
            $data['meta'] = $this->receiveDataRepository->getMeta($data['receiveDataMetas']);
            $data['cart'] = json_decode($data['meta']['cart']);

            return view('phont::frontend.page.checkout.success', ['data' => $data, 'configs' => $this->configs]);
        } else {
            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        $data = $this->cartService->getCartContent([]);
        $data['meta'] = $this->cartService->genMetaData();

        return view('phont::frontend.page.checkout.index', ['data' => $data, 'configs' => $this->configs]);
    }

    public function addProduct(Request $request)
    {
        try {
            $i = $_REQUEST['id'];
            $qty = $_REQUEST['qty'] ?? 1;
            $option = $_REQUEST['option'] ?? '';
            $p = $this->postRepository->findWhere(['id' => $i])->first();
            if ($p) {
                $meta = $p->meta;
                Cart::add(
                    [
                        'id' => $p->id,
                        'name' => $p->title,
                        'qty' => $qty,
                        'price' => $meta['price'] ?? 0,
                        'weight' => 0,
                        'options' => ['option' => $option, 'img' => $p->thumb, 'url' => route('level1', ['slug' => $p->slug])],
                        'tax' => 0,
                    ]
                );
            }
            $data = $this->cartService->getCartContent([]);
            $modalCart = view('phont::frontend.page.checkout.modalCart', ['data' => $data])->render();

            return response()->json(['count' => Cart::count(), 'modalCart' => $modalCart]);
        } catch (Exception $e) {
            return back()->with('alert_danger', $e->getMessage());
        }
    }

    public function placeOrder(Request $request)
    {
        $data = $request->all();
        $data = $this->cartService->getCartContent($data);
        $data['type'] = 'order';
        $data['content'] = $this->cartService->genCartTableReport($data);
        $data['meta']['fee_ship'] = $data['fee_ship'];
        $data['meta']['price'] = $data['total'] + $data['fee_ship'];
        $data['meta']['qty'] = Cart::count();
        $data['meta']['cart'] = json_encode($data['cart']);
        $data['meta']['pay_method'] = $data['pay_method'];
        $data['meta']['pay_method_label'] = $this->cartService->handlePayMethod($data['pay_method']);
        $data['meta']['order_description'] = $data['order_description'];
        $data['order'] = $order = $this->receiveDataRepository->create($data);
        $this->receiveDataRepository->insertMeta($order, $data['meta']);
        $this->receiveDataRepository->insertCart($order, $data['cart']);
        $this->sentNotifaction($order);
        Cart::destroy();
        if ($data['pay_method'] == 'cod') {
            $response = [
                'code' => 0, // redirect to success page
                'msg' => 'Success',
                'data' => [
                    'order_id' => $order->id,
                ],
            ];
        } elseif ($data['pay_method'] == 'pm_gwnl') {
            $url = $this->nganLuongService->buildBrvCheckoutUrl($data);
            $response = [
                'code' => 1, // redirect to success page
                'msg' => 'Redirect to Ngân Lượng GW',
                'data' => [
                    'redirect' => $url,
                ],
            ];
        }

        return json_encode($response);
    }

    public function postOrder(Request $request)
    {
        $data = $request->all();
        $ck = $this->receiveDataRepository->findWhere(
            [
                'name' => $data['name'],
                'phone' => $data['phone'],
            ]
        )->first();

        if (! $ck) {
            $data['type'] = 'order';
            $data['cart'] = Cart::content();
            $data['content'] = $this->cartService->genCartTableReport($data);
            $data['total'] = $this->cartService->handleSubtotal(Cart::subtotal());

            $data['pay'] = $this->cartService->handleMethodPay($data);
            $data['code'] = rand(1000000, 9999999);
            $data['order'] = $this->receiveDataRepository->create($data);
            Cart::destroy();
            $data['meta'] = $this->cartService->genMetaData();
            // dd($data);
            return view('phont::frontend.page.checkout.success', ['data' => $data, 'configs' => $this->configs]);
        } else {
            return redirect()->route('home');
        }
    }

    public function changeItemNumber(Request $request)
    {
        $rowid = $_REQUEST['rowId'];
        $action = $_REQUEST['action'];
        $item = Cart::get($rowid);
        if ($action == 'minus') {
            Cart::update($rowid, $item->qty - 1);
        } else {
            Cart::update($rowid, $item->qty + 1);
        }
        $out['cartCount'] = Cart::count();
        $out['cart_table'] = $this->cartService->genCartTable($this->cartService->getCartContent([]));

        return $out;

        return $out;
    }

    public function takeCartCount()
    {
        return Cart::count();
    }

    public function removeCart(Request $request)
    {
        $rowId = $_REQUEST['rowId'];
        Cart::remove($rowId);
        $data = $this->cartService->getCartContent([]);
        $out['cartCount'] = Cart::count();
        $out['cart_table'] = $this->cartService->genCartTable($data);

        return $out;
    }

    private function handleSubtotal($total)
    {
        $total = preg_replace("/(\.00)/i", '', $total);
        $total = (int) preg_replace('/(,)/i', '', $total);

        return $total;
    }

    private function sentNotifaction($order)
    {
        $data['title'] = 'Mail thông báo đơn hàng thành công';
        $data['content'] = 'Url admin:'.route('order.edit', ['order' => $order->id]);
        $data['subject'] = config('app.name').' report #'.$order->id;
        $data['tos'] = $this->userRepository->getArrayMailReport();
        $data['content_telegram'] = env('APP_NAME').' thông báo đơn hàng thành công'.
            "\nTime: ".date('H:i:s d-m-Y').
            "\nUrl admin:".route('order.edit', ['order' => $order->id]).
            "\n Tên:".$order->name.
            "\n Phone:".$order->phone.
            "\n Note:".$order->note;
        $this->notificationService->sentNotification($data, $this->configs);
    }
}
