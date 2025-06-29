<?php
require_once 'includes/functions.php';

// Set page variables
$page_title = 'About';
$current_page = 'about';

// Include header
include 'includes/header.php';
?>

<!-- About Header -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 mb-3">About the Artist</h1>
                <p class="lead text-muted">Learn more about Saloni and her artistic journey</p>
            </div>
        </div>
    </div>
</section>

<!-- Artist Bio -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="<?php echo SITE_URL; ?>/assets/images/artist-profile.jpg" alt="Saloni - Artist" class="img-fluid rounded shadow about-image">
            </div>
            <div class="col-lg-7">
                <h2 class="display-5 mb-4">Saloni</h2>
                <p class="lead">Contemporary Artist | Painter | Illustrator</p>
                <p>Born and raised in a family that appreciated art, I developed a passion for creating at a young age. My formal education in Fine Arts from the University of Arts has provided me with a strong foundation in various techniques and mediums.</p>
                <p>My work is characterized by vibrant colors, intricate details, and a blend of traditional and contemporary styles. I draw inspiration from nature, cultural diversity, and human emotions, aiming to create pieces that resonate with viewers on a personal level.</p>
                <p>Over the years, I've experimented with various mediums including acrylics, oils, watercolors, and mixed media. Each medium offers unique possibilities, and I enjoy exploring their potential to express different aspects of my artistic vision.</p>
                <p>When I'm not in my studio creating new artwork, I enjoy teaching art workshops, visiting galleries, and exploring new places to find fresh inspiration.</p>
            </div>
        </div>
    </div>
</section>

<!-- Artist Statement -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-5 mb-4">Artist Statement</h2>
                <p class="lead fst-italic">"Art is my way of communicating with the world, expressing emotions that words cannot capture, and creating visual stories that connect with people from all walks of life."</p>
                <p>My artistic practice is driven by a desire to explore the intersection of reality and imagination. Through my work, I aim to create immersive experiences that invite viewers to pause, reflect, and connect with their own emotions and memories.</p>
                <p>I believe that art has the power to transform spaces, evoke emotions, and bridge cultural divides. Each piece I create is a labor of love, infused with intention and crafted with attention to detail.</p>
            </div>
        </div>
    </div>
</section>

<!-- Exhibitions & Achievements -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5">Exhibitions & Achievements</h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h3 class="h4 mb-4">Solo Exhibitions</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4 class="h5">Colors of Life</h4>
                        <p class="text-muted">Contemporary Art Gallery, New York, 2023</p>
                        <p>A collection of vibrant paintings exploring the beauty of everyday moments.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">Nature's Whispers</h4>
                        <p class="text-muted">Urban Art Space, Chicago, 2021</p>
                        <p>An exhibition featuring landscapes and natural elements in abstract form.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">Emotions in Motion</h4>
                        <p class="text-muted">Modern Art Center, San Francisco, 2019</p>
                        <p>A series of paintings depicting human emotions through color and movement.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-5">
                <h3 class="h4 mb-4">Group Exhibitions</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4 class="h5">Emerging Artists Showcase</h4>
                        <p class="text-muted">International Art Fair, Paris, 2022</p>
                        <p>Selected as one of the promising artists to showcase work at this prestigious event.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">Harmony in Diversity</h4>
                        <p class="text-muted">Cultural Arts Center, London, 2020</p>
                        <p>Participated in a multicultural exhibition celebrating artistic diversity.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">New Perspectives</h4>
                        <p class="text-muted">Contemporary Gallery, Toronto, 2018</p>
                        <p>Featured alongside established artists in an exhibition exploring innovative techniques.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h3 class="h4 mb-4">Awards & Recognition</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4 class="h5">Excellence in Contemporary Art</h4>
                        <p class="text-muted">National Art Foundation, 2023</p>
                        <p>Recognized for outstanding contribution to contemporary art.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">Best Emerging Artist</h4>
                        <p class="text-muted">Art Critics Association, 2021</p>
                        <p>Awarded for innovative approach and technical excellence.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">People's Choice Award</h4>
                        <p class="text-muted">Annual Art Exhibition, 2019</p>
                        <p>Selected by public vote for most impactful artwork.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <h3 class="h4 mb-4">Education & Training</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4 class="h5">Master of Fine Arts</h4>
                        <p class="text-muted">University of Arts, 2015-2017</p>
                        <p>Specialized in Contemporary Painting with honors.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">Bachelor of Visual Arts</h4>
                        <p class="text-muted">National Institute of Design, 2011-2015</p>
                        <p>Foundation in various art forms and techniques.</p>
                    </div>
                    
                    <div class="timeline-item">
                        <h4 class="h5">Advanced Techniques Workshop</h4>
                        <p class="text-muted">International Art Academy, Summer 2016</p>
                        <p>Intensive training in mixed media and experimental techniques.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="display-5">Interested in working together?</h2>
                <p class="lead mb-0">I'm available for commissions and collaborations.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-light btn-lg">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>