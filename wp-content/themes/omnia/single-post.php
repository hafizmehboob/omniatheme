<?php
get_header();
$getPostID = get_the_ID();
/** Header For Portfolio * */
$headerTitle = get_field('add_title_slider_for_portfolio', 'option');
$headerSubTitle = get_field('add_sub_title_slider_for_portfolio', 'option');
$headerImage = get_field('add_image_slider_for_portfolio', 'option');
/** Social Links * */
$fbLink = get_field('facebook_link', 'option');
$twitterLink = get_field('twitter_link', 'option');
$googlePlus = get_field('google_plus', 'option');
$skype = get_field('skype', 'option');
/** Slider * */
$add_slider = get_field('add_slider', 'option');
?>

<main>
    <section class="slider-section">
        <div class="row m-0">
            <?php if (!empty($headerTitle) && !empty($headerSubTitle)) { ?> 
                <div class="col-sm-6 p-0">
                    <div class="slider-content">
                        <div> 
                            <?php if (!empty($headerTitle)) { ?> <h1><?php echo $headerTitle; ?></h1><?php } ?>
                            <?php if (!empty($headerSubTitle)) { ?><h2><?php echo $headerSubTitle; ?></h2><?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($headerImage)) { ?> 
                <div class="col-sm-6 p-0">
                    <img src="<?php echo $headerImage; ?>"  class="img-fluid" alt="Slider" />
                </div>
            <?php } ?>
        </div>
    </section>
    <div class="container-fluid">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach ($posttags as $tag) {
                        $tagName = $tag->name;
                        break;
                    }
                }
                $categories = get_categories();
                $customField = get_field('custom_field');
                ?>
                <article>
                    <header class="entry-header">
                        <div class="entry-content-thumb">
                            <div class="blog-thumb">
                                <span class="text-vertical"><?php echo $tagName; ?></span>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="Project" />
                            </div>
                        </div>
                    </header>
                    <div class="row entry-content">
                        <div class="col-sm-9 project-details">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                            <?php
                            $fbLink = get_field('facebook_link', 'option');
                            $twitterLink = get_field('twitter_link', 'option');
                            $googlePlus = get_field('google_plus', 'option');
                            $skype = get_field('skype', 'option');
                            ?>
                            <div class="social-info">
                                <h3>Share:</h3>
                                <ul class="list-inline mb-0 social-link-list">
                                    <?php if (!empty($fbLink)) { ?> 
                                        <li class="list-inline-item">
                                            <a href="<?php echo $fbLink; ?>" title="Facebook" target="_blank">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($twitterLink)) { ?> 
                                        <li class="list-inline-item">
                                            <a href="<?php echo $twitterLink; ?>" title="Twitter" target="_blank">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($googlePlus)) { ?> 
                                        <li class="list-inline-item">
                                            <a href="<?php echo $googlePlus; ?>" title="Google Plus" target="_blank">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($skype)) { ?> 
                                        <li class="list-inline-item">
                                            <a href="<?php echo $skype; ?>" title="Skype" target="_blank">
                                                <i class="fa fa-skype" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 project-info-wrap">
                            <?php if (!empty($customField)) { ?>
                                <div class="project-info">
                                    <h2>Custom Field</h2>
                                    <p><?php echo substr($customField, 0, 25); ?></p>
                                </div>
                            <?php } ?>
                            <div class="project-info">
                                <h2>Date</h2>
                                <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                            </div>
                            <?php if (!empty($categories)) { ?>
                                <div class="project-info">
                                    <h2>Category</h2>
                                    <p><?php
                                        $catName = "";
                                        foreach ($categories as $cats) {
                                            $catName .= $cats->name . ", ";
                                        }
                                        echo $catName;
                                        ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>

            <?php if (!empty($add_slider)) {
                  $active = "active";
                ?>
                <section class="slider">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach($add_slider as $getSlides){ ?>
                            <div class="carousel-item <?php echo $active; ?>">
                                <img class="d-block" src="<?php echo $getSlides['add_slide_image']; ?>" alt="First slide">
                            </div>
                            <?php $active = ""; } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <img class="d-block" src="<?php echo get_template_directory_uri(); ?>/images/left.png" alt="Second slide">
                            <span>Prev</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <img class="d-block" src="<?php echo get_template_directory_uri(); ?>/images/right.png" alt="Second slide">
                            <span>Next</span>
                        </a>
                    </div>
                </section>  
            <?php } ?>
            <?php 
             $args = array(
                 'post_type' => 'post',
                 'post_status' => 'publish',
                 'posts_per_page' => 3,
                 'post__not_in' => array($getPostID),
             );
             $getRelatedPosts = get_posts($args);
             if($getRelatedPosts){
            ?>
            <section class="related-posts">
                <div class="section-title">
                    <h2>Related Posts</h2>
                </div>
                <div class="row">
                    <?php foreach($getRelatedPosts as $relatedPosts){ 
                          setup_postdata( $relatedPosts );
                          $postID = $relatedPosts->ID;
                        ?>
                    <div class="col-sm-4">
                        <a href="<?php echo get_the_permalink($postID); ?>" title="Related Posts" target="_self">  
                            <img src="<?php echo get_the_post_thumbnail_url($postID); ?>"  class="img-fluid" alt="Related Posts" />
                        </a>
                    </div>
                   <?php } ?>
                </div>
            </section>
             <?php } ?>
            
        </div>
    </div>
</main>    
<?php get_footer(); ?>