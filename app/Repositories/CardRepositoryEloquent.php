<?php

namespace Portal\Repositories;

use Portal\Presenters\CardPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portal\Repositories\CardRepository;
use Portal\Models\Card;
use Portal\Validators\CardValidator;

/**
 * Class CardRepositoryEloquent
 * @package namespace Portal\Repositories;
 */
class CardRepositoryEloquent extends BaseRepository implements CardRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Card::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CardPresenter::class;
    }
}
