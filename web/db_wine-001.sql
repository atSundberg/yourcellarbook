CREATE TABLE IF NOT EXISTS users_tbl (
    id INTEGER PRIMARY KEY NOT NULL,
    name TEXT NOT NULL,
    pwd TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS wine_tbl (
    id INTEGER PRIMARY KEY NOT NULL,
    user_id INTEGER KEY,
    name TEXT NOT NULL,
    vintage INT NOT NULL,
    producer VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    region VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    created_at DATE NOT NULL,
    information TEXT NULL,
    storing_location VARCHAR(100) NULL
);

CREATE TABLE IF NOT EXISTS wine_grape_tbl (
    wine_id INTEGER NOT NULL,
    grape_id INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS grape_tbl (
    id INTEGER PRIMARY KEY NOT NULL,
    grape_name VARCHAR(100) NOT NULL
);