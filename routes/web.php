<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
foreach ($video->comments  as $coment {
  // code...
  echo $comment->body;

}

$videos=video::all();

foreach ($videos as $video) {
  // code...

echo $video->title;
echo $video->user->email.'<br/>';


  echo "<hr/>";
}





*/

Use App\Video;
Route::get('/',function() {
return view ('welcome');

});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');





//Rutes del controlador de Videos
Route::get('/crear-video', array (
  'as'=>'createVideo',
  'middleware'=>'auth',
  'uses' =>'VideoController@createVideo'

));

Route::post('/guardar-video', array (
  'as'=>'saveVideo',
  'middleware'=>'auth',
  'uses' =>'VideoController@saveVideo'

));
