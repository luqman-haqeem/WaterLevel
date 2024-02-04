<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscriptions = Subscription::query();
        $subscriptions->where('user_id', Auth::id());
        $subscriptions->join('stations', 'stations.id', 'subscriptions.station_id');
        $subscriptions->join('current_levels', 'current_levels.station_id', '=', 'stations.id');

        if (request('term')) {
            $term = strtoupper(request('term'));
            $station_id = Station::where('station_name', 'ilike', "%$term%")->pluck('id');
            
            $subscriptions->whereIn('station_id', $station_id);
        }
        if (request('filter')) {
            if (request('filter') == 'danger') {
                $subscriptions->where('alert_level', 3);
            } else if (request('filter') == 'alert') {
                $subscriptions->where('alert_level', 2);
            } else if (request('filter') == 'warning') {
                $subscriptions->where('alert_level', 1);
            }
        }
        if (request('sort')) {

            $order = (request('order') === "asc" || request('order') === "desc") ? request('order') : "asc";

            if (request('sort') == 'station') {
                $subscriptions->orderBy('stations.station_name', $order);
            } else if (request('sort') == 'district') {
                $subscriptions->orderBy('stations.district_id', $order);
            } else if (request('sort') == 'water-level') {
                $subscriptions->orderBy('current_levels.current_level', $order);
            }
        }

        $subscriptions = $subscriptions->paginate(10);

        return view('subscription.index', compact('subscriptions'))
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
        $stations = Station::all();

        return view('subscription.create', compact('stations'));
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
        // dd($request->input());
        $request->validate([
            'station_id' => 'required',
        ]);
        $station_id = $request->input('station_id');
        $user_id = Auth::id();

        $isAlrExist = Subscription::where('user_id', $user_id)->where('station_id', $station_id)->first();

        if (empty($isAlrExist)) {
            $newSub =  new Subscription();

            $newSub->station_id = $station_id;
            $newSub->user_id = $user_id;
            $newSub->save();


            $status = 'success';
            $message = 'Successfully subscribe to this station.';
        } else {
            $status = 'error';
            $message = 'Your Already Subscribe to this station';
        }

        return redirect()->route('subscriptions.index')
            ->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
        return view('subscription.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
        $subscription->delete();

        return redirect()->route('subscriptions.index')
            ->with('success', 'Successfully Removed Subscription');
    }

    /**
     * Add station as favorite
     *
     * @return \Illuminate\Http\Response
     */
    public function favorite(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $station_id = $request->input('id');
        $user_id = Auth::id();


        $isAlrExist = Subscription::where('user_id', $user_id)->where('station_id', $station_id)->first();
        if (empty($isAlrExist)) {
            $subscription =  new Subscription();
            $subscription->station_id = $station_id;
            $subscription->user_id = $user_id;
            $subscription->save();

            $status = 1;
            $message = 'Added station as favorite';
        } else {
            $isAlrExist->delete();
            $status = 0;
            $message = 'Remove station  as favorite';
        }

        $response = [
            "status" => $status,
            "msg" => $message,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function savePlayerId(Request $request)
    {
        $playerId = $request->input('playerId');
        $userId = Auth::id(); // Get the currently authenticated user's ID
        // Update the user record with the player ID
        $user = User::find($userId);
        $user->onesignal_player_id = $playerId;
        $user->save();

        return response()->json(['message' => 'Player ID saved for the user'], 200);

    }
}
