<?php

namespace Phont\Frontend\ViewComposers;

use Illuminate\View\View;

class FrontEndComposer
{
    public $arrayTheme = [];

    public $currentRequestUri;

    public $currentRouteName;

    public $fullUrl;

    public $fullHttpHost;

    public $fullUrlNoQuery;

    public $postsPopular;

    public $mainMenu = [];

    public $configs = [];

    protected $optionService;

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentRequestUri = $_SERVER['REQUEST_URI'];
        $this->currentRouteName = \Route::current()->getName();
        $this->fullHttpHost = config('option.http_type') . '://' . $_SERVER['HTTP_HOST'];
        $this->fullUrl = config('option.http_type') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->fullUrlNoQuery = config('option.http_type') . '://' . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('currentRequestUri', $this->currentRequestUri);
        $view->with('currentRouteName', $this->currentRouteName);
        $view->with('fullUrl', $this->fullUrl);
        $view->with('fullHttpHost', $this->fullHttpHost);
        $view->with('fullUrlNoQuery', $this->fullUrlNoQuery);
    }
}
