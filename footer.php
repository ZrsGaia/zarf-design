<footer class="footer">

  <div class="inner footer__inner">

    <div class="footer__icon-list">

      <?php
      //ソーシャルメニューを動的に表示する
      wp_nav_menu(
        array(
          'depth' => 1,
          'theme_location' => 'social', //ソーシャルメニューをここに表示すると指定
          'container' => 'nav',
          'container_class' => 'drawer-nav-sns',
          'menu_class' => 'drawer-nav-sns__list',
        )
      );
      ?>

      <p class="footer__copy-right">© Zarf-Design 2022</p>
    </div>

  </div>

  <div class="footer__skew">
  </div>


</footer>

<div class="to-top">
  <a href="#"><i class="fas fa-chevron-circle-up"></i></a>
</div>


<?php wp_footer(); ?>

</body>

</html>