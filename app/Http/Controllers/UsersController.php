<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Session;
class UsersController extends Controller
{
     public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();

        return view('users.users', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups']     = Group::arrayForSelect();
        $this->data['mode']       = 'create';
        $this->data['headline']   = 'Add new User';
        return view('users.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $userFormData = $request->all();

        if(User::create($userFormData)){
            Session::flash('message','User created successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        return redirect()->to('users');
    }

    public function show($id)
    {
        $this->data['user'] = User::find($id);
        $this->data['tab_menu'] = 'user_info';
        return view('users.show', $this->data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user']        =  User::findOrFail($id);
        $this->data['groups']      =  Group::arrayForSelect();
        $this->data['mode']        =  'edit';
        $this->data['headline']    =  'Update information';
        return view('users.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data              = $request->all();

        $user              = User::find($id);
        $user->group_id    = $data['group_id'];
        $user->name        = $data['name'];
        $user->email       = $data['email'];
        $user->phone       = $data['phone'];
        $user->address     = $data['address'];
        

        if($user->save()){
            Session::flash('message','User information updated successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            Session::flash('message','User deleted successfully.');//ei message ta layout/main.blade.php file ekta section create kora ase alert msg dekhar jonno
        }
        return redirect()->to('users');
    }
}
