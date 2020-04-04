<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage rpua.org
 */

get_header();
    $tags = wp_get_post_tags( $post->ID );
    $author_id = $post->post_author;
    $post_thumbnail = get_the_post_thumbnail_url( $post, 'full');
    if($post_thumbnail != ''){
        $post_thumbnail_img = '<div class="bg_image first-wave" data-src="' . $post_thumbnail .'"></div>';
    }else{
        $post_thumbnail_img = '<div class="bg_image no_image"></div>';
    }
?>
<section>
	<div class="container single">
        <div class="post_header">
            <div class="main_block">
                <p class="pagination"><a href="/">Головна</a> | <a href="/blog">Блог</a> | <?php echo $post->post_title; ?></p>
                <?php echo $post_thumbnail_img;?>
            </div>
            <div class="tags_date"><div><?php
            foreach($tags as $tag){
                echo '<span>#'.$tag->name.'</span>';
            }?></div><span class="time"><?php echo $post->post_date;?></span></div>
            <h1><?php echo $post->post_title;?></h1>
            <div class="post_autor">
                <span>Автор:</span>
                <?php if(get_field("image", 'user_'.$author_id)['url'] !=''){
                echo '<img class="avatar" src="'.get_field("image", 'user_'.$author_id)['url'].'"/>';
                }?>
				<div><span class="name"><?php the_author_meta( 'display_name' , $author_id );?></span>
                <span class="description">, <?php the_author_meta( 'description' , $author_id );?></span></div>
            </div>
        </div>
        
        <div class="main_text"><?php echo wpautop( $post->post_content );?></div>
	</div>
</section>
</div>
<?php get_footer();?>