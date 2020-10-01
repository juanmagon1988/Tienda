<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SaveUserRequest; //importo el request
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function __construct()   // middleware verifica que sea admin
    {
        $this->middleware('admin');
        
    }



    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $users = User::orderBy('name')->paginate(5);

    return view('admin.users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('admin.users.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $data = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'password'      => $request->get('password'),
            'type'          => $request->get('type'),
            'address'       => $request->get('address'),
            'phone'       => $request->get('phone')
        ];

        $user = User::create($data);

        
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
{
    return view('admin.users.edit', compact('user'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //return $request->all();
        
        $this->validate($request, [
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email',
            'password' => ($request->get('password') != "") ? 'required|confirmed' : "",
            'type' => 'required|in:user,admin',
        ]);
        
        $user->name = $request->get('name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->type = $request->get('type');
        $user->address = $request->get('address');
         $user->phone= $request->get('phone');
       
        if($request->get('password') != "") $user->password = $request->get('password');
        
        $updated = $user->save();
        
        
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();
        
        
        
        return redirect()->route('users.index');
    }









}
