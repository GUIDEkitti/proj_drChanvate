<?php include("config.php"); ?>

<?php

$sql_quicklink = "SELECT * FROM `quicklinks`";
$res_quicklink = mysqli_query($conn, $sql_quicklink);

if (mysqli_num_rows($res_quicklink) > 0) {
    $quicklinks = [];
    while ($row = mysqli_fetch_assoc($res_quicklink)) {
        $quicklinks[] = $row;
    }

    if (count($quicklinks) > 4) {
        $random_keys = array_rand($quicklinks, 4);
    } else {
        $random_keys = array_keys($quicklinks);
    }
}
?>

<footer class="container bg-dark text-light mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h5>เกี่ยวกับเรา</h5>
                <p>บริษัทพวกเราต้องการเกรด 4 เพื่อกำลังใจในการพัฒนาต่อไป</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <?php foreach ($random_keys as $key) { ?>
                        <li>
                            <a class="text-light" href="<?php echo $quicklinks[$key]['QuicklinkHref'] ?>" target="_blank">
                                <?php echo $quicklinks[$key]['QuicklinkTitle'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 id="contact">ติดต่อพวกเรา</h5>
                <address>
                    เลขที่ 9 ถนนแจ้งวัฒนะ<br>
                    อนุสาวรีย์ บางเขน กรุงเทพ 10220<br>
                    <a href="mailto:info@comsci65@pnru.ac.th" class="text-light">comsci65@pnru.ac.th</a><br>
                    <a href="tel:+1234567890" class="text-light">+0 (92) 567-890</a>
                </address>
            </div>
        </div>
        <div class="text-center py-3">
            <small>&copy; 2024 <?php echo $title; ?>. All rights reserved.</small>
        </div>
    </div>
</footer>
