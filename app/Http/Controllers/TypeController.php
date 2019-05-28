<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types',[
            'types'=> $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.form_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(),[
            'name' => "required|unique:types,name"
            ,'fileUpload' => 'required|image'
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }

        $type = new Type();
        $type->name = $request->name;

        //them anh
        $img = $request->file('fileUpload');
        $img->move('public/images/types',$img->getClientOriginalName());
        $type->img = $img->getClientOriginalName();
        $type->save();

        return redirect()->route('admin.type.index');
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
        $type = Type::find($id);
        return view('admin.form_type_update',compact('type'));
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
            'name' => "required|unique:types,name,$request->id"
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }
        $type = Type::find($request->id);
        $type->name = $request->name;

        if($request->hasFile('fileUpload'))
        {
            try
            {
                unlink('public/images/types/'.$type->img);
            }catch (\Exception $exception){}
            //di chuyen hinh vao file images/types
            $img = $request->file('fileUpload');
            $img->move('public/images/types',$img->getClientOriginalName());
            $type->img = $img->getClientOriginalName();
        }
        $type->save();
        //quay lai trang chu
        return redirect()->route('admin.type.index');
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
        $type = Type::find($id);
        try
        {
            $product = Product::where('type_id',"=",$id);
            $product_delete_img = $product->get();
            foreach ($product_delete_img as $item){
                if(is_file("public/images/".$item->img))
                {
                    unlink("public/images/".$item->img);
                }
            }
            $product->delete();

            unlink('public/images/types/'.$type->img);
        }catch (Exception $exception){}
        $type = Type::destroy($id);

        return redirect()->route('admin.type.index');
    }

}
