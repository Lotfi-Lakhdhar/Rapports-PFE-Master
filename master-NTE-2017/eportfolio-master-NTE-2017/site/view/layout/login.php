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
    <title>  Se connecter </title>
    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL.'/webroot/css/css.css'; ?>" rel="stylesheet">
     </head>
  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" style="position: static">
      <div class="container">
        <div class="navbar-header">
            
           
          <a class="navbar-brand" href="<?php echo Router::url("presentations/view") ?> "> Eportfolio </a>
        </div> 
      
       </nav>
      
   <div class="container">
      <div class="starter-template" style="padding-top: 30px;">
          <?=  $this-> Session->flash();?>
          <?= $content; ?>
        </div>
    </div><!-- /.container -->
  </body>
</html>





 
