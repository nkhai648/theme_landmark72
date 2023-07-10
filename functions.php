<?php 
// Khai báo đường dẫn thư mục theme
define('THEME_URL', get_stylesheet_directory());

// Lấy đường dẫn thư mục core 
define('CORE', THEME_URL . '/core');

// Nhúng file init 
require_once(CORE . '/init.php');

// Thiết lập chiều rộng nội dung 
if(!isset($content_width)) {
    $content_width = 620;
}

// Khai báo chức năng của theme 
if(!function_exists('landmark_theme_setup')) {
    function landmark_theme_setup() {
        
        // Thiết lập textdomain
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('landmark', $language_folder);
        
        // Tự động thêm link RSS lên <head></head>
        add_theme_support('automatic-feed-links');

        // Them post thumbnail
        add_theme_support('post-thumbnails');

        // Post Format 
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link'
        ));

        // Thêm title page 
        add_theme_support('title-tag');

        // Thêm thay đổi background 
        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support('custom-background', $default_background);

        // Thêm sidebar 
        $sidebar = array(
            'name' => __('Main Sidebar', 'landmark'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widget-title"></h3>',
            'after_title' => '</h3',
        );
        register_sidebar($sidebar);
    }
    add_action('init', 'landmark_theme_setup');
}



// Thiet lap menu 
function register_my_menu() {
    register_nav_menu('header-menu',__( 'Menu chính' ));
    register_nav_menu('footer-menu',__( 'Menu Footer' ));
}
add_action( 'init', 'register_my_menu' );


// Đệ quy get ra sub-menu item của menu 
function get_menu_items_recursive($menu_items, $parent_id = 0) {
    $menu = array();
    
    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == $parent_id) {
            $menu_item = (array) $item;
            $menu_item['children'] = get_menu_items_recursive($menu_items, $item->ID);
            $menu[] = $menu_item;
        }
    }
    
    return $menu;
}

function generate_menu_html($menu_items, $el_ul) {
    if($el_ul == true) {
        $html = '<ul id="gnb">';
    }else {
        $html = '<ul>';
    }
    
    foreach ($menu_items as $key => $item) {
        $html .= '<li class="'.($key+1).'">';
        $html .= '<a href="' . $item['url'] . '">' . $item['title'] . '</a>';
        
        if (!empty($item['children'])) {
            $html .= generate_menu_html($item['children'], false);
        }
        
        $html .= '</li>';
    }
    
    $html .= '</ul>';
    
    return $html;
}


// Tao phan trang 
if(!function_exists('landmark_pagination')) {
    function landmark_pagination() {
        if($GLOBALS['wp_query']->max_num_pages < 2) {
            return '';
        } ?>
        <nav class="pagination" role="navigation">
            <?php if(get_next_posts_link()): ?>
                <div class="prev"><?php next_posts_link( __('Older Posts', 'landmark')) ?></div>
            <?php endif; ?>
            <?php if(get_previous_posts_link()): ?>
                <div class="next"><?php previous_posts_link( __('New Posts', 'landmark')) ?></div>
            <?php endif; ?>
        </nav>
    <?php } 
}

// Hien thi thumbnail 
if(!function_exists('landmark_thumbnail')) {
    function landmark_thumbnail($size) {
        if(!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
            <figure class="post-thumbnail">
                <?php the_post_thumbnail($size) ?>
            </figure>
        <?php endif ?>
    <?php }
}

// Hien thi tieu de bai viet => landmark_entry_header
if(!function_exists('landmark_entry_header')) {
    function landmark_entry_header() { ?>
        <?php if(is_single()) : ?>
            <h1><a href="<?php the_permalink() ?>"> <?php the_title()?></a></h1>
        <?php else: ?>
            <h2><a href="<?php the_permalink() ?>"> <?php the_title()?></a></h2>
        <?php endif ?>
    <?php  }
}

// Hien thi du lieu bai viet => landmark_entry_meta
if(!function_exists('landmark_entry_meta')) {
    function landmark_entry_meta() { ?>
        <?php if(!is_page()) : ?>
            <div class="entry-meta">
                <?php 
                    printf( __('<span class="author">Posted by %1$s </span>', 'landmark'), get_the_author());
                    printf( __('<span class="date-published">About %1$s </span>', 'landmark'), get_the_date());
                    printf( __('<span class="category"> %1$s </span>', 'landmark'), get_the_category_list(', '));
                    
                    if(comments_open()) :
                        echo '<span class="meta-reply">';
                        comments_popup_link(
                            __('Leave a comment', 'landmark'),
                            __('One comment', 'landmark'),
                            __('% comments', 'landmark'),
                            __('Read all comments', 'landmark'),
                        );
                        echo '</span>';
                    endif;
                ?>
            </div>
        <?php endif; ?>
    <?php }
}

// Hien thi noi dung bai viet => landmark_entry_content 
if(!function_exists('landmark_entry_content')) {
    function landmark_entry_content() {
       if(!is_single() && !is_page()) {
            the_excerpt();
       }else {
            the_content();

            // phan trang trong single
            $link_pages = array(
                'before'           => __('<p>Page: ', 'landmark'),
                'after'            => '</p>',
                'nextpagelink'     => __( 'Next page', 'landmark' ),
                'previouspagelink' => __( 'Previous page', 'landmark' )
            );
            wp_link_pages($link_pages);
       }
    }
}

function landmark_readmore() {
    return '<a class="read-more" href="'.get_permalink(get_the_ID()).'">'.__('...[Read more]', 'landmark').'</a>';
}
add_filter('excerpt_more', 'landmark_readmore');

// Hien thi tag trong single post 
if(!function_exists('landmark_entry_tag')) {
    function landmark_entry_tag() {
        if(has_tag()) {
            echo '<span class="entry-tag">';
            printf(__('Tagged in %1$s', 'landmark'), get_the_tag_list('', ','));
            echo '</span>';
        }
    }
}

// Chèn style css 
function landmark_style() {
    wp_register_style('main-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('main-style');

    wp_register_script('jquery-script', get_template_directory_uri() . '/js2018/jquery-1.11.2.min.js', array('jquery'));
    wp_enqueue_script('jquery-script');
    
    wp_register_script('modernizr-script', get_template_directory_uri() . '/js2018/jquery.modernizr.js', array('jquery'));
    wp_enqueue_script('modernizr-script');
    
    wp_register_script('common-script', get_template_directory_uri() . '/js2018/common.js', array('jquery'));
    wp_enqueue_script('common-script');
   
    wp_register_script('easing-script', get_template_directory_uri() . '/js2018/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script('easing-script');
    
    wp_register_script('bxslider-script', get_template_directory_uri() . '/js2018/jquery.bxslider.min.js', array('jquery'));
    wp_enqueue_script('bxslider-script');

    wp_register_style('font-style', get_template_directory_uri() . '/font/nanumsquare.css');
    wp_enqueue_style('font-style');
}
add_action('wp_enqueue_scripts', 'landmark_style');