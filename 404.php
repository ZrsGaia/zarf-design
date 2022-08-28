<?php get_header(); ?>

<section>

  <div class="inner sub__inner">

    <h2 class="section__head-main wow fadeInUp">404 Not Found</h2>

    <div class="section__head-sub">ページが見つかりません</div>

    <div class="sub__content">
      <div class="not-found__text">
        申し訳ありませんが、ページが存在しないかアクセスできません。<br>入力されたURLをご確認ください。
      </div>

      <div class="not-found__top-link">
        <a class="btn btn-color-slide" href="<?php echo esc_url(home_url('/')); ?>">トップページへ</a>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>