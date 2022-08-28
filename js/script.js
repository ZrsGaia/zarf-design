//wow.js
new WOW().init();

// ドロワーメニュー
jQuery(".drawer-icon").on("click", function (e) {
  // デフォルトイベント無効化
  e.preventDefault();

  jQuery(".drawer-icon").toggleClass("is-active");
  jQuery(".drawer-icon-background").toggleClass("is-active");
  jQuery(".drawer-content").toggleClass("is-active");
  jQuery(".drawer-background").toggleClass("is-active");

  return false;
});

// ページ内リンクスムーススクロール
// #から始まるURL(ID)がクリックされた時
jQuery('a[href^="#"]').on("click", function () {
  // ヘッダーの高さを取得
  let header = jQuery(".header").innerHeight();

  // ヘッダー(斜めのパーツ)の高さを取得
  header = header + jQuery(".header__skew").innerHeight();

  // スクロールの速度を決定
  let speed = 300;

  // 対象のIDを取得
  let id = jQuery(this).attr("href");

  // ポジションはページトップボタンの0を初期値とする
  let position = 0;

  // リンクのIDがページトップボタンではなかった時
  if (id != "#") {
    // トップからの距離からヘッダー分の高さを引いて、ポジションを確定
    // ヘッダーとコンテンツが被るのを防ぐ
    position = jQuery(id).offset().top - header;

    //ドロワーメニューを閉じる
    jQuery(".drawer-icon").removeClass("is-active");
    jQuery(".drawer-icon-background").removeClass("is-active");
    jQuery(".drawer-content").removeClass("is-active");
    jQuery(".drawer-background").removeClass("is-active");
  }

  // 確定したポジションにスクロールで移動
  jQuery("html, body").animate(
    {
      scrollTop: position,
    },
    speed
  );

  return false;
});

// 背景をタップしてもドロワーメニューを閉じれるようにする
jQuery(".drawer-background").on("click", function (e) {
  // デフォルトイベント無効化
  e.preventDefault();

  jQuery(".drawer-icon").toggleClass("is-active");
  jQuery(".drawer-icon-background").toggleClass("is-active");
  jQuery(".drawer-content").toggleClass("is-active");
  jQuery(".drawer-background").toggleClass("is-active");

  return false;
});

// swiper
const swiper = new Swiper(".swiper-container", {
  slidesPerView: "auto",
  loop: true,

  effect: "fade",

  //自動再生
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  speed: 4000,

  //ページネーション
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

//ページトップボタン
jQuery(window).on("scroll", function ($) {
  //ページトップから100pxスクロールしたらページボタンを出現するようにする
  if (jQuery(this).scrollTop() > 100) {
    jQuery(".to-top").addClass("is-show");
  } else {
    jQuery(".to-top").removeClass("is-show");
  }
});

jQuery(".to-top").click(function (e) {
  // デフォルトイベント無効化
  e.preventDefault();

  // スクロールの速度を決定
  let speed = 300;

  //ページトップボタンをクリックするとでページトップへ
  jQuery("body,html").animate(
    {
      scrollTop: 0,
    },
    speed
  );

  return false;
});

//カラーパレット
jQuery(".color-red-change").on("click", function (e) {
  var Color = getComputedStyle(document.documentElement).getPropertyValue(
    "--color-main-red"
  );

  document.documentElement.style.setProperty("--color-main", Color);
});

jQuery(".color-green-change").on("click", function (e) {
  var Color = getComputedStyle(document.documentElement).getPropertyValue(
    "--color-main-green"
  );

  document.documentElement.style.setProperty("--color-main", Color);
});

jQuery(".color-yellow-change").on("click", function (e) {
  var Color = getComputedStyle(document.documentElement).getPropertyValue(
    "--color-main-yellow"
  );

  document.documentElement.style.setProperty("--color-main", Color);
});

jQuery(".color-main-default-change").on("click", function (e) {
  var Color = getComputedStyle(document.documentElement).getPropertyValue(
    "--color-main-default"
  );

  document.documentElement.style.setProperty("--color-main", Color);
});

//フォームの入力確認
let $submit = jQuery("#js-submit");
jQuery("#js-form input,#js-form textarea").on("change", function () {
  // 内容がすべて入力されている時
  if (
    jQuery('#js-form input[type="text"]').val() !== "" &&
    jQuery('#js-form input[type="email"]').val() !== "" &&
    jQuery('#js-form input[type="checkbox"]').prop("checked") === true
  ) {
    //送信ボタンを押せるようにする
    $submit.prop("disabled", false);
    // 送信ボタンにクラスを付与
    $submit.addClass("is-active");
  } else {
    //送信ボタンを押せないようにする
    $submit.prop("disabled", true);
    // 送信ボタンのクラスを外す
    $submit.removeClass("is-active");
  }
});
