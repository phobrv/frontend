<?php

namespace Phont\Frontend\Services;

use KubAT\PhpSimple\HtmlDomParser;

class CommonServices
{
    public function genBreadcrumbsFrontEnd($arrayBread)
    {
        $out = '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="'.route('home').'">
		<span itemprop="name"> '.__('Home').' </span>
		</a>
		<meta itemprop="position" content="1" />
		</li>';
        $index = 1;
        foreach ($arrayBread as $value) {
            $index++;
            $out .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
			<a itemprop="item" href="'.route('level1', ['slug' => $value['slug']]).'">
			<span itemprop="name">'.$value['name'].'</span>
			</a>
			<meta itemprop="position" content="'.$index.'" />
			</li>';
        }

        return $out;
    }

    public function handleLazyloadPost($post)
    {
        $content = $post->content;
        //Add class lazyload
        $content = preg_replace('/(<img)/i', '<img class="lazyload"', $content);
        $content = preg_replace('/(<iframe)/i', '<iframe class="lazyload"', $content);
        //Change src to data-src
        $content = preg_replace('/(src=)/i', 'data-src=', $content);
        $post->content = $content;

        return $post;
    }

    public function handlePostContent($post)
    {
        $content = $post->content;
        if (! empty($content)) {
            $html = HtmlDomParser::str_get_html($content);
            foreach ($html->find('img') as $e) {
                $outertext = $e->outertext;
                $alt = $e->alt;
                $e->class = ($e->class) ? $e->class.' lazyload' : 'lazyload';
                $new_outertext = $e->outertext;
                $new_outertext = preg_replace('/(src=)/i', 'data-src=', $new_outertext);
                if ($alt != '') {
                    $new_outertext = "<div class='img_wrap'>".$new_outertext."<div class='img_alt'>".$alt.'</div>'.'</div>';
                }
                $content = str_replace($outertext, $new_outertext, $content);
            }
            $post->content = $content;
        }

        return $post;
    }
}
