<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'unit',
        'stock',
        'selling_price',
    ];

    protected $casts = [
        'stock' => 'integer',
        'selling_price' => 'decimal:2',
    ];

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function stockAuditDetails()
    {
        return $this->hasMany(StockAuditDetail::class);
    }
}