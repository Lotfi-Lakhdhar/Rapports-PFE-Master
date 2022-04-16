<div class="page-header">
    <h1> Editer un projet</h1>  
</div>

<form action="<?= Router::url('admin/posts/edit/'.$id); ?>" method="post">  
    
   <?= $this-> Form->input('name','Titre') ;?> 
   <?= $this-> Form->input('slug','Url') ;?> 
   <?= $this-> Form->input('id','hidden') ;?>  
   <?= $this-> Form->input('content','Contenu',array( 'type' => 'textarea', 'class' => 'form-control wisywyg', 'rows' => 5)) ;?>
   <?= $this-> Form->select('category_id', 'Catégorie', $categories) ?> 
   <?= $this-> Form->input('online','En ligne', array( 'type' => 'checkbox')) ;?> 
    
   
    
    <div class="actions">
        <input type="submit" class="btn btn-primary" value="Envoyer"/>
    </div>
     
</form>

</br>
</br>
</br>
</br>
</br>
</br>
<script type="text/javascript" src="<?= Router::webroot('js/tinymce/tiny_mce.js'); ?>" ></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "specific_textareas",
        relative_urls : false,
        editor_selector : "wisywyg",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_buttons4 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",
        file_browser_callback: 'fileBrowser' 
});

function fileBrowser(filed_name, url, type, win){
     if( type == 'file'){
                  var explorer = '<?= Router::url('admin/posts/tinymce')?>';
               }else{
                 var explorer = '<?= Router::url('admin/medias/index/'.$id)?>';
               }
        tinyMCE.activeEditor.windowManager.open({
              
               file :  explorer ,
               title : 'Gallerie',
               width : 420,  
               height : 400,
               resizable : "yes",
               inline : "yes",  
               close_previous : "no"
           }, {
               window : win,
               input : filed_name
           });
           return false;
  }
</script>
