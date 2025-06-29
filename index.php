<?php
require_once 'includes/functions.php';

// Set page variables
$page_title = 'Home';
$current_page = 'home';

// Get featured artworks
$featured_artworks = get_artworks(3);
$testimonials = get_active_testimonials();


// Include header
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/hero-bg.jpg');">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 hero-content text-white">
                <h1 class="hero-title fade-in">Arts By Saloni</h1>
                <p class="hero-subtitle fade-in">Bringing imagination to life through vibrant colors and creative expression</p>
                <div class="d-flex gap-3 slide-up">
                    <a href="<?php echo SITE_URL; ?>/portfolio.php" class="btn btn-primary">View Portfolio</a>
                    <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-outline-light">Commission Artwork</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Artworks Section -->
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="display-5 mb-3">Featured Artworks</h2>
                <p class="lead text-muted">Explore some of my latest creations</p>
            </div>
        </div>
        
        <div class="row">
            <?php if (empty($featured_artworks)): ?>
                <div class="col-12 text-center">
                    <p>No artworks to display yet. Check back soon!</p>
                </div>
            <?php else: ?>
                <?php foreach ($featured_artworks as $artwork): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 portfolio-item">
                            <div class="position-relative overflow-hidden">
                                <img src="<?php echo SITE_URL; ?>/uploads/artworks/<?php echo $artwork['image']; ?>" class="card-img-top" alt="<?php echo $artwork['title']; ?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $artwork['title']; ?></h5>
                                <p class="card-text text-muted">
                                    <?php echo substr($artwork['description'], 0, 100); ?>...
                                </p>
                                <p class="card-text fw-bold">
                                    <?php if ($artwork['price_on_request']): ?>
                                        Price on Request
                                    <?php else: ?>
                                        $<?php echo number_format($artwork['price'], 2); ?>
                                    <?php endif; ?>
                                </p>
                                <a href="<?php echo SITE_URL; ?>/artwork.php?id=<?php echo $artwork['id']; ?>" class="btn btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="<?php echo SITE_URL; ?>/portfolio.php" class="btn btn-primary">View All Artworks</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="<?php echo SITE_URL; ?>/assets/images/artist-profile.jpg" alt="Saloni - Artist" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 mb-4">About the Artist</h2>
                <p class="lead">Hello, I'm Saloni, a passionate artist dedicated to creating vibrant and meaningful artwork.</p>
                <p>My journey as an artist began at a young age, and I've been exploring various mediums and techniques ever since. I draw inspiration from nature, human emotions, and the beautiful complexities of everyday life.</p>
                <p>Each piece I create tells a unique story and captures a moment of inspiration. I believe art has the power to transform spaces and touch hearts.</p>
                <a href="<?php echo SITE_URL; ?>/about.php" class="btn btn-outline-primary mt-3">Learn More About Me</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="display-5 mb-3">What Clients Say</h2>
                <p class="lead text-muted">Hear from people who have purchased or commissioned artwork</p>
            </div>
        </div>
        
<div class="row">
    <?php if (empty($testimonials)): ?>
        <div class="col-12 text-center">
            <p>No testimonials yet.</p>
        </div>
    <?php else: ?>
        <?php foreach ($testimonials as $t): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <?php for ($i = 0; $i < $t['rating']; $i++): ?>
                                <i class="fas fa-star text-warning"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="card-text">"<?php echo htmlspecialchars($t['content']); ?>"</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="ms-3">
                                <h6 class="mb-0"><?php echo htmlspecialchars($t['name']); ?></h6>
                                <small class="text-muted"><?php echo htmlspecialchars($t['title']); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

    </div>
</section>


<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="display-5">Ready to add some art to your life?</h2>
                <p class="lead mb-0">Commission a custom piece or explore available artworks in my portfolio.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-light btn-lg">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>