<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Manu;
use App\Product;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Product::has('type')->has('manu')->orderBy('id', 'desc')->paginate(6);
        $products->setPath(route('admin.product.index'));
        return view('admin.index',['products'=>$products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $types = Type::all();
	    $manus = Manu::all();

		return view('admin.form',[
                'types' => $types,
                'manus' =>$manus
            ]);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $errors = Validator::make($request->all(),[
	        'name' => 'required|unique:products,name'
            ,'price' => 'required|numeric'
            ,'description' => 'required'
            ,'fileUpload' => 'required|image'
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }

	    //Them thong tin san pham vao csdl
	    $product = new Product();
	    $product->name = $request->name;
	    $product->price = $request->price;
	    $product->description = $request->description;
        $product->type_id = $request->type_id;
        $product->manu_id = $request->manu_id;

	    //di chuyen hinh vao file images
	    $img = $request->file('fileUpload');
        $img->move('public/images',$img->getClientOriginalName());
        $product->img = $img->getClientOriginalName();
        $product->save();

        //quay lai trang chu
        return redirect()->route('admin.product.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
        $type_products = Product::where('type_id',$product->type_id)->where('id','!=',$id)->orderBy('id','desc')->take(3)->get();
        $manu_products = Product::where('manu_id',$product->manu_id)->where('id','!=',$id)->orderBy('id','desc')->take(3)->get();
		return view('single',['product'=>$product,'type_products'=>$type_products,'manu_products'=>$manu_products]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    $product = Product::find($id);
        $types = Type::all();
        $manus = Manu::all();

		return view('admin.form_update',[
		     'product' => $product,
             'types' => $types,
             'manus' =>$manus
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
        $errors = Validator::make($request->all(),[
            'name' => "required|unique:products,name,$request->id"
            ,'price' => 'required|numeric'
            ,'description' => 'required'
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }

        //Them thong tin san pham vao csdl
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->type_id = $request->type_id;
        $product->manu_id = $request->manu_id;

        if($request->hasFile('fileUpload'))
        {
            unlink('public/images/'.$product->img);

            //di chuyen hinh vao file images
            $img = $request->file('fileUpload');
            $img->move('public/images',$img->getClientOriginalName());
            $product->img = $img->getClientOriginalName();
        }
        $product->save();
        //quay lai trang chu
        return redirect()->route('admin.product.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function find_destroy($id)
	{
        $product =Product::find($id);
        unlink('public/images/'.$product->img);
        $product = Product::destroy($id);

        return redirect()->route('admin.product.index');
	}

	public function showFind(Request $request)
    {
        return redirect()->route('tim-kiem',['name'=>$request->name]);
    }
	public function find($name = null)
    {
        $products = Product::where('name','LIKE','%'.$name.'%')->paginate(6);
        $products->setPath($name);//ham setPath nay cuc ky quan trong
	    return view('products1',['products'=>$products]);
    }

    //find product-admin
    public function showFindAdmin(Request $request){
        return redirect()->route('admin.product.searchResult',$request->name);
    }

    public function findProductsAdmin($name = null){
        $name = (isset($_GET['key']))?$_GET['key']:$name;
        $products = Product::where('name','LIKE','%'.$name.'%')->paginate(6);
        $products->setPath($name);//ham setPath nay cuc ky quan trong
        return view('admin.result',['products'=>$products]);
    }

    //hiện trang giỏ hàng của khách hàng
    public function cart()
    {
        return view('cart');
    }

    //thêm sản phẩm vào giỏ hàng id & so luong
    public function addCart(Request $request)
    {
        session_start();
        //thêm sản phẩm vào giỏ hàng
        $product = Product::find($request->id)->toArray();
        //nếu là lần thêm sản phẩm đầu tiên
        if(!isset($_SESSION['products'][$request->id]))
        {
            $_SESSION['products'][$request->id] = $product;
            $_SESSION['products'][$request->id]['quantity'] = $request->quantity;
        }
        else{
            //nếu là lần thêm sản phẩm >= 2
            $_SESSION['products'][$request->id]['quantity'] += $request->quantity;
        }
        return redirect()->route('cart');
    }

    //bỏ sản phẩm ra khỏi giỏ hàng
    public function removeCart(Request $request)
    {
        session_start();
        unset($_SESSION['products'][$request->id]);
        return redirect()->route('cart');
    }
}
