/* CREATE DATABASE IF NOT EXISTS blog_master;
USE blog_master;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE entradas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    categoria_id INT NULL, -- Permitir valores NULL
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
); 

-- Insertar usuarios
INSERT INTO usuarios (nombre, apellidos, email, password) VALUES
('Carlos', 'Gómez', 'carlosg@gmail.com', 'password123'),
('Lucía', 'Fernández', 'luciaf@gmail.com', 'password123'),
('Miguel', 'Hernández', 'miguelh@gmail.com', 'password123'),
('Ana', 'Martínez', 'anam@gmail.com', 'password123'),
('Javier', 'López', 'javierl@gmail.com', 'password123');

-- Insertar categorías (géneros de videojuegos)
INSERT INTO categorias (nombre) VALUES
('Acción'),
('Aventura'),
('RPG'),
('Shooter'),
('Estrategia'),
('Deportes'),
('Carreras'),
('Survival Horror');

-- Insertar entradas 
INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion) VALUES
(5, 2, 'Los mejores juegos de acción del 2025', 'Analizamos los juegos de acción más esperados del 2025.'),
(1, 4, 'Top 10 RPGs que debes jugar', 'Una lista de los mejores RPGs de todos los tiempos.'),
(2, 3, 'Aventuras inolvidables en el mundo gaming', 'Exploramos juegos de aventura que han marcado la historia.'),
(3, 5, '¿Cuál es el mejor shooter competitivo?', 'Comparamos los shooters más jugados en eSports.'),
(4, 6, 'Estrategia en tiempo real vs estrategia por turnos', 'Analizamos las diferencias entre estos dos subgéneros.'),
(5, 7, 'FIFA vs eFootball: ¿Cuál es mejor?', 'Una comparativa entre los dos simuladores de fútbol más populares.'),
(1, 8, 'Los juegos de carreras más realistas', 'Descubrimos los simuladores de carreras con mejor física y gráficos.'),
(2, 9, 'Los survival horror más aterradores', 'Revisamos los juegos que te pondrán los pelos de punta.');


