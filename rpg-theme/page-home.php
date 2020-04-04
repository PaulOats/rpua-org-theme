<?php
/**
 * Home Page (page-home.php)
 * @package WordPress
 * @subpackage rpua.org
 * Template Name: Home Page
 */
get_header(); 

$first_block = get_field("first_block", $post->ID);
//$second_block = get_field("second_block", $post->ID);
$third_block = get_field("third_block", $post->ID);
//$fourth_block = get_field("fourth_block", $post->ID);
?>

<section>
    <div class="content">
        <div class="first_block first-wave" data-src="<?php echo $first_block['background_img']['url'];?>">
            <h1><?php echo $first_block['h1'];?></h1>
        </div>
		<div class="third_block hot_post">
            
		<?php
		if($third_block['last_post']){
            $posts = wp_get_recent_posts( array(
                'numberposts' => 1,
                'orderby'     => 'post_date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'post_status' => 'publish',
                'suppress_filters' => true,
            ));
//            foreach( $posts as $post ){
//                                setup_postdata($post);
//                              }
            
                $selected_post = $posts[0]['ID'];
                wp_reset_postdata();
			}else{
				$selected_post = $third_block['selected_post']->ID;
            }
		?>
			<div class="selected_post">
                <h2 class="title">Гаряча тема</h2>
                <div class="post">
                    <div>
                    <?php
                        echo '<a href="'.get_the_permalink($selected_post).'"><h2>'. esc_html( get_the_title($selected_post) ) .'</h2></a>';
                        echo '<p>' . get_the_excerpt($selected_post) . '</p>';
                    ?>
                        <p class="read_more"><a href="<?php echo get_the_permalink($selected_post); ?>"><span>Далі</span><img src="<?php echo get_template_directory_uri();?>/svg/arrow.svg"/></a></p>
                    </div>
                    <?php
                    $post_thumbnail = get_the_post_thumbnail_url( $selected_post, 'full');
                        if($post_thumbnail != ''){
                            $post_thumbnail_img = '<div class="post_bg_image second-wave" data-src="' . $post_thumbnail .'"></div>';
                        }else{
                            $post_thumbnail_img = '<div class="post_bg_image no_image"></div>';
                        }
                    
                    echo $post_thumbnail_img;?>
                    </div>
                </div>
			</div>
		</div>
        <div class="fourth_block">
            <h2 class="title">Що нового</h2>
            <div class="container">
                <?php
                $posts = wp_get_recent_posts( array(
                    'numberposts' => 4,
                    'orderby'     => 'post_date',
                    'order'       => 'DESC',
                    'post_type'   => 'post',
                    'post_status' => 'publish',
                    'suppress_filters' => true,
                ));
                foreach($posts as $rpg_post){
                    $selected_post_ID = $rpg_post['ID'];
                    
                    $rpg_post_date = explode(" ",$rpg_post["post_date"]);
                ?>
                <div class="article">
                    <p class="date_type"><span><?php echo $rpg_post_date[0];?></span><span>Блог</span></p>
                    <a href="<?php echo get_the_permalink($selected_post_ID); ?>"><h2 class="article_title"><?php echo $rpg_post['post_title'];?></h2></a>
                    <p class="article_text"><?php echo get_the_excerpt($selected_post_ID);?></p>
                    <p class="read_more"><a href="<?php echo get_the_permalink($selected_post_ID); ?>"><span>Далі</span><img src="<?php echo get_template_directory_uri();?>/svg/arrow.svg"/></a></p>
                </div>
                <?php
                }
                wp_reset_postdata();
                ?>
                
            </div>
<!--            <a class="blog_btn" href="/blog/">Більше тут</a>-->
        </div>
    </div>
</section>
</div>
<?php get_footer(); ?>