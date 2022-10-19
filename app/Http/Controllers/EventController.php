<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index', [
            'events' => Event::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|before_or_equal:end_date',
            'end_date' => 'required|after_or_equal:start_date',
        ]);

        // TODO: How could we improve this action?
        DB::beginTransaction();

        try {
            $event = Event::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

        } catch(\Exception $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            return $e;

        } catch(\Throwable $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            return $e;
        }

        DB::commit();

        return redirect()->route('events.show', $event)->with('status', 'Event Created!');
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
        return view('events.show', [
            'event' => Event::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('events.edit', [
            'event' => Event::findOrFail($id),
        ]);
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
        $validated = $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|before_or_equal:end_date',
            'end_date' => 'required|after_or_equal:start_date',
        ]);

        // TODO: How could we improve this action?
        DB::beginTransaction();

        try {
            $event = Event::find($id);
            $event->name = $request->name;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->save();

        } catch(\Exception $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            return $e;

        } catch(\Throwable $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            return $e;
        }

        DB::commit();

        return redirect()->route('events.show', $event)->with('status', 'Event Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // TODO: How could we improve this action?
         DB::beginTransaction();
         try {
            $event = Event::findOrFail($id);
            $event->delete();

        } catch(\Exception $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            return $e;

        } catch(\Throwable $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();

            return $e;
        }

        DB::commit();
        
        return redirect()->route('events.index')->with('status', 'Event Deleted!');
    }
}
