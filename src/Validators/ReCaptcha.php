<?php

namespace Phont\Frontend\Validators;

use GuzzleHttp\Client;

class ReCaptcha
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => env('GOOGLE_RECAPTCHA_V3_SECRET'),
                    'response' => $value,
                ],
            ]
        );
        $body = json_decode((string) $response->getBody());
        $score = $body->score;
        $minScore = $parameters[0] ?? 0.5;
        if ($score < $minScore) {
            return false;
        }

        return $body->success;
    }
}
