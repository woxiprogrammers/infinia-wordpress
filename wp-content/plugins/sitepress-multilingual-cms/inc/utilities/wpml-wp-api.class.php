<?php

class WPML_WP_API {

	/**
	 * Wrapper for \get_option
	 *
	 * @param string     $option
	 * @param bool|false $default
	 *
	 * @return mixed|void
	 */
	public function get_option( $option, $default = false ) {

		return get_option( $option, $default );
	}

	/**
	 * Wrapper for \get_term_link
	 *
	 * @param  object|int|string $term
	 * @param string             $taxonomy
	 *
	 * @return string|WP_Error
	 */
	public function get_term_link( $term, $taxonomy = '' ) {

		return get_term_link( $term, $taxonomy );
	}

	/**
	 * Wrapper for \get_post_type_archive_link
	 *
	 * @param string $post_type
	 *
	 * @return string
	 */
	public function get_post_type_archive_link( $post_type ) {

		return get_post_type_archive_link( $post_type );
	}

	/**
	 * Wrapper for \get_day_link
	 *
	 * @param int $year
	 * @param int $month
	 * @param int $day
	 *
	 * @return string
	 */
	public function get_day_link( $year, $month, $day ) {

		return get_day_link( $year, $month, $day );
	}

	/**
	 * Wrapper for \get_month_link
	 *
	 * @param int $year
	 * @param int $month
	 *
	 * @return string
	 */
	public function get_month_link( $year, $month ) {

		return get_month_link( $year, $month );
	}

	/**
	 * Wrapper for \get_year_link
	 *
	 * @param int $year
	 *
	 * @return string
	 */
	public function get_year_link( $year ) {

		return get_year_link( $year );
	}

	/**
	 * Wrapper for \get_author_posts_url
	 *
	 * @param int    $author_id
	 * @param string $author_nicename
	 *
	 * @return string
	 */
	public function get_author_posts_url( $author_id, $author_nicename = '' ) {

		return get_author_posts_url( $author_id, $author_nicename );
	}

	/**
	 * Wrapper for \get_post_type
	 *
	 * @param null|int|WP_Post $post
	 *
	 * @return false|string
	 */
	public function get_post_type( $post = null ) {

		return get_post_type( $post );
	}

	public final function get_tm_url( $tab = null, $hash = null ) {
		$tm_url = menu_page_url(WPML_TM_FOLDER . '/menu/main.php', false);

		$query_vars = array();
		if ( $tab ) {
			$query_vars[ 'sm' ] = $tab;
		}

		$tm_url = add_query_arg( $query_vars, $tm_url );

		if ( $hash ) {
			if ( strpos( $hash, '#' ) !== 0 ) {
				$hash = '#' . $hash;
			}
			$tm_url .= $hash;
		}

		return $tm_url;
	}

	public final function is_jobs_tab() {
		return $this->is_tm_page( 'jobs' );
	}

	public final function is_tm_page( $tab = null ) {
		$result = is_admin()
							&& isset( $_GET[ 'page' ] )
							&& $_GET[ 'page' ] == WPML_TM_FOLDER . '/menu/main.php';

		if ( $tab ) {
			if ( $tab == 'dashboard' && ! isset( $_GET[ 'sm' ] ) ) {
				$result = $result && true;
			} else {
				$result = $result && isset( $_GET[ 'sm' ] ) && $_GET[ 'sm' ] == $tab;
			}
		}

		return $result;
	}

	public final function is_troubleshooting_page() {
		return $this->is_core_page( 'troubleshooting.php' );
	}

	public final function is_core_page( $page ) {
		$result = is_admin()
							&& isset( $_GET[ 'page' ] )
							&& $_GET[ 'page' ] == ICL_PLUGIN_FOLDER . '/menu/' . $page;

		return $result;
	}

	public final function is_back_end() {
		return is_admin() && ! $this->is_ajax() && ! $this->is_cron_job();
	}

	public final function is_ajax() {
		return defined( 'DOING_AJAX' ) && DOING_AJAX;
	}

