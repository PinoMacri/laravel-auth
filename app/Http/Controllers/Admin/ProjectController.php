<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects=Project::orderBy("updated_at", "DESC")->get();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        "title"=>"required|string|unique:projects|min:5|max:50",
        "description"=>"required|string",
        "image"=>"url|nullable",
        "github"=>"required|url|max:100",
        ], [
            "title.required" => "ERROR - il titolo è obbligatorio",
            "title.unique" => "ERROR - il titolo $request->title è gia presente",
            "title.min" => "ERROR - la lunghezza del titolo deve essere almeno di 5 caratteri",
            "title.max" => "ERROR - la lunghezza del titolo non deve superare i 50 caratteri",
            "description.required" => "ERROR - la descrizione è obbligatoria",
            "image.url" => "ERROR - devi inserire un URL",
            "github.required" => "ERROR - il link al progetto è obbligatorio",
            "github.url"=> "ERROR - devi inserire un URL",
            "github.max"=> "ERROR - la lunghezza del titolo non deve superare i 100 caratteri, controlla che sia un link github",
        ]);
        $data = $request->all();
        $project=new Project();
        $project->fill($data);
        $project->save();
        return redirect()->route("admin.projects.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}