create schema if not exists tennis_digital;
use tennis_digital;

create table if not exists tennis_digital.member_v1
(
    id          int auto_increment,
    email       varchar(255) unique not NULL,
    forename    varchar(255) not NULL,
    constraint id
        unique (id)
);