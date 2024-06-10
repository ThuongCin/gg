Create Database ql_ban_hang; 
use ql_ban_hang;

Create Table category
(
    id int primary key AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE
);

Create Table product
(
    id int primary key AUTO_INCREMENT,
    name varchar(150) NOT NULL UNIQUE,
    price float NOT NULL,
    sale_price float DEFAULT '0',
    image varchar(150) NOT NULL,
    content text NULL,
    category_id int not null,
    FOREIGN KEY (category_id) REFERENCES category(id)
);

Create Table account
(
    id int primary key AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    email varchar(50) NOT NULL UNIQUE,
    phone varchar(50) NOT NULL UNIQUE,
    address varchar(150) NOT NULL,
    password varchar(150) NOT NULL
);

Create Table orders
(
    id int primary key AUTO_INCREMENT,
    status tinyint DEFAULT '0',
    order_date date DEFAULT now(),
    account_id int not null,
    FOREIGN KEY (account_id) REFERENCES account(id)
);

Create Table order_detail
(
    product_id int not null,
    order_id int not null,
    quantity int NOT NULL,
    price float NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(id),
    FOREIGN KEY (order_id) REFERENCES orders(id)
);


INSERT INTO `category` (`id`, `name`) VALUES
(9, 'BMW'),
(11, 'Ford'),
(5, 'Honda 123'),
(8, 'Huyndai'),
(10, 'Lamboghini'),
(12, 'Lexus'),
(7, 'Mercedes'),
(3, 'Toyota bác'),
(13, 'VinFast'),
(6, 'Yamaha');
