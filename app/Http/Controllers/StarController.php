<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StarController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::all();

        return view('star.index')->with('stars', $stars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $star = new Tricien();
        $star->nom = $request->nom;
        $star->prenom = $request->prenom;
        $star->description = $request->description;

        if ($request->hasFile('image')) {
            $star->image = $request->image->store('images', 'public');
        }

        $tricien->save();
        Session::flash('success', 'Bien enregister');

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function edit(Star $star)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Star $star)
    {
        $star = Star::find($request->id);
        $star->name = $request->nom;
        $star->tel = $request->prenom;
        $star->email = $request->description;
        Storage::disk('public')->delete($star->image);
        if ($request->hasFile('image')) {
            $star->image = $request->image->store('images', 'public');
        }
        $star->save();
        Session::flash('success', 'Bien modifier');

        return redirect()->route('star.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $star = Star::find($id);
        $star->delete();
        Session::flash('success', 'This fournisseur is deleted successfully');

        return redirect()->route('star.index');
    }
}
