INDEX
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Custo de Material</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Calculadora de Custo de Materiais</h2>
    <form action="control.php" method="post">
        <label for="tijolos">Quantidade de Tijolos:</label>
        <input type="number" name="tijolos" required><br><br>

        <label for="preco_tijolo">Preço por Tijolo:</label>
        <input type="text" name="preco_tijolo" required><br><br>

        <label for="cimento">Quantidade de Sacos de Cimento:</label>
        <input type="number" name="cimento" required><br><br>

        <label for="preco_cimento">Preço por Saco de Cimento:</label>
        <input type="text" name="preco_cimento" required><br><br>

        <label for="areia">Quantidade de Areia (m³):</label>
        <input type="text" name="areia" required><br><br>

        <label for="preco_areia">Preço por Metro Cúbico de Areia:</label>
        <input type="text" name="preco_areia" required><br><br>

        <button type="submit">Calcular</button>
    </form>
</body>
</html>


ENTIDADE
<?php
class Material {
    public $tijolos;
    public $preco_tijolo;
    public $cimento;
    public $preco_cimento;
    public $areia;
    public $preco_areia;

    public function __construct($tijolos, $preco_tijolo, $cimento, $preco_cimento, $areia, $preco_areia) {
        $this->tijolos = $tijolos;
        $this->preco_tijolo = $preco_tijolo;
        $this->cimento = $cimento;
        $this->preco_cimento = $preco_cimento;
        $this->areia = $areia;
        $this->preco_areia = $preco_areia;
    }

    public function calcularCustoTotal() {
        return ($this->tijolos * $this->preco_tijolo) +
               ($this->cimento * $this->preco_cimento) +
               ($this->areia * $this->preco_areia);
    }
}
?>




CONTROL
<?php
require_once __DIR__ . '/entidade.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tijolos = $_POST['tijolos'];
    $preco_tijolo = $_POST['preco_tijolo'];
    $cimento = $_POST['cimento'];
    $preco_cimento = $_POST['preco_cimento'];
    $areia = $_POST['areia'];
    $preco_areia = $_POST['preco_areia'];

    $material = new Material($tijolos, $preco_tijolo, $cimento, $preco_cimento, $areia, $preco_areia);
    $custo_total = $material->calcularCustoTotal();

    echo "<h2>Cálculo do Custo Total</h2>";
    echo "O custo total dos materiais é: <strong>R$ " . number_format($custo_total, 2, ',', '.') . "</strong>";
    echo "<br><br><a href='index.php'>Voltar</a>";
}
?>


CSS
body {
    font-family: Arial, sans-serif;
    background-color: #a09191;
    text-align: center;
    margin: 0;
    padding: 0;
}


.container {
    width: 50%;
    background: rgb(172, 170, 170);
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}


h2 {
    color: #1d1c1c;
}


label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
    text-align: left;
}


input {
    width: 80%;
    padding: 6px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}


button {
    background: #f1f1f1;
    color: rgb(8, 7, 7);
    border: none;
    padding: 10px;
    margin-top: 15px;
    width: 50%;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}

button:hover {
    background: #218838;
}


.resultado {
    width: 50%;
    background: white;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    font-size: 18px;
}

