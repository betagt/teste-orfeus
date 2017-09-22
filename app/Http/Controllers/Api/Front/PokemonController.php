<?php

namespace Portal\Http\Controllers\Api\Front;

use Modules\Core\Criteria\NewsletterCriteria;
use Modules\Core\Repositories\NewsletterRepository;
use Portal\Http\Controllers\BaseController;
use Portal\Http\Requests\PekemonRequest;
use Portal\Repositories\PokemonRepository;

class PokemonController extends BaseController
{
    /**
     * @var NewsletterRepository
     */
    private $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepository)
    {
        parent::__construct($pokemonRepository, NewsletterCriteria::class);
        $this->pokemonRepository = $pokemonRepository;
    }

    public function getValidator($id = null)
    {
        $this->validator = (new PekemonRequest())->rules($id);
        return $this->validator;
    }
}
