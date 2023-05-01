<?php
require_once "controller/select.php";
require_once "controller/insert.php";
require_once "controller/sum.php";
require_once "controller/delete.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Controle Financeiro</title>
</head>

<body>

    <main>
        <div class="container">
            <h1>
                <div class="title">Controle Financeiro</div>
            </h1>
        </div>

        <div class="resume">
            <div>
                <h1>
                    <i>Entradas</i>
                    <i class='bx bx-chevron-up-circle'></i>
                </h1>
                <br>
                <span class="incomes">R$
                    <?php
                    $entrada->execute();
                    $result = $entrada->fetchColumn();

                    if ($result == null) {
                        echo "0.00";
                    } else {
                        echo $result;
                    }
                    ?>
                </span>
            </div>
            <div>
                <h1>
                    <i>Saídas</i>
                    <i class='bx bx-chevron-down-circle'></i>
                </h1>
                <br>
                <span class="expenses">R$
                    <?php
                    $saida->execute();
                    $result = $saida->fetchColumn();

                    if ($result == null) {
                        echo "0.00";
                    } else {
                        echo $result;
                    }
                    ?>
                </span>
            </div>
            <div>
                <h1>
                    <i>Total</i>
                    <i class='bx bx-dollar'></i>
                </h1>
                <br>
                <span class="total">R$
                    <?php
                    $total->execute();
                    $result = $total->fetchColumn();

                    if ($result == null) {
                        echo "0.00";
                    } else {
                        echo $result;
                    }
                    ?>
                </span>
            </div>
        </div>
        <form method="post">
            <div class="newItem">
                <div class="divDesc">
                    <label for="desc">Descrição</label>
                    <input type="text" id="desc" name="desc" required />
                </div>
                <div class="divAmount">
                    <label for="amount">Valor</label>
                    <input type="text" id="amount" name="amount" required />
                </div>
                <div class="divType">
                    <label for="type">Tipo</label>
                    <select id="type" name="type">
                        <option>Entrada</option>
                        <option>Saída</option>
                    </select>
                </div>
                <input type="submit" id="submit" name="submit" value="Incluir" class="btnNew">
            </div>
        </form>
        <div class="divTable">
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th class="columnAmount">Valor</th>
                        <th class="columnType">Tipo</th>
                        <th class="columnAction"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql->execute();
                    $fetchControl = $sql->fetchAll();

                    foreach ($fetchControl as $key => $value) {

                        $tipo = ($value['tipo'] === 'Entrada') ? '<i class="bx bxs-chevron-up-circle"></i>' : '<i class="bx bxs-chevron-down-circle"></i>';
                        echo '<tr>';
                        echo '<td>' . $value['descricao'] . '</td>';
                        echo '<td class="money">R$ ' . $value['valor'] . '</td>';
                        echo '<td class="columnType">' . $tipo . '</td>';
                        echo '<td class="columnAction"> 
                        <a href="?delete=' . $value['id'] . '"><i class="bx bx-trash"></i></a>
                    </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script>
        $('#amount').mask("#####.00", {
            reverse: true
        });
    </script>

</body>

</html>