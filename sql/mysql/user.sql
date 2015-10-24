drop table if exists `user`;
create table `user` (
  `id` int(11) not null auto_increment,
  `activity` tinyint(1) default 0, 
  `login` varchar(255) not null,
  `password` varchar(255) not null,
  `type` enum('user', 'admin') default 'user',
  `name` varchar(255) not null,
  `age` smallint not null,
  primary key (`id`)
) engine=myIsam;

insert into `user` values
(null, 1, 'admin', md5('qwerty'), 'admin', 'test', 23),
(null, 1, 'user', md5('qwerty'), 'user', 'tester', 23);