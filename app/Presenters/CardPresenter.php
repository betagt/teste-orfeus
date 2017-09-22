<?php

namespace Portal\Presenters;

use Portal\Transformers\CardTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CardPresenter
 *
 * @package namespace Portal\Presenters;
 */
class CardPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CardTransformer();
    }
}
