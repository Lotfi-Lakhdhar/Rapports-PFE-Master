<?php


class Model {
    
    public static $connexions = array();
    
    public $conf = 'default';
    public $table = FALSE;
    public $db;
    public $primaryKey ='id';
    public $id;
    public $errors = array();
    public $form;
    
   public function __construct() {
      
         // j'initialise qlques variables
     
     if($this->table === FALSE){
         $this -> table = strtolower(get_class($this)).'s';         
     }
       // je me conecte à la base
     $conf = Conf::$database[$this->conf];
     if(isset(Model::$connexions[$this->conf])){
         
         $this->db = Model::$connexions[$this->conf];
         return TRUE;
     }
     try{
         $pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',$conf['login'],$conf['password'],
                 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
         Model::$connexions[$this->conf] = $pdo;
         $this->db = $pdo;
     }  catch (PDOException $e){
         if(Conf::$debug >= 1){
           die($e->getMessage());  
         }else{
             echo 'Impossible de se connecter à la base de donnée';
         }
         
     }
   
   }
   
   public function find($req =array()){
       
   $sql = "SELECT ";  
   
   if(isset($req['fields'])){
       
        if(is_array($req['fields'])){
            $sql .= implode(',',$req['fields'] );
        }else{
                $sql .= $req['fields']; 
             } 
    
   }else{
       $sql .= '*';
   }
   $sql .= " FROM {$this->table} as ".get_class($this)." ";
   
   
   if(isset($req['conditions'])){
    $sql .= 'WHERE ';  
    if(!is_array($req['conditions'])){
        $sql .= $req['conditions'];
    }else{
        
        $cond =array();
            foreach($req['conditions'] as $k => $v ){
            if(!is_numeric($v)){
               $v = $this->db->quote($v);
            }
              $cond[]= "$k=$v";
            }
        $sql .= implode(' AND ',$cond);
    }
   }
   
   if(isset($req['limit'])){
    $sql .= ' LIMIT '.$req['limit'];  
    
   }
   
    if(isset($req['order'])){
    $sql .= ' ORDER BY '.$req['order'];  
   
   } 
   if(isset($req['by'])){
    $sql .= ' '.$req['by'];  
   
   }
   
   $pre = $this-> db -> prepare($sql);
   
   $pre -> execute();
   return $pre->fetchAll(PDO::FETCH_OBJ);
   
    }
    
     public function findFirst($req){
       
         return current($this->find($req));
    }
    
    public function findCount($conditions ){
        
       $res = $this->findFirst(array(
            'fields' => 'COUNT('.$this-> primaryKey.') as count',
             'conditions' => $conditions
        ));
        return $res-> count ;
        
    }
    
    public function findCountCat( ){
        
       $res = $this->findFirst(array(
            'fields' => 'COUNT('.$this-> primaryKey.') as count',
            
        ));
        return $res-> count ;
        
    }
    
    
    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey } = {$id}";
        $this->db-> query($sql);
       
    }
    
    public function save($data){
        
        $key = $this->primaryKey;
        $fields =array();
        $d = array();
        //if(isset($data ->$key))  unset($data ->$key);
        foreach( $data as $k => $v){
            if($k != $this-> primaryKey){
             $fields[] = "$k=:$k";
            $d[":$k"] = $v;   
            }elseif(!empty ($v)){
             $d[":$k"] = $v;    
            }
            
        }
        
        if(isset($data ->$key) && !empty($data ->$key)){
            $sql = "UPDATE ".$this->table." SET ".implode(', ' ,$fields)." WHERE ". $key."=:".$key;
            $this-> id = $data -> $key;
            $action ='update';
        }else{
            
            $sql = "INSERT INTO ".$this->table." SET ".implode(', ' ,$fields);
            $action ='insert';
        }
        
   
        
       $pre = $this-> db -> prepare($sql);
         
       $pre -> execute($d); 
       
       if($action == 'insert'){
           $this->id = $this->db ->lastInsertId();
       }
       return TRUE;
    }
    
    public function recherche($req, $limit =array() ){
       $sql = "SELECT * FROM {$this->table} "; 
       
            $re = explode(" ",$req );
            $i = 0;
            foreach ($re as $mot){
                if(strlen($mot)>3){
             if($i == 0){ 
                 $sql .="WHERE ";
                 
             }else{
                 $sql .=" OR ";
             }
             $mot = addslashes($mot);
             $sql .="content LIKE '%$mot%'";
             $i++;
             }
            }
            
             if(isset($limit['limit'])){
            $sql .= ' LIMIT '.$limit['limit'];  
    
            }
           
     
   $pre = $this-> db -> prepare($sql);
   
   $pre -> execute();
   
   return $pre->fetchAll(PDO::FETCH_OBJ);
    }
    
       public function rechercheCount($req){
       $sql = "SELECT COUNT({$this-> primaryKey}) as count FROM {$this->table} "; 
       
            $re = explode(" ",$req );
            $i = 0;
            foreach ($re as $mot){
                if(strlen($mot)>3){
             if($i == 0){ 
                 $sql .="WHERE ";
                 
             }else{
                 $sql .=" OR ";
             }
             $mot = addslashes($mot);
             $sql .="content LIKE '%$mot%'";
             $i++;
             }
            }
            
        
   $pre = $this-> db -> prepare($sql);
   
   $pre -> execute();
   $count = current($pre->fetchAll(PDO::FETCH_OBJ));
  
   return $count-> count;
    }
    
     public function validates($data){
        //debug($data);   
          
         $errors = array();
      foreach($this->validate as $k => $v){
          if(!isset($data -> $k)){
              $errors[$k] = $v['message'];
              
          }else{
              if($v['rule'] == 'notEmpty'){
                  if(empty($data-> $k)){
                  $errors[$k] = $v['message'];
                  
              }
                 
             }elseif(!preg_match('/^'.$v['rule'].'$/', $data -> $k)){
              $errors[$k] = $v['message'];
              
          }
      }
      }
      
       $this->errors = $errors;
       
      if(isset($this->Form)){
          $this->Form-> errors = $errors;
          //debug($this->Form-> errors);
      }
     if(empty($errors)){
       return true; 
       
     }
     return false;
  }
  
}
