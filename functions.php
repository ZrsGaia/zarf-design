<?php

/**
 * テーマのセットアップ
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
 **/
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');


/**
 * CSSとJavaScriptの読み込み
 */
function my_script_init()
{
  // css

  //reset css
  wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css', array(), filemtime(get_theme_file_path('/css/reset.css')), 'all');

  //swiper-slide css
  wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.css', array(), '6.8.4', 'all');

  //fontawesome
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');

  //animate css
  wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), filemtime(get_theme_file_path('/css/animate.css')), 'all');

  //original css
  wp_enqueue_style('my-css', get_template_directory_uri() . '/css/style.css', array(), filemtime(get_theme_file_path('/css/style.css')), 'all');

  // JavaScript

  //iScroll
  wp_enqueue_script('iScroll', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js', array('jquery'), true);

  //swiper-slide js
  wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js', array('jquery'), '6.8.4', true);

  //wow js
  wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), filemtime(get_theme_file_path('/js/wow.min.js')), true);

  // js
  wp_enqueue_script('my-js', get_template_directory_uri() . '/js/script.js', array('jquery'), filemtime(get_theme_file_path('/js/script.js')), true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


/**
 * メニューの登録
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 *
 * */

function my_menu_init()
{
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'drawer' => 'ドロワーメニュー',
      'social' => 'ソーシャルメニュー',
    )
  );
}
add_action('init', 'my_menu_init');

