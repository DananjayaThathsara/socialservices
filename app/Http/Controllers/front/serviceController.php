<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\front\City;
use App\Model\front\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $governments = Service::with('city', 'category','district')->where([['provider_type', '=', 'government'], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate(5);
        $privates = Service::with('city', 'category','district')->where([['provider_type', '=', 'private'], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate(5);
        return view('front.layouts.home', compact('governments', 'privates'));
    }

    public function getCityList(Request $request)
    {

        $cities = DB::table("cities")
            ->where("d_id", $request->d_id)
            ->pluck("c_name", "id");
        return response()->json($cities);
    }

    public function search(Request $request)
    {

        if (isset($request->city)&&$request->category==null) {

            $governments = Service::with('city', 'category','district')->where([['provider_type', '=', 'government'], ['c_id', '=', $request->city], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');

            $privates = Service::with('city', 'category','district')->where([['provider_type', '=', 'private'], ['c_id', '=', $request->city], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
        } elseif (isset($request->category)&&$request->city==null) {

            $governments = Service::with('city', 'category','district')->where([['provider_type', '=', 'government'], ['cat_id', '=', $request->category], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
            $privates = Service::with('city', 'category','district')->where([['provider_type', '=', 'private'], ['cat_id', '=', $request->category], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
        } elseif ($request->city!=null && $request->category!=null) {

            $governments = Service::with('city', 'category','district')->where([['provider_type', '=', 'government'], ['cat_id', '=', $request->category], ['c_id', '=', $request->city], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
            $privates = Service::with('city', 'category','district')->where([['provider_type', '=', 'private'], ['cat_id', '=', $request->category], ['c_id', '=', $request->city], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
        } elseif (!isset($request->city) || !isset($request->category)) {
            $governments = Service::with('city', 'category','district')->where([['provider_type', '=', 'government'], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate(5);
            $privates = Service::with('city', 'category','district')->where([['provider_type', '=', 'private'], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate(5);
        }
        return view('front.layouts.search', compact('governments', 'privates'));

    }
    public function categoryShow($id){

        $governments = Service::with('city', 'category','district')->where([['provider_type', '=', 'government'], ['cat_id', '=', $id], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
        $privates = Service::with('city', 'category','district')->where([['provider_type', '=', 'private'], ['cat_id', '=', $id], ['status', '=', 'approved']])->orderBy('created_at', 'desc')->paginate('5');
        $catname=Category::find($id);
        return view('front.layouts.category', compact('governments', 'privates','catname'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $service->status = 'pending';
        $service->save();
        return redirect(route('index'))->with('success', 'Your service is successfully added.It will live after approvals of the admin ');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
