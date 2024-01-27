<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'url'];

    protected $table = 'sounds';

    public function picture(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Picture::class);
    }
}
