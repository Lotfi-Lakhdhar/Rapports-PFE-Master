<?php


class PostsController extends Controller{

   
    public function index(){
        $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('online' => 1, 'type' => 'projet');
        $d['posts'] = $this-> post-> find(array(
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        $d['total'] = $this->post-> findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $d['paggg']= true;
        
        $this->set($d);    
    }
    
      public function index_1(){
        $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('online' => 1, 'type' => 'tache');
        $d['posts'] = $this-> post-> find(array(
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        $d['total'] = $this->post-> findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $d['paggg']= true;
        $this->set($d);    
    }
    
         public function index_2(){
        $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('online' => 1, 'type' => 'carnet');
        $d['posts'] = $this-> post-> find(array(
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        $d['total'] = $this->post-> findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $d['pagg']= true;
        $this->set($d);    
    } 
   
    
  
    
    
    public function view($id, $slug){
        $this->loadModel('post');
        $condition = array('online' => 1,'id' => $id, 'type' => 'projet');
        $d['post'] = $this->post -> findFirst(array(
            
            'conditions' => $condition
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        if(empty($d['post'])){
            $this->e404('page introuvable');
        }
        if($slug != $d['post']->slug){
            $this-> redirect("posts/view/id:$id/slug:".$d['post']->slug, 301);
        }
         $d['paggg']= true;
         $this->set($d); 
    }
    
      public function view_1($id, $slug){
        $this->loadModel('post');
        $condition = array('online' => 1,'id' => $id, 'type' =>'tache');
        $d['post'] = $this->post -> findFirst(array(
            //'fields'  => 'id,slug,content,name,created',
            'conditions' => $condition
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        if(empty($d['post'])){
            $this->e404('page introuvable');
        }
        if($slug != $d['post']->slug){
            $this-> redirect("posts/view_1/id:$id/slug:".$d['post']->slug, 301);
        }
         $d['paggg']= true;
         $this->set($d); 
    }
    
     public function view_2($id, $slug){
        $this->loadModel('post');
        $condition = array('online' => 1,'id' => $id, 'type' => 'carnet');
        $d['post'] = $this->post -> findFirst(array(
           // 'fields'  => 'id,slug,content,name,created',
            'conditions' => $condition
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        if(empty($d['post'])){
            $this->e404('page introuvable');
        }
        if($slug != $d['post']->slug){
            $this-> redirect("posts/view_2/id:$id/slug:".$d['post']->slug, 301);
        }
         $d['pagg']= true;
         $this->set($d); 
    }
    
    public function view_p($id = null , $slug = null){
        $this->loadModel('post');
        $condition = array('online' => 1, 'type' => 'presentation');
        $d['post'] = $this->post -> findFirst(array(
            
            'conditions' => $condition
        ));
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
        if(empty($d['post'])){
            $this->e404('page introuvable');
        }
        if($slug != $d['post']->slug){
            $this-> redirect("posts/view_p/id:{$d['post']->id}/slug:".$d['post']->slug, 301);
        }
         $d['paggg']= true;
         $this->set($d); 
    }
    
    /*
     * admin
     */
    public function admin_index(){
        
           $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('type' => 'projet');
        $d['posts'] = $this-> post-> find(array(
            'fields'     => 'id,name,online',
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $d['total'] = $this->post-> findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);    
    } 
    
    public function admin_index_1(){
        
           $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('type' => 'tache');
        $d['posts'] = $this-> post-> find(array(
            'fields'     => 'id,name,online',
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $d['total'] = $this->post-> findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);    
    } 
    
     public function admin_index_2(){
        
           $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('type' => 'carnet');
        $d['posts'] = $this-> post-> find(array(
            'fields'     => 'id,name,online',
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $d['total'] = $this->post-> findCount($condition);
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);    
    }
    
     /*
     * admin index presentation
     */
        public function admin_index_p(){
        
           $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('type' => 'presentation');
        $d['posts'] = $this-> post-> find(array(
            'fields'     => 'id,name,online',
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $this->set($d);    
    }
    
    
    
    
    /*
     * permet de supprimer un projet
     */
    public function admin_delete($id){
      $this->loadModel('post');
      /*
       * le chois selon le type de page à supprimer
       */
      $type = $this->post->findFirst(array(
                  'conditions' => array('id' => $id
                      )));
      
      $choix = $type->type;
      if($choix == 'projet'){
        $index = 'index';  
      }elseif($choix == 'tache'){
       $index = 'index_1';    
      }elseif($choix == 'carnet'){
       $index = 'index_2'; 
      }elseif($choix == 'presentation'){
       $index = 'index_p'; 
      }
      $this->post-> delete($id);
      $this->Session->setFlash('Le contenu à bien été supprimé ');
       $this->redirect('admin/posts/'.$index);
    }
    
 
    
    /*
     * permet d'éditer un article
     */
    public function admin_edit($id =NULL){
        $this->loadModel('post');
        
        $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
         
        if($id === null){
            $post = $this->post-> findFirst(array(
                   'conditions' => array( 'online' => -1)
                ));
            if(!empty($post)){
                $id = $post->id;
            }else{
              $this->post->save(array(
                'online' => -1
            ));
            $id = $this-> post-> id;  
            }
            
        }
        $d['id'] = $id;
        
        if($this-> request -> data){
            if($this->post->validates($this -> request -> data)){
                $this-> request -> data->type = 'projet';
                $this-> request -> data->created = date('y-m-d h:i:s'); 
            $this->post->save($this-> request -> data);
            $this->Session->setFlash('Le contenu à bien été modifié ');
            $id = $this->post -> id; 
            $this->redirect('admin/posts/index');
            }else{
            $this->Session->setFlash('Merci de corriger vos informations', 'danger');   
            }
             
        }else{
              $this->request ->data = $this->post->findFirst(array(
                  'conditions' => array('id' => $id
                      )));
              $d['id']= $id;
                
        }
        
        $this -> set($d);
    }
    
    /*
     * taches
     */
    public function admin_edit_1($id =NULL){
        $this->loadModel('post');
        
        $this->loadModel('categorie'); 
        $d['categories'] = $this->categorie -> find();
         
        if($id === null){
            $post = $this->post-> findFirst(array(
                   'conditions' => array( 'online' => -1)
                ));
            if(!empty($post)){
                $id = $post->id;
            }else{
              $this->post->save(array(
                'online' => -1
            ));
            $id = $this-> post-> id;  
            }
            
        }
        $d['id'] = $id;
        
        if($this-> request -> data){
            if($this->post->validates($this -> request -> data)){
                $this-> request -> data->type = 'tache';
                $this-> request -> data->created = date('y-m-d h:i:s'); 
            $this->post->save($this-> request -> data);
            $this->Session->setFlash('Le contenu à bien été modifié ');
            $id = $this->post -> id; 
            $this->redirect('admin/posts/index_1');
            }else{
            $this->Session->setFlash('Merci de corriger vos informations', 'danger');   
            }
             
        }else{
              $this->request ->data = $this->post->findFirst(array(
                  'conditions' => array('id' => $id
                      )));
              $d['id']= $id;
                
        }
        
        $this -> set($d);
    }
    
    /*
     * carnet
     */
    public function admin_edit_2($id =NULL){
        $this->loadModel('post');
        
        $this->loadModel('categorie'); 
        $d['categories'] = $this->categorie -> find();
        
        if($id === null){
            $post = $this->post-> findFirst(array(
                   'conditions' => array( 'online' => -1)
                ));
            if(!empty($post)){
                $id = $post->id;
            }else{
              $this->post->save(array(
                'online' => -1
            ));
            $id = $this-> post-> id;  
            }
            
        }
        $d['id'] = $id;
        
        if($this-> request -> data){
            if($this->post->validates($this -> request -> data)){
                $this-> request -> data->type = 'carnet';
                $this-> request -> data->created = date('y-m-d h:i:s'); 
            $this->post->save($this-> request -> data);
            $this->Session->setFlash('Le contenu à bien été modifié ');
            $id = $this->post -> id; 
            $this->redirect('admin/posts/index_2');
            }else{
            $this->Session->setFlash('Merci de corriger vos informations', 'danger');   
            }
             
        }else{
              $this->request ->data = $this->post->findFirst(array(
                  'conditions' => array('id' => $id
                      )));
              $d['id']= $id;
                
        }
        
        $this -> set($d);
    }
    
     /*
     * presentation
     */
    public function admin_edit_p($id =NULL){
        $this->loadModel('post');
        
        $this->loadModel('categorie'); 
        $d['categories'] = $this->categorie -> find();
        
        if($id === null){
            $post = $this->post-> findFirst(array(
                   'conditions' => array( 'online' => -1)
                ));
            if(!empty($post)){
                $id = $post->id;
            }else{
              $this->post->save(array(
                'online' => -1
            ));
            $id = $this-> post-> id;  
            }
            
        }
        $d['id'] = $id;
        
        if($this-> request -> data){
            if($this->post->validates($this -> request -> data)){
                $this-> request -> data->type = 'presentation';
                $this-> request -> data->created = date('y-m-d h:i:s'); 
            $this->post->save($this-> request -> data);
            $this->Session->setFlash('Le contenu à bien été modifié ');
            $id = $this->post -> id; 
            $this->redirect('admin/posts/index_p');
            }else{
            $this->Session->setFlash('Merci de corriger vos informations', 'danger');   
            }
             
        }else{
              $this->request ->data = $this->post->findFirst(array(
                  'conditions' => array('id' => $id
                      )));
              $d['id']= $id;
                
        }
        
        $this -> set($d);
    }
    
    
        /*
         * permet de lister le contenu
         */
        public function admin_tinymce(){
            $this->loadModel('post');
            $this->layout ='modal';
            $d['posts'] = $this-> post->  find();
            $this->set($d);

        }
    
    } 
    
  
    
    
    
    

