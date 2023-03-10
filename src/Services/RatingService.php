<?php

namespace Phont\Frontend\Services;

use Phobrv\BrvCore\Repositories\PostRepository;

class RatingService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function reportRatingV2($post_id)
    {
        $post = $this->postRepository->find($post_id);
        $metas = $post->meta['ratingData'] ?? [];
        $out = [
            'post' => $post,
            'post_id' => $post_id,
            'total' => 0,
            'number' => 0,
            'medium' => 0,
            'rating1' => 0,
            'rating2' => 0,
            'rating3' => 0,
            'rating4' => 0,
            'rating5' => 0,
            'contents' => [],
        ];
        $contents = [];
        foreach ($metas as $key => $value) {
            if ($key == 'value') {
                $valueRate = json_decode($value);
            }
            if (! empty($valueRate->active)) {
                array_push($contents, $valueRate);
                $out['total'] += $valueRate->rating;
                $out['number']++;
                if ($valueRate->rating > 4) {
                    $out['rating5']++;
                } elseif ($valueRate->rating > 3) {
                    $out['rating4']++;
                } elseif ($valueRate->rating > 2) {
                    $out['rating3']++;
                } elseif ($valueRate->rating > 1) {
                    $out['rating2']++;
                } else {
                    $out['rating1']++;
                }
            }
        }

        $out['contents'] = $contents;
        if ($out['number']) {
            $out['medium'] = round($out['total'] / $out['number'], 2);
            $out['rating5'] = round($out['rating5'] / $out['number'], 2) * 100;
            $out['rating4'] = round($out['rating4'] / $out['number'], 2) * 100;
            $out['rating3'] = round($out['rating3'] / $out['number'], 2) * 100;
            $out['rating2'] = round($out['rating2'] / $out['number'], 2) * 100;
            $out['rating1'] = round($out['rating1'] / $out['number'], 2) * 100;
        }

        return $out;
    }
}
