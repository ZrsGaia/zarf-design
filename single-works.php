<?php get_header(); ?>


<section>

  <div class="inner sub__inner">
    <!-- パンくずリスト -->
    <?php get_template_part('./template-parts/breadcrumb') ?>

    <h2 class="section__head-main wow fadeInUp">Works</h2>
    <div class="section__head-sub">実績</div>

    <?php if (have_posts()) : ?>

      <div class="content">

        <?php while (have_posts()) : the_post(); ?>

          <div class="single-work__item">

            <div class="single-work__item-header">
              <div class="single-work__img">
                <a href="<?php the_field('link') ?>" target="_blank">
                  <?php
                  if (has_post_thumbnail()) {
                    //アイキャッチ画像が設定されていれば大サイズで表示
                    the_post_thumbnail('large');
                  } else {
                    //なければnoimage画像をデフォルトで表示
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                  }
                  ?>
                </a>
              </div>

              <div class="single-work__info">


                <div class="single-work__date">
                  <?php the_time('Y.m.d'); ?>
                </div>

                <div class="single-work__title">
                  <?php the_title(); ?>
                </div>

                <div class="single-work__link">
                  <a href="<?php the_field('link') ?>" target="_blank"><?php echo the_field('link') ?></a>
                </div>

                <table class="custom-table">
                  <tr>
                    <td>担当範囲</td>
                    <td><?php the_field('range'); ?></td>
                  </tr>

                  <tr>
                    <td>使用技術</td>
                    <td><?php the_field('skill'); ?></td>
                  </tr>
                </table>
              </div>

            </div>

            <div class="single-work__item-body">
              <?php
              //ブログ本文の表示
              the_content();
              ?>
            </div>

          </div>

        <?php endwhile; ?>

      </div>

    <?php endif; ?>


    <!-- 記事のリンク -->
    <div class="post-links">

      <div class="post-link__prev">
        <?php previous_post_link($preview_arrow . '＜ %link', '前の実績'); ?>
      </div>

      <div class="post-link__next">
        <?php next_post_link('%link ＞' . $next_arrow, '次の実績'); ?>
      </div>

    </div>

    <div class="post-link__list">
      <a href="<?php echo home_url('/works/'); ?>">
        <div class="btn btn-color-slide">一覧へ</div>
      </a>
    </div>

  </div>

</section>

<?php get_footer(); ?>