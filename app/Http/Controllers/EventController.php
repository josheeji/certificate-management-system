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
        $eventTemplates = EventCertificateTemplate::all();
        $eventTypes = EventType::all();
        $events = Event::all();
        return view('pages.backend.event.index', compact('events', 'eventTypes', 'eventTemplates'));
    }

    public function create()
    {
        $eventTemplates = EventCertificateTemplate::all();
        $eventTypes = EventType::all();
        return view('pages.backend.event.create', compact('eventTypes', 'eventTemplates'));
    }

    public function store(Request $request)
    {
        $input = $request->only('name', 'organizer_name', 'eventType_id', 'start_date', 'end_date', 'description', 'template_id');
        $event = Event::create($input);
        $event->save();
        return redirect('admin/events')->with('message', 'Event Created Successfully..');
    }

    public function edit(Request $request, $id)
    {
        $eventTemplates = EventCertificateTemplate::all();

        $eventTypes = EventType::all();
        $event = Event::findOrFail($id);

        return view('pages.backend.event.edit', compact('event', 'eventTypes', 'eventTemplates'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->name = $request->name;
        $event->organizer_name = $request->organizer_name;
        $event->eventType_id = $request->eventType_id;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->description = $request->description;
        $event->template_id = $request->template_id;

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
