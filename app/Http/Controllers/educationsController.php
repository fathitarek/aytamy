<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateeducationsRequest;
use App\Http\Requests\UpdateeducationsRequest;
use App\Repositories\educationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class educationsController extends AppBaseController
{
    /** @var  educationsRepository */
    private $educationsRepository;

    public function __construct(educationsRepository $educationsRepo)
    {
        $this->educationsRepository = $educationsRepo;
    }

    /**
     * Display a listing of the educations.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $educations = $this->educationsRepository->all();

        return view('educations.index')
            ->with('educations', $educations);
    }

    /**
     * Show the form for creating a new educations.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('educations.create');
    }

    /**
     * Store a newly created educations in storage.
     *
     * @param CreateeducationsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateeducationsRequest $request)
    {
        $input = $request->all();

        $educations = $this->educationsRepository->create($input);

        Flash::success('Educations saved successfully.');

        return redirect(route('educations.index'));
    }

    /**
     * Display the specified educations.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            Flash::error('Educations not found');

            return redirect(route('educations.index'));
        }

        return view('educations.show')->with('educations', $educations);
    }

    /**
     * Show the form for editing the specified educations.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            Flash::error('Educations not found');

            return redirect(route('educations.index'));
        }

        return view('educations.edit')->with('educations', $educations);
    }

    /**
     * Update the specified educations in storage.
     *
     * @param int $id
     * @param UpdateeducationsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateeducationsRequest $request)
    {
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            Flash::error('Educations not found');

            return redirect(route('educations.index'));
        }

        $educations = $this->educationsRepository->update($request->all(), $id);

        Flash::success('Educations updated successfully.');

        return redirect(route('educations.index'));
    }

    /**
     * Remove the specified educations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $educations = $this->educationsRepository->find($id);

        if (empty($educations)) {
            Flash::error('Educations not found');

            return redirect(route('educations.index'));
        }

        $this->educationsRepository->delete($id);

        Flash::success('Educations deleted successfully.');

        return redirect(route('educations.index'));
    }
}
