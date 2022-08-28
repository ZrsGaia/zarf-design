<?php get_header(); ?>


<section>

  <div class="inner sub__inner">
    <!-- パンくずリスト -->
    <?php get_template_part('./template-parts/breadcrumb') ?>

    <h2 class="section__head-main wow fadeInUp">Works</h2>
    <div class="section__head-sub">実績</div>

    <div class="content">

      <?php if (have_posts()) : ?>

        <div class="card__items">

          <?php while (have_posts()) : the_post(); ?>

            <div class="card-work wow fadeInUp">

              <a href="<?php the_permalink(); ?>">

                <div class="card__img">
                  <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('my_thumbnail');
                  } else {
                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                  }
                  ?>
                </div>

                <h3 class="card__title">
                  <?php the_title(); ?>
                </h3>

                <div class="card__date">
                  <?php the_time('Y.m.d'); ?>
                </div>

                <div class="card__text">
                  <?php the_excerpt(); ?>
                </div>

              </a>
            </div>

          <?php endwhile; ?>

        </div>

      <?php endif; ?>

    </div>

  </div>

  <?php get_template_part('template-parts/pagination'); ?>

</section>

<?php get_footer(); ?>