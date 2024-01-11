// navbar
const expandNavbar = () => {
    const navs = document.querySelector('.navs')
    navs.classList.toggle('expand')
}

const navbar = document.querySelector('.navbar-onscroll')
if (navbar) {
    window.addEventListener("scroll", function () {
        navbar.classList.toggle("sticky", this.window.scrollY > 0)
    })
}

const menuIcon = document.querySelector('.menu-icon')
menuIcon.addEventListener("click", function () {
    menuIcon.classList.toggle('change')
    expandNavbar()
})