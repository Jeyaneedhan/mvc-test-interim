<?php

/*
    Base controller
    --- Loads the models and views
*/

class Controller
{
    // To load the model
    public function model($model)
    {
        // Require model file
        require_once '../app/models/' . $model . '.php';

        // Instentiate the model and pass it to the controller member variable
        return new $model();
    }

    // To load the view
    public function view($view, $data = [])
    {
        // Check for the view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View doesnt exists
            die('View does not exist');
        }
    }
}
