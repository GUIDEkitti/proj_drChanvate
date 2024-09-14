<?php include("config.php"); ?>

<nav class="container navbar navbar-expand-lg navbar-light bg-light mt-5">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                        <b><?php echo $title; ?></b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">ติดต่อพวกเรา</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">รายละเอียดห้องพัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $LoginL; ?>"><?php echo $Login; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php $conn->close(); ?>