<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelikesRequest;
use App\Http\Requests\UpdatelikesRequest;
use App\Repositories\likesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class likesController extends AppBaseController
{
    /** @var  likesRepository */
    private $likesRepository;

    public function __construct(likesRepository $likesRepo)
    {
        $this->likesRepository = $likesRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the likes.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $likes = $this->likesRepository->all();

        return view('likes.index')
            ->with('likes', $likes);
    }

    /**
     * Show the form for creating a new likes.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('likes.create');
    }

    /**
     * Store a newly created likes in storage.
     *
     * @param CreatelikesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatelikesRequest $request)
    {
        $input = $request->all();

        $likes = $this->likesRepository->create($input);

        Flash::success('Likes saved successfully.');

        return redirect(route('likes.index'));
    }

    /**
     * Display the specified likes.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            Flash::error('Likes not found');

            return redirect(route('likes.index'));
        }

        return view('likes.show')->with('likes', $likes);
    }

    /**
     * Show the form for editing the specified likes.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            Flash::error('Likes not found');

            return redirect(route('likes.index'));
        }

        return view('likes.edit')->with('likes', $likes);
    }

    /**
     * Update the specified likes in storage.
     *
     * @param int $id
     * @param UpdatelikesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatelikesRequest $request)
    {
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            Flash::error('Likes not found');

            return redirect(route('likes.index'));
        }

        $likes = $this->likesRepository->update($request->all(), $id);

        Flash::success('Likes updated successfully.');

        return redirect(route('likes.index'));
    }

    /**
     * Remove the specified likes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $likes = $this->likesRepository->find($id);

        if (empty($likes)) {
            Flash::error('Likes not found');

            return redirect(route('likes.index'));
        }

        $this->likesRepository->delete($id);

        Flash::success('Likes deleted successfully.');

        return redirect(route('likes.index'));
    }
}
