<?php


class PagesController extends Controller{
    
    
   
    function view($id,$slug = null){
      
        $this->loadModel('post');
        $d['page'] = $this->post -> findFirst(array(
            'conditions' => array('online' => 1,'id' => $id, 'type' => 'page')
        ));
         $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
            
         if(empty($d['page'])){
            $this->e404('page introuvable');
        }
        if($slug != $d['page']->slug){
            $this-> redirect("pages/view/{$id}/{$d['page']->slug}", 301);
        }
        $d['pag']= $d['page']->name;
      
         $this->set($d); 
    }
    
    
    /*
     * admin
     */
    
    
        public function admin_index(){
        
           $perPage = 10 ;
        $this->loadModel('post');
         $condition = array('type' => 'page');
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
     * permet de supprimer un projet
     */
    public function admin_delete($id){
       $this->loadModel('post');
       $this->post-> delete($id);
       $this->Session->setFlash('Le contenu à bien été supprimé ');
       $this->redirect('admin/pages/index');
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
            $this-> request -> data->type = 'page';
            $this-> request -> data->created = date('y-m-d h:i:s'); 
            $this->post->save($this-> request -> data);
            $this->Session->setFlash('Le contenu à bien été modifié ');
            $id = $this->post -> id; 
            $this->redirect('admin/pages/index');
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
     * peremet de récupérer les pages pour le menu
     */
  public function getMenu(){
      
      $this->loadModel('post');
      return $this->post-> find(array(
         'conditions' => array('online' => 1, 'type' => 'page')
      ));
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

