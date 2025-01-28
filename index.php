<?php get_header(); ?>

<main>
	<?php
	if ( is_home() || is_front_page() ) :
		?>
	<!-- top-kv -->
	<?php
		$pickup         = wp_get_nav_menu_items( 'pickup' );
		$pickup_post_id = isset( $pickup[0]->object_id ) ? $pickup[0]->object_id : null;

		if ( $pickup_post_id ) :
			$item          = $pickup[0];
			$pickup_post   = get_page( $pickup_post_id );
			$post_category = get_the_category( $pickup_post_id );
			$thumbnail_id  = get_post_thumbnail_id( $pickup_post_id );
			?>
	<div class="top-kv">
		<div class="top-kv">
			<div class="l-container">
				<div class="top-kv-inner">
					<article class="top-kv-recommend">
						<a href="<?php echo esc_attr( $item->url ); ?>" class="top-kv-recommend-link">

							<div class="top-kv-recommend-thumbnail">
								<?php the_post_thumbnail( $thumbnail_id ); ?>
							</div>

							<div class="top-kv-recommend-body">
								<?php display_category_label( $pickup_post_id ); ?>

								<h2 class="top-kv-recommend-title">
									<?php echo esc_html( $pickup_post->post_title ); ?>
								</h2>

								<div class="top-kv-recommend-date">
									<time datetime="<?php the_time( 'Y-m-d' ); ?>" class="c-date">
										<?php echo mysql2date( 'Y-m-d', $pickup_post->post_date ); ?>
									</time>
								</div>
							</div>
						</a>
					</article>

					<div class="top-kv-character">
						<img srcset="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-character.png' ); ?> 1x, <?php echo esc_url( get_template_directory_uri() . '/img/img-kv-character@2x.png' ); ?> 2x, <?php echo esc_url( get_template_directory_uri() . '/img/img-kv-character@3x.png' ); ?> 3x"
							src="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-character@2x.png' ); ?>"
							width="400" height="569" alt="おすすめの記事" />
					</div>
				</div>
			</div>

			<div class="top-kv-treat">
				<img srcset="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-treat.png' ); ?> 1x, <?php echo esc_url( get_template_directory_uri() . '/img/img-kv-treat@2x.png' ); ?> 2x"
					src="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-treat@2x.png' ); ?>"
					width="500" height="172" alt="" />
			</div>
		</div>
	</div>

	<?php endif; ?>

	<!-- end top-kv -->
	<?php else : ?>
	<!-- page-kv -->
	<div class="c-page-kv">
		<div class="l-container">
			<?php
			if ( is_search() ) :
				?>
			<h1 class="c-title-level1">
				<?php if ( get_search_query() ) : ?>
				『<?php echo get_search_query(); ?>』の
				<?php endif; ?>検索結果
			</h1>
			<?php else : ?>
			<h1 class="c-title-level1">『<?php the_archive_title(); ?>』の記事一覧</h1>
			<?php endif; ?>
		</div>
	</div>
	<!-- end page-kv -->
	<?php endif; ?>

	<div class="u-ptb">
		<div class="l-container">
			<?php if ( have_posts() ) : ?>
			<!-- posts -->
			<div class="c-posts c-posts--col3">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
				<article class="c-post">
					<div class="c-meta">
						<?php display_category_label(); ?>
						<time datetime="<?php the_time( 'Y-m-d' ); ?>"
							class="c-date"><?php the_time( get_option( 'date_format' ) ); ?></time>
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
			<!-- end posts -->

			<!-- pagination -->
			<?php
				the_posts_pagination(
					array(
						'mid_size'           => 1,
						'prev_text'          => '',
						'next_text'          => '',
						'screen_reader_text' => '…',
					)
				);
			?>
			<!-- end pagination -->
		</div>
	</div>
	<?php else : ?>
	<p>『<?php echo get_search_query(); ?>』の検索結果が見つかりませんでした。</p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>