<?php
/**
 * Admin taxonomy terms HTML content
 *
 * @author		Nir Goldberg
 * @package		includes/admin/views
 * @version		1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// extract args
extract( $args );

// get main site taxonomy terms
$main_terms		= mstaxsync_get_custom_taxonomy_terms( $tax, true );

// get local site taxonomy terms
$local_terms	= mstaxsync_get_custom_taxonomy_terms( $tax );

?>

<div class="mstaxsync-taxonomy-terms-box">

	<div class="mstaxsync-relationship" data-name="<?php echo $tax->name; ?>">
		<div class="selection">

			<div class="choices">
				<div class="title">

					<h3><?php _e( 'Main site', 'mstaxsync' ); ?></h3>
					<p class="desc"><?php _e( 'Select terms to sync', 'mstaxsync' ); ?></p>

				</div>

				<ul class="list choices-list">

					<?php if ( ! is_wp_error( $main_terms ) ) :

						if ( $main_terms ) {

							$main_terms_hierarchically = array();
							mstaxsync_sort_terms_hierarchically( $main_terms, $main_terms_hierarchically );
							mstaxsync_display_terms_hierarchically( $main_terms_hierarchically, 'choice' );

						}
						else { ?>

							<p class="no-terms"><?php printf( __( 'There are no %s defined in main site', 'mstaxsync' ), $tax->label ); ?></p>

						<?php }

					endif; ?>

				</ul>
			</div><!-- .choices -->

			<div class="values">
				<div class="title">

					<h3><?php _e( 'Local site', 'mstaxsync' ); ?></h3>
					<p class="desc"><?php _e( 'Sort and edit terms', 'mstaxsync' ); ?></p>

				</div>

				<ul class="list values-list">

					<?php if ( ! is_wp_error( $local_terms ) && $local_terms ) :

						$local_terms_hierarchically = array();
						mstaxsync_sort_terms_hierarchically( $local_terms, $local_terms_hierarchically );
						mstaxsync_display_terms_hierarchically( $local_terms_hierarchically, 'value' );

					endif; ?>

				</ul>
			</div><!-- .values -->

		</div>
	</div><!-- .mstaxsync-relationship -->

</div><!-- .mstaxsync-taxonomy-terms-box -->