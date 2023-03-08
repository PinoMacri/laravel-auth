@extends("layouts.app")

@section("title","Modifica")

@section("content")
<main>
    <div class="container my-5">
    <form action="{{route ("admin.projects.update", $project->id)}}" method="POST">
    @csrf
    @method("PUT")
    <div class="col-md-6">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
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
        <input type="text" class="form-control  @error('github') is-invalid @enderror" id="github" name="github"  value="{{ old('github', $project->github) }}">
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
        <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description" cols="173" rows="3"> {{old('description', $project->description)}}</textarea>
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
          <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image',$project->image)}}">
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
        <button type="submit" class="btn btn-warning">Modifica</button>
        <a href="{{route("admin.projects.index")}}" class="d-block">Ritorna ai Progetti</a>
      </div>
    </form> 
</div>
</main>
@endsection