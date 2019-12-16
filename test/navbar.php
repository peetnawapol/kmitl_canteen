
    <?php session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark indigo">
        <a class="navbar-brand" href="#">KMITL CANTEEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li >
                </li>
                <li >
                </li>
                <li>
                </li>
            </ul>
            <span class="navbar-text white-text">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">เพิ่ม
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ร้าน &nbsp;<?php echo $_SESSION['store']; ?></a>
                    </li>
                </ul>
            </span>
        </div>
    </nav>