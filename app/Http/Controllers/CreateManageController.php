<?php

namespace App\Http\Controllers;

use App\Contracts\ManageRepositoryInterface;
use Illuminate\Http\Request;
use App\User;

class CreateManageController extends Controller
{
    public $manageRepository;

    public function __construct(ManageRepositoryInterface $manageRepository)
    {
        $this->manageRepository = $manageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->manageRepository->getAll();

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
        $arr['name'] = $request->get('name');
        $arr['email'] = $request->get('email');
        $arr['password'] = bcrypt($request->get('password'));
        $arr['role'] = 'manage';
        $users = $this->manageRepository->create($arr);
        $mess = "";
        if ($users) {
            $mess = "{{ __('success victory')}}";
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
        $users = $this->manageRepository->find($id);

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
        $arr['name'] = $request->get('name');
        $arr['email'] = $request->get('email');
        $arr['password'] = bcrypt($request->get('password'));
        $arr['role'] = 'manage';
        $users = $this->manageRepository->update($id, $arr);
        $mess = "";
        if ($users) {
            $mess = "{{ __('success victory')}}";
        }

        return redirect('indexManage')->with('mess', $mess);
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
        $users = $request->get('id');
        $users = $this->manageRepository->delete($users);
        $mess = "";
        if ($users) {

            $mess = "{{ __('success victory')}}";
        }

        return redirect()->route('indexManage')->with('mess', $mess);
    }
}

