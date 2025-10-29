<?php

/*
        APP CORE CLASS
        ---Create URL & loads core controller
        ---URL format -> /controller/method/params
*/

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getURL();
        // print_r($this->getURL());

        /* ---------- PART 1 - LOOKING OF THE CONTROLLER ---------- */
        // Look in controllers for the first value
        // ucwords() - Capitalize the first letter (Because of our controller naming convention)

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // If file exist set as a controller
            $this->currentController = ucwords($url[0]);

            // Unset the controller in the URL
            unset($url[0]); // Remove controller from URL array (keep the URL array clean and only contain the parts we haven't processed yet)

            // Call the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instentiate controller class
            $this->currentController = new $this->currentController;


            /* ---------- PART 1 - LOOKING OF THE METHOD ---------- */
            // Check second part of the URL
            if (isset($url[1])) {
                // Check whether method exists in the controller or not
                if (method_exists($this->currentController, $url[1])) {
                    // If method exist set as a method
                    $this->currentMethod = $url[1];

                    // Unset 1 index
                    unset($url[1]);
                }
            }

            /* ---------- PART 1 - LOOKING OF THE PARAMETERS ---------- */
            // Get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with the array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
    }

    public function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');                // Trim using /
            $url = filter_var($url, FILTER_SANITIZE_URL);   // Getting rid of characters that URL should not have
            $url = explode('/', $url);                      // Seperate each term as a element to an array. Delimeter is /
            return $url;                                    //http://localhost/project/public/test/user then return is Array ( [0] => test [1] => user )
        }
    }
}
