
let slideIndex = 0; // Индекс текущего слайда
showSlides(); // Показать первый слайд

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    // Скрыть все слайды
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }

    // Сбросить активные точки
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slideIndex++;
    // Если индекс больше количества слайдов, сбрасываем его на 1
    if (slideIndex > slides.length) {slideIndex = 1}    

    // Показать текущий слайд и активировать соответствующую точку
    slides[slideIndex - 1].style.display = "block";  
    dots[slideIndex - 1].className += " active";

    // Показать следующий слайд каждые 5 секунд
    setTimeout(showSlides, 5000); // Изменить слайд каждые 5 секунд
}

// Переключение между слайдами
function plusSlides(n) {
    slideIndex += n - 1; // Изменить индекс слайда
    showSlides(); // Показать слайд
}

// Установка текущего слайда
function currentSlide(n) {
    slideIndex = n - 1; // Установить индекс текущего слайда
    showSlides(); // Показать слайд
}
