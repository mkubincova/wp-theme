<?php 

//CSS
function load_stylesheets(){

    wp_register_style("bootstrap", get_template_directory_uri() . "/css/bootstrap.min.css", array(), false, "all");
    wp_enqueue_style("bootstrap");

    wp_register_style("style", get_template_directory_uri() . "/style.css", array(), false, "all");
    wp_enqueue_style("style");

};
add_action("wp_enqueue_scripts", "load_stylesheets");


//JQuery
function include_jquery(){
    wp_deregister_script("jquery");
    wp_enqueue_script("jquery", get_template_directory_uri() . "/js/jquery-3.6.0.min.js", "", 1, true);
}
add_action("wp_enqueue_scripts", "include_jquery");


//Javascript files
function load_js()
{
    wp_register_script("bootstrap", get_template_directory_uri() . "/js/bootstrap.bundle.min.js", "", 1, true);
    wp_enqueue_script("bootstrap");

    wp_register_script("customjs", get_template_directory_uri() . "/js/scripts.js", "", 1, true);
    wp_enqueue_script("customjs");
};
add_action("wp_enqueue_scripts", "load_js");


//Navigation
add_theme_support("menus");

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_my_menus');

//Posts
add_theme_support("post-thumbnails");

//Custom post types & taxonomies
function project()
{
    $post_args = array(
        "public" => true,
        "label" => "Projects",
        "hierachical" => false,
        "menu_icon" => "dashicons-portfolio",
        "supports" => array("thumbnail", "title", "editor", "author")
    );
    register_post_type("project", $post_args);

    $tax_type_args = array(
        "label" => "Project types",
        "hierarchical" => true,
    );
    register_taxonomy("project_type", "project", $tax_type_args);

    $tax_skill_args = array(
        "label" => "Project skills",
        "hierarchical" => false,
    );
    register_taxonomy("project_skill", "project", $tax_skill_args);
}
add_action("init", "project")

?>