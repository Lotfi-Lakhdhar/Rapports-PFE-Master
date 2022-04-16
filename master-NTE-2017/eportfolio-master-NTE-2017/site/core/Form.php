<?php


class Form {
    
    public $controller;
    public $errors;
    protected $data = array();
    
    public function __construct($controller) {
        $this->controller = $controller;
    }
    
     protected function getValue($index){
       
       if(is_object($this->controller->request->data)){
           
           return $this->controller->request->data ->$index;
           
       }
       
        return isset($this->controller->request->data[$index])? $this->controller->request->data[$index] : null ;
        
           
       
   }
    
    public function input($name, $label, $options=array()){
       
        $error = FALSE;
        $classError = "";
        if(isset($this->errors[$name])){
          $error = $this-> errors[$name];  
          $classError = " alert-danger";
        }
        if(!isset($this->controller->request->data->$name)){
          $value ='';  
        }else{
         $value =$this->controller->request->data->$name;    
        }
        if($label == 'hidden'){
            return '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
        }
        $html =  '  
        <div class="'.$classError.'" style="padding:10px;"> 
        <label for="input'.$name.'"> '.$label.' </label>
        <div class="input">';
        
        $attr = ' ';
        foreach($options as $k => $v){ if($k != 'type'){
            $attr .= " $k = \"$v\"";
                        }
        }
        if(!isset($options['type'])){
          $html .= '<input type="text" class="form-control" id= "input'.$name.'" name="'.$name.'" value="'.$value.'" '.$attr.' />';
         
        }elseif($options['type']== "textarea"){
          $html .= '<textarea  id= "input'.$name.'" name="'.$name.'" '.$attr.' >'.$value.' </textarea>';
         
        }elseif($options['type']== "checkbox"){
          $html .= '<input type="hidden" " value= "0"  name="'.$name.'"> <input type ="checkbox" name="'.$name.'" value ="1" '.(empty($value)? '' :'checked').' >';
        }elseif($options['type']== "file"){
          $html .= '<input type="file" class="input-file" id= "input'.$name.'" name="'.$name.'" '.$attr.' />';
        }elseif($options['type']== "password"){
          $html .= '<input type="password" class="form-control" id= "input'.$name.'" name="'.$name.'" value="'.$value.'" '.$attr.' />';
        }
       if($error){
           $html .= '<span class="help-inline">'.$error.'</span>';
       }
         $html .=   '</div></div> '; 
         return $html;
    }
    
     public function select($name, $label, $options = array()){
       
     $label ='<div style="padding:10px;"><label>'.$label.'</label>';
     $input = '<select class="form-control" name="'.$name.'">';
     $i = 0;
     foreach ($options as $k => $v){
         
         $attributes = '';
         
         if($v->id == $this->getValue($name)){
             
             $attributes = 'selected="selected"';
         }elseif(!$this->getValue($name) && $i == 0){
          $input .= "<option value='0' selected='selected' > sans titre</option>"; 
          $i++;
         }
         
         $input .= "<option value='$v->id ' $attributes>$v->titre</option>";
     }
     
     $input .= "</select></div>";
     
     return $label . $input ;
   }
    
}
