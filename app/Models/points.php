<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class points extends Model
{
    use HasFactory;

    protected $table = 'points';

    public $timestamps = true;
}
