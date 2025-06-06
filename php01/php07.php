<!-- Tehvan Marjapuu Harjutus 7-->
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container py-3">
    <h1 class="mb-4">Harjutus 7</h1>
    
    <div class="row">
        <div class="col-md-6">
            <?php

            function tervita() {
                print "Tere päiksekesekene!";
            }
            tervita();
            echo "<br><br>";
            ?>
            
            <h3>Uudiskirja liitumine</h3>
            <?php
            function uudiskirjaVorm() {
                return '<form method="post">
                    <div class="mb-3">
                        <label class="form-label">gmaili aadress</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <button type="submit" class="btn btn-success">Liitu uudiskirjaga</button>
                </form>';
            }
            echo uudiskirjaVorm();
            ?>
            
            <hr>
            
            <h3>Kasutaja loomine</h3>
            <form method="get">
                <div class="mb-3">
                    <label class="form-label">Sisesta nimi</label>
                    <input type="text" class="form-control" name="nimi">
                </div>
                <button type="submit" class="btn btn-primary">Loo kasutaja</button>
            </form>  
            
            <?php
            function looKasutaja($nimi) {
                $nimi = strtolower(trim($nimi));
                $email = $nimi . "@hkhk.edu.ee";
                $kood = substr(md5(uniqid()), 0, 7);
                return "Kasutaja: $nimi <br>E-post: $email <br>Turvakood: $kood";
            }

            if(isset($_GET['nimi'])) {
                echo looKasutaja($_GET['nimi']);
            }
            ?>
            
            <hr>
            
            <h3>Arvude generaator</h3>
            <form method="get">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">algusarv</label>
                        <input type="number" class="form-control" name="algus" required>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">lopparv</label>
                        <input type="number" class="form-control" name="lopp" required>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">samm</label>
                        <input type="number" class="form-control" name="samm" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">kuva arvud</button>
            </form>
            
            <?php
            function kuvaArvud($algus, $lopp, $samm) {
                $tulemus = [];
                for ($i = $algus; $i <= $lopp; $i += $samm) {
                    $tulemus[] = $i;
                }
                return implode(', ', $tulemus);
            }
            
            if (isset($_GET['algus'], $_GET['lopp'], $_GET['samm'])) {
                $algus = (int)$_GET['algus'];
                $lopp = (int)$_GET['lopp'];
                $samm = (int)$_GET['samm'];
                
                echo kuvaArvud($algus, $lopp, $samm);
            }
            ?>
        </div>
        
        <div class="col-md-6">
            <h3>Ristküliku arvutamine</h3>
            <form method="get">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">külg A</label>
                        <input type="number" class="form-control" name="kylgA" min="1" required>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">külg B</label>
                        <input type="number" class="form-control" name="kylgB" min="1" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Arvuta pindala</button>
            </form>
            
            <?php
            function arvutaPindala($a, $b) {
                return 2 * ($a + $b);
            }
            
            if (isset($_GET['kylgA'], $_GET['kylgB'])) {
                $a = (int)$_GET['kylgA'];
                $b = (int)$_GET['kylgB'];
                echo "Ristküliku ümbermõõt on: " . arvutaPindala($a, $b);
            }
            ?>
            
            <hr>
            
            <h3>Isikukood</h3>

            <form method="get">
                <div class="mb-3">
                    <label class="form-label">sisesta isikukood</label>
                    <input type="text" class="form-control" name="kood" placeholder="11 numbrit" required>
                </div>
                <button type="submit" class="btn btn-secondary">analüüsi</button>
            </form>
            
            <?php
            function analüüsiKood($kood) {
                $pikkus = strlen($kood);
                if ($pikkus !== 11) {
                    return "pane õige isikukood.";
                }
                
                $suguNr = (int)$kood[0];
                $sugu = ($suguNr % 2 === 0) ? "naine" : "mees";
                
                $sünnikuu = substr($kood, 3, 2);
                $sünnipäev = substr($kood, 5, 2);
                $sünniaasta = substr($kood, 1, 2);
                
                return "Sugu: $sugu <br>Sünnikuupäev: $sünnipäev.$sünnikuu.$sünniaasta";
            }
            
            if (isset($_GET['kood'])) {
                echo analüüsiKood($_GET['kood']);
            }
            ?>
            
            <hr>
            
            <h3>Juhuslik mõte</h3>
            <?php
            function genereeriMõte() {
                $alus = ["õpilane", "kass", "vanaema", "juhataja", "auto"];
                $öeldis = ["armastab", "kardab", "ihkab", "vihkab", "ootab"];
                $sihitis = ["koolitööd", "jäätist", "puhkust", "kassi", "päikest"];
                
                $valik1 = $alus[array_rand($alus)];
                $valik2 = $öeldis[array_rand($öeldis)];
                $valik3 = $sihitis[array_rand($sihitis)];
                
                return ucfirst($valik1) . " " . $valik2 . " " . $valik3 . "";
            }
            echo genereeriMõte();
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>