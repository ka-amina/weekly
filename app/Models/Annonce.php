<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    /** @use HasFactory<\Database\Factories\AnnonceFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title', 
        'description', 
        'price', 
        'image', 
        'user_id', 
        'categorie_id', 
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
