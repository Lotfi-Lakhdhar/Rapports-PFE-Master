<?php 
$titre_layout =  $page ->name;
//debug($this->Comments);
  
  $comments = $this->Comments -> findAll($page -> type, $page -> id) ;
  //debug($this->Comments->controller->request->data);
   $this->Comments -> getComment($page -> id , $page -> type);
  
?>
    
    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $page -> name; ?>
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= Router::url('pages/view/1') ?>">Accueil</a>
                    </li>
                    <li class="active"><?= $page -> name; ?></li>
                </ol>
            </div>
    </div>

         <!-- Content Row -->
        <div class="row">

<!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posté le <?= date('d/m/y',strtotime($page -> created)); ?></p>

                <hr>
                
                
                
            <!-- bouton reseaux sociau -->   
            <button class="boutonf share_facebook"  data-url="<?= $_SERVER['PHP_SELF']?>" >
               
                Partager sur facebook
            </button>
             
            <button class="boutont share_twitter" data-url="<?= $_SERVER['PHP_SELF']?>" >
                
                Partager sur twitter
            </button>
           
            <button class="boutong share_gplus" data-url="<?= $_SERVER['PHP_SELF']?>" style="background-color: ">
                
                Partager sur google+
            </button>
 
                <!-- Post Content -->
                <p class="lead"> <?= $page -> content; ?>  </p>
              
            
            

             
                <hr>
                
               
                
                 <!-- Comments  -->
                  <h4>  <?= count($comments);  ?> commetaires</h4>
                  
                  
                  
                  <?=  $this-> Session->flashComment();?>
                  
                  
                <div class="well">
                    <h4>Laisser un commentaire:</h4>
                    <form  action="#comment" role="form" method="post" id="comment">
                        
                    <div class="col-xs-6">
                        <div class="form-group">
                            <?= $this-> Form->input('username','Pseudo:',array( 'class' => 'form-control')) ;?> 
                        </div>
                    </div>  
                        
                    <div class="col-xs-6">
                        <div class="form-group">
                            <?= $this-> Form->input('email','Email:',array( 'class' => 'form-control')) ;?>
                        </div>
                    </div>
                    <div class="col-xs-12">    
                        <div class="form-group">
                            
                            <?= $this-> Form->input('content','Votre message:',array( 'type' => 'textarea', 'class' => 'form-control', 'rows' => 5)) ;?>
                        </div>    
                    </div>
                         <input type="hidden" name="parent_id" value="0" id="parent_id" />
                         <input type="hidden" name="action" value="comment"  />
                       
                       
                    <button type="submit" class="btn btn-primary">Commenter</button>
                      
                        
                    </form>
                </div>

                <hr>
                
                
                 <!-- Posted Comments -->
                
               <?php foreach($comments as $comment) : ?>

               <?php require ELEMENTS.'comment.php'; ?> 
                      <?php foreach($comment->replies as $comment) : ?>
                      <div style="margin-left: 100px; margin-top: 20px;">
                            <?php require ELEMENTS.'comment.php'; ?>
                       </div>  
                      <?php endforeach; ?>
                <?php endforeach; ?>
             </div>   
                
<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Chercher </h4>
                    
                    <form method="get" role="form" action="<?= Router::url('/recherches/view'); ?>">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="recherche">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" ><i class="fa fa-search"></i></button>
                        </span>
                        
                    </div>
                    <!-- /.input-group -->
                    </form>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Mes catégories</h4>
                    
                            <ul class="list-unstyled">
                                <?php foreach($categories as $k => $v) : ?>
                                <li><a href="<?php echo Router::url("categories/index/{$v-> id}") ?>"><?= $v-> titre ?></a>
                                </li>
                                <?php   endforeach; ?>
                            </ul>
                       
                    
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>
     </div>
       
</div>     
         <hr>
<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center  ; color:#23527C">
                    <h3> Eportfolio éducatif </h3>
                </div>
            </div>
        </footer>








 
   



