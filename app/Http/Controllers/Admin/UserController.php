<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('backend.admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $role = Role::find($request->role_id);
        $user->attachRole($role);
        return redirect()->route('admin.user.index')->with($this->alertCreated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $user = User::findOrfail($id);
            $roles = Role::all();
            return view('pages.admin.users.edit',compact('user','roles'));
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.user.index')->with($this->alertNotFound());

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $user = User::findOrfail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role_id' => 'required',
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            $roles = $user->roles;

            foreach($roles as $role){
                $user->detach($role);
            }

            $role = Role::find($request->role_id);
            $user->attachRole($role);
            return redirect()->route('admin.user.index')->with($this->alertUpdated());

        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.user.index')->with($this->alertNotFound());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $user = User::findOrfail($id);
            $roles = $user->roles;

            foreach($roles as $role){
                $user->detach($role);
            }

            $user->delete();
            return redirect()->route('admin.user.index')->with($this->alertDeleted());
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.user.index')->with($this->alertNotFound());

        }
    }
}
