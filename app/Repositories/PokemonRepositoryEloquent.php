<?php

namespace Portal\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Portal\Repositories\pokemonRepository;
use Portal\Models\Pokemon;
use Portal\Validators\PokemonValidator;

/**
 * Class PokemonRepositoryEloquent
 * @package namespace Portal\Repositories;
 */
class PokemonRepositoryEloquent extends BaseRepository implements PokemonRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pokemon::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
