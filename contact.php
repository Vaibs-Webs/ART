<?php
require_once 'includes/functions.php';

// Set page variables
$page_title = 'Contact';
$current_page = 'contact';

// Process contact form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $subject = clean($_POST['subject']);
    $msg = clean($_POST['message']);
    $artwork_id = isset($_POST['artwork_id']) ? (int) $_POST['artwork_id'] : null;
    
    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($msg)) {
        $message = display_error('All fields are required.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = display_error('Please enter a valid email address.');
    } else {
        // Insert message into database
        $sql = "INSERT INTO messages (name, email, subject, message, artwork_id) VALUES ('$name', '$email', '$subject', '$msg', " . ($artwork_id ? $artwork_id : "NULL") . ")";
        
        if (mysqli_query($conn, $sql)) {
            $message = display_success('Your message has been sent successfully. I will get back to you soon!');
            
            // Clear form data
            $name = $email = $subject = $msg = $artwork_id = '';
        } else {
            $message = display_error('Sorry, there was an error sending your message. Please try again later.');
        }
    }
}

// Get all artworks for the dropdown
$artworks_sql = "SELECT id, title FROM artworks ORDER BY title ASC";
$artworks_result = mysqli_query($conn, $artworks_sql);

// Include header
include 'includes/header.php';
?>

<!-- Contact Header -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 mb-3">Get in Touch</h1>
                <p class="lead text-muted">Have questions about my artwork or interested in a commission? I'd love to hear from you!</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="contact-form">
                    <h2 class="h3 mb-4">Send a Message</h2>
                    
                    <?php echo $message; ?>
                    
                    <form id="contactForm" method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name *</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject *</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="" <?php echo !isset($subject) ? 'selected' : ''; ?>>Select a subject</option>
                                <option value="Buy" <?php echo (isset($subject) && $subject == 'Buy') ? 'selected' : ''; ?>>Purchase Inquiry</option>
                                <option value="Commission" <?php echo (isset($subject) && $subject == 'Commission') ? 'selected' : ''; ?>>Commission Request</option>
                                <option value="General" <?php echo (isset($subject) && $subject == 'General') ? 'selected' : ''; ?>>General Inquiry</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="artwork_id" class="form-label">Artwork Reference (Optional)</label>
                            <select class="form-select" id="artwork_id" name="artwork_id">
                                <option value="">Select an artwork</option>
                                <?php if (mysqli_num_rows($artworks_result) > 0): ?>
                                    <?php while ($artwork = mysqli_fetch_assoc($artworks_result)): ?>
                                        <option value="<?php echo $artwork['id']; ?>" <?php echo (isset($artwork_id) && $artwork_id == $artwork['id']) ? 'selected' : ''; ?>>
                                            <?php echo $artwork['title']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required><?php echo isset($msg) ? $msg : ''; ?></textarea>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" id="submitBtn" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="contact-info">
                    <h2 class="h3 mb-4">Contact Information</h2>
                    
                    <div class="mb-4">
                        <h3 class="h5">Email</h3>
                        <p class="mb-0">
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="text-decoration-none">
                                <i class="fas fa-envelope"></i> <?php echo CONTACT_EMAIL; ?>
                            </a>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5">Phone</h3>
                        <p class="mb-0">
                            <a href="tel:<?php echo CONTACT_PHONE; ?>" class="text-decoration-none">
                                <i class="fas fa-phone"></i> <?php echo CONTACT_PHONE; ?>
                            </a>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5">WhatsApp</h3>
                        <p class="mb-0">
                            <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_NUMBER); ?>" class="text-decoration-none" target="_blank">
                                <i class="fab fa-whatsapp"></i> <?php echo WHATSAPP_NUMBER; ?>
                            </a>
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5">Social Media</h3>
                        <div class="d-flex gap-3 mt-2">
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h3 class="h5">Working Hours</h3>
                        <p class="mb-1">Monday - Friday: 9:00 AM - 5:00 PM</p>
                        <p class="mb-0">Saturday: 10:00 AM - 2:00 PM</p>
                    </div>
                    
                    <div class="alert alert-info">
                        <p class="mb-0"><i class="fas fa-info-circle me-2"></i> I typically respond to inquiries within 24-48 hours.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="display-5 mb-3">Frequently Asked Questions</h2>
                <p class="lead text-muted">Find answers to common questions about my artwork and services</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Do you ship artwork internationally?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, I ship artwork worldwide. Shipping costs vary depending on the size of the artwork and destination. International shipping typically includes tracking and insurance to ensure your purchase arrives safely.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How does the commission process work?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The commission process begins with a consultation to discuss your ideas, preferences, and budget. I'll then provide a price quote and timeline. Once we agree on the details, I require a 50% deposit to begin work. I'll share progress updates throughout the creation process, and the remaining balance is due upon completion before shipping.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                I accept various payment methods including credit/debit cards, PayPal, bank transfers, and in some cases, installment plans for larger purchases. All transactions are secure, and receipts are provided for your records.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Do you offer certificates of authenticity?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, all original artworks come with a signed certificate of authenticity. This document verifies that the artwork is an original creation by me and includes details about the piece, such as title, date, medium, and dimensions.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I request a specific size for a commissioned artwork?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! Custom sizes are available for commissioned artworks. During our initial consultation, we'll discuss your space requirements and preferences to determine the ideal dimensions for your piece.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>