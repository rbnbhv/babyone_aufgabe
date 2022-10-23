DROP TABLE IF EXISTS court;
CREATE TABLE court
(
    id          int primary key AUTO_INCREMENT,
    courtNumber varchar(255)
);

create table reservation
(
    id        int auto_increment
        primary key,
    date      datetime null,
    court_id  int      null,
    member_id int      null,
    constraint court_id
        foreign key (court_id) references court (id),
    constraint member_id
        foreign key (member_id) references member_v1 (id)
);



INSERT INTO court (courtNumber) VALUES ('Platz 1');
INSERT INTO court (courtNumber) VALUES ('Platz 2');
INSERT INTO court (courtNumber) VALUES ('Platz 3');
INSERT INTO court (courtNumber) VALUES ('Platz 4');
INSERT INTO court (courtNumber) VALUES ('Platz 5');
INSERT INTO court (courtNumber) VALUES ('Platz 6');
INSERT INTO court (courtNumber) VALUES ('Platz 7');
INSERT INTO court (courtNumber) VALUES ('Platz 8');