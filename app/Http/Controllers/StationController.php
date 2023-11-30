<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $stations = Station::query();
        $stations->join('current_levels', 'current_levels.station_id', '=', 'stations.id');


        if (request('term')) {
            $term = strtoupper(request('term'));
            $stations->where('station_name', 'ilike', "%$term%");
        }
        // sort

        if (request('filter')) {
            if (request('filter') == 'danger') {
                $stations->where('alert_level', 3);
            } else if (request('filter') == 'alert') {
                $stations->where('alert_level', 2);
            } else if (request('filter') == 'warning') {
                $stations->where('alert_level', 1);
            }
        }
        if (request('sort')) {

            $order = request('order') ?? 'asc';

            if (request('sort') == 'station') {
                $stations->orderBy('station_name', $order);
            } else if (request('sort') == 'district') {
                $stations->orderBy('district_id', $order);
            } else if (request('sort') == 'water-level') {
                $stations->orderBy('current_level', $order);
            }
        }
        $stations = $stations->sortable()->paginate(10)->withQueryString();

        return view('station.index', compact('stations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
        // dd($station);
        return view('station.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}
