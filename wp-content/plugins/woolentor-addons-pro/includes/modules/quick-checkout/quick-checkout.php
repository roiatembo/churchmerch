<?php
namespace Woolentor\Modules\QuickCheckout;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Quick_Checkout{

    /**
     * Enabled.
     */
    private static $_enabled = true;

    private static $_instance = null;

    /**
     * Get Instance
     */
    public static function instance( $enabled = true ){
        self::$_enabled = $enabled;
        if( is_null( self::$_instance ) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Class Constructor
     */
    public function __construct(){

        // Definded Constants
        $this->define_constants();

        // Include Nessary file
        $this->include();

        // initialize
        $this->init();

    }

    /**
     * Defined Required Constants
     *
     * @return void
     */
    public function define_constants(){
        define( 'Woolentor\Modules\QuickCheckout\MODULE_FILE', __FILE__ );
        define( 'Woolentor\Modules\QuickCheckout\MODULE_PATH', __DIR__ );
        define( 'Woolentor\Modules\QuickCheckout\TEMPLATE_PATH', MODULE_PATH. "/includes/templates/" );
        define( 'Woolentor\Modules\QuickCheckout\MODULE_URL', plugins_url( '', MODULE_FILE ) );
        define( 'Woolentor\Modules\QuickCheckout\MODULE_ASSETS', MODULE_URL . '/assets' );
        define( 'Woolentor\Modules\QuickCheckout\ENABLED', self::$_enabled );
    }

    /**
     * Load Required File
     *
     * @return void
     */
    public function include(){
        require_once( MODULE_PATH. "/includes/classes/Admin.php" );
        require_once( MODULE_PATH. "/includes/classes/Frontend.php" );
    }

    /**
     * What type of request is this?
     *
     * @param  string $type admin, ajax, cron or frontend.
     */
    private function is_request( $type ) {
        switch ( $type ) {
            case 'admin' :
                return is_admin();

            case 'ajax' :
                return defined( 'DOING_AJAX' );

            case 'rest' :
                return defined( 'REST_REQUEST' );

            case 'cron' :
                return defined( 'DOING_CRON' );

            case 'frontend' :
                return ( ! is_admin() || defined( 'DOING_AJAX' ) || ( ! empty( $_REQUEST['action'] ) && 'elementor' === $_REQUEST['action'] ) ) && ! defined( 'DOING_CRON' );
        }
    }

    /**
     * Module Initilize
     *
     * @return void
     */
    public function init(){
        // For Admin
        if ( $this->is_request( 'admin' ) ) {
            Admin::instance();
        }

        if( self::$_enabled ){
            // For Frontend
            if ( $this->is_request( 'frontend' ) ) {
                Frontend::instance();
            }
        }

    }


}

/**
 * Returns the instance.
 */
function woolentor_QuickCheckout( $enabled = true ) {
    return Quick_Checkout::instance( $enabled );
}