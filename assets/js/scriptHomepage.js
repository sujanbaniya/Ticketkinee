const nav1 = document.querySelector('.navH')
window.addEventListener('scroll', fixNav)

const buttons = document.querySelector('.proceed-btn')
const buttons_register = document.querySelector('.proceed-btn-register')

function fixNav() {
    if (window.scrollY > nav1.offsetHeight + 150) {
        nav1.classList.add('active')
        buttons.classList.remove('proceed-btn')
        buttons.classList.add('animate1')
        buttons_register.classList.remove('proceed-btn-register')
        buttons_register.classList.add('animate1')
    } else {
        nav1.classList.remove('active')
        buttons.classList.remove('animate1')
        buttons.classList.add('proceed-btn')
        buttons_register.classList.remove('animate1')
        buttons_register.classList.add('proceed-btn-register')
    }
}


// const buttons1 = document.querySelectorAll("[data-carousel-button]")

// buttons1.forEach(button => (
//     button.addEventListener("click", () => {
//         const offset = button.dataset.carouselButton === "right" ? 1 : -1
//         const slides = button
//             .closest("[data-carousel")
//             .querySelector("[data-slides]")

//         const activeSlide = slides.querySelector("[data-active]")
//         let newIndex = [...slides.children].indexOf(activeSlide) + offset
//         if (newIndex < 0) newIndex = slides.children.length - 1
//         if (newIndex >= slides.children.length) newIndex = true
//         delete activeSlide.dataset.active
//     })
// ))