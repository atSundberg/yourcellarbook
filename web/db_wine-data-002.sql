INSERT INTO
    users_tbl (name, pwd, email)
VALUES
    ('admin', 'master#', 'admin@yourcellarbook.com');

INSERT INTO
    wine_tbl (
        user_id,
        name,
        vintage,
        producer,
        category,
        region,
        country,
        quantity,
        created_at,
    )
VALUES
    (
        1,
        'Susucaru Rossato',
        2020,
        'Frank Cornelissen',
        'Red',
        'Etna',
        'Italy',
        1,
        DATE('now')
    );

INSERT INTO
    wine_tbl (
        user_id,
        name,
        vintage,
        producer,
        category,
        region,
        country,
        quantity,
        created_at,
    )
VALUES
    (
        1,
        'Bona Fide',
        2019,
        'Crystallum',
        'Red',
        'Walker Bay',
        'South Africa',
        1,
        DATE('now')
    );

INSERT INTO
    grape_tbl (grape_name)
VALUES
    ('Nerello Mascalese');

INSERT INTO
    grape_tbl (grape_name)
VALUES
    ('Nerello Capuccio');

INSERT INTO
    grape_tbl (grape_name)
VALUES
    ('Pinot Noir');

INSERT INTO
    wine_grape_tbl (wine_id, grape_id)
VALUES
    (1, 1);

INSERT INTO
    wine_grape_tbl (wine_id, grape_id)
VALUES
    (1, 2);

INSERT INTO
    wine_grape_tbl (wine_id, grape_id)
VALUES
    (2, 3);