<?php

namespace App\Http\Controllers;

use App\Models\ComingSoon;
use App\Models\Pcategory;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comingSoon = ComingSoon::orderBy('id','desc')->get();

        return view('admin.comingsoon.index',compact('comingSoon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Pcategory::get();

        return view('admin.comingsoon.create',compact('categories'));
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

        $comingSoon = new ComingSoon();
        $comingSoon->pcategory_id = $request->category;
        $comingSoon->name = $request->name;
        $comingSoon->slug = \Str::slug($request->name);
//        $comingSoon->client = $request->client;
        $comingSoon->desc = $request->desc;
        $comingSoon->date = $request->date;

        $cover = $request->file('cover');

        if($cover){
            $cover_path = $cover->store('images/comingsoon', 'public');

            $comingSoon->cover = $cover_path;
        }

        if ($comingSoon->save()) {

            return redirect()->route('admin.comingsoon')->with('success', 'Data added successfully');

        } else {

            return redirect()->route('admin.comingsoon.create')->with('error', 'Data failed to add');

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
        $comingSoon = ComingSoon::findOrFail($id);
        $categories = Pcategory::get();

        return view('admin.comingsoon.edit',compact('comingSoon','categories'));
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

        $comingSoon = ComingSoon::findOrFail($id);
        $comingSoon->pcategory_id = $request->category;
        $comingSoon->name = $request->name;
//        $comingSoon->client = $request->client;
        $comingSoon->desc = $request->desc;
        $comingSoon->date = $request->date;


        $new_cover = $request->file('cover');

        if($new_cover){
            if($comingSoon->cover && file_exists(storage_path('app/public/' . $comingSoon->cover))){
                \Storage::delete('public/'. $comingSoon->cover);
            }

            $new_cover_path = $new_cover->store('images/comingsoon', 'public');

            $comingSoon->cover = $new_cover_path;

        }

        if ($comingSoon->save()) {

            return redirect()->route('admin.comingsoon')->with('success', 'Data updated successfully');

        } else {

            return redirect()->route('admin.comingsoon.edit')->with('error', 'Data failed to update');

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
        $comingSoon = ComingSoon::findOrFail($id);
        $comingSoon->delete();

        return redirect()->route('admin.comingsoon')->with('success', 'Data deleted successfully');
    }
}
