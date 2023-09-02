<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParcelRequest;
use App\Http\Requests\trackingsearch;
use App\Http\Requests\UpdateParcelRequest;
use App\Models\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParcelRequest $request)
    {
        $newParcel = Parcel::create(
            ['title' => $request->title,
             'description' => $request->title,
             'status' => $request->status,
             'tracking_number' => $request->trackingNumber
            ]
        );
        $newParcel->save();
        return $newParcel;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $retval = Parcel::where('tracking_number', $request->trackingNumber)->first();

        if (!$retval) {
            return response(['error' => true, 'message' => 'Not found'], 404);
        }
        return $retval;
    }


    /**
     * Display the specified resource.
     */
    public function getbytracking(trackingsearch $request)
    {
        $retval =  Parcel::where('tracking_number', $request->trackingNumber)->first();
        if (!$retval) {
            return response(['error' => true, 'message' => 'Not found'], 404);
        }
        return $retval;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParcelRequest $request, Parcel $parcel)
    {
        $parcel = Parcel::where('tracking_number', $request->trackingNumber)->first();
        if(!$parcel) {
            return response(['error' => true, 'message' => 'Not found'], 404);
        }
        $parcel->status = $request->status;
        $parcel->save();
        return $parcel;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcel $parcel)
    {
        //
    }
}
