@extends("layouts.app")

@section("title","Crea Progetto")

@section("content")
<main>
    <div class="container my-5">
     <form class="row g-3" action="{{route("admin.projects.store")}}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" value="{{old("title")}}">
        </div>
        <div class="col-md-6">
          <label for="github" class="form-label">Link GIT-Hub</label>
          <input type="text" class="form-control" id="github" name="github" value="{{old("github")}}">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Descrizione</label>
          <textarea name="description" id="description" cols="173" rows="3">{{old("description")}}</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{old("image")}}">
          </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Aggiungi</button>
        </div>
      </form> 
              
    </div>
</main>
@endsection