<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordSmartItem extends Model
{
    protected $fillable = [
        'wordsmart_list_id',
        'left_word',
        'right_word',
        'order',
    ];

    public function list()
    {
        return $this->belongsTo(WordsmartList::class, 'wordsmart_list_id');
    }

}
