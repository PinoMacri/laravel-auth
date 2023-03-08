@extends("layouts.app")

@section("title","Crea Progetto")

@section("content")
<main>
  
  <div class="container">
    

    <div class="container my-5">
     <form class="row g-3" action="{{route("admin.projects.store")}}" method="POST">
        @csrf
        <!-- Titolo -->
        <div class="col-md-6">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" @error("title") value="" @enderror value="{{ old('title') }}">
        @if($errors->has("title"))
        <ul class="alert list-unstyled alert-danger m-0  d-flex flex-column justify-content-center">
        @foreach ($errors->get('title') as $error)
            <li class="m-0">{{ $error }}</li>
        @endforeach
        </ul>
        @endif
        </div>
        <!-- GIT Hub -->
        <div class="col-md-6">
          <label for="github" class="form-label">Link GIT-Hub</label>
          <input type="text" class="form-control  @error('github') is-invalid @enderror" id="github" name="github" @error("github") value="" @enderror value="{{ old('github') }}">
          @if($errors->has("github"))
        <ul class="alert list-unstyled alert-danger ps-2 d-flex flex-column justify-content-center">
        @foreach ($errors->get('github') as $error)
            <li class="m-0">{{ $error }}</li>
        @endforeach
        </ul>
        @endif
        </div>
        <!-- Descrizione -->
        <div class="col-12">
          <label for="description" class="form-label">Descrizione</label>
          <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" cols="173" rows="3">@error('description')@enderror {{old('description')}}</textarea>
          @if($errors->has("description"))
          <ul class="alert list-unstyled alert-danger ps-2 d-flex flex-column justify-content-center">
            @foreach ($errors->get('description') as $error)
                <li class="m-0">{{ $error }}</li>
            @endforeach
            </ul>
            @endif
        </div>
        <!-- Immagine -->
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" @error("image") value="" @enderror value="{{old('image')}}">
            @if($errors->has("image"))
            <ul class="alert list-unstyled alert-danger ps-2 d-flex flex-column justify-content-center">
              @foreach ($errors->get('image') as $error)
                  <li class="m-0">{{ $error }}</li>
              @endforeach
              </ul>
              @endif
        </div>
        <!-- Bottone -->
        <div class="col-12">
          <button type="submit" class="btn btn-success">Aggiungi</button>
        </div>
      </form> 
              
    </div>
</main>
@endsection