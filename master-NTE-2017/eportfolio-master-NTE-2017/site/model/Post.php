<?php


class Post extends Model{
    
  var $validate =array(
      'name' => array(
          'rule' => 'notEmpty',
          'message' => 'vous devez précisé un titre'
      ),
        'slug' => array(
                  'rule' => '([a-z0-9\-]+)',
                  'message' => 'L\'url n\'est pas valide '
              )
      
  );
    
}
