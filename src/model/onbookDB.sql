

CREATE TABLE `auth` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `usuario` varchar(70) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `imagem` varchar(100) NOT NULL,
  `data_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `texts` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `id_auth` varchar(70) NOT NULL ,
  `texts` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

