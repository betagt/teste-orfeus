<?php

namespace Portal\Transformers;

use League\Fractal\TransformerAbstract;
use Portal\Models\Card;

/**
 * Class CardTransformer
 * @package namespace Portal\Transformers;
 */
class CardTransformer extends TransformerAbstract
{

    /**
     * Transform the \Card entity
     * @param \Card $model
     *
     * @return array
     */
    public function transform(Card $model)
    {
        return [
            'id' => (int)$model->id,
            'id_card_pai' => (int)$model->id,
            'pai_name' => (string)($model->pai) ? $model->pai->nome : null,
            'nome' => (string)$model->nome,
            'pais' => !($model->pais->count() == 0)?$model->pais->toArray(): null,
            'filhos' => ($model->filhos->count() == 0)?$model->filhos->toArray(): null,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

}
