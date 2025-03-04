
CREATE TABLE maillots (
    maillot_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    categoria VARCHAR(30) NOT NULL, -- Gimnasia Rítmica, Patinaje, Acrobática
    talla VARCHAR(10) NOT NULL,     -- S, M, L
    precio DECIMAL(6,2) NOT NULL,   -- Precio con dos decimales
    stock INT NOT NULL,             -- Cantidad disponible
    descripcion TEXT                -- Descripción del maillot
);


INSERT INTO maillots (nombre, categoria, talla, precio, stock, descripcion) VALUES
('Maillot Elegancia', 'Gimnasia Rítmica', 'M', 120.50, 5, 'Maillot con detalles brillantes y diseño elegante.'),
('Maillot Destello', 'Patinaje', 'S', 135.00, 3, 'Ideal para patinaje artístico con tonos pastel.'),
('Maillot Acro Pro', 'Acrobática', 'L', 145.99, 4, 'Diseñado para resistencia y flexibilidad.'),
('Maillot Fantasía', 'Gimnasia Rítmica', 'M', 115.75, 6, 'Colores vibrantes y detalles florales.'),
('Maillot Ice Queen', 'Patinaje', 'M', 140.00, 2, 'Inspirado en el hielo con tonos azules.'),
('Maillot Fuerza', 'Acrobática', 'S', 130.00, 3, 'Resistente y cómodo para acrobacias.'),
('Maillot Gala', 'Gimnasia Rítmica', 'L', 160.25, 1, 'Elegante para presentaciones especiales.'),
('Maillot Estrella', 'Patinaje', 'M', 150.50, 4, 'Con detalles de estrellas y brillo.'),
('Maillot Dinámico', 'Acrobática', 'M', 135.75, 5, 'Para movimientos fluidos y cómodos.'),
('Maillot Coral', 'Gimnasia Rítmica', 'S', 110.00, 7, 'Tonos coral y detalles delicados.');



