<div class="page-header">
    <h1> Editer un projet</h1>  
</div>

<form action="<?= Router::url('admin/categories/edit/'.$id); ?>" method="post">  
    
   <?= $this-> Form->input('titre','Titre') ;?> 
 
   <?= $this-> Form->input('id','hidden') ;?>  
   
    <div class="actions">
        <input type="submit" class="btn btn-primary" value="Envoyer"/>
    </div>
     
</form>




