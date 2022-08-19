<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['data'] = $data;
            return response($res);
        } else {
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Kategori::create($request->all());
        // versi pakai array
        // if ($request) {
        //     $res = [
        //         'message' => 'Success!',
        //         'data' => $request->all()
        //     ];
        //     return response($res, 200);
        // } else {
        //     $res = [
        //         'message' => 'Failed!'
        //     ];
        //     return response($res, 500);
        // }
        // versi tanpa array
        if ($request) {
            $res = ['message' => 'Success!'];
            return response($res, 200);
        } else {
            $res = ['message' => 'Failed!'];
            return response($res, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Kategori::where('idkategori', $id)->get();
        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['data'] = $data;
            return response($res);
        } else {
            $res['message'] = "Empty!";
            return response($res);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kategori::where('idkategori', $id)->update($request->all());
        if ($request) {
            $res = ['message' => 'Success!'];
            return response($res, 200);
        } else {
            $res = ['message' => 'Failed!'];
            return response($res, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::where('idkategori', $id)->delete();
        if ($data) {
            $res = ['message' => 'Berhasil dihapus!'];
            return response($res, 200);
        } else {
            $res = ['message' => 'Gagal dihapus!'];
            return response($res, 500);
        }
    }
}