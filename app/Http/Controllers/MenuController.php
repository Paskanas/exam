<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Dish;
use App\Models\Restorant;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', ['menus' => $menus, 'title' => 'Menus']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restorants = Restorant::all();
        return view('menus.create', ['restorants' => $restorants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;

        $validator = Validator::make(
            $request->all(),
            [
                'restorant_id' => ['required', 'min:1'],
                'title' => ['required', 'min:3', 'max:64'],
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $menu->restorant_id = $request->restorant_id;
        $menu->title = $request->title;
        $menu->save();
        return redirect()->route('menus-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(int $menuId)
    {
        $menu = Menu::where('id', $menuId)->first();
        return view('menus.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $restorants = Restorant::all();
        return view('menus.edit', ['menu' => $menu, 'restorants' => $restorants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'restorant_id' => ['required', 'min:1'],
                'title' => ['required', 'min:3', 'max:64'],
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $menu->restorant_id = $request->restorant_id;
        $menu->title = $request->title;
        $menu->save();
        return redirect()->route('menus-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if (!$menu->dishes->count()) {
            $menu->delete();
            return redirect()->route('menus-index');
        }
        return redirect()->back()->with('deleted', 'No no, it is imposible!');
    }

    public function dishes(int $menuId)
    {
        $menu = Menu::where('id', $menuId)->first();
        $dishes = Dish::where('menu_id', $menuId)->get();
        return view('menus.dishes', ['menu' => $menu, 'dishes' => $dishes]);
    }
}
