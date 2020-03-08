<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symphony\Component\Httpfoundation\HttpResponse;
use Response;


use App\Video;
use App\Comment;


class VideoController extends Controller
{

  public function createVideo(){

    return view('video.createVideo');

  }


  public function saveVideo (Request $request){
      //Validació del formulari

      $validatedData = $this -> validate ($request, [
        'title' => 'required|min:5',
        'description' => 'required',


      ]);

      $video = new Video();
      $user =\Auth::user();
      $video->user_id = $user->id;
      $video->title = $request ->input('title');
      $video->description = $request ->input('description');

      // pujada de la Miniatura
      $image = $request -> file ('image');
      if ($image){
        $image_path = time().$image->getClientOriginalName();
        \Storage::disk('images')->put($image_path, \File::get($image));
        $video -> image = $image_path;


      }


      $video_file = $request -> file ('video');
      if ($video_file){
        $video_path = time().$video_file->getClientOriginalName();
        \Storage::disk('videos')->put($video_path, \File::get($video_file));
        $video -> video_path = $video_path;


      }



      $video->save();

      return redirect() -> route('home')->with (array(
        'message' => 'El video ha estat pujat correctament!!'
      ));




  }

    //Mètodes per mostrar imatges

    public function getImage($filename) {
        $file= \Storage::disk('images') ->  get($filename);
        return new Response($file,200);
    }

    public function displayImage($filename)

    {




  $file= \Storage::disk('images') ->  get($filename);



        $response = Response::make($file, 200);


        return $response;

    }





}
