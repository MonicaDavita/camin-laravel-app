<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'category',
        'open_time',
        'close_time',
        'quota',
    ];

    public $timestamps = false;

    public function Category()
    {
        return $this->hasMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
