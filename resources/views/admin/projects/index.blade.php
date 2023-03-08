@extends("layouts.app")

@section("title","Projects")

@section("content")
<header>
<div class="container">
    <h1 class="my-5">Projects</h1>
    <a class="btn mb-3 btn-small btn-success" href="{{route("admin.projects.create")}}">Aggiungi <i class="fa-solid fa-plus"></i></a>
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">GIT Hub</th>
              <th></th>
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
                <a href="{{route("admin.projects.show", $project->id)}}" class="btn btn-small btn-primary"><i class="fa-solid fa-eye"></i></a>
                <a href="{{route("admin.projects.show", $project->id)}}" class="btn btn-small btn-warning"><i class="fa-solid fa-pen"></i></a>
            </td>
          </tr>
           @empty
            <tr>
                <th scope="row" colspan="4" class="text-center">Non ci sono Progetti</th>
            </tr>
           @endforelse
          </tbody>
    </table>
</div>
</header>
@endsection