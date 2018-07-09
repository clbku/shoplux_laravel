$(function(){
    setInterval(function(event){
        var next = $('.banner .slider li.active').next();
        if (next.length == 0){
            next = $('.banner .slider li:first-child');
        }
       $('.banner .active').addClass('fadeOutLeft aminated').one('webkitAnimationEnd', function(){
           $('.banner .slider li').removeClass('fadeOutLeft aminated');
       })
       next.addClass('active fadeInRight aminated').one('webkitAnimationEnd', function(){
           next.removeClass('fadeInRight aminated');
           $('.banner .active').removeClass('active');
           next.addClass('active');
       })
    }, 5000)
    $(window).scroll(function(){
        var body = $("html, body");
        if (body.scrollTop() > 400){
            $('.navbar.active').removeClass('active');
            $('.navbar.bienhinh').addClass('active');
        }
        else {
            $('.navbar').addClass('active');
            $('.navbar.bienhinh.active').removeClass('active');
        }
    })
    $('.banner .circle').click(function(){
        var body = $("html, body");
        body.animate({scrollTop: '670px'}, 1000);
    })
})