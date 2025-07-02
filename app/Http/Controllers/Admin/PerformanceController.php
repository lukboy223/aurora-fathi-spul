<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PerformanceController extends Controller
{
    /**
     * Display a listing of performances.
     */
    public function index()
    {
        $performances = Performance::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return view('admin.voorstellingen.index', compact('performances'));
    }

    /**
     * Show the form for creating a new performance.
     */
    public function create()
    {
        return view('admin.voorstellingen.create');
    }

    /**
     * Display the specified performance.
     */
    public function show(Performance $voorstelling)
    {
        return view('admin.voorstellingen.show', compact('voorstelling'));
    }

    /**
     * Store a newly created performance in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'duration' => 'nullable|integer|min:1|max:600',
            'price' => 'required|numeric|min:0|max:999.99',
            'max_capacity' => 'required|integer|min:1|max:10000',
            'is_active' => 'boolean'
        ], [
            'title.required' => 'Titel is verplicht.',
            'date.required' => 'Datum is verplicht.',
            'date.after_or_equal' => 'Datum moet vandaag of in de toekomst zijn.',
            'time.required' => 'Tijd is verplicht.',
            'time.date_format' => 'Tijd moet in HH:MM formaat zijn.',
            'price.required' => 'Prijs is verplicht.',
            'price.numeric' => 'Prijs moet een geldig bedrag zijn.',
            'max_capacity.required' => 'Maximale capaciteit is verplicht.',
            'max_capacity.integer' => 'Capaciteit moet een heel getal zijn.',
            'max_capacity.min' => 'Capaciteit moet minimaal 1 zijn.',
        ]);

        Performance::create($validated);

        return redirect()
            ->route('admin.voorstellingen.index')
            ->with('success', 'Voorstelling succesvol toegevoegd!');
    }

    /**
     * Show the form for editing the specified performance.
     */
    public function edit(Performance $voorstelling)
    {
        return view('admin.voorstellingen.edit', compact('voorstelling'));
    }

    /**
     * Update the specified performance in storage.
     */
    public function update(Request $request, Performance $voorstelling)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'duration' => 'nullable|integer|min:1|max:600',
            'price' => 'required|numeric|min:0|max:999.99',
            'max_capacity' => 'required|integer|min:1|max:10000',
            'is_active' => 'boolean'
        ], [
            'title.required' => 'Titel is verplicht.',
            'date.required' => 'Datum is verplicht.',
            'time.required' => 'Tijd is verplicht.',
            'time.date_format' => 'Tijd moet in HH:MM formaat zijn.',
            'price.required' => 'Prijs is verplicht.',
            'price.numeric' => 'Prijs moet een geldig bedrag zijn.',
            'max_capacity.required' => 'Maximale capaciteit is verplicht.',
            'max_capacity.integer' => 'Capaciteit moet een heel getal zijn.',
            'max_capacity.min' => 'Capaciteit moet minimaal 1 zijn.',
        ]);

        $voorstelling->update($validated);

        return redirect()
            ->route('admin.voorstellingen.index')
            ->with('success', 'Voorstelling succesvol bijgewerkt!');
    }

    /**
     * Remove the specified performance from storage.
     */
    public function destroy(Performance $voorstelling)
    {
        try {
            // Check if performance has related tickets/reservations
            // Uncomment when ticket/reservation models exist
            // if ($voorstelling->tickets()->exists() || $voorstelling->reservations()->exists()) {
            //     return redirect()
            //         ->route('admin.voorstellingen.index')
            //         ->with('error', 'Kan voorstelling niet verwijderen: er zijn nog tickets of reserveringen gekoppeld.');
            // }

            $title = $voorstelling->title;
            $voorstelling->delete();

            return redirect()
                ->route('admin.voorstellingen.index')
                ->with('success', "Voorstelling '{$title}' succesvol verwijderd!");

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.voorstellingen.index')
                ->with('error', 'Er is een fout opgetreden bij het verwijderen van de voorstelling.');
        }
    }
}
