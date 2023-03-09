@extends("layouts.app")

@section("title","Projects")

@section("content")
@if(session("delete"))
<div class="alert alert-danger text-center">
{{session("delete")}}
</div>
@endif

@foreach ($projects as $project)
<div class="alert text-center alert-success alert-dismissible fade show" role="alert" style="display:none;" id="create-success-alert">
  <p>Il Progetto {{$project->title}} è stato creato con sucesso!</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach

<header>
<div class="container">
    <h1 class="my-5">Projects</h1>
    <a class="btn mb-3 btn-small btn-success" href="{{route("admin.projects.create")}}">Aggiungi <i class="fa-solid fa-plus"></i></a>
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Titolo</th>
              <th scope="col">Descrizione</th>
              <th scope="col">GIT Hub</th>
              <th scope="col">Stato</th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
           @forelse ($projects as $project)
           <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->title}}</td>
            <td>{{ Str::limit($project->description, 50)}}</td>
            <td>{{$project->github}}</td>
            <td>
              <form action="{{route("admin.projects.toggle", $project->id)}}" method="POST">
              @method("PATCH")
              @csrf
              <button type="submit" class="btn btn-outline">
                <i class="fas fa-toggle-{{$project->is_published ? "on" : "off"}}  {{$project->is_published ? "text-success" : "text-danger"}}"></i>
              </button>
              </form>
            </td>

            <td class="text-center">
                <a href="{{route("admin.projects.show", $project->id)}}" class="btn btn-small btn-primary"><i class="fa-solid fa-eye"></i></a>
                <a href="{{route("admin.projects.edit", $project->id)}}" class="btn btn-small btn-warning"><i class="fa-solid fa-pen"></i></a>
                <form class="delete-form d-inline" data-project="{{$project->title}}"  action="{{route("admin.projects.destroy", $project->id)}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                  </button>
                </form>
            </td>
           
          </tr>
           @empty
            <tr>
                <th scope="row" colspan="5" class="text-center">Non ci sono Progetti</th>
            </tr>
           @endforelse
          </tbody>
    </table>
   <div>
     {{$projects->links()}}
   </div>
</div>
</header>
@endsection

@section("scripts")
<script>
  const deleteForms=document.querySelectorAll(".delete-form");
  deleteForms.forEach(form=>{
    form.addEventListener("submit", (event)=>{
      event.preventDefault();
      const title=form.getAttribute("data-project");
      const confirm = window.confirm(`Sei sicuro di voler eliminare il progetto ${title}?`);
      if (confirm) form.submit();
    })
  });
</script>
@if (session()->has('success'))
    <script>
        document.getElementById('create-success-alert').style.display = 'block';
    </script>
@endif
@endsection