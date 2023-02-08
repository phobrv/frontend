<?php

namespace Phobrv\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\PostRepository;
use Phobrv\BrvCore\Repositories\TermRepository;
use Phobrv\BrvCore\Services\PostServices;
use Phobrv\Frontend\Services\RatingService;

class ProductApiController extends Controller
{
    protected $postRepository;

    protected $postService;

    protected $ratingService;

    protected $termRepository;

    public function __construct(
        RatingService $ratingService,
        TermRepository $termRepository,
        PostRepository $postRepository,
        PostServices $postService
    ) {
        $this->ratingService = $ratingService;
        $this->termRepository = $termRepository;
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }

    public function getProduct(Request $request)
    {
        $data = $request->all();
        $page_size = $data['size'] ?? 10;
        $page = $data['page'] ?? 1;
        $term = $this->termRepository->with('posts')->find($data['term_id']);
        if ($term) {
            $posts = $term->posts->where('type', 'product');
            if ($posts) {
                foreach ($posts as $key => $post) {
                    $meta = $post->meta;
                    $posts[$key]->price = $meta['price'] ?? 0;
                    $posts[$key]->price_old = $meta['price_old'] ?? 0;
                }
            }
        }
        $count = $posts->count();
        if ($data['sort']) {
            switch ($data['order']) {
                case 'desc':
                    $posts = $posts->sortByDesc($data['sort']);
                    break;
                default:
                    $posts = $posts->sortBy($data['sort']);
                    break;
            }
        }
        $posts = $posts->forPage($page, $page_size)->values()->all();

        $out = [
            'count' => $count,
            'page_size' => $page_size,
            'page' => $page,
            'items' => $posts,
        ];

        return view('phobrv::frontend.page.products.layout1_short', ['data' => $out])->render();
    }

    public function quotePrice(Request $request)
    {
        $data = $request->all();
        $product = $this->postRepository->find($data['product_id']);

        return view('phobrv::frontend.page.product.coms.quotePrice', ['product' => $product])->render();
    }
}
