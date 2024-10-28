const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');

const app = express();
const port = process.env.PORT || 3000;

// Middleware para parsear el cuerpo de las solicitudes JSON
app.use(bodyParser.json());

// Configura CORS para permitir solicitudes desde el frontend en localhost
app.use(cors({ origin: 'http://localhost:3000' }));

// Simulación de una base de datos de usuarios
const users = [
    { username: 'user1', password: 'password1' },
    { username: 'user2', password: 'password2' }
];

// Endpoint para verificar las credenciales
app.post('/login', (req, res) => {
    const { username, password } = req.body;

    // Verifica si el usuario existe y si la contraseña es correcta
    const user = users.find(u => u.username === username && u.password === password);

    if (user) {
        res.status(200).json({ success: true, message: 'Login com sucesso' });
    } else {
        res.status(401).json({ success: false, message: 'Credenciais inválidas.' });
    }
});

// Iniciar el servidor
app.listen(port, () => {
    console.log(`API running at http://localhost:${port}`);
});
