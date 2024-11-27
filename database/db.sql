-- create table farm_inventory
DROP DATABASE IF EXISTS farm_inventory;
CREATE DATABASE farm_inventory;
USE farm_inventory;

-- Users table to store account information
CREATE TABLE farmInventory_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,  -- store hashed password,
    role ENUM('admin', 'farm_manager') DEFAULT 'farm_manager',
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL
);

-- Inventory table, linked to users
CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    quantity INT DEFAULT 0,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE audit_logs(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    inventory_id INT NOT NULL,
    action ENUM('add', 'edit', 'delete') NOT NULL,
    action_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES farmInventory_users(id) ON DELETE CASCADE,
    FOREIGN KEY (inventory_id) REFERENCES inventory(id) ON DELETE CASCADE
);

CREATE TABLE session_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    logout_time TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES farmInventory_users(id) ON DELETE CASCADE
);

-- Equipment table, linked to users
CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipment_name VARCHAR(100) NOT NULL,
    status ENUM('available', 'in_use', 'maintenance') DEFAULT 'available',
    purchase_date DATE NOT NULL,
    last_service_date DATE NULL,
    next_Service_due DATE NULL
);
