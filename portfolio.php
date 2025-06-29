<?php
require_once 'includes/functions.php';

// Set page variables
$page_title = 'Portfolio';
$current_page = 'portfolio';

// Get all artworks
$artworks = get_artworks();

// Include header
include 'includes/header.php';
?>

<!-- Portfolio Header -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 mb-3">Artwork Portfolio</h1>
                <p class="lead text-muted">Explore my collection of original artworks</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Filters -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio-filters d-flex justify-content-center flex-wrap gap-2 mb-4">
                    <button class="btn btn-outline-primary active" data-filter="all">All</button>
                    <button class="btn btn-outline-primary" data-filter="Paintings">Paintings</button>
                    <button class="btn btn-outline-primary" data-filter="Drawings">Drawings</button>
                    <button class="btn btn-outline-primary" data-filter="Digital Art">Digital Art</button>
                    <button class="btn btn-outline-primary" data-filter="Mixed Media">Mixed Media</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <?php if (empty($artworks)): ?>
                <div class="col-12 text-center">
                    <p>No artworks to display yet. Check back soon!</p>
                </div>
            <?php else: ?>
                <?php foreach ($artworks as $artwork): ?>
                    <div class="col-md-6 col-lg-4 mb-4 portfolio-item" data-category="<?php echo $artwork['category']; ?>">
                        <div class="card h-100 shadow-sm">
                            <div class="position-relative overflow-hidden">
                                <img src="<?php echo SITE_URL; ?>/uploads/artworks/<?php echo $artwork['image']; ?>" class="card-img-top" alt="<?php echo $artwork['title']; ?>">
                                <div class="portfolio-overlay">
                                    <h5 class="mb-1"><?php echo $artwork['title']; ?></h5>
                                    <p class="mb-0 small"><?php echo $artwork['category']; ?></p>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $artwork['title']; ?></h5>
                                <p class="card-text text-muted small">
                                    <?php echo substr($artwork['description'], 0, 100); ?>...
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">
                                        <?php if ($artwork['price_on_request']): ?>
                                            Price on Request
                                        <?php else: ?>
                                            $<?php echo number_format($artwork['price'], 2); ?>
                                        <?php endif; ?>
                                    </span>
                                    <a href="<?php echo SITE_URL; ?>/artwork.php?id=<?php echo $artwork['id']; ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Commission CTA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="display-5">Looking for something specific?</h2>
                <p class="lead mb-0">I also create custom artwork based on your ideas and preferences.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-primary btn-lg">Commission Artwork</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>