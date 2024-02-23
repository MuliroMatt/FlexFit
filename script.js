 window.addEventListener("scroll", function(){
    var header = document.querySelector(".header-container");
    header.classList.toggle('sticky', window.scrollY > 0);
 })