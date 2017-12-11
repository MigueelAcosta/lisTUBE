<?php

namespace lisTUBE\Http\Controllers;

use Illuminate\Http\Request;

class videosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index";
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
        $video = $request->file('video');
        $destino = "C:\\Users\\nosel_000\\Documents\\Universidad\\Septimo\\Desarrollo web\\laravel\\videos subidos";
        $video->move($destino,$video->getClientOriginalName());
        $nombreArchivo = pathinfo($video->getClientOriginalName());
        $nombre = $nombreArchivo['filename'];
        //$pathOld = $video->getRealPath();
        $cadena = 'ffmpeg -i "' .$destino.'\\'. $nombreArchivo['basename']. '" "'. $destino.'\\videos convertidos\\'.$nombre.'.mkv"';
        shell_exec($cadena);
        return $cadena;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
