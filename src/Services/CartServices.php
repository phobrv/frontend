<?php

namespace Phobrv\Frontend\Services;

use Cart;
use Phobrv\BrvCore\Repositories\UserRepository;
use Phobrv\BrvCore\Services\SendGridService;

class CartServices
{
    protected $userRepository;

    protected $freeShipCondition = 600000;

    protected $sendGridService;

    protected $feeShip = 50000;

    public function __construct(
        UserRepository $userRepository,
        SendGridService $sendGridService
    ) {
        $this->userRepository = $userRepository;
        $this->sendGridService = $sendGridService;
    }

    public function getCartContent($data)
    {
        $data['freeShipCondition'] = $this->freeShipCondition;
        $data['cart'] = Cart::content();
        $data['order_description'] = $this->getOrderDesc($data['cart']);
        $data['total'] = $this->handleSubtotal(Cart::subtotal());
        if ($data['total'] >= $data['freeShipCondition']) {
            $data['fee_ship'] = 0;
        } else {
            $data['fee_ship'] = $this->feeShip;
        }

        return $data;
    }

    public function genCartTable($data)
    {
        return view('phont::frontend.page.checkout.table', ['data' => $data])->render();
    }

    public function genCartTableReport($data)
    {
        return view('phont::frontend.page.checkout.table_report', ['data' => $data])->render();
    }

    public function getOrderDesc($cart)
    {
        $out = '';
        foreach ($cart as $p) {
            if ($out != '') {
                $out .= ' + ';
            }

            $out .= $p->qty.' x '.$p->name;
        }

        return $out;
    }

    public function genMetaData()
    {
        $out['meta_title'] = 'Thanh toán đơn hàng';
        $out['meta']['meta_description'] = 'Thanh toán đơn hàng';
        $out['meta']['meta_keywords'] = 'Thanh toán đơn hàng';

        return $out;
    }

    public function handlePayMethod($pay_code)
    {
        switch ($pay_code) {
            case 'cod':
                return 'Thanh toán tiền mặt khi giao hàng';
                break;
            case 'pm_gwnl':
                return 'Thanh toán online cổng ngân lượng';
                break;
            case 'bank':
                return 'Chuyển khoản ngân hàng';
                break;
        }
    }

    public function handleSubtotal($total)
    {
        $total = preg_replace("/(\.00)/i", '', $total);
        $total = (int) preg_replace('/(,)/i', '', $total);

        return $total;
    }
}
