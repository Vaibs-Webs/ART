-- Create the database
CREATE DATABASE IF NOT EXISTS arts_by_saloni;
USE arts_by_saloni;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create artworks table
CREATE TABLE IF NOT EXISTS artworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NULL,
    price_on_request BOOLEAN DEFAULT FALSE,
    image VARCHAR(255) NOT NULL,
    pdf_file VARCHAR(255) NULL,
    category VARCHAR(50) NULL,
    tags VARCHAR(255) NULL,
    featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create messages table
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    artwork_id INT NULL,
    read_status BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artwork_id) REFERENCES artworks(id) ON DELETE SET NULL
);

-- Create testimonials table
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    position VARCHAR(100) NULL,
    display_order INT DEFAULT 0,
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user (password: admin123)
INSERT INTO users (username, password, email, name) VALUES
('admin', '$2y$10$8zUkFX1tXY.oenWXvQkNJeVA.zKHgLwLw1XaRhbC5vwlVgZIkfGfK', 'admin@artsbysaloni.com', 'Admin');

-- Insert sample categories
INSERT INTO categories (name, description) VALUES
('Paintings', 'Original paintings on canvas'),
('Drawings', 'Pencil, charcoal and ink drawings'),
('Digital Art', 'Digitally created artwork'),
('Mixed Media', 'Artwork using multiple mediums');