<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage rpua.org
 */
get_header(); // подключаем header.php 


$videoType = get_field("youtube_vimeo", $post->ID);
$vimeo_id = get_field("vimeo_id", $post->ID);
$youtube_id= get_field("youtube_id", $post->ID);
$category_main_text = get_field("category_main_text", $post->ID);
?>
<section>
	<div class="container">
		<div class="row">
            <div class="reels-block">
                <div class="reel-main-box-category">
<?php
                    if($videoType == 'Vimeo'){
                        $hash = unserialize(file_get_contents( "http://vimeo.com/api/v2/video/".$vimeo_id.".php" ));
                        $poster = $hash[0]['thumbnail_large'];
                    }
                    else{
                        $poster = 'https://img.youtube.com/vi/'.$youtube_id.'/maxresdefault.jpg';
                    }
?>
                    <div class="reel-box">
                        <div>
                            <h1><?php single_cat_title();?></h1>
                            <h2><?php echo $category_main_text;?></h2>
                        </div>
                        <div data-src="<?php echo $poster;?>">
        <?php if($videoType == 'Vimeo'){
            echo '<iframe class="second-wave" data-loader="vimeo" data-src="'.$vimeo_id.'" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        }else{
            echo '<iframe class="second-wave" data-loader="youtube" data-src="'.$youtube_id.'" width="560" height="315" frameborder="0"></iframe>';
        } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
		</div>
	</div>
</section>
<?php
/*
<section>
	<div class="container">
		<div class="row">
			<h2 class="our_projects">Our projects:</h2>
			<div class="work-block">
			<?php
            $queried_object = get_queried_object();

            $args = array(
                'post_type'=> 'projects',
                'post_status' => 'publish',
                'numberposts' => -1,
                'cat'    => $queried_object->term_id,
                'order'    => 'ASC'
                );              

                $the_query = new WP_Query( $args );
            foreach($the_query->posts as $projectsPost){
				$select = get_field("promo", $projectsPost->ID)['select_label']['select'];
					if($select != 'NONE'){
						$tag = $select;
						if($select == 'CUSTOM'){
							$tag = get_field("promo", $projectsPost->ID)['select_label']['custom_label'];
						}
						$fullTag = '<h3>'.$tag.'</h3>';
					}else{
						$fullTag = '';
					}
			?>
				<a class="work-column open_project" href="<?php echo get_post_permalink( $projectsPost->ID ) ?>">
					<div class="image_box first-wave" data-src="<?php echo get_field("promo", $projectsPost->ID)['works_block_image']['url']; ?>"></div>
					<div class="work-box">
						<h2><?php echo get_field("promo", $projectsPost->ID)['works_block_text']; ?></h2>
			            <?php echo $fullTag;?>
					</div>
				</a>
			<?php
            }
            ?>
			</div>
		</div>
	</div>
</section>
*/
?>
<?php get_footer(); ?>

</div>          
