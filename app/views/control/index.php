<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Controle Financeiro</title>
</head>

<body>
    <main>
        <div class="container">
            <h1 class="title">Controle Financeiro</h1>
        </div>

        <div class="resume">
            <div>
                <h1>
                    <i>Entradas</i>
                    <i class='bx bx-chevron-up-circle'></i>
                </h1>
                <br>
                <span class="incomes">R$
                    <?= number_format(floatval($entry), 2, ',', '.') ?>
                </span>
            </div>
            <div>
                <h1>
                    <i>Saídas</i>
                    <i class='bx bx-chevron-down-circle'></i>
                </h1>
                <br>
                <span class="expenses">R$
                    <?= number_format(floatval($exit), 2, ',', '.') ?>
                </span>
            </div>
            <div>
                <h1>
                    <i>Total</i>
                    <i class='bx bx-dollar'></i>
                </h1>
                <br>
                <span class="total">R$
                    <?= number_format(floatval($entry) + floatval($exit), 2, ',', '.') ?>
                </span>
            </div>
        </div>
        <form action="/control/criar" method="POST">
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
                    <?php foreach ($transactions as $transaction) : ?>
                        <tr>
                            <td><?= htmlspecialchars($transaction['descricao'], ENT_QUOTES) ?></td>
                            <td class="money">R$ <?= number_format(floatval($transaction['valor']), 2, '.', ',') ?></td>
                            <td class="columnType"><i class="bx bxs-chevron-<?= $transaction['tipo'] == 'Entrada' ? 'up' : 'down' ?>-circle"></i></td>
                            <td class="columnAction">
                                <a href="/control/deletar/<?= $transaction['id'] ?>"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>