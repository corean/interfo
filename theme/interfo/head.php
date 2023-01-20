<?php
if (!defined('_GNUBOARD_')) {exit;} // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<header id="header">
    <?php include_once(G5_THEME_PATH.'/1_header.php') ?>
</header>

<!-- 콘텐츠 시작 { -->
<div id="wrapper" class="mt-5">
    <div class="container">

        <?php if (!defined("_INDEX_")) : ?>
        <div class="section-title">
            <h2><?php echo get_head_title($g5['title']); ?></h2>
        </div>
        <?php endif; ?>