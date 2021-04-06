<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenotificationsRequest;
use App\Http\Requests\UpdatenotificationsRequest;
use App\Repositories\notificationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class notificationsController extends AppBaseController
{
    /** @var  notificationsRepository */
    private $notificationsRepository;

    public function __construct(notificationsRepository $notificationsRepo)
    {
        $this->notificationsRepository = $notificationsRepo;
    }

    /**
     * Display a listing of the notifications.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $notifications = $this->notificationsRepository->all();

        return view('notifications.index')
            ->with('notifications', $notifications);
    }

    /**
     * Show the form for creating a new notifications.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created notifications in storage.
     *
     * @param CreatenotificationsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatenotificationsRequest $request)
    {
        $input = $request->all();

        $notifications = $this->notificationsRepository->create($input);
return $notifications;
       // Flash::success('Notifications saved successfully.');

       // return redirect(route('notifications.index'));
    }

    /**
     * Display the specified notifications.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        return view('notifications.show')->with('notifications', $notifications);
    }

    /**
     * Show the form for editing the specified notifications.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        return view('notifications.edit')->with('notifications', $notifications);
    }

    /**
     * Update the specified notifications in storage.
     *
     * @param int $id
     * @param UpdatenotificationsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatenotificationsRequest $request)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        $notifications = $this->notificationsRepository->update($request->all(), $id);

        Flash::success('Notifications updated successfully.');

        return redirect(route('notifications.index'));
    }

    /**
     * Remove the specified notifications from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        $this->notificationsRepository->delete($id);

        Flash::success('Notifications deleted successfully.');

        return redirect(route('notifications.index'));
    }
}
