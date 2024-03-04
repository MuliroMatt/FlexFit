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

function openWorkoutList() {
   var sidenav = document.getElementById("workoutlist");
   if (sidenav.classList.contains("open")) {
       sidenav.classList.remove("open");
       document.getElementById('closebtn').style.display = "none"
   } else {
       sidenav.classList.add("open");
       document.getElementById('closebtn').style.display = "flex"
   }
   
 }
 
 function closeWorkoutList() {
   var sidenav = document.getElementById("workoutlist");
   sidenav.classList.remove("open");
   document.getElementById('closebtn').style.display = "none"
 }

// function openDropdown() {
//   var dropdown = document.getElementById('dropdown')
//   if (dropdown.classList.contains("open")) {
//     dropdown.classList.remove("open");
// } else {
//     dropdown.classList.add("open");
// }
// }