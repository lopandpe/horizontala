<?php

class AdminController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('hello');
    }

    /**
     * Muestra el formulario para login.
     */
    public function showLogin() {
        // check if the user is already authenticated
        if (Auth::check()) {
            return Redirect::to('/');
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('admin/form');
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
