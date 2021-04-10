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
        $number_of_cases=customers::where('type',0)->count();
        $number_of_sponsors=customers::where('type',1)->count();
        $highest_wishlists=\DB::select('SELECT `to` ,COUNT(*) as count FROM likes  GROUP BY `to` order by `count` desc');        
            foreach ($highest_wishlists as $key => $highest_wishlist) {
                $highest_wishlist->customer  = customers::find($highest_wishlist->to);
            }
        return view('home')->with('highest_wishlists', $highest_wishlists)->with('number_of_cases', $number_of_cases)->with('number_of_sponsors', $number_of_sponsors);
    }
}
