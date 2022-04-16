<?php $titre_layout = 'Mes Carnets'; ?>

<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mes carnets
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Router::url("") ?>">Accueil</a>
                    </li>
                    <li >Mes carnets</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        
        
    <div class="row">
        
             <!-- Blog Entries Column -->
            <div class="col-md-8">
         
        <?php foreach($posts as $k => $v) : ?>
                
           <!-- First Blog Post -->
                <h2>
                    <a href="<?php echo Router::url("posts/view_2/id:{$v-> id}/slug:{$v-> slug}") ?>"><?=  $v-> name; ?></a>
                </h2>
               
                <p><i class="fa fa-clock-o"></i> Posté le <?= $v -> created; ?></p>
                <hr>
              
                <p><?= $v -> content; ?></p>
                <a class="btn btn-primary" href="<?php echo Router::url("posts/view_2/id:{$v-> id}/slug:{$v-> slug}") ?>">Lire la suite <i class="fa fa-angle-right"></i></a>

                <hr>     
        <?php endforeach; ?>

                

                
                

                <!-- Pager -->
                <ul class="pager">
          <nav>
           <ul class="pagination">
            <?php for($i = 1; $i<= $page ; $i++) :?>

               <li <?php if($i == $this->request->page) {echo 'class = active';}  ?>><a href="?page=<?= $i; ?>" > <?= $i ?> </a></li>

             <?php endfor; ?>
           </ul>
         </nav>
        
                </ul>

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
        <!-- /.row -->
        <hr>

       <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center  ; color:#23527C">
                    <h3> Eportfolio éducatif </h3>
                </div>
            </div>
        </footer>   





      
