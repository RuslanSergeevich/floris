(function(){
    //ckeditor
    jQuery('textarea').ckeditor({
        'allowedContent': true
    });

    //iCheck
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
})();