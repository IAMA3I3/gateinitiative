// active class
const sections = document.querySelectorAll("section")
const navA = document.querySelectorAll(".navbar-onscroll .navs a")

const updateActiveSection = () => {
    let maxVisibleArea = 0
    let activeSection = null

    const getVisibleArea = (element) => {
        const rect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        const windowWidth = window.innerWidth || document.documentElement.clientWidth;
        const visibleHeight = Math.min(rect.bottom, windowHeight) - Math.max(rect.top, 0);
        const visibleWidth = Math.min(rect.right, windowWidth) - Math.max(rect.left, 0);
        return visibleHeight * visibleWidth;
    }

    sections.forEach((section) => {
        const visibleArea = getVisibleArea(section)

        if (visibleArea > maxVisibleArea) {
            maxVisibleArea = visibleArea
            activeSection = section.getAttribute("id")
        }
    })

    navA.forEach((a) => {
        a.classList.remove("active")
        if (a.classList.contains(activeSection)) {
            a.classList.add("active")
        }
    })
}

window.addEventListener("scroll", updateActiveSection);
window.addEventListener("resize", updateActiveSection);