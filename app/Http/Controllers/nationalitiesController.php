<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenationalitiesRequest;
use App\Http\Requests\UpdatenationalitiesRequest;
use App\Repositories\nationalitiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class nationalitiesController extends AppBaseController
{
    /** @var  nationalitiesRepository */
    private $nationalitiesRepository;

    public function __construct(nationalitiesRepository $nationalitiesRepo)
    {
        $this->nationalitiesRepository = $nationalitiesRepo;
    }

    /**
     * Display a listing of the nationalities.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $nationalities = $this->nationalitiesRepository->all();

        return view('nationalities.index')
            ->with('nationalities', $nationalities);
    }

    /**
     * Show the form for creating a new nationalities.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('nationalities.create');
    }

    /**
     * Store a newly created nationalities in storage.
     *
     * @param CreatenationalitiesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatenationalitiesRequest $request)
    {
        $input = $request->all();

        $nationalities = $this->nationalitiesRepository->create($input);

        Flash::success('Nationalities saved successfully.');

        return redirect(route('nationalities.index'));
    }

    /**
     * Display the specified nationalities.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            Flash::error('Nationalities not found');

            return redirect(route('nationalities.index'));
        }

        return view('nationalities.show')->with('nationalities', $nationalities);
    }

    /**
     * Show the form for editing the specified nationalities.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            Flash::error('Nationalities not found');

            return redirect(route('nationalities.index'));
        }

        return view('nationalities.edit')->with('nationalities', $nationalities);
    }

    /**
     * Update the specified nationalities in storage.
     *
     * @param int $id
     * @param UpdatenationalitiesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatenationalitiesRequest $request)
    {
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            Flash::error('Nationalities not found');

            return redirect(route('nationalities.index'));
        }

        $nationalities = $this->nationalitiesRepository->update($request->all(), $id);

        Flash::success('Nationalities updated successfully.');

        return redirect(route('nationalities.index'));
    }

    /**
     * Remove the specified nationalities from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $nationalities = $this->nationalitiesRepository->find($id);

        if (empty($nationalities)) {
            Flash::error('Nationalities not found');

            return redirect(route('nationalities.index'));
        }

        $this->nationalitiesRepository->delete($id);

        Flash::success('Nationalities deleted successfully.');

        return redirect(route('nationalities.index'));
    }
}
