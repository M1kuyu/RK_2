document.addEventListener('DOMContentLoaded', () => {
    const productsContainer = document.getElementById('productsContainer');
    const popup = document.getElementById('popup');
    const closePopupButton = document.getElementById('closePopup');

    // Функция загрузки товаров
    function loadProducts() {
        fetch('fetch_products.php')
            .then(response => response.json())
            .then(products => {
                productsContainer.innerHTML = ''; // Очищаем контейнер перед добавлением товаров

                products.forEach(product => {
                    // Создание HTML-карточки товара
                    const productElement = document.createElement('div');
                    productElement.classList.add('product');

                    productElement.innerHTML = `
                        <img src="${product.image_url}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <p><strong>Цена: </strong>${product.price} руб.</p>
                        <button class="add-to-cart" data-id="${product.id}">Добавить в корзину</button>
                    `;

                    // Добавляем карточку товара в контейнер
                    productsContainer.appendChild(productElement);
                });

                // Добавляем обработчики событий для кнопок "Добавить в корзину"
                const addToCartButtons = document.querySelectorAll('.add-to-cart');
                addToCartButtons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        const productId = event.target.getAttribute('data-id');
                        addToCart(productId);
                    });
                });
            })
            .catch(error => console.error('Ошибка загрузки товаров:', error));
    }

    // Функция для добавления товара в корзину
    function addToCart(productId) {
        // Здесь должна быть логика для добавления товара в корзину
        // Например, отправка AJAX-запроса на сервер для добавления товара в корзину

        // После успешного добавления, показываем всплывающее окно
        popup.classList.remove('hidden');
    }

    // Закрытие всплывающего окна
    closePopupButton.addEventListener('click', () => {
        popup.classList.add('hidden');
    });

    // Закрытие всплывающего окна при нажатии вне его
    popup.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.classList.add('hidden');
        }
    });

    loadProducts(); // Загружаем товары при загрузке страницы
});
