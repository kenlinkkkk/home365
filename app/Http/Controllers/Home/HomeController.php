<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Page;
use App\Repositories\Admin\PackageEloquentRepository;
use App\Repositories\Admin\PageEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __construct(PageEloquentRepository $pageEloquentRepository, PackageEloquentRepository $packageEloquentRepository)
    {
        $this->pageEloquentRepository = $pageEloquentRepository;
        $this->packageEloquentRepository = $packageEloquentRepository;
    }

    public function index()
    {
        $pages = Page::where('status', '=', 1)->get();
        $packages = Package::where('status', '=', 1)->where('fa_package', '=', 0)->with('packages')->get();
        foreach ($pages as $item) {
            $position = json_decode($item->position);
            $item->position = $position;
        }

        $data = compact(
            'pages',
            'packages'
        );

        return view('welcome', $data);
    }

    public function regSubmit(Request $request)
    {
        $data = $request->except('_token');
        $url = 'http://mskill.vn/dangky/api/register.jsp?serviceId=30&sub='. $data['package'];

        return Redirect::away($url);
    }

    public function backUrl(Request $request)
    {

    }

    public function showPage(Request $request, $page_slug)
    {
        $pages = Page::where('status', '=', 1)->get();
        foreach ($pages as $item) {
            $position = json_decode($item->position);
            $item->position = $position;
        }
        $page = Page::where('slug', '=', $page_slug)->where('status', '=', 1)->first();
        $data = compact(
            'page',
            'pages'
        );

        return view('client.showpage', $data);
    }
}
