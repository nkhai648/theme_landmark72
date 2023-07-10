<?php get_header() ?>
<?php if(is_home()) : ?>
<?php get_template_part('home-template');?>
<?php else :
    get_template_part('content', get_post_format());
?>
<?php endif?>
<?php get_footer() ?>