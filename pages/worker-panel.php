<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h5>Zamówienia</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nr. Zamówienia</th>
                    <th scope="col">Klient</th>
                    <th scope="col">Data</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mysqli = dbConnect();
                $sqlR = sprintf("SELECT orders.id, name, surname, date FROM orders JOIN users ON orders.user_id = users.id WHERE orders.shop = (SELECT shop FROM users WHERE id = '%s')", $_SESSION["id"]);
                $resultR = $mysqli->query($sqlR);

                while($rowR = $resultR->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php print($rowR[0]) ?></td>
                        <td><?php print($rowR[1]." ".$rowR[2]) ?></td>
                        <td><?php print($rowR[3]) ?></td>
                        <td>
                            <button oname="<?php print($rowR[0]) ?>" oid="<?php print($rowR[0]) ?>" type="button" class="odet btn btn-sm btn-outline-info">Szczegóły</button>
                            <button oid="<?php print($rowR[0]) ?>" type="button" class="oclose btn btn-sm btn-outline-success">Zakończ</button>
                        </td>
                    </tr>
                    <?php
                }
                mysqli_close($mysqli);
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h5>Moje raporty</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Tytuł</th>
                    <th scope="col">Treść</th>
                    <th scope="col">Data</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $mysqli = dbConnect();
                $sqlR = sprintf("SELECT title, content, date FROM raports WHERE user_id = '%s'", $_SESSION["id"]);
                $resultR = $mysqli->query($sqlR);

                while($rowR = $resultR->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php print($rowR[0]) ?></td>
                        <td><?php print($rowR[1]) ?></td>
                        <td><?php print($rowR[2]) ?></td>
                        <td>
                        </td>
                    </tr>
                    <?php
                }
                mysqli_close($mysqli);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
