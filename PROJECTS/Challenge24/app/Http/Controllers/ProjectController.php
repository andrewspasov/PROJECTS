<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function home()
    {
        $projects = Project::all();
        return view('home', compact('projects'));
    }

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required|max:200',
            'image_url' => 'required|url',
            'project_url' => 'required|url'
        ]);

        Project::create($request->all());

        return redirect()->route('projects.create')->with('success', 'Продуктот е успешно додаден!');
    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required|max:200',
            'image_url' => 'required|url',
            'project_url' => 'required|url'
        ]);

        $project->update($request->all());

        return redirect()->route('home')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('home')->with('success', 'Project deleted successfully.');
    }
}
