<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(UserModel::class, 'email', 'user_email');
    }
}
