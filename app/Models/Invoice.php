<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'estimate_id',
        'total',
        'due_date',
        'status',
    ];

    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }
}
