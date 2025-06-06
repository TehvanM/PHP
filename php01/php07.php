 <!-- Tehvan Marjapuu 
Harjutus 7 -->

<!doctype html>
<html lang="et">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Harjutused</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
<body>
    <div class="container">
        <h1>Harjutus 07</h1>
        <div class="row">
            <div class="col-md-4">
                <?php


                function tervitus(){
                    echo "Tere päiksekesekene!";
                }
                Tervitus();
                echo "<br><br>";




                    echo "<br>";
                    echo "<h2>Liitu uudisega</h2>";

                    function uudiskiri(){
                        return '<form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Liitun!</button>
                    </form>';

                    }

                    echo uudiskiri();

                    echo "<br>";
                ?>



                    <h2>Kasutaja ja  email</h2>

                    <form action="" method="get">
                        <div class="mb-3">
                            <label class="form-label">Sisesta kasutajanimi</label>
                            <input type="text" class="form-control" name="kasutaja">
                        </div>
                        <button type="submit" class="btn btn-primary">Saada</button>
                    </form>  
                
                <?php
                    
                    function kasutaja($kasutajanimi){
                        $kasutajanimi = strtolower($kasutajanimi);
                        $email = "$kasutajanimi@hkhk.edu.ee";
                        $kood = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 7);
                        return "Kasutajanimi: $kasutajanimi <br> Email: $email <br> Kood: $kood";
                    }

                    if(isset($_GET['kasutaja'])){
                        echo kasutaja($_GET['kasutaja']);
                    }

                    echo '<br>';

                    

                ?>

                <h2>Arvud</h2>

                <form action="" method="get">
                    <div class="mb-3">
                        <label class="form-label">esimene arv</label>
                        <input type="number" class="form-control" name="arvees">
                    </div>


                    <div class="mb-3">
                        <label class="form-label"
                            >viimne arv</label>
                        <input type="number" class="form-control" name="arvtaga">
                    </div>



                    <div class="mb-3">
                        <label class="form-label">pikkus</label>
                        <input type="number" class="form-control" name="pikk">
                    </div>
                    <button type="submit" class="btn btn-primary">Saada</button>
                </form>


                <?php
                    
                    function arvud($arvees, $arvtaga, $pikk) {

                        for ($arv = $arvees; $arv <= $arvtaga; $arv += $pikk) {
                             echo "$arv";
                            echo ", ";
                        }
                    }
                    
                    if (isset($_GET['arvees'], $_GET['arvtaga'], $_GET['pikk'])) {
                                 $arvees = $_GET['arvees'];
                            $arvtaga = $_GET['arvtaga'];
                        $pikk = $_GET['pikk'];
                    
                        arvud($arvees, $arvtaga, $pikk);

                    }
                    echo '<br>';
                    


                ?>

                <h2>Ristküliku pindala</h2>

                <form action="" method="get">
                    <div class="mb-3">
                        <label class="form-label">kylg A</label>
                        <input type="number" class="form-control" name="a">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">kylg B</label>
                        <input type="number" class="form-control" name="b">
                    </div>
                    <button type="submit" class="btn btn-primary">Saada</button>
                </form>


                <?php
                    
                function pindala($a, $b){
                    $pindala = 2*($a+$b);
                    return $pindala;
                }
                if (isset($_GET['a'], $_GET['b'])) {
                    $a = $_GET['a'];
                    $b = $_GET['b'];
                    echo "Ristküliku pindala on ".pindala($a, $b);
                }

                echo '<br>';
                ?>

                <h2>Isikukood</h2>

                <form action="" method="get">
                    <div class="mb-3">
                        <label class="form-label">Sisesta isikukood</label>
                        <input type="number" class="form-control" name="isikukood">
                    </div>
                    <button type="submit" class="btn btn-primary">Saada</button>
                </form>


                <?php
                    function isikukood($isikukood){
                        $isikukood = strval($isikukood);
                        if(strlen($isikukood) == 11){
                            $sugu = substr($isikukood, 0, 1);
                            if($sugu % 2 == 0){
                                $sugu = "naine";
                            }else{
                                $sugu = "mees";
                            }

                            $sunniaeg = substr($isikukood, 1, 2) . "." . substr($isikukood, 3, 2) . "." . substr($isikukood, 5, 2);
                            return "sugu: $sugu <br> Sünniaeg: $sunniaeg";
                        }else{
                            return "Isikukood on vale ";
                        }

                    }
                    if(isset($_GET['isikukood'])){
                        echo isikukood($_GET['isikukood']);
                    }
              

                echo '<br>';
                ?>


                <h2>Head mõtted</h2>
                
                <?php
                function motted(){
                    $alus = array("audi", "mario", "roomet", "emme", "koolilaps");
                    $oeldis = array("on", "vb tahab", "ei ole olema", "ei kannata",);
                    $sihitis = array("päikest", "mehi", "raha", "naisi");
                    $sonaa = $alus[array_rand($alus)];
                    $sonab = $oeldis[array_rand($oeldis)];
                    $sonac = $sihitis[array_rand($sihitis)];
                    return "$sonaa $sonab $sonac";
                }
                echo motted();

                ?>



            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>