<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //department main page
        $facilities = Facility::all();
        // $departments = department::all();
        // dd($facilities);

        return view('facilities', compact('facilities'));
    }

    public function viewFacility($id)
    {
        // view a single facility_type
        $facility = Facility::find($id);
        $facility_name = Facility::find($id)->name;
        $facility_status = Facility::find($id)->operational_status;
        $facility_services = Facility::find($id)->services;
        // dd($facility_name);
        // dd($facility);
        return view('view-facility', compact('facility', 'facility_name', 'facility_status', 'facility_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Facility::firstOrCreate([
            'name' => $request->facility_name,
            'mfl_code' => $request->mfl_code,
            'county' => $request->county,
            'sub_county' => $request->sub_county,
            'ward' => $request->ward,
            'facility_type' => $request->facility_type,
            'services' => $request->services,
            'operational_status' => $request->status,
            'date_established' => $request->date_established,
            'date_operational' => $request->date_operational,
            'no_of_doctors' => $request->doctors,
            'no_of_nurses' => $request->nurses,
        ]);

        return redirect()->route('facilities');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFacilityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacilityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        $facility = Facility::all();
        dd($facility);
        return view('edit-facility', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFacilityRequest  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }
}