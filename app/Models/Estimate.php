<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'amount',
        'details',
        'status',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
