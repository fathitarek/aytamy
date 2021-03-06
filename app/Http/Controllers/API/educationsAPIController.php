<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateeducationsAPIRequest;
use App\Http\Requests\API\UpdateeducationsAPIRequest;
use App\Models\educations;
use App\Repositories\educationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class educationsController
 * @package App\Http\Controllers\API
 */

class educationsAPIController extends AppBaseController
{
    /** @var  educationsRepository */
    private $educationsRepository;

    public function __construct(educationsRepository $educationsRepo)
    {
        $this->educationsRepository = $educationsRepo;
    }

    /**
     * Display a listing of the educations.
     * GET|HEAD /educations
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $educations = $this->educationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $educations =  educations::select('id','name_'.app()->getLocale().' as name')->get();

        return $this->sendResponse($educations->toArray(), 'Educations retrieved successfully');
    }

    /**
     * Store a newly created educations in storage.
     * POST /educations
     *
     * @param CreateeducationsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateeducationsAPIRequest $request)
    {
        $input = $request->all();

        $educations = $this->educationsRepository->create($input);

        return $this->sendResponse($educations->toArray(), 'Educations saved successfully');
    }

    /**
     * Display the specified educations.
     * GET|HEAD /educations/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var educations $educations */
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            return $this->sendError('Educations not found');
        }

        return $this->sendResponse($educations->toArray(), 'Educations retrieved successfully');
    }

    /**
     * Update the specified educations in storage.
     * PUT/PATCH /educations/{id}
     *
     * @param int $id
     * @param UpdateeducationsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateeducationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var educations $educations */
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            return $this->sendError('Educations not found');
        }

        $educations = $this->educationsRepository->update($input, $id);

        return $this->sendResponse($educations->toArray(), 'educations updated successfully');
    }

    /**
     * Remove the specified educations from storage.
     * DELETE /educations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var educations $educations */
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            return $this->sendError('Educations not found');
        }

        $educations->delete();

        return $this->sendSuccess('Educations deleted successfully');
    }
}
