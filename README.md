# Arts By Saloni - Artist Portfolio Website

A professional artist portfolio website designed to showcase and sell artwork online.

## Features

- Responsive design that works on all devices
- Beautiful portfolio display with filtering options
- Detailed artwork pages with image and PDF support
- Contact form for inquiries and commissions
- WhatsApp integration for direct communication
- Admin panel for easy content management
- Testimonials section to showcase client feedback
- Secure login system for the admin area

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server with mod_rewrite enabled
- GD library for image processing

## Installation

1. **Clone or download the repository**

   ```
   git clone https://github.com/yourusername/artist-portfolio-theme.git
   ```

   Or download and extract the ZIP file to your web server directory.

2. **Create a MySQL database**

   Create a new MySQL database for the website.

3. **Configure the database connection**

   Edit the `includes/config.php` file and update the database connection details:

   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_database_username');
   define('DB_PASS', 'your_database_password');
   define('DB_NAME', 'your_database_name');
   ```

4. **Update site configuration**

   In the same `includes/config.php` file, update the site URL and contact information:

   ```php
   define('SITE_NAME', 'Arts By Saloni');
   define('SITE_URL', 'http://yourdomain.com');
   define('CONTACT_EMAIL', 'your_email@example.com');
   define('CONTACT_PHONE', '+1234567890');
   define('WHATSAPP_NUMBER', '+1234567890');
   ```

5. **Run the setup script**

   Navigate to `http://yourdomain.com/setup.php` in your web browser to create the database tables and initial admin user.

6. **Create upload directories**

   Make sure the following directories exist and are writable:

   ```
   uploads/
   uploads/artworks/
   uploads/pdfs/
   ```

   You can set permissions with:

   ```
   chmod -R 755 uploads/
   ```

7. **Log in to the admin panel**

   Navigate to `http://yourdomain.com/admin` and log in with the default credentials:

   - Username: admin
   - Password: admin123

   **Important:** Change the default password immediately after your first login.

8. **Add your content**

   Start adding your artworks, testimonials, and other content through the admin panel.

## Admin Guide

A comprehensive admin guide is available at `admin_guide.html`, which explains how to:

- Log in to the admin panel
- Add, edit, and delete artworks
- Manage categories
- Handle customer inquiries
- Update your profile and password
- And more!

## Customization

### Changing the theme colors

Edit the `assets/css/style.css` file to customize the colors, fonts, and other styling elements.

### Modifying the layout

The website uses Bootstrap 5 for layout. You can modify the HTML structure in the PHP files to change the layout as needed.

## Security

- The admin panel is protected by a secure login system
- Passwords are hashed using PHP's password_hash() function
- Input data is sanitized to prevent SQL injection and XSS attacks
- Sensitive files are protected from direct access

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Credits

- Bootstrap 5: https://getbootstrap.com/
- Font Awesome: https://fontawesome.com/
- jQuery: https://jquery.com/
- PDF.js: https://mozilla.github.io/pdf.js/

## Support

For support, please contact [your email address].