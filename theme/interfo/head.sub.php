<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (! defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (! isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
} else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array($g5['title'], $config['cf_title'])));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (! $g5['lo_location']) {
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
}
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') {
    $g5['lo_url'] = '';
}

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?><!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $config['cf_title'] ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta name="description"
          content="OUR BUSNIESS AR / VR 메타버스 응용소프트웨어 개발 홈페이지 디지털북 인터포에 오신것을 환영합니다. Metaverse · Smart Tour · AR/VR · Edu Tech · IOT · Web Solution 포트폴리오 영상 더보기 https://www.youtube.com/watch?v=CB226Np_koI PORTFOLIO 경기대진TP 홈페이지 경기가구인증센터 홈페이지 삽당령 힐링캠프 홈페이지 한국삐아제 홈페이지 한국삐아제-책별 홈페이지 삼척시 마을아카이브 홈페이지 가톨릭관동대학교 박물관 홈페이지 디아이 홈페이지 강릉원주대학교"/>
    <meta name="robots" content="max-image-preview:large"/>
    <link rel="canonical" href="http://www.interfo.com/"/>
    <meta property="og:locale" content="ko_KR"/>
    <meta property="og:site_name" content="(주)인터포 - 메타버스 플랫폼, AR콘텐츠 개발"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="INTERFO - (주)인터포"/>
    <meta property="og:description"
          content="OUR BUSNIESS AR / VR 메타버스 응용소프트웨어 개발 홈페이지 디지털북 인터포에 오신것을 환영합니다. Metaverse · Smart Tour · AR/VR · Edu Tech · IOT · Web Solution 포트폴리오 영상 더보기 https://www.youtube.com/watch?v=CB226Np_koI PORTFOLIO 경기대진TP 홈페이지 경기가구인증센터 홈페이지 삽당령 힐링캠프 홈페이지 한국삐아제 홈페이지 한국삐아제-책별 홈페이지 삼척시 마을아카이브 홈페이지 가톨릭관동대학교 박물관 홈페이지 디아이 홈페이지 강릉원주대학교"/>
    <meta property="og:url" content="http://www.interfo.com/"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="INTERFO - (주)인터포"/>
    <meta name="twitter:description"
          content="OUR BUSNIESS AR / VR 메타버스 응용소프트웨어 개발 홈페이지 디지털북 인터포에 오신것을 환영합니다. Metaverse · Smart Tour · AR/VR · Edu Tech · IOT · Web Solution 포트폴리오 영상 더보기 https://www.youtube.com/watch?v=CB226Np_koI PORTFOLIO 경기대진TP 홈페이지 경기가구인증센터 홈페이지 삽당령 힐링캠프 홈페이지 한국삐아제 홈페이지 한국삐아제-책별 홈페이지 삼척시 마을아카이브 홈페이지 가톨릭관동대학교 박물관 홈페이지 디아이 홈페이지 강릉원주대학교"/>

    <!-- 파비콘 -->
    <link rel="icon" href="/wp-content/uploads/2022/04/cropped-파비콘-32x32.png" sizes="32x32" />
    <link rel="icon" href="/wp-content/uploads/2022/04/cropped-파비콘-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="/wp-content/uploads/2022/04/cropped-파비콘-180x180.png" />
    <meta name="msapplication-TileImage" content="/wp-content/uploads/2022/04/cropped-파비콘-270x270.png" />

    <!-- Vendor CSS Files -->
    <link href="/theme/interfo/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- gnuboard style -->
    <link rel="stylesheet" href="/theme/interfo/css/default.css">

    <!-- Template Main CSS File -->
    <link href="/theme/interfo/assets/css/style.css?time=<?= time() ?>" rel="stylesheet">

    <!--[if lte IE 8]>
        <script src="<?php echo G5_JS_URL ?>/html5.js"></script>
    <![endif]-->

    <script>
        // 자바스크립트에서 사용하는 전역변수 선언
        var g5_url = "<?php echo G5_URL ?>";
        var g5_bbs_url = "<?php echo G5_BBS_URL ?>";
        var g5_is_member = "<?php echo isset($is_member) ? $is_member : ''; ?>";
        var g5_is_admin = "<?php echo isset($is_admin) ? $is_admin : ''; ?>";
        var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
        var g5_bo_table = "<?php echo isset($bo_table) ? $bo_table : ''; ?>";
        var g5_sca = "<?php echo isset($sca) ? $sca : ''; ?>";
        var g5_editor = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor']) ? $config['cf_editor'] : ''; ?>";
        var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
        <?php if (defined('G5_USE_SHOP') && G5_USE_SHOP) { ?>
        var g5_theme_shop_url = "<?php echo G5_THEME_SHOP_URL; ?>";
        var g5_shop_url = "<?php echo G5_SHOP_URL; ?>";
        <?php } ?>
        <?php if(defined('G5_IS_ADMIN')) { ?>
        var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
        <?php } ?>
    </script>
    <?php
    add_javascript('<script src="'.G5_JS_URL.'/jquery-1.12.4.min.js"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/jquery-migrate-1.4.1.min.js"></script>', 0);
    if (defined('_SHOP_')) {
        if (! G5_IS_MOBILE) {
            add_javascript('<script src="'.G5_JS_URL.'/jquery.shop.menu.js?ver='.G5_JS_VER.'"></script>', 0);
        }
    } else {
        add_javascript('<script src="'.G5_JS_URL.'/jquery.menu.js?ver='.G5_JS_VER.'"></script>', 0);
    }
    add_javascript('<script src="'.G5_JS_URL.'/common.js?ver='.G5_JS_VER.'"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/wrest.js?ver='.G5_JS_VER.'"></script>', 0);
    add_javascript('<script src="'.G5_JS_URL.'/placeholders.min.js"></script>', 0);
    add_stylesheet('<link rel="stylesheet" href="'.G5_JS_URL.'/font-awesome/css/font-awesome.min.css">', 0);

    if (G5_IS_MOBILE) {
        add_javascript('<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>', 1); // overflow scroll 감지
    }
    if (! defined('G5_IS_ADMIN')) {
        echo $config['cf_add_script'];
    }
    ?>
</head>
<body<?php echo $g5['body_script'] ?? ''; ?> class="board-body">