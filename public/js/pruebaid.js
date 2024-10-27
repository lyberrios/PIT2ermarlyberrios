const articulosCarrito = [];

// Suponiendo que tienes un evento para los enlaces de agregar al carrito
document.querySelectorAll('.agregar-carrito').forEach(enlace => {
    enlace.addEventListener('click', (e) => {
        e.preventDefault();

        // Obtén el ID del cupcake desde el atributo data-i
        const idCupcake = e.target.dataset.i;

        // Crea un objeto cupcake (puedes añadir más propiedades si lo necesitas)
        const infoCupcake = {
            id: idCupcake,
            // Agrega otras propiedades si es necesario
        };

        // Revisa si el cupcake ya existe en el carrito
        const existe = articulosCarrito.some(cupcake => cupcake.id === infoCupcake.id);
        console.log(`¿Existe el cupcake? ${existe}`);

        if (!existe) {
            articulosCarrito.push(infoCupcake);
            console.log(`Cupcake agregado: ${infoCupcake.id}`);
        } else {
            console.log(`El cupcake con ID ${infoCupcake.id} ya está en el carrito.`);
        }

        console.log(articulosCarrito);
    });
});