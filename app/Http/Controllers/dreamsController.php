<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedreamsRequest;
use App\Http\Requests\UpdatedreamsRequest;
use App\Repositories\dreamsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class dreamsController extends AppBaseController
{
    /** @var  dreamsRepository */
    private $dreamsRepository;

    public function __construct(dreamsRepository $dreamsRepo)
    {
        $this->dreamsRepository = $dreamsRepo;
    }

    /**
     * Display a listing of the dreams.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $dreams = $this->dreamsRepository->all();

        return view('dreams.index')
            ->with('dreams', $dreams);
    }

    /**
     * Show the form for creating a new dreams.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('dreams.create');
    }

    /**
     * Store a newly created dreams in storage.
     *
     * @param CreatedreamsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatedreamsRequest $request)
    {
        $input = $request->all();

        $dreams = $this->dreamsRepository->create($input);

        Flash::success('Dreams saved successfully.');

        return redirect(route('dreams.index'));
    }

    /**
     * Display the specified dreams.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            Flash::error('Dreams not found');

            return redirect(route('dreams.index'));
        }

        return view('dreams.show')->with('dreams', $dreams);
    }

    /**
     * Show the form for editing the specified dreams.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            Flash::error('Dreams not found');

            return redirect(route('dreams.index'));
        }

        return view('dreams.edit')->with('dreams', $dreams);
    }

    /**
     * Update the specified dreams in storage.
     *
     * @param int $id
     * @param UpdatedreamsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatedreamsRequest $request)
    {
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            Flash::error('Dreams not found');

            return redirect(route('dreams.index'));
        }

        $dreams = $this->dreamsRepository->update($request->all(), $id);

        Flash::success('Dreams updated successfully.');

        return redirect(route('dreams.index'));
    }

    /**
     * Remove the specified dreams from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $dreams = $this->dreamsRepository->find($id);

        if (empty($dreams)) {
            Flash::error('Dreams not found');

            return redirect(route('dreams.index'));
        }

        $this->dreamsRepository->delete($id);

        Flash::success('Dreams deleted successfully.');

        return redirect(route('dreams.index'));
    }
}
