<?php

namespace lisTUBE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use lisTUBE\video;

class videosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = video::all();
        return view('Videos.videos',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("subirvideos");
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
        $destino = "C:\\users\\nosel_000\\Documents\\Universidad\\Septimo\\Desarrollo web\\lisTUBE\\public\\videos";
        $video->move($destino,$video->getClientOriginalName());
        $nombreArchivo = pathinfo($video->getClientOriginalName());
        $nombre = $nombreArchivo['filename'];
        //$pathOld = $video->getRealPath();
        $cadena = 'ffmpeg -i "' .$destino.'\\'. $nombreArchivo['basename']. '" "'. $destino.'\\videos convertidos\\'.$nombre.'.mkv"';
        shell_exec($cadena);

        //return $request;
        \lisTUBE\video::create([
            'nombre'=> $video->getClientOriginalName(),
            'genero'=> $request['genero'],
            'descripcion'=> $request['descripcion'],
            'user_id' => $request['']
        ]);

        return redirect("/");
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

    public function buscarVideos(int $id){
        $videos = video::where('user_id',$id)->get();
        return view('Videos.misVideos',compact('videos'));
    }

    public function buscarVideo(int $id){
        $videos = video::where('user_id',$id)->value('nombre');
        return $videos;
    }
    public function verVideo($id){
        $video = video::where('user_id',$id)->value('nombre');
        return redirect('reproducir')->with('video',$video);
    }
}
