<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyDate extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'applyDate',
    ];
}
