DROP TABLE IF EXISTS courts;
CREATE TABLE courts
(
    id    int primary key AUTO_INCREMENT,
    court int
);

DROP TABLE IF EXISTS reservations;
CREATE TABLE reservations
(
    id       int primary key AUTO_INCREMENT,
    date     datetime,
    court_id int,
    member   int
);