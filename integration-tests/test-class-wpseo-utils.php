<?php
/**
 * WPSEO plugin test file.
 *
 * @package WPSEO\Tests
 */

/**
 * Unit Test Class.
 */
class WPSEO_Utils_Test extends WPSEO_UnitTestCase {

	/**
	 * Tests whether a user is allowed to access the SEO configuration in various situations.
	 *
	 * @covers WPSEO_Utils::grant_access
	 */
	public function test_grant_access() {

		if ( ! is_multisite() ) { // Should be true when not running multisite.
			$this->assertTrue( WPSEO_Utils::grant_access() );
			return;
		}

		// Admin required by default/option.
		$user_id = $this->factory->user->create( [ 'role' => 'administrator' ] );
		wp_set_current_user( $user_id );
		$this->assertTrue( WPSEO_Utils::grant_access() );

		// Super Admin required by option.
		$options           = get_site_option( 'wpseo_ms' );
		$options['access'] = 'superadmin';
		update_site_option( 'wpseo_ms', $options );
		$this->assertFalse( WPSEO_Utils::grant_access() );

		grant_super_admin( $user_id );
		$this->assertTrue( WPSEO_Utils::grant_access() );

		// Below admin not allowed.
		$user_id = $this->factory->user->create( [ 'role' => 'editor' ] );
		wp_set_current_user( $user_id );
		$this->assertFalse( WPSEO_Utils::grant_access() );
	}

	/**
	 * Tests whether is_apache correctly returns if the site runs on apache.
	 *
	 * @covers WPSEO_Utils::is_apache
	 */
	public function test_wpseo_is_apache() {
		$_SERVER['SERVER_SOFTWARE'] = 'Apache/2.2.22';
		$this->assertTrue( WPSEO_Utils::is_apache() );

		$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.5.11';
		$this->assertFalse( WPSEO_Utils::is_apache() );
	}

	/**
	 * Tests whether is_apache correctly returns if the site runs on nginx.
	 *
	 * @covers WPSEO_Utils::is_nginx
	 */
	public function test_wpseo_is_nginx() {
		$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.5.11';
		$this->assertTrue( WPSEO_Utils::is_nginx() );

		$_SERVER['SERVER_SOFTWARE'] = 'Apache/2.2.22';
		$this->assertFalse( WPSEO_Utils::is_nginx() );
	}

	/**
	 * Tests whether trim_nbsp_from_string correctly strips no-break spaces.
	 *
	 * @covers WPSEO_Utils::trim_nbsp_from_string
	 */
	public function test_wpseo_trim_nbsp_from_string() {
		$old_string = ' This is an old string with&nbsp;as spaces.&nbsp;';
		$expected   = 'This is an old string with as spaces.';

		$this->assertEquals( $expected, WPSEO_Utils::trim_nbsp_from_string( $old_string ) );
	}

	/**
	 * Test the datetime with a valid date string.
	 *
	 * @covers WPSEO_Utils::is_valid_datetime
	 */
	public function test_is_valid_datetime_WITH_valid_datetime() {
		$this->assertTrue( WPSEO_Utils::is_valid_datetime( '2015-02-25T04:44:44+00:00' ) );
	}

	/**
	 * Test the datetime with an invalid date string.
	 *
	 * @covers WPSEO_Utils::is_valid_datetime
	 */
	public function test_is_valid_datetime_WITH_invalid_datetime() {
		$this->assertFalse( WPSEO_Utils::is_valid_datetime( '-0001-11-30T00:00:00+00:00' ) );
	}

	/**
	 * Tests translate_score function.
	 *
	 * @dataProvider translate_score_provider
	 * @covers       WPSEO_Utils::translate_score
	 *
	 * @param int    $score     The decimal score to translate.
	 * @param bool   $css_value Whether to return the i18n translated score or the CSS class value.
	 * @param string $expected  Expected function result.
	 */
	public function test_translate_score( $score, $css_value, $expected ) {
		$this->assertEquals( $expected, WPSEO_Utils::translate_score( $score, $css_value ) );
	}

