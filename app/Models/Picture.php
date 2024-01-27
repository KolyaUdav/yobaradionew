<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'url'];

    protected $table = 'pictures';

    public function sound(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Sound::class);
    }
}
