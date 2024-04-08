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
            'name' => ['required', 'max_length' => 26],
            'description' => ['required', 'max_length' => 255],
            'project_url' => ['required', 'url'],
            'image_url' => ['required']
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $responce['project'] = $this->project->find($id);
        return view('')->with($responce);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->project->find($id)->update($request->all());
        return redirect()->back();
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
