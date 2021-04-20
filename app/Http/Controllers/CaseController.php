<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use Flash;
class CaseController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAllCases(){
       $customers= customers::where('type',0)->get();
       foreach ($customers as $key => $customer) {
       $customer->age= \Carbon\Carbon::parse($customer->date_birth)->diff(\Carbon\Carbon::now())->format('%y years and %m months');
       }
    //    return $customers;
       return view('cases.index')->with('customers',$customers);

    }


    public function getAllKafeel(){
      $customers= customers::where('type',1)->get();
      foreach ($customers as $key => $customer) {
      $customer->age= \Carbon\Carbon::parse($customer->date_birth)->diff(\Carbon\Carbon::now())->format('%y years and %m months');
      }
   //    return $customers;
      return view('sponsor.index')->with('customers',$customers);

   }
   public function showKafeel($id){
      $customers= customers::find($id);
    //   foreach ($customers as $key => $customer) {
      $customers->age= \Carbon\Carbon::parse($customers->date_birth)->diff(\Carbon\Carbon::now())->format('%y years and %m months');
     
      $kafeels = \DB::table('payment')->where('type','donation')->where('from_id',$id)->get();
      foreach ($kafeels as  $kafeel) {
       $kafeel->name= customers::find($kafeel->to_id)->name;
    }
   // return $kafeels;
      return view('sponsor.show')->with('kafeels', $kafeels)->with('customers',$customers);

   }

    public function show($id){
        $customers= customers::find($id);
      //   foreach ($customers as $key => $customer) {
        $customers->age= \Carbon\Carbon::parse($customers->date_birth)->diff(\Carbon\Carbon::now())->format('%y years and %m months');
        $cases = \DB::table('payment')->where('type','donation')->where('to_id',$id)->get();
        foreach ($cases as  $case) {
         $case->name= customers::find($case->from_id)->name;
      }
      // return $cases; 
        return view('cases.show')->with('cases', $cases)->with('customers',$customers);
 
     }

     public function completeCase($id){
      $customers= customers::find($id);
      $customers->is_complete =1;
      $customers->save();  
      Flash::success('Projects Form saved successfully.');
      return redirect()->back()->with('success', 'successfully '); 
     }

}
