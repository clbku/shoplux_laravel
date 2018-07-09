$(function(){
    $('.category .container ul li').click(function(){
        $('.category .container ul li').removeClass('active');
        $(this).addClass('active');
    })
    $('.showFilter').click(function(){
        if ($('div.filter').hasClass('hihi')){
            $('.filter').removeClass('hihi');
            $('.filter').css('left',  -300);
            $('.showFilter').css('left', 0);
            $('.product').css('marginLeft', 0);
        }
        else {
            $('.filter').css('left',  0);
            $('.showFilter').css('left', 300);
            $('.filter').addClass('hihi');
            $('.product').css('marginLeft', 300);
        }
        
      })
})