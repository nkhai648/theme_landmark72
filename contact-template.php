
<?php /* Template Name: Contact */ ?>
<?php 
    get_header();
?>

<div style="background-color: #f2f2f2; height: 800px">
contact
    <div style="background-color: #fff; height: 300px"></div>
    <?php 
                
            //$tp_country = get_post_meta( $post->ID, 'image_1', true );

            var_dump(get_field('slide_1'));

            //var_dump($post);

            //echo wp_get_attachment_image( $tp_country, 'large', false, '' );
    
    ?>
</div>


<?php get_footer()?>