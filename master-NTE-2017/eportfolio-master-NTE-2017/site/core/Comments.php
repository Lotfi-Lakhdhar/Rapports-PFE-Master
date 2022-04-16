<?php


class Comments extends Controller{
    
   public $controller;
   private $options = array(
       
      'username_error'  => "Vous n'avez pas renté de pseudo",
       
       'email_error'   => "Votre email n'est pas valide",
       
       'content_error'   => "Vous n'avez pas mis de message"
   );
   
   public $error = array();




   public function __construct($controller) {
        
        $this->controller = $controller; 
       
    }
    
    
   public function findAll($ref, $ref_id) {
    
    
    $this -> loadModel('comment');   
    
     $comments = $this->comment -> find(array(
            'conditions' => array('ref_id' => $ref_id , 'ref' => $ref),
            'order'     => 'created',
             'by'       => 'DESC'
        ));
    $this->count = count($comments); // On stocke le compteur dans l'instance
    
   
      // Filtrage des réponses
    $replies  = [];
    foreach($comments as $k => $comment){
        if ($comment->parent_id){
            $replies[$comment->parent_id][] = $comment;
            unset($comments[$k]);
        }
    }
    foreach($comments as $k => $comment){
        if (isset($replies[$comment->id])) {
            $comments[$k]->replies = array_reverse($replies[$comment->id]);
        }else{
            $comments[$k]->replies = [];
        }
    }
    
    return $comments; 
} 
/*
 * soumission d'un commentaire
 */
function getComment($id,$type){
     
    if(isset($this -> controller->request -> data -> action) && ($this -> controller->request -> data -> action === 'comment') ){
        
     
          
         if($this->comment->validates($this -> controller -> request -> data)){
             
          if (!empty($this -> controller -> request -> data->parent_id)) {
             
              $this -> loadModel('comment');   
    
              $q = $this->comment -> find(array(
            'conditions' => array(
                'ref_id' => $id ,
                'ref' => $type,
                'id' => $this -> controller -> request -> data->parent_id,
                'parent_id' => 0 )
           )); 
          
            if(Count($q) <= 0){
                 $this->redirect($this -> controller -> request -> url);
            }
        }
             
             
             
             
         $this -> controller->request -> data -> created = date('y-m-d h:i:s'); 
         $this -> controller->request -> data -> ref_id = $id;
         $this -> controller->request -> data -> ref = $type;
         unset($this -> controller -> request -> data -> action);
          
         $this -> comment -> save($this -> controller->request -> data);
        $this -> controller -> Session->setFlashComment("Votre commentaire a été bien posté", 'success');
         $this->redirect($this -> controller -> request -> url);
         
         }else{
             
             /*
              * les erreurs envoyer au formulaire
              */
            $this->controller->Form->errors =$this->comment->errors; 
            //debug($this->comment);
            //debug($this->controller->Form->errors);
            $this-> controller-> Session->setFlashComment('Merci de corriger vos informations', 'danger'); 
         } 
               
    }
    
}
    
    
    
    
}
