<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omnia
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="theme-color" content="#000000">
        <meta property="og:url" content="<?php echo get_site_url(); ?>" >
        <!-- Favicon -->
        <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_site_icon_url(); ?>" />
        <link rel="apple-touch-icon" href="<?php echo get_site_icon_url(); ?>">    
        <?php
        wp_head();
        include_once 'theme-style.php';
        ?>
        
    </head>

    <body <?php body_class(); ?>>
<?php wp_body_open(); ?>

        <div class="container-fluid header-wrap">
            <div class="container">
                <header class="site-header">
                    <section class="header-top">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="index.html" title="Logo" target="_self">  
                                    <img src="<?php the_field('add_logo', 'option') ?>" width="49" height="32" class="img-fluid" alt="Logo" />
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <nav id="primary-menu">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                    <div class="bars"></div><div class="bars bar-two"></div><div class="bars bar-three"></div>
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                                                <div class="card-body">
                                                    <?php
                                                    wp_nav_menu(array(
                                                        'theme_location' => 'menu-1',
                                                        'menu_class' => 'main-menu-custom'));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div> 
                    </section>
                </header>
            </div>
        </div> 


