<?php

// Chamar a tag Title e adicionar os formatos de posts
function theme_support() {

    // Chamar a tag Title
    add_theme_support('title-tag');

    // Adicionar os formatos de posts
    add_theme_support('post-formats', array('aside', 'image'));

    // Adicionar o logotipo
    add_theme_support( 'custom-logo' );
}
add_action('after_setup_theme', 'theme_support');

// Previnir o erro na tag Title em versões antigas
if (!function_exists('_wp_render_title_tag')) {
    function render_title() {
        ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php
    }
    add_action('wp_head', 'render_title');
}

// Registra o Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Registrar os menus
register_nav_menus( array(
    'menu-tema-divulgacao-servico' => __('Meu menu de divulgação de serviços', 'AllysonSantana')
));

// Definir as miniaturas dos posts
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1280, 720, true );

// Definir o tamanho o resumo
add_filter( 'excerpt_length', function($length) {
    return 60;
} );

// Ativar o fomrulário para respostas nos comentários
function theme_queue_js() {
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) wp_enqueue_script('comment-reply');
}
add_action('wp_print_scripts', 'theme_queue_js');

// Personalizar os comentários
function format_comment($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment; ?>

    <div <?php comment_class('ml-4'); ?> id="comment-<?php comment_ID(); ?>">

        <div class="card mb-3">
            <div class="card-body">

            <div class="comment-intro">

                <h5 class="card-title"><?php printf(__('%s'), get_comment_author_link()) ?></h5>
                <h6 class="card-subtitle mb-3 text-muted">Comentou em <?php printf(__('%1$s'), get_comment_date('d/m/y'), get_comment_time()) ?></h6>
            
            </div>

            <?php comment_text(); ?>

            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>

            </div>
        </div>

    <?php

}


// Incluir as funções de personalização
require get_template_directory(). '/inc/customizer.php';

?>