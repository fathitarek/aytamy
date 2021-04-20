<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cloth_amount=0;
        $food_amount=0;
        $treatment_amount=0;
        $payments_cloth = \DB::table('payment')->where('type','cloth')->get();
        foreach ($payments_cloth as  $cloth) {
           $cloth_amount+= $cloth->amount;
        }
        $payments_food = \DB::table('payment')->where('type','food')->get();
        foreach ($payments_food as  $food) {
           $food_amount+= $food->amount;
        }
        $payments_treatment = \DB::table('payment')->where('type','treatment')->get();
        foreach ($payments_treatment as  $treatment) {
           $treatment_amount+= $treatment->amount;
        }

// return $cloth_amount;
        $number_of_cases=customers::where('type',0)->count();
        $number_of_sponsors=customers::where('type',1)->count();
        $highest_donations=\DB::select("SELECT `from_id` ,SUM(amount) as sumtion FROM payment where `type`='donation' GROUP BY `from_id`  order by `sumtion` desc ");  
        foreach ($highest_donations as $key => $highest_donation) {
            $highest_donation->name= customers::find($highest_donation->from_id)->name;
        }  
        
        $highest_clothes=\DB::select("SELECT `from_id` ,SUM(amount) as sumtion FROM payment where `type`='cloth' GROUP BY `from_id`  order by `sumtion` desc ");  
        foreach ($highest_clothes as $key => $highest_cloth) {
            $highest_cloth->name= customers::find($highest_cloth->from_id)->name;
        }

        $highest_foods=\DB::select("SELECT `from_id` ,SUM(amount) as sumtion FROM payment where `type`='food' GROUP BY `from_id`  order by `sumtion` desc ");  
        foreach ($highest_foods as $key => $highest_food) {
            $highest_food->name= customers::find($highest_food->from_id)->name;
        }


        $highest_treatments=\DB::select("SELECT `from_id` ,SUM(amount) as sumtion FROM payment where `type`='treatment' GROUP BY `from_id`  order by `sumtion` desc ");  
        foreach ($highest_treatments as $key => $highest_treatment) {
            $highest_treatment->name= customers::find($highest_treatment->from_id)->name;
        }


// return $highest_donations;
        $highest_wishlists=\DB::select('SELECT `to` ,COUNT(*) as count FROM likes  GROUP BY `to` order by `count` desc');        
            foreach ($highest_wishlists as $key => $highest_wishlist) {
                $highest_wishlist->customer  = customers::find($highest_wishlist->to);
            }
        return view('home')->with('highest_clothes',$highest_clothes)->with('highest_foods',$highest_foods)->with('highest_treatments',$highest_treatments)->with('highest_donations',$highest_donations)->with('treatment_amount',$treatment_amount)->with('food_amount',$food_amount)->with('cloth_amount',$cloth_amount)->with('highest_wishlists', $highest_wishlists)->with('number_of_cases', $number_of_cases)->with('number_of_sponsors', $number_of_sponsors);
    }
}
