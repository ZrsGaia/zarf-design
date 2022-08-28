<!-- 現在のページのスラッグを取得 -->
<?php $slug = get_post_field('post_name', get_the_ID()); ?>

<h2 class="section__head-main wow fadeInUp"><?php echo $slug ?></h2>
<div class="section__head-sub"><?php the_title() ?></div>