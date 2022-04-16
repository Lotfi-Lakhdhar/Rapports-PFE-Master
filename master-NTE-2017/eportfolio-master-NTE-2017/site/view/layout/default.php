<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= isset($titre_layout) ? $titre_layout : 'Mon  eportfolio'; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL.'/webroot/css/css.css'; ?>" rel="stylesheet">
    
     <!-- Custom Fonts -->
    <link href="<?= BASE_URL.'/webroot/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
    <!--  CSS btn social-->
    <link href="<?= BASE_URL.'/webroot/css/app.css'; ?>" rel="stylesheet" type="text/css">
  </head>

  <body>

      <nav class="navbar navbar-inverse navbar-fixed-top" style="position: static">
      <div class="container">
        <div class="navbar-header">
            
           
          <a class="navbar-brand" href="<?php echo Router::url("presentations/view") ?> "> Eportfolio </a>
        </div>
          
          
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             
          <ul class="nav navbar-nav navbar-right">
              
             <?php  $pagesMenu = $this -> request('pages', 'getMenu');  ?>
                    <?php foreach ($pagesMenu as $p) : ?>
              
              <li <?php if(isset($pag)){ if($pag == $p->name){ echo 'class="dropdown active"';}}  ?>  ><a  href="<?php echo Router::url("pages/view/{$p-> id}/{$p-> slug}") ?>">  <?= $p -> name; ?></a></li>
              
                     <?php endforeach;?>
              
               <li class="dropdown"  >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Eportfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li>
                                <a href="<?= Router::url('posts/view_p') ?>">Présentation</a>
                            </li>
                            <li>
                                <a href="<?= Router::url('posts/index') ?>">Mes projets</a>
                            </li>
                            <li>
                                <a href="<?= Router::url('posts/index_1') ?>">Mes tâches</a>
                            </li>
                            
                                                     
                        </ul>
                </li>
                
                <li <?php  if(isset($pagg)){ echo 'class="dropdown active"' ;}   ?> >
                        <a href="<?= Router::url('posts/index_2') ?>">Mes carnets</a>
                 </li>
              
          </ul>
        </div>
          
        
    </nav>

    <div class="container">
        
       

      <div class="starter-template" style="padding-top: 30px;">
          <?=  $this-> Session->flash();?>
          <?= $content; ?>
        
      </div>
      
    </div><!-- /.container -->


    <!-- jQuery -->
   
   <script src="<?= BASE_URL.'/webroot/js/jquery.js'; ?>" ></script> 
    <!-- Bootstrap Core JavaScript -->
   <script src="<?= BASE_URL.'/webroot/js/bootstrap.min.js'; ?>" ></script> 
   <script src="<?= BASE_URL.'/webroot/js/mini.jquery.js'; ?>"></script>
   <script src="<?= BASE_URL.'/webroot/js/social/social.js'; ?>" ></script>
   <script src="<?= BASE_URL.'/webroot/js/comment/comment.js'; ?>" ></script>
   
   <script src="<?= BASE_URL.'/webroot/js/comment/comment.js'; ?>" ></script>
  
  </body>
</html>





 