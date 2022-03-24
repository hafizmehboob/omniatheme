<?php
$theme_background_color = get_field('theme_background_color', 'option');
$theme_text_color = get_field('theme_text_color','option');
$theme_titles_color = get_field('theme_titles_color', 'option');
$footer_background_color = get_field('footer_background_color', 'option');
$footer_text_color = get_field('footer_text_color', 'option');
$footer_copy_right_background_color = get_field('footer_copy_right_background_color', 'option');
$footer_copy_right_text_color = get_field('footer_copy_right_text_color', 'option');
?>
<style>
    body{
        background-color: <?php echo $theme_background_color; ?>;
        color: <?php echo $theme_text_color; ?>;
    }
    .project-details p,footer.entry-footer a{
        color: <?php echo $theme_text_color; ?>;
    }
    .social-info h3,
    .project-info h2,
    .section-title h2,
    .slider-content h1{
        color: <?php echo $theme_titles_color; ?>;
    }
    footer .container-fluid{
        background: <?php echo $footer_background_color; ?>;
    }
    footer .section-title h2,
    .about-us p,:is(footer) :is(a, i),
    .recent-news h3,
    .recent-news time{
        color: <?php echo $footer_text_color; ?>;
    }
	 .project-details p,footer.entry-footer a{
        color: <?php echo $theme_text_color; ?>;
    }
    .copright p a{
        color: <?php echo $footer_copy_right_text_color; ?>;
    }
</style>