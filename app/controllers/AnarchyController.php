<?php

class AnarchyController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('index');
    }

    /**
     * Show the list of projects matching with the search.
     *
     */
    public function search() {
        $parameters = Input::get('a');
        $query = Project::whereRaw("MATCH(name, description_es, description_en, resources_es, resources_en, base_address, addresses) AGAINST(? IN BOOLEAN MODE)", array($parameters));

      


        if (Input::get('selfmanaged')) {
            $query->where('selfmanaged', 1);
        }

        if (Input::get('vegan')) {
            $query->where('vegan', 1);
        }
        
//          $query->orderByRaw("MATCH(name, description_es, description_en, resources_es, resources_en, base_address, addresses) AGAINST(? IN BOOLEAN MODE) DESC", array($parameters));
//        $query->orderBy(DB::raw("MATCH(name, description_es, description_en, resources_es, resources_en, base_address, addresses) AGAINST(".$parameters." IN BOOLEAN MODE)"));
        $query->orderBy(DB::raw("MATCH(name, description_es, description_en, resources_es, resources_en, base_address, addresses) AGAINST('$parameters' IN BOOLEAN MODE)"), "DESC");
        
        $projects = $query->paginate(5);
        
        
        return View::make('list', compact('projects', 'parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function viewProject($id) {
        
        $project = Project::find($id);
        
        if(!isset($project)){
            return View::make('no_project');
        }
                    
        //We load the project.blade.php view
        return View::make('project', compact('project'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
