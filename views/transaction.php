
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>Income and Expense Tracking</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-color: rgba(248, 241, 231, 0.419);
        }
        .wrap{
            padding-top: 5em;
            padding-bottom: 2em;
        }
        .top{
            margin-left: 4em;
            font-size: 18px;
            margin-bottom: 1em;
            font-weight: 600;
        }
        table, td {
            border: 2px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 0.5em;
        }
        th{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 0.5em;
        }
        table {
            margin: auto;
            width: 90%;
        }
        tfoot{
            text-align: right;
            font-size: 19px;
        }
        header{
            background-color: rgb(52, 154, 195);
            position: fixed;
            width:100%;
            text-align:center;
            font-size: 24px;
            color: white;
            padding: 0.5em;
            font-weight: bold;
        }

        @media (max-width: 750px){
            table, th, td {
                padding: 0.4em;
        }
            table{
                margin: auto;
                font-size:12px;
                width: 90%;
            }
            tfoot{
            font-size: 13px;
        }
        .top{
            margin-left: 1em;
            font-size: 15px;
            margin-bottom: 1em;
            font-weight: 500;
        }
        }
    </style>
</head>

<body>
    <header>
    <p><span style="color: green;">Income</span> and <span style="color: red;">Expense</span> Tracking</p>
    </header>
    <div class="wrap">
        <div class="top">
            <p>Account Name: Sarah Ossai</p>
            <p>Duration: Jan-04-2022 -- Feb-03-2022</p>
        </div>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if (! empty($transactions)): ?>
            <?php foreach($transactions as $transaction): ?>
                <tr>
                    <td><?= formatDate($transaction['date']) ?></td>
                    <td><?= $transaction['checkNumber'] ?></td>
                    <td><?= $transaction['description'] ?></td>
                    <td>
                        <?php if ($transaction['amount'] < 0): ?>
                            <span style="color: red;">
                            <?= formatDollarAmount($transaction['amount']) ?>
                        </span>
                        <?php elseif ($transaction['amount'] > 0): ?>
                            <span style="color:green;">
                            <?= formatDollarAmount($transaction['amount']) ?>
                        </span>
                        <?php else: ?>
                            <?= formatDollarAmount($transaction['amount']) ?>
                            <?php endif ?>
                    </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <th><?= formatDollarAmount($totals['totalIncome']) ?? 0 ?></th>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <th><?= formatDollarAmount($totals['totalExpense']) ?? 0 ?> </th>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <th><?= formatDollarAmount($totals['netTotal']) ?? 0 ?> </th>
            </tr>
        </tfoot>
    </table>
   
 </div>
 <b><p style="text-align:center; margin-bottom:1em; color: rgb(29, 102, 131);">Coded by Sarah Ossai</p></b>
</body>

</html>

