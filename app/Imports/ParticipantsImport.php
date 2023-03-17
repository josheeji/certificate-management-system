<?php

namespace App\Imports;

use App\Models\Participant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ParticipantsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Participant::create([
                'event_id' => $this->eventId,

                'name' => $row['name'],

                'affilated_institute' => $row['affilated_institute'],
                
                'post' => $row['post']
            ]);
            
        }
    }
}
