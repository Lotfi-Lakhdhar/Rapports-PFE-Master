<?php

if($this -> request->prefix === 'admin'){
    $this-> layout = 'admin';
    if(!$this-> Session-> islogged('user') || $this-> Session-> user('role') != 'admin' ){
        $this ->  redirect('users/login');
    }
}
