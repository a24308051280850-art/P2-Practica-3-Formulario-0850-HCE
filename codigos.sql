CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    categoria VARCHAR(50) NOT NULL DEFAULT 'bats',
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, categoria, precio, imagen) VALUES
('Bate de Madera 32"', 'bats', 1200.00, 'batraw.jpg'),
('Bat de Madera 33"', 'bats', 1800.00, 'batraw2.jpg'),
('Bat de Madera 32"', 'bats', 1280.00, 'batval.jpg'),
('Bat de Madera Marucci 33"', 'bats', 3572.00, 'batmaru.jpg'),
('Bat de Madera MMAC 31"', 'bats', 1500.00, 'batmmac.jpg'),
('Bat de Madera Victus 30"', 'bats', 4750.00, 'batvict.jpg'),
('Bat de Madera Sam Bats 32"', 'bats', 2809.00, 'batsam.jpg'),
('Bat de Madera Louisville Slugger 32"', 'bats', 5618.00, 'batluis.jpg'),
('Bat de Madera Old Hickory 33"', 'bats', 1498.00, 'batold.jpg'),
('Bat de Madera B45 32"', 'bats', 2990.00, 'batb.jpg');

-- TABLA DE GUANTES
CREATE TABLE IF NOT EXISTS guantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, categoria, precio, imagen) VALUES
('Guante Piel Infielder 11.5"', 'guantes', 2500.00, 'guante1.jpg'),
('Mascotera Catcher 33"', 'guantes', 2600.00, 'guante2.jpg'),
('Guante Outfielder 12.5"', 'guantes', 2750.00, 'guante3.jpg'),
('Guante Mizuno Infielder 11.5"', 'guantes', 7290.00, 'guante4.jpg'),
('Guante Marucci Outfielder 12"', 'guantes', 5619.00, 'guante5.jpg'),
('Guante Franklin Outfielder 12.8"', 'guantes', 2090.00, 'guante6.jpg'),
('Guante Rawlings Primera Base 12.8"', 'guantes', 4768.00, 'guante7.jpg'),
('Guante Mizuno Pitcher 12"', 'guantes', 7474.00, 'guante8.jpg'),
('Guante Rawlings Pitcher 12"', 'guantes', 2812.00, 'guante9.jpg'),
('Guante Marucci Pitcher 12"', 'guantes', 5601.00, 'guante10.jpg');

-- TABLA DE CASCOS
CREATE TABLE IF NOT EXISTS cascos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, categoria, precio, imagen) VALUES
('Casco Con protector', 'cascos', 850.00, 'casco1.jpg'),
('Casco Easton', 'cascos', 1100.00, 'casco2.jpg'),
('Casco Evochield', 'cascos', 2400.00, 'casco3.jpg'),
('Casco Marucci', 'cascos', 2300.00, 'casco4.jpg'),
('Casco All-Star Zurdo', 'cascos', 1290.00, 'casco5.jpg'),
('Casco Under Armour', 'cascos', 1471.00, 'casco6.jpg'),
('Casco Easton', 'cascos', 2150.00, 'casco7.jpg'),
('Casco Rawlings Zurdo', 'cascos', 2000.00, 'casco8.jpg'),
('Casco Champro', 'cascos', 1490.00, 'casco9.jpg'),
('Casco EvoShield', 'cascos', 1386.00, 'casco10.jpg');

-- TABLA DE GUANTELETAS
CREATE TABLE IF NOT EXISTS guanteletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO productos (nombre, categoria, precio, imagen) VALUES
('Guanteletas Bruce Bolt', 'guanteletas', 600.00, 'guanteleta1.jpg'),
('Guanteletas Franklin', 'guanteletas', 750.00, 'guanteleta2.jpg'),
('Guanteletas Easton', 'guanteletas', 450.00, 'guanteleta3.jpg'),
('Guanteletas EvoShield', 'guanteletas', 600.00, 'guanteleta4.jpg'),
('Guanteletas Nike', 'guanteletas', 395.00, 'guanteleta5.jpg'),
('Guanteletas Mizuno', 'guanteletas', 1000.00, 'guanteleta6.jpg'),
('Guanteletas Rawlings', 'guanteletas', 1000.00, 'guanteleta7.jpg'),
('Guanteletas Marucci', 'guanteletas', 360.00, 'guanteleta8.jpg'),
('Guanteletas Victus', 'guanteletas', 600.00, 'guanteleta9.jpg'),
('Guanteletas Under Armour', 'guanteletas', 460.00, 'guanteleta10.jpg');

-- TABLA DE PROTECCIONES
CREATE TABLE IF NOT EXISTS protecciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);