<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatenotificationsAPIRequest;
use App\Http\Requests\API\UpdatenotificationsAPIRequest;
use App\Models\notifications;
use App\Repositories\notificationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\customers;
/**
 * Class notificationsController
 * @package App\Http\Controllers\API
 */

class notificationsAPIController extends AppBaseController
{
    /** @var  notificationsRepository */
    private $notificationsRepository;

    public function __construct(notificationsRepository $notificationsRepo)
    {
        $this->notificationsRepository = $notificationsRepo;
    }

    /**
     * Display a listing of the notifications.
     * GET|HEAD /notifications
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $notifications = $this->notificationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($notifications->toArray(), 'Notifications retrieved successfully');
    }

    /**
     * Store a newly created notifications in storage.
     * POST /notifications
     *
     * @param CreatenotificationsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatenotificationsAPIRequest $request)
    {
        $input = $request->all();

        $notifications = $this->notificationsRepository->create($input);

        return $this->sendResponse($notifications->toArray(), 'Notifications saved successfully');
    }

    /**
     * Display the specified notifications.
     * GET|HEAD /notifications/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var notifications $notifications */
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            return $this->sendError('Notifications not found');
        }

        return $this->sendResponse($notifications->toArray(), 'Notifications retrieved successfully');
    }

    /**
     * Update the specified notifications in storage.
     * PUT/PATCH /notifications/{id}
     *
     * @param int $id
     * @param UpdatenotificationsAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatenotificationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var notifications $notifications */
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            return $this->sendError('Notifications not found');
        }

        $notifications = $this->notificationsRepository->update($input, $id);

        return $this->sendResponse($notifications->toArray(), 'notifications updated successfully');
    }

    /**
     * Remove the specified notifications from storage.
     * DELETE /notifications/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var notifications $notifications */
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            return $this->sendError('Notifications not found');
        }

        $notifications->delete();

        return $this->sendSuccess('Notifications deleted successfully');
    }

    public function getNotificationPerUser($castumer_id){
        $notifications = notifications::where('customer_id',$castumer_id)->get();
        foreach ($notifications as $key => $notification) {
            $notification->customer= customers::findOrFail($notification->customer_id);
            }
        return $this->sendResponse($notifications->toArray(), 'Notifications retrieved successfully');

    }
}
