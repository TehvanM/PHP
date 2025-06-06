<!-- Tehvan Marjapuu - Harjutus 6 -->
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container py-4">
    <header class="mb-4">
        <h1 class="display-6">Harjutus 6</h1>
    </header>
    
    <div class="row">
        <section class="col-md-5">
            <?php
            print "<h3>gener</h3>";
            
            $count = 1;
            do {
                echo "$count ";
                $count++;
            } while ($count <= 100);

            echo "<br><br>";
            
            for ($i = 1; $i <= 10; $i++) {
                print "$i<br>";
            }

            echo "<br>";
            
            $index = 1;
            while ($index <= 10) {
                echo "$index. ";
                $index++;
            }

            echo "<br><br><h3> rida</h3>";
            
            for ($stars = 0; $stars < 10; $stars++) {
                print '*';
            }

            echo "<br><br><h3>ridada</h3>";
            
            for ($vertical = 1; $vertical <= 10; $vertical++) {
                print "*<br>";
            }

            echo "<h3>ruuuuut</h3>";
            
            $size = 5;
            for ($y = 0; $y < $size; $y++) {
                for ($x = 0; $x < $size; $x++) {
                    echo '* ';
                }
                print '<br>';
            }

            echo "<br><h3>vastupidi</h3>";
            
            $reverse = 10;
            while ($reverse > 0) {
                echo "$reverse<br>";
                $reverse--;
            }

            echo "<br><h3>kolmega jagunevad</h3>";
            
            $value = 1;
            do {
                if ($value % 3 === 0) {
                    echo "$value ";
                }
                $value++;
            } while ($value <= 100);

            echo "<br><br><h3>paarid</h3>";
            
            $naised = ['Mario', 'Rain', 'väike altmäe'];
            $mehed = ['tõnu', 'mustu', 'maksi seksikam'];
            
            for ($paar = 0; $paar < count($naised); $paar++) {
                echo "{$naised[$paar]} - {$mehed[$paar]}<br>";
            }
            ?>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>