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
        return view(
            'home',
            [
                'restorants' => $restorants,
                'title' => 'Restorants',
                'menus' => Menu::all(),
                'find' => $request->find ? $request->find : ''
            ]
        );
    }
}
