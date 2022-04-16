<?php


class RecherchesController extends Controller{
    
    function view(){
        
         $perPage = 10 ;
         
        $this->loadModel('recherche');
        
       $d['recherche'] = $this->recherche -> recherche($this->request->recherche, array( 
           'limit'      => ($perPage * ($this-> request -> page - 1)).','. $perPage
           ));
       $this->loadModel('categorie'); 
         $d['categories'] = $this->categorie -> find();
       $d['total'] = $this->recherche-> rechercheCount($this->request->recherche);
       
       $d['page'] = ceil($d['total']/$perPage);
       if($d['total']){
           $this->Session->setFlash('Vous avez '. $d['total']. ' résultats.');
       
       }else{
           $this->Session->setFlash('Aucun résultat a été trouvé.', 'danger');
       }
       
       $this->set($d);  
        
        
    }
    
}
