let currentIndex = 0;
        const totalSlides = 4; // Cambia 4 al número total de imágenes
        const intervalTime = 5000; // Cambia a la duración deseada en milisegundos

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        function updateSlider() {
            const sliderUl = document.getElementById('slider-ul');
            const newPosition = -currentIndex * 100;
            sliderUl.style.marginLeft = `${newPosition}%`;
        }

        function autoSlide() {
            nextSlide();
        }

        // Inicia la animación automática
        setInterval(autoSlide, intervalTime);


//en esta parte esta para el header
