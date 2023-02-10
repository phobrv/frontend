<?php

namespace Phont\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Services\SendGridService;

class ApiSendMailController extends Controller
{
    protected $sendGridService;

    protected $sentMessenger;

    public function __construct(SendGridService $sendGridService)
    {
        $this->sendGridService = $sendGridService;
    }

    public function SendMail(Request $request)
    {
        $data = $request->all();
        $data['tos'] = json_decode($data['tos'], true);
        $this->sendGridService->sendMail($data);

        return response()->json('Success', 200);
    }

    public function SendMailSmtp(Request $request)
    {
        $data = $request->all();
        $data['tos'] = json_decode($data['tos'], true);
        try {
            Mail::send('emails.layout', ['title' => $data['title'], 'content' => $data['content']], function ($message) use ($data) {
                foreach ($data['tos'] as $value) {
                    $message->to($value, $value)->subject($data['subject']);
                    $message->from(config('mail.from.address'), config('mail.from.name'));
                }
            });
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    // public function sendMess(Request $request)
    // {

    //     $data = $request->all();
    //     $data['link'] = isset($data['link']) ? $data['link'] : "#";
    //     return $this->sentMessenger->sentMess($data['title'], $data['mess'], $data['senderID'], $data['link']);

    // }

    //Use function CallAPI : nutribaby.vn
    public function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }

                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data) {
                    $url = sprintf('%s?%s', $url, http_build_query($data));
                }
        }

        // Optional Authentication:
        // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}
