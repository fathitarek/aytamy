<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecustomersAPIRequest;
use App\Http\Requests\API\UpdatecustomersAPIRequest;
use App\Models\customers;
use App\Repositories\customersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
/**
 * Class customersController
 * @package App\Http\Controllers\API
 */

class customersAPIController extends AppBaseController
{
    /** @var  customersRepository */
    private $customersRepository;

    public function __construct(customersRepository $customersRepo)
    {
        $this->customersRepository = $customersRepo;
    }

    /**
     * Display a listing of the customers.
     * GET|HEAD /customers
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $customers = $this->customersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');
    }

    /**
     * Store a newly created customers in storage.
     * POST /customers
     *
     * @param CreatecustomersAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatecustomersAPIRequest $request)
    {
        $input = $request->all();
       // $input['password']= bcrypt($input['password']);

        $customers = $this->customersRepository->create($input);

        return $this->sendResponse($customers->toArray(), 'Customers saved successfully');
    }

    public function login(Request $request){
     // $pass=  bcrypt($request->password);
        $customers=customers::where('email',$request->email)->where('password',$request->password)->get();
    //  dd($pass);
        return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');

    }
    /**
     * Display the specified customers.
     * GET|HEAD /customers/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var customers $customers */
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            return $this->sendError('Customers not found');
        }

        return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');
    }

    /**
     * Update the specified customers in storage.
     * PUT/PATCH /customers/{id}
     *
     * @param int $id
     * @param UpdatecustomersAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatecustomersAPIRequest $request)
    {
        // dd($request);
        $input = $request->all();
        // dd($input['personal_id']);
 $destination = 'images/customers';
        if (!is_null(Input::file('personal_id'))) {

            $image = $this->uploadFile('personal_id', $destination);
            // return $similar_sections['image_en'].$image_en ;
            if (gettype($image) == 'string') {
                $input['personal_id'] = $destination . '/' . $image;
            }
        }


        if (!is_null(Input::file('mother_certificate'))) {

            $image = $this->uploadFile('mother_certificate', $destination);
            // return $similar_sections['image_en'].$image_en ;
            if (gettype($image) == 'string') {
                $input['mother_certificate'] = $destination . '/' . $image;
            }
        }



        if (!is_null(Input::file('father_certificate'))) {

            $image = $this->uploadFile('father_certificate', $destination);
            // return $similar_sections['image_en'].$image_en ;
            if (gettype($image) == 'string') {
                $input['father_certificate'] = $destination . '/' . $image;
            }
        }


        if (!is_null(Input::file('education_certificate'))) {

            $image = $this->uploadFile('education_certificate', $destination);
            // return $similar_sections['image_en'].$image_en ;
            if (gettype($image) == 'string') {
                $input['education_certificate'] = $destination . '/' . $image;
            }
        }

        /** @var customers $customers */
        $customers = $this->customersRepository->find($id);
// 
        if (empty($customers)) {
            return $this->sendError('Customers not found');
        }
        // if (isset($input['whats_app'])) {
            // dd($customers);
            // dd($input['whats_app']);
            // $customers->whats_app = $input['whats_app'];
        //    $customers->save();
          
            // return $customers;
        // } $customers = $this->customersRepository->find($id);
// return $input;
        $customers = $this->customersRepository->update($input, $id);

        return $this->sendResponse($customers->toArray(), 'customers updated successfully');
    }

    /**
     * Remove the specified customers from storage.
     * DELETE /customers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var customers $customers */
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            return $this->sendError('Customers not found');
        }

        $customers->delete();

        return $this->sendSuccess('Customers deleted successfully');
    }
}
