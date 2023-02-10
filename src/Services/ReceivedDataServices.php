<?php

namespace Phont\Frontend\Services;

class ReceivedDataServices
{
    protected $received = [];

    protected $content = '';

    protected $title = '';

    protected $content_telegram = '';

    public function handle($data)
    {
        $this->content = 'Time:  ' . date('H:i:s d-m-Y');
        switch ($data['type']) {
            case 'contact':
                $this->content_telegram = '<b>' . config('app.name') . " thông báo liên hệ mới </b>\n"
                    . '<b>Time:</b>  ' . date('d-m-Y H:i:s') . "\n";
                $this->title = 'Mail thông báo liên hệ mới';
                break;
        }

        $receivedData = ['type' => $data['type'] ?? null];

        $updateData = [
            ['name', 'Tên'],
            ['phone', 'SDT'],
            ['add', 'Add'],
            ['note', 'Note'],
            ['email', 'Email'],
            ['title', 'Title'],
            ['content', 'Nội dung'],
        ];

        foreach ($updateData as $dataPoint) {
            [$field, $label] = $dataPoint;
            if (!empty($data[$field])) {
                $this->updateData($field, $data[$field], $label);
            }
        }

        if (!empty($data['number'])) {
            $data['arrayMeta'] = ['number' => $data['number']];
        }
        $data['received'] = $receivedData;
        $data['title'] = $this->title;
        $data['content_telegram'] = $this->content_telegram;

        return $data;
    }

    private function updateData($key, $value, $prefix)
    {
        $this->received[$key] = $value;
        $this->content .= '<br>' . $prefix . ': ' . $value;
        $this->content_telegram .= '<b>' . $prefix . ':</b> ' . $value . "\n";
    }
}
