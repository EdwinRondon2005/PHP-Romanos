<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <title>Convertidor</title>
        <link rel = "stylesheet" href = "Style.css">
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin = "anonymous">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><h1>Convertidor de arábigos a romanos</h1></li>
                </ul>
            </nav>
        </header>
        <section class = "contenido wrapper">
            <center>
                <form method = "post">
                    <label><b>Ingresa el número que quieres convertir:</b></label>
                    <input type = "text" name = "num" autocomplete = "off" placeholder = "1 -> I // 10 -> X" required>
                    <button type = "submit">
                        <i class = "fas fa-sync"></i>  Convertir
                    </button>

                    <?php
                        
                        echo "<br><br><br>";

                        $no_entero = $_POST['num'];

                        if(filter_var($no_entero, FILTER_VALIDATE_INT) === false)
                        {
                            echo "<p>El número no debe ser mayor a <b>3000</b> ni menor a <b>1</b> y sólo debe contener <b>números enteros</b>.</p>";
                        }
                        else
                        {
                            if($_POST['num'] > 0 && $_POST['num'] <= 3000)
                            {
                                echo "<p>" . $_POST['num'] . " en numeración romana es  <b>" . convertirNum($_POST['num']) . "</b>.</p>";
                            }
                            else
                            {
                                echo "<p>El número no debe ser mayor a <b>3000</b> ni menor a <b>1</b> y sólo debe contener <b>números enteros</b>.</p>";
                            } 
                        }   
                    ?>
                </form>
            </center>
        </section>

        <?php

            function convertirNum($n)
            {
                $n =  $_POST['num'];
                $results = '';
                
                $temp_romanos = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

                foreach ($temp_romanos as $romanos => $numb) 
                {
                    $matches = ($n / $numb);
                        
                    $results .= str_repeat($romanos, $matches);
                        
                    $n = $n % $numb;
                }

                return $results;   
            }
        ?>
    </body>
</html>