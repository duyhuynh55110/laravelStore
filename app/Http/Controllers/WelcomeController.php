<?php namespace App\Http\Controllers;

use App\Product;
use App\Type;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $types = Type::all();
        $products_type = [];
        $products = [];
        $newest_products = Product::orderBy('id','desc')->take(3)->get();
        //lay tat ca the loai tru cai cuoi
        foreach ($types as $type)
        {
            $products_type = Product::where('type_id',$type->id)->orderBy('id','desc')->take(6)->get()->toArray();
            $products[$type->id] = $products_type;

        }

        //san pham moi nhat
		return view('index',['products'=>$products,'types'=>$types,'newest_products'=>$newest_products]);
	}

}
