<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $project;

    public function __construct()
    {
        $this->project = new project();
    }

    public function index()
    {
        $response['projects'] = $this->project->all();
        return view('welcome')->with($response);
    }

    public function showProjects()
    {
        $projects = $this->project->all();
        return view('/dashboard')->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:26'], // Maximum length of 26 characters
            'description' => ['required', 'max:255'], // Maximum length of 255 characters
            'project_url' => ['required', 'url'], // Must be a valid URL
            'image_url' => ['required'] // No validation on image_url provided, you can add it as needed
        ]);

        $this->project->create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->project->find($id);
    }


    public function edit(Request $request, string $id)
    {
        $project = $this->project->find($id);

        if ($project) {
            $project->update($request->all());

            return redirect()->back()->with('success', 'Project updated successfully!');
        } else {
            // Handle the case where the project is not found
            return redirect()->back()->with('error', 'Project not found!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->project->find($id)->delete();
        return redirect()->back();
    }
}
