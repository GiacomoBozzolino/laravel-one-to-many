<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data =  $request ->all();
        $project =new Project ();
    //    creazione nuovo slug
        $form_data ['slug'] = $project ->generateSlug($form_data['name']);

        if($request->hasFile('img')){
            $path =Storage::put('project_imeges' , $request->img);
            $form_data['img']=$path;
        }

        $project ->fill ($form_data);
        $project ->save();

        return redirect()->route ('admin.projects.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view ('admin.projects.show', compact ('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data =  $request ->all();
    //    creazione nuovo slug
        $form_data ['slug'] = $project ->generateSlug($form_data['name']);

        if($request->hasFile('img')){
            // ISERISCO CONTROLLO PER CANCELLAZIONE IMG GIA PRESENTE
                if($project->img){
                    Storage::delete($project->img);
                }
            $path =Storage::put('project_imeges' , $request->img);
            $form_data['img']=$path;
        }


        $project ->update ($form_data);
        return redirect()->route ('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
