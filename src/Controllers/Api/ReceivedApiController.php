<?php

namespace Phont\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\OptionRepository;
use Phobrv\BrvCore\Repositories\ReceiveDataRepository;
use Phobrv\BrvCore\Repositories\UserRepository;
use Phobrv\BrvCore\Services\NotificationService;
use Phobrv\BrvCore\Services\OptionServices;
use Phont\Frontend\Services\ReceivedDataServices;

class ReceivedApiController extends Controller
{
    protected $userRepository;

    protected $receivedService;

    protected $receiveDataRepository;

    protected $configs;

    protected $notificationService;

    public function __construct(NotificationService $notificationService, OptionServices $optionServices, OptionRepository $optionRepository, ReceivedDataServices $receivedService, UserRepository $userRepository, ReceiveDataRepository $receiveDataRepository)
    {
        $this->userRepository = $userRepository;
        $this->notificationService = $notificationService;
        $this->receivedService = $receivedService;
        $this->receiveDataRepository = $receiveDataRepository;
        $this->configs = $optionServices->getConfigs($optionRepository->where('autoload', 'yes')->get());
    }

    public function received(Request $request)
    {
        if ($this->configs['recaptcha_active'] == 1) {
            $request->validate([
                'g-recaptcha-response' => 'required|recaptcha:0.5',
            ]);
        }

        $request->validate([
            'type' => 'required',
        ]);

        $data = $request->all();
        $data = $this->receivedService->handle($data);
        $receive = $this->receiveDataRepository->updateOrcreate($data['received']);
        if (isset($data['arrayMeta'])) {
            $this->receiveDataRepository->updateMeta($receive, $data['arrayMeta']);
        }
        $data['subject'] = config('app.name').' report #'.$receive->id;
        $data['tos'] = $this->userRepository->getArrayMailReport();
        $res = $this->notificationService->sentNotification($data, $this->configs);

        return response()->json('ok');
    }
}
