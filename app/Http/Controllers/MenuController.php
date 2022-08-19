<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::all();
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
        $this->validate($request, [
            'idkategori' => 'required|numeric',
            'menu' => 'required',
            'gambar' => 'required',
            'harga' => 'required|numeric',
        ]);

        $gambar = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move('upload', $gambar);

        $data = [
            'idkategori' => $request->input('idkategori'),
            'menu' => $request->input('menu'),
            'gambar' => url('upload/' . $gambar),
            'harga' => $request->input('harga'),
        ];

        $menu = Menu::create($data);

        if ($menu) {
            $result = [
                'status' => 201,
                'pesan' => 'Success!',
                'data' => $data
            ];
        } else {
            $result = [
                'status' => 500,
                'pesan' => 'Failed!',
                'data' => ''
            ];
        }
        return response()->json($result);
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
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}