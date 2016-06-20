$(document).ready(function()
    {
    
        var altura = $('#nav_right').offset().top;
        $(window).on('scroll',function()
        {
        
            if(($(window).scrollTop()>altura))
            {
                //bajo la barra
                
                $('#main_nav').addClass('fixed_nav');
                $('#nav_left').addClass('col-sm-6');
                $('#nav_left').removeClass('col-sm-12');
                
                $('#nav_right').addClass('col-sm-6');
                $('#nav_right').removeClass('col-sm-12');
                
            }
            else
            {
                //sobre la barra
                $('#main_nav').removeClass('fixed_nav');
                $('#nav_right').addClass('col-sm-12');
                $('#nav_right').removeClass('col-sm-6');
                
                $('#nav_left').addClass('col-sm-12');
                $('#nav_left').removeClass('col-sm-6');
                
            }
        });
    });