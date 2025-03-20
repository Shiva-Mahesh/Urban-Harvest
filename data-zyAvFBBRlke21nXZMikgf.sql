

DROP TABLE IF EXISTS `myTable`;

CREATE TABLE `myTable` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `email` varchar(255) default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `myTable` (`email`)
VALUES
  ("eros.nam.consequat@google.ca"),
  ("adipiscing.elit.aliquam@yahoo.net"),
  ("suspendisse@icloud.edu"),
  ("nascetur.ridiculus.mus@aol.net"),
  ("iaculis.quis@hotmail.couk"),
  ("gravida.mauris@google.net"),
  ("sed.leo@google.edu"),
  ("sapien.imperdiet.ornare@outlook.couk"),
  ("curae.donec@outlook.net"),
  ("sem.elit.pharetra@aol.couk");
