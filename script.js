 window.addEventListener("scroll", function(){
    var header = document.getElementById("navbar");
    header.classList.toggle('sticky', window.scrollY > 0);
 })

 function toggleCadastra(){
   document.getElementById("cadastra").style.display = "flex";
   document.getElementById("login").style.display = "none";
}

 function toggleLogin(){
    document.getElementById("login").style.display = "flex";
   document.getElementById("cadastra").style.display = "none";
}