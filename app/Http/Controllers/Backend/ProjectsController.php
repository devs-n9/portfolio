<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App;
use File;
use Image;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        
        return view('dashboard.project', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('project.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();
        $this->validate($request, [
            'name' => 'required|max:60',
            'client' => 'required|max:60',
            'description' => 'required',
            'preview' => 'required|mimes:jpeg,png|max:15000'
        ]);
        
        $file = $request->file('preview');
        $path = public_path('img/portfolio/');
        $filename = $file->hashName();
        
        $file->move($path, $filename);        

        $img = Image::make($path . $filename)
            ->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($path . 'preview_' . $filename, 20);

        $data['preview'] = $filename;
        
        Project::create($data);
        
        return redirect('/dashboard/projects');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $project = Project::find($id);
        return view('project.edit', [
            'project' => $project,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
		
        $this->validate($request, [
            'name' => 'required|max:60',
            'client' => 'required|max:60',
            'description' => 'required'
        ]);
        
        $file = $request->file('preview');
		
		$project = Project::find($id);
		
		if(!empty($file)){
			$this->validate($request, [
				'preview' => 'required|mimes:jpeg,png|max:15000'
			]);
			
			$path = public_path('img/portfolio/');
			$filename = $file->hashName();
			
			$oldfile = $path . $project->preview;
            $oldfilePreview = $path . 'preview_' . $project->preview;
		
			if(File::isFile($oldfile)){
				File::delete($oldfile);
                File::delete($oldfilePreview);
			}
			
			$file->move($path, $filename);
            dd($img = Image::make($path . $filename)->exif());
            $img = Image::make($path . $filename)
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($path . 'preview_' . $filename, 80);

			$data['preview'] = $filename;
		}
		
        
        $project->update($data);
        
        return redirect('/dashboard/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$path = public_path('img/portfolio/');
		
        $project = Project::find($id);
		
		$file = $path . $project->preview;
		
		if(File::isFile($file)){
			File::delete($file);
		}
		
        $project->delete();
        
        return redirect('/dashboard/projects');
    }
}
