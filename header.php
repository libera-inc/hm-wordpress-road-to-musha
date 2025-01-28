<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="format-detection" content="telephone=no" />

	<!-- favicon/webclipicon -->
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/favicon.ico' ); ?>" />
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/webclip.png' ); ?>" />

	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />

	<!-- css -->
	<link href="<?php echo esc_url( get_template_directory_uri() . '/css/style.css' ); ?>" rel="stylesheet">

	<!-- js -->
	<script src="<?php echo esc_url( get_template_directory_uri() . '/js/main.js' ); ?>" defer></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- header -->
	<header class="header">
		<div class="header-head">
			<div class="l-container">
				<div class="header-head-inner">
					<?php $tag = ( is_home() || is_front_page() ) ? 'h1' : 'p'; ?>
					<<?php echo $tag; ?> class="header-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<picture>
								<source media="(max-width: 559px)" srcset="<?php echo esc_url( get_template_directory_uri() . '/img/logo-sp.png' ); ?> 1x,
				<?php echo esc_url( get_template_directory_uri() . '/img/logo-sp@2x.png' ); ?> 2x" />
								<source media="(min-width: 560px)" srcset="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?> 1x,
				<?php echo esc_url( get_template_directory_uri() . '/img/logo@2x.png' ); ?> 2x" />
								<img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo@2x.png' ); ?>"
									width="640" height="84" alt="武者への道 Presented by 模写修行" decoding="async"
									loading="lazy" />
							</picture>

						</a>
					</<?php echo $tag; ?>>

					<div class="header-search">
						<button class="header-search-button js-search-modal-open-button">記事検索</button>
					</div>

					<div class="c-sns">
						<a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-twitter.svg' ); ?>"
								width="400" height="400" alt="twitter" decoding="async" loading="lazy" />
						</a>

						<a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-facebook.svg' ); ?>"
								width="1024" height="1024" alt="facebook" decoding="async" loading="lazy" />
						</a>

					</div>
				</div>
			</div>
		</div>

		<div class="header-nav">
			<div class="l-container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'container'      => 'nav',
					)
				);
				?>
			</div>
		</div>
	</header>
	<!-- end header-->

	<?php get_template_part( 'template/search-form' ); ?>
