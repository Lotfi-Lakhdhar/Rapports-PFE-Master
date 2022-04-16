<?php


class Request {
   
    
    public $url; //URL appellé par utilisateur
    public $page = 1;
    public $prefix = false;
    public $data = false;
    
    
    public function __construct() {
        $this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/' ;
        
        if(isset($_GET['page'])){
            if(is_numeric($_GET['page'])){
                if( $_GET['page'] > 0){
                   $this->page = round($_GET['page']) ;  
                }
            
            }
        }
        
         if(isset($_GET['recherche'])){
         $this->recherche = $_GET['recherche'] ;  
        }
        
        
        if(!empty($_POST)){
            $this->data = new stdClass();
            foreach($_POST as $k => $v ){
                $this -> data -> $k = $v;
            }
        }
    }
    
}
