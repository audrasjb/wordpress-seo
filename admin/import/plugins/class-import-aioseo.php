<?php
/**
 * @package WPSEO\Admin\Import\Plugins
 */

/**
 * Class with functionality to import Yoast SEO settings from All In One SEO.
 */
class WPSEO_Import_AIOSEO extends WPSEO_Plugin_Importer {
	/**
	 * @var string The plugin name
	 */
	protected $plugin_name = 'All In One SEO Pack';

	/**
	 * @var string Meta key, used in like clause for detect query.
	 */
	protected $meta_key = '_aioseop_%';

	/**
	 * Import All In One SEO meta values.
	 *
	 * @return bool Import success status.
	 */
	protected function import() {
		$status = $this->import_simple_metas();
		if ( $status ) {
			$this->import_opengraph();
			return true;
		}
		return false;
	}

	/**
	 * Imports the OpenGraph and Twitter settings for all posts.
	 *
	 * @return bool
	 */
	protected function import_opengraph() {
		$query_posts = new WP_Query( 'post_type=any&meta_key=_aioseop_opengraph_settings&order=ASC&fields=ids&nopaging=true' );

		if ( ! empty( $query_posts->posts ) ) {
			foreach ( array_values( $query_posts->posts ) as $post_id ) {
				$this->import_post_opengraph( $post_id );
			}
		}

		return true;
	}

	/**
	 * Imports the OpenGraph and Twitter settings for a single post.
	 *
	 * @param int $post_id Post ID.
	 */
	private function import_post_opengraph( $post_id ) {
		$meta = get_post_meta( $post_id, '_aioseop_opengraph_settings', true );
		$meta = unserialize( $meta );

		$import_keys = array(
			'aioseop_opengraph_settings_title'             => 'opengraph-title',
			'aioseop_opengraph_settings_desc'              => 'opengraph-description',
			'aioseop_opengraph_settings_customimg'         => 'opengraph-image',
			'aioseop_opengraph_settings_customimg_twitter' => 'twitter-image',
		);

		foreach ( $import_keys as $old_key => $new_key ) {
			$this->maybe_save_post_meta( $new_key, $meta[ $old_key ], $post_id );
		}
	}

	/**
	 * Imports the simple meta descriptions.
	 *
	 * @return bool Import success status.
	 */
	private function import_simple_metas() {
		$clone_keys = array(
			array(
				'old_key' => '_aioseop_description',
				'new_key' => 'metadesc',
			),
			array(
				'old_key' => '_aioseop_title',
				'new_key' => 'title',
			),
			array(
				'old_key' => '_aioseop_noindex',
				'new_key' => 'meta-robots-noindex',
				'convert' => array( 'on' => 1 ),
			),
			array(
				'old_key' => '_aioseop_nofollow',
				'new_key' => 'meta-robots-nofollow',
				'convert' => array( 'on' => 1 ),
			),
		);

		return $this->meta_keys_clone( $clone_keys );
	}
}
