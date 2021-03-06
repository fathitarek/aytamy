<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedreamsAPIRequest;
use App\Http\Requests\API\UpdatedreamsAPIRequest;
use App\Models\dreams;
use App\Repositories\dreamsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class dreamsController
 * @package App\Http\Controllers\API
 */

class dreamsAPIController extends AppBaseController
{
    /** @var  dreamsRepository */
    private $dreamsRepository;

    public function __construct(dreamsRepository $dreamsRepo)
    {
        $this->dreamsRepository = $dreamsRepo;
    }

    /**
     * Display a listing of the dreams.
     * GET|HEAD /dreams
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        // $dreams = $this->dreamsRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        $dreams =  dreams::select('id','name_'.app()->getLocale().' as name')->get();
        return $this->sendResponse($dreams->toArray(), 'Dreams retrieved successfully');
    }

    /**
     * Store a newly created dreams in storage.
     * POST /dreams
     *
     * @param CreatedreamsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatedreamsAPIRequest $request)
    {
        $input = $request->all();

        $dreams = $this->dreamsRepository->create($input);

        return $this->sendResponse($dreams->toArray(), 'Dreams saved successfully');
    }

    /**
     * Display the specified dreams.
     * GET|HEAD /dreams/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var dreams $dreams */
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            return $this->sendError('Dreams not found');
        }

        return $this->sendResponse($dreams->toArray(), 'Dreams retrieved successfully');
    }

    /**
     * Update the specified dreams in storage.
     * PUT/PATCH /dreams/{id}
     *
     * @param int $id
     * @param UpdatedreamsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatedreamsAPIRequest $request)
    {
        $input = $request->all();

        /** @var dreams $dreams */
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            return $this->sendError('Dreams not found');
        }

        $dreams = $this->dreamsRepository->update($input, $id);

        return $this->sendResponse($dreams->toArray(), 'dreams updated successfully');
    }

    /**
     * Remove the specified dreams from storage.
     * DELETE /dreams/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var dreams $dreams */
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            return $this->sendError('Dreams not found');
        }

        $dreams->delete();

        return $this->sendSuccess('Dreams deleted successfully');
    }
}
