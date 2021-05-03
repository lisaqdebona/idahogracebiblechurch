<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<?php if( $favicon = get_field("favicon","option") ) { ?>
		<link rel="icon" href="<?php echo $favicon['url'] ?>" sizes="32x32" />
		<link rel="icon" href="<?php echo $favicon['url'] ?>" sizes="192x192" />
		<link rel="apple-touch-icon" href="<?php echo $favicon['url'] ?>" />
		<meta name="msapplication-TileImage" content="<?php echo $favicon['url'] ?>" />
		<?php } ?>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php //wp_body_open(); ?>
		<?php
		$site_logo = get_field("site_logo","option");
		$navigation = get_field("primary_menu","option");
		$link = get_permalink();
		?>
		<!-- <div id="memberNotice">
			<p>Announcement verbiage goes here...</p>
		</div> -->
		<div id="searchForm" class="searchFormWrap"><?php get_template_part("searchform"); ?><a id="closeSrchForm" title="Close"></a></div>
		<div class="site">
			<header id="site-header" class="site-header" role="site-header">
				<div class="site-inner">

					<a href="#" id="mobileMenu"><span class="sr">Menu</span><span class="bar"></span></a>

					<div class="site-logo">
					<?php if ($site_logo) { ?>
						<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?>" class="site-logo-img">
							<img src="<?php echo $site_logo['url']; ?>" alt="<?php bloginfo('name') ?>" />
						</a>
					<?php } else { ?>
						<h1 class="site-name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name') ?></a></h1>
					<?php } ?>
					</div>


					<?php if ($navigation) { ?>
					<div class="menu-backdrop"><span class="closeMenu"></span></div>
					<div class="main-navigation">
						<ul id="primary-menu" class="menu">
							<?php foreach ($navigation as $n) { 
								$parent = $n['parent_menu_name'];
								$parent_menu_name = $parent['title'];
								$parent_menu_link = $parent['url'];
								$menu_icon = $n['menu_icon'];
								$link_str = ($parent_menu_link) ? preg_replace('/\s+/', '', $parent_menu_link) : '';
								$is_current = ($parent_menu_link==$link) ? ' current_page_item':'';
								$post_id = url_to_postid($parent_menu_link);
								$menu_class = ($post_id) ? 'menu-item page-item-' . $post_id : 'menu-item';
								if($link_str=='#') {
									$menu_class .= ' hashed-link';
								}
								$has_submenu = ($n['has_children_menu']=='yes') ? true:false;
								$children_menu = $n['children_menu'];
								if( $has_submenu && $children_menu ) {
									$menu_class .= ' menu-item-has-children';
								}
								if($menu_icon) {
									$parent_menu_name = '<i class="fa '.$menu_icon.'" aria-label="'.$parent_menu_name.'" aria-hidden="true"></i>';
								}
								?>
								<li class="parentMenu <?php echo $menu_class.$is_current; ?>">
									<a href="<?php echo $parent_menu_link; ?>"><?php echo $parent_menu_name; ?></a>
									<?php if ($has_submenu && $children_menu) { ?>
										<div class="submenu-wrap">
											<div class="inner"></div>
										</div>
										<div class="subnav">
											<ul class="submenu">
												<?php foreach ($children_menu as $s) { 
													$currentURL = get_permalink();
													$currentBaseName = basename($currentURL);
													$submenu = $s['submenu'];
													$sm_target = ( isset($submenu['target']) && $submenu['target'] ) ? $submenu['target'] : '_self';
													$subMenuLink = ($submenu['url']) ? $submenu['url'] : '#';
													$subBaseName = basename($subMenuLink);
													$is_sub_active = ($currentBaseName==$subBaseName) ? ' active':'';
													?>
													<li class="menu-item<?php echo $is_sub_active; ?>">
														<a href="<?php echo $submenu['url']; ?>" target="<?php echo $sm_target; ?>"><?php echo $submenu['title']; ?></a>
													</li>
												<?php } ?>
											</ul>
										</div>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					</div>	
					<?php } ?>

				</div>
			</header><!-- #site-header -->

