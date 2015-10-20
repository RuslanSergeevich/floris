(function(){
    /*
     |-----------------------------------------------------------
     |   EDITOR
     |-----------------------------------------------------------
     */
    jQuery('textarea').ckeditor();

    /*
     |-----------------------------------------------------------
     |   CHECK
     |-----------------------------------------------------------
     */
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });

    /*
     |-----------------------------------------------------------
     |   DELETE_IMAGE
     |-----------------------------------------------------------
     */
    $('.delete-image').click(function(){
        var img = $(this).closest('.image-box').find('img');
        $.post('/_root/blog/delete-image/' + img.attr('data-blog_id'), function(){
            $('.image-box').fadeOut();
        });
    });
})();