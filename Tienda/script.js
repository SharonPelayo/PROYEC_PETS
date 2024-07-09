// script.js

let indiceActual = 0;
const imagenes = [
    "Juguetes.png",
    "comida.png",
    "Medicamentos.png",
];

function mostrarSiguienteImagen() {
    indiceActual = (indiceActual + 1) % imagenes.length;
    document.querySelector('.imagen-carrusel').src = imagenes[indiceActual];
}

setInterval(mostrarSiguienteImagen, 3000); // Cambiar la imagen cada 4segundos

// script.js

// script.js

let carrito = [];

function añadirAlCarrito(nombre, precio) {
    carrito.push({ nombre, precio });
    actualizarCarrito();
}

function eliminarDelCarrito(indice) {
    carrito.splice(indice, 1);
    actualizarCarrito();
}

function actualizarCarrito() {
    const listaCarrito = document.getElementById('listaCarrito');
    const totalCarrito = document.getElementById('totalCarrito');
    listaCarrito.innerHTML = '';
    let total = 0;
    
    carrito.forEach((producto, indice) => {
        const li = document.createElement('li');
        li.textContent = `${producto.nombre} - $${producto.precio}`;
        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.onclick = () => eliminarDelCarrito(indice);
        li.appendChild(botonEliminar);
        listaCarrito.appendChild(li);
        total += producto.precio;
    });
    
    totalCarrito.textContent = `Total: $${total}`;
}

function mostrarCarrito() {
    const modal = document.getElementById('modalCarrito');
    modal.style.display = 'block';
}

function cerrarCarrito() {
    const modal = document.getElementById('modalCarrito');
    modal.style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('modalCarrito');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Función para buscar productos
function buscarProducto(event) {
    event.preventDefault();
    const entradaBusqueda = document.getElementById('entradaBusqueda').value.toLowerCase();
    const productos = document.querySelectorAll('.producto');

    productos.forEach(producto => {
        const nombre = producto.getAttribute('data-nombre').toLowerCase();
        if (nombre.includes(entradaBusqueda)) {
            producto.style.display = 'block';
        } else {
            producto.style.display = 'none';
        }
    });
}
