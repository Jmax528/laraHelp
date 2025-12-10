<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['section_id','order','question','answer'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
