const express = require('express');
const path = require('path');
const fs = require('fs');
const app = express();
app.use(express.json());

// Ruta del archivo donde se guardarán los usuarios
const usersFilePath = './users.json'; 
let users = [];
if (fs.existsSync(usersFilePath)) {
    const data = fs.readFileSync(usersFilePath);
    users = JSON.parse(data);
}

// Servir archivos estáticos
app.use(express.static('public'));

// Ruta para la raíz
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Endpoint para registrar usuarios
app.post('/register', (req, res) => {
    const { name, username, email, password, role } = req.body;
    users.push({ name, username, email, password, role });

    // Guardar usuarios en el archivo
    fs.writeFileSync(usersFilePath, JSON.stringify(users, null, 2));

    res.status(201).send("Usuário cadastrado com sucesso");
});

// Endpoint para obtener todos los usuarios
app.get('/users', (req, res) => {
    res.json(users);
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Servidor corriendo en http://localhost:${PORT}`));
// Cambiando algo para forzar el despliegue