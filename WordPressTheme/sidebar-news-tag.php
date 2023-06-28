<!-- 投稿タイプ（post）タグ一覧表示 -->
<h4>タグ一覧</h4>
<?php
$tags = get_terms(array(
    // 'taxonomy' => 'post_tag',
    'taxonomy' => 'news-tag',
    'hide_empty' => false,
));
if ($tags) {
    echo '<ul>';
    foreach ($tags as $tag) {
        $tag_link = get_term_link($tag);
        // タグに関連する投稿数を取得
        $tag_count = $tag->count;
        echo '<li><a href="' . $tag_link . '">' . $tag->name . ' (' . $tag_count . ')</a></li>';
    }
    echo '</ul>';
}
?>
<!-- /投稿タイプ（post）タグ一覧表示 -->