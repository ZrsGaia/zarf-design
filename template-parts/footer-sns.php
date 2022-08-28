<?php if (is_single()) : ?>
  <!-- footer-sns -->
  <div class="footer-sns">
    <div class="inner">

      <div class="footer-sns-head">この記事をシェアする</div><!-- /footer-sns-head -->

      <nav class="footer-sns-buttons">

        <ul>
          <li><a class="m_twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-twitter.png'); ?> " alt=""></a>
          </li>
          <li><a class=" m_facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-facebook.png'); ?>" alt=""></a></li>
          <li><a class=" m_hatena" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-hatena.png'); ?>" alt=""></a></li>
          <li><a class=" m_line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-line.png'); ?>" alt=""></a></li>
          <li><a class=" m_pocket" href="https://getpocket.com/edit?url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/icon-pocket.png'); ?>" alt=""></a></li>
        </ul>
      </nav><!-- /footer-sns-buttons -->

    </div><!-- /inner -->
  </div><!-- /footer-sns -->
<?php endif; ?>