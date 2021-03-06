<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecountriesAPIRequest;
use App\Http\Requests\API\UpdatecountriesAPIRequest;
use App\Models\countries;
use App\Repositories\countriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class countriesController
 * @package App\Http\Controllers\API
 */

class countriesAPIController extends AppBaseController
{
    /** @var  countriesRepository */
    private $countriesRepository;

    public function __construct(countriesRepository $countriesRepo)
    {
        $this->countriesRepository = $countriesRepo;
    }

    /**
     * Display a listing of the countries.
     * GET|HEAD /countries
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        // $countries = $this->countriesRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        $countries =  countries::select('id','name_'.app()->getLocale().' as name')->get();
        return $this->sendResponse($countries->toArray(), 'Countries retrieved successfully');
    }

    
    /**
     * Store a newly created countries in storage.
     * POST /countries
     *
     * @param CreatecountriesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatecountriesAPIRequest $request)
    {
        $input = $request->all();

        $countries = $this->countriesRepository->create($input);

        return $this->sendResponse($countries->toArray(), 'Countries saved successfully');
    }

    /**
     * Display the specified countries.
     * GET|HEAD /countries/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var countries $countries */
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            return $this->sendError('Countries not found');
        }

        return $this->sendResponse($countries->toArray(), 'Countries retrieved successfully');
    }

    /**
     * Update the specified countries in storage.
     * PUT/PATCH /countries/{id}
     *
     * @param int $id
     * @param UpdatecountriesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatecountriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var countries $countries */
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            return $this->sendError('Countries not found');
        }

        $countries = $this->countriesRepository->update($input, $id);

        return $this->sendResponse($countries->toArray(), 'countries updated successfully');
    }

    /**
     * Remove the specified countries from storage.
     * DELETE /countries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var countries $countries */
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            return $this->sendError('Countries not found');
        }

        $countries->delete();

        return $this->sendSuccess('Countries deleted successfully');
    }
}
