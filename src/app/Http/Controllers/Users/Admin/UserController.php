<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queryUser = User::query();
        if ($request->filled('verified')) {
            switch ($request->verified) {
                case "email_verified_at - yes":
                    $queryUser->whereNotNull('email_verified_at');
                    break;
                case "email_verified_at - null":
                    $queryUser->where('email_verified_at', '=', null);
                    break;
            }
        }
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case "Number +":
                    $queryUser->orderBy('id');
                    break;
                case "Number -":
                    $queryUser->orderBy('id', 'desc');
                    break;
                case "Name Sort A to Z":
                    $queryUser->orderBy('name');
                    break;
                case "Name Sort Z to A":
                    $queryUser->orderBy('name', 'desc');
                    break;
                case "Email Sort A to Z":
                    $queryUser->orderBy('email');
                    break;
                case "Email Sort Z to A":
                    $queryUser->orderBy('email', 'desc');
                    break;
            }
        }
        if ($request->filled('search')) {
            $q = $request->input('search');
            $queryUser->where('name', 'LIKE', "%{$q}%")
                ->orWhere('email', 'LIKE', "%{$q}%");
        }
        $users = $queryUser->paginate(15);

        return view('users.admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->input();
        $user = new User($data);
        $user->password = \Hash::make($request->input('password'));
        $user->save();

        if ($user->exists) {
            return redirect()
                ->route('admin.users.edit', $user->id)
                ->with(['success' => 'Saved successfully!']);
        } else {
            return back()->withErrors(['msg' => "Error"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::query()->firstWhere('id', $id);
        return view('users.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        if (empty($user)) {
            return back()->withErrors(['msg' => "Not found id=[{$id}]"]);
        }

        $result = $user->update($data);
        if ($result) {
            return redirect()
                ->route('admin.users.edit', $user->id)
                ->with(['success' => 'Saved successfully!']);
        } else {
            return back()->withErrors(['msg' => "Error"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $result = $user->delete($user->id);

        if ($result) {
            return redirect()
                ->route('admin.users.index')
                ->with(['success' => 'Deleted successfully!']);
        } else {
            return back()->withErrors(['msg' => "Error"]);
        }
    }
}
