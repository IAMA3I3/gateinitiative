const imgList = document.querySelector(".slider-wrapper .image-list");
const slideBtn = document.querySelectorAll(".slider-wrapper .slider-btn");
const sliderScrollBar = document.querySelector(".image-slider .slider-scrollber");
const sliderScrollThumb = sliderScrollBar.querySelector(".scrollbar-thumb");
const maxScrollLeft = imgList.scrollWidth - imgList.clientWidth;

sliderScrollThumb.addEventListener("mousedown", (e) => {
    const startX = e.clientX;
    const thumbPosition = sliderScrollThumb.offsetLeft;

    // update thumb position on mouse move
    const handleMouseMove = (e) => {
        const deltaX = e.clientX - startX;
        const newThumbPosition = thumbPosition + deltaX;
        const maxThumbPosition = sliderScrollBar.getBoundingClientRect().width - sliderScrollThumb.offsetWidth;

        const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
        const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

        sliderScrollThumb.style.left = `${boundedPosition}px`;
        imgList.scrollLeft = scrollPosition;
    }

    const handleMouseUp = () => {
        document.removeEventListener("mousemove", handleMouseMove);
        document.removeEventListener("mouseup", handleMouseUp);
    }

    document.addEventListener("mousemove", handleMouseMove);
    document.addEventListener("mouseup", handleMouseUp);
})

// Slide images according to the slide button clicks
slideBtn.forEach(button => {
    button.addEventListener("click", () => {
        // console.log(button)
        const direction = button.id === "prev-slide" ? -1 : 1;
        const scrollAmount = imgList.clientWidth * direction;
        imgList.scrollBy({ left: scrollAmount, behavior: "smooth" });
    })
})

setInterval(() => {
    const direction = imgList.scrollLeft >= maxScrollLeft ? imgList.scrollLeft = 0 : 1;
    const scrollAmount = imgList.clientWidth * direction;
    imgList.scrollBy({ left: scrollAmount, behavior: "smooth" });
}, 5000)

const handleSlideBtn = () => {
    slideBtn[0].style.display = imgList.scrollLeft <= 0 ? "none" : "none";
    slideBtn[1].style.display = imgList.scrollLeft >= maxScrollLeft ? "none" : "none";
}

// update scrollber thumb position based on image scroll
const updateThumbPosition = () => {
    const scrollPosition = imgList.scrollLeft;
    const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollBar.clientWidth - sliderScrollThumb.offsetWidth);
    sliderScrollThumb.style.left = `${thumbPosition}px`;
}

imgList.addEventListener("scroll", () => {
    handleSlideBtn();
    updateThumbPosition();
})