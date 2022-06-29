CREATE TABLE IF NOT EXISTS users_tbl (
    id INTEGER PRIMARY KEY NOT NULL,
	name TEXT NOT NULL,
    pwd TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS stocks_tbl (
	id INTEGER PRIMARY KEY NOT NULL,
    user_id INTEGER KEY,
//-----------    
	ticker TEXT NOT NULL,
    created_at TEXT NOT NULL,
    first_close REAL NOT NULL,
    stop_loss REAL NOT NULL,
    last_close REAL NOT NULL,
    updated_at TEXT NOT NULL
//-----------    
);


