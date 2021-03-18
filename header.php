<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="sticky-top">
        <div class="container">
            <div class="site-info">
                <span class="title"><?php echo get_bloginfo('name') ?></span>
                <span class="tagline"><?php echo get_bloginfo('description') ?></span>
            </div>


            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'navigation'
                )
            );
            ?>
        </div>


    </header>