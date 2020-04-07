<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\front\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $services = Service::all();
        return view('admin.layouts.service.all', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layouts.service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'provider_type' => 'required',
            'cat_id' => 'required',
            'd_id' => 'required',
            'c_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        $service = new Service();
        $service->provider_type = $request->provider_type;
        $service->cat_id = $request->cat_id;
        $service->c_id = $request->c_id;
        $service->name = $request->name;
        $service->phone = $request->phone;
        $service->status = 'approved';
        $service->save();
        return redirect(route('adminService.create'))->with('success', 'Your service is successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::with('city', 'category', 'district')->where('id', $id)->get();
        return view('admin.layouts.service.edit', compact('services'));
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
        $request->validate([
            'provider_type' => 'required',
            'cat_id' => 'required',
            'd_id' => 'required',
            'c_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ]);
        $service = Service::find($id);
        $service->provider_type = $request->provider_type;
        $service->cat_id = $request->cat_id;
        $service->c_id = $request->c_id;
        $service->name = $request->name;
        $service->phone = $request->phone;
        $service->save();
        return redirect(route('adminService.index'))->with('success', 'Your service is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id', $id)->delete();
        return redirect(route('adminService.index'));
    }

    public function approve($id)
    {
        $service = Service::find($id);
        $service->status = 'approved';
        $service->save();
        return redirect(route('adminService.index'))->with('success', 'Service is approved.');

    }

    public function reject($id)
    {
        $service = Service::find($id);
        $service->status = 'deactivated';
        $service->save();
        return redirect(route('adminService.index'))->with('success', 'Service is rejected.');

    }
}
