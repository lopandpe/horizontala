<?php

class AdminController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $projects = Project::all();

        return View::make('admin/index', compact('projects'));
    }

    /**
     * Muestra el formulario para login.
     */
    public function showLogin() {
        // check if the user is already authenticated
        if (Auth::check()) {
            return Redirect::to('admin/projects');
        }
        // show the form-login view
        return View::make('admin/login');
    }

    /**
     * Valida los datos del usuario.
     */
    public function postLogin() {
        // We save data into an array
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        // validate data
        if (Auth::attempt($userdata)) {
            // if is valid
            return Redirect::to('admin');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('login')
                        ->with('error_message', 'Tus datos son incorrectos')
                        ->withInput();
    }

    /**
     * logour-form
     */
    public function logOut() {
        Auth::logout();
        return Redirect::to('/')
                        ->with('error_message', 'Tu sesión ha sido cerrada.');
    }

    /**
     * Form to add a new project
     */
    public function newProject() {
        // check if the user is already authenticated
        if (Auth::check()) {
            $project = new Project;
            $data = null;
            return View::make('admin/new_project')->with('project', $project);
        }
        // show the form-login view
        return View::make('admin/login');
    }

    /**
     * Validate and save project or return to the view
     */
    public function postProject() {

        $project = new Project;


        // take all the form data
        $data = Input::all();
        // isValid is defined in Project.php
        if ($project->isValid($data)) {


            //If there is a image in the upload
            if (is_object(Input::file('image_or_logo')) && Input::file('image_or_logo')->getSize() > 0) {

                $file = Input::file('image_or_logo');

                $extension = $file->getClientOriginalExtension();

                //We want to save the image at /assets/img/projects with the name of the project without white spaces
                $name = str_replace(' ', '-', $data['name']);


                //concat the extension
                $name .= '.' . $extension;

                //destination folder
                $dest = public_path() . '/assets/img/projects/';

                //moving the file
                $file->move($dest, $name);

                //we save in DB the route of the file
                $data['image_or_logo'] = '/assets/img/projects/' . $name;
            }



            // if all data is valid, we store in $project 
            $project->fill($data);
            // and we save it in DB
            $project->save();

            //Redirect to the creating project view with an empty project, and a success message
            $project = new Project;
            return View::make('admin/new_project')->with('project', $project)->with('success', '¡ok!');
        } else {
            // if $data is no valid, we recharge the view with error messages
            return View::make('admin/new_project')->with('project', $project)->with('data', $data)->withErrors($project->errors);
        }
    }

    /**
     * Form to edit a project
     */
    public function editProject($id) {
        // check if the user is already authenticated
        if (Auth::check()) {
            $project = Project::find($id);
            return View::make('admin/edit_project')->with('project', $project);
        }
        // show the form-login view
        return View::make('admin/login');
    }

    /**
     * Validate and save project or return to the view
     */
    public function postEditProject($id) {
        $project = Project::find($id);

        // take all the form data
        $data = Input::all();
        // isValid is defined in Project.php
        if ($project->isValid($data, $id)) {


            //If there is a image in the upload
            if (is_object(Input::file('image_or_logo')) && Input::file('image_or_logo')->getSize() > 0) {

                $file = Input::file('image_or_logo');

                $extension = $file->getClientOriginalExtension();

                //We want to save the image at /assets/img/projects with the name of the project without white spaces
                $name = str_replace(' ', '-', $data['name']);


                //concat the extension
                $name .= '.' . $extension;

                //destination folder
                $dest = public_path() . '/assets/img/projects/';

                //moving the file
                $file->move($dest, $name);

                //we save in DB the route of the file
                $data['image_or_logo'] = '/assets/img/projects/' . $name;
            }



            // if all data is valid, we store in $project 
            $project->fill($data);
            // and we save it in DB
            $project->save();

            //Redirect to the creating project view with an empty project, and a success message
            $project = new Project;
            return Redirect::to('admin')->with('success', '¡ok!');
        } else {
            // if $data is no valid, we recharge the view with error messages
            return View::make('admin/edit_project')->with('project', $project)->with('data', $data)->withErrors($project->errors);
        }
    }

    /**
     * Validate and save logo project or return to the view
     */
    public function postLogo($id) {
        $project = Project::find($id);

        // take image
        $data = Input::all();
        
        // isValid is defined in Project.php
        if ($project->isValid($data, $id)) {
            if (is_object(Input::file('image_or_logo')) && Input::file('image_or_logo')->getSize() > 0) {

                $file = Input::file('image_or_logo');

                $extension = $file->getClientOriginalExtension();

                //We want to save the image at /assets/img/projects with the name of the project without white spaces
                $name = str_replace(' ', '-', $data['name']);


                //concat the extension
                $name .= '.' . $extension;

                //destination folder
                $dest = public_path() . '/assets/img/projects/';

                //moving the file
                $file->move($dest, $name);

                //we save in DB the route of the file
                $data['image_or_logo'] = '/assets/img/projects/' . $name;
            }
            // if all data is valid, we store in $project 
            $project->fill($data);
            // and we save it in DB
            $project->save();

            //Redirect to the creating project view with an empty project, and a success message
            $project = new Project;
            return Redirect::to('admin')->with('success', '¡ok!');
        }
            // if image is no valid, we recharge the view with error message
        
            return Redirect::to('admin')->withErrors($project->errors);
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

        $projects = $query->paginate(10);


        return View::make('admin.index', compact('projects', 'parameters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteProject($id) {
        $project = Project::find($id);
        $project->delete();
        return Redirect::to('admin');
        
    }

}
