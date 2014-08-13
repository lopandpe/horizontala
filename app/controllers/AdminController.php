<?php

class AdminController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('admin/projects');
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
    public function postLogin()
    {
        // We save data into an array
        $userdata = array(
            'username' => Input::get('username'),
            'password'=> Input::get('password')
        );
        // validate data
        if(Auth::attempt($userdata))
        {
            // if is valid
            return Redirect::to('/');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('login')
                    ->with('error_message', 'Tus datos son incorrectos')
                    ->withInput();
    }

    
    /**
     * logour-form
     */
    public function logOut()
    {
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
        if ($project->isValid($data)){ 
            
            
            //If there is a image in the upload
            if(is_object(Input::file('image_or_logo')) && Input::file('image_or_logo')->getSize() > 0){
                
                $file = Input::file('image_or_logo');
                
                $extension = $file->getClientOriginalExtension();
                
                //We want to save the image at /assets/img/projects with the name of the project without white spaces
                $name = str_replace(' ', '-',$data['name']);
                
                
                //concat the extension
                $name .= '.'.$extension;
                
                //destination folder
                $dest = public_path().'/assets/img/projects/';
                
                //moving the file
                $file->move($dest, $name);
                
                //we save in DB the route of the file
                $data['image_or_logo'] = '/assets/img/projects/'.$name.'.'.$extension;
            }
            
                
            
            // if all data is valid, we store in $project 
            $project->fill($data);
            // and we save it in DB
            $project->save();
            
            //Redirect to the creating projects view with an empty project, and a success message
            $project = new Project;
            return View::make('admin/new_project')->with('project', $project)->with('success', '¡Añadido con éxito!');
        }
        else
        {
            // if $data is no valid, we recharge the view with error messages
            return View::make('admin/new_project')->with('project', $project)->with('data', $data)->withErrors($project->errors);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        return Input::all();
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
