<?php

namespace App\Interface;

interface TransactionRepositoryInterface{
    public function getTransactionDataFromSession();
    public function saveTransactionDataToSession($data);

    public function saveTransaction($data);

    public function getTransactionByCode($code);
}
