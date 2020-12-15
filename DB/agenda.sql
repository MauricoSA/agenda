create database agenda;
	use agenda;
create table categorias(id_cat int auto_increment,
						nombre varchar(255),
						fecha date not null,
						primary key(id_cat));
create table contactos(id_con int auto_increment,
						nombre varchar(255),
						Apaterno varchar(255),
						Amaterno varchar(255),
						telefono char(255),
						Email varchar(255),
						id_cat int,
						primary key(id_con),
						foreign key(id_cat) references categorias(id_cat)
						);