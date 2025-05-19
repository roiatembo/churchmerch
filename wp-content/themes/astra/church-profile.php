<?php
/*
Template Name: Church Profile
*/

get_header();

$church_profile = sanitize_title(get_query_var('church_profile')); // Convert URL slug to slug format

// Query users with the `churchorganization_name` field matching the slug
$user_query = new WP_User_Query([
    'meta_key' => 'churchorganization_name',
]);

$users = $user_query->get_results();
$matched_user = null;

if (!empty($users)) :
    foreach ($users as $user) {
        $organization_name = get_field('churchorganization_name', 'user_' . $user->ID);
        $organization_slug = sanitize_title($organization_name);

        if ($organization_slug === $church_profile) {
            $matched_user = $user;
            break;
        }
    }
endif;

if ($matched_user) :
    $organization_name = get_field('churchorganization_name', 'user_' . $matched_user->ID);
    $cover_image = get_field('cover_image', 'user_' . $matched_user->ID);
    $background_image = $cover_image ? $cover_image['url'] : '';

    // Hero section
    ?>
<div class="main">
    <div class="church-hero-section" style="background-image: url('<?php echo esc_url($background_image); ?>'); min-height: 76vh; background-size: cover; background-position: center;">
        <div class="church-hero-content">
            <h1><?php echo esc_html($organization_name); ?></h1>
        </div>
    </div>

    <?php
    // Products Query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $product_args = [
        'post_type'      => 'product',
        'author'         => $matched_user->ID,
        'posts_per_page' => 12,
        'paged'          => $paged,
    ];
    $product_query = new WP_Query($product_args);

    if ($product_query->have_posts()) :
        ?>
        <div class="product-grid">
            <?php
            while ($product_query->have_posts()) : $product_query->the_post();
                $product_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $product = wc_get_product(get_the_ID()); // Get WooCommerce product object
                $price = $product->get_price_html(); // Get the formatted price
                
                // Check if the product is on sale
                $is_on_sale = $product->is_on_sale();
                ?>
                <div class="the-product">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ($is_on_sale) : ?>
                            <span class="sale-badge">Sale</span> <!-- Sale badge -->
                        <?php endif; ?>
                        <img src="<?php echo esc_url($product_image); ?>" alt="<?php the_title(); ?>">
                        <h2><?php the_title(); ?></h2>
                        <p class="product-price"><?php echo $price; ?></p> <!-- Display the price -->
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
        
        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links([
                'total'   => $product_query->max_num_pages,
                'current' => $paged,
            ]);
            ?>
        </div>
</div>

        <?php
    else :
        echo "<p>No products found for this organization.</p>";
    endif;
    wp_reset_postdata();
else :
    echo "<p>Profile not found.</p>";
endif;

get_footer();
