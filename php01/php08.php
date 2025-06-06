 <!-- Tehvan Marjapuu 
Harjutus 8 -->

<!doctype html>
<html lang="et">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Harjutus 8</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
<body>
    <div class="container">
        <h1>Harjutus 08</h1>
        <div class="row">
            <div class="col-md-4">
                
                <?php

                echo "<h2>Kuupäev ja kellaaeg</h2>";

                echo date('d.m.Y G:i' , time());

                ?>
                <br>
                <h2>vanus</h2>
                <form>
                    <div class="mb-3">
                        <label for="vanus" class="form-label">pane sünnipäev</label>
                        <input type="number" class="form-control" name="vanus">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                if (isset($_GET["vanus"])) {
                    $vanus = $_GET["vanus"];
                    $aasta = date('Y');
                    $vanus = $aasta - $vanus;
                    echo "oled/saad see aasta $vanus";
                    
                }
                ?>
                <br>
                <h2>Kooli lõpuni</h2>
                <?php
                 $lopp = strtotime("2025-06-14");
                 $paeva = ($lopp - time()) / (60 * 60 * 24);
                    echo "kooli lõpuni on jäänud $paeva päeva!";
                ?>
                <br>
                <h2>aastaajad</h2>
                <?php

                $aasta = date('m');

                if ($aasta >= 3 && $aasta <= 5) {
                    echo '<img src="img/kevad.jpg" alt="kevad">';

                } else if ($aasta >= 6 && $aasta <= 8) {
                    echo '<img src="img/suvi.jpg" alt="suvi">';

                } else if ($aasta >= 9 && $aasta <= 11) {
                    echo '<img src="img/sugis.jpg" alt="sugis">';

                } else {
                    echo '<img src="img/talv.jpg" alt="talv">';
                    
                }

                ?>



            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>