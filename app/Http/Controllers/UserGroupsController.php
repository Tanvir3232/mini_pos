<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Session;
class UserGroupsController extends Controller
{
    public function index()
    {
    	$this->data['groups'] = Group::all();
    	return view('groups.groups',$this->data);
    }
    public function create()
    {
    	
    	return view('groups.create');
    }
    public function store(Request $request)
    {
        $form_data = $request->all();
        if(Group::create($form_data)){
        	Session::flash('message','Group created successfully.');
        }

        return redirect()->to('groups');
    }

    public function destroy($id)
    {
    	if(Group::find($id)->delete()){
        	Session::flash('message','Group delete successfully.');
        }

        return redirect()->to('groups');
    }
}
