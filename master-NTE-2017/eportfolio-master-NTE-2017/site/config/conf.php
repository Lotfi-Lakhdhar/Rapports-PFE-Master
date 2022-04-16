<?php

class Conf{
  
   static $debug = 1; 
    
  static $database = array(
        'default'  => array(
            'host' => 'localhost',
            'database' => 'eportfolio',
            'password'     =>  '',
            'login' => 'root'

        )
      );
 
} 

 Router::prefix('lotf','admin');
 
 Router::connect('','presentations/view');
 
 Router::connect('lotf','lotf/posts/index');
 
 Router::connect('eportfolio/carnet','posts/index_2');
 
 Router::connect('eportfolio/taches','posts/index_1');
 
 Router::connect('eportfolio/presentation','posts/view_p');
 

 
 Router::connect('projets/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
 
 Router::connect('taches/:slug-:id','posts/view_1/id:([0-9]+)/slug:([a-z0-9\-]+)');
 
 Router::connect('carnets/:slug-:id','posts/view_2/id:([0-9]+)/slug:([a-z0-9\-]+)');
 
  Router::connect('presentation/:slug-:id','posts/view_p/id:([0-9]+)/slug:([a-z0-9\-]+)');
 
 
 Router::connect('pages/:slug-:id','pages/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
 
  Router::connect('presentations/:slug-:id','presentations/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
 
 Router::connect('eportfolio/*','posts/*');
 
 
 

 

  


