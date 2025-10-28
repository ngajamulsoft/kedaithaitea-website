<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('backend.admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'display_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Permission::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.permission.index')->with([
            'message' => 'Data created successfully!',
            'type' => 'success'
        ]);
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
            $permission = Permission::findOrfail($id);
            return view('backend.admin.permission.edit',compact('permission'));
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.permission.index')->with([
            'message' => 'Data Not Found!',
            'type' => 'warning'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $permission = Permission::findOrfail($id);
            $request->validate([
                'name' => 'required|string|max:255|unique:permissions,name, ' . $id,
                'display_name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            $permission->update([
                'name' =>$request->input('name'),
                'display_name' => $request->input('display_name'),
                'description' => $request->input('description'),
            ]);

            return redirect()->route('admin.permission.index')->with([
            'message' => 'Data updated successfully!',
            'type' => 'success'
            ]);
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.permission.index')->with([
            'message' => 'Data Not Found!',
            'type' => 'warning'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $permission = Permission::findOrfail($id);
            $permission->delete();
            return redirect()->route('admin.permission.index')->with([
                'message' => 'Data deleted successfully!',
                'type' => 'success'
            ]);
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.permission.index')->with([
            'message' => 'Data Not Found!',
            'type' => 'warning'
            ]);
        }
    }
}
