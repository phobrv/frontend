<?php

namespace Phont\Frontend\Middleware;

use Closure;
use Gumlet\ImageResize;
use Illuminate\Http\Request;

class AutoCreateImageResize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\HttLp\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $arrayFolderResize = ['rs100',  'rs200', 'rs300', 'rs400', 'rs500', 'rs600'];
        $pathInfo = $request->getPathInfo();
        // dd($pathInfo);
        if (str_contains($pathInfo, '/storage/rs')) {
            $arrayPath = explode('/', $pathInfo);
            $folderResize = $arrayPath[2];
            if (in_array($folderResize, $arrayFolderResize)) {
                $storagePath = storage_path(str_replace('/storage', 'app/public', str_replace($folderResize, 'photos', $pathInfo)));
                if (is_file($storagePath) && getimagesize($storagePath)) {
                    $image = new ImageResize($storagePath);
                    $pathResize = str_replace('photos', $folderResize, $storagePath);
                    $this->folderCheck($pathResize);
                    if (! is_file($pathResize)) {
                        $withResize = str_replace('rs', '', $folderResize);
                        $image->resizeToWidth($withResize);
                        $image->save($pathResize);
                    }
                }
            }
        }

        return $next($request);
    }

    private function folderCheck($pathImage)
    {
        $arrayPath = explode('/', $pathImage);
        array_pop($arrayPath);
        $folder = implode('/', $arrayPath);
        if (! file_exists($folder)) {
            mkdir($folder, 0755, true);
        }
    }
}
