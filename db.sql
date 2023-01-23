/* Testé sous MySQL 5.x */

drop table if exists T_MESSAGE;
drop table if exists T_TICKET;

create table T_TICKET (
  TICKET_ID integer primary key auto_increment,
  TICKET_DATE datetime not null,
  TICKET_TITRE varchar(100) not null,
  TICKET_CONTENU varchar(400) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_MESSAGE (
  MESSAGE_ID integer primary key auto_increment,
  MESSAGE_DATE datetime not null,
  MESSAGE_AUTEUR varchar(100) not null,
  MESSAGE_CONTENU varchar(200) not null,
  TICKET_ID integer not null,
  constraint fk_MESSAGE_TICKET foreign key(TICKET_ID) references T_TICKET(TICKET_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into T_TICKET(TICKET_DATE, TICKET_TITRE, TICKET_CONTENU) values
(NOW(), 'Premier TICKET', 'Bonjour monde ! Ceci est le premier TICKET sur mon blog.');
insert into T_TICKET(TICKET_DATE, TICKET_TITRE, TICKET_CONTENU) values
(NOW(), 'Au travail', 'Il faut enrichir ce blog dès maintenant.');

insert into T_MESSAGE(MESSAGE_DATE, MESSAGE_AUTEUR, MESSAGE_CONTENU, TICKET_ID) values
(NOW(), 'A. Nonyme', 'Bravo pour ce début', 1);
insert into T_MESSAGE(MESSAGE_DATE, MESSAGE_AUTEUR, MESSAGE_CONTENU, TICKET_ID) values
(NOW(), 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1);