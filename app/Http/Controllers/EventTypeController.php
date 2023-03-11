<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function index()
    {
        $eventTypes = EventType::all();

        return view('pages.backend.eventType.index', compact('eventTypes'));
    }

    public function create()
    {

        return view('pages.backend.eventType.create');
    }

    public function store(Request $request)
    {


        $input = $request->only('name');
        $event = EventType::create($input);
        $event->save();


        return redirect('admin/event-types')->with('message', 'Event Type created successfully..');
    }
    public function edit(Request $request, $id)
    {
        $eventType = EventType::findOrFail($id);
        return view('pages.backend.eventType.edit', compact('eventType'));
        // return redirect('admin/event-types', compact('eventType'))->with('message', 'Event Type created successfully..');
    }
    public function update(Request $request, $id)
    {
        $eventType = EventType::findOrFail($id);
        $eventType->name = $request->name;
        $eventType->update();
        return redirect('admin/event-types')
            ->with('message', 'Event Type Updated successfully..');
    }
    public function destroy($id)
    {
        $eventType = EventType::findOrFail($id);
        $eventType->delete();

        return redirect('admin/event-types')
            ->with('message', 'Event Type Deleted successfully..');;
    }
}
