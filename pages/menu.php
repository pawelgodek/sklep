<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="">SWZSSO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                <?php
                if($_SESSION["type"] == "user") {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Strona główna</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a id="all-products" class="dropdown-item" href="#!">Wszystkie produkty</a></li>
                        <li><hr class="dropdown-divider" /></li>
                    </ul>
                </li>

                <?php
                } elseif($_SESSION["type"] == "worker") {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" uid="<?php print($_SESSION["id"]) ?>" id="add-rap" href="#" role="button" aria-expanded="false">Dodaj raport</a>
                    </li>

                <?php
                }
                ?>

                <?php
                $mysqli = dbConnect();
                    if($_SESSION["type"] == "user") {
                        $sqlShops = sprintf("SELECT id, name FROM shops");
                        $result = $mysqli->query($sqlShops);
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Wybierz placówkę</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            while($row = $result->fetch_array()) {
                        ?>
                        <li><a class="dropdown-item shop-selector" sid="<?php print($row[0])  ?>" href="#!"><?php print($row[1]) ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <?php
                    }
                ?>

            </ul>
            <ul class="navbar-nav">
                <?php
                    if($_SESSION["type"] == "user") {
                ?>
                <li>
                    <button id="cart-btn" class="btn btn-outline-dark">
                        <i class="bi-cart-fill me-1"></i>
                        Koszyk
                        <span id="cart-count" class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </li>
                <?php
                    }
                ?>

                <li class="nav-item dropdown float-end">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left: 10px">Witaj <?php print($_SESSION["login"]);?></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a onclick="logoutForm()" class="dropdown-item" href="#!">Wyloguj</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<?php
if($_SESSION["type"] == "user") {
    $getpr = sprintf("SELECT id, type FROM products_types");
    $result = $mysqli->query($getpr);

    $getwor = sprintf("SELECT id, name, surname FROM users WHERE shop = '%s'", $_SESSION["sid"]);
    $worR = $mysqli->query($getwor);
?>
    <div class=" position-absolute flex-shrink-0 p-3 bg-white" style="width: 280px;">
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                    <i class="bi bi-caret-down-fill"></i>
                    Rodzaje Produktów
                </button>
                <div class="collapse show" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li><a href="#" ptid="-1" class="select-product link-dark rounded text-uppercase">Wszystkie</a></li>
                        <?php
                        while($row = $result->fetch_array()) {
                        ?>
                        <li><a href="#" ptid="<?php print($row[0]) ?>" class="select-product link-dark rounded"><?php print($row[1]) ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </li>
            <?php
            if($_SESSION["sid"] != 0) {
                ?>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    <i class="bi bi-caret-down-fill"></i>
                    Pracownicy
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                        <?php
                        while($row = $worR->fetch_array()) {
                            ?>
                            <li><a href="#" uid="<?php print($_SESSION["id"]) ?>" wrid="<?php print($row[0]) ?>" class="shop-wor text-decoration-none text-dark"><?php print($row[1]." ".$row[2]) ?>
                                    <?php
                                    $sqlR = sprintf("SELECT AVG(rate) FROM users_rating WHERE user_rated_id = '%s'", $row[0]);
                                    $resultR = $mysqli->query($sqlR);
                                    $rowR = $resultR->fetch_array();

                                    for($i=0;$i<$rowR[0];$i++) {
                                        ?>
                                        <span class="bi-star-fill small"></span>
                                        <?php
                                    }
                                    ?>
                                    </a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </li>

            <li class="border-top my-3"></li>
            <li class="mb-1">
                <?php
                $sqlShop = sprintf("SELECT name, address, postNr, city FROM shops WHERE id = '%s'", $_SESSION["sid"] );
                $result = $mysqli->query($sqlShop);
                $addr = $result->fetch_array()
                ?>
                <h5><?php print($addr[0]) ?></h5>
                <p>Adres sklepu: </p>
                <p><?php print($addr[1]) ?></br>
                <?php print($addr[2]." ". $addr[3]) ?></p>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>

<?php
}
mysqli_close($mysqli);
?>
