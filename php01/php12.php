 <!-- Tehvan Marjapuu 
Harjutus 12 -->

<!doctype html>
<html lang="et">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Harjutus 11</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
<body>
    <div class="container">
        <h1>Harjutus 11</h1>
        <div class="row">
            <div class="col-md-4">

                <h2>Sõiduaeg</h2>

                    Lisa alguse aeg <input type="time" name="algus"><br>
                Lisa lõpu aeg <input type="time" name="lopp"><br>
               
             <input type="submit" value="Arvuta">

            </form>
                <?php
                  
                if (isset($_GET['algus']) && isset($_GET['lopp'])) {
                    $algus_aeg = $_GET['algus'];
                    $lopp_aeg = $_GET['lopp'];
                    if (empty($algus_aeg) || empty($lopp_aeg)) {
                        echo "palun korralikult ära täita";
                    } else {

                        $start = DateTime::createFromFormat('H:i', $algus_aeg);
                        $lopp = DateTime::createFromFormat('H:i', $lopp_aeg);
                
                        if ($start && $lopp) {
                            if ($lopp < $start) {
                                $lopp->add(new DateInterval('P1D'));
                            }
                            $erinevus = $start->diff($lopp);
                            echo "Sõiduks kulub " . $erinevus->h . " tundi ja " . $erinevus->i . " minutit.";
                        } else {
                            echo "pane õigesti hh:mm.";
                        }
                    }
                } else {
                    echo "Sisesta algus ja lõpu aeg";
                }

                ?>

                <h3>Palkade võrdlus</h3>

                <?php

                $allikas = 'tootajad.csv';

                $fail = fopen($allikas, 'r');


                $mehed = 0;
                $naised = 0;   

                $meeste_palk = 0;
                $naiste_palk = 0;

                $meeste_max = 0
                $naiste_max = 0;

                while (($rida = fgetcsv($fail, 1000, ';')) !== false) {
                    if (count($rida) < 3) {
                        continue;
                    }
                    
                    $nimi = trim($rida[0]);
                    $sugu = trim($rida[1]);
                    $palk = floatval($rida[2]);

                    if ($sugu === 'm') {
                        $meeste_palk += $palk;
                        $mehed++;
                        if ($palk > $meeste_max) {
                            $meeste_max = $palk;
                        }

                    } elseif ($sugu === 'n') {
                        $naiste_palk += $palk;
                        $naied++;
                        if ($palk > $naiste_max) {
                            $naiste_max = $palk;
                        }
                    }
                }

                fclose($fail);

                $meeste_kesk = ($mehed > 0) ? ($meeste_palk / $mehed) : 0;
                $naiste_kesk = ($naised > 0) ? ($naiste_palk / $naised) : 0;

                echo "Meeste keskmine palk on " . number_format($meeste_kesk, 2) . " ja kõige suurem palk on " . number_format($meeste_max, 2) . ".<br>";
                echo "Naiste keskmine palk on " . number_format($naiste_kesk, 2) . " ja kõige suurem palk on " . number_format($naiste_max, 2) . ".";

                ?>


            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>