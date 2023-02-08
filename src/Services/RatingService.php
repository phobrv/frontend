<?php

namespace Phobrv\Frontend\Services;

use Illuminate\Support\Facades\DB;

class RatingService
{
    public function reportRatingV2($post_id)
    {
        $post = DB::table('brv_posts')->find($post_id);
        $metas = DB::table('brv_post_meta')
            ->where('post_id', $post_id)
            ->where('key', 'ratingData')
            ->get();

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
        $number = 0;
        foreach ($metas as $meta) {
            $value = json_decode($meta->value);

            if (! empty($value->active)) {
                array_push($contents, $value);
                $out['total'] += $value->rating;
                $out['number']++;
                if ($value->rating > 4) {
                    $out['rating5']++;
                } elseif ($value->rating > 3) {
                    $out['rating4']++;
                } elseif ($value->rating > 2) {
                    $out['rating3']++;
                } elseif ($value->rating > 1) {
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
