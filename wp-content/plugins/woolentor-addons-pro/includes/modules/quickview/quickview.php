<?php
namespace WoolentorPro\Modules\QuickView;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Quick_View{

    private static $_instance = null;

    /**
     * Get Instance
     */
    public static function instance(){
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
        define( 'WoolentorPro\Modules\QuickView\MODULE_PATH', __DIR__ );
        define( 'WoolentorPro\Modules\QuickView\WIDGETS_PATH', MODULE_PATH. "/includes/widgets" );
        define( 'WoolentorPro\Modules\QuickView\BLOCKS_PATH', MODULE_PATH. "/includes/blocks" );
    }

    /**
     * Load Required File
     *
     * @return void
     */
    public function include(){
        require_once( MODULE_PATH. "/includes/classes/Frontend.php" );
        require_once( MODULE_PATH. "/includes/classes/Widgets_And_Blocks.php" );
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

        // For Frontend
        if ( $this->is_request( 'frontend' ) ) {
            Frontend::instance();
        }

        // Register Widget and blocks
        Widgets_And_Blocks::instance();
        

    }


}
Quick_View::instance();
