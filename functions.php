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

        // Thêm menu 
        register_nav_menu('primary-menu', __('Primary Menu', 'landmark'));

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

// Template header function 
if(!function_exists('landmark_header')) {
    function landmark_header() { ?>
        <div class="skipMenu" title="스킵 메뉴">
			<a href="#gnb">메뉴 바로가기</a>
			<a href="#contents">본문 내용 바로가기</a>
		</div>

		<!-- PC gnb -->
		<div id="headerWrap">
			<h1><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="강남파이낸스센터 메인 바로가기" /></a></h1>

			<div id="header">

				<ul id="gnb">
					<li class="m1"><a href="#intro2023" class="">Introduce</a>
						<ul>
							<li><a href="#intro2023" class="">About</a></li>
							<li><a href="#history2023" class="">Vision</a></li>
							<li><a href="#gallery2023" class="">Location</a></li>
						</ul>
					</li>

					<li class="m2"><a href="#mall-main2023" class="">Floor Information</a>
					</li>

					<li class="m3"><a href="#community/bbs2023" class="">Facilities</a>
						<ul >
							<li><a href="#community/bbs2023" class="">Entertainment & Tours</a></li>
							<li><a href="#enjoy/event2023" class="">Culture & Entertainment</a></li>
							<li><a href="#community/festival2023" class="">Food & Baverage</a></li>
							<li><a href="#community/festival2023" class="">Health & Gym</a></li>
							<li><a href="#community/festival2023" class="">Education</a></li>
							<li><a href="#community/festival2023" class="">Beauty & Shopping</a></li>
							<li><a href="#community/festival2023" class="">Banking</a></li>
							<li><a href="#community/festival2023" class="">Living Area</a></li>
							<li><a href="#community/festival2023" class="">Office Area</a></li>
							<li><a href="#community/festival2023" class="">Parking Area</a></li>
						</ul>
					</li>

					<li class="m4"><a href="#service/" target="_blank">Event</a>
					</li>

					<li class="m5"><a href="#tenant/comlist2023" class="">Office</a>
						<ul>
							<li><a href="#tenant/information2023" class="">Tenants</a></li>
							<li><a href="#tenant/comlist2023" class="">Office Review</a></li>
							<li><a href="#tenant/comlist2023" class="">Leasing Information</a></li>
						</ul>
					</li>
					<li class="m6"><a href="#tenant/comlist2023" class="">Retail Mall</a>	
					</li>
					
					<li class="m7"><a href="#tenant/comlist2023" class="">Tenant Conner</a>	
					</li>

				</ul>

				<!-- mobile menu icon -->
				<div class="hd_categoty">
					<a href="javascript:;" onclick="toggleMenuWrap('open');" class="small_menu_open"><img
							src="<?php echo get_template_directory_uri(); ?>/img/btn_small_menu.png" alt="MENU" /></a>
					<a href="javascript:;" onclick="toggleMenuWrap('close');" class="small_menu_close"><img
							src="<?php echo get_template_directory_uri(); ?>/img/btn_close2.png" alt="close" /></a>
				</div>
				<!--// mobile menu icon -->

				<!-- mobile left_navi -->
				<div class="menu_wrap">
					<div class="menu_inner">
						<!--// menu_wrap -->

						<!-- left_navi -->
						<div class="left_menu">

							<ul class="m_topmenu clearfx">
								<li><a href="#mall-main2023">MALL</a></li>
								<li><a href="#location2023">LOCATION</a></li>
								<li class="last"><a href="#eng/index.asp">ENGLISH</a></li>
							</ul>

							<ul class="lnb">
								<li class="lnb_menu01">
									<a href="">Introduce</a>
									<ul class="lnb_sub">
										<li><a href="#intro2023">About</a></li>
										<li><a href="#history2023">Vision</a></li>
										<li><a href="#gallery2023">Location</a></li>
									</ul>
								</li>
								
								<li class="lnb_menu02">	                                    
									<a>Floor Information</a>
								</li>	

								<li class="lnb_menu03">
									<a href="">Facilities</a>
									<ul class="lnb_sub">
										<li><a href="#mall-main2023">Entertainment & Tours</a></li>
										<li><a href="#enjoy/mallevent2023">Culture & Entertainment</a></li>
										<li><a href="#mall/recom2023">Food & Baverage</a></li>
										<li><a href="#mall/recom2023">Health & Gym</a></li>
										<li><a href="#mall/recom2023">Education</a></li>
										<li><a href="#mall/recom2023">Beauty & Shopping</a></li>
										<li><a href="#mall/recom2023">Banking</a></li>
										<li><a href="#mall/recom2023">Living Area</a></li>
										<li><a href="#mall/recom2023">Office Area</a></li>
										<li><a href="#mall/recom2023">Parking Area</a></li>
									</ul>
								</li>
								<li class="lnb_menu04">
									<a href="">Event</a>
									<ul class="lnb_sub">
										<li><a href="#community/bbs2023">Event</a></li>
										<li><a href="#enjoy/event2023">News</a></li>
									</ul>
								</li>
								<li class="lnb_menu05">
									<a href="service/">Office</a>
									<ul class="lnb_sub">
										<li><a href="#community/bbs2023">Tenants</a></li>
										<li><a href="#enjoy/event2023">Office Review</a></li>
										<li><a href="#enjoy/event2023">Leasing Information</a></li>
									</ul>
								</li>
								<li class="lnb_menu06">
									<a href="#tenant/comlist2023">Retail Mall</a>
								</li>
								<li class="lnb_menu07">
									<a href="#tenant/comlist2023">Tenant Conner</a>
									<ul class="lnb_sub">
										<li><a href="#tenant/information2023">Notice board</a></li>
										<li><a href="#tenant/comlist2023">Inbox</a></li>
										<li><a href="#tenant/comlist2023">Contact</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!--// left_navi -->

					</div>
				</div>
				<!-- mobile left_navi -->

			</div>

			<ul id="topLink">
				<li><a href="#" class="">KOR</a></li>
				<li><a href="#eng/" class="">ENG</a></li>
				<li><a href="#eng/" class="">VIE</a></li>

				<li><a href="#service/" class="login">로그인</a></li>

			</ul>
		</div>
		<!-- PC gnb -->
        <?php
    }
}


// Thiet lap menu 
if(!function_exists('landmark_menu')) {
    function landmark_menu($menu) {
        $menu = array(
            'theme_location' => $menu,
            'container' => 'nav',
            'container_class' => $menu,
            'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
        );
        wp_nav_menu($menu);
    }
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