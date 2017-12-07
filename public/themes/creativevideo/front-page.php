<?php
get_header();
the_post();
?>

<section class="section">
    <h1 class="section__title">About</h1>
    <div class="section__container">
        <div class="section__copy">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis posuere enim vel tortor interdum aliquam. Nulla elementum quam eget erat rutrum tincidunt. Ut ultricies ultrices orci non dapibus. Nullam a arcu non ex volutpat ornare. Maecenas eros nisl, egestas quis cursus id, condimentum a elit. Fusce rhoncus cursus massa, et mattis turpis. Suspendisse lacinia risus sit amet sapien dignissim semper non sed diam. Nam malesuada lorem nec mauris aliquam congue. Pellentesque sit amet ex nec ex pretium iaculis. Morbi pharetra risus diam, maximus rutrum nulla efficitur non.</p>
            <p>Ut vel diam quam. Fusce ex arcu, rutrum ultricies nulla nec, luctus posuere justo. Etiam pretium quam a nibh ultricies posuere. Duis sit amet hendrerit lacus. Nulla ornare nibh lacus. Mauris at massa at diam consequat vehicula. Nulla sit amet est lectus. Mauris feugiat, diam et suscipit vestibulum, purus ante fringilla odio, et maximus lorem enim a mauris.</p>
        </div>
    </div>
</section>
<section class="section">
    <h1 class="section__title">Services</h1>
    <div class="section__container">
        <div class="grid">
            <?php
                $query = new WP_Query( array( 
                    'post_type' => 'service',
                    'post_status' => 'publish',
                    'post_count' => 4,
                    'order' => 'ASC'
                ) );

                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        get_template_part( 'partials/blocks/service-block' );
                    }
                }
            ?>
        </div>
    </div>
</section>
<section class="section">
    <h1 class="section__title">Portfolio</h1>
    <div class="section__container">
        <div class="section__copy">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</section>
<section class="section">
    <h1 class="section__title">Testimonials</h1>
</section>
<section class="section">
    <h1 class="section__title">Map</h1>
</section>
<section class="section">
    <h1 class="section__title">Contact</h1>
    <div class="section__container">
        <?php echo do_shortcode( '[contact-form-7 id="29" title="Contact"]' ); ?>
    </div>
</section>

<?php get_footer(); ?>