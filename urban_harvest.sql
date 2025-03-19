USE urban_harvest;

CREATE TABLE product_category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME,
    updated_at DATETIME
);


CREATE TABLE product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT,
    name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    price DECIMAL(10, 2),
    image_url VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME,
    status VARCHAR(50),
    FOREIGN KEY (category_id) REFERENCES product_category(category_id)
);
CREATE TABLE product_inventory (
    inventory_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    quantity_in_stock INT,
    restock_level INT,
    variant VARCHAR(255),
    sku VARCHAR(255) UNIQUE,  -- Ensure SKU is unique
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);
CREATE TABLE discount (
    discount_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    description TEXT,
    discount_percentage DECIMAL(5, 2),
    start_date DATETIME,
    end_date DATETIME,
    status VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);
CREATE TABLE user_login (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    last_login DATETIME,
    failed_attempts INT
);
CREATE TABLE user_details (
    user_id INT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    address TEXT,
    email VARCHAR(255),
    phone_number VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES user_login(user_id)
);

CREATE TABLE user_payment (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    payment_method VARCHAR(50),
    payment_status VARCHAR(50),
    amount DECIMAL(10, 2),
    payment_date DATETIME,
    order_id INT,
    FOREIGN KEY (user_id) REFERENCES user_login(user_id),
    FOREIGN KEY (order_id) REFERENCES order_table(order_id)  -- This needs to exist first
);

CREATE TABLE payment_details (
    payment_id INT PRIMARY KEY,
    user_id INT,
    card_number VARCHAR(255),  -- Encrypted
    card_expiry DATETIME,
    billing_address TEXT,
    card_holder_name VARCHAR(255),
    FOREIGN KEY (payment_id) REFERENCES user_payment(payment_id),
    FOREIGN KEY (user_id) REFERENCES user_login(user_id)
);

CREATE TABLE order_table (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    order_date DATETIME,
    shipping_address TEXT,
    total_amount DECIMAL(10, 2),
    payment_status VARCHAR(50),
    shipping_status VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES user_login(user_id)
);

CREATE TABLE order_item (
    order_id INT,
    product_id INT,
    quantity INT,
    unit_price DECIMAL(10, 2),
    discount_amount DECIMAL(10, 2),
    total_price DECIMAL(10, 2),
    product_variant VARCHAR(255),
    inventory_id INT,  -- Reference the inventory_id which is unique
    created_at DATETIME,
    updated_at DATETIME,
    PRIMARY KEY (order_id, product_id),
    FOREIGN KEY (order_id) REFERENCES order_table(order_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    FOREIGN KEY (inventory_id) REFERENCES product_inventory(inventory_id)
);
