window.onscroll = function() { myFunction() };

var navbar = document.getElementById("header-middle");
var sticky = navbar.offsetTop;

var sScroll = document.querySelector('.navbar-bottom');
var sticky = sScroll.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("stickyTop")
    } else {
        navbar.classList.remove("stickyTop");
    }
}