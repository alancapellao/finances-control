<?php

namespace App\Controllers;

use App\Models\Transaction;
use App\Models\Error;

class TransactionController
{
    private $transaction;
    private $error;

    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->error = new Error();
    }

    public function index(): void
    {
        $transactions = $this->transaction->getTransactions();
        $entry = $this->transaction->sumEntry();
        $exit = $this->transaction->sumExit();

        include('../app/views/control/index.php');
    }

    public function store(): void
    {
        $description = strip_tags($_POST['desc']);
        $amount = strip_tags($_POST['amount']);
        $amount = str_replace(',', '.', str_replace('.', '', $amount));
        $type = strip_tags($_POST['type']);

        if (!$this->transaction->insertTransaction($description, $amount, $type)) {
            $this->error->error500();
            return;
        }

        header('Location: /control');
    }

    public function destroy(): void
    {
        $id = explode('/', $_GET['uri'])[2] ?? '';

        if (!isset($id) || !is_numeric($id) || !$this->transaction->deleteTransaction($id)) {
            $this->error->error500();
            return;
        }

        header('Location: /control');
    }
}
