<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecustomersAPIRequest;
use App\Http\Requests\API\UpdatecustomersAPIRequest;
use App\Models\customers;
use App\Models\countries;
use App\Models\cities;
use App\Models\dreams;
use App\Models\educations;
use App\Models\jobs;
use App\Models\nationalities;
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

    public function getNewCases(){
        $customers = customers::where('type',0)->orderBy('updated_at', 'desc')->get();
        foreach ($customers as $key => $customer) {
            $customer->age= \Carbon\Carbon::parse($customer->date_birth)->diff(\Carbon\Carbon::now())->format('%y');
            }
        return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');

    }

    public function getWarrantyCases(){
        $customers = customers::where('type',0)->where('is_warranty',1)->orderBy('updated_at', 'desc')->get();
        foreach ($customers as $key => $customer) {
            $customer->age= \Carbon\Carbon::parse($customer->date_birth)->diff(\Carbon\Carbon::now())->format('%y');
            }
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

    public function saveSocialMedia(Request $request){

        $customers=customers::where('email',$request->email)->where('social_id',$request->social_id)->get();
        if (count($customers)) {
            $customers[0]['first']=0;
            return $this->sendResponse($customers[0]->toArray(), 'Customers retrieved successfully');
        }else {
    $input = $request->all();
    // $input['password']= bcrypt($input['password']);

     $customers = $this->customersRepository->create($input);
    //  $customers[0]['first']=0;
     return $this->sendResponse($customers->toArray(), 'Customers saved successfully');
}


    }
    public function login(Request $request){
     // $pass=  bcrypt($request->password);
        $customers=customers::where('email',$request->email)->where('password',$request->password)->get();
    // return $customers[0];
    if (count($customers)) {
        return $this->sendResponse($customers[0]->toArray(), 'Customers retrieved successfully');
    }
    else {
        return $this->sendError('Customers retrieved Not successfully');

    }

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
        if ($customers->dream_id) {
        $dreams =  dreams::findOrFail($customers->dream_id);
        if (app()->getLocale()=='ar') {
            $customers->dream_name=$dreams->name_ar;
        }else {
            $customers->dream_name=$dreams->name_en;
        }
        }
        
        if ($customers->country_id) {
            $countries =  countries::findOrFail($customers->country_id);
            if (app()->getLocale()=='ar') {
                $customers->country_name=$countries->name_ar;
            }else {
                $customers->country_name=$countries->name_en;
            }
            }
            
            if ($customers->city_id) {
                $cities =  cities::findOrFail($customers->city_id);
                if (app()->getLocale()=='ar') {
                    $customers->city_name=$cities->name_ar;
                }else {
                    $customers->city_name=$cities->name_en;
                }
                }

                if ($customers->job_id) {
                    $jobs =  jobs::findOrFail($customers->job_id);
                    if (app()->getLocale()=='ar') {
                        $customers->job_name=$jobs->name_ar;
                    }else {
                        $customers->job_name=$jobs->name_en;
                    }
                    }
                    
                    if ($customers->education_id) {
                        $educations =  educations::findOrFail($customers->education_id);
                        if (app()->getLocale()=='ar') {
                            $customers->education_name=$educations->name_ar;
                        }else {
                            $customers->education_name=$educations->name_en;
                        }
                        }
                    
                    if ($customers->nationality_id) {
                        $nationalities =  nationalities::findOrFail($customers->nationality_id);
                        if (app()->getLocale()=='ar') {
                            $customers->nationalty_name=$nationalities->name_ar;
                        }else {
                            $customers->nationalty_name=$nationalities->name_en;
                        }
                        }

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
    public function update($id,Request $request)
    {
        // dd($request);
        $input = $request->all();
        // dd($input['personal_id']);
 $destination = 'images/customers';

 if (!is_null(Input::file('image'))) {

    $image = $this->uploadFile('image', $destination);
    // return $similar_sections['image_en'].$image_en ;
    if (gettype($image) == 'string') {
        $input['image'] = $destination . '/' . $image;
    }
}


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

    public function search($name){
        $customers = customers::where('type',0)->where('name', 'LIKE', '%' .$name . '%')->get();
        if (count($customers)) {
            foreach ($customers as $key => $customer) {
                $customer->age= \Carbon\Carbon::parse($customer->date_birth)->diff(\Carbon\Carbon::now())->format('%y');
                }
            return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');
        }
        else {
            return $this->sendError('Customers retrieved Not successfully');
    
        }
      
        // return $this->sendResponse($customers->toArray(), 'Customers retrieved successfully');
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
