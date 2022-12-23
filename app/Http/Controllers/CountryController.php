<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countries = DB::table('countries')->orderBy('name')->paginate(5);
        return view("countries.index", compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->input();
        $request->validate([
            'name' => 'required|unique:countries',
            'code' => 'required|unique:countries',
            'capital' => 'required|unique:countries',
        ]);

        $country = DB::table('countries')->insert([
            'name' => $request->name,
            'code' => $request->code,
            'capital' => $request->capital,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return back()->with('success', "Country inserted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'capital' => 'required',
        ]);

        $country = DB::table('countries')
            ->where('id', $country->id)
            ->update([
                'name' => $request->name,
                'code' => $request->code,
                'capital' => $request->capital,
                'updated_at' => now(),
            ]);
        return redirect('countries')->with('success', "Country updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        // return $country;
        $country = DB::table('countries')
            ->where('id',$country->id)
            ->delete();
        return redirect('countries')->with('success', "Country deleted");
    }
}
