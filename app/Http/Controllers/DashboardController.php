<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\StockAudit;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $statistics = [
            'products' => Product::count(),
            'transactions' => Transaction::count(),
            'audits' => StockAudit::count(),
            'users' => User::count(),
        ];

        return view('dashboard', compact('user', 'statistics'));
    }
}
