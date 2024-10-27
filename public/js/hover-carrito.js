document.addEventListener("DOMContentLoaded", () => {
    const imgCarrito = document.getElementById('img-carrito');
    const carrito = document.getElementById('carrito');
    const continuarCarritoBtn = document.getElementById('continuar-carrito');

    // Función para alternar la visibilidad del submenú
    imgCarrito.addEventListener('click', function() {
        carrito.style.display = carrito.style.display === 'block' ? 'none' : 'block';
    });

  });
  