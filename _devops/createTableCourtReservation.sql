drop table if exists courtReservation;
create table courtReservation (
                               id     int primary key AUTO_INCREMENT,
                               time   varchar(256),
                               court1 varchar(256),
                               court2 varchar(256),
                               court3 varchar(256),
                               court4 varchar(256),
                               court5 varchar(256),
                               court6 varchar(256),
                               court7 varchar(256),
                               court8 varchar(256)
);

insert into courtReservation (time) values ('15:00-16:00');
insert into courtReservation (time) values ('16:00-17:00');
insert into courtReservation (time) values ('17:00-18:00');
insert into courtReservation (time) values ('18:00-19:00');
insert into courtReservation (time) values ('19:00-20:00');

update courtReservation set court1 = 'free' where court1 is NULL;
update courtReservation set court2 = 'free' where court2 is NULL;
update courtReservation set court3 = 'free' where court3 is NULL;
update courtReservation set court4 = 'free' where court4 is NULL;
update courtReservation set court5 = 'free' where court5 is NULL;
update courtReservation set court6 = 'free' where court6 is NULL;
update courtReservation set court7 = 'free' where court7 is NULL;
update courtReservation set court8 = 'free' where court8 is NULL;
