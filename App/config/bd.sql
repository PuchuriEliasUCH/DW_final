create database if not exists solidaridapp character set utf8mb4 collate utf8mb4_unicode_ci;
use solidaridapp;

create table usuario(
    id_usuario int auto_increment primary key,
    email varchar(200) unique not null,
    password varchar(20) not null,
    fecha_registro timestamp default current_timestamp,
    estado enum('activo', 'inactivo') default 'activo'
);

create table administrador(
    id_admin int auto_increment primary key,
    id_usuario int unique not null,
    nombre varchar(100) not null,
    apellido varchar(100) not null,
    foreign key (id_usuario) references usuario(id_usuario)
);

create table donante(
    id_donante int auto_increment primary key,
    id_usuario int unique not null,
    nombre_completo varchar(200) not null,
    fecha_nacimiento date not null,
    dni char(8) unique not null,
    num_donaciones_realizadas int default 0,
    foreign key (id_usuario) references usuario(id_usuario)

);

create table organizacion(
    id_organizacion int auto_increment primary key,
    id_usuario int unique not null,
    razon_social varchar(100) not null,
    ruc char(11) unique not null,
    telefono char(9) not null,
    direccion text not null,
    tipo_organizacion ENUM('comedor_popular', 'albergue', 'centro_comunitario', 'escuela', 'otro') not null,
    otro_tipo text,
    descripcion_corta varchar(50) not null,
    descripcion_larga text not null,
    estado_verificacion ENUM('pendiente', 'aprobada', 'rechazada') DEFAULT 'pendiente',
    fecha_verificacion date,
    foreign key (id_usuario) references usuario(id_usuario)
);

create table categoria(
    id_categoria int auto_increment primary key,
    nombre varchar(100) unique not null,
    estado enum('activa', 'inactiva') default 'activa'
);

create table necesidad(
    id_necesidad int auto_increment primary key,
    id_organizacion int not null,
    id_categoria int not null,
    nombre varchar(100) not null,
    prioridad enum('alta', 'media', 'baja') not null,
    cantidad_solicitada int not null,
    cantidad_recaudada int default 0,
    unidad_medida varchar(50),
    descripcion_corta varchar(50) not null,
    descripcion_larga text not null,
    fecha_publicacion timestamp default current_timestamp,
    estado enum('pendiente','activa', 'cubierta', 'vencida', 'cancelada') default 'pendiente',
    FOREIGN KEY (id_organizacion) REFERENCES organizacion(id_organizacion),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);


-- Vistas
CREATE VIEW view_necesidad_card AS
SELECT
    n.id_necesidad,
    n.nombre AS nombre_necesidad,
    n.prioridad,
    o.razon_social,
    o.direccion,
    n.descripcion_corta,
    c.nombre AS categoria
FROM
    necesidad n
JOIN
    organizacion o ON n.id_organizacion = o.id_organizacion
JOIN
    categoria c ON n.id_categoria = c.id_categoria;

-- Datos de Prueba
INSERT INTO usuario (email, password) VALUES
('admin1@donaciones.pe', 'admin123'),
('donante1@gmail.com', 'donante1'),
('donante2@gmail.com', 'donante2'),
('donante3@gmail.com', 'donante3'),
('donante4@gmail.com', 'donante4'),
('org1@organizacion.pe', 'orgpass1'),
('org2@organizacion.pe', 'orgpass2'),
('org3@organizacion.pe', 'orgpass3'),
('org4@organizacion.pe', 'orgpass4'),
('org5@organizacion.pe', 'orgpass5');

INSERT INTO administrador (id_usuario, nombre, apellido) VALUES
(1, 'Lucía', 'Fernández');

INSERT INTO donante (id_usuario, nombre_completo, fecha_nacimiento, dni, num_donaciones_realizadas) VALUES
(2, 'Carlos Pérez', '1990-05-10', '12345678', 2),
(3, 'María Torres', '1985-08-21', '87654321', 5),
(4, 'José Ramírez', '1992-12-01', '23456789', 1),
(5, 'Ana González', '1998-03-15', '34567890', 0);

