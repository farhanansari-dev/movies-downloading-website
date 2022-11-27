const toggleMenu = () => {
  let navMenu = document.getElementById("nav-menu");
  let menuBtn = document.getElementById("menu-btn");
  if (navMenu.style.left == "0px") {
    navMenu.style.left = "-50%";
    menuBtn.innerHTML = '<i class="bi bi-list"></i>'

  } else {
    navMenu.style.left = "0px";
    menuBtn.innerHTML = '<i class="bi bi-x-lg "></i>';
  }
}