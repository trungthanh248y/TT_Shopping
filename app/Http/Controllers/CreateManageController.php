<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CreateManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('CreateManage.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('CreateManage.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $users = new User();
        $mess = "";
        if ($request->get('email')) {
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = bcrypt($request->get('password'));
            $users->role='manage';
            if ($users->save()) {
                $mess = "{{ __('success victory')}}";
            }
        }

        return redirect('indexManage')->with('mess', $mess);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::find($id);

        return view('CreateManage.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $mess = "";
        if ($request->get('email')) {
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = bcrypt($request->get('password'));
            $users->role='manage';
            if ($users->save()) {

                $mess = "{{ __('success victory')}}";
            }
        }

        return view('CreateManage.edit', compact('users'))->with('mess', $mess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $users = User::find($request->id)->delete();
        $mess = "";
        if ($users) {

            $mess =  "{{ __('success victory')}}";
        }

        return redirect()->route('indexManage')->with('mess', $mess);
    }
}
