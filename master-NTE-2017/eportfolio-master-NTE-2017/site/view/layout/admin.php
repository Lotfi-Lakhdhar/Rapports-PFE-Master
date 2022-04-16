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

    <title> <?= isset($titre_layout) ? $titre_layout : 'Mon Eportfolio'; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL.'/webroot/css/css.css'; ?>" rel="stylesheet">
     </head>

  <body>

      <nav class="navbar navbar-inverse navbar-fixed-top" style="position: static">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="<?=Router::url('admin/posts/index'); ?> "> Mon eportfolio </a>
        </div>
          
          
         <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a  href="<?=Router::url('admin/pages/index'); ?>"> Pages</a></li>
              <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon EPortfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li>
                                <a href="<?=Router::url('admin/posts/index_p'); ?>">Présentation</a>
                            </li>
                            <li>
                                <a href="<?=Router::url('admin/posts/index'); ?>">Mes projets</a>
                            </li>
                            <li>
                                <a href="<?=Router::url('admin/posts/index_1'); ?>">Mes tâches</a>
                            </li>
                           
                        </ul>
                    </li>
                    
                    <li><a  href="<?=Router::url('admin/posts/index_2'); ?>"> Carnets</a></li>
                    
                    <li><a  href="<?=Router::url('admin/categories/index'); ?>"> Catégories</a></li>
                   
                   <li><a  href="<?=Router::url('/'); ?>"> Voir le site</a></li>
                   <li><a  href="<?=Router::url('users/logout'); ?>"> se déconnecter</a></li>
            
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
   <script src="<?= Router::webroot('js/bootstrap.min.js'); ?>" ></script> 
   



  </body>
</html>





 
