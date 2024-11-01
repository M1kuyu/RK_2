document.addEventListener('DOMContentLoaded', () => {
    const productsContainer = document.getElementById('productsContainer');
    const userLoggedIn = true; // Замените на реальную проверку авторизации

    // Функция загрузки товаров
    function loadProducts() {
        fetch('fetch_products.php')
            .then(response => response.json())
            .then(products => {
                productsContainer.innerHTML = ''; // Очищаем контейнер перед добавлением товаров

                products.forEach(product => {
                    const productElement = document.createElement('div');
                    productElement.classList.add('product');

                    productElement.innerHTML = `
                        <img src="images/${product.image}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p><strong>Цена:</strong> ${product.price} руб.</p>
                        <p><strong>В наличии:</strong> ${product.quantity} шт.</p>
                        <a href="product-details.php?id=${product.id}" class="details-link">Подробнее</a>
                        ${userLoggedIn ? `<button class="add-to-cart" data-id="${product.id}">Добавить в корзину</button>` : ''}
                    `;

                    // Добавляем карточку товара в контейнер
                    productsContainer.appendChild(productElement);
                });

                // Добавляем обработчик событий для кнопок "Добавить в корзину"
                const addToCartButtons = document.querySelectorAll('.add-to-cart');
                addToCartButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const productId = button.getAttribute('data-id');
                        addToCart(productId);
                    });
                });
            })
            .catch(error => console.error('Ошибка загрузки товаров:', error));
    }

    function addToCart(productId) {
        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ product_id: productId, quantity: 1 }) // Здесь можно добавить возможность выбора количества
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Товар добавлен в корзину!');
            } else {
                alert('Ошибка добавления товара в корзину.');
            }
        })
        .catch(error => console.error('Ошибка при добавлении в корзину:', error));
    }

    loadProducts(); // Загружаем товары при загрузке страницы
});
