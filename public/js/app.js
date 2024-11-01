// variables
const carrito = document.querySelector('#carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.querySelector('#vaciar-carrito');
const listaCupcakes = document.querySelector('#lista-cupcakes');

let articulosCarrito = [];

// Listeners
cargarEventListener();

function cargarEventListener() {
    // Cuando se agrega un cupcake presionando "Agregar al carrito"
    listaCupcakes.addEventListener('click', adicionarCupcake);

    // Excluir cupcakes del carrito
    carrito.addEventListener('click', excluirCupcake);

    //Vaciar el carrito
    vaciarCarritoBtn.addEventListener('click', () => {
        articulosCarrito = []; //resetear arreglo

        limpiarHTML(); //Eliminamos todo el HTML
    })

    // NUEVO: Cargar el contenido del carrito almacenado en LocalStorage
    document.addEventListener('DOMContentLoaded', () => {
        articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];
        
        // Si el carrito está vacío, mostramos el mensaje
        if (!articulosCarrito || articulosCarrito.length === 0) {
            contenedorCarrito.innerHTML = '<tr><td colspan="5">El carrito está vacío</td></tr>';
            return;
        }
        carritoHTML();

        // Agregar el evento al botón de continuar
        const continuarCarritoBtn = document.getElementById('continuar-carrito');
        continuarCarritoBtn.addEventListener('click', () => {
            console.log('Botón de Confirmar Compra presionado');

            console.log("Datos del carrito antes de la redirección:", articulosCarrito);
            window.location.href = 'confirmacao.html';
        });
    });
}

// Función para agregar un cupcake al carrito
function adicionarCupcake(e) {
    e.preventDefault();

    if (e.target.classList.contains('agregar-carrito')) {
        const cupcakeSelecionado = e.target.parentElement.parentElement;

        // Obtiene el ID del cupcake desde el atributo data-i
        const idCupcake = e.target.getAttribute('data-i');

        // Leer los datos del cupcake
        lerDadosCupcake(cupcakeSelecionado, idCupcake);
    }
}

// Excluir un cupcake del carrito
function excluirCupcake(e) {
    e.preventDefault();
    if (e.target.classList.contains('excluir-cupcake')) {
        // Obtiene el ID del cupcake desde el atributo data-id del botón de eliminar
        const idCupcake = e.target.getAttribute('data-id');

        // Encuentra el índice del cupcake en el carrito

        const indice = articulosCarrito.findIndex(articulo => articulo.id === idCupcake);
        //Disminuir en 1 la cantidad del curso
        articulosCarrito[indice].quantidade--;
        //solo cuando la cantidad sea 0, se borra el cupcake
        if (articulosCarrito[indice].quantidade === 0) {
            articulosCarrito = articulosCarrito.filter(cupcake => cupcake.id !== idCupcake);
        }
        carritoHTML();
    }
}

// Función para leer el contenido HTML del cupcake y extraer la información
function lerDadosCupcake(cupcake, idCupcake) {
    // Crear un objeto con el contenido del cupcake seleccionado
    const infoCupcake = {
        imagem: cupcake.querySelector('img').src,
        titulo: cupcake.querySelector('h3').textContent,
        preco: cupcake.querySelector('.producto__precio').textContent,
        id: idCupcake, // Aquí usamos el id obtenido de data-i
        quantidade: 1
    };

    // Revisar si el cupcake ya existe en el carrito
    const existe = articulosCarrito.some(cupcake => cupcake.id === infoCupcake.id);
    if (existe) {
        // Actualizamos la cantidad
        const cupcakes = articulosCarrito.map(cupcake => {
            if (cupcake.id === infoCupcake.id) {
                cupcake.quantidade++;
                return cupcake; // Retorna el objeto actualizado
            } else {
                return cupcake; // Retorna todos los objetos que no son duplicados
            }
        });
        articulosCarrito = [...cupcakes];
    } else {
        // Agregar elementos al arreglo del carrito
        articulosCarrito = [...articulosCarrito, infoCupcake];
    }
    console.log(articulosCarrito);
    carritoHTML();
}

// Muestra el carrito de compras en el HTML
function carritoHTML() {
    // Limpiar el HTML
    limpiarHTML();

    // Recorre el carrito y genera el HTML
    articulosCarrito.forEach(cupcake => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><img src="${cupcake.imagem}"></td>
            <td>${cupcake.titulo}</td>
            <td>${cupcake.preco}</td>
            <td>${cupcake.quantidade}</td>
            <td><a href="#" class="excluir-cupcake" data-id="${cupcake.id}"> X </a></td>
        `;
        // Agrega el HTML del carrito en el tbody
        contenedorCarrito.appendChild(row);
    });
    // NUEVO:
    sincronizarStorage();
}
// NUEVO: 
function sincronizarStorage() {
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}

// Elimina los elementos del tbody
function limpiarHTML() {
    while (contenedorCarrito.firstChild) {
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}

