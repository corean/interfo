<?php

die('not allowed');

include_once('./_common.php');
echo "<h1>kboard to GNUBoard Converter</h1>";

$mb_id = 'interfo';
$boards = array(
    '공지사항' => 'notice',
    '보도자료' => 'press',
);

sql_query("TRUNCATE TABLE g5_board_new");

foreach ($boards as $board_name => $gnuboard) {
    $sql1 = "SELECT * FROM wp_kboard_board_setting WHERE board_name = '{$board_name}'";
    $result1 = sql_query($sql1);
    for ($i = 0; $row1 = sql_fetch_array($result1); $i++) {
        $result2 = sql_query("SELECT * FROM wp_kboard_board_content WHERE board_id = '{$row1['uid']}' ORDER BY uid ");

        sql_query("TRUNCATE TABLE g5_write_{$gnuboard}");

        for ($j = 1; $row = sql_fetch_array($result2); $j++) {
            // echo "<pre>";print_r($row);echo "</pre>";
            // 변수 정리

            // $wr_subject = substr(trim($row['content']), 0, 255);
            // $wr_subject = preg_replace("#[\\\]+$#", "", $wr_subject);
            // $wr_content = substr(trim($row['title']), 0, 65536);
            // $wr_content = preg_replace("#[\\\]+$#", "", $wr_content);

            $wr_subject = nl2br(addslashes($row['title']));
            $wr_content = nl2br(addslashes($row['content']));

            $wr_datetime = date('Y-m-d H:i:s', strtotime($row['date']));
            $wr_last = date('Y-m-d H:i:s', strtotime($row['date']));
            $notice = $row['notice'] == 'true' ? 'notice' : '';

            $sql2 = "
                INSERT INTO g5_write_{$gnuboard} SET 
                    wr_reply = '',
                    wr_is_comment = '0',
                    ca_name = '',
                    wr_option = 'html1',
                    wr_subject = '{$wr_subject}',
                    wr_content = '{$wr_content}',
                    wr_link1 = '',
                    wr_link2 = '',
                    wr_link1_hit = '0',
                    wr_link2_hit = '0',
                    wr_hit = '{$row['view']}',
                    wr_good = '{$row['vote']}',
                    wr_nogood = '0',
                    mb_id = 'interfo',
                    wr_password = '',
                    wr_name = '{$mb_id}',
                    wr_email = '',
                    wr_homepage = '',
                    wr_datetime = '{$wr_datetime}',
                    wr_file = '0',
                    wr_last = '{$wr_last}',
                    wr_ip = '{$row['user_ip']}',
                    wr_facebook_user = '',
                    wr_twitter_user = '',
                    wr_1 = '{$notice}',
                    wr_2 = '',
                    wr_3 = '',
                    wr_4 = '',
                    wr_5 = '',
                    wr_6 = '',
                    wr_7 = '',
                    wr_8 = '',
                    wr_9 = '',
                    wr_10 = ''
            ";
            sql_query($sql2);
            $wr_id = sql_insert_id();
            $sql_error = sql_error_info();
            // var_dump($sql_error);

            if ($sql_error[0] === '0') {
                echo "\$gnuboard : $gnuboard \$wr_id : {$wr_id} <br>";
            } else {
                echo htmlspecialchars($sql2)."<br>";
                echo $sql_error = sql_error_info()."<br>";
            }

            $wr_seo_title = exist_seo_title_recursive('bbs', generate_seo_title($wr_subject), $gnuboard, $wr_id);
            $sql3 = "
                UPDATE g5_write_{$gnuboard} 
                SET wr_num = '-{$wr_id}',
                    wr_parent = '{$wr_id}',
                    wr_seo_title = '{$wr_seo_title}'
                WHERE wr_id = '{$wr_id}'
            ";
            sql_query($sql3);

            // 새글 INSERT
            sql_query(" 
                insert into g5_board_new ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) 
                values ( '{$gnuboard}', '{$wr_id}', '{$wr_id}', now(), '{$mb_id}' ) 
            ");

            echo "<hr>";
        }

        // 게시판 테이블의 전체 레코드수 수정
        sql_query("
            UPDATE g5_board
            SET bo_count_write = (SELECT COUNT(*)
                                  FROM g5_write_{$gnuboard}),
                bo_notice = (SELECT GROUP_CONCAT(wr_id)
                             FROM g5_write_{$gnuboard}
                             WHERE wr_1 = 'notice')
            WHERE bo_table = '{$gnuboard}'        
        ");
    }
}

