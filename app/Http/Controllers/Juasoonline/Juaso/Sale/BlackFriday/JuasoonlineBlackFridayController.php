<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Sale\BlackFriday;

use App\Repositories\Juasoonline\Juaso\Sale\BlackFriday\JuasoonlineBlackFridayRepositoryInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class JuasoonlineBlackFridayController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineBlackFridayController constructor.
     * @param JuasoonlineBlackFridayRepositoryInterface $juasoonlineBlackFridayRepository
     */
    public function __construct( JuasoonlineBlackFridayRepositoryInterface $juasoonlineBlackFridayRepository )
    {
        $this -> theRepository = $juasoonlineBlackFridayRepository;
    }

    /**
     * @return JsonResponse
     */
    public function getSales() : JsonResponse
    {
        return $this -> theRepository -> getSales();
    }

    /**
     * @return JsonResponse
     */
    public function getProductCategories() : JsonResponse
    {
        return $this -> theRepository -> getProductCategories();
    }
}
