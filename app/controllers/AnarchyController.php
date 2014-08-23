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
        //We get the parameters given in the input text box
        $parameters = Input::get('a');

        //We search in our projects table for rows that match with any of sentences
        $query = Project::whereRaw("MATCH(name, description_es, description_en, resources_es, resources_en, base_address, addresses) AGAINST(? IN BOOLEAN MODE)", array($parameters));
        
        //If selfmanaged checkbox is selected, we make a filter
        if (Input::get('selfmanaged')) {
            $query->where('selfmanaged', 1);
        }
        
        //If vegan checkbox is selected, we make a filter
        if (Input::get('vegan')) {
            $query->where('vegan', 1);
        }
        
        //We ask the database for results, and we use LAravel pagination
        $projects = $query->paginate(10);
        
        //We load the list.blade.php view
        return View::make('list', compact('projects', 'parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function viewProject($id) {
        $project = Project::find($id);
        
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
