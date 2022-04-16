<div class="page-header">   
    <h1> <?= $total; ?> Projets </h1>
</div>
<a class="btn btn-success" href="<?= Router::url('admin/posts/edit') ?>"> Ajouter un projet</a>
<table class="table">
    <thead>
        <tr>
            <th> ID </th>
            <th> En ligne ? </th>
            <th> Titre </th>
            <th> Actions </th>
        </tr>   
    </thead>  
    <tbody>
        <?php foreach($posts as $k => $v)   : ?>
        <tr>   
            <td> <?= $v -> id ?> </td>
            <td> <span class="<?php echo ($v-> online == 1)? 'lable label-success' : 'label label-default'; ?>"><?php echo ($v-> online == 1)? 'En ligne' : 'Hors ligne'; ?></span> </td>
            <td> <?= $v -> name ?> </td>
            <td>
              <a class="btn btn-primary" href="<?= Router::url('admin/posts/edit/'.$v->id);?>"> Editer </a>
              <a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimé ce contenu !')" href="<?= Router::url('admin/posts/delete/'.$v->id);?>"> Supprimer </a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </tbody>
    
</table>



