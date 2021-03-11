<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "id";

    protected $fillable = [
        'title', 'slug', 'description'
    ];

    // protected $guarded = ['id'];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'categories_has_news', 'category_id', 'news_id');
    }

    public function newsTmp(): HasMany
    {

        return $this->hasMany(NewsTmp::class, 'caregory_id', 'id');
    }
}
