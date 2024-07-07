<?php 
$dia=$_GET['dia']??01;
$mes=$_GET['mes']??01;
$ano=$_GET['ano']??1970;
$data=new DateTime();
$ano_actual=$data->format('Y');
$mes_actual=$data->format('m');
$dia_actual=$data->format('d');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Idade Online</title>
    <link rel="stylesheet" href="style.css">
    <style>
          main{
            margin-top: 40px;
            margin-bottom: 30px;
            height: 395px;
        }
        main h1{
            margin-top: 25px;
            margin-bottom: 30px;}
            input{
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            width: 50%;
            height: 25px;
            margin-left: 125px;
        }
        label{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 1.1em;
            text-align: center;
            display: block;
            margin: auto;
            margin-bottom: 15px;}
            section{
            border: 1px rgba(0, 0, 0, 0.397) solid;
            border-radius: 20px;
            display: block;
            margin: auto;
            background-color: white;
            width: 500px;
            height: 100px;
        }
        p{
          margin-top: 40px;
        }
    </style>
</head>
<body>
    <main>
    <h1>CALCULANDO IDADE</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="dia">Digite o dia em que nasceste:</label>
            <input type="number" name="dia" id="" placeholder="<?=$dia?>">
           
            <label for="mes">Digite o Mês em que nasceste (Compreensão):</label>
            <input type="number" name="mes" id="" placeholder="<?=$mes?>">
           
            <label for="ano">Digite o ano em que nasceste:</label>
            <input type="number" name="ano" id="" minlength="4" placeholder="<?=$ano?>">
            <input type="submit" value="Enviar" class="calcular" style="height:32px">
        </form>
            
</main>
</body>
</html>

<?php 
if(empty($dia)|| empty($mes)|| empty($ano)){
    die('<p style="text-align: center; font-size: 1.3em;">Preencha os Campos!</p>');
}
 if ($dia<=0 || $dia>31) {
    die('<p style="text-align: center; font-size: 1.3em;">Os dias variam de 01 à 31!</p>');
}
if ($mes<=0 || $mes>12) {
    die('<p style="text-align: center; font-size: 1.3em;">Os meses variam de 01 à 12!</p>');
}
if ($ano<1904 || $ano>$ano_actual) {
    die('<p style="text-align: center; font-size: 1.3em;">Os anos variam de 1904 à '.$ano_actual. '</p>');
}
if ($dia<=0 || $dia>31 && $mes<=0 || $mes>12 ) {
    die('<p style="text-align: center; font-size: 1.3em;">Os meses variam de 01 à 12 e Os dias variam de 01 à 31!</p>');
}

else{ 
$idade=0;

    if($ano<=$ano_actual && $mes<=$mes_actual && $dia>=$dia_actual){
        $idade=$ano_actual-$ano;
    }
    if($ano <= $ano_actual && $mes >= $mes_actual && $dia > $dia_actual || $ano > $ano_actual && $mes < $mes_actual  || $mes > $mes_actual && $ano > $ano_actual || $mes > $mes_actual && $ano <$ano_actual)
    {
        $idade=($ano_actual-$ano)-1;
    }

    if($dia < $dia_actual && $mes == $mes_actual && $ano<$ano_actual ){
            $idade=$ano_actual-$ano;
    }
}



?>

<section> 
        <p>A sua idade é: <?=$idade!=1?"$idade anos":"1 ano"?></p>
    </section>
    <footer>&copy; Criado pelo Helson Correia</footer>