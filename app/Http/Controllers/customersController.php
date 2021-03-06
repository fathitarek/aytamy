<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecustomersRequest;
use App\Http\Requests\UpdatecustomersRequest;
use App\Repositories\customersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class customersController extends AppBaseController
{
    /** @var  customersRepository */
    private $customersRepository;

    public function __construct(customersRepository $customersRepo)
    {
        $this->customersRepository = $customersRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the customers.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $customers = $this->customersRepository->all();

        return view('customers.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new customers.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customers in storage.
     *
     * @param CreatecustomersRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatecustomersRequest $request)
    {
        $input = $request->all();

        $customers = $this->customersRepository->create($input);

        Flash::success('Customers saved successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified customers.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        return view('customers.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified customers.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        return view('customers.edit')->with('customers', $customers);
    }

    /**
     * Update the specified customers in storage.
     *
     * @param int $id
     * @param UpdatecustomersRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatecustomersRequest $request)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        $customers = $this->customersRepository->update($request->all(), $id);

        Flash::success('Customers updated successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified customers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        $this->customersRepository->delete($id);

        Flash::success('Customers deleted successfully.');

        return redirect(route('customers.index'));
    }
}
