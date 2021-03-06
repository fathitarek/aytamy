<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatejobsAPIRequest;
use App\Http\Requests\API\UpdatejobsAPIRequest;
use App\Models\jobs;
use App\Repositories\jobsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class jobsController
 * @package App\Http\Controllers\API
 */

class jobsAPIController extends AppBaseController
{
    /** @var  jobsRepository */
    private $jobsRepository;

    public function __construct(jobsRepository $jobsRepo)
    {
        $this->jobsRepository = $jobsRepo;
    }

    /**
     * Display a listing of the jobs.
     * GET|HEAD /jobs
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        // $jobs = $this->jobsRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );
        $jobs =  jobs::select('id','name_'.app()->getLocale().' as name')->get();

        return $this->sendResponse($jobs->toArray(), 'Jobs retrieved successfully');
    }

    /**
     * Store a newly created jobs in storage.
     * POST /jobs
     *
     * @param CreatejobsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatejobsAPIRequest $request)
    {
        $input = $request->all();

        $jobs = $this->jobsRepository->create($input);

        return $this->sendResponse($jobs->toArray(), 'Jobs saved successfully');
    }

    /**
     * Display the specified jobs.
     * GET|HEAD /jobs/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var jobs $jobs */
        $jobs = $this->jobsRepository->find($id);

        if (empty($jobs)) {
            return $this->sendError('Jobs not found');
        }

        return $this->sendResponse($jobs->toArray(), 'Jobs retrieved successfully');
    }

    /**
     * Update the specified jobs in storage.
     * PUT/PATCH /jobs/{id}
     *
     * @param int $id
     * @param UpdatejobsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatejobsAPIRequest $request)
    {
        $input = $request->all();

        /** @var jobs $jobs */
        $jobs = $this->jobsRepository->find($id);

        if (empty($jobs)) {
            return $this->sendError('Jobs not found');
        }

        $jobs = $this->jobsRepository->update($input, $id);

        return $this->sendResponse($jobs->toArray(), 'jobs updated successfully');
    }

    /**
     * Remove the specified jobs from storage.
     * DELETE /jobs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var jobs $jobs */
        $jobs = $this->jobsRepository->find($id);

        if (empty($jobs)) {
            return $this->sendError('Jobs not found');
        }

        $jobs->delete();

        return $this->sendSuccess('Jobs deleted successfully');
    }
}
