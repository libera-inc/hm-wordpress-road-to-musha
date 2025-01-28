<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

<main class="u-ptb">
	<div class="l-container-s">
		<!-- single-article -->
		<article class="single-article">
			<div class="c-meta">
				<?php display_category_label(); ?>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>"
					class="c-date"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</div>

			<div class="single-title">
				<h1 class="c-title-level1"><?php the_title(); ?></h1>
			</div>

			<div class="single-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>

			<div class="single-contents">
				<?php the_content(); ?>
			</div>

			<a href="https://www.google.com/" target="_blank" class="single-banner" rel="noopener noreferrer">
				<picture>
					<source media="(max-width: 767px)" srcset="<?php echo esc_url( get_template_directory_uri() . '/img/banner-sp.png' ); ?> 1x, 
				<?php echo esc_url( get_template_directory_uri() . '/img/banner-sp@2x.png' ); ?> 2x" />
					<source media="(min-width: 768px)" srcset="<?php echo esc_url( get_template_directory_uri() . '/img/banner.png' ); ?> 1x, 
				<?php echo esc_url( get_template_directory_uri() . '/img/banner@2x.png' ); ?> 2x" />
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/banner@2x.png' ); ?>"
						width="1520" height="338" alt="模写修行 駆け出しエンジニアのためのコーディング練習教材 詳しくはこちら" />
				</picture>
			</a>
		</article>
		<!-- end single-article -->
		<?php endwhile; ?>

		<!-- single-recommend -->
		<?php
		$categories   = get_the_category( $post->ID );
		$category_ids = array();
		foreach ( $categories as $category ) :
			array_push( $category_ids, $category->cat_ID );
		endforeach;

		$args = array(
			'post_type'     => 'post',
			'post_per_page' => 6,
			'category__in'  => $category_ids,
			'post__not_in'  => array( $post->ID ),
			'orderby'       => 'rand',
		);

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
			?>

		<aside class="single-recommend">
			<h2 class="single-recommend-title">おすすめ記事</h2>

			<div class="single-recommend-posts">
				<div class="c-posts c-posts--col2">

					<?php
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						?>

					<article class="c-post">
						<div class="c-meta">
							<?php display_category_label(); ?>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>" class="c-date">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</time>
						</div>

						<a href="<?php the_permalink(); ?>" class="c-post-thumbnail">
							<?php the_post_thumbnail(); ?>
						</a>

						<h2 class="c-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
					</article>
					<?php endwhile; ?>
				</div>
			</div>
		</aside>
			<?php
		endif;
				wp_reset_postdata();
		?>
		<!-- end single-recommend -->
	</div>
</main>

<?php get_footer(); ?>