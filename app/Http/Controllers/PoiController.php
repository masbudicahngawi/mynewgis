<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Poi $poi)
    {
        $data = Poi::where('objek', '=', 'marker')->orWhere('objek', '=', 'polygon')->get();
        // var_dump($data);

        return view('poi.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poi $poi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poi $poi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poi $poi)
    {
        //
    }

    public function polyline(){
        $qry = Poi::where('objek','=', 'polyline')->paginate(10);;

        return view('poi.form_polyline', ['data' => $qry]);
    }

    public function polyline_detail(Poi $poi, $id){
        $qry = Poi::where('id', $id)->get();
        // dump($qry);
        return view('poi.detail_polyline', ['data' => $qry[0]]);
    }
}
