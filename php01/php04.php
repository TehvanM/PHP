<!-- Tehvan Marjapuu 
Muudetud Harjutus 4 -->

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php 4 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container">
    <h1>Harjutus 04 </h1>
    <div class="row">
        <div class="col-md-4">
            <form method="get">
                <div class="mb-3">
                    <label for="arv1" class="form-label">Arv1</label>
                    <input type="number" class="form-control" name="arv1">
                </div>
                <div class="mb-3">
                    <label for="arv2" class="form-label">Arv2</label>
                    <input type="number" class="form-control" name="arv2">
                </div>
                <button type="submit" class="btn btn-primary">Saada</button>
            </form>

            <?php
            if (!empty($_GET["arv1"]) && !empty($_GET["arv2"])) {
                $a = (int)$_GET["arv1"];
                $b = (int)$_GET["arv2"];

                if ($b !== 0) {
                    $result = $a / $b;
                    echo "<div class='alert alert-success'>võrdub: $a / $b = " . number_format($result, 2) . "</div>";
                } else {
                    echo "<div class='alert alert-danger'>nulliga jagamine pole lubatud.</div>";
                }

                $vahe = $a - $b;
                if ($vahe > 0) {
                    echo "<div class='alert alert-warning'>Arv1 on suurem kui Arv2.</div>";
                } elseif ($vahe < 0) {
                    echo "<div class='alert alert-warning'>Arv1 on väiksem kui Arv2.</div>";
                } else {
                    echo "<div class='alert alert-info'>arvud on võrdsed.</div>";
                }

                if ($a === $b) {
                    echo '<div class="alert alert-secondary">taitsa ruut!
                    <img width="50" src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/64x64/plain/shape_square.png" alt=""></div>';
                } else {
                    echo '<div class="alert alert-secondary">props ristkülik.
                    <img width="50" src="https://cdn-icons-png.flaticon.com/512/5895/5895916.png" alt=""></div>';
                }

                echo ($a % 5 === 0)
                    ? "<div class='alert alert-dark'>JUUBEL!</div>"
                    : "<div class='alert alert-dark'>Ei ole juubel.</div>";

                if ($a >= 10) {
                    echo "<div class='alert alert-success'>TASE!</div>";
                } elseif ($a >= 5) {
                    echo "<div class='alert alert-success'>Tubli töö.</div>";
                } elseif ($a >= 0) {
                    echo "<div class='alert alert-warning'>Natuke jääb puudu.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Palun sisesta positiivne arv.</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
