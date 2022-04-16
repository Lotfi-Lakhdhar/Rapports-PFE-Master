<?php


class MediasController extends Controller {
    
    public function admin_index($id){
        $this->loadModel('media');
        
        if($this->request-> data && !empty($_FILES['file']['name'])){
          if(strpos($_FILES['file']['type'], 'image') !== FALSE){
             $dir = WEBROOT.DS.'img'.DS.date('Y-m') ;
             if(!file_exists($dir)) mkdir($dir, 0777);
              move_uploaded_file($_FILES['file']['tmp_name'], $dir.DS.$_FILES['file']['name']);
              $this->media-> save(array(
                  
                  'name' => $this->request-> data->name,
                  'file'  => date('Y-m').'/'.$_FILES['file']['name'],
                  'post_id' => $id,
                  'type'  => 'img'
                   
              ));
              
              $this->Session->setFlash("L'image à été bien enregistrée");
              
          }else{
              $this->Form-> errors['file'] = 'Le fichier n\'est pas une image';
          } 
        }  
        
        $this->layout = 'modal';
        $d['images']= $this->media->find(array(
            'conditions' => array('post_id' => $id)
            
        )) ;
        $d['post_id']=$id;
        $this->set($d); 
    }
    
    public function admin_delete($id){
     $this->loadModel('media');
     $media = $this -> media -> findFirst(array(
         'condition' => array( 'id' => $id)
     ));
     unlink(WEBROOT.DS.'img'.DS.$media->file);
     $this->media-> delete($id);
     $this-> Session -> setFlash('Le média à bien été supprimé');
     $this->redirect('admin/medias/index/'.$media->post_id);
     
    }
  
}
