<?php
require_once 'includes/functions.php';

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    redirect(SITE_URL . '/portfolio.php');
}

// Get artwork details
$artwork_id = (int) $_GET['id'];
$artwork = get_artwork($artwork_id);

// If artwork not found, redirect to portfolio
if (!$artwork) {
    redirect(SITE_URL . '/portfolio.php');
}

// Set page variables
$page_title = $artwork['title'];
$current_page = 'portfolio';

// Include PDF.js for PDF viewer if artwork has PDF
$extra_js = '';
if (!empty($artwork['pdf_file'])) {
    $extra_js = '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        // PDF.js initialization
        pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js";
        
        const loadPdf = async () => {
            const pdfUrl = "' . SITE_URL . '/uploads/pdfs/' . $artwork['pdf_file'] . '";
            const loadingTask = pdfjsLib.getDocument(pdfUrl);
            const pdf = await loadingTask.promise;
            
            // Load first page
            const page = await pdf.getPage(1);
            const scale = 1.5;
            const viewport = page.getViewport({ scale });
            
            // Prepare canvas
            const canvas = document.getElementById("pdf-canvas");
            const context = canvas.getContext("2d");
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            
            // Render PDF page
            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            
            await page.render(renderContext);
            
            // Show PDF container
            document.getElementById("pdf-container").style.display = "block";
        };
        
        document.getElementById("view-pdf-btn").addEventListener("click", function() {
            loadPdf();
        });
    </script>';
}

// Include header
include 'includes/header.php';
?>

<!-- Artwork Detail -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="position-relative">
                    <img src="<?php echo SITE_URL; ?>/uploads/artworks/<?php echo $artwork['image']; ?>" class="img-fluid artwork-image rounded shadow" alt="<?php echo $artwork['title']; ?>">
                    <?php if (!empty($artwork['pdf_file'])): ?>
                        <button id="view-pdf-btn" class="btn btn-sm btn-primary position-absolute bottom-0 end-0 m-3">
                            <i class="fas fa-file-pdf me-1"></i> View Certificate/Catalog
                        </button>
                    <?php endif; ?>
                </div>
                
                <?php if (!empty($artwork['pdf_file'])): ?>
                    <div id="pdf-container" class="mt-4 p-3 border rounded" style="display: none;">
                        <h5 class="mb-3">Artwork Certificate/Catalog</h5>
                        <canvas id="pdf-canvas" class="w-100"></canvas>
                        <div class="mt-3">
                            <a href="<?php echo SITE_URL; ?>/uploads/pdfs/<?php echo $artwork['pdf_file']; ?>" class="btn btn-outline-primary" target="_blank">
                                <i class="fas fa-download me-1"></i> Download PDF
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-5 artwork-info">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo SITE_URL; ?>/portfolio.php">Portfolio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $artwork['title']; ?></li>
                    </ol>
                </nav>
                
                <h1 class="display-5 mb-3"><?php echo $artwork['title']; ?></h1>
                
                <?php if (!empty($artwork['category'])): ?>
                    <div class="mb-3">
                        <span class="badge bg-secondary"><?php echo $artwork['category']; ?></span>
                    </div>
                <?php endif; ?>
                
                <div class="mb-4">
                    <h3 class="h5 mb-3">Price:</h3>
                    <p class="fs-4 fw-bold">
                        <?php if ($artwork['price_on_request']): ?>
                            Price on Request
                        <?php else: ?>
                            $<?php echo number_format($artwork['price'], 2); ?>
                        <?php endif; ?>
                    </p>
                </div>
                
                <div class="mb-4">
                    <h3 class="h5 mb-3">Description:</h3>
                    <p><?php echo nl2br($artwork['description']); ?></p>
                </div>
                
                <?php if (!empty($artwork['tags'])): ?>
                    <div class="mb-4">
                        <h3 class="h5 mb-3">Tags:</h3>
                        <div>
                            <?php foreach (explode(',', $artwork['tags']) as $tag): ?>
                                <span class="badge bg-light text-dark me-2 mb-2"><?php echo trim($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="d-grid gap-2">
                    <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_NUMBER); ?>?text=I'm interested in the artwork '<?php echo urlencode($artwork['title']); ?>' (ID: <?php echo $artwork_id; ?>)" class="btn btn-success" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i> Inquire via WhatsApp
                    </a>
                    <a href="mailto:<?php echo CONTACT_EMAIL; ?>?subject=Inquiry about '<?php echo urlencode($artwork['title']); ?>'&body=I'm interested in the artwork '<?php echo urlencode($artwork['title']); ?>' (ID: <?php echo $artwork_id; ?>). Please provide more information." class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i> Inquire via Email
                    </a>
                </div>
                
                <div class="mt-4">
                    <h3 class="h5 mb-3">Share:</h3>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(SITE_URL . '/artwork.php?id=' . $artwork_id); ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(SITE_URL . '/artwork.php?id=' . $artwork_id); ?>&text=Check out this amazing artwork: <?php echo urlencode($artwork['title']); ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(SITE_URL . '/artwork.php?id=' . $artwork_id); ?>&media=<?php echo urlencode(SITE_URL . '/uploads/artworks/' . $artwork['image']); ?>&description=<?php echo urlencode($artwork['title']); ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Artworks -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h3">You May Also Like</h2>
            </div>
        </div>
        
        <div class="row">
            <?php
            // Get related artworks (same category, excluding current)
            $related_sql = "SELECT * FROM artworks WHERE id != $artwork_id";
            if (!empty($artwork['category'])) {
                $related_sql .= " AND category = '" . $artwork['category'] . "'";
            }
            $related_sql .= " ORDER BY RAND() LIMIT 3";
            
            $related_result = mysqli_query($conn, $related_sql);
            
            if (mysqli_num_rows($related_result) > 0):
                while ($related = mysqli_fetch_assoc($related_result)):
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 portfolio-item">
                        <img src="<?php echo SITE_URL; ?>/uploads/artworks/<?php echo $related['image']; ?>" class="card-img-top" alt="<?php echo $related['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $related['title']; ?></h5>
                            <p class="card-text fw-bold">
                                <?php if ($related['price_on_request']): ?>
                                    Price on Request
                                <?php else: ?>
                                    $<?php echo number_format($related['price'], 2); ?>
                                <?php endif; ?>
                            </p>
                            <a href="<?php echo SITE_URL; ?>/artwork.php?id=<?php echo $related['id']; ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            else:
            ?>
                <div class="col-12 text-center">
                    <p>No related artworks found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>