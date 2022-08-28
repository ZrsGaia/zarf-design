<!-- pickup -->
<div id="pickup">
  <div class="inner">

    <div class="pickup-items">
      <!-- ピックアップする記事の投稿idの配列を作成 -->
      <?php $args = array(
        'post_type' => 'post',
        'tag' => 'pickup', //ピックアップのタグがついた投稿を対象
        'orderby' => 'DESC', //日付の新しい順で
        'posts_per_page' => 3, //表示する最大記事数
      );

      $query = new WP_Query($args);
      ?>

      <!-- ピックアップ記事をループして表示 -->
      <?php while ($query->have_posts()) : $query->the_post(); ?>

        <a href="<?php echo esc_url(get_permalink()); //記事のリンクを表示
                  ?>" class="pickup-item">

          <div class="pickup-item-img">
            <?php
            if (has_post_thumbnail()) {
              //アイキャッチ画像が設定されていれば大サイズで表示
              the_post_thumbnail('large');
            } else {
              //なければnoimage画像をデフォルトで表示
              echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
            }
            ?>

            <!-- カテゴリ名を出力 -->
            <div class="pickup-item-tag">
              <?php my_the_post_category(false); ?>
            </div><!-- /pickup-item-tag -->

          </div><!-- /pickup-item-img -->

          <div class="pickup-item-body">
            <h2 class="pickup-item-title">
              <?php the_title(); ?>
            </h2><!-- pickup-item-title -->
          </div><!-- /pickup-item-body -->

        </a><!-- /pickup-item -->

      <?php endwhile; ?>

    </div><!-- /pickup-items -->

  </div><!-- /inner -->
</div><!-- /pickup -->