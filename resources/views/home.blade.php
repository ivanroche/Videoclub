@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if (session('message'))
              <div class="alert alert-success">
                  {{session('message')}}
              </div>
            @endif

            <ul id="videos-list">

              @foreach ($videos as $video)
                <li class="video-item  col-md-4 pull-left">
                    <!--imatge del video-
                    <img src ="{{url('/miniatura/1583657498ivan.jpg')}}"  style="width: 30%; height: 30%;"/>
                   <img src="/storage/public/1583657498ivan.jpg" style="width: 100%; height: 100%;"/> -->


                   @if(Storage::disk('images')->has ($video->image))
                    <img src ="{{url('/miniatura/'.$video->image)}}"  style="width: 30%; height: 30%;"/>
                    @endif

                    <div class="data">
                    <h4>{{$video->title}}</h4>
                  </div>
                    <!--botons d'acció-->

                </li>
                @endforeach
              </ul>
        </div>

        {{$videos->links()}}

    </div>
</div>
@endsection
