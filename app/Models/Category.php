<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Berita;

class Category extends Model
{
    protected $fillable = ['name'];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
