<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();

		return view('admin.users',['users'=>$users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.form_user');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $errors = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'min:6|required',
            'password_confirmation' => 'min:6|same:password'
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->_token;
        $user->save();

        return redirect()->route('admin.user.index');
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
	    $user = User::find($id);
		return view('admin.form_user_update',['user'=>$user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		//
        $errors = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'password' => 'min:6|required',
            'password_confirmation' => 'min:6|same:password'
        ]);
        if ($errors->fails())
        {
            return redirect()->back()->withErrors($errors->errors())->withInput(Input::all());
        }
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->_token;

        $user->save();
        return redirect()->route('admin.user.index');
	}

    public function find_destroy($id)
    {
        $user = User::destroy($id);

        return redirect()->route('admin.user.index');
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = User::destroy($id);

        return redirect()->route('admin.user.index');
	}

}
