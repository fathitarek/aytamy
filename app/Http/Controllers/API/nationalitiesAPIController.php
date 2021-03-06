<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatenationalitiesAPIRequest;
use App\Http\Requests\API\UpdatenationalitiesAPIRequest;
use App\Models\nationalities;
use App\Repositories\nationalitiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class nationalitiesController
 * @package App\Http\Controllers\API
 */

class nationalitiesAPIController extends AppBaseController
{
    /** @var  nationalitiesRepository */
    private $nationalitiesRepository;

    public function __construct(nationalitiesRepository $nationalitiesRepo)
    {
        $this->nationalitiesRepository = $nationalitiesRepo;
    }

    /**
     * Display a listing of the nationalities.
     * GET|HEAD /nationalities
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        // $nationalities = $this->nationalitiesRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        $nationalities =  nationalities::select('id','name_'.app()->getLocale().' as name')->get();

        return $this->sendResponse($nationalities->toArray(), 'Nationalities retrieved successfully');
    }

    /**
     * Store a newly created nationalities in storage.
     * POST /nationalities
     *
     * @param CreatenationalitiesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatenationalitiesAPIRequest $request)
    {
        $input = $request->all();

        $nationalities = $this->nationalitiesRepository->create($input);

        return $this->sendResponse($nationalities->toArray(), 'Nationalities saved successfully');
    }

    /**
     * Display the specified nationalities.
     * GET|HEAD /nationalities/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var nationalities $nationalities */
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            return $this->sendError('Nationalities not found');
        }

        return $this->sendResponse($nationalities->toArray(), 'Nationalities retrieved successfully');
    }

    /**
     * Update the specified nationalities in storage.
     * PUT/PATCH /nationalities/{id}
     *
     * @param int $id
     * @param UpdatenationalitiesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatenationalitiesAPIRequest $request)
    {
        $input = $request->all();

        /** @var nationalities $nationalities */
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            return $this->sendError('Nationalities not found');
        }

        $nationalities = $this->nationalitiesRepository->update($input, $id);

        return $this->sendResponse($nationalities->toArray(), 'nationalities updated successfully');
    }

    /**
     * Remove the specified nationalities from storage.
     * DELETE /nationalities/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var nationalities $nationalities */
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            return $this->sendError('Nationalities not found');
        }

        $nationalities->delete();

        return $this->sendSuccess('Nationalities deleted successfully');
    }
}
