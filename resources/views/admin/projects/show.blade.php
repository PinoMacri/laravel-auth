@extends ("layouts.app")

@section("title", $project->title)

@section ("content")
<header>
    <div class="container">
        <h1 class="my-5">
            {{$project->title}}
        </h1>
        <p>
            {{$project->description}}
        </p>

         <a href="{{$project->github}}" target="_blank">Link Progetto a GitHub</a>
         <a href="{{route("admin.projects.index")}}" class="d-block">Ritorna ai Progetti</a>
    </div>
</header>

@endsection