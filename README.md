# PHPVSCODE
-- index

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
     include('menu.php');
   ?>
   <h1><marquee>Sistema de Modulos PHP</marquee></h1>
   
</body>
</html>


-- meunu php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <p style="color:orange; background-color:yellow;"> <a href="index.php">principal </a> -
    <a href="pagina1.php">If </a> - 
    <a href="pagina2.php">For </a> - 
    <a href="pagina3.php">Modulos </a> </p>
    
</body>
</html>

-- pag 1 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
     include('menu.php');
   ?>
    <h1>Exemplo de IF</h1>
</body>
</html>

 Pagina 02
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
     include('menu.php');
   ?>
    <h1>Exemplo For - Repetição</h1>
</body>
</html>

-- form parcelas.php

<html>
<head>
    <meta charset="UTF-8">
    <link  href="css/bootstrap.css" rel="stylesheet">
    <title>Sistema de calculos de Parcelas</title>
</head>
    <body>
        <form method="POST" action="desconto.php">
         <center>
            <fieldset>
                <h3>Insira o valor da venda e a quantidade de parcelas:</h3>
                Valor da venda: <input type="text" name="n1"><br><br>
                Quantidade de parcelas: <input type="text" name="n2"><br><br>
                <button type="submit" class="btn btn-primary" name="acao">Enviar</button>
            </fieldset>
         </center>
        </form>
    </body>
</html>

-- desconto.php
<html>
<head>
    <meta charset="UTF-8">
    <link  href="css/bootstrap.css" rel="stylesheet">
    <title>Sistema de calculos de Parcelas</title>
</head>
    <body>
        <form method="POST" action="desconto.php">
         <center>
            <fieldset>
                <h3>Insira o valor da venda e a quantidade de parcelas:</h3>
                Valor da venda: <input type="text" name="n1"><br><br>
                Quantidade de parcelas: <input type="text" name="n2"><br><br>
                <button type="submit" class="btn btn-primary" name="acao">Enviar</button>
            </fieldset>
         </center>
        </form>
    </body>
</html>

-- form_emprestimo.php

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulação de Empréstimo</title>
    <link rel="stylesheet" href="emprestimo.css">
</head>
<body>
    <div class="container">
        <h1>Simulação de Emprestimo</h1>
        <form method="post" action="emprestimo.php">
            <label for="valor">Valor do Emprestimo (R$):</label>
            <input type="number" id="valor" name="valor" required step="0.01">

            <label for="taxa">Taxa de Juros Anual (%):</label>
            <input type="number" id="taxa" name="taxa" required step="0.01">

            <label for="prazo">Prazo do Emprestimo (meses):</label>
            <input type="number" id="prazo" name="prazo" required>

            <button type="submit">Calcular</button>
        </form>

        <?php
        // Exibe os resultados se eles existirem
        if (isset($_GET['resultado'])) {
            $resultado = json_decode($_GET['resultado'], true);
            //serve para converter uma string JSON em um objeto ou array no PHP
            echo "<h2>Resultado da Simulação</h2>";
            echo "<table>";
            echo "<tr><th>Descrição</th><th>Valor</th></tr>";
            echo "<tr><td>Valor do Empréstimo</td><td>R$ " . number_format($resultado['valor'], 2, ',', '.') . "</td></tr>";
            echo "<tr><td>Taxa de Juros Anual</td><td>" . number_format($resultado['taxa'], 2, ',', '.') . "%</td></tr>";
            echo "<tr><td>Prazo (meses)</td><td>" . $resultado['prazo'] . "</td></tr>";
            echo "<tr><td>Total de Juros</td><td>R$ " . number_format($resultado['juros_total'], 2, ',', '.') . "</td></tr>";
            echo "<tr><td>Montante Final</td><td>R$ " . number_format($resultado['montante_final'], 2, ',', '.') . "</td></tr>";
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>

--emprestimo.php

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $valor = floatval($_POST["valor"]);
    $taxa = floatval($_POST["taxa"]);
    $prazo = intval($_POST["prazo"]);

    // Calcula a taxa de juros mensal
    $taxa_mensal = ($taxa / 100) / 12;

    // Calcula o total de juros e o montante final
    $juros_total = $valor * $taxa_mensal * $prazo;
    $montante_final = $valor + $juros_total;

    // Prepara os resultados para exibição
    $resultado = [
        'valor' => $valor,
        'taxa' => $taxa,
        'prazo' => $prazo,
        'juros_total' => $juros_total,
        'montante_final' => $montante_final
    ];

    // Redireciona de volta para o index.php com os resultados
    header("Location: form-emprestimo.php?resultado=" . urlencode(json_encode($resultado)));
    exit();
}
?>

-- emprestimo.css

body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.container {
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    padding: 10px 15px;
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

