<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use App\Http\Requests\Admin\Admin\AdminCreateRequest;
use App\Http\Requests\Admin\Admin\AdminUpdateRequest;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = $this->adminService->getList();
        return view('admin.admin.index', [
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCreateRequest $request)
    {
        $request = $request->validated();
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'password_show' => $request['password'],
        ];
        $this->adminService->add($data);

        return redirect()->route('admin.admin.index')->with('success', 'Admin create successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->adminService->edit($id);

        return view('admin.admin.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        $request = $request->validated();
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'password_show' => $request['password'],
        ];

        $this->adminService->update($data, $id);

        return redirect()->route('admin.admin.index')->with('success', 'Admin update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->adminService->delete($id);

        return redirect()->route('admin.admin.index')->with('success', 'Admin delete successfully.');
    }
}
