-- Tạo cơ sở dữ liệu
CREATE DATABASE products;

USE products;

-- Tạo bảng 'products'
create table products (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50),
	price DECIMAL(4,1),
	image VARCHAR(50)
);
insert into products (name, price, image) values ('Gerrie', 26.1, '1.jpg');
insert into products (name, price, image) values ( 'Millisent', 47.2, '2.jpg');
insert into products (name, price, image) values ( 'Giselle', 41.2, '3.jpg');
insert into products (name, price, image) values ( 'Reid', 27.9, '4.jpg');
insert into products (name, price, image) values ( 'Dalston', 23.6, '5.jpg');
insert into products (name, price, image) values ( 'Tommie', 15.7, '6.jpg');
insert into products (name, price, image) values ( 'Georgy', 42.0, '7.jpg');
insert into products (name, price, image) values ( 'Marget', 49.4, '8.jpg');
insert into products (name, price, image) values ( 'Elysee', 68.7, '9.jpg');
insert into products (name, price, image) values ( 'Archer', 78.9, '10.jpg');