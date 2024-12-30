let dropDownMenu= document.querySelector(".dropdown_menu");
let toogleBtnIcon= document.querySelector(".toogle_btn i");
toogleBtnIcon.addEventListener("click",function()
{
    dropDownMenu.classList.toggle("show");
    toogleBtnIcon.classList.toggle("fa-times");
})

let navbar=document.querySelector(".nav_bar");
let searchBox= document.querySelector(".searchBox i");
searchBox.addEventListener("click",function()
{
    navbar.classList.toggle("showInput");
    searchBox.classList.toggle("fa-times");
})
