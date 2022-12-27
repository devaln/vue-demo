<?php

namespace App\Http\Controllers;


use App\Models\Userinfo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserinfoController extends Controller
{
    public function index()
    {
        $search = $request['search'] ?? "";
        $data = Userinfo::where('first_name', 'LIKE','%'.$search.'%')->get();
        $userinfos = Userinfo::all();
        return Inertia::render('userinfos/index',['userinfos' => $userinfos])->with('status', 'success');
    }

    public function create()
    {
        return Inertia::render('userinfos/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'middle_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'contact' => 'required|min:9|max:10',
            'gender' => 'required',
            'profile_pic' => '',
        ]);
        /* $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName); */

        // $hashName = Hash::make($imageName);
        $data = array();
        $data['first_name'] = $request->first_name;
        $data['middle_name'] = $request->middle_name;
        $data['last_name'] = $request->last_name;
        $data['contact'] = $request->contact;
        $data['gender'] = $request->gender;
        $data['profile_pic'] = $request->profile_pic;
        $data['user_id'] = Auth::user()->id;

        DB::table('userinfos')->insert($data);
        return Inertia::render('userinfos/Index');
    }

    public function show(Userinfo $userinfo)
    {
        return Inertia::render('userinfos/show', ['userinfo'=>$userinfo]);
        // return Inertia::render('userinfos/show', ['userinfo'=>Userinfo::findOrFail('id')]);
    }

    public function edit(Userinfo $userinfo)
    {
        return Inertia::render('userinfos/edit', ['userinfo'=>$userinfo]);
    }

    public function update(Request $request, Userinfo $userinfo)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'middle_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'contact' => 'required|min:9|max:10',
            'gender' => 'required',
            'profile_pic' => '',
        ]);
        /* $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName); */

        // $hashName = Hash::make($imageName);
        $data = array();
        $data['first_name'] = $request->first_name;
        $data['middle_name'] = $request->middle_name;
        $data['last_name'] = $request->last_name;
        $data['contact'] = $request->contact;
        $data['gender'] = $request->gender;
        $data['profile_pic'] = $request->profile_pic;
        $data['user_id'] = Auth::user()->id;

        $userinfo->update($request->all());
        return Inertia::render('userinfos/Index');
    }

    public function destroy(Userinfo $userinfo)
    {
        $userinfo->delete();
        return Inertia::render('userinfos/Index', ['userinfo' => $userinfo])->with('Success', 'Information deleted successfully');
    }
}
