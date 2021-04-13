<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }


    public function create()
    {
        return view('admin.projects.create');
    }


    public function store(ProjectsRequest $request, Project $project)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $request['file'] = $project->sendFile($request->file('logo'));
        }
        $request['slug'] = Str::slug($request->name);
        $project->create($request->all());

        return redirect(route('projects.index'))->with('message', 'Projeto adicionado com sucesso !');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }


    public function update(ProjectsRequest $request, Project $project)
    {
        $request->validated();

        if ($request->hasFile('logo')) {
            $request['file'] = $project->sendFile($request->file('logo'));
        }
        $request['slug'] = Str::slug($request->name);
        $project->update($request->all());

        return redirect(route('projects.index'))->with('message', 'Projeto editado com sucesso !');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route('projects.index'))->with('message', 'Projeto deletado com sucesso !');
    }
}
