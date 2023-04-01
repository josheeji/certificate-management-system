<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCertificateTemplate;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // $eventTemplates = EventCertificateTemplate::all();
        $eventTypes = EventType::all();
        $events = Event::all();
        return view('pages.backend.event.index', compact('events', 'eventTypes'));
    }

    public function create()
    {
        // $eventTemplates = EventCertificateTemplate::all();
        $eventTypes = EventType::all();
        return view('pages.backend.event.create', compact('eventTypes'));
    }

    public function store(Request $request)
    {
        $input = $request->only(
            'name',
            'organizer_name',
            'eventType_id',
            'start_date',
            'end_date',
            'description',
            'location',
            'event_time'
        );

        $event = Event::create($input);
        $event->save();
        return redirect('admin/events')->with('message', 'Event Created Successfully..');
    }

    public function edit(Request $request, $id)
    {
        // $eventTemplates = EventCertificateTemplate::all();

        $eventTypes = EventType::all();
        $event = Event::findOrFail($id);

        return view('pages.backend.event.edit', compact('event', 'eventTypes'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->organizer_name = $request->organizer_name;
        $event->eventType_id = $request->eventType_id;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->location = $request->location;
        $event->event_time = $request->event_time;
        $event->description = $request->description;

        $event->update();
        return redirect('admin/events')
            ->with('message', 'Event Updated Successfully..');
    }

    // public function destroy(Request $request)
    // {
    //     $event_id = $request->input('deleting_event_id');
    //     $event = Event::findOrFail($event_id);
    //     $event->delete();
    //     return redirect('/admin/events')
    //         ->with('message', 'Event Deleted successfully..');
    // }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('/admin/events')
            ->with('message', 'Event Deleted successfully..');
    }
}
