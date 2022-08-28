<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section>

      <div class="inner sub__inner">

        <!-- パンくずリスト -->
        <?php get_template_part('./template-parts/breadcrumb') ?>

        <div class="sub__content wow fadeIn">
          <?php get_template_part('./template-parts/sub-head') ?>

          <?php if (!is_page('contact')) : ?>
            <div class="sub__eye-catch">
              <?php
              if (has_post_thumbnail()) {
                //アイキャッチ画像が設定されていれば中サイズで表示
                the_post_thumbnail('large');
              } else {
                //なければnoimage画像をデフォルトで表示
                echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
              }
              ?>
            </div>

          <?php endif ?>

          <?php
          //ブログ本文の表示
          the_content();
          ?>
        </div>
      </div>

      </div>
    </section>

<?php endwhile;
endif; ?>


<?php get_footer(); ?>