	/**
	 * Provides test data for test_translate_score().
	 *
	 * @return array
	 */
	public function translate_score_provider() {
		return [
			[ 0, true, 'na' ],
			[ 1, true, 'bad' ],
			[ 23, true, 'bad' ],
			[ 40, true, 'bad' ],
			[ 41, true, 'ok' ],
			[ 55, true, 'ok' ],
			[ 70, true, 'ok' ],
			[ 71, true, 'good' ],
			[ 83, true, 'good' ],
			[ 100, true, 'good' ],
			[ 0, false, 'Not available' ],
			[ 1, false, 'Needs improvement' ],
			[ 23, false, 'Needs improvement' ],
			[ 40, false, 'Needs improvement' ],
			[ 41, false, 'OK' ],
			[ 55, false, 'OK' ],
			[ 70, false, 'OK' ],
			[ 71, false, 'Good' ],
			[ 83, false, 'Good' ],
			[ 100, false, 'Good' ],
		];
	}

	/**
	 * When current page is not in the list of Yoast SEO Free, is_yoast_seo_free_page() should return false.
	 *
	 * @covers WPSEO_Utils::is_yoast_seo_free_page
	 */
	public function test_current_page_not_in_yoast_seo_free_pages() {
		$current_page = '';

		$this->assertFalse( WPSEO_Utils::is_yoast_seo_free_page( $current_page ) );
	}

	/**
	 * When current page is not in the list of Yoast SEO Free, but is a page of one of the plugin' addons,
	 * the function should return false.
	 *
	 * @covers WPSEO_Utils::is_yoast_seo_free_page
	 */
	public function test_current_page_not_in_yoast_seo_free_pages_but_is_yoast_seo_addon_page() {
		$current_page = 'wpseo_news';

		$this->assertFalse( WPSEO_Utils::is_yoast_seo_free_page( $current_page ) );
	}

	/**
	 * When the current page belongs to Yoast SEO Free, the function is_yoast_seo_free_page() should return true.
	 *
	 * @covers WPSEO_Utils::is_yoast_seo_free_page
	 */
	public function test_current_page_in_yoast_seo_free_pages() {
		$current_page = 'wpseo_dashboard';

		$this->assertTrue( WPSEO_Utils::is_yoast_seo_free_page( $current_page ) );
	}

	/**
	 * Tests whether the plugin is network-active or not.
	 *
	 * @covers WPSEO_Utils::is_plugin_network_active
	 */
	public function test_is_plugin_network_active() {
		$this->assertFalse( WPSEO_Utils::is_plugin_network_active() );
	}

	/**
	 * Tests the retrieve enabled features function without the defined variable or filter.
	 *
	 * @covers WPSEO_Utils::retrieve_enabled_features
	 */
	public function test_retrieve_enabled_features_without_define_or_filter() {
		$this->assertEmpty( WPSEO_Utils::retrieve_enabled_features() );
	}

	/**
	 * Tests the retrieve enabled features function with defined variables.
	 *
	 * @covers WPSEO_Utils::retrieve_enabled_features
	 */
	public function test_retrieve_enabled_features_with_define() {
		// Retrieve currently defined feature flags. Set them if they do not exist yet.
		if ( ! defined( 'YOAST_SEO_ENABLED_FEATURES' ) ) {
			define( 'YOAST_SEO_ENABLED_FEATURES', 'some-feature' );
		}
		$expected = preg_split( '/,\W*/', YOAST_SEO_ENABLED_FEATURES );
		$this->assertEquals( $expected, WPSEO_Utils::retrieve_enabled_features() );
	}

	/**
	 * Tests the retrieve enabled features function with filter.
	 *
	 * @covers WPSEO_Utils::retrieve_enabled_features
	 */
	public function test_retrieve_enabled_features_with_filter() {
		// Retrieve currently defined feature flags. Set them if they do not exist yet.
		if ( ! defined( 'YOAST_SEO_ENABLED_FEATURES' ) ) {
			define( 'YOAST_SEO_ENABLED_FEATURES', 'some-feature' );
		}
		$expected = preg_split( '/,\W*/', YOAST_SEO_ENABLED_FEATURES );

		// Features we expect to be added by the filter.
		$added_features = [ 'some functionality', 'other things' ];
		// Expected features are the ones in the PHP constant + the features added by the filter.
		$expected = array_merge( $expected, $added_features );

		add_filter( 'wpseo_enable_feature', [ $this, 'filter_wpseo_enable_feature' ] );
		$this->assertEquals( $expected, WPSEO_Utils::retrieve_enabled_features() );
	}

	/**
	 * Filter function to test the `wpseo_enable_feature` filter.
	 *
	 * @param string[] $enabled_features The unfiltered enabled features.
	 *
	 * @return array The filtered enabled features.
	 */
	public function filter_wpseo_enable_feature( $enabled_features ) {
		$second_array = [
			'some functionality',
			'other things',
		];

		return array_merge( $enabled_features, $second_array );
	}
}
