<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use App\Models\JenisPoi;
use Illuminate\Http\Request;
use Illuminate\Support\Js;
use Illuminate\Support\Facades\Validator;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function form_upload_foto(Poi $poi, $id){
        $qry = Poi::where('id', $id)->get();

        return view('poi.upload_foto', ['data' => $qry[0]]);
    }

    public function proses_upload_foto(Poi $poi, Request $req)
    {
        $req->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $req->image->extension();

        $req->image->move(public_path('images'), $imageName);

        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 

            */
        if($req->deskripsi){
            $poi::where('id', $req->id_marker)->update(array('image' => $imageName, 'deskripsi' => $req->deskripsi));
        }else{
            $poi::where('id', $req->id_marker)->update(array('image' => $imageName));
        }

        return back()->with('success', 'You have successfully uploaded an image.')->with('image', $imageName);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->mode == "mobile") {

            // Dari menu Mobile
            $validator = Validator::make($request->all(), [
                'lo' => 'required',
                'la' => 'required',
                'keterangan' => 'required',
            ]);

            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // print_r($request->all());

            // Kirim ke DB [!!!Settingan Latitude dan Longitude-nya terbalik !!!!]
            $poi = Poi::create([
                'nama' => $request->keterangan,
                'latitude' => $request->lo,
                'longitude' => $request->la,
                'jenis_id' => 1,
                'deskripsi' => '',
                'objek' => 'marker',
            ]);

            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        } else if ($request->mode == "marker") {
            // Dari menu Marker
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'jenis_id' => 'required',
                'lat' => 'required',
                'lng' => 'required',
            ]);

            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // print_r($request->all());

            // Kirim ke DB [!!!Settingan Latitude dan Longitude-nya terbalik !!!!]
            $poi = Poi::create([
                'nama' => $request->nama,
                'latitude' => $request->lng,
                'longitude' => $request->lat,
                'jenis_id' => $request->jenis_id,
                'deskripsi' => $request->deskripsi,
                'objek' => 'marker',
            ]);

            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Poi $poi)
    {
        $data = Poi::where('objek', '=', 'marker')->orWhere('objek', '=', 'polygon')->get();
        // var_dump($data);

        return view('poi.show', ['data' => $data]);
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

    public function polyline()
    {
        $qry = Poi::where('objek', '=', 'polyline')->paginate(10);;

        return view('poi.form_polyline', ['data' => $qry]);
    }

    public function polyline_detail(Poi $poi, $id)
    {
        $qry = Poi::where('id', $id)->get();
        // dump($qry);
        return view('poi.detail_polyline', ['data' => $qry[0]]);
    }

    public function mobile()
    {
        return view('mobile.index');
    }

    public function tambah()
    {
        $data_marker = Poi::where('objek', '=', 'marker')->get();
        $jenis = JenisPoi::all();

        return view('poi.tambah', ['jenis' => $jenis, 'titik' => $data_marker]);
    }

    public function multilayer()
    {
        return view('multilayer.index');
    }
}