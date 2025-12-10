<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name','order'];

    public function faqs()
    {
        return $this->hasMany(Faq::class)->orderBy('order');
    }
}

