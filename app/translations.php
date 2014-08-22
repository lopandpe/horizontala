<?php

// Set locales allowed.

$localesAllowed = array('es', 'en');

// Set default language.
// It should matchs with $localesAllowed array.

define('DEFAULT_LANG', 'es');

// Set default language if lang session do not exits.

if (!Session::has('locale')){
    Session::put('locale', DEFAULT_LANG);   
}
// Forcing to change language passing the locale via GET.

if (Input::has('lang')){
    if (in_array(Input::get('lang'), $localesAllowed)){
        Session::put('locale', Input::get('lang'));
    }else {    
        Session::put('locale', DEFAULT_LANG);
    }
}
// Overwrite locale in /app/config/app.php file.
// Make translation

App::setLocale(Session::get('locale'));