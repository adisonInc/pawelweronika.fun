// Obsługa slidera zdjęć
document.addEventListener('DOMContentLoaded', () => {
    function initSlider(sliderContainer) {
        const slides = sliderContainer.querySelectorAll('.slider img');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        const nextButton = sliderContainer.querySelector('.next');
        const prevButton = sliderContainer.querySelector('.prev');

        if (nextButton) nextButton.addEventListener('click', nextSlide);
        if (prevButton) prevButton.addEventListener('click', prevSlide);

        showSlide(currentSlide);
    }

    const sliders = document.querySelectorAll('.photo-slider, .info-slider');
    sliders.forEach(slider => initSlider(slider));
});