INSERT INTO organizacion (
    id_usuario, razon_social, ruc, telefono, direccion, tipo_organizacion, otro_tipo,
    descripcion_corta, descripcion_larga, estado_verificacion, fecha_verificacion
) VALUES
(6, 'Comedor Esperanza', '20123456789', '987654321', 'Av. Siempre Viva 123, Lima', 'comedor_popular', NULL,
 'Alimentamos familias', 'Brindamos comida diaria a más de 100 personas vulnerables.', 'aprobada', '2024-01-10'),

(7, 'Albergue Buen Vivir', '20987654321', '912345678', 'Jr. Los Sauces 450, Arequipa', 'albergue', NULL,
 'Refugio seguro', 'Albergamos a personas en situación de calle y abandono.', 'aprobada', '2024-03-05'),

(8, 'Centro Comunitario Unidos', '20876543210', '911223344', 'Mz B Lt 12, San Juan de Lurigancho', 'centro_comunitario', NULL,
 'Espacio de encuentro', 'Organizamos talleres y actividades para el desarrollo local.', 'pendiente', NULL),

(9, 'Escuela Semillas del Saber', '20765432109', '934567890', 'Av. Educadores 234, Trujillo', 'escuela', NULL,
 'Educamos con amor', 'Educación básica gratuita para niños de zonas rurales.', 'pendiente', NULL),

(10, 'Proyecto Red de Ayuda', '20654321098', '945678901', 'Pasaje Solidaridad 321, Cusco', 'otro', 'organización multisectorial',
 'Ayuda integral', 'Conectamos voluntarios con comunidades en emergencia.', 'rechazada', '2024-04-12');

INSERT INTO categoria (nombre, estado) VALUES
('Alimentos', 'activa'),
('Ropa', 'activa'),
('Medicinas', 'activa'),
('Útiles escolares', 'activa'),
('Artículos de higiene', 'activa'),
('Material de construcción', 'activa'),
('Mobiliario', 'activa'),
('Juguetes', 'activa'),
('Electrodomésticos', 'activa'),
('Material educativo', 'activa');

INSERT INTO necesidad (
    id_organizacion, id_categoria, nombre, prioridad, cantidad_solicitada, unidad_medida,
    descripcion_corta, descripcion_larga
) VALUES
-- Organización 1
(1, 1, 'Donación de arroz y fideos', 'alta', 200, 'kg',
 'Alimentos básicos', 'Requerimos alimentos no perecibles para 40 familias del comedor popular.'),

(1, 2, 'Ropa de invierno para niños', 'alta', 50, 'prendas',
 'Abrigo urgente', 'Niños entre 3 y 10 años necesitan ropa abrigadora para enfrentar el frío.'),

-- Organización 2
(2, 3, 'Medicinas básicas', 'media', 100, 'blísteres',
 'Botiquín solidario', 'Solicitamos paracetamol, ibuprofeno y alcohol para primeros auxilios.'),

(2, 4, 'Cuadernos y lápices', 'media', 80, 'kits escolares',
 'Apoyo escolar', 'Para niños en edad primaria que no cuentan con materiales básicos.'),

-- Organización 3
(3, 5, 'Papel higiénico y jabón', 'alta', 120, 'unidades',
 'Higiene para familias', 'Reparto de kits de higiene para 30 hogares vulnerables.'),

(3, 6, 'Cemento y ladrillos', 'alta', 300, 'unidades',
 'Reconstrucción urgente', 'Se busca reparar techos dañados por lluvias en el centro comunitario.'),

-- Organización 4
(4, 7, 'Mesas y sillas', 'media', 10, 'juegos',
 'Mobiliario escolar', 'Se necesitan mesas y sillas para implementar una sala de tareas.'),

(4, 8, 'Juguetes nuevos o usados', 'baja', 100, 'juguetes',
 'Campaña navideña', 'Queremos entregar un regalo a cada niño en situación vulnerable.'),

-- Organización 5
(5, 9, 'Refrigeradora', 'media', 1, 'unidad',
 'Electrodoméstico solidario', 'Necesitamos conservar alimentos para la olla común.'),

(5, 10, 'Cartillas educativas', 'baja', 200, 'folletos',
 'Educación comunitaria', 'Material impreso para talleres de alfabetización de adultos.');

