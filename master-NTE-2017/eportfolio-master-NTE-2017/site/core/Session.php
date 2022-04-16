<?php


class Session {
    
    public function __construct() {
        if(!isset($_SESSION)){
            session_start();
            
        }
    }
    
    public function setFlash($message, $type = 'success'){
     $_SESSION['flash']= array(
         'message' => $message,
         'type' => $type
     );   
    }
    
    
    
    /*
     * setFlash commentaire
     */
    
    public function setFlashComment($message, $type = 'success'){
     $_SESSION['flash_com']= array(
         'message' => $message,
         'type' => $type
     );   
    }
    
    public function flash(){
        if(isset($_SESSION['flash']['message'])){
           $html =  '<div class="alert alert-'.$_SESSION['flash']['type'].'"><p>'. $_SESSION['flash']['message'].'</p></div>' ;
           $_SESSION['flash']= array();
           return $html;
        }  
    }
    
    /*
     * flash commentaire
     */
     public function flashComment(){
        if(isset($_SESSION['flash_com']['message'])){
           $html =  '<div class="alert alert-'.$_SESSION['flash_com']['type'].'"><p>'. $_SESSION['flash_com']['message'].'</p></div>' ;
           $_SESSION['flash_com']= array();
           return $html;
        }  
    }
    
    
    
    
    
    public function write($key, $value){
       $_SESSION[$key] = $value;  
    }
    public function read($key = NULL){
        if($key){
            if(isset($_SESSION[$key])){
                return $_SESSION[$key]; 
            }else{
              return FALSE;  
            }
        }else{
            return $_SESSION;
        }
        
    }
    
      public function islogged($key){
        return isset($_SESSION[$key]->role);
    }
    
    
    public function user($key){
        if($this->read('user')){
            if(isset($this->read('user')-> $key)){
                return $this->read('user')-> $key; 
            }else{
                return FALSE;
            }
        }
        return FALSE;
    }
}
