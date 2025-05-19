<?php
/*
Plugin Name: Featured Users
Description: Display featured users with the Church role.
Version: 1.0
Author: Roia L Tembo
*/

function cf_enqueue_styles() {
    wp_enqueue_style('cf-featured-users-style', plugins_url('style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'cf_enqueue_styles');

function cf_add_admin_menu() {
    add_menu_page(
        'Church Featured Users',
        'Featured Church Users',
        'manage_options',
        'cf-featured-users',
        'cf_featured_users_page'
    );
}
add_action('admin_menu', 'cf_add_admin_menu');

function cf_featured_users_page() {
    $church_users = get_users(['role' => 'church']);
    ?>
    <div class="wrap">
        <h1>Featured Church Users</h1>
        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
            <?php wp_nonce_field('cf_featured_users_nonce', 'cf_nonce'); ?>
            <input type="hidden" name="action" value="cf_save_featured_status">
            <table class="widefat fixed" cellspacing="0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Church/Organization</th>
                        <th>Featured</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($church_users as $user) : ?>
                        <tr>
                            <td><?php echo esc_html($user->display_name); ?></td>
                            <td><?php echo esc_html(get_field('churchorganization_name', 'user_' . $user->ID)); ?></td>
                            <td><input type="checkbox" name="featured_users[]" value="<?php echo $user->ID; ?>" <?php checked(get_user_meta($user->ID, 'cf_featured', true), 'yes'); ?>></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><input type="submit" name="cf_save_featured" class="button button-primary" value="Save Changes"></p>
        </form>
    </div>
    <?php
}

function cf_save_featured_status() {
    if (isset($_POST['cf_nonce']) && wp_verify_nonce($_POST['cf_nonce'], 'cf_featured_users_nonce')) {
        $featured_users = !empty($_POST['featured_users']) ? $_POST['featured_users'] : [];
        $all_church_users = get_users(['role' => 'church']);
        foreach ($all_church_users as $user) {
            update_user_meta($user->ID, 'cf_featured', in_array($user->ID, $featured_users) ? 'yes' : 'no');
        }
        wp_redirect(admin_url('admin.php?page=cf-featured-users&updated=true'));
        exit;
    }
}
add_action('admin_post_cf_save_featured_status', 'cf_save_featured_status');

function cf_display_featured_users($atts) {
    $atts = shortcode_atts(
        [
            'columns' => 3,
            'all' => 'no'
        ],
        $atts
    );

    $columns = min(max(intval($atts['columns']), 1), 3);
    $all = strtolower($atts['all']) === 'yes';

    $args = ['role' => 'church'];
    if (!$all) {
        $args['meta_key'] = 'cf_featured';
        $args['meta_value'] = 'yes';
    }

    $users = get_users($args);

    ob_start();
    ?>
    <div class="cf-featured-users columns-<?php echo $columns; ?>">
        <?php foreach ($users as $user) : ?>
            <div class="cf-featured-user">
                <?php
                $cover_image_array = get_field('cover_image', 'user_' . $user->ID);
                $cover_image_url = isset($cover_image_array['url']) ? $cover_image_array['url'] : '';
                $organization_name = get_field('churchorganization_name', 'user_' . $user->ID);
                ?>
                <div class="cf-cover-image" style="background-image: url('<?php echo esc_url($cover_image_url); ?>');"></div>
                <h3>
                    <a href="<?php echo esc_url(home_url('/church/' . sanitize_title($organization_name) . '/')); ?>">
                        <?php echo esc_html($organization_name); ?>
                    </a>
                </h3>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('cf_featured_users', 'cf_display_featured_users');


add_shortcode('cf_featured_users', 'cf_display_featured_users');