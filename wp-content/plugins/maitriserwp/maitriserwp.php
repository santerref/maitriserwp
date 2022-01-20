<?php
/**
 * Plugin Name:       Maitriser WP
 * Plugin URI:        https://maitriserwp.com/
 * Description:       Plugin pour le live du 19 janvier 2022.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Author:            Francis Santerre
 * Author URI:        https://santerref.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       maitriserwp
 * Domain Path:       /languages
 */

if ( ! class_exists( 'Maitriser_Wp_Plugin' ) && ! function_exists( 'maitriserwp' ) ) {

	class Maitriser_Wp_Plugin {
		public function __construct() {
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'options_page' ) );
		}

		public function admin_init() {
			register_setting( 'maitriserwp', 'maitriserwp_nom_complet' );
		}

		public function options_page() {
			add_menu_page(
				__( 'Maitriser WP', 'maitriserwp' ),
				__( 'Maitriser WP', 'maitriserwp' ),
				'manage_options',
				'maitriserwp',
				array( $this, 'admin_page' )
			);
		}

		public function admin_page() {
			settings_errors();
			?>
            <div class="wrap">
                <h1>Maitriser WP</h1>
                <form action="options.php" method="post">
					<?php settings_fields( 'maitriserwp' ); ?>
					<?php do_settings_sections( 'maitriserwp' ); ?>

                    <table class="form-table" role="presentation">

                        <tbody>
                        <tr>
                            <th scope="row"><label for="maitriserwp_nom_complet">Nom complet</label></th>
                            <td><input name="maitriserwp_nom_complet" type="text" id="maitriserwp_nom_complet"
                                       value="<?php esc_attr_e( get_option( 'maitriserwp_nom_complet' ) ) ?>"
                                       class="regular-text">
                            </td>
                        </tr>
                        </tbody>
                    </table>
					<?php submit_button( 'Enregistrer' ); ?>
            </div>
			<?php
		}
	}

	function maitriserwp() {
		static $plugin;

		if ( ! isset( $plugin ) ) {
			$plugin = new Maitriser_Wp_Plugin();
		}

		return $plugin;
	}

	maitriserwp();

}
