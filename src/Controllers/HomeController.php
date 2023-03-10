<?php

namespace Phont\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\OptionRepository;
use Phobrv\BrvCore\Services\OptionServices;
use Phont\Frontend\Services\HandleDataPage;

class HomeController extends Controller
{
    protected $handleDataPage;

    protected $configs;

    public function __construct(
        OptionServices $optionServices,
        OptionRepository $optionRepository,
        HandleDataPage $handleDataPage
    ) {
        $this->handleDataPage = $handleDataPage;
        $this->configs = $optionServices->getConfigs($optionRepository->where('autoload', 'yes')->get());
    }

    public function index(Request $request)
    {
        $data = $this->handleDataPage->handleDataHome($request);

        return view($data['view_page'], ['data' => $data, 'configs' => $this->configs]);
    }

    public function level1(Request $request, $slug)
    {
        switch ($slug) {
            case 'search':
                $data = $this->handleDataPage->handleSearchPage($request);
                break;
            default:
                $data = $this->handleDataPage->handlePostPage($request, $slug);
                break;
        }
        if ($data['post'] && $data['post']->subtype != 'link') {
            $data['view_page'] = $data['view_page'] ?? $this->handleDataPage->handleViewPage($data);

            return view($data['view_page'], ['data' => $data, 'configs' => $this->configs]);
        } else {
            return redirect()->route('home');
        }
    }

    public function level2($object, $slug)
    {
        switch ($object) {
            case 'tag':
                $data = $this->handleDataPage->handleDataTagsPage($slug);
                break;
        }
        if (isset($data['view_page'])) {
            return view($data['view_page'], ['data' => $data, 'configs' => $this->configs]);
        } else {
            return redirect()->route('home');
        }
    }
}
