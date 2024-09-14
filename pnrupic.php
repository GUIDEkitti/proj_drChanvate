<?php

include("config.php");
$sql_pnrupic = "SELECT * FROM `pnrupic`";
$res_pnrupic = mysqli_query($conn, $sql_pnrupic);

$numRows = mysqli_num_rows($res_pnrupic);
$randomActiveIndex = rand(0, $numRows - 1);

?>

<div id="carouselExampleIndicators" class="container carousel slide mt-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        for ($i = 0; $i < $numRows; $i++) {
            $activeClass = $i == $randomActiveIndex ? 'active' : '';
            echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' class='$activeClass' aria-current='true' aria-label='Slide " . ($i + 1) . "'></button>";
        }
        ?>
    </div>

    <div class="carousel-inner">
        <?php
        $i = 0;
        while ($data = mysqli_fetch_assoc($res_pnrupic)) {
            $activeClass = $i == $randomActiveIndex ? 'active' : '';
            ?>
            <div class="container carousel-item mt-10 <?php echo $activeClass; ?>">
                <img src="<?php echo $data['PnruPicLink']; ?>" class="d-block w-100" alt="Slide <?php echo ($i + 1); ?>"
                    width="912px" height="450px">
            </div>
            <?php
            $i++;
        }
        ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php $conn->close(); ?>