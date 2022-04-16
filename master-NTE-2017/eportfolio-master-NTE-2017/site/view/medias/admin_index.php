<table class="table">
    <thead>
        <tr>
            <th> image </th>
           
            <th> Titre </th>
            <th> Actions </th>
        </tr>   
    </thead>  
    <tbody>
        <?php foreach($images as $k => $v)   : ?>
        <tr>   
            <td> <a href="#"      onclick="FileBrowserDialogue.sendURL('<?= Router::webroot('img/'.$v->file); ?>')">
                    <img src="<?= Router::webroot('img/'.$v->file); ?>"  height="100" />
                </a> </td>
            
            <td> <?= $v -> name ?> </td>
            <td>
              
              <a class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimé cette image !')" href="<?= Router::url('admin/medias/delete/'.$v->id);?>"> Supprimer </a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </tbody>
    
</table>

<div class="page-header">
    <h1>Ajouter une image</h1>
    
</div>

<form action="<?= Router::url('admin/medias/index/'.$post_id); ?>" method="post" enctype="multipart/form-data">
    <?= $this->Form-> input('file', 'Image' ,array('type' => 'file')); ?>
    <?= $this->Form-> input('name', 'Titre'); ?>
    <div class="actions">
        <input type="submit" value="Envoyer" class="btn btn-primary"> 
    </div>
    
</form>

<script type="text/javascript" src="<?= Router::webroot('js/tinymce/tiny_mce_popup.js'); ?>" ></script>

<script language="javascript" type="text/javascript">

var FileBrowserDialogue = {
    init : function () {
        // Here goes your code for setting your custom things onLoad.
    },
    sendURL : function (URL) {
       
        var win = tinyMCEPopup.getWindowArg("window");

        // insert information now
        win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;

        // are we an image browser
        if (typeof(win.ImageDialog) != "undefined")
        {
            // we are, so update image dimensions and preview if necessary
            if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
            if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage(URL);
        }

        // close popup window
        tinyMCEPopup.close();
    }
}

tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);

</script>