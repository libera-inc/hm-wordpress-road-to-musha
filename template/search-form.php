<div class="c-search-modal-bg js-search-modal-bg"></div>

<dialog class="c-search-modal js-search-modal" aria-label="検索フォームのモーダル">
	<div class="c-search-modal-inner">
		<div class="c-search-modal-contents js-search-contents">
			<button class="c-search-modal-close-button js-search-modal-close-button">
				<span class="u-visually-hidden">閉じる</span>
			</button>

			<p class="c-search-modal-text">キーワードを入力</p>

			<form class="c-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" value="" name="s" autofocus />
				<button class="c-search-form-submit">検索する</button>
			</form>
		</div>
	</div>
</dialog>