<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordSmartList extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'left_list',
        'right_list',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(WordsmartItem::class)->orderBy('order');
    }

}
