$(function(){
    $('.category .container ul li').click(function(){
        $('.category .container ul li').removeClass('nav-active');
        $(this).addClass('nav-active');
    })
    $(".item-image li").click(function(){
        $('.main-image li').removeClass('active');
        $('.main-image li').addClass('hide');
        $(".main-image li:nth-child("+($(this).index()+1)+")").removeClass('hide');
        $(".main-image li:nth-child("+($(this).index()+1)+")").addClass('active');
    })
})