<?php


class CategoriesController extends Controller{
    
    public function index($id){
        
       $perPage = 10 ;
       $this->loadModel('post'); 
       $condition = array('online' => 1, 'category_id' => $id);
       $d['categorie'] = $this-> post-> find(array(
            'conditions' =>  $condition,
            'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
       $this->loadModel('categorie'); 
       $d['categories'] = $this->categorie -> find();
       $d['titre'] = $this->categorie-> findFirst(array( 
           'conditions' => array('id' => $id)));
       $d['total'] = $this->post-> findCount(array('online' => 1, 'category_id' => $id));
       $d['page'] = ceil($d['total']/$perPage);
        
       
           $this->set($d);  
        
    }
    
    /*
     * admin
     */
    
    
        public function admin_index(){
        
           $perPage = 10 ;
        $this->loadModel('categorie');
         
        $d['posts'] = $this-> categorie-> find(array(
          'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
        ));
        $d['total'] = $this->categorie-> findCountCat();
        $d['page'] = ceil($d['total']/$perPage);
        $this->set($d);    
    } 
    
     /*
     * permet de supprimer un projet
     */
    public function admin_delete($id){
       $this->loadModel('categorie');
       $this->loadModel('post');
       $post = $this -> post -> find(array(
           'fields'    => 'category_id, id', 
           'conditions' => array(
               'category_id' =>$id 
        )));
       
       $data = new stdClass();
       foreach($post as $k => $v){
           $data->id = $v-> id;
           $data->category_id = 0;
          $this->post->save($data );  
       }
           
       
       $this->categorie-> delete($id);
       $this->Session->setFlash('La catégorie à bien été supprimé ');
       $this->redirect('admin/categories/index');
    }
    
    
     /*
     * permet d'éditer un article
     */
    public function admin_edit($id =NULL){
        
        $this->loadModel('categorie'); 
         
        $d['id'] = $id;
        
        if($this-> request -> data){
            if($this->categorie->validates($this -> request -> data)){
            
            $this->categorie->save($this-> request -> data);
            
            $this->Session->setFlash('La catégorie à bien été modifié ');
            
            $id = $this->categorie -> id; 
            $this->redirect('admin/categories/index');
            }else{
            $this->Session->setFlash('Merci de choisir une catégorie correcte', 'danger');   
            }
             
        }else{
              $this->request ->data = $this->categorie->findFirst(array(
                  'conditions' => array('id' => $id
                      )));
              $d['id']= $id;
                
        }
        
        $this -> set($d);
    }
    
   
}
