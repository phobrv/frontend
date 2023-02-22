<?php

namespace Phont\Frontend\Services;

use Phobrv\BrvCore\Repositories\PostMetaRepository;
use Phobrv\BrvCore\Repositories\PostRepository;
use Phobrv\BrvCore\Repositories\TermRepository;
use Phobrv\BrvCore\Services\ConfigLangService;
use Phobrv\BrvCore\Services\PostServices;

class HandleDataPage
{
    protected $commonServices;

    protected $postRepository;

    protected $postMetaRepository;

    protected $postService;

    protected $configLangService;

    protected $handleDataMenuPage;

    protected $termRepository;

    public function __construct(
        CommonServices $commonServices,
        HandleDataMenuPage $handleDataMenuPage,
        ConfigLangService $configLangService,
        PostMetaRepository $postMetaRepository,
        PostRepository $postRepository,
        PostServices $postService,
        TermRepository $termRepository
    ) {
        $this->handleDataMenuPage = $handleDataMenuPage;
        $this->configLangService = $configLangService;
        $this->commonServices = $commonServices;
        $this->termRepository = $termRepository;
        $this->postRepository = $postRepository;
        $this->postService = $postService;
        $this->postMetaRepository = $postMetaRepository;
    }

    public function handleSearchPage($request)
    {
        $data = $request->all();
        $data['breadcrumb'] = $this->commonServices->genBreadcrumbsFrontEnd(
            [
                ['slug' => '#', 'name' => 'Tìm kiếm'],
                ['slug' => '#', 'name' => htmlentities($data['q'])],
            ]
        );
        $data['post']->title = 'Kết quả tìm kiếm: '.$data['q'];
        $data['meta']['meta_description'] = 'Kết quả tìm kiếm: '.$data['q'];
        $data['meta']['meta_keywords'] = 'Kết quả tìm kiếm: '.$data['q'];
        $data['view_page'] = 'phont::frontend.page.search';

        return $data;
    }

    public function handlePostPage($request, $slug)
    {
        $data = $request->all();
        $data['post'] = $this->postRepository->with('terms')->orderBy('created_at', 'desc')->findWhere(['slug' => $slug])->first();
        if (! isset($data['post']) || $data['post']->subtype == 'home') {
            return $data;
        }
        $data = $this->configLangService->handleTransPage($data);
        $data['post'] = $this->postService->handleMenuPost($data['post']);
        $data['post']->increment('view');
        $data['breadcrumb'] = $this->commonServices->genBreadcrumbsFrontEnd(
            [
                ['slug' => $slug, 'name' => $data['post']->title],
            ]
        );
        $data['meta'] = $this->postService->getMeta($data['post']->postMetas, false);
        $data['sidebars'] = $this->postService->getMultiMetaByKey($data['post']->postMetas, 'box_sidebar');
        $data = $this->handleDataPostType($data);

        return $data;
    }

    public function handleDataPostType($data)
    {
        switch ($data['post']->type) {
            case 'menu_item':
                $data = $this->handleDataMenuPage->handle($data);
                break;
            case 'post':
                $data = $this->handleDataPostPage($data);
                break;
            case 'video':
                $data = $this->handleDataVideoPage($data);
                break;
            case 'product':
                $data = $this->handleDataProductPage($data);
                break;
            case 'drugstore':
                $data = $this->handleDataDrugstorePage($data);
                break;
        }

        return $data;
    }

    public function handleDataProductPage($data)
    {
        $data['gallery'] = [];
        if (! empty($data['meta']['option_number'])) {
            for ($i = 0; $i < $data['meta']['option_number']; $i++) {
                $img = $data['meta']['option'.$i.'image'] ?? $data['post']->thumb;
                if (! empty($img)) {
                    array_push($data['gallery'], $img);
                }
            }
        }
        $gallery = $this->postService->getMultiMetaByKey($data['post']->postMetas, 'image');
        foreach ($gallery as $key => $value) {
            array_push($data['gallery'], $value);
        }
        array_push($data['gallery'], $data['post']->thumb);

        $data['concern'] = $this->postRepository->getConcern($data['post'])->take(6);
        $data['products_hot'] = $this->postRepository->where('type', 'product')->orderBy('view', 'desc')->limit(5)->get();
        $data['meta']['meta_thumb'] = $data['post']->thumb;

        return $data;
    }

