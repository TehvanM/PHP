<!-- Tehvan Marjapuu Harjutus 9-->
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tekstitöötlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .task-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            background-color: #f8f9fa;
        }
        .task-header {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .result-box {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            min-height: 50px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <header class="text-center mb-5">
            <h1 class="display-5">teksti harjutused</h1>
            <p class="lead">harjutus 9</p>
        </header>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <section class="task-card">
                    <div class="task-header">
                        <h3 class="h4">tervitus</h3>
                    </div>
                    <form method="get" class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Sisesta oma nimi</label>
                            <input type="text" class="form-control" name="nimi" placeholder="Sinu nimi...">
                        </div>
                        <button type="submit" class="btn btn-primary">Tervita mind</button>
                    </form>
                    
                    <?php if (isset($_GET["nimi"])): ?>
                        <div class="result-box">
                            <?php
                            $nimi = htmlspecialchars($_GET["nimi"]);
                            $nimi = ucfirst(strtolower(trim($nimi)));
                            echo "Tere tulemast, <strong>$nimi</strong>!";
                            ?>
                        </div>
                    <?php endif; ?>
                </section>

                <section class="task-card">
                    <div class="task-header">
                        <h3 class="h4">Tähtede eraldamine</h3>
                    </div>
                    <form method="get" class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Sisesta tekst</label>
                            <input type="text" class="form-control" name="tekst" placeholder="Sisesta midagi huvitavat...">
                        </div>
                        <button type="submit" class="btn btn-info">Eralda tähed</button>
                    </form>
                    
                    <?php if (isset($_GET["tekst"])): ?>
                        <div class="result-box">
                            <?php
                            $tekst = htmlspecialchars($_GET["tekst"]);
                            $tähed = str_split(strtoupper(trim($tekst)));
                            echo implode('.', $tähed);
                            ?>
                        </div>
                    <?php endif; ?>
                </section>

                <section class="task-card">
                    <div class="task-header">
                        <h3 class="h4">Sõnade puhastamine</h3>
                        <p class="text-muted small">Filtreerib välja sobimatud sõnad</p>
                    </div>
                    <form method="get" class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Sisesta lause</label>
                            <input type="text" class="form-control" name="lause" placeholder="Kirjuta oma sõnum...">
                        </div>
                        <button type="submit" class="btn btn-warning">Puhasta tekst</button>
                    </form>
                    
                    <?php if (isset($_GET["lause"])): ?>
                        <div class="result-box">
                            <?php
                            $lause = htmlspecialchars($_GET["lause"]);
                            $must_list = ["kaka", "pepu", "peerukott"];
                            $puhas = str_ireplace($must_list, "***", $lause);
                            echo $puhas;
                            ?>
                        </div>
                    <?php endif; ?>
                </section>

                <section class="task-card">
                    <div class="task-header">
                        <h3 class="h4">eposti aadressi genereerimine</h3>
                    </div>
                    <form method="get" class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Sisesta oma nimi</label>
                            <input type="text" class="form-control" name="nimi_email" placeholder="Ees- ja perenimi">
                        </div>
                        <button type="submit" class="btn btn-success">Loo meil</button>
                    </form>
                    
                    <?php if (isset($_GET["nimi_email"])): ?>
                        <div class="result-box">
                            <?php
                            $nimi = htmlspecialchars($_GET["nimi_email"]);
                            $puhastatud = strtolower(trim($nimi));
                            $asendused = ['ä' => 'a', 'ö' => 'o', 'ü' => 'y', 'õ' => 'o', 'š' => 's', 'ž' => 'z'];
                            $puhastatud = strtr($puhatatud, $asendused);
                            $email = $puhastatud . "@hkhk.edu.ee";
                            echo "Sinu e-posti aadress: <strong>$email</strong>";
                            ?>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>