	public final function is_cron_job() {
		return defined( 'DOING_CRON' ) && DOING_CRON;
	}

	public final function is_heartbeat() {
		$action = filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING );

		return $action == 'heartbeat';
	}

	/**
	 * Wrapper for \is_feed that returns false if called before the loop
	 *
	 * @param string $feeds
	 *
	 * @return bool
	 */
	public function is_feed( $feeds = '' ) {
		global $wp_query;

		return isset( $wp_query ) && is_feed( $feeds );
	}

	/**
	 * Wrapper for \wp_update_term_count
	 *
	 * @param  int[]     $terms given by their term_taxonomy_ids
	 * @param  string    $taxonomy
	 * @param bool|false $do_deferred
	 *
	 * @return bool
	 */
	function wp_update_term_count( $terms, $taxonomy, $do_deferred = false ) {

		return wp_update_term_count( $terms, $taxonomy, $do_deferred );
	}

	/**
	 * Wrapper for \get_taxonomy
	 *
	 * @param string $taxonomy
	 *
	 * @return bool|object
	 */
	function get_taxonomy( $taxonomy ) {

		return get_taxonomy( $taxonomy );
	}

	/**
	 * Wrapper for \wp_set_object_terms
	 *
	 * @param int              $object_id The object to relate to.
	 * @param array|int|string $terms     A single term slug, single term id, or array of either term slugs or ids.
	 *                                    Will replace all existing related terms in this taxonomy.
	 * @param string           $taxonomy  The context in which to relate the term to the object.
	 * @param bool             $append    Optional. If false will delete difference of terms. Default false.
	 *
	 * @return array|WP_Error Affected Term IDs.
	 */
	function wp_set_object_terms( $object_id, $terms, $taxonomy, $append = false ) {

		return wp_set_object_terms( $object_id, $terms, $taxonomy, $append );
	}

	/**
	 * Wrapper for \get_post_types
	 *
	 * @param array  $args
	 * @param string $output
	 * @param string $operator
	 *
	 * @return array
	 */
	function get_post_types( $args = array(), $output = 'names', $operator = 'and' ) {

		return get_post_types( $args, $output, $operator );
	}

	function wp_send_json( $response ) {
		wp_send_json( $response );

		return $response;
	}

	function wp_send_json_success( $data = null ) {
		wp_send_json_success( $data );

		return $data;
	}

	function wp_send_json_error( $data = null ) {
		wp_send_json_error( $data );

		return $data;
	}

	/**
	 * Wrapper for \get_current_user_id
	 * @return int
	 */
	function get_current_user_id() {

		return get_current_user_id();
	}

	/**
	 * Wrapper for \get_post
	 *
	 * @param null|int|WP_Post $post
	 * @param string           $output
	 * @param string           $filter
	 *
	 * @return array|null|WP_Post
	 */
	function get_post( $post = null, $output = OBJECT, $filter = 'raw' ) {

		return get_post( $post, $output, $filter );
	}

	/**
	 * Wrapper for \get_permalink
	 *
	 * @param int        $id
	 * @param bool|false $leavename
	 *
	 * @return bool|string
	 */
	function get_permalink( $id = 0, $leavename = false ) {

		return get_permalink( $id, $leavename );
	}

	/**
	 * Wrapper for \wp_mail
	 *
	 * @param string       $to
	 * @param string       $subject
	 * @param string       $message
	 * @param string|array $headers
	 * @param array|array  $attachments
	 *
	 * @return bool
	 */
	function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() ) {

		return wp_mail( $to, $subject, $message, $headers, $attachments );
	}

	/**
	 * Wrapper for \get_post_custom
	 *
	 * @param int $post_id
	 *
	 * @return array
	 */
	function get_post_custom( $post_id = 0 ) {

		return get_post_custom( $post_id );
	}

	function is_dashboard_tab() {
		return $this->is_tm_page( 'dashboard' );
	}

	public function wp_safe_redirect( $redir_target, $status = 302 ) {
		wp_safe_redirect( $redir_target, $status );
		exit;
	}
}