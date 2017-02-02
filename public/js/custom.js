$(function() {

    $('body').on('click', 'td', function(){
        $('#model-data').find('tr').removeClass('active');
        $(this).parent('tr').addClass('active');
        console.log(this);

    });

});
