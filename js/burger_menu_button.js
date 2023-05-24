const burgerMenuButton = document.getElementsByClassName('burger-menu')[0]
const menuNav = document.getElementsByClassName('menu')[0]

burgerMenuButton.addEventListener('click', () =>{
    menuNav.classList.toggle('active')
})