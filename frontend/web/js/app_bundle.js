(function() {
    $('body').ready(function() {
        return $('.cataloge-menu li a').on('click', function(e) {
            e.preventDefault();
            $('.cataloge-menu li').removeClass('active');
            return $(this).parent('li').addClass('active');
        });
    });

}).call(this);