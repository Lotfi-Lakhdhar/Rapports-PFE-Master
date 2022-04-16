<div class="media" id="comment-<?= $comment->id; ?>">
    <div class="col-sm-2" >
        <img class="media-object" src="http://www.gravatar.com/avatar/<?=  md5($comment -> email);?>" alt="">
    </div>
    <div class="col-sm-10">
        <h4 class="media-heading"><?= $comment-> username; ?>, 
            <small> <?= date('d/m/y',strtotime($comment -> created)); ?></small>
            <small><a href="#" class="reply"  id="<?= $comment->parent_id ? $comment->parent_id : $comment->id; ?>"    data-id="<?= $comment->id; ?>"> Répondre </a></small>
        </h4>
        <p><?= $comment->content; ?></p>
       
    </div>
</div>

 