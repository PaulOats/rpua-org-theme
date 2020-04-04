<?php
/**
 * Blog Page (page-blog.php)
 * @package WordPress
 * @subpackage rpua.org
 * Template Name: Blog Page
 */
get_header(); 

$default_image = get_field("default_image", $post->ID);
?>

<section>
    <div class="content blog">
	<?php
		$posts = wp_get_recent_posts( array(
                'numberposts' => 1,
                'orderby'     => 'post_date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'post_status' => 'publish',
                'suppress_filters' => true,
		));
		$selected_post = $posts[0]['ID'];
        
        wp_reset_postdata();
        
        $thumb_url = get_the_post_thumbnail_url( $posts[0]['ID'], 'full' );
		if( $thumb_url != ''){
            
            $thumb = '<div class="second-wave" data-src="' . $thumb_url . '"></div>';
		}else{
			$thumb = '<div class="second-wave no_image"></div>';
		}
	?>
		<div class="selected_post">
            <div class="post">
                <?php echo $thumb;?>
            	<div class="hot_post">
					<?php
                        echo '<a href="'.get_the_permalink($selected_post).'"><h2>'. esc_html( get_the_title($selected_post) ) .'</h2></a>';
                        echo '<p>' . get_the_excerpt($selected_post) . '</p>';
                    ?><p class="read_more"><a href="<?php echo get_the_permalink($selected_post); ?>"><span>Далі</span><img src="<?php echo get_template_directory_uri();?>/svg/arrow.svg"/></a></p>
				</div>
			</div>
		</div>
		<div class="all_posts">
		<?php $posts = wp_get_recent_posts( array(
                'numberposts' => 999,
                'orderby'     => 'post_date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'post_status' => 'publish',
                'suppress_filters' => true,
		));
			
		foreach($posts as $index=>$post){
			if( $index == 0 ){
				continue;
			}
            $tags = wp_get_post_tags( $post['ID'] );
            $post_date = explode(" ",$post["post_date"]);
			$author_id = $post["post_author"];
            
            $selected_post_obj = get_post( $post['ID'] );
            
            $thumb_url = get_the_post_thumbnail_url( $selected_post_obj, 'full');
            if( $thumb_url != ''){
                
                $thumb = '<div class="poster second-wave" data-src="' . $thumb_url . '"></div>';
		    }else{
			     $thumb = '<div class="poster second-wave no_image"></div>';
            }
            
		?>

        
            
			<div class="single-post">
				<a href="<?php echo get_the_permalink($post["ID"]);?>"><?php echo $thumb;?></a>
				<div class="post_content">
					<div class="first_line">
						<div class="tags"><?php if(is_array($tags) && count($tags) > 0){echo'Теги: '; foreach($tags as $tag){echo ' #'.$tag->name.' ';}}?></div>
                        <div class="divider"></div>
						<div class="date"><?php echo $post_date[0];?></div>
					</div>
					<h2 class="second_line"><?php echo $post["post_title"];?></h2>
					<div class="post_autor">
                        <span>Автор:</span>
                        <?php if(get_field("image", 'user_'.$author_id)['url'] !=''){
                        echo '<img class="avatar" src="'.get_field("image", 'user_'.$author_id)['url'].'"/>';
                        }
                        ?>
                        <span class="name"><?php the_author_meta( 'display_name' , $author_id );?></span>
                        <span class="description">, <?php the_author_meta( 'description' , $author_id );?></span>
                    </div>
					<div class="excerpt"><?php echo get_the_excerpt($post["ID"]);?></div>
					<div class="read_more"><div class="divider"></div><a href="<?php echo get_the_permalink($post["ID"]); ?>"><span>Читати більше</span><img src="<?php echo get_template_directory_uri();?>/svg/arrow.svg"/></a></div>
                </div>
			</div>
		<?php
		}
        wp_reset_postdata();
		?>
		</div>
    </div>
</section>
</div>
<?php get_footer(); ?>