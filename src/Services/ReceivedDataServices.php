<?php

namespace Phont\Frontend\Services;

class ReceivedDataServices
{
    protected $received = [];

    protected $content = '';

    protected $title = '';

    protected $content_telegram = '';

    protected $arrTitles = [
        'name' => 'Tên',
        'phone' => 'SDT',
        'add' => 'Add',
        'note' => 'Note',
        'email' => 'Email',
        'title' => 'Title',
        'content' => 'Nội dung',
    ];

    public function handle($data)
    {
        $this->received['type'] = $data['type'];
        $this->content = 'Time: '.date('H:i:s d-m-Y');
        $data['title'] = $this->initTitle($data);
        $this->initContentTelegram($data['title']);

        $arrayMeta = [];

        foreach ($data as $key => $value) {
            if (str_starts_with($key, 'meta_')) {
                $newKey = substr($key, strlen('meta_'));
                $arrayMeta[$newKey] = $value;
                $this->updateMetaData($newKey, $value);
            } elseif (isset($this->arrTitles[$key]) && ! empty($value)) {
                $this->updateData($key, $value, $this->arrTitles[$key]);
            }
        }

        $data['received'] = $this->received;
        $data['title'] = $this->title ?? null;
        $data['content_telegram'] = $this->content_telegram ?? null;
        $data['arrayMeta'] = $arrayMeta;

        return $data;
    }

    private function updateMetaData($key, $value)
    {
        $prefix = config('brvreceive.metaTitle')[$key] ?? $key;
        $this->content .= '<br>'.$prefix.': '.$value;
        $this->content_telegram .= '<b>'.$prefix.':</b> '.$value."\n";
    }

    private function updateData($key, $value, $prefix)
    {
        $this->received[$key] = $value;
        $this->content .= '<br>'.$prefix.': '.$value;
        $this->content_telegram .= '<b>'.$prefix.':</b> '.$value."\n";
    }

    private function initTitle($data)
    {
        if (empty($data['title'])) {
            if ($data['type'] == 'contact') {
                $title = 'Mail thông báo liên hệ mới';
            } else {
                $title = 'Thông báo mới';
            }
        } else {
            $title = $data['title'];
        }

        return $title;
    }

    private function initContentTelegram($title)
    {
        $this->content_telegram = sprintf(
            '<b>%s %s </b>%s<b>Time:</b> %s%s',
            config('app.name'),
            $title,
            "\n",
            date('d-m-Y H:i:s'),
            "\n"
        );
    }
}
