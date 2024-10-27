document.addEventListener('DOMContentLoaded', () => {  
    const storedCart = JSON.parse(localStorage.getItem('carrito')) || []; // Recupera el carrito almacenado
    const cartItemsContainer = document.getElementById('cart-items'); // Seleccionamos el contenedor de los items del carrito
    const totalPriceElement = document.getElementById('total-price'); // Elemento donde mostraremos el total

    if (storedCart.length === 0) {
        // Si el carrito está vacío, mostramos un mensaje
        document.getElementById('cart-empty-message').style.display = 'block';
        return;
    } else {
        document.getElementById('cart-empty-message').style.display = 'none';
    }

    // Función para renderizar el carrito
    function renderCart() {
        cartItemsContainer.innerHTML = ''; // Limpiamos el carrito antes de renderizarlo
        let total = 0;

        storedCart.forEach((item, index) => {
            const listItem = document.createElement('li');
            
            // Convertir el precio correctamente a número
            const itemPrice = parseFloat(item.preco.replace('R$', '').trim()) || 0; 
            
            listItem.innerHTML = `
            <div class="cart-item">
                <img src="${item.imagem}" width="50" alt="${item.titulo}">
                <span>${item.titulo}</span>
                <span>Precio unitario: R$${itemPrice.toFixed(2)}</span>
                <span>Precio total: R$${(itemPrice * item.quantidade).toFixed(2)}</span>
            </div>
        `;
        

            // Crear controles de cantidad
            const controlsContainer = document.createElement('div');
            controlsContainer.classList.add('description__quant');
            controlsContainer.innerHTML = `
                <button class="decrement">-</button>
                <input type="text" class="quantity" value="${item.quantidade}" readonly>
                <button class="increment">+</button>
            `;

            // Eventos para incrementar y decrementar cantidad
            controlsContainer.querySelector('.decrement').addEventListener('click', () => changeQuantity(item.titulo, -1));
            controlsContainer.querySelector('.increment').addEventListener('click', () => changeQuantity(item.titulo, 1));
            listItem.appendChild(controlsContainer);

            // Botón de eliminar
            const removeButton = document.createElement('button');
            removeButton.innerHTML = 'X';
            removeButton.classList.add('remove-item');
            removeButton.addEventListener('click', () => removeFromCart(index));
            listItem.appendChild(removeButton);

            cartItemsContainer.appendChild(listItem);

            // Calcular el total
            total += itemPrice * item.quantidade;
        });

        // Actualizar el precio total
        totalPriceElement.textContent = `R$ ${total.toFixed(2)}`;
    }

    // Nueva versión de la función para cambiar la cantidad de un producto en el carrito
    function changeQuantity(itemName, change) {
        const itemIndex = storedCart.findIndex(i => i.titulo === itemName);
        const item = storedCart[itemIndex];
        
        if (item) {
            if (item.quantidade === 1 && change === -1) {
                // Si la cantidad es 1 y el usuario hace decremento, eliminar el producto
                removeFromCart(itemIndex);
            } else {
                item.quantidade += change;
                if (item.quantidade < 1) item.quantidade = 1; // Evitar que la cantidad sea menor que 1
                localStorage.setItem('carrito', JSON.stringify(storedCart)); // Actualizar en localStorage
                renderCart(); // Vuelve a renderizar el carrito
            }
        }
    }

    // Función para eliminar un producto del carrito
    function removeFromCart(index) {
        storedCart.splice(index, 1); // Eliminamos el producto del array
        localStorage.setItem('carrito', JSON.stringify(storedCart)); // Actualizamos el carrito en LocalStorage
        renderCart(); // Volvemos a renderizar el carrito
        if (storedCart.length === 0) {
            document.getElementById('cart-empty-message').style.display = 'block';
        }
    }

    // Renderizamos el carrito al cargar la página
    renderCart();
});
