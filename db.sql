CREATE TABLE jovenes (
    id SERIAL PRIMARY KEY,
    nombreCompleto VARCHAR(150),
    fecha_nacimiento DATE,
    edad INTEGER,
    numero_telefono VARCHAR(20),
    nombreIglesia VARCHAR(50),
    ocupacion VARCHAR(50),
    bautizado BOOLEAN,
    convertido BOOLEAN,
    direccion TEXT
);