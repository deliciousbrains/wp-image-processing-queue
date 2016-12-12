<?php
/**
 * Get image HTML for a specific context in a theme, specifying the exact sizes
 * for the image. The first image size is always used as the `src` and the other
 * sizes are used in the `srcset` if they're the same aspect ratio as the original
 * image. If any of the image sizes don't currently exist, they are queued for
 * creation by a background process. Example:
 *
 * echo ipq_get_theme_image( 1353, array(
 *         array( 600, 400, false ),
 *         array( 1280, 720, false ),
 *         array( 1600, 1067, false ),
 *     ),
 * 	   array(
 *         'class' => 'header-banner'
 *     )
 * );
 *
 * @param int    $post_id Image attachment ID.
 * @param array  $sizes   Array of arrays of sizes in the format array(width,height,crop).
 * @param string $attr    Optional. Attributes for the image markup. Default empty.
 * @return string HTML img element or empty string on failure.
 */
function ipq_get_theme_image( $post_id, $sizes, $attr = '' ) {
	return Image_Processing_Queue::instance()->get_image( $post_id, $sizes, $attr );
}
