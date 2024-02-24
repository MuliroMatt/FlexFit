 window.addEventListener("scroll", function(){
    var header = document.querySelector(".navbar");
    header.classList.toggle('sticky', window.scrollY > 0);
 })