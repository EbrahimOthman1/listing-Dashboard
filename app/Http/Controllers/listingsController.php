<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\listings;
class listingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this -> validate ($request , [
             'name' => 'required',
             'email'=> 'email'
           ]);
            $listings = new listings;
            $listings->name    = $request->input('name');
            $listings->address = $request->input('address');
            $listings->website = $request->input('website');
            $listings->email   = $request->input('email');
            $listings->phone   = $request->input('phone');
            $listings->bio     = $request->input('bio');
            $listings->image   = $request->input('image');

            $listings->user_id = auth()->user()->id;
            $listings->save();
            return redirect('/Dashboard')->with('success', 'Successfully Created');


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
        $listings = listings::find($id);
        return view ('editlistings')->with('listings', $listings);
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
          $this -> validate ($request , [
             'name' => 'required',
             'email'=> 'email'
           ]);
            $listings = listings::find($id);
            $listings->name    = $request->input('name');
            $listings->address = $request->input('address');
            $listings->website = $request->input('website');
            $listings->email   = $request->input('email');
            $listings->phone   = $request->input('phone');
            $listings->bio     = $request->input('bio');
            $listings->image   = $request->input('image');


            $listings->user_id = auth()->user()->id;
            $listings->save();
            return redirect('/Dashboard')->with('success', 'listings Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $listings = listings::find($id);
      $listings->delete();
      return redirect('/Dashboard')->with('success', 'listings Removed');
    }
}
