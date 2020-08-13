<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Http\Controllers\AdvertisementController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $renderBanners = new AdvertisementController();
        // dd($renderBanners->index());
        $banners = $renderBanners->index();
        return view('welcome')->with('banners', $banners);
    }
}
