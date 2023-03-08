@extends("layouts.app")

@section("title","Projects")

@section("content")
<header>
<div class="container">
    <h1 class="my-5">Projects</h1>
    <a class="btn btn-small btn-primary" href="{{route("admin.projects.create")}}">Aggiungi</a>
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
              <th scope="col">#</th>
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
            <td>{{$project->description}}</td>
            <td>{{$project->github}}</td>
            <td>
                <a href="{{route("admin.projects.show", $project->id)}}" class="btn btn-small btn-primary"><i class="fa-solid fa-eye"></i></a>
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