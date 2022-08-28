  <!-- pagenation -->
  <?php if (paginate_links()) : //ページが１ページ以上存在すれば以下を表示
  ?>

    <div class="pagenation">

      <?php
      echo
      paginate_links(
        array(
          'end_size' => 0,
          'mid_size' => 1,
          'prev_next' => true,
          'prev_text' => '<img src="' . esc_url(get_template_directory_uri()) . '/img/arrow-prev.svg" alt="">',
          'next_text' => '<img src="' . esc_url(get_template_directory_uri()) . '/img/arrow-next.svg" alt="">',
        )
      );
      ?>
    </div><!-- /pagenation -->
  <?php endif ?>