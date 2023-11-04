CREATE TABLE `users` (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  nis int(64) NOT NULL,
  PRIMARY KEY(id)
);
INSERT INTO `users` (`username`, `name`, `nis`) VALUES ('voter', 'Asep', SHA2('2222', 256));