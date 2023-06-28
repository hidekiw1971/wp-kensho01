<?php
/* CSSとJavaScriptの読み込み */
function my_script_init()
{ // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/styles.css', array(), '0.0.0');
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "0.0.0", true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '0.0.0', true);
    wp_enqueue_script('polyfill', '//polyfill.io/v3/polyfill.min.js?features=es6', "", "0.0.0", true);
    wp_enqueue_script('micromodal', '//unpkg.com/micromodal/dist/micromodal.min.js', "", "0.0.0", true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

// 記事内の最初の画像をアイキャッチ代わりに使う設定
function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];
    if (empty($first_img)) {
        // 記事内で画像がなかったときのためのデフォルト画像を指定
        $first_img = "/images/default.jpg";
    }
    return $first_img;
}
