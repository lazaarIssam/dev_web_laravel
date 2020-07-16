<?php

namespace App\Http\Controllers;

use App\Star;
use Auth;
use Session;
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
        //Affiche que tous les objets
        //Shows all the star objects
        //$stars = Star::all();
        //Affiche que les objets star d'utilisateur authentifier
        //Shows the star objects of the authentified user
        $stars = Star::where('user_id', Auth::user()->id)->get();

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
        $star = new Star();
        $star->user_id = Auth::user()->id;
        $star->nom = $request->nom;
        $star->prenom = $request->prenom;
        $star->description = $request->description;
        if ($request->hasFile('image')) {
            $star->image = $request->image->store('images', 'public');
        }
        $star->save();

        Session::flash('success', 'Bien enregister');
        return redirect()->route('star.index');
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
    public function update(Request $request)
    {
        $star = Star::find($request->id);
        //On verifie si la personne authentifier à créer l'objet star avant de faire la modification
        //Cette verification est effectuée au cas d'une beug où une autre personne peu voir d'autre objet
        //star à part les tiennes
        //We verifie if the authentified user is the creator of the object star before going updating the object
        //This verification is added in case the user can see other users created star objects
        if($star->user_id == Auth::user()->id){
        $star->nom = $request->nom;
        $star->prenom = $request->prenom;
        $star->description = $request->description;
        Storage::disk('public')->delete($star->image);
        if ($request->hasFile('image')) {
            $star->image = $request->image->store('images', 'public');
        }
        $star->save();
        Session::flash('success', 'Bien modifier');
        }else{
            Session::flash('failed', 'Vous ne pouvez pas modifier ce star');
        }
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
        //On verifie si la personne authentifier à créer l'objet star avant de faire la suppression
        //Cette verification est effectuée au cas d'une beug où une autre personne peu voir d'autre objet
        //star à part les tiennes
        //We verifie if the authentified user is the creator of the object star before deleting the object
        //This verification is added in case the user can see other users created star objects
        if($star->user_id == Auth::user()->id){
        $star->delete();
        Session::flash('success', 'Bien supprimer');
        }else{
            Session::flash('failed', 'Vous ne pouvez pas supprimer ce star');
        }
        return redirect()->route('star.index');
    }
}
