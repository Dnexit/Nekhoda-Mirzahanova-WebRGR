<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeratorModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'nickname';
    public $incrementing = false;
    public $keyType = 'string';
}
