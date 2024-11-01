// Evento para manejar el pago en confirmacao.html
document.getElementById('proceed-to-checkout').addEventListener('click', async () => {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    if (carrito.length === 0) {
        alert("El carrito está vacío.");
        return;
    }

    // Prepara los datos del carrito para enviar al servidor
    const items = carrito.map(item => ({
        name: item.titulo,
        price: parseFloat(item.preco.replace('R$', '').trim()),
        quantity: item.quantidade
    }));

    try {
        // Enviar los datos al servidor
        const response = await fetch('/pit2projeto/public/pagamento.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(items)
        });

        const session = await response.json();

        if (session.error) {
            console.error("Error:", session.error);
            alert(session.error);
            return;
        }

        const stripe = Stripe('pk_test_51QG6FEHz3dBBQK7VLFOQNj1lo5ZhGeRSuBB4jrw3SKruhg4N8ygwqwLqV6UdqvVBQ95AVclUrM5UzdNEB7Uht1c000h60xRxad'); // Reemplaza con tu clave pública de Stripe
        await stripe.redirectToCheckout({ sessionId: session.id });
    } catch (error) {
        console.error("Error al enviar los datos:", error);
        alert("Hubo un problema al procesar el pago.");
    }
});

// Llamada a renderCart para inicializar el carrito en la página de confirmación
document.addEventListener('DOMContentLoaded', () => {
    renderCart();
});

// Función renderCart para actualizar el contenido del carrito
function renderCart() {
    const storedCart = JSON.parse(localStorage.getItem('carrito')) || [];
    const cartItemsContainer = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    cartItemsContainer.innerHTML = '';
    let total = 0;

    storedCart.forEach((item, index) => {
        const itemPrice = parseFloat(item.preco.replace('R$', '').trim()) || 0;
        const listItem = document.createElement('li');
        
        listItem.innerHTML = `
            <div class="cart-item">
                <img src="${item.imagem}" width="50" alt="${item.titulo}">
                <span>${item.titulo}</span>
                <span>Precio unitario: R$${itemPrice.toFixed(2)}</span>
                <span>Precio total: R$${(itemPrice * item.quantidade).toFixed(2)}</span>
            </div>
        `;

        // Añadir controles de cantidad
        const controlsContainer = document.createElement('div');
        controlsContainer.classList.add('description__quant');
        controlsContainer.innerHTML = `
            <button class="decrement">-</button>
            <input type="text" class="quantity" value="${item.quantidade}" readonly>
            <button class="increment">+</button>
        `;

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
        total += itemPrice * item.quantidade;
    });

    totalPriceElement.textContent = `R$ ${total.toFixed(2)}`;
}

// Otras funciones relacionadas
function changeQuantity(itemName, change) {
    const storedCart = JSON.parse(localStorage.getItem('carrito')) || [];
    const itemIndex = storedCart.findIndex(i => i.titulo === itemName);
    const item = storedCart[itemIndex];

    if (item) {
        if (item.quantidade === 1 && change === -1) {
            removeFromCart(itemIndex);
        } else {
            item.quantidade += change;
            if (item.quantidade < 1) item.quantidade = 1;
            localStorage.setItem('carrito', JSON.stringify(storedCart));
            renderCart();
        }
    }
}

function removeFromCart(index) {
    const storedCart = JSON.parse(localStorage.getItem('carrito')) || [];
    storedCart.splice(index, 1);
    localStorage.setItem('carrito', JSON.stringify(storedCart));
    renderCart();

    if (storedCart.length === 0) {
        document.getElementById('cart-empty-message').style.display = 'block';
    }
}
