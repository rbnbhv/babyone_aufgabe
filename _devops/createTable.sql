create schema tennis_digital;
use tennis_digital;

create table tennis_digital.member_v1
(
    id          int auto_increment,
    email       varchar(255) not NULL,
    forename    varchar(255) not NULL,
    constraint ID
        unique (id)
);