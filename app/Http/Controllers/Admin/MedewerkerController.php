<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MedewerkerController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('role', 'medewerker')->get();
            return view('admin.medewerkers.index', compact('users'));
        } catch (\Exception $e) {
            Log::error('Fout bij het ophalen van medewerkers: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Er is een fout opgetreden bij het laden van de medewerkers.');
        }
    }

    public function create()
    {
        return view('admin.medewerkers.create');
    }

    /**
     * Display the specified medewerker.
     */
    public function show(User $medewerker)
    {
        if ($medewerker->role !== 'medewerker') {
            return redirect()->route('admin.medewerkers.index')->with('error', 'Deze gebruiker is geen medewerker.');
        }
        
        return view('admin.medewerkers.show', compact('medewerker'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Naam is verplicht.',
            'name.max' => 'Naam mag maximaal 255 tekens zijn.',
            'email.required' => 'E-mailadres is verplicht.',
            'email.email' => 'Voer een geldig e-mailadres in.',
            'email.unique' => 'Dit e-mailadres is al in gebruik.',
            'email.max' => 'E-mailadres mag maximaal 255 tekens zijn.',
            'password.required' => 'Wachtwoord is verplicht.',
            'password.min' => 'Wachtwoord moet minimaal 6 tekens zijn.',
        ]);
        
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 'medewerker';
            $user->password = Hash::make($request->password);
            $user->save();
            
            Log::info('Medewerker aangemaakt: ' . $user->id . ' - ' . $user->name);
            
            return redirect()->route('admin.medewerkers.index')->with('success', 'Medewerker "' . $request->name . '" is succesvol aangemaakt.');
        } catch (\Exception $e) {
            Log::error('Fout bij het aanmaken van medewerker: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->withInput()->with('error', 'Er is een fout opgetreden bij het aanmaken van de medewerker. Probeer het opnieuw.');
        }
    }

    public function edit(User $medewerker)
    {
        if ($medewerker->role !== 'medewerker') {
            return redirect()->route('admin.medewerkers.index')->with('error', 'Deze gebruiker is geen medewerker.');
        }
        
        return view('admin.medewerkers.edit', ['account' => $medewerker]);
    }

    public function update(Request $request, User $medewerker)
    {
        if ($medewerker->role !== 'medewerker') {
            return redirect()->route('admin.medewerkers.index')->with('error', 'Deze gebruiker is geen medewerker.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $medewerker->id . '|max:255',
            'password' => 'nullable|min:6',
        ], [
            'name.required' => 'Naam is verplicht.',
            'name.max' => 'Naam mag maximaal 255 tekens zijn.',
            'email.required' => 'E-mailadres is verplicht.',
            'email.email' => 'Voer een geldig e-mailadres in.',
            'email.unique' => 'Dit e-mailadres is al in gebruik.',
            'email.max' => 'E-mailadres mag maximaal 255 tekens zijn.',
            'password.min' => 'Wachtwoord moet minimaal 6 tekens zijn.',
        ]);

        try {
            $data = $request->only('name', 'email');
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
            $medewerker->update($data);

            return redirect()->route('admin.medewerkers.index')->with('success', 'Medewerker "' . $medewerker->name . '" is succesvol bijgewerkt.');
        } catch (\Exception $e) {
            Log::error('Fout bij het bijwerken van medewerker: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Er is een fout opgetreden bij het bijwerken van de medewerker. Probeer het opnieuw.');
        }
    }

    public function destroy(User $medewerker)
    {
        if ($medewerker->role !== 'medewerker') {
            return redirect()->route('admin.medewerkers.index')->with('error', 'Deze gebruiker is geen medewerker.');
        }

        try {
            $naam = $medewerker->name;
            $medewerker->delete();
            return redirect()->route('admin.medewerkers.index')->with('success', 'Medewerker "' . $naam . '" is succesvol verwijderd.');
        } catch (\Exception $e) {
            Log::error('Fout bij het verwijderen van medewerker: ' . $e->getMessage());
            return redirect()->route('admin.medewerkers.index')->with('error', 'Er is een fout opgetreden bij het verwijderen van de medewerker. Probeer het opnieuw.');
        }
    }
}