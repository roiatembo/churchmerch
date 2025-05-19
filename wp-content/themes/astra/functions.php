<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {function modify_menu_item($items, $args) {
    // Check if the user is logged in
    if (is_user_logged_in()) {
        // Find the menu item with the class "menu-item-379"
        foreach ($items as $item) {
            if (in_array('menu-item-379', $item->classes)) {
                // Change the title and URL
                $item->title = 'Sign Out';
                $item->url = wp_logout_url(home_url()); // Logout URL, redirecting to the homepage
            }
        }
    } else {
        // If user is logged out, keep default behavior
        foreach ($items as $item) {
            if (in_array('menu-item-379', $item->classes)) {
                // Ensure it's set to "Sign In" (optional, in case it's dynamic elsewhere)
                $item->title = 'Sign In';
                $item->url = wp_login_url(); // Default login URL
            }
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'modify_menu_item', 10, 2);

	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.8.3' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.8.2' );

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_PRO_UPGRADE_URL', astra_get_pro_url( 'https://wpastra.com/pricing/', 'dashboard', 'free-theme', 'dashboard' ) );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', astra_get_pro_url( 'https://wpastra.com/pricing/', 'customizer', 'free-theme', 'upgrade' ) );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

// Add 'Church' role
function add_church_role() {
    add_role(
        'church',
        __( 'Church' ),
        [
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
        ]
    );
}
add_action('init', 'add_church_role');



// function add_church_role_capabilities() {
//     $role = get_role('church');
//     if ($role) {
//         $role->add_cap('edit_products');
//         $role->add_cap('publish_products');
//         $role->add_cap('edit_published_products');
//         $role->add_cap('delete_published_products');
//     }
// }
// add_action('init', 'add_church_role_capabilities');

function restrict_church_role_products($query) {
    // Restrict only in the admin area for 'product' post type and main query
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'product') {
        if (current_user_can('church')) {
            // Restrict users with 'church' role to only see their products
            $query->set('author', get_current_user_id());
        }
        // Only allow administrators to see all products
        elseif (!current_user_can('administrator')) {
            // Hide products from other roles if needed
            $query->set('author', 0); // Sets an invalid author to return empty results for unauthorized users
        }
    }
}
add_action('pre_get_posts', 'restrict_church_role_products');

// Modify the count queries to show correct counts for 'church' users
function adjust_product_counts($views) {
    if (current_user_can('church')) {
        global $wpdb;

        // Get the current user ID
        $current_user_id = get_current_user_id();

        // Count products authored by the current user
        $total = $wpdb->get_var("SELECT COUNT(ID) FROM {$wpdb->posts} WHERE post_type = 'product' AND post_author = $current_user_id AND post_status IN ('publish', 'draft', 'pending')");
        $published = $wpdb->get_var("SELECT COUNT(ID) FROM {$wpdb->posts} WHERE post_type = 'product' AND post_author = $current_user_id AND post_status = 'publish'");

        // Update counts for "All" and "Published" views
        if (isset($views['all'])) {
            $views['all'] = preg_replace('/\(.+\)/', "($total)", $views['all']);
        }
        if (isset($views['publish'])) {
            $views['publish'] = preg_replace('/\(.+\)/', "($published)", $views['publish']);
        }
    }

    return $views;
}
add_filter('views_edit-product', 'adjust_product_counts');


function filter_church_role_orders($query) {
    if (is_admin() && current_user_can('church') && $query->is_main_query() && $query->get('post_type') === 'shop_order') {
        $current_user_id = get_current_user_id();
        
        $query->set('meta_query', array(
            array(
                'key' => '_product_creator',
                'value' => $current_user_id,
                'compare' => '='
            )
        ));
    }
}
add_action('pre_get_posts', 'filter_church_role_orders');

// Add custom column
function add_created_by_column($columns) {
    $columns['created_by'] = __('Created By', 'your-text-domain');
    return $columns;
}
add_filter('manage_edit-product_columns', 'add_created_by_column');

// Populate the custom column with ACF field data
function display_created_by_column($column, $post_id) {
    if ($column === 'created_by') {
        $author_id = get_post_field('post_author', $post_id);
        
        // Retrieve organization name from ACF field
        $organization = get_field('churchorganization_name', 'user_' . $author_id);
        
        echo esc_html($organization);
    }
}
add_action('manage_product_posts_custom_column', 'display_created_by_column', 10, 2);


// Save product creator's ID in order metadata
function save_product_creator_to_order($item, $cart_item_key, $values, $order) {
    $product_id = $values['product_id'];
    $product_author_id = get_post_field('post_author', $product_id);

    $item->add_meta_data('_product_creator', $product_author_id, true);
}
add_action('woocommerce_checkout_create_order_line_item', 'save_product_creator_to_order', 10, 4);

// Remove SKU and Tags columns from products table
function remove_sku_and_tags_columns($columns) {
    unset($columns['sku']); // Remove SKU column
    unset($columns['product_tag']); // Remove Tags column
    return $columns;
}
add_filter('manage_edit-product_columns', 'remove_sku_and_tags_columns');

// Redirect "Church" role users to the WordPress dashboard on login
function church_role_login_redirect($redirect_to, $request, $user) {
    // Check if the user is logged in and has the "Church" role
    if (isset($user->roles) && is_array($user->roles) && in_array('church', $user->roles)) {
        // Redirect Church role users to the WordPress dashboard
        return admin_url();
    }
    return $redirect_to;
}
add_filter('login_redirect', 'church_role_login_redirect', 10, 3);


function hide_latest_deals_category($terms, $taxonomies, $args) {
    // Check if the user is not an admin
    if (!current_user_can('administrator')) {
        foreach ($terms as $key => $term) {
            // Check if the term slug is 'latest-deals'
            if ($term->slug === 'latest-deals') {
                unset($terms[$key]); // Remove it from the list
            }
        }
    }
    return $terms;
}
add_filter('get_terms', 'hide_latest_deals_category', 10, 3);

function custom_rewrite_rules() {
    add_rewrite_rule(
        '^church/([^/]*)/?$',  // Regex for matching URLs like /church/{username}
        'index.php?church_profile=$matches[1]',  // Sets a query variable `church_profile`
        'top'
    );
}
add_action('init', 'custom_rewrite_rules');

function add_query_vars($vars) {
    $vars[] = 'church_profile';  // Register the custom query variable
    return $vars;
}
add_filter('query_vars', 'add_query_vars');

function church_profile_template($template) {
    // Check if `church_profile` query variable is set
    $church_profile = get_query_var('church_profile');
    if ($church_profile) {
        return locate_template('church-profile.php');  // Load custom template
    }
    return $template;
}
add_filter('template_include', 'church_profile_template');

function enqueue_custom_styles() {
    wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/custom.css', [], '1.0', 'all');
}
 add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
add_action('woocommerce_process_product_meta', 'save_post_author_meta');
function save_post_author_meta($post_id) {
    if (isset($_POST['created_by']) && !empty($_POST['created_by'])) {
        // Update the post author
        $author_id = sanitize_text_field($_POST['created_by']);
        wp_update_post([
            'ID'          => $post_id,
            'post_author' => $author_id,
        ]);
    }
}

add_action('woocommerce_product_options_general_product_data', 'add_post_author_dropdown');
function add_post_author_dropdown() {
    global $post;

    $saved_user_id = $post->post_author; // Get the current post's author

    $args = array(
        'role'    => 'church',
        'orderby' => 'display_name',
        'order'   => 'ASC'
    );
    $church_users = get_users($args);

    echo '<div class="options_group">';
    echo '<p class="form-field">';
    echo '<label for="created_by">Created by</label>';
    echo '<select name="created_by" id="created_by">';
    echo '<option value="">Select a user</option>';

    foreach ($church_users as $user) {
        // Get the brand name from ACF field
        $brand_name = get_field('churchorganization_name', 'user_' . $user->ID);

        // Fallback to username if brand name doesn't exist
        $display_name = $brand_name ? $brand_name : $user->display_name;

        $selected = selected($saved_user_id, $user->ID, false);
        echo '<option value="' . esc_attr($user->ID) . '"' . $selected . '>' . esc_html($display_name) . '</option>';
    }

    echo '</select>';
    echo '</p>';
    echo '</div>';
}

add_action('admin_menu', 'custom_hide_menu_items_for_church', 999);

function custom_hide_menu_items_for_church() {
    // Get the current user's role
    if (!current_user_can('church')) {
        return; // Exit if the user does not have the 'church' role
    }

    // Add WooCommerce menus explicitly to hide
    remove_submenu_page('woocommerce', 'wc-admin&path=/'); // Hide "Home"
    remove_submenu_page('woocommerce', 'wc-settings');    // Hide "Settings"
    remove_submenu_page('woocommerce', 'wc-status');      // Hide "Status"

    // Remove WooCommerce Product submenus
    remove_submenu_page('edit.php?post_type=product', 'edit-tags.php?taxonomy=product_cat&post_type=product'); // Hide "Categories"
    remove_submenu_page('edit.php?post_type=product', 'edit-tags.php?taxonomy=product_tag&post_type=product'); // Hide "Tags"
    remove_submenu_page('edit.php?post_type=product', 'product_attributes');                                  // Hide "Attributes"
}



// // function modify_menu_item($items, $args) {
//     // Check if the user is logged in
//     if (is_user_logged_in()) {
//         // Find the menu item with the class "menu-item-379"
//         foreach ($items as $item) {
//             if (in_array('menu-item-379', $item->classes)) {
//                 // Change the title and URL
//                 $item->title = 'Sign Out';
//                 $item->url = wp_logout_url(home_url()); // Logout URL, redirecting to the homepage
//             }
//         }
//     } else {
//         // If user is logged out, keep default behavior
//         foreach ($items as $item) {
//             if (in_array('menu-item-379', $item->classes)) {
//                 // Ensure it's set to "Sign In" (optional, in case it's dynamic elsewhere)
//                 $item->title = 'Sign In';
//                 $item->url = wp_login_url(); // Default login URL
//             }
//         }
//     }
//     return $items;
// }
// add_filter('wp_nav_menu_objects', 'modify_menu_item', 10, 2);
