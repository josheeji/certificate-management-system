<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantExport;
use App\Imports\ParticipantsImport;
use Illuminate\Support\Facades\Response;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class ParticipantController extends Controller
{

    public function index()
    {
        // $event = Event::findOrFail($id);
        $events = Event::all();

        // $participant = Participant::where('event_id', '=', $id)->get();
        $participants = Participant::all();
        return view('pages.backend.participant.index', compact('participants', 'events'));
    }


    public function create(Request $request)
    {
        $events = Event::all();

        return view('pages.backend.participant.create', compact('events'));
    }


    public function store(Request $request)
    {
        $input = $request->only('name', 'affilated_institute', 'post', 'event_id');
        $participant = Participant::create($input);
        $participant->save();
        return redirect('/admin/participants')->with('message', 'Participant created Successfully..');
    }


    public function edit(Request $request, $id)
    {
        $events = Event::all();

        $participant = Participant::findOrFail($id);
        return view('pages.backend.participant.edit', compact('participant', 'events'));
    }

    public function update(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->name = $request->name;
        $participant->affilated_institute = $request->affilated_institute;
        $participant->post = $request->post;
        $participant->event_id = $request->event_id;

        $participant->update();

        return redirect('/admin/participants')->with('message', 'Participant Updated Successfully..');
    }


    public function destroy(Participant $participant)
    {
        return redirect('/admin/event-templates')->with('message', 'Participant Deleted Successfully..');
    }


    public function importExcel()
    {
        $events = Event::all();

        return view('pages.backend.participant.import', compact('events'));
    }

    public function storeExcel(Request $request)
    {
        $eventId = $request->input('event_id');
        $file = $request->file('excel_file');
        Excel::import(new ParticipantsImport($eventId), $file);
        return redirect('/admin/participants')->with('message', 'File Uploaded Successfully');
    }

    public function generatePdf(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);
        $template = $participant->event->eventTemplate;


        $resourcePath = '/backend_assets/images/eventTemplates/' .  $template->id . '/';

        $customPaper = array(0, 0, 667.00, 954.80);
        $height = isset($_POST['template_height']) ? $_POST['template_height'] : $customPaper[2];

        $width = isset($_POST['template_width']) ? $_POST['template_width'] : $customPaper[3];



        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('eventTemplates.' . $template->id . '.index', compact('participant', 'resourcePath', 'height', 'width'))
            ->setPaper($customPaper, 'potrait');

        return $pdf->download();
    }
}
