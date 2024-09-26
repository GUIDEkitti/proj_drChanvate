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

<footer class="bg-dark text-light mt-5 w-100 bottom-0">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h5>เกี่ยวกับเรา</h5>
                <p>เราคือแพลตฟอร์มจองห้องพักออนไลน์ที่ออกแบบมาเพื่ออำนวยความสะดวกในการค้นหาและจองห้องพักที่ตรงตามความต้องการของคุณ
                    ไม่ว่าคุณจะมองหาห้องพักเพื่อการท่องเที่ยว การทำงาน หรือการพักผ่อน
                    เราพร้อมให้บริการห้องพักคุณภาพหลากหลายประเภทในสถานที่ต่างๆ ด้วยระบบการจองที่ง่ายดายและรวดเร็ว
                </p>
<!-- 
                <h5>ภารกิจของเรา</h5>
                <p>เรามุ่งมั่นที่จะเป็นส่วนหนึ่งในการสร้างประสบการณ์ที่ดีสำหรับผู้ใช้งาน ด้วยการเสนอราคาที่โปร่งใส การให้บริการลูกค้าที่เป็นมิตร และระบบที่ทันสมัยเพื่อให้การจองห้องพักเป็นเรื่องง่ายและสะดวกสบาย
                </p> -->





            </div>
            <!-- <div class="col-md-4">
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
            </div> -->
            <div class="col-md-6">
                <h5 id="contact" class="text-end">ติดต่อพวกเรา</h5>
                <address class="text-end">
                    เลขที่ 9 ถนนแจ้งวัฒนะ<br>
                    อนุสาวรีย์ บางเขน กรุงเทพ 10220<br>
                    <a href="mailto:info@comsci65@pnru.ac.th" class="text-light">comsci65@pnru.ac.th</a><br>
                    <a href="tel:+1234567890" class="text-light">+0 (92) 567-890</a>
                </address>
            </div>
        </div>
        <div class="text-center pt-3">
            <small>&copy; 2024 <?php echo $title; ?>. All rights reserved.</small>
        </div>
    </div>
</footer>