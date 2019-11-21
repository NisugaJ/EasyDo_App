
$(document).click(function (event) {
    console.log("calling");
    var clickover = $(event.target);
    var $navbar = $(".navbar-collapse");               
    var _opened = $navbar.hasClass("show");
    if (_opened === true && !clickover.hasClass("navbar-toggle")) {   
        $navbar.collapse('hide');
        console.log("calling hide");
    }
    else{
        console.log("calling open");

    }
});