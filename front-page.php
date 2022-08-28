<?php get_header(); ?>

<section class="top wow fadeIn">

  <div class="inner top__inner">
    <!-- Slider main container -->
    <div class="swiper-container">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">

        <!-- Slides -->
        <div class="swiper-slide">
          <div class="slide-img">
            <img src="<?php echo get_template_directory_uri() ?>/img/top-1.png" alt="">
          </div>
        </div>

        <div class="swiper-slide">
          <div class="slide-img">
            <img src="<?php echo get_template_directory_uri() ?>/img/top-2.png" alt="">
          </div>
        </div>

        <div class="swiper-slide">
          <div class="slide-img">
            <img src="<?php echo get_template_directory_uri() ?>/img/top-3.png" alt="">
          </div>
        </div>
      </div>

    </div>

    <h2 class="top__caption">
      <span>現在</span>の<span><?php get_template_part('./template-parts/dream-random-link') ?></span>を<span>形</span>にする
    </h2>

  </div>

</section>

<div class="scroll-text">SCROLL</div>


<section class="section about wow fadeInUp" id="about">
  <div class="inner about__inner">

    <h3 class="section__head-main wow fadeInUp">About</h3>
    <div class="section__head-sub">わたしについて</div>


    <div class="content about__content">

      <div class="about__img">
        <img src="<?php echo get_template_directory_uri() ?>/img/profile.png" alt="">
      </div>

      <div class="about__info">

        <div class="about__name">ゼロス
          <a class="about__icon" href="https://twitter.com/Zrs_WebDesigner" target="_blank">
            <i class="fab fa-twitter-square"></i>
          </a>
        </div>

        <div class="about__message">
          <p>大阪にてホームページ制作を行なっています。</p>
          <p>わたしはホームページはその人の<?php get_template_part('./template-parts/dream-random-link') ?>が見れる場所だと考えています。 </p>
          <p>あなたの現在の<?php get_template_part('./template-parts/dream-random-link') ?>を形にするお手伝いをさせて頂けませんか？ </p>
          <p>持ち前の粘り強さをもってホームページ制作に貢献致します。
          </p>
          <p>趣味は特撮、ゲーム、映画、猫カフェ、散歩、お絵描きです。
            <br>プロフィール画像は自分で描きました。
          </p>
        </div>

        <div class="about__link">
          <a class='btn btn-color-slide' href="<?php echo esc_url(home_url('/about/')); ?>">
            詳しくはこちら
          </a>
        </div>

      </div>

    </div>



  </div>
</section>

<section class="section service wow fadeInUp" id="service">
  <div class="inner service__inner">

    <h3 class="section__head-main wow fadeInUp">Service</h3>
    <div class="section__head-sub">サービス</div>

    <div class="content service__content">

      <div class="card__items">
        <div class="card wow fadeInUp">
          <img class="card__img" src="<?php echo get_template_directory_uri() ?>/img/design.png" alt="ホームページ制作">
          <div class="card__body">
            <div class="card__title">ホームページ制作</div>

            <div class="card__price">¥80,000~</div>

            <div class="card__text">要望に沿ったホームページをコーディングして制作します。レスポンシブデザイン、動きや効果など要望にも柔軟に対応します。</div>
          </div>
        </div>

        <div class="card wow fadeInUp">
          <img class="card__img" src="<?php echo get_template_directory_uri() ?>/img/cording.png" alt="ホームページ修正">
          <div class="card__body">

            <div class="card__title">ホームページ修正</div>

            <div class="card__price">¥5,000~</div>

            <div class="card__text">ホームページの文言の変更、表示の崩れなどの修正に対応いたします。</div>
          </div>
        </div>

      </div>

      <div class="service__link">
        <a class='btn btn-color-slide' href="<?php echo esc_url(home_url('/service/')); ?>">
          詳しくはこちら
        </a>
      </div>

    </div>

  </div>
</section>

<section class="section skill wow fadeInUp" id="skill">
  <div class="inner skill__inner">

    <h3 class="section__head-main wow fadeInUp">Skill</h3>
    <div class="section__head-sub">スキル</div>

    <div class="content service__content">

      <div class="card__items">
        <div class="card wow fadeInUp">
          <img class="card__img" src="<?php echo get_template_directory_uri() ?>/img/html-css-javascript.png" alt="コーディングスキル">
          <div class="card__body">
            <div class="card__title">コーディング</div>
            <div class="card__text">
              <ul class="skill__list">
                <li>HTML</li>
                <li>CSS(SCSS)</li>
                <li>BootStrap</li>
                <li>JavaScript(jQuery)</li>
                <li>PHP</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="card wow fadeInUp">
          <img class="card__img" src="<?php echo get_template_directory_uri() ?>/img/wordpress.png" alt="ホームページ修正">
          <div class="card__body">

            <div class="card__title">WordPress</div>

            <div class="card__text">
              <ul class="skill__list">
                <li>オリジナルテーマ作成</li>
                <li>パフォーマンス対策</li>
                <li>SEO対策</li>
                <li>セキュリティ対策</li>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>

<section class="section works wow fadeInUp" id="works">
  <div class="inner works__inner">

    <h3 class="section__head-main wow fadeInUp">Works</h3>
    <div class="section__head-sub">実績</div>

    <div class="content works__content">

      <?php
      $works_query = new WP_Query(
        array(
          'post_type' => 'works', //カスタム投稿タイプを指定
          'posts_per_page' => 3, //表示する最大記事数
          'order' => 'DESC', //降順
        )
      );
      ?>

      <?php if ($works_query->have_posts()) : ?>
        <div class="card__items">


          <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
            <div class="card-work wow fadeInUp">
              <a href="<?php the_permalink(); ?>">


                <div class="card__img">
                  <?php
                  if (has_post_thumbnail()) {
                    //アイキャッチ画像が設定されていれば大サイズで表示
                    the_post_thumbnail('large');
                  } else {
                    //なければnoimage画像をデフォルトで表示
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                  }
                  ?>
                </div>

                <div class="card__body">

                  <div class="card__title">
                    <?php the_title(); ?>
                  </div>

                  <div class="card__date">
                    <?php the_time('Y.m.d'); ?>
                  </div>

                  <div class="card__text">
                    <?php the_excerpt(); ?>
                  </div>

                </div>
              </a>
            </div>

          <?php endwhile; ?>

        <?php endif; ?>

        </div>

        <div class="works__link">
          <a class='btn btn-color-slide' href="<?php echo esc_url(home_url('/works/')); ?>">
            一覧を見る
          </a>
        </div>

    </div>

  </div>
</section>

<?php get_footer(); ?>