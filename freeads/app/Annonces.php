<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{
    protected $fillable =['title','content','price','image'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
