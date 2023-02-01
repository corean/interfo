<?php

// http://interfo.test:8000/theme/interfo/form/?page=estimate 견적문의
// http://interfo.test:8000/theme/interfo/form/?page=designer 디자이너 채용
// http://interfo.test:8000/theme/interfo/form/?page=developer 개발자 채용

include_once('_common.php');

if (!array_key_exists('page', $_GET)) {
    $_GET['page'] = 'estimate';
}
switch ($_GET['page']) {
    case 'designer':
        $ca_name = '디자이너 채용';
        $message = '센스있는 자기소개서와 그 동안의 노력이 담긴 포트폴리오를 <br>아래의 이메일로 보내주세요. interfo@interfo.com';
        $button = '보내기';
        break;
    case 'developer':
        $ca_name = '개발자 채용';
        $message = '센스있는 자기소개서와 그 동안의 노력이 담긴 포트폴리오를 <br>아래의 이메일로 보내주세요. interfo@interfo.com';
        $button = '보내기';
        break;
    default:
        $ca_name = '견적문의';
        $message = '인터포에게 문의글을 남겨주세요.';
        $button = '문의하기';
}

$uid = get_uniqid();


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
    <link rel="icon" href="/wp-content/uploads/2022/04/cropped-파비콘-32x32.png" sizes="32x32"/>
    <link rel="icon" href="/wp-content/uploads/2022/04/cropped-파비콘-192x192.png" sizes="192x192"/>
    <link rel="apple-touch-icon" href="/wp-content/uploads/2022/04/cropped-파비콘-180x180.png"/>
    <meta name="msapplication-TileImage" content="/wp-content/uploads/2022/04/cropped-파비콘-270x270.png"/>

    <!-- Vendor CSS Files -->
    <link href="/theme/interfo/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/theme/interfo/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/theme/interfo/assets/css/style.css?time=<?= time() ?>" rel="stylesheet">
</head>

<body class="board-body">

<header id="header" class="fixed-top">
    <?php include_once(G5_THEME_PATH.'/1_header.php') ?>
</header>

<section id="app" class="form" style="margin-top: 8rem;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2><?= $ca_name ?></h2>
            <p><?= $message ?></p>
        </div>
        <div class="row">
            <form>
                <div class="col-md-8 offset-md-2">
                    <div class="form-floating mb-3">
                        <input type="text" id="wr_name" placeholder="홍길동"  class="form-control"
                               v-model="name" :class="{ 'is-invalid' : errors.name }">
                        <label for="wr_name">이름</label>
                        <div class="invalid-feedback" :class="{ 'd-block' : errors.name }">이름 입력은 필수입니다</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="email" placeholder="interfo@interfo.com" class="form-control"
                               v-model="email" :class="{ 'is-invalid' : errors.email }">
                        <label for="email">이메일</label>
                        <div class="invalid-feedback" :class="{ 'd-block' : errors.email }">이메일 입력은 필수입니다</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="phone" placeholder="010-1234-5678"
                               v-model="phone" :class="{ 'is-invalid' : errors.phone }">
                        <label for="phone">연락처</label>
                        <div class="invalid-feedback" :class="{ 'd-block' : errors.phone }">연락처 입력은 필수입니다</div>
                    </div>
                    <div class="mb-3">
                        <label for="wr_content" class="form-label visually-hidden"></label>
                        <textarea id="wr_content" class="form-control " placeholder="문의내용을 입력해주세요."
                                  style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 72px;"
                                  v-model="content" :class="{ 'is-invalid' : errors.content }"></textarea>
                        <div class="invalid-feedback" :class="{ 'd-block' : errors.content }">메세지 입력은 필수입니다</div>
                    </div>
                    <div>
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" v-model="agree" value="1">
                            <span class="form-check-label me-1">개인정보수집 동의 (필수)</span>
                            <a href="/bbs/board.php?bo_table=notice&wr_id=13">개인정보처리방침</a>
                        </label>
                    </div>

                    <div class="text-end">
                        <a href="#" class="btn btn-primary btn-interfo btn-block" @click="send()">
                            <?= $button ?>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/theme/interfo/assets/vendor/aos/aos.js"></script>
<script src="/theme/interfo/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/theme/interfo/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/theme/interfo/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/theme/interfo/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/theme/interfo/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="/theme/interfo/assets/vendor/php-email-form/validate.js"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

<!-- Template Main JS File -->
<script src="/theme/interfo/assets/js/main.js"></script>
<script>
    (function () {
        "use strict";

        window.addEventListener('load', () => {
            autosize(document.querySelector('textarea'));

        });
    })();
</script>

<script src="https://unpkg.com/vue@3"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const {createApp, ref} = Vue;
    let ca_name = '<?= $ca_name ?>';

    const app = createApp({
        data() {
            return {
                agree: 0,
                name: '이름',
                email: '이메일',
                phone: '연락처',
                content: '문의내용',
                errors: {
                    count: 0,
                    name: ref(false),
                    email: ref(false),
                    phone: ref(false),
                    content: ref(false),
                }
            }
        },
        methods: {
            reset() {
                this.agree = 0;
                this.name = '';
                this.email = '';
                this.phone = '';
                this.content = '';
            },
            resetErrors() {
                this.errors.count = 0;
                this.errors.name = false;
                this.errors.email = false;
                this.errors.phone = false;
                this.errors.content = false;
            },
            send() {
                this.resetErrors();
                if (!this.agree) {
                    alert('개인정보 수집에 동의해주세요.');
                    return;
                }
                if (this.name === '') {
                    this.errors.count++;
                    this.errors.name = true;
                }
                if (this.email === '') {
                    this.errors.count++;
                    this.errors.email = true;
                }
                if (this.phone === '') {
                    this.errors.count++;
                    this.errors.phone = true;
                }
                if (this.content === '') {
                    this.errors.count++;
                    this.errors.content = true;
                }
                if (this.errors.count > 0) {

                    return;
                }

                const data = {
                    method: 'api',
                    bo_table: 'form',
                    wr_password: '',
                    ca_name: ca_name,
                    wr_name: this.name,
                    wr_email: this.email,
                    wr_1: this.phone,
                    wr_content: this.content,
                    wr_subject: this.name,
                    uid: '<?= $uid ?>',
                    w: '',
                    wr_id: '0',
                    sca: '',
                    sfl: '',
                    stx: '',
                    spt: '',
                    sst: '',
                    sod: '',
                    page: '',
                    html: 'html1',
                }

                axios.post('/bbs/write_update.php', data, {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    }
                })
                    .then((res) => {
                        console.log(res);
                        alert('접수되었습니다.');
                        this.reset();
                    })
                    .catch((err) => {
                        console.log(err);
                        alert('접수에 실패했습니다.');
                    })
            }
        }
    })
        .mount('#app')

</script>

</body>
</html>