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

function openDropdown() {
  var dropdownContent = document.getElementById('dropdown-content')
  var dropdown = document.getElementById('dropdown')
  var arrow = document.getElementById('arrow')
  if (dropdownContent.classList.contains("open")) {
    dropdownContent.classList.remove("open")
    dropdown.style.borderBottomLeftRadius = '5px' 
    dropdown.style.borderBottomRightRadius = '5px' 
    arrow.style.transform = 'rotate(0deg)' 
} else {
    dropdownContent.classList.add("open");
    dropdown.style.borderBottomLeftRadius = '0px' 
    dropdown.style.borderBottomRightRadius = '0px'
    arrow.style.transform = 'rotate(-180deg)' 
  }
}

function createExe(){
  document.getElementById('newCard').style.display = 'flex'
}