    public function handleDataPostPage($data)
    {
        $data = $this->handleBreadcrumbForPost($data);
        $data['concern'] = $this->postRepository->getConcern($data['post'])->take(6);
        if (isset($data['post'])) {
            $data['post'] = $this->commonServices->handlePostContent($data['post']);
            $data['meta']['meta_thumb'] = $data['post']->thumb;
        }
        $data['tags'] = $data['post']->terms()->where('taxonomy', 'tag')->get();

        return $data;
    }

    public function handleDataVideoPage($data)
    {
        $data['concern'] = $this->postRepository->getConcern($data['post'])->take(6);
        $data['meta']['meta_thumb'] = $data['post']->thumb;

        return $data;
    }

    public function handleDataDrugstorePage($data)
    {
        $data['childs'] = $this->postRepository->findWhere(['parent' => $data['post']->id]);
        if (count($data['childs'])) {
            $data['view_page'] = 'phont::frontend.page.drugstore.regionSmall';
        } else {
            $data['view_page'] = 'phont::frontend.page.drugstore.drugstore';
        }

        return $data;
    }

    public function handleDataHome($request)
    {
        $data = $request->all();

        $data['post'] = $page = $this->postRepository->with('terms')->with('postMetas')->where('subtype', 'home')->first();
        $data = $this->configLangService->handleTransPage($data);

        if ($page) {
            $data['meta'] = $this->postService->getMeta($page->postMetas, false);
            $data['view_page'] = $this->handleViewPage($data);
        }

        return $data;
    }

    public function handleDataTagsPage($slug)
    {
        $data['term'] = $this->termRepository->where('slug', $slug)->first();
        if ($data['term']) {
            $data['breadcrumb'] = $this->commonServices->genBreadcrumbsFrontEnd(
                [
                    ['slug' => '#', 'name' => 'Tag'],
                    ['slug' => '#', 'name' => $data['term']->name],
                ]
            );
            $data['meta']['category_term_paginate_source'] = $data['term']->posts()->orderBy('created_at', 'desc')->paginate(10);
            $data['meta']['meta_title'] = 'Chủ đề: '.$data['term']->name;
            $data['meta']['meta_description'] = 'Chủ đề: '.$data['term']->name;
            $data['view_page'] = 'phont::frontend.page.category.layout1';
        }

        return $data;
    }

    public function handleBreadcrumbForPost($data)
    {
        if (isset($data['post']->terms) && count($data['post']->terms)) {
            $category = $data['post']->terms->where('taxonomy', '<>', 'lang')->first();
            if ($category) {
                $menus = $this->postMetaRepository->with('post')->where('key', 'regexp', 'category')->where('value', $category['id'])->get();

                foreach ($menus as $_menu) {
                    $post = $_menu->post;
                    if ($post['lang'] == config('app.locale') && $post['subtype'] != 'home') {
                        $menu = $post;
                    }
                }
                if (isset($menu)) {
                    $data['breadcrumb'] = $this->commonServices->genBreadcrumbsFrontEnd(
                        [
                            ['slug' => $menu['slug'], 'name' => $menu['title']],
                            ['slug' => $data['post']->slug, 'name' => $data['post']->title],
                        ]
                    );
                }
            }
        }

        return $data;
    }

    public function handleViewPage($data)
    {
        $folder = 'phont::frontend.page.'.($data['post']->type == 'menu_item' ? $data['post']->subtype : $data['post']->type);
        $prefix_layout = $data['meta']['layout'] ?? 'layout1';
        $full = $folder.'.'.$prefix_layout;
        $short = $folder.'.'.$prefix_layout.'_short';
        if (isset($data['page'])) {
            $view_page = $short;
        } else {
            $view_page = $full;
        }

        return $view_page;
    }
}
