<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Pcategory;
class InverstmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inverstment = Investment::orderBy('id','desc')->get();

        return view('admin.inverstment.index',compact('inverstment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Pcategory::get();

        return view('admin.inverstment.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "cover" => "required",
            "category" => "required",
            "desc" => "required"
        ])->validate();

        $inverstment = new Investment();
        $inverstment->pcategory_id = $request->category;
        $inverstment->name = $request->name;
        $inverstment->slug = \Str::slug($request->name);
        $inverstment->client = $request->client;
        $inverstment->desc = $request->desc;
        $inverstment->date = $request->date;

        $cover = $request->file('cover');

        if($cover){
            $cover_path = $cover->store('images/inverstment', 'public');

            $inverstment->cover = $cover_path;
        }

        if ($inverstment->save()) {

            return redirect()->route('admin.inverstment')->with('success', 'Data added successfully');

        } else {

            return redirect()->route('admin.inverstment.create')->with('error', 'Data failed to add');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inverstment = Investment::findOrFail($id);
        $categories = Pcategory::get();

        return view('admin.inverstment.edit',compact('inverstment','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "category" => "required",
            "desc" => "required"
        ])->validate();

        $inverstment = Investment::findOrFail($id);
        $inverstment->pcategory_id = $request->category;
        $inverstment->name = $request->name;
        $inverstment->client = $request->client;
        $inverstment->desc = $request->desc;
        $inverstment->date = $request->date;


        $new_cover = $request->file('cover');

        if($new_cover){
            if($inverstment->cover && file_exists(storage_path('app/public/' . $inverstment->cover))){
                \Storage::delete('public/'. $inverstment->cover);
            }

            $new_cover_path = $new_cover->store('images/inverstment', 'public');

            $inverstment->cover = $new_cover_path;

        }

        if ($inverstment->save()) {

            return redirect()->route('admin.inverstment')->with('success', 'Data updated successfully');

        } else {

            return redirect()->route('admin.inverstment.edit')->with('error', 'Data failed to update');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inverstment = Investment::findOrFail($id);
        $inverstment->delete();

        return redirect()->route('admin.inverstment')->with('success', 'Data deleted successfully');
    }//
}
