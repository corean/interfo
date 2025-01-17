<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->

<!-- 게시물 상단 버튼 시작 { -->
<div class="board-btn bo-v-btn-wrap">
	<div class="bo-v-btn-left">
		<?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn-bo-modify">수정</a><?php } ?>
		<?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn-bo-delete" onclick="del(this.href); return false;">삭제</a><?php } ?>
		<?php if ($copy_href) { ?><a href="<?php echo $copy_href ?>" class="btn-bo-copy" onclick="board_move(this.href); return false;">복사</a><?php } ?>
		<?php if ($move_href) { ?><a href="<?php echo $move_href ?>" class="btn-bo-move" onclick="board_move(this.href); return false;">이동</a><?php } ?>
	</div>
	<div class="bo-v-btn-right">
		<?php if ($search_href) { ?><a href="<?php echo $search_href ?>" class="btn-bo-search">검색목록</a><?php } ?>
		<a href="<?php echo $list_href ?>" class="btn-bo-list" title="목록">목록</a>
		<?php if ($reply_href) { ?><a href="<?php echo $reply_href ?>" class="btn-bo-reply" title="답변">답변</a><?php } ?>
		<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn-bo-write" title="글쓰기">글쓰기</a><?php } ?>
	</div>
</div>
<!-- } 게시물 상단 버튼 끝 -->

<article id="bo_v" style="width:<?php echo $width; ?>">
	<header>
		<h2 id="bo-v-title">
			<span class="bo-v-tit">
				<?php echo get_text($view['wr_subject']); // 글제목 출력?>
			</span>
		</h2>
	</header>
    <section id="bo-v-info">
        <h2>페이지 정보</h2>
        <div class="profile-info">
			<?php if($board['bo_use_sideview']){?>
        	<span class="pf-img"><?php echo get_member_profile_img($view['mb_id']) ?></span>
			<?php }?>
			<strong><span class="sound_only">작성자</span><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "<span class=\"article-ip\">[{$ip}]</span>"; } ?></strong>
    	</div>
		<div class="article-info">
			<strong class="article-comment"><span class="sound_only">댓글</span><a href="#bo_vc"><?php echo number_format($view['wr_comment']) ?>건</a></strong>
			<strong class="article-hit"><span class="sound_only">조회</span><?php echo number_format($view['wr_hit']) ?>회</strong>
			<strong class="article-date"><span class="sound_only">작성일</span><?php echo str_replace("-", ".", date("y-m-d H:i", strtotime($view['wr_datetime'])));?></strong>
		</div>
	</section>

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>

        <?php /* ?>
        <div id="bo_v_share">
            <div class="board-btn">
                <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="scrap-btn" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>
                <a href="#" class="share-btn">공유</a>
            </div>
            <?php include_once(G5_SNS_PATH."/view.sns.skin.php"); ?>
        </div>
        <script>
            $(function(){
                $(".share-btn").click(function(e){
                    e.stopPropagation();
                    if(!$(this).hasClass('active'))
                    {
                        console.log('adsf');
                        $(this).addClass('active');
                        $("#bo_v_sns").addClass('active');
                    }
                    else
                    {
                        $(this).removeClass('active');
                        $("#bo_v_sns").removeClass('active');
                    }
                    return false;
                });
                $(document).on("click", function (e) {
                    if(!$(e.target).closest('#bo_v_sns.active').length) {
                        $(".share-btn").removeClass('active');
                        $("#bo_v_sns").removeClass('active');
                    }
                });
            });
        </script>
        <?php */ ?>

        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            foreach($view['file'] as $view_file) {
                echo get_file_thumbnail($view_file);
            }

            echo "</div>\n";
        }
         ?>

        <div>

            <ul class="list-unstyled">
                <li>DATE : <?php echo $view['wr_1']?></li>
                <li>
                    PROJECT URL :
                    <a href="<?php echo $view['link_href'][1] ?>">
                        <?php echo cut_str($view['link'][1], 70); ?>
                    </a>
                    <span class="text-xs text-muted">[<?php echo $view['link_hit'][1] ?>]</span>
                </li>
                <?php if ($category_name) : ?>
                <li>CATEGORY : <?php echo $view['ca_name'] ?></li>
                <?php endif; ?>
            </ul>

        </div>
    </section>

    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
	?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong> <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                </a>
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>

    <?php if ($prev_href || $next_href) { ?>
    <ul class="bo_v_nb">
        <?php if ($prev_href) { ?><li class="btn_prv"><span class="nb_tit"><i class="fa fa-chevron-up" aria-hidden="true"></i> 이전글</span><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a> <span class="nb_date"><?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?></span></li><?php } ?>
        <?php if ($next_href) { ?><li class="btn_next"><span class="nb_tit"><i class="fa fa-chevron-down" aria-hidden="true"></i> 다음글</span><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a>  <span class="nb_date"><?php echo str_replace('-', '.', substr($next_wr_date, '2', '8')); ?></span></li><?php } ?>
    </ul>
    <?php } ?>

    <?php
    // 코멘트 입출력
    include_once(G5_BBS_PATH.'/view_comment.php');
	?>
</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->