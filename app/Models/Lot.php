<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_lot');
    }

    public function getShortDescription(): string
    {
        return Str::words($this->description, 20);
    }


}
