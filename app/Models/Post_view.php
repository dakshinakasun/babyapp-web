<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_view extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'read_at'];
}
