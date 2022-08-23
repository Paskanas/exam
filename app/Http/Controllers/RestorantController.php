<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restorant;
use Illuminate\Http\Request;
use Validator;

class RestorantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restorants = Restorant::all();
        return view('restorants.index', ['restorants' => $restorants, 'title' => 'Restorant list']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restorants.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restorant = new Restorant;

        $validator = Validator::make(
            $request->all(),
            [
                'restorant_title' => ['required', 'min:3', 'max:64'],
                'restorant_code' => ['required', 'min:3', 'max:10'],
                'restorant_address' => ['required', 'min:5', 'max:64'],
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $restorant->title = $request->restorant_title;
        $restorant->code = $request->restorant_code;
        $restorant->address = $request->restorant_address;
        $restorant->save();
        return redirect()->route('restorants-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function show(int $restorantId)
    {
        $restorant = Restorant::where('id', $restorantId)->first();
        return view('restorants.show', ['restorant' => $restorant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restorant $restorant)
    {
        return view('restorants.edit', ['restorant' => $restorant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restorant $restorant)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'restorant_title' => ['required', 'min:3', 'max:64'],
                'restorant_code' => ['required', 'min:3', 'max:10'],
                'restorant_address' => ['required', 'min:5', 'max:64'],
            ],

        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $restorant->title = $request->restorant_title;
        $restorant->code = $request->restorant_code;
        $restorant->address = $request->restorant_address;
        $restorant->save();
        return redirect()->route('restorants-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restorant  $restorant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restorant $restorant)
    {

        if (!$restorant->menus->count()) {
            $restorant->delete();
            return redirect()->route('restorants-index');
        }
        return redirect()->back()->with('deleted', 'No no, it is imposible!');
    }

    public function menus(int $restorantId)
    {
        $restorant = Restorant::where('id', $restorantId)->first();
        $menus = Menu::where('restorant_id', $restorantId)->get();
        return view('restorants.menus', ['restorant' => $restorant, 'menus' => $menus]);
    }
}
