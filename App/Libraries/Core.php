<?php  namespace Library;

 class Core{
    private $currentController = 'Pages';
    private $currentMethod = 'index';
    private $params;

    public function __construct()
    {
        // URL
        $url = $this->getUrl();
        
        // First Part Of URL example.com/Pages #Controller
        if(file_exists(APPROOT.'/Controllers/'. ucwords($url[0]).".php"))
        {
            $this->currentController = ucwords($url[0]);

            // UNSET first value in array
            unset($url[0]);
        }

        include_once(APPROOT."/Controllers/". $this->currentController .'.php');

        $this->currentController = new $this->currentController;



        // Second Part Of URL example.com/Pages/users

        if(isset($url[1]))
        {
            //Check if Method exitst inside Class
            if(method_exists($this->currentController,$url[1]))
            {
                //If exist set in currentMethod varible
                $this->currentMethod = $url[1];

                unset($url[1]);
            }
        }

        

          //Get params
          $this->params = $url ? array_values($url) : [];
          call_user_func_array([$this->currentController,$this->currentMethod],$this->params);


    }

    private function getUrl()
    {
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = filter_var($url,FILTER_SANITIZE_STRING);
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            

            return $url;
        }
    }
 }