/* 投稿アーカイブを有効にしてスラッグを指定する */
function post_has_archive($args, $post_type)
{

  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'news'; // スラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/* 投稿アーカイブを子階層にしパンくずリストに文字を追加 */
function bcn_add($bcnObj)
{
  // デフォルト投稿のアーカイブかどうか
  if (is_post_type_archive('post')) {
    // 新規のtrailオブジェクトを末尾に追加する
    $bcnObj->add(new bcn_breadcrumb('お知らせ', null, array('archive', 'post-clumn-archive', 'current-item')));
    // trailオブジェクト0とtrailオブジェクト1の中身を入れ替える
    $trail_tmp = clone $bcnObj->trail[1];
    $bcnObj->trail[1] = clone $bcnObj->trail[0];
    $bcnObj->trail[0] = $trail_tmp;
  }
  return $bcnObj;
}
add_action('bcn_after_fill', 'bcn_add');



/* タクソノミーの順番を説明欄で指定 */
function taxonomy_orderby_description($orderby, $args)
{
  if ($args['orderby'] == 'description') {
    $orderby = 'tt.description';
  }
  return $orderby;
}
add_filter('get_terms_orderby', 'taxonomy_orderby_description', 10, 2);


/* ナビゲーションメニューの説明欄を表示 */
function prefix_nav_description($item_output, $item, $depth, $args)
{
  if (!empty($item->description)) {
    $item_output = str_replace('">' . $args->link_before . $item->title, '">' . $args->link_before . '<span class="nav__label">' . $item->title . '</span>' . '<span class="nav__description">' . $item->description . '</span>', $item_output);
  }
  return $item_output;
}
add_filter('walker_nav_menu_start_el', 'prefix_nav_description', 10, 4);

/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/**
 * カテゴリーを1つだけ表示
 *
 * @param boolean $anchor aタグで出力するかどうか.
 * @param integer $id 投稿id.
 * @return void
 */

function my_the_post_category($anchor = true, $id = 0)
{
  //投稿記事の情報をグローバル変数に
  global $post;

  //引数が渡されなければ投稿IDを見るように設定
  if (0 === $id) {
    $id = $post->ID;
  }

  //カテゴリー配列を取得
  $this_categories = get_the_category($id);

  //カテゴリーが存在するとき
  if ($this_categories[0]) {

    // 引数がtrueならリンク付きでカテゴリーを出力
    if ($anchor) {
      echo '<a href="' . esc_url(get_category_link($this_categories[0]->term_id)) . '">' . esc_html($this_categories[0]->cat_name) . '</a>';
    }

    // 引数がfalseならカテゴリー名のみ出力
    else {
      echo esc_html($this_categories[0]->cat_name);
    }
  }
}

/**
 * タグの取得
 *
 * @param integer $id 投稿id.
 * @return void
 */

function my_get_post_tags($id = 0)
{
  //投稿記事の情報をグローバル変数に
  global $post;

  //引数が渡されなければ投稿IDを見るように設定
  if (0 === $id) {
    $id = $post->ID;
  }

  //タグ一覧を取得
  $this_posttags = get_the_tags($id);

  //タグ一覧が存在する場合
  if ($this_posttags) {
    foreach ($this_posttags as $this_tag) {
      $this_posttaglink = esc_url(get_tag_link($this_tag->term_id));
      echo  '<a href="' . $this_posttaglink . '">' . '<div class="entry-tag-item">' . $this_tag->name . '</a></div>  <!-- /entry-tag-item -->';
    }
  }
}

/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function my_widget_init()
{
  register_sidebar(
    array(
      'name' => 'サイドバー', //表示するエリア名
      'id' => 'sidebar', //id
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title">',
      'after_title' => '</div>',
    )
  );
}
add_action('widgets_init', 'my_widget_init');


/**
 * カスタムフィールドを使ってアクセス数を取得する（特定記事のアクセス数確認用）
 *
 * @param integer $id 投稿id.
 * @return void
 */
//アクセス数を取得
function get_post_views($id = 0)
{
  global $post;
  //引数が渡されなければ投稿IDを見るように設定
  if (0 === $id) {
    $id = $post->ID;
  }
  $count_key = 'view_counter';
  $count = get_post_meta($id, $count_key, true);

  if ($count === '') {
    delete_post_meta($id, $count_key);
    add_post_meta($id, $count_key, '0');
  }
  return $count;
}

/**
 * アクセスカウンター
 *
 * @return void
 */
function set_post_views()
{
  global $post;
  $count = 0;
  $count_key = 'view_counter';

  //個別記事表示時以外はアクセスをカウントしない
  if (!is_single()) {
    return;
  }

  if ($post) {
    $id = $post->ID;
    $count = get_post_meta($id, $count_key, true);
  }

  if ($count === '') {
    delete_post_meta($id, $count_key);
    add_post_meta($id, $count_key, '1');
  } elseif ($count > 0) {
    if (!is_user_logged_in()) { //管理者（自分）の閲覧を除外してカウントする
      $count++;
      update_post_meta($id, $count_key, $count);
    }
  }
  //$countが0のままの場合（404や該当記事の検索結果が0件の場合）は何もしない。
}

//ページが表示されるタイミングで実行されるアクションフックでアクセスカウンター関数を実行
add_action('template_redirect', 'set_post_views', 10);



/**
 * 検索結果から固定ページを除外する

 * @param string $search SQLのWHERE句の検索条件文

 * @param object $wp_query WP_Queryのオブジェクト

 * @return string $search 条件追加後の検索条件文

 */

function my_posts_search($search, $wp_query)
{

  //検索結果ページ・メインクエリ・管理画面以外の3つの条件が揃った場合

  if ($wp_query->is_search() && $wp_query->is_main_query() && !is_admin()) {

    // 検索結果を投稿タイプに絞る

    $search .= " AND post_type = 'post' ";

    return $search;
  }

  return $search;
}

//検索結果フィルターフックに関数を指定 優先度:最優先 引数:2
add_filter('posts_search', 'my_posts_search', 10, 2);


/**
 * ボタンのショートコード
 *
 * @param array $atts ショートコードの引数(リンク先のURL)
 * @param string $content ショートコードのコンテンツ. (ボタンに表示するテキスト)
 * @return string ボタンのHTMLタグ.
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_shortcode
 */
function my_btn_shortcode($atts, $content = '')
{
  return '<div class="entry-btn"><a class="btn" href="' . $atts['link'] . '">' . $content . '</a></div><!-- /entry-btn -->';
}
add_shortcode('btn', 'my_btn_shortcode');


/* コンタクトフォームからサンクスページに移行 */
function add_thanks_page()
{
  echo <<< EOD
  <script>
  document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = '/contact-thanks/';
  }, false );
  </script>
  EOD;
}
add_action('wp_footer', 'add_thanks_page');

/* お問い合わせページにのみreCAPTCHA表示 */
function load_recaptcha_js()
{
  if (!is_page('contact')) {
    wp_deregister_script('google-recaptcha');
  }
}
add_action('wp_enqueue_scripts', 'load_recaptcha_js', 100);

/* テンプレートパーツを投稿画面から呼び出せるようにする */
add_shortcode('add_template_part', function ($attr) {
  ob_start();
  get_template_part($attr['temp']);
  return ob_get_clean();
});
