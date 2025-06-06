<!-- Tehvan Marjapuu Harjutus 8 -->
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuupäeva Harjutus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .season-img {
            max-width: 100%;
            border-radius: 10px;
            margin-top: 15px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <header class="text-center mb-4">
            <h1 class="display-5">Ajaga arvutused</h1>
            <p class="text-muted">harjutus 8</p>
        </header>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="h5 mb-0">Käesolev hetk</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $hetk = date('d.m.Y H:i');
                        echo "<p class='fs-5'>Täna on: <strong>$hetk</strong></p>";
                        ?>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="h5 mb-0">Vanus</h3>
                    </div>
                    <div class="card-body">
                        <form class="mb-3">
                            <div class="mb-3">
                                <label class="form-label">Sünniaasta</label>
                                <input type="number" class="form-control" 
                                       name="synniaasta" 
                                       placeholder="Sisesta aasta (nt 2005)"
                                       min="1900" max="<?= date('Y') ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Arvuta vanus</button>
                        </form>
                        
                        <?php
                        if (isset($_GET["synniaasta"])) {
                            $synniaasta = (int)$_GET["synniaasta"];
                            $hetkeAasta = (int)date('Y');
                            $vanus = $hetkeAasta - $synniaasta;
                            
                            echo "<div class='alert alert-info mt-3'>";
                            echo "Selle aasta seisuga oled $vanus aastat vana";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="h5 mb-0">Kooliaja lõpp</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $loppkuupaev = new DateTime("2025-06-14");
                        $tanane = new DateTime();
                        $vahe = $tanane->diff($loppkuupaev);
                        $paevad = $vahe->days;
                        
                        echo "<p class='fs-5'>Kooliaasta lõpuni on jäänud:";
                        echo "<br><span class='badge bg-warning text-dark fs-4'>$paevad päeva</span></p>";
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="h5 mb-0">Aastaajad</h3>
                    </div>
                    <div class="card-body text-center">
                        <?php
                        $kuu = (int)date('m');
                        $ajad = [
                            'kevad' => [3, 4, 5],
                            'suvi' => [6, 7, 8],
                            'sügis' => [9, 10, 11],
                            'talv' => [12, 1, 2]
                        ];
                        
                        $aastaaeg = '';
                        foreach ($ajad as $aeg => $kuud) {
                            if (in_array($kuu, $kuud)) {
                                $aastaaeg = $aeg;
                                break;
                            }
                        }
                        
                        echo "<h4 class='mb-3'>Praegu on " . ucfirst($aastaaeg) . "</h4>";
                        echo "<img src='img/$aastaaeg.jpg' alt='$aastaaeg' class='season-img'>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>