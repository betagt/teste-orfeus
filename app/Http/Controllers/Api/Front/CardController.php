<?php

namespace Portal\Http\Controllers\Api\Front;

use Illuminate\Http\Request;
use Modules\Core\Criteria\NewsletterCriteria;
use Modules\Core\Repositories\NewsletterRepository;
use Modules\Core\Repositories\UserRepository;
use Portal\Criteria\CardCriteria;
use Portal\Http\Controllers\BaseController;
use Portal\Http\Requests\CardRequest;
use Portal\Http\Requests\PekemonRequest;
use Portal\Repositories\CardRepository;
use Portal\Repositories\PokemonRepository;

class CardController extends BaseController
{
    /**
     * @var NewsletterRepository
     */
    private $cardRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        CardRepository $cardRepository,
        UserRepository $userRepository)
    {
        parent::__construct($cardRepository, CardCriteria::class);
        $this->cardRepository = $cardRepository;
        $this->userRepository = $userRepository;
    }

    public function getValidator($id = null)
    {
        $this->validator = (new CardRequest())->rules($id);
        return $this->validator;
    }

    public function addCards(Request $request, $id){
        $data = $request->only('cards');
        \Validator::make($data, ['cards'=>'required|array'])->validate();
        $user = $this->userRepository->skipPresenter(true)->find($id);
        $user->cards()->sync($data['cards']);
        return $this->userRepository->skipPresenter(false)->find($id);
    }


}
