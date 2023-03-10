<?php

namespace Phont\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\PostRepository;
use Phobrv\BrvCore\Services\PostServices;
use Phont\Frontend\Services\RatingService;

class RatingController extends Controller
{
    protected $postRepository;

    protected $postService;

    protected $ratingService;

    public function __construct(
        RatingService $ratingService,
        PostRepository $postRepository,
        PostServices $postService
    ) {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->ratingService = $ratingService;
    }

    public function postRating(Request $request)
    {
        //Sambao.vn
        $data = $request->all();
        $post = $this->postRepository->find($data['data'][0]);
        $postMeta = $post->meta;
        $meta['countRatting'] = isset($postMeta['countRatting']) ? $postMeta['countRatting'] + 1 : 1;
        $meta['sumRatting'] = isset($postMeta['sumRatting']) ? $postMeta['sumRatting'] + $data['data'][1] : $data['data'][1];
        $this->postRepository->insertMeta($post, $meta);

        return $this->postService->takeRatting($meta);
    }

    public function rating(Request $request)
    {
        $data = $request->all();
        $rating = $data['rating'];
        $key = $rating * 10;
        $post = $this->postRepository->find($data['id']);
        $meta = $post->meta;
        $ratingMeta = isset($meta['ratingMeta']) ? json_decode($meta['ratingMeta'], true) : [];
        $ratingMeta[$key] = isset($ratingMeta[$key]) ? $ratingMeta[$key] + 1 : 1;

        $total = $number = 0;
        foreach ($ratingMeta as $key => $value) {
            $number += $value;
            $total += ($key * $value) / 10;
        }
        $arrayMeta['ratingMeta'] = json_encode($ratingMeta);
        $arrayMeta['ratingTotal'] = $number;
        $arrayMeta['rating'] = round($total / $number, 2);
        $this->postRepository->updateMeta($post, $arrayMeta);

        return view('phont::frontend.components.ratingSimple.ratingShow', ['rating' => round($total / $number, 2), 'total' => $number, 'confirm' => '1'])->render();
    }

    public function ratingv2(Request $request)
    {
        $data = $request->all();
        $data['id'] = time();
        $post = $this->postRepository->find($data['post_id']);
        $ratingData = $post->meta['ratingData'] ?? [];
        array_push($ratingData, $data);
        $this->postRepository->updateMeta(
            $post,
            [
                'ratingData' => $ratingData,
            ]
        );
        $report = $this->ratingService->reportRatingV2($data['post_id']);

        return response()->json($report);
    }

    public function getRatingV2Data($id)
    {
        $report = $this->ratingService->reportRatingV2($id);
        // return response()->json($report);
        return view('phont::frontend.components.rating.index', ['data' => $report])->render();
    }
}
