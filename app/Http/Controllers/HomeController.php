<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restorant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->find) {
            $restorants = Restorant::where('title', 'like', '%' . $request->find . '%')->get();
        } else {
            $restorants = Restorant::all();
        }
        // } else {

        //     if ($request->country_id == 0) {
        //         $hotels = match ($request->sort) {
        //             'price-asc' => Hotel::orderBy('price', 'asc')->get(),
        //             'price-desc' => Hotel::orderBy('price', 'desc')->get(),
        //             default => Hotel::all()
        //         };
        //     } else {
        //         $hotels = match ($request->sort) {
        //             'price-asc' => Hotel::where('country_id', $request->country_id)->orderBy('price', 'asc')->get(),
        //             'price-desc' => Hotel::where('country_id', $request->country_id)->orderBy('price', 'desc')->get(),
        //             default => Hotel::where('country_id', $request->country_id)->get()
        //         };
        //     }
        // }
        return view(
            'home',
            [
                'restorants' => $restorants,
                'title' => 'Restorants',
                'menus' => Menu::all(),
                // 'sort' => $request->sort ? $request->sort : 'default',
                // 'filter' => $request->country_id ? $request->country_id : 0,
                'find' => $request->find ? $request->find : ''
            ]
        );
    }
}
