jQuery(document).ready(function($){

            $('.reply').click(function(e){
                e.preventDefault();
                var $this = $(this);
                var $comment = $(this).parents('.comment');
                var $form = $('#comment');
                var id = $this.data('id'); 
                var parent_id =$this.attr('id');;
                var $comment = $('#comment-' +id);
                console.log(parent_id);
                $form.hide();
                $comment.after($form);
                
                $form.slideDown();
                
                $('#parent_id').val(parent_id);
              
            });
        })(jQuery);


