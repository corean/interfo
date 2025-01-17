<div class="container d-flex align-items-center">

    <a href="/" class="logo me-auto"><img src="/theme/interfo/assets/img/interfo.svg" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto" href="/#about">회사소개</a></li>
            <li><a class="nav-link scrollto" href="/#business">사업분야</a></li>
            <li><a class="nav-link scrollto" href="/#portfolio">포트폴리오</a></li>
            <li><a class="nav-link scrollto" href="/#service">서비스</a></li>
            <li class="dropdown"><a href="#"><span>커뮤니티</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="/bbs/board.php?bo_table=notice">공지사항</a></li>
                    <li><a href="/bbs/board.php?bo_table=press">보도자료</a></li>
                    <li><a href="/bbs/board.php?bo_table=youtube">동영상</a></li>
                    <li><a href="/theme/interfo/form/?page=estimate">견적문의</a></li>
                    <li><a href="/theme/interfo/form/?page=designer">디자이너 채용</a></li>
                    <li><a href="/theme/interfo/form/?page=developer">개발자 채용</a></li>
                </ul>
            </li>

            <?php if (isset($member['mb_no']) && $member['mb_no'] === '1') : // 관리자인지 ?>
                <li><a class="nav-link scrollto" href="/adm" target="_blank">관리자</a></li>
            <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
</div>