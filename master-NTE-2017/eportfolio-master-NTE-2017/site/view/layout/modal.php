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

    <title> <?= isset($titre_layout) ? $titre_layout : 'Administration'; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL.'/webroot/css/css.css'; ?>" rel="stylesheet">
   
    


 


  </head>

  <body>

    

   

      
          <?=  $this-> Session->flash();?>
          <?= $content; ?>
        
   
      </body>
</html>




   
   


