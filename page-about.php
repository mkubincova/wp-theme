<?php get_header(); ?>

<div class="container pt-5 pb-5">

    <h1><?php the_title(); ?></h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

    <?php endwhile;
    endif; ?>

    <?php
    //display three latest projects
    $args = array(
        "post_type" => "project",
        "posts_per_page" => 3,
        "post_status" => "publish"
    );

    $projects = new WP_Query($args);

    if ($projects->have_posts()) : while ($projects->have_posts()) : $projects->the_post() ?>

            <div class="card mb-3">
                <div class="card-body">
                    <h3><?php the_title(); ?></h3>
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url("small") ?>" class="small-img">
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-warning">Read more</a>
                </div>
            </div>

    <?php endwhile; wp_reset_postdata(); endif; ?>

</div>

<?php get_footer(); ?>