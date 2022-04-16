<div class="page-header">   
    <h1> <?= $total; ?> Catégories </h1>
</div>
<a class="btn btn-success" href="<?= Router::url('admin/categories/edit') ?>"> Ajouter une catégorie</a>
<table class="table">
    <thead>
        <tr>
            <th> ID </th>
            <th> Titre </th>
            <th> Actions </th>
        </tr>   
    </thead>  
    <tbody>
        <?php foreach($posts as $k => $v)   : ?>
        <tr>   
            <td> <?= $v -> id ?> </td>
            
            <td> <?= $v -> titre ?> </td>
            <td>
              <a class="btn btn-primary" href="<?= Router::url('admin/categories/edit/'.$v->id);?>"> Editer </a>
              <a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimé cette catégorie !')" href="<?= Router::url('admin/categories/delete/'.$v->id);?>"> Supprimer </a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </tbody>
    
</table>




