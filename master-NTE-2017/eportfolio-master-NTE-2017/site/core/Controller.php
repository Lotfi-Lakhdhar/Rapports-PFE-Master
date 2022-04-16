<?php


class Controller {
    
    public $request;
    private $vars = array();
    public $layout = 'default';
    private $rendered = FALSE;
    
    public function __construct($request = NULL) {
        
             $this->Session = new Session();
             $this->Form = new Form($this);
             $this->Comments = new Comments($this);
             
        if($request){   
          $this -> request = $request ; 
        require ROOT.DS.'config'.DS.'hook.php';  
        }
        
    }
   public function render($view){
       
       if($this-> rendered){           
           return FALSE;
           
       }
       extract($this-> vars);
       
       if(strpos($view,'/') === 0 ){
           
         $view = ROOT.DS.'view'.$view.'.php';
         
       }else{
           
      $view = ROOT.DS.'view'.DS.$this->request -> controller.DS.$view.'.php'; 
      
       }
      ob_start();
      
      require($view);
      
      $content = ob_get_clean();
      require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
      $this-> rendered = TRUE;
    }
    
    public function set($key, $value = NULL){
       if(is_array($key)){
           
           $this-> vars += $key;
       }else{
        $this-> vars[$key] = $value;
       }
    }
    
    public function loadModel($name){
     $file = ROOT.DS.'model'.DS.ucfirst($name).'.php';  
     require_once($file);
     
     if(!isset($this->$name)){
      $this->$name = new $name(); 
      
      if(isset($this -> Form)){
        
      $this -> $name -> Form = $this->Form;
      //debug($this-> $name->Form);  
      }
      
      
      
      
      
      
      
      
      
      }
     }
     
     public function e404($message){
        header('HTTP/1.0 404 Not Found') ;  
        $this-> set('message',$message);
        $this ->render('/errors/404');
        die();
     }
     
     
     /**
      * Permet d'appeller un controller depuis une vue
      */
     public function request($controller, $action){
        $controller .= "controller";
        $controller = ucfirst($controller);
        require_once ROOT.DS.'/controller/'.DS.$controller.'.php';
        $c = new $controller(); 
        return $c-> $action();
     }
     
     public function redirect($url, $code = NULL){
       if($code == 301){
     header("HTTP/:1.1 301 Moved Permanently"); 
       }
      header("Location:".Router::url($url));
     }
}
