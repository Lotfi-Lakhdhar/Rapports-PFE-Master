 

<div class="page-header">
    <h1> Se connecter </h1>
</div>
<div class="row">
    
    
    <div class="col-lg-8">
    <form class="" action="<?= Router::url('users/login');?>" method="post">
        <?= $this-> Form->input('login', 'Identifiant'); ?>
        <?= $this-> Form->input('password', 'Mot de passe', array('type' => 'password')); ?>
        <div class="actions">  <input type="submit" class="btn btn-primary" value="Se connecter" /></div> 
    </form>
    </div>
    
    
    <div class="col-md-4">

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
