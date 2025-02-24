<?php

namespace App\Repositories;

use App\Models\Room;
use App\Models\Transaction;
use App\Interface\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    // Mengambil data transaksi dari sesi
    public function getTransactionDataFromSession()
    {
        return session('transaction', []);
    }

    // Menyimpan atau memperbarui data transaksi di sesi
    public function saveTransactionDataToSession($data)
    {
        session(['transaction' => array_merge(session('transaction', []), $data)]);
    }

    // Menyimpan transaksi baru dan menghapus sesi transaksi
    public function saveTransaction($data)
    {
        $room = Room::find($data['room_id']);

        $data = $this->prepareTransactionData($data, $room);


        $transaction = Transaction::create($data); // Simpan transaksi di DB

        \Log::info('Transaction Saved', ['transaction' => $transaction]); // Log transaksi yang disimpan

        session()->forget('transaction'); // Hapus session agar tidak bentrok
        return $transaction;
    }

    // Menyiapkan data transaksi sebelum disimpan
    private function prepareTransactionData($data, $room)
    {
        return [
            'code' => $this->generateTransactionCode(),
            'payment_status' => 'pending',
            'transaction_date' => now(),
            'total_amount' => $this->calculatePaymentAmount(
                $this->calculateTotalAmount($room->price_per_month, $data['duration'] ?? 1),
                $data['payment_method'] ?? 'default_method'
            )
        ] + $data;
    }


    public function generateTransactionCode()
    {
        return 'TRX-' . rand(10000, 99999);
    }

    public function calculateTotalAmount($pricePerMonth, $duration)
    {
        $subtotal = $pricePerMonth * $duration;
        $tax = $subtotal * 0.11;
        $insurance = $subtotal * 0.01;
        return $subtotal + $tax + $insurance;
    }

    private function calculatePaymentAmount($total, $paymentMethod)
    {
        return $paymentMethod === 'full_payment' ? $total : $total * 0.3;
    }
}
