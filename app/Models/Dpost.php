<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Dpost extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['etitle','stitle','slug','ehighlight','shighlight','edescription','sdescription','image_path','day','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'etitle'
            ]
        ];
    }
    
}