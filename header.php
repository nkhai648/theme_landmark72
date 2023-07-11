<?php 
    $menu_name = 'header-menu'; //menu slug
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    
    $menu = get_menu_items_recursive($menuitems);
    $menu_html = generate_menu_html($menu, true);
    $menu_mobile_html = generate_menu_mobile_html($menu, true);

	//* CUSTOM HEADER 
	$page_id = 410;
	$logo = get_field('logo_header', $page_id);
	$languages = get_field('languages', $page_id);
	$top_menu_items = get_field('top_menu_mobile', $page_id);
    // echo "<pre>";
    // print_r($languages);
    // echo "</pre>";
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="profile" href="http://gmgp.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>"/>
    <?php wp_head() ?>
</head>
<body>
	<!-- wrap -->
	<div id="wrap">
    <div class="skipMenu" title="스킵 메뉴">
			<a href="#gnb">메뉴 바로가기</a>
			<a href="#contents">본문 내용 바로가기</a>
		</div>

		<!-- PC gnb -->
		<div id="headerWrap">
			<h1><a href="#"><img src="<?=$logo['url']?>" alt="강남파이낸스센터 메인 바로가기" /></a></h1>

			<div id="header">
                <!--* Item MENU  -->
                <?=$menu_html?>

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
								<?php foreach ($top_menu_items as $key => $value) : ?>
									<li><a href="#<?=$value?>"><?=$value?></a></li>
								<?php endforeach?>
							</ul>
							
							<?=$menu_mobile_html?>
						</div>
						<!--// left_navi -->

					</div>
				</div>
				<!-- mobile left_navi -->
                
                
			</div>

			<ul id="topLink">
				<?php foreach ($languages as $key => $value) : ?>
					<li><a href="#" class=""><?=$value?></a></li>
				<?php endforeach ?>
				<li><a href="#service/" class="login">로그인</a></li>

			</ul>
		</div>
		<!-- PC gnb -->
        