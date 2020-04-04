<?php
/**
 * Footer (footer.php)
 * @package WordPress
 * @subpackage rpua.org
 */
//	$footer_image = get_field('footer_image', get_options_page_id('fs-options'));
?>
	</div><!-- .site-content -->

	<footer>
        <div class="footer_column">
            <p class="thanks">Сайт створюємо з <b>любов’ю</b> :)</p>
        </div>
        <div class="footer_column">
            <div>
                <p>Українська Рольова Спільнота<br/><span><?php echo date('Y');?></span></p>
            </div>
            <div class="social_block">
                <a href="#fb_link" title="Facebook"><img src="<?php echo get_template_directory_uri();?>/svg/icons/fb_icon.svg"/></a>
                <a href="#tg_link" title="Telegram"><img src="<?php echo get_template_directory_uri();?>/svg/icons/tg_icon.svg"/></a>
            </div>
        </div>
        <div class="footer_column"></div>
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
