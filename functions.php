<?php

/**
 * アイキャッチ表示
 */
add_theme_support( 'post-thumbnails' );


/**
 * ブロックエディタにCSS適応
 */
function my_editor_suport() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}
add_action( 'after_setup_theme', 'my_editor_suport' );

/**
 * メニュー
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'header - menu' => 'ヘッターメニュー',
			'pickup'        => 'ピックアップ',
			'footer - menu' => 'フッターメニュー',
		)
	);
}
add_action( 'after_setup_theme', 'register_my_menus' );

/**
 * アーカイブページのタイトルをカスタマイズ
 */
function custom_archive_title( $title ) {
	if ( is_category() || is_tag() ) { // 『カテゴリー：』 と『タグ：』 を削除
		$title = single_term_title( '', false );
	} elseif ( is_date() ) {
		if ( is_day() ) { // 『年：』 と『月：』 と『日：』 を削除
			$title = get_the_date( 'Y年n月j日' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'Y年n月' );
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y年' );
		}
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'custom_archive_title' );

/**
 * 検索結果に投稿以外を表示しないようにカスタマイズ
 */
function search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', 'post' );
	}
	return $query;
}
add_filter( 'pre_get_posts', 'search_filter' );

// カテゴリラベルを表示する関数
function display_category_label( $post_id = null ) {
    if ( is_null( $post_id ) ) {
        $post_id = get_the_ID();
    }

    $categories = get_the_category( $post_id );
    if ( $categories ) {
        $category_color = get_field( 'background_color', 'category_' . $categories[0]->term_id );
        $category_name  = $categories[0]->name;
        echo '<span class="c-label" style="' . esc_attr( 'background-color:' . $category_color ) . ';">' . esc_html( $category_name ) . '</span>';
    }
}

/**
 * セキュリティ対策
 * 参考記事：https://baigie.me/officialblog/2020/01/28/wordpress-security/
 */
remove_action( 'wp_head', 'wp_generator' ); // WordPressのバージョン
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // 短縮URLのlink
remove_action( 'wp_head', 'wlwmanifest_link' ); // ブログエディターのマニフェストファイル
remove_action( 'wp_head', 'rsd_link' ); // 外部から編集するためのAPI
remove_action( 'wp_head', 'feed_links_extra', 3 ); // フィードへのリンク
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // 絵文字に関するJavaScript
remove_action( 'wp_head', 'rel_canonical' ); // カノニカル
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); // 絵文字に関するJavaScript
remove_action( 'admin_print_styles', 'print_emoji_styles' ); // 絵文字に関するCSS
