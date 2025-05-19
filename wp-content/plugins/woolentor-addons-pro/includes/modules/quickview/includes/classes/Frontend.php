<?php
namespace WoolentorPro\Modules\QuickView;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontend class.
 */
class Frontend {

    /**
     * [$_instance]
     * @var null
     */
    private static $_instance = null;

    /**
     * [instance] Initializes a singleton instance
     * @return [Frontend]
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

	/**
     * Frontend constructor.
     */
    public function __construct() {

        // Set Builder Template
        add_filter( 'woolentor_quickview_tmp', [ $this, 'change_quickview_template' ], 10, 1 );
        
    }

    /**
     * Quick View Content Template
     */
    public function change_quickview_template( $template ){

        $template_id = method_exists( 'Woolentor_Template_Manager', 'get_template_id' ) ? \Woolentor_Template_Manager::instance()->get_template_id( 'productquickview', 'woolentor_get_option_pro' ) : '0';
        if( !empty( $template_id ) ){
            $template = MODULE_PATH.'/includes/templates/quickview-content.php';
        }
        return $template;

    }


}