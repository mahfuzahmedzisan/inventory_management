<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data["admins"] = User::latest()->get();
        return view('admin.admin_management.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.admin_management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest  $request): RedirectResponse
    {
        $new_admin = new User();
        $new_admin->name = $request->name;
        $new_admin->email = $request->email;
        $new_admin->password = $request->password;

        $new_admin->save();

        return redirect()->route('admin.index');
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
    public function edit(string $id): View
    {
        $data["admin"] = User::findOrFail(decrypt($id));
        return view('admin.admin_management.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id): RedirectResponse
    {
        $admin = User::findOrFail(decrypt($id));
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = $request->password;
        }
        $admin->save();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
