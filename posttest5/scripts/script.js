hamburger = document.querySelector(".hamburger");
hamburger.onclick = function() {
    navBar = document.querySelector(".menu-navbar");
    navBar.classList.toggle("active");
}

var icon = document.getElementById("icon"); 
icon.onclick = function() {
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme")) {
        icon.src = "assets/sun.png";
    } else {
        icon.src = "assets/moon.png";
    }
}

var buy = document.getElementById("buy");
buy.onclick = function() {
    alert("Maaf, fitur ini belum tersedia");
}