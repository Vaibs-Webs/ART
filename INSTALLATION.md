# Installation Guide for Arts By Saloni Website

This guide will walk you through the process of setting up the Arts By Saloni website on your server.

## Prerequisites

Before you begin, make sure you have the following:

- A web server with PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache with mod_rewrite enabled (for clean URLs)
- FTP access to your web server (if installing on a remote server)

## Step 1: Upload Files

1. Upload all files to your web server's public directory (e.g., public_html, www, or htdocs).
2. Make sure the `uploads` directory and its subdirectories (`artworks` and `pdfs`) are writable by the web server.

## Step 2: Create Database

1. Create a new MySQL database for the website.
2. Note down the database name, username, and password.

## Step 3: Configure the Website

1. Open the `includes/config.php` file in a text editor.
2. Update the database connection details:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_database_username');
   define('DB_PASS', 'your_database_password');
   define('DB_NAME', 'your_database_name');
   ```
3. Update the site URL and contact information:
   ```php
   define('SITE_NAME', 'Arts By Saloni');
   define('SITE_URL', 'http://yourdomain.com');
   define('CONTACT_EMAIL', 'your_email@example.com');
   define('CONTACT_PHONE', '+1234567890');
   define('WHATSAPP_NUMBER', '+1234567890');
   ```

## Step 4: Run the Setup Script

1. Open your web browser and navigate to `http://yourdomain.com/setup.php`.
2. This script will create the necessary database tables and a default admin user.
3. If successful, you'll see a confirmation message with a link to the admin panel.

## Step 5: Log in to the Admin Panel

1. Navigate to `http://yourdomain.com/admin`.
2. Log in with the default credentials:
   - Username: admin
   - Password: admin123
3. **Important:** Change the default password immediately after your first login.

## Step 6: Add Your Content

1. Start adding your artworks through the admin panel.
2. Update your profile information.
3. Add testimonials from satisfied customers.

## Step 7: Customize the Website (Optional)

1. Modify the CSS in `assets/css/style.css` to match your brand colors.
2. Update the logo and favicon.
3. Customize the content on the homepage, about page, and contact page.

## Troubleshooting

### Database Connection Issues

- Double-check your database credentials in `includes/config.php`.
- Make sure your MySQL server is running.
- Verify that the database user has the necessary permissions.

### Upload Directory Permissions

If you encounter errors when uploading images or PDFs:

1. Check that the `uploads` directory and its subdirectories have the correct permissions.
2. Set permissions to 755 or 775 depending on your server configuration.
3. Make sure the web server user (e.g., www-data, apache, or nobody) has write access to these directories.

### .htaccess Issues

If you're experiencing 404 errors or URL rewriting problems:

1. Make sure mod_rewrite is enabled on your Apache server.
2. Check that the .htaccess file was uploaded correctly.
3. Verify that AllowOverride is set to All in your Apache configuration.

## Security Recommendations

1. Change the default admin password immediately.
2. Use HTTPS for your website (uncomment the HTTPS redirect in .htaccess).
3. Regularly update your PHP and MySQL to the latest versions.
4. Consider implementing a firewall and security plugins.

## Need Help?

If you encounter any issues during installation, please contact [your email address] for support.