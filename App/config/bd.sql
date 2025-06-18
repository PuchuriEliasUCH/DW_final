CREATE DATABASE red_donaciones_peru;
USE red_donaciones_peru;

-- Tabla: usuarios (donantes y administradores)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('donante', 'administrador') NOT NULL DEFAULT 'donante',
    activo BOOLEAN DEFAULT TRUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: organizaciones (requieren aprobación)
CREATE TABLE organizaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    descripcion TEXT,
    password VARCHAR(255) NOT NULL,
    estado ENUM('pendiente', 'aprobada', 'rechazada') NOT NULL DEFAULT 'pendiente',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_aprobacion TIMESTAMP NULL
);

-- Tabla: necesidades (publicadas por organizaciones)
CREATE TABLE necesidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    organizacion_id INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    descripcion TEXT NOT NULL,
    cantidad_necesaria INT NOT NULL,
    cantidad_reservada INT DEFAULT 0,
    categoria ENUM('alimentos', 'ropa', 'materiales', 'otros') NOT NULL,
    estado ENUM('activa', 'completada', 'cancelada') NOT NULL DEFAULT 'activa',
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla: donaciones (reservas realizadas por donantes)
CREATE TABLE donaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    necesidad_id INT NOT NULL,
    donante_id INT NOT NULL,
    cantidad_donada INT NOT NULL,
    estado ENUM('reservada', 'completada', 'cancelada') NOT NULL DEFAULT 'reservada',
    fecha_donacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Referencias (Foreign Keys)
ALTER TABLE necesidades ADD FOREIGN KEY (organizacion_id) REFERENCES organizaciones(id) ON DELETE CASCADE;
ALTER TABLE donaciones ADD FOREIGN KEY (necesidad_id) REFERENCES necesidades(id) ON DELETE CASCADE;
ALTER TABLE donaciones ADD FOREIGN KEY (donante_id) REFERENCES usuarios(id) ON DELETE CASCADE;