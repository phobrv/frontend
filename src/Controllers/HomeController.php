<?php

namespace Phont\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Repositories\OptionRepository;
use Phobrv\BrvCore\Services\HandleMenuServices;
use Phobrv\BrvCore\Services\OptionServices;
use Phont\Frontend\Services\HandleDataPage;

class HomeController extends Controller
{
    protected $handleDataPage;

    protected $configs;

    public function __construct(
        HandleMenuServices $handleMenuService,
        OptionServices $optionServices,
        OptionRepository $optionRepository,
        HandleDataPage $handleDataPage
    ) {
        $this->handleDataPage = $handleDataPage;
        $this->configs = $optionServices->getConfigs($optionRepository->where('autoload', 'yes')->get());
        $this->configs['mainMenu'] = $handleMenuService->getMenus($this->configs, 'main_menu', 'disablePrivateMenu');
        $this->configs['secondMenu'] = $handleMenuService->getMenus($this->configs, 'second_menu', 'disablePrivateMenu');
        $this->configs['thirdMenu'] = $handleMenuService->getMenus($this->configs, 'third_menu', 'disablePrivateMenu');
        $this->configs['fouthMenu'] = $handleMenuService->getMenus($this->configs, 'fouth_menu', 'disablePrivateMenu');
        $this->configs['fifthMenu'] = $handleMenuService->getMenus($this->configs, 'fifth_menu', 'disablePrivateMenu');
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
        if ($data['post']) {
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
