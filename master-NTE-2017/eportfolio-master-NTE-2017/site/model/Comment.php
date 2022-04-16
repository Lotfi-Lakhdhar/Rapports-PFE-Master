<?php


class Comment extends Model {
    
 var $validate =array(
     
      'username' => array(
          'rule' => 'notEmpty',
          'message' => 'vous devez précisé un pseudo'
      ),
        'email' => array(
                  'rule' => '([^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4})',
                  'message' => 'L\'email n\'est pas valide '
              ),
        'content' => array(
                     'rule' => 'notEmpty',
                     'message' => 'Vous devez mettre un commentaire'
                 )
      
  );
    
}
