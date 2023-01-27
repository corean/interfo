<div class="container" data-aos="fade-up">

    <section class="section-title">
        <h2>Portfolio</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
            fugiat sit in iste officiis commodi quidem hic quas.</p>
    </section>

    <ul id="portfolio-filters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-web">홈페이지</li>
        <li data-filter=".filter-app">APP/AR/VR</li>
    </ul>


    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <?php
        $sql = "
            SELECT wr_subject, wr_content, ca_name, wr_link1, wr_link2, wr_1, bf_file
            FROM g5_write_portfolio pf
                     LEFT JOIN g5_board_file bf ON bf.bo_table = 'portfolio' AND bf.wr_id = pf.wr_id AND bf_no = 0
            WHERE wr_is_comment = 0
            ORDER BY wr_1 DESC;
        ";
        $result = sql_query($sql);
        ?>

        <?php for ($i = 0; $row = sql_fetch_array($result); $i++) : ?>
            <?php
            $link = '/data/file/portfolio/'.$row['bf_file'];
            $category = $row['ca_name'] === '홈페이지' ? 'filter-web' :
                ($row['ca_name'] === 'APP,AR,VR' ? 'filter-app' : '');
            ?>
            <div class="col-lg-4 col-md-6 portfolio-item <?= $category ?>">
                <div class="portfolio-img">
                    <img src="<?= $link ?>" class="img-fluid" alt="">
                </div>
                <div class="portfolio-info">
                    <h4><?= $row['wr_subject'] ?></h4>
                    <p><?= $row['wr_content'] ?></p>

                    <a href="<?= $link ?>" data-gallery="portfolioGallery"
                       class="portfolio-lightbox preview-link" <?= $row['wr_subject'] ?>
                       data-glightbox="title:<?= $row['wr_subject'] ?>; description: <a href='<?= $row['wr_link1'] ?>'><?= $row['wr_link1'] ?></a>">
                        <i class="bx bx-plus"></i>
                    </a>

                    <?php if ($row['wr_link1']) : ?>
                    <a href="<?= $row['wr_link1'] ?>" class="details-link" title="More Details">
                        <i class="bx bx-link"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endfor; ?>

    </div>
</div>
