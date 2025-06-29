<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'arts_by_saloni';

// Connect to MySQL server
$conn = mysqli_connect($db_host, $db_user, $db_pass);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully or already exists<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select the database
mysqli_select_db($conn, $db_name);

// Create users table
$users_sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY (username),
    UNIQUE KEY (email)
)";

if (mysqli_query($conn, $users_sql)) {
    echo "Users table created successfully or already exists<br>";
} else {
    echo "Error creating users table: " . mysqli_error($conn) . "<br>";
}

// Create artworks table
$artworks_sql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) DEFAULT 0,
    price_on_request TINYINT(1) DEFAULT 0,
    category VARCHAR(100) DEFAULT NULL,
    tags VARCHAR(255) DEFAULT NULL,
    image VARCHAR(255) NOT NULL,
    pdf_file VARCHAR(255) DEFAULT NULL,
    featured TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)";

if (mysqli_query($conn, $artworks_sql)) {
    echo "Artworks table created successfully or already exists<br>";
} else {
    echo "Error creating artworks table: " . mysqli_error($conn) . "<br>";
}

// Create messages table
$messages_sql = "CREATE TABLE IF NOT EXISTS messages (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    artwork_id INT(11) DEFAULT NULL,
    read_status TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)";

if (mysqli_query($conn, $messages_sql)) {
    echo "Messages table created successfully or already exists<br>";
} else {
    echo "Error creating messages table: " . mysqli_error($conn) . "<br>";
}

// Create testimonials table
$testimonials_sql = "CREATE TABLE IF NOT EXISTS testimonials (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    title VARCHAR(100) DEFAULT NULL,
    content TEXT NOT NULL,
    rating INT(1) DEFAULT 5,
    active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)";

if (mysqli_query($conn, $testimonials_sql)) {
    echo "Testimonials table created successfully or already exists<br>";
} else {
    echo "Error creating testimonials table: " . mysqli_error($conn) . "<br>";
}

// Check if admin user exists
$admin_check = "SELECT * FROM users WHERE username = 'admin'";
$admin_result = mysqli_query($conn, $admin_check);

if (mysqli_num_rows($admin_result) == 0) {
    // Create default admin user
    $admin_password = password_hash('admin123', PASSWORD_DEFAULT);
    $admin_sql = "INSERT INTO users (name, username, email, password) VALUES ('Admin', 'admin', 'admin@example.com', '$admin_password')";
    
    if (mysqli_query($conn, $admin_sql)) {
        echo "Default admin user created successfully<br>";
        echo "Username: admin<br>";
        echo "Password: admin123<br>";
    } else {
        echo "Error creating admin user: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Admin user already exists<br>";
}

// Insert sample testimonials
$testimonials_check = "SELECT * FROM testimonials";
$testimonials_result = mysqli_query($conn, $testimonials_check);

if (mysqli_num_rows($testimonials_result) == 0) {
    $testimonials_data = [
        [
            'name' => 'Sarah Johnson',
            'title' => 'Art Collector',
            'content' => 'The painting I commissioned from Saloni exceeded all my expectations. She captured exactly what I was looking for, and the colors are even more vibrant in person!',
            'rating' => 5
        ],
        [
            'name' => 'Michael Chen',
            'title' => 'Interior Designer',
            'content' => 'Working with Saloni was a pleasure from start to finish. She listened carefully to my ideas and created a piece that perfectly complements my home. Highly recommended!',
            'rating' => 5
        ],
        [
            'name' => 'David Rodriguez',
            'title' => 'Customer',
            'content' => 'I purchased one of Saloni\'s paintings as a gift for my wife, and she absolutely loves it. The attention to detail and the emotion captured in the artwork is truly remarkable.',
            'rating' => 5
        ]
    ];
    
    foreach ($testimonials_data as $testimonial) {
        $sql = "INSERT INTO testimonials (name, title, content, rating) VALUES (
            '{$testimonial['name']}',
            '{$testimonial['title']}',
            '{$testimonial['content']}',
            {$testimonial['rating']}
        )";
        
        mysqli_query($conn, $sql);
    }
    
    echo "Sample testimonials added successfully<br>";
}

// Create upload directories
$upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/artist-portfolio-theme/uploads';
$artworks_dir = $upload_dir . '/artworks';
$pdfs_dir = $upload_dir . '/pdfs';

if (!file_exists($upload_dir)) {
    if (mkdir($upload_dir, 0777, true)) {
        echo "Uploads directory created successfully<br>";
    } else {
        echo "Error creating uploads directory<br>";
    }
}

if (!file_exists($artworks_dir)) {
    if (mkdir($artworks_dir, 0777, true)) {
        echo "Artworks directory created successfully<br>";
    } else {
        echo "Error creating artworks directory<br>";
    }
}

if (!file_exists($pdfs_dir)) {
    if (mkdir($pdfs_dir, 0777, true)) {
        echo "PDFs directory created successfully<br>";
    } else {
        echo "Error creating PDFs directory<br>";
    }
}

echo "<br>Setup completed successfully!<br>";
echo "<a href='index.php'>Go to Homepage</a> | <a href='admin/index.php'>Go to Admin Panel</a>";

// Close connection
mysqli_close($conn);
?>