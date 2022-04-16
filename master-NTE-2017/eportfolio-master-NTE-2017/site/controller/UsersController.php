<?php


class UsersController extends Controller {
    
 
    /*
     * login
     */
    public function login(){
      // debug($this->Session-> read('user'));
       
       $this->layout ='login';
    
        if($this->request-> data){
            $data = $this->request-> data;
            $data-> password = sha1($data-> password);
            $this->loadModel('user');
            $user = $this->user->findFirst(array(
                'conditions' => array('login' => $data->login, 'password' => $data->password)
            ));
            if(!empty($user)){
                $this->Session-> write('user', $user);
            }
            $this->request-> data ->password = '';
            
        }
        if($this->Session-> islogged('user')){
            if($this->Session->user('role')=== 'admin'){
              $this->redirect('lotf');  
            }else{
             $this->redirect('');    
            }
            
        }
    }
    
    
  
    
    /*
     * logout
     */
    public function logout(){
        unset($_SESSION['user']);
        $this->Session->setFlash('Vous été maintenant déconnecté');
        $this->redirect('/');
    }
}
