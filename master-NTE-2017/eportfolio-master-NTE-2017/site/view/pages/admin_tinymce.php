<ul>
<?php foreach($posts as $k => $v) : ?>

    <li> <a href="#" onclick="FileBrowserDialogue.sendURL('<?= Router::url($v-> type.'s/view/id:'.$v->id.'/slug:'.$v->slug); ?>')" > <?= ucfirst($v -> type); ?> : <?= $v -> name; ?> </a></li>

<?php endforeach; ?>

</ul>


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