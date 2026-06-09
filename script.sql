-- ============================================================
--  SOLAR BREAK - Script de Base de Datos
--  Base de datos : solarbreak_db
--  Servidor      : XAMPP (MySQL 5.7+ / MariaDB 10.4+)
--  Proyecto      : Programación Web - IUE
--  Autores       : Jos Aníbal Ángel López, Ester Sofía Londoño,
--                  Esteban Arango
--  Descripción   : Estaciones de carga solar híbrida para vehículos
--                  eléctricos en comercios/restaurantes de carretera.
-- ============================================================

-- 1. Crear y seleccionar la base de datos
CREATE DATABASE IF NOT EXISTS solarbreak_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE solarbreak_db;

-- ============================================================
-- TABLA: usuarios
-- Almacena los administradores del sistema.
-- Solo el equipo del proyecto accede al panel.
-- No existe registro público de usuarios.
-- ============================================================
CREATE TABLE IF NOT EXISTS usuarios (
    id              INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nombre          VARCHAR(100)  NOT NULL,
    correo          VARCHAR(150)  NOT NULL UNIQUE,
    contrasena      VARCHAR(255)  NOT NULL,
    rol             VARCHAR(50)   NOT NULL DEFAULT 'admin',
    fecha_creacion  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_correo (correo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- TABLA: solicitudes_informacion
-- Registra cada comercio o aliado interesado en instalar
-- una estación de carga Solar Break en su establecimiento.
-- El formulario de contacto (contacto.php) inserta aquí.
-- ============================================================
CREATE TABLE IF NOT EXISTS solicitudes_informacion (
    id                    INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    nombre_establecimiento VARCHAR(150) NOT NULL,
    tipo_negocio           VARCHAR(100) NOT NULL,   -- Restaurante, Parqueadero, Hotel, etc.
    ubicacion              VARCHAR(200) NOT NULL,   -- Ciudad / municipio / corredor vial
    nombre_contacto        VARCHAR(100) NOT NULL,
    telefono               VARCHAR(20)  DEFAULT NULL,
    correo_contacto        VARCHAR(150) NOT NULL,
    mensaje                TEXT         NOT NULL,
    estado                 ENUM(
                               'Pendiente',
                               'Revisado',
                               'Contactado'
                           )             NOT NULL DEFAULT 'Pendiente',
    id_usuario_gestor      INT UNSIGNED  DEFAULT NULL,  -- FK → usuarios.id
    fecha_registro         DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion    DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP
                                         ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_estado  (estado),
    INDEX idx_fecha   (fecha_registro),
    CONSTRAINT fk_solicitud_usuario
        FOREIGN KEY (id_usuario_gestor)
        REFERENCES usuarios(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- TABLA: detalle_tecnico
-- Información técnica del lugar donde se instalaría la
-- estación de carga (espacio disponible, red convencional,
-- observaciones del equipo Solar Break).
-- Relación 1:1 con solicitudes_informacion.
-- ============================================================
CREATE TABLE IF NOT EXISTS detalle_tecnico (
    id                    INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_solicitud          INT UNSIGNED NOT NULL UNIQUE,  -- 1:1
    celdas_disponibles    INT          DEFAULT NULL,     -- nº de celdas/espacios para la pérgola
    tiene_red_convencional TINYINT(1)  DEFAULT NULL,     -- 1=Sí, 0=No (EPM u otro proveedor)
    area_parqueadero_m2   DECIMAL(8,2) DEFAULT NULL,     -- área disponible en m²
    observaciones         TEXT         DEFAULT NULL,
    fecha_registro        DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT fk_detalle_solicitud
        FOREIGN KEY (id_solicitud)
        REFERENCES solicitudes_informacion(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- TABLA: estados_historial
-- Auditoría de cada cambio de estado sobre una solicitud.
-- Registra: quién cambió el estado, de cuál a cuál y cuándo.
-- ============================================================
CREATE TABLE IF NOT EXISTS estados_historial (
    id               INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_solicitud     INT UNSIGNED NOT NULL,
    id_usuario       INT UNSIGNED DEFAULT NULL,
    estado_anterior  ENUM('Pendiente','Revisado','Contactado') NOT NULL,
    estado_nuevo     ENUM('Pendiente','Revisado','Contactado') NOT NULL,
    observacion      VARCHAR(255) DEFAULT NULL,
    fecha_cambio     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_solicitud (id_solicitud),
    CONSTRAINT fk_historial_solicitud
        FOREIGN KEY (id_solicitud)
        REFERENCES solicitudes_informacion(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_historial_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- DATOS INICIALES
-- Usuario administrador por defecto.
-- Contraseña: solarbreak2024
-- ============================================================
INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (
    'Administrador Solar Break',
    'admin@solarbreak.com',
    'solarbreak2024',
    'admin'
);

-- ============================================================
-- DATOS DE PRUEBA
-- Comercios/restaurantes interesados en instalar la estación
-- de carga Solar Break en su parqueadero (corredor Medellín
-- - Oriente Antioqueño y otras vías del país).
-- ============================================================
INSERT INTO solicitudes_informacion
    (nombre_establecimiento, tipo_negocio, ubicacion, nombre_contacto,
     telefono, correo_contacto, mensaje, estado, id_usuario_gestor) VALUES

('Restaurante El Cruce del Oriente',
 'Restaurante',
 'Vía Medellín - El Retiro, km 12, Antioquia',
 'Pedro Saldarriaga',
 '3042981756',
 'pedro@elcrucedeloriente.com',
 'Tenemos un parqueadero amplio frente a la vía. Nos interesa instalar la estación de carga para atraer clientes con vehículos eléctricos y generar ingresos adicionales.',
 'Pendiente', NULL),

('Paradero Las Palmas Grill',
 'Restaurante',
 'Vía Las Palmas, km 8, Medellín - Guatapé, Antioquia',
 'Lorena Ríos',
 '3118874320',
 'lorena@laspalmásgrill.com',
 'Varios de nuestros clientes llegan en carros eléctricos y no tienen dónde cargar en la zona. Queremos ser el primer punto de carga en esta vía.',
 'Revisado', 1),

('Parqueadero y Café La Autopista',
 'Parqueadero',
 'Autopista Medellín - Bogotá, sector Santuario, Antioquia',
 'Héctor Monsalve',
 '3205563412',
 'hector@cafela autopista.com',
 'Operamos un parqueadero de paso con cafetería. Estamos ubicados en un punto estratégico de la autopista y nos gustaría conocer el modelo de alianza.',
 'Contactado', 1),

('Hotel y Restaurante Ruta Verde',
 'Hotel',
 'Vía Panamericana, sector La Pintada, Antioquia',
 'Camila Ospina',
 NULL,
 'camila@rutaverde.com.co',
 'Somos un hotel boutique en carretera. Tenemos espacio en nuestro parqueadero y creemos que la estación de carga sería un diferenciador muy valioso para nuestros huéspedes.',
 'Pendiente', NULL),

('Restaurante Mirador del Valle',
 'Restaurante',
 'Vía Medellín - Santa Fe de Antioquia, km 45',
 'Jorge Castaño',
 '3001457823',
 'jorge@miradorvalle.com',
 'Estamos en una zona turística con mucho tráfico de fin de semana. Nos interesa el modelo donde Solar Break pone la infraestructura y nosotros ganamos un porcentaje.',
 'Revisado', 1);

-- Detalle técnico para los establecimientos de prueba
INSERT INTO detalle_tecnico
    (id_solicitud, celdas_disponibles, tiene_red_convencional,
     area_parqueadero_m2, observaciones) VALUES
(1, 4, 1, 280.00, 'Cuenta con acometida eléctrica de EPM. Acceso directo desde la vía principal.'),
(2, 2, 1, 120.00, 'Espacio más reducido pero con alta visibilidad. Proveedor eléctrico: EPM.'),
(3, 6, 1, 450.00, 'Parqueadero amplio, ideal para instalar módulo doble. Ya tienen transformador propio.'),
(4, 3, 0, 200.00, 'Sin red convencional estable. Se evaluará operación 100% solar con baterías de respaldo.'),
(5, 2, 1,  90.00, 'Espacio limitado pero ubicación estratégica en zona turística.');

-- Historial de cambios de estado
INSERT INTO estados_historial
    (id_solicitud, id_usuario, estado_anterior, estado_nuevo, observacion) VALUES
(2, 1, 'Pendiente', 'Revisado',
    'Ubicación con alto potencial. Coordinar visita técnica al corredor Las Palmas.'),
(3, 1, 'Pendiente', 'Revisado',
    'Parqueadero de paso en punto estratégico de la autopista. Muy interesante.'),
(3, 1, 'Revisado',  'Contactado',
    'Llamada realizada con Héctor Monsalve. Enviar propuesta formal de alianza.'),
(5, 1, 'Pendiente', 'Revisado',
    'Zona turística activa. Revisar factibilidad técnica de instalación en el lugar.');