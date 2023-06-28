<!-- function1 -->
<?php
// カテゴリー一覧を取得
$args = array(
    'taxonomy'     => 'category', // カテゴリータクソノミーのスラッグ
    'hide_empty'   => 0, // 空のカテゴリーも表示する場合は 0、非表示にする場合は 1
);
// $categories = get_terms($args);
$categories = get_categories($args);

if (!empty($categories)) {
    echo '<ul class="categories">';

    // カテゴリーごとにループ
    foreach ($categories as $category) {
        // カテゴリーのリンクを表示
        echo '<li class="categories-list"><a class="categories-link" href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '<span class="post-count">(' . $category->count . ')</span></li></a></li>';
    }

    echo '</ul>';
} else {
    echo 'カテゴリーがありません。';
}
?>
<!-- /function1 -->