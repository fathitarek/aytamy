<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecountriesRequest;
use App\Http\Requests\UpdatecountriesRequest;
use App\Repositories\countriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class countriesController extends AppBaseController
{
    /** @var  countriesRepository */
    private $countriesRepository;

    public function __construct(countriesRepository $countriesRepo)
    {
        $this->countriesRepository = $countriesRepo;
    }

    /**
     * Display a listing of the countries.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $countries = $this->countriesRepository->all();

        return view('countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new countries.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created countries in storage.
     *
     * @param CreatecountriesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatecountriesRequest $request)
    {
        $input = $request->all();

        $countries = $this->countriesRepository->create($input);

        Flash::success('Countries saved successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Display the specified countries.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        return view('countries.show')->with('countries', $countries);
    }

    /**
     * Show the form for editing the specified countries.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        return view('countries.edit')->with('countries', $countries);
    }

    /**
     * Update the specified countries in storage.
     *
     * @param int $id
     * @param UpdatecountriesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatecountriesRequest $request)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        $countries = $this->countriesRepository->update($request->all(), $id);

        Flash::success('Countries updated successfully.');

        return redirect(route('countries.index'));
    }

    /**
     * Remove the specified countries from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $countries = $this->countriesRepository->find($id);

        if (empty($countries)) {
            Flash::error('Countries not found');

            return redirect(route('countries.index'));
        }

        $this->countriesRepository->delete($id);

        Flash::success('Countries deleted successfully.');

        return redirect(route('countries.index'));
    }
}
