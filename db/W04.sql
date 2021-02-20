-- WK04 SQL script

-- Products table
create table Products (
	product_id int GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	sku varchar(30) NOT NULL,
	product_name varchar(30) NOT NULL,
	price float NOT NULL,
	product_description varchar(100) NOT NULL,
	image_product varchar(100) NOT NULL,
	category_id int references Categories(category_id) NOT NULL,
	created_at date NOT NULL
	quantity int NOT NULL
);

-- Categories table
create table Categories(
	category_id int GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	name_category varchar(30) NOT NULL,
	description_category varchar(100) NOT NULL
)

-- Customers table
create table Customers(
	customer_id int GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	email varchar(30) NOT NULL,
	password_customer varchar(30) NOT NULL,
	full_name varchar(30) NOT NULL,
	billing_address varchar(50) NOT NULL,
	default_shipping_address varchar(30) NOT NULL,
	country varchar(30) NOT NULL, 
	phone varchar(10) NOT NULL
)

-- Order_details table
create table Order_details(
	order_details_id int GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	order_id int references Orders(order_id) NOT NULL,
	product_id int references Products(product_id),
	price float NOT NULL,
	sku varchar(30) NOT NULL,
	quantity int NOT NULL
);

-- Orders
create table Orders(
	order_id int GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
	customer_id int references Customers(customer_id) NOT NULL,
	ammount float NOT NULL,
	shipping_address varchar(50) NOT NULL,
	order_address varchar(30) NOT NULL,
	order_email varchar(30) NOT NULL,
	order_date date NOT NULL,
	order_status varchar(30) NOT NULL
);

create table clients (
  clientId int GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  clientFirstname varchar(15) NOT NULL,
  clientLastname varchar(25) NOT NULL,
  clientEmail varchar(40) NOT NULL,
  clientPassword varchar(255) NOT NULL,
  clientLevel varchar(3) DEFAULT '1',
  comment text DEFAULT NULL
) 
