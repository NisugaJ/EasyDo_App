

// ReactDOM.render( React.createElement('div',null, 'Hello World'), document.getElementById('react-test') );

$(document).ready(function(){
    $(".your-owl").owlCarousel({
        loop:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
  });

  $(function() {
    $('.carousel').carousel();
 });