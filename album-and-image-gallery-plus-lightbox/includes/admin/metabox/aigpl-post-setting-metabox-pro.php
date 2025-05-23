<?php
/**
 * Function Custom meta box for Premium
 * 
 * @package Album and Image Gallery Plus Lightbox
 * @since 1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
} ?>

<!-- <div class="pro-notice"><strong><?php //echo sprintf( __( 'Utilize this <a href="%s" target="_blank">Premium Features (With Risk-Free 30 days money back guarantee)</a> to get best of this plugin with Annual or Lifetime bundle deal.', 'album-and-image-gallery-plus-lightbox'), AIGPL_PLUGIN_LINK_UNLOCK); ?></strong></div> -->

<!-- <div class="pro-notice">
	<strong>
		<?php // echo sprintf( __( 'Try All These <a href="%s" target="_blank">PRO Features in Essential Bundle Free For 5 Days.</a>', 'album-and-image-gallery-plus-lightbox'), AIGPL_PLUGIN_LINK_UNLOCK); ?>
	</strong>
</div> -->

<!-- <div class="aigpl-black-friday-banner-wrp">
	<a href="<?php // echo esc_url( AIGPL_PLUGIN_LINK_UNLOCK ); ?>" target="_blank"><img style="width: 100%;" src="<?php // echo esc_url( AIGPL_URL ); ?>assets/images/black-friday-banner.png" alt="black-friday-banner" /></a>
</div> -->

<strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'album-and-image-gallery-plus-lightbox'), AIGPL_PLUGIN_LINK_UNLOCK); ?></strong>

<table class="form-table aigpl-metabox-table">
	<tbody>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Layouts', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('7 ( Album Grid, Album Slider, Gallery Grid, Gallery Slider, Album with Reload Gallery, Gallery Masonry, Album Masonry ).', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Designs', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('15+. In lite version only one design.', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('WP Templating Features ', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('You can modify plugin html/designs in your current theme.', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Shortcode Generator ', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Play with all shortcode parameters with preview panel. No documentation required.' , 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Album Image with Popup', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Display Album image with popup on click.', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Album and Gallery Masonry Style', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Display Masonry style for Album and Gallery.', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Gallery Image Link', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Display custom link to gallery image.', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Drag & Drop Slide Order Change', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Arrange your desired slides with your desired order and display.' , 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Page Builder Support', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Gutenberg Block, Elementor, Bevear Builder, SiteOrigin, Divi, Visual Composer and Fusion Page Builder Support', 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>

		<tr class="aigpl-pro-feature">
			<th>
				<?php esc_html_e('Exclude Album and Exclude Some Categories', 'album-and-image-gallery-plus-lightbox'); ?><span class="aigpl-pro-tag"><?php esc_html_e('PRO','album-and-image-gallery-plus-lightbox');?></span>
			</th>
			<td>
				<span class="description"><?php esc_html_e('Do not display the album & Do not display the album for particular categories.' , 'album-and-image-gallery-plus-lightbox'); ?></span>
			</td>
		</tr>
	</tbody>
</table><!-- end .aigpl-metabox-table -->