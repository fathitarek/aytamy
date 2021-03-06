<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecitiesAPIRequest;
use App\Http\Requests\API\UpdatecitiesAPIRequest;
use App\Models\cities;
use App\Repositories\citiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class citiesController
 * @package App\Http\Controllers\API
 */

class citiesAPIController extends AppBaseController
{
    /** @var  citiesRepository */
    private $citiesRepository;

    public function __construct(citiesRepository $citiesRepo)
    {
        $this->citiesRepository = $citiesRepo;
    }

    /**
     * Display a listing of the cities.
     * GET|HEAD /cities
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        // $cities = $this->citiesRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        $cities =  cities::select('id','name_'.app()->getLocale().' as name')->get();
        return $this->sendResponse($cities->toArray(), 'Cities retrieved successfully');
    }

public function getCityWithCountry($id){
    $cities =  cities::select('id','name_'.app()->getLocale().' as name')->where('country_id',$id)->get();
    return $this->sendResponse($cities->toArray(), 'Cities retrieved successfully');
}
    /**
     * Store a newly created cities in storage.
     * POST /cities
     *
     * @param CreatecitiesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatecitiesAPIRequest $request)
    {
        $input = $request->all();

        $cities = $this->citiesRepository->create($input);

        return $this->sendResponse($cities->toArray(), 'Cities saved successfully');
    }

    /**
     * Display the specified cities.
     * GET|HEAD /cities/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var cities $cities */
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            return $this->sendError('Cities not found');
        }

        return $this->sendResponse($cities->toArray(), 'Cities retrieved successfully');
    }

    /**
     * Update the specified cities in storage.
     * PUT/PATCH /cities/{id}
     *
     * @param int $id
     * @param UpdatecitiesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatecitiesAPIRequest $request)
    {
        $input = $request->all();

        /** @var cities $cities */
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            return $this->sendError('Cities not found');
        }

        $cities = $this->citiesRepository->update($input, $id);

        return $this->sendResponse($cities->toArray(), 'cities updated successfully');
    }

    /**
     * Remove the specified cities from storage.
     * DELETE /cities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var cities $cities */
        $cities = $this->citiesRepository->find($id);

        if (empty($cities)) {
            return $this->sendError('Cities not found');
        }

        $cities->delete();

        return $this->sendSuccess('Cities deleted successfully');
    }
}
