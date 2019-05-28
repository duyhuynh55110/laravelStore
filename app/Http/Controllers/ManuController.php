<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Manu;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ManuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $manus = Manu::all();
		return view('admin.manufactures',[
		    'manus'=> $manus
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.form_manufacture');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $errors = Validator::make($request->all(),[
            'name' => "required|unique:manus,name"
            ,'fileUpload' => 'required|image'
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }

        $manu = new Manu();
        $manu->name = $request->name;

        //them anh
        $img = $request->file('fileUpload');
        $img->move('public/images/manus',$img->getClientOriginalName());
        $manu->img = $img->getClientOriginalName();
        $manu->save();

        return redirect()->route('admin.manu.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    $manu = Manu::find($id);
		return view('admin.form_manufacture_update',compact('manu'));
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
            'name' => "required|unique:manus,name,$request->id"
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }
        $manu = Manu::find($request->id);
        $manu->name = $request->name;

        if($request->hasFile('fileUpload'))
        {
            try
            {
                unlink('public/images/manus/'.$manu->img);
            }catch (\Exception $exception){}
            //di chuyen hinh vao file images/manus
            $img = $request->file('fileUpload');
            $img->move('public/images/manus',$img->getClientOriginalName());
            $manu->img = $img->getClientOriginalName();
        }
        $manu->save();
        //quay lai trang chu
        return redirect()->route('admin.manu.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
    public function find_destroy($id)
    {
        $manu = Manu::find($id);
        try
        {
            $product = Product::where('manu_id',"=",$id);
            $product_delete_img = $product->get();
            foreach ($product_delete_img as $item){
                if(is_file("public/images/".$item->img))
                {
                    unlink("public/images/".$item->img);
                }
            }
            $product->delete();

            unlink('public/images/manus/'.$manu->img);
        }catch (Exception $exception){}
        $manu = Manu::destroy($id);

        return redirect()->route('admin.manu.index');
    }

}
