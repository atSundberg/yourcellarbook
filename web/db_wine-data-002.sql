INSERT INTO users_tbl (name, pwd, email)
    VALUES ('jlo', 'jlo', 'jlo@stockstophelp.com');

INSERT INTO stocks_tbl (user_id, ticker, created_at
    ,stop_loss, first_close, last_close
    ,updated_at) 
    VALUES (1, 'IBM', datetime('now','localtime')
    , -1.0, -1.0, -1.0
    , datetime('now','localtime'));
INSERT INTO stocks_tbl (user_id, ticker, created_at
    ,stop_loss, first_close, last_close
    ,updated_at) 
    VALUES (1, 'SPY', datetime('now','localtime')
    , -1.0, -1.0, -1.0
    , datetime('now','localtime'));
INSERT INTO stocks_tbl (user_id, ticker, created_at
    ,stop_loss, first_close, last_close
    ,updated_at) 
    VALUES (1, 'AAPL', datetime('now','localtime')
    , -1.0, -1.0, -1.0
    , datetime('now','localtime'));



