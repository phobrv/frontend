<?php

namespace Phont\Frontend\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\PostRepository;
use Phobrv\BrvCore\Repositories\TermRepository;
use Phobrv\BrvCore\Services\PostServices;
use Phont\Frontend\Services\RatingService;

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
        $term = $this->termRepository->find($data['term_id']);
        if ($term) {
            $posts = $term->posts()->where('type', 'product');

            if ($data['sort']) {
                switch ($data['order']) {
                    case 'desc':
                        $posts = $posts->orderByDesc($data['sort']);
                        break;
                    default:
                        $posts = $posts->orderBy($data['sort']);
                        break;
                }
            }
            $posts = $posts->paginate($page_size);
            if ($posts) {
                foreach ($posts as $key => $post) {
                    $meta = $post->meta;
                    $posts[$key]->price = $meta['price'] ?? 0;
                    $posts[$key]->price_old = $meta['price_old'] ?? 0;
                }
            }
        }

        return view('phont::frontend.page.productgroup.layout1_short', ['posts' => $posts])->render();
    }

    public function quotePrice(Request $request)
    {
        $data = $request->all();
        $product = $this->postRepository->find($data['product_id']);

        return view('phont::frontend.page.productgroup.coms.quotePrice', ['product' => $product])->render();
    }
}
