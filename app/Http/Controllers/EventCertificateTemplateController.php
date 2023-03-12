<?php

namespace App\Http\Controllers;

use App\Models\EventCertificateTemplate;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use App\Providers\PDFServiceProvider;
use GuzzleHttp\Client;
use php;



class EventCertificateTemplateController extends Controller
{
    public function __construct(private readonly Client $client)
    {
    }
    public function index()
    {
        $eventTemplates = EventCertificateTemplate::all();
        return view('pages.backend.eventTemplate.index', compact('eventTemplates'));
    }
    public function create()
    {
        $eventTemplate = EventCertificateTemplate::all();
        return view('pages.backend.eventTemplate.create', compact('eventTemplate'));
    }
    public function store(Request $request)
    {
        $input = $request->only(
            'custom_field',
            'template_name',
            'template_width',
            'template_height'
        );

        $file = $request->file('url');
        $filename = 'index.blade.php';
        $input['url'] = $filename;
        $evenntTemplate = EventCertificateTemplate::create($input);
        $evenntTemplate->save();
        $id = $evenntTemplate->id;



        $file->move(resource_path('/views/eventTemplates/' . $id), $filename);

        if ($request->hasFile('template_files')) {
            foreach ($request->file('template_files') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path('/backend_assets/images/eventTemplates/' . $id), $filename);
                $input['template_files'] = $filename;
            }
        }
        return redirect('/admin/event-templates')->with('message', 'Template created Successfully..');
    }
    public function edit(Request $request, $id)
    {
        $evenntTemplate = EventCertificateTemplate::findOrFail($id);
        return view('pages.backend.eventTemplate.edit', compact('evenntTemplate'));
    }
    public function update(Request $request, $id)
    {
        $evenntTemplate = EventCertificateTemplate::findOrFail($id);
        $evenntTemplate->template_name = $request->template_name;
        $evenntTemplate->custom_field = $request->custom_field;
        $evenntTemplate->template_height = $request->template_height;
        $evenntTemplate->template_width = $request->template_width;

        if ($request->hasFile('url')) {
            $destination = ('backend_assets/images/eventTemplates/' . $id) . $evenntTemplate->url;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('url');
            $filename = $file->getClientOriginalName();

            // $file->move(public_path('/backend_assets/images/eventTemplates/' . $id), $filename);
            $file->move(resource_path('/views/eventTemplates/' . $id), $filename);

            $evenntTemplate->url = $filename;
        }


        // if ($request->hasFile('url')) {
        //     $destination = 'backend_assets/images/eventTemplates/' . $evenntTemplate->url;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('url');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = microtime() . '.' . $extension;
        //     $file->move(public_path('/backend_assets/images/eventTemplates'), $filename);
        //     $evenntTemplate->url = $filename;
        // }
        $evenntTemplate->update();
        return redirect('admin/event-templates')->with('message', 'Event Template Updated successfully');
    }
    public function destroy()
    {
    }


}
