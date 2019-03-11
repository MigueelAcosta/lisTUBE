<?php

namespace lisTUBE\Http\Controllers;

use FFMpeg;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use lisTUBE\Http\Requests\storeVideo;
use lisTUBE\video;
use Illuminate\Support\Facades\Storage;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use FFMpeg\Format\Video\WebM;

class videosController extends Controller
{
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
        $videos = video::paginate(9);
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
    public function store(storeVideo $request)
    {
        //Guardo el video en el disco
        $video=$request->file('video');



        $ubicacion = Storage::disk('vidOriginal')->putFile('publicos',$video);


        $fileName= explode(".",$ubicacion);
        $nombre = explode('/',$fileName[0]);


        $this->convertirVideo($video, $nombre[1],$ubicacion);
        $portada = $nombre[1];
        //Guardo el registro en la BD
        $guardado = video::create([
            'nombre'=> $request['titulo'],
            'genero'=> $request['genero'],
            'descripcion'=> $request['descripcion'],
            'portada' =>$portada,
            'user_id' => auth()->user()->id,
            'ubicacion' =>$fileName[0],

        ]);


        if ($guardado != null and $ubicacion != null ){
            return back()->with('success','Video subido correctamente.');
        }else{
            return back()->with('error', 'No se pudo subir el video. Por favor, intenta de nuevo.');
        }
    }

    public function convertirVideo($video, $nombre, $ubicacion){
        //defino la ubicacion donde se guardan los videos
        $path = 'C:/Users/nosel_000/Documents/Universidad/Septimo/Desarrollo web/lisTUBE/storage/app/public/videos/';




        //creo el manejador de ffmpeg
        $ffmpeg = FFMpeg\FFMpeg::create(array(
            'ffmpeg.binaries'  => 'C:/ffmpeg/v3/bin/ffmpeg.exe',
            'ffprobe.binaries' => 'C:/ffmpeg/v3/bin/ffprobe.exe',
            'timeout'          => 0, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use
));
        $convertido = $ffmpeg->open($video);

        //defino el formato mp4
        $format = new FFMpeg\Format\Video\X264();
        $format->setAudioCodec("libmp3lame");

        //imprimo el progreso
        $format->on('progress', function ($convertido, $format, $percentage) {
            echo "$percentage % transcoded";
        });


        //saco el thumbnail
        $convertido->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))
            ->save('C:/Users/nosel_000/Documents/Universidad/Septimo/Desarrollo web/lisTUBE/storage/app/public/portadas/'.$nombre.'.jpeg');

        //convierto los videos
        $convertido
            ->save($format,$path.$ubicacion.'.mp4');
            //->save(new FFMpeg\Format\Video\WMV(),$ubicacion. $nombre.'.wmv')
            //->save(new FFMpeg\Format\Video\WebM(), $ubicacion. $nombre.'.webm');

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
        $video = video::find($id);
        return view('Videos.editarVideos')->with('video',$video);
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
        $video = video::find($id);
        if($request['titulo']!=null or $request['titulo']){
            $video->nombre = $request['titulo'];
        }
        if ($request['genero']!= null or $request['genero']!=""){
            $video->genero = $request['genero'];
        }
        if ($request['descripcion']!= null or $request['descripcion']!=""){
            $video->descripcion = $request['descripcion'];
        }
        $video->save();
        return redirect()->to('/misVideos')->send('success', 'El video ha sido editado correctamente');

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

    public function buscarVideosUsuario(){
        $videos = video::where('user_id',auth()->user()->id)->get();
        return view('Videos.misVideos',compact('videos'));
    }

    public function buscarVideosNombre(Request $request){
        $busqueda = $request->get('nombre');
        $videos = video::where('nombre','like','%'.$busqueda.'%')->get();
        return view('Videos.videos',compact('videos'));
    }

    public function buscarVideo(int $id){
        $videos = video::where('user_id',$id)->value('nombre');
        return $videos;
        //return redirect('') ->with($videos);
    }
    public function verVideo($id){
        $video = video::find($id);
        return view('Videos.verVideo')->with('video',$video);
    }

    public function getVideo(Video $video){
        $name = $video->name;
        $fileContents = Storage::disk('vidOriginales')->get("{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }

    public function getRecientes(){
        $videos = video::orderby('created_at','desc')->take(3)->get();
        return $videos;
    }



}
