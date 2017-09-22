<?php

namespace Portal\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Card extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id_card_pai',
        'nome',
    ];

    function pai(){
        return $this->belongsTo(Card::class, 'id_card_pai');
    }

    function pais(){
        return $this->hasMany(Card::class, 'id', 'id_card_pai');
    }

    function filhos(){
        return $this->hasMany(Card::class, 'id_card_pai', 'id');
    }



}
