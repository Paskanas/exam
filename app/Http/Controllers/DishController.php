<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', ['dishes' => $dishes, 'title' => 'Dishes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('dishes.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dish = new Dish;

        $validator = Validator::make(
            $request->all(),
            [
                'menu_id' => ['required', 'min:1'],
                'title' => ['required', 'min:3', 'max:64'],
                'about' => ['required', 'min:3', 'max:64'],
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        if ($request->file('dish_photo')) {
            $photo = $request->file('dish_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $dish->photo = asset('/images') . '/' . $file;
        }

        $dish->menu_id = $request->menu_id;
        $dish->title = $request->title;
        $dish->about = $request->about;
        $dish->save();
        return redirect()->route('dishes-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(int $dishId)
    {
        $dish = Dish::where('id', $dishId)->first();
        return view('dishes.show', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $menus = Menu::all();
        return view('dishes.edit', ['dish' => $dish, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'menu_id' => ['required', 'min:1', 'max:64'],
                'title' => ['required', 'min:3', 'max:64'],
                'about' => ['required', 'min:3', 'max:64'],
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $name = pathinfo($dish->photo, PATHINFO_FILENAME);
        $ext = pathinfo($dish->photo, PATHINFO_EXTENSION);

        $path = asset('/images') . '/' . $name . '.' . $ext;

        if (file_exists($path)) {
            unlink($path);
        }

        if ($request->file('dish_photo')) {
            $photo = $request->file('dish_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $dish->photo = asset('/images') . '/' . $file;
        }

        $dish->menu_id = $request->menu_id;
        $dish->title = $request->title;
        $dish->about = $request->about;
        $dish->save();
        return redirect()->route('dishes-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $name = pathinfo($dish->photo, PATHINFO_FILENAME) ?? 'none';
        $ext = pathinfo($dish->photo, PATHINFO_EXTENSION) ?? '.jpg';
        $path = public_path('/images') . '/' . $name . '.' . $ext;

        if (file_exists($path)) {
            unlink($path);
        }
        $dish->delete();
        return redirect()->route('dishes-index');
    }
    public function deletePicture(Dish $dish)
    {
        $name = pathinfo($dish->photo, PATHINFO_FILENAME) ?? 'none';
        $ext = pathinfo($dish->photo, PATHINFO_EXTENSION) ?? '.jpg';
        $path = public_path('/images') . '/' . $name . '.' . $ext;

        if (file_exists($path)) {
            unlink($path);
        }

        $dish->photo = null;
        $dish->save();
        return redirect()->back();
    }
}
