<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omnia
 */
/** Footer First Column * */
$titleFirstCol = get_field('add_title_first_col', 'option');
$descFirstCol = get_field('add_description_first_col', 'option');
$addressFirstCol = get_field('address_first_col', 'option');
$phoneFirstCol = get_field('phone_first_col', 'option');
$teleFirstCol = get_field('telephone_first_col', 'option');
$emailFirstCol = get_field('email_address_first_col', 'option');
/** Footer Second Column * */
$titleSecondCol = get_field('add_title_second_col', 'option');
/** Footer Third Column * */
$titleThirdCol = get_field('add_title_third_col', 'option');
$gallery = get_field('add_gallery', 'option');
/** Footer CopyRight * */
$copyRight = get_field('footer_copy_right_text', 'option');
$copyRightLink = get_field('footer_copy_right_link', 'option');
?>

<footer>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 about-us">
                    <?php if (!empty($titleFirstCol)) { ?>
                        <div class="section-title">
                            <h2><?php echo $titleFirstCol; ?></h2>
                        </div>
                    <?php } ?>
                    <?php if (!empty($descFirstCol)) { ?>
                        <p><?php echo $descFirstCol; ?></p>
                    <?php } ?>
                    <?php if (!empty($addressFirstCol)) { ?>
                        <div class="contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div><p><?php echo $addressFirstCol; ?></p></div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($phoneFirstCol) || !empty($teleFirstCol)) { ?>
                        <div class="contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div><p>
                                    <?php if (!empty($phoneFirstCol)) { ?>
                                        <a href="tel:<?php echo $phoneFirstCol; ?>" title="<?php echo $phoneFirstCol; ?>"><?php echo $phoneFirstCol; ?></a>
                                    <?php } if (!empty($teleFirstCol)) { ?>
                                        or<a href="tel:<?php echo $teleFirstCol; ?>" title="<?php echo $teleFirstCol; ?>"><?php echo $teleFirstCol; ?></a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (!empty($emailFirstCol)) { ?>
                        <div class="contact-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <div><p><a href="mailto:<?php echo $emailFirstCol; ?>" title="mailto:<?php echo $emailFirstCol; ?>"><?php echo $emailFirstCol; ?></a></p></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4 recent-news-column">
                    <?php if (!empty($titleSecondCol)) { ?>
                        <div class="section-title">
                            <h2><?php echo $titleSecondCol; ?></h2>
                        </div>
                    <?php } ?>
                    <?php
                    $newsArgs = array(
                        'post_type' => 'news',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                    );
                    $getRecentNews = get_posts($newsArgs);
                    if ($getRecentNews) {
                        foreach ($getRecentNews as $recentNews) {
                            setup_postdata($recentNews);
                            $newsId = $recentNews->ID;
                            ?>
                            <div class="recent-news">
                                <a href="<?php echo get_the_permalink($newsId); ?>" title="<?php echo get_the_title($newsId); ?>" target="_self">  
                                    <img src="<?php echo get_the_post_thumbnail_url($newsId); ?>"  class="img-fluid" alt="<?php the_title(); ?>" />
                                    <div>
                                        <h3><?php echo get_the_title($newsId); ?></h3>
                                        <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-sm-4 our-gallery-section">
                    <?php if (!empty($titleThirdCol)) { ?>
                        <div class="section-title">
                            <h2><?php echo $titleThirdCol; ?></h2>
                        </div>
                    <?php } ?>
                    <?php
                    $galleryArgs = array(
                        'post_type' => 'gallery',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'posts__in' => $gallery
                    );
                    $getGallery = get_posts($galleryArgs);
                    if ($getGallery) {
                        ?>
                        <div class="our-gallery popup-gallery">
                            <?php
                            $counter = 1;
                            foreach ($getGallery as $gallery) {
                                setup_postdata($gallery);
                                 $galleryId = $gallery->ID;
                                if($counter == 1){
                                    echo '<div class="gallery-column-one">';
                                }else if($counter == 2){
                                    echo '<div class="gallery-column-two"><div>';
                                }else if($counter == 3){
                                    echo '<div class="d-flex justify-content-between">';
                                }
                                if(has_post_thumbnail($galleryId)){
                                ?>
                               <a href="<?php echo get_the_post_thumbnail_url($galleryId); ?>" title="Gallery">
                                    <img src="<?php echo get_the_post_thumbnail_url($galleryId); ?>"  class="img-fluid" alt="Project" />
                                </a>
                            <?php 
                                }
                                 if($counter == 1 || $counter == 2 || $counter == 4){
                                    echo '</div>';
                                }
                              $counter++;  } ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($copyRight)) { ?>
        <div class="copright">
            <p><a href="<?php echo $copyRightLink; ?>" title="<?php echo $copyRight; ?>" target="_blank"><?php echo $copyRight; ?></a></p>
        </div>
    <?php } ?>

</footer>

<?php wp_footer(); ?>

</body>
</html>
