 window.addEventListener("scroll", function(){
    var header = document.getElementById("navbar");
    header.classList.toggle('sticky', window.scrollY > 0);
 })