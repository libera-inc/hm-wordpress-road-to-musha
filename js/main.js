/**
 * ビューポートの設定を切り替え
 * 画面の幅が380px未満の場合：ビューポートを380pxに固定
 * それ以上の場合：デバイスの幅に基づいてビューポートを設定
 */
const switchViewport = () => {
    // ビューポート要素を取得
    const viewportMeta = document.querySelector('meta[name="viewport"]');

    // 条件に基づいて適用するビューポートの設定を決定
    const viewportContent = window.outerWidth > 380 ? "width=device-width, initial-scale=1" : "width=380";

    // ビューポート要素が存在しない場合はreturn
    if (!viewportMeta) return;

    // 現在のビューポートの設定が目的の設定と異なる場合にのみ、新しい設定を適用します。
    if (viewportMeta.getAttribute("content") !== viewportContent) {
        viewportMeta.setAttribute("content", viewportContent);
    }
};
switchViewport();
window.addEventListener("resize", switchViewport);

/**
 * 検索フォーム表示のモーダル
 */
const modal = () => {
    const modal = document.querySelector(".js-search-modal");
    const modalBg = document.querySelector(".js-search-modal-bg");
    const modalContents = document.querySelector(".js-search-contents");
    const button = document.querySelector(".js-search-modal-open-button");
    const closeButton = document.querySelector(".js-search-modal-close-button");

    // コンテンツ Opening Keyframe
    const contentsOpeningKeyframes = {
        opacity: [0, 1],
        transform: ["scale(0.98)", "scale(1)"],
    };

    // 背景 Opening Keyframe
    const bgOpeningKeyframes = {
        opacity: [0, 1],
    };

    // コンテンツ Opening Option
    const contentsOpeningOptions = {
        duration: 200,
        easing: "ease-out",
        fill: "forwards",
    };

    // 背景 Opening Option
    const bgOpeningOptions = {
        duration: 120,
        easing: "ease-out",
        fill: "forwards",
    };

    // コンテンツ Closing Keyframe
    const contentsClosingKeyframes = {
        opacity: [1, 0],
        transform: ["scale(1)", "scale(0.98)"],
    };

    // 背景 Closing Keyframe
    const bgClosingKeyframes = {
        opacity: [1, 0],
    };

    // コンテンツ Closing Option
    const contentsClosingOptions = {
        duration: 200,
        easing: "ease-out",
        fill: "forwards",
    };

    // 背景 Closing Option
    const bgClosingOptions = {
        duration: 120,
        easing: "ease-out",
        fill: "forwards",
    };

    // modalとbuttonがページ内にない場合returnする
    if (!modal || !button) return;

    // モーダルopenする関数
    const openModal = () => {
        modal.showModal();
        modalContents.animate(contentsOpeningKeyframes, contentsOpeningOptions);
        modalBg.style.display = "block";
        modalBg.animate(bgOpeningKeyframes, bgOpeningOptions);
    };

    // モーダルcloseする関数
    const closeModal = () => {
        const closingAnim = modalContents.animate(contentsClosingKeyframes, contentsClosingOptions);
        modalBg.animate(bgClosingKeyframes, bgClosingOptions);

        // アニメーションの完了後
        closingAnim.onfinish = () => {
            modal.close();
            modalBg.style.display = "none";
        };
    };

    // ボタンクリックでモーダルopen
    button.addEventListener("click", () => {
        openModal();
    });

    // クローズボタンクリックでモーダルclose
    closeButton.addEventListener("click", () => {
        closeModal();
    });

    // 背景クリックでモーダルclose
    modal.addEventListener("click", (event) => {
        if (event.target.closest(".js-search-contents") === null) {
            closeModal();
        }
    });

    // Escapeキーを押すと非表示
    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            event.preventDefault();
            closeModal();
        }
    });
};

modal();
