// script.js
document.addEventListener('DOMContentLoaded', () => {
    const products = document.querySelectorAll('.product');

    products.forEach(product => {
        product.addEventListener('mouseenter', () => {
            const button = document.createElement('button');
            button.textContent = "Подробнее";
            button.classList.add('view-details');
            product.appendChild(button);

            button.addEventListener('click', () => {
                window.location.href = "product-details.html"; // ссылка на страницу товара
            });
        });

        product.addEventListener('mouseleave', () => {
            const button = product.querySelector('.view-details');
            if (button) product.removeChild(button);
        });
    });
});
