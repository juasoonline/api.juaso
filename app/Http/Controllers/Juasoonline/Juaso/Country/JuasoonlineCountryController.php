<?php

namespace App\Http\Controllers\Juasoonline\Juaso\Country;

use App\Models\Juaso\Resource\Country\Country;
use App\Repositories\Juasoonline\Juaso\Country\JuasoonlineCountryRepositoryInterface;
use App\Models\Juaso\Resource\Variant\Brand\Brand;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class JuasoonlineCountryController extends Controller
{
    private $theRepository;

    /**
     * JuasoonlineCountryController constructor.
     * @param JuasoonlineCountryRepositoryInterface $juasoonlineCountryRepository
     */
    public function __construct( JuasoonlineCountryRepositoryInterface $juasoonlineCountryRepository )
    {
        $this -> theRepository = $juasoonlineCountryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return $this -> theRepository -> index();
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return JsonResponse
     */
    public function show( Country $country ) : JsonResponse
    {
        return $this -> theRepository -> show( $country );
    }
}
