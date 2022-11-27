<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'company_name',
        'image',
        'start_at',
        'end_at',
        'role',
        'desc'
    ];
}
