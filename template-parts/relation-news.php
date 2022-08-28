<div class="relation-news">


  <!-- 同カテゴリーの記事が存在していたら、以下を表示 -->
  <?php if (has_category()) :  ?>

    <div class="relation-news__title">関連記事</div>

    <?php
    $cats = get_the_category(); //現在の記事のカテゴリ配列を取得
    $cat_id = $cats[0]->cat_ID; //配列１番目のカテゴリid
    $post_id = get_the_ID(); //表示中記事のid

    $args = array(
      'post_type' => 'post',
      'post__not_in' => array($post_id), //表示中の記事は関連記事に表示しない
      'category__in' => $cat_id, //同一カテゴリの記事を対象に
      'orderby' => 'rand', //ランダムに表示
      'posts_per_page' => 6, //表示する最大記事数
    );
    $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()) ?>

    <div class="relation-news__items">
      <?php while ($query->have_posts()) : $query->the_post(); ?>

        <div class="news__item">
          <a href="<?php the_permalink(); //記事のリンクを表示
                    ?>">
            <div class="news__item-img">
              <?php
              if (has_post_thumbnail()) {
                //アイキャッチ画像が設定されていれば中サイズで表示
                the_post_thumbnail('medium');
              } else {
                //なければnoimage画像をデフォルトで表示
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
              }
              ?>
            </div>
            <div class="news__item-tag">
              <div class="tag-ribbon"><span><?php my_the_post_category(false); ?></span></div>
            </div>
            <div class="news__item-title">

              <?php
              $title_text = get_the_title();
              //文字数の上限
              $limit = 27;

              //上限文字数以上は3点リーダーに
              if (mb_strlen($title_text) > $limit) {
                $title = mb_substr($title_text, 0, $limit);
                echo $title . '⋯';
              } else {
                echo $title_text;
              }
              ?>

            </div>
            <div class="news__item-date"><?php the_time('Y.m.d'); ?></div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif ?>


</div>