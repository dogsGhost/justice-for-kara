<?php
class PageData {
    private $logInOut;
    private $admin;
    private $path;
    public function __construct() { }

    //these getter functions return the private property values to the
    //calling object.
    public function getAdminScript(){
        return $this->adminScript;   
    }
    
    public function getLogout(){
        return $this->logout;   
    }
    
    public function getLogInOut(){
        return $this->logInOut;   
    }
    
    public function getAdmin(){
        return $this->admin;   
    }
    
    //This loads the scripts needed based upon whether we are in admin or non-admin mode.
    public function pageSetup() {
        session_start();
        /*By default I call the mainobj.init of the main script
        this only contains methods for the pages when they are
        in non admin mode
        */
        $this->logout="";

        //If in admin mode the extra scripts load and the page is editable
        if (isset($_SESSION['admin'])){
            if ($_SESSION['admin']==='authorized'){

                /*set the $admin flag to true so the application knows it is
                in admin mode*/
                $this->admin=true;
            }
        }
         //since a sesssion was created using the session start but not needed because
        //we are in non-admin mode then remove session and cookie.
        else {
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            $this->admin=false;
            session_destroy();
        }
    }   
}
