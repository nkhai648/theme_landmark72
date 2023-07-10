<?php 
    $menu_name = 'header-menu'; //menu slug
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    
    $menu = get_menu_items_recursive($menuitems);
    $menu_html = generate_menu_html($menu, true);
    // echo "<pre>";
    // print_r($menu);
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
			<h1><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="강남파이낸스센터 메인 바로가기" /></a></h1>

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
        