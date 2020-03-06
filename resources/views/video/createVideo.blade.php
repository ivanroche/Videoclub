@extends('layouts.app')

@section('content')

<div class="container">
    <h2> Crear un nou Video </h2>
  <div class="row">

<br>

  <form action="{{Route('saveVideo')}}" method="post" enctype="multipart/form-data" class="col-lg-7">
@csrf

  @if($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li> {{$error}}</li>
         @endforeach
      </ul>
    </div>
  @endif



    <div class="form-group">
        <label for="title">Títol</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Escriu titol">
              <small id="emailHelp" class="form-text text-muted">Dona un títol original al teu  vídeo</small>
    </div>
    <div class="form-group">
        <label for="description">Descripció</label>
            <input type="text" class="form-control" id="description" name="description"  placeholder="Descripció Vídeo">
    </div>

      <div class="form-group">
        <label for="image">Imatge Miniatura</label>
        <input type="file" class="form-control" id="image" name="image"/>
      <div class="form-group">
        <label for="video">Video</label>
        <input type="file" class="form-control" id="video" name="video"/>
      </div>


<button type="submit" class="btn btn-success">Pujar Video</button>
</form>

</div>
</div>
@endsection
