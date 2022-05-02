<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <?php
        if(isset($_SESSION["ptid"]) && isset($_SESSION["ptname"])) {
        ?>
        <h5 id="product-types" ptid="<?php print($_SESSION["ptid"]); ?>"> <?php print("Rodzaj produktów: " . $_SESSION["ptname"]); ?></h5>
        <?php
        }
        ?>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php
            $mysqli = dbConnect();
            if($_SESSION["sid"] != 0) {
                if($_SESSION["ptid"]!=-1) {
                    $sqlQ = sprintf("SELECT p_id, name, type, price, promo_price, quantity, image FROM shops_products INNER JOIN products ON p_id = id WHERE s_id = '%s' AND type = '%s'", $_SESSION["sid"], $_SESSION["ptid"]);
                } else {
                    $sqlQ = sprintf("SELECT p_id, name, type, price, promo_price, quantity, image FROM shops_products INNER JOIN products ON p_id = id WHERE s_id = '%s'", $_SESSION["sid"]);
                }
            } else {
                if($_SESSION["ptid"]!=-1) {
                    $sqlQ = sprintf("SELECT id as p_id, name, type, rating, price, promo_price, image FROM products WHERE type = '%s'", $_SESSION["ptid"]);
                } else {
                    $sqlQ = sprintf("SELECT id as p_id, name, type, rating, price, promo_price, image FROM products");
                }
            }
            $result = $mysqli->query($sqlQ);

            while($row = $result->fetch_array()) {
            ?>
            <div class="col mb-5">
                <div class="card h-100">

                    <?php
                    if($row["promo_price"] != 0) {
                    ?>
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promocja</div>
                    <?php
                    }
                    ?>

                    <?php
                    if($row["image"] != NULL) {
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="..." />';
                    } else {
                        echo '<img class="card-img-top" src="../assets/placeholder.jpg" alt="..." />';
                    }
                    ?>

                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder pr-name" pid="<?php print($row["p_id"]); ?>"><?php print($row["name"]); ?></h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <?php
                                $sqlR = sprintf("SELECT AVG(rating) FROM products_rating WHERE product_id = '%s'", $row["p_id"]);
                                $resultR = $mysqli->query($sqlR);
                                $rowR = $resultR->fetch_array();

                                for($i=0;$i<$rowR[0];$i++) {
                                ?>
                                <div class="bi-star-fill"></div>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            if($row["promo_price"] != 0) {
                            ?>
                            <span class="text-muted text-decoration-line-through"><?php print($row["price"]); ?>zł</span>
                            <?php
                            print($row["promo_price"]);
                            } else {
                                print($row["price"]);
                            }
                            ?>
                            zł
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center" style="margin-bottom: 2px"><a uid="<?php print($_SESSION["id"]); ?>" pid="<?php print($row["p_id"]); ?>" class="product-det btn btn-outline-dark mt-auto" href="#">Szczegóły</a></div>
                        <?php
                        if($_SESSION["sid"]!=0) {
                        ?>
                        <div class="text-center">
                            <?php
                            if($row["quantity"]>0) {
                            ?>
                                <input pid="<?php print($row["p_id"]); ?>" type="number" value="1" min="0" max="<?php print($row["quantity"]); ?>" id="pt-q" style="margin-top: 4px; width: 50px" />
                                <a pid="<?php print($row["p_id"]); ?>" pname="<?php print($row["name"]); ?>"

                                <?php
                                if($row["promo_price"] == 0) {
                                ?>
                                    price="<?php print($row["price"]); ?>"
                                <?php
                                } else {
                                ?>
                                    price="<?php print($row["promo_price"]); ?>"
                                <?php
                                }
                                ?>
                                   class="to-cart btn btn-outline-dark mt-auto" href="#">Dodaj do koszyka</a>

                            <?php
                            } else {
                             ?>
                                <a class="btn btn-outline-dark mt-auto" href="#">Brak towaru</a>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php
            }
            mysqli_close($mysqli);
            ?>
        </div>
    </div>
</section>
