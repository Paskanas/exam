<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restorant;
use Illuminate\Http\Request;

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
        $restorant->delete();
        return redirect()->route('restorants-index');
    }

    public function menus(int $restorantId)
    {
        dump($restorantId);
        $restorant = Restorant::where('id', $restorantId)->first();
        $menus = Menu::where('restorant_id', $restorantId)->get();
        return view('restorants.menus', ['restorant' => $restorant, 'menus' => $menus]);
    }
}
