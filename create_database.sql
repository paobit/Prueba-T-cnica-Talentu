USE storagehouse;

CREATE TABLE IF NOT EXISTS `usuario` (
  `correo` varchar(13) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(13) NOT NULL,
  `tipo_documento` varchar NOT NULL,
  `numero_documento` int NOT NULL,
  PRIMARY KEY (`numero_documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;


CREATE TABLE IF NOT EXISTS `oferta_laboral` (
  `nombre_oferta` varchar(13) NOT NULL,
  `usuario` varchar NOT NULL,
  `Estado` varchar(19) NOT NULL,
  `Estado` varchar(19) NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

/*CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
*/) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `usuario` (`correo`, `nombre`, `tipo_documento`, 'numero_documento') VALUES
(1, 'primerusuario@prueba.com', 'Pedro Sanchez','DNI', '222222222.'),
(2, 'segundousuario@prueba.com', 'Juan Perez','DNI', '33333333.'),
(3, 'tercerusuario@prueba.com', 'Maria Sosa', 'DNI' ,'111111111.'),
(4, 'cuartousuario@prueba.com', 'Laura Peralta', 'DNI', '444444444.'),
(5, 'quintousuario@prueba.com', 'Patricia Gonzalez', 'DNI', '55555555.'),
(6, 'sextousuario@prueba.com','Claudia Lopez', 'DNI', '8888888.');


INSERT INTO `oferta laboral` (`nombre_oferta`, `usuario`, `Estado`) VALUES
(1, 'cocinero', 'usuario', 'estado'),
(2, 'mozo', 'usuario', 'estado'),
(3, 'pastelero', 'usuario', 'estado'),
(4, 'chofer', 'usuario', 'estado'),
(5, 'ayudante_cocina', 'usuario.', 'estado'),
(6, 'instalador', 'usuario', 'estado'),

SELECT @@SPID AS 'usuario'
 ,SYSTEM_USER AS 'nombre'
 ,USER AS 'nombre';