<?php get_header(); ?>

<section class="l-container p-container">
    <main class="l-main p-main">
        <h2>メイン</h2>
        <h3>archive.php</h3>
        <!-- クエリ設定 -->
        <?php
        $queried_object = get_queried_object();
        $category_id = $queried_object->term_id;
        $taxonomy = $queried_object->taxonomy;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => 3,
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $category_id,
                )
            )
        );
        $my_query = new WP_Query($args);
        ?>

        <!-- /クエリ設定 -->
        <!-- loop処理 -->
        <?php if ($my_query->have_posts()) : ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <h3><?php the_title(); ?></h3>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <!-- /loop処理 -->

        <?php
        if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $my_query));
        }
        ?>

    </main>
    <aside class="l-sidebar p-sidebar">
        <!-- サイドバー読み込み -->
        <?php get_sidebar(); ?>
        <!-- /サイドバー読み込み -->
    </aside>
</section>

<?php get_footer(); ?>