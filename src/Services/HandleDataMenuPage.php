<?php

namespace Phont\Frontend\Services;

use Phobrv\BrvCore\Repositories\PostMetaRepository;
use Phobrv\BrvCore\Repositories\PostRepository;
use Phobrv\BrvCore\Repositories\TermRepository;
use Phobrv\BrvCore\Services\ConfigLangService;
use Phobrv\BrvCore\Services\PostServices;

class HandleDataMenuPage
{
    protected $commonServices;

    protected $postRepository;

    protected $postMetaRepository;

    protected $postService;

    protected $configLangService;

    protected $termRepository;

    public function __construct(CommonServices $commonServices, ConfigLangService $configLangService, PostMetaRepository $postMetaRepository, PostRepository $postRepository, PostServices $postService, TermRepository $termRepository)
    {
        $this->configLangService = $configLangService;
        $this->commonServices = $commonServices;
        $this->termRepository = $termRepository;
        $this->postRepository = $postRepository;
        $this->postService = $postService;
        $this->postMetaRepository = $postMetaRepository;
    }

    public function handle($data)
    {
        $data['meta']['meta_thumb'] = $data['post']->thumb;
        switch ($data['post']->subtype) {
            case 'drugstore':
                $data['region'] = $this->termRepository->findWhere(['taxonomy' => 'region']);
                $data['view_page'] = 'phont::frontend.page.drugstore.region';
                break;
            case 'recruitment':
                $data = $this->handleDataRecruitmentsPage($data);
                break;
            case 'agency':
                $data = $this->handleAgencyPage($data);
                break;
        }

        return $data;
    }

    public function handleDataRecruitmentsPage($data)
    {
        $data['posts'] = $this->postRepository
            ->orderBy('created_at', 'desc')
            ->where('type', 'recruitment')
            ->get();
        if (count($data['posts'])) {
            for ($i = 0; $i < count($data['posts']); $i++) {
                $data['posts'][$i]['meta'] = $this->postService->getMeta($data['posts'][$i]->postMetas);
            }
        }

        return $data;
    }

    public function handleAgencyPage($data)
    {
        $data['provinces'] = $this->termRepository
            ->where('taxonomy', 'province')
            ->orderBy('name')
            ->get();
        if (empty($data['term_id'])) {
            $term = $this->termRepository
                ->with('posts')
                ->where('taxonomy', 'province')
                ->first();
            $data['view_page'] = 'phont::frontend.page.agency.index';
        } else {
            $term = $this->termRepository->with('posts')->find($data['term_id']);
            $data['view_page'] = 'phont::frontend.page.agency.agencyBox';
        }
        $data['agencies'] = $term->posts->sortBy('order');
        if (! empty($data['agencies'][0])) {
            $data['agencyCur'] = $data['agencies'][0];
        }

        return $data;
    }
}
