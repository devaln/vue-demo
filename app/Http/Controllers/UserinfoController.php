<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinfo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $client = new Client();
        // $uri = "http://10.71.31.169:3000/user_informations";
        // $response = $client->request('GET', $uri);
        // $userinfos = dd($response->getBody()->getContents());

        // $userinfos = "http://10.71.31.169:3000/user_informations";
        $userinfos = Userinfo::all();

        return Inertia::render('userinfos/index',['userinfos' => $userinfos])->with('status', 'success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('userinfos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = Auth::user()->id;
        // $user = User::find($uid);

        $validator = validator::make($request->all(),[
            'first_name' => 'required|min:3',
            'middle_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'contact' => 'required|min:9|max:10',
            'gender' => 'required',
            'profile_pic' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect()->route('transactions.create')
                ->withErrors($validator)
                ->withInput();
            }
        }

        Userinfo::create($request->all());
        return Inertia::render('userinfos/Index')->with('Success', 'Information Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Userinfo $userinfo)
    {
        return Inertia::render('userinfos/show', ['userinfo'=>$userinfo]);
        // return Inertia::render('userinfos/show', ['userinfo'=>Userinfo::findOrFail('id')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Userinfo $userinfo)
    {
        return Inertia::render('userinfos/edit', ['userinfo'=>$userinfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userinfo $userinfo)
    {
        $request->validate([
            'first_name' => 'required|min:3',
            'middle_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'contact' => 'required|min:9|max:10',
            'gender' => 'required',
            'profile_pic' => 'required',
        ]);

        $userinfo->update($request->all());
        return Inertia::render('userinfos/Index')->with('Success', 'Information Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Userinfo  $userinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userinfo $userinfo)
    {
        $userinfo->delete();
        return Inertia::render('userinfos/Index', ['userinfo' => $userinfo])->with('Success', 'Information deleted successfully');
    }
}
