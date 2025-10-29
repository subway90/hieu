window.onscroll = function() {
    const navbar = document.getElementById("navbar");
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        navbar.classList.add("navbar-sticky");
    } else {
        navbar.classList.remove("navbar-sticky");
    }
};