<?php
require_once 'includes/functions.php';

// Set page variables
$page_title = 'Page Not Found';
$current_page = '';

// Include header
include 'includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-1 text-primary mb-4">404</h1>
            <h2 class="mb-4">Page Not Found</h2>
            <p class="lead mb-5">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="<?php echo SITE_URL; ?>" class="btn btn-primary">Go to Homepage</a>
                <a href="<?php echo SITE_URL; ?>/portfolio.php" class="btn btn-outline-primary">View Portfolio</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>