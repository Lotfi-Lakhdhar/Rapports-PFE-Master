<?php


class Categorie extends Model{
    
      var $validate =array(
      'titre' => array(
          'rule' => 'notEmpty',
          'message' => 'vous devez précisé un titre'
      ));
    
}
