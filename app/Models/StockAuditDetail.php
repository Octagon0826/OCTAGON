<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAuditDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'audit_id',
        'product_id',
        'system_stock',
        'actual_stock',
        'difference',
    ];

    protected $casts = [
        'system_stock' => 'integer',
        'actual_stock' => 'integer',
        'difference' => 'integer',
    ];

    public function audit()
    {
        return $this->belongsTo(StockAudit::class, 'audit_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}