<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Station;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cameras = Camera::query();
        if (request('term')) {
            $cameras->where('camera_name', 'Like', '%' . request('term') . '%');
        }
        $cameras = $cameras->sortable()->paginate(10);

        return view('camera.index', compact('cameras'))
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
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function show(Camera $camera)
    {
        //
        // dd($camera);
        
        return view('camera.show', compact('camera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function edit(Camera $camera)
    {
        //

        $stations = Station::all();

        $data = [
            'camera' => $camera,
            'stations' => $stations,
        ];
        // dd($data['MaxVote']);
        return view('camera/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camera $camera)
    {
        //
        $this->validate($request, [
            'camera_name' => 'required',
            'station_name' => 'required',
        ]);

        $camera->update(
            [
                'station_id' => $request->station_name
            ]
        );

        // dd($request->input());
        return redirect(route('cameras.index'))->with('success', 'Camera Successfully Mapped');

    }
    public function showImg($imgId)
    {
        $image_url = "http://infobanjirjps.selangor.gov.my/InfoBanjir.WebAdmin/CCTV_Image/$imgId.jpg";
        $image_data = file_get_contents($image_url);

        return response($image_data)->header('Content-Type', 'image/jpeg');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camera $camera)
    {
        //
    }
}
