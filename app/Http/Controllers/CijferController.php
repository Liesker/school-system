<?php

namespace App\Http\Controllers;

use App\Models\Cijfer;
use App\Models\User;
use App\Models\UserVakVoortgang;
use App\Models\Vak;
use Illuminate\Http\Request;

class CijferController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('firstname')->get();

        // Als er GEEN user geselecteerd is → laat GEEN cijfers zien
        $cijfers = collect();

        if ($request->filled('user_id')) {
            $cijfers = Cijfer::where('user_id', $request->user_id)->get();
        }

        return view('cijfers.index', compact('users', 'cijfers'));
    }

    public function show(Cijfer $cijfer)
    {
        $user = $cijfer->user;
        $vak = $cijfer->vak;

        // alle cijfers voor dit vak van deze user
        $alleCijfers = Cijfer::where('user_id', $user->id)
            ->where('vak', $vak)
            ->get();
 
        // Gewogen gemiddelde (waarde * weging) / som(weging)
        $totaalWeging = $alleCijfers->sum('weging');
        $totaalScore = $alleCijfers->sum(function ($c) {
            return floatval($c->waarde) * floatval($c->weging);
        });
        $gemiddelde = $totaalWeging > 0 ? round($totaalScore / $totaalWeging, 2) : 0;

        // Haal totaal_toetsen per user+vak uit user_vak_voortgang
        $voortgang = UserVakVoortgang::where('user_id', $user->id)
            ->where('vak', $vak)
            ->first();

        // fallback: als er geen rij is, probeer Vak tabel, anders 5
        if ($voortgang) {
            $totaal_toetsen = (int) $voortgang->totaal_toetsen;
        } else {
            $vakInfo = Vak::where('naam', $vak)->first();
            $totaal_toetsen = $vakInfo ? (int) $vakInfo->totaal_toetsen : 5;
        }

        // voortgang: hoeveel zijn er gemaakt en hoeveel nog te maken
        $huidigAantal = $alleCijfers->count();
        $restToDo = max($totaal_toetsen - $huidigAantal, 0);

        return view('cijfers.show', compact(
            'cijfer',
            'gemiddelde',
           'huidigAantal',
            'restToDo',
            'totaal_toetsen'
        ));
    } 



    public function edit(Cijfer $cijfer)
    {
        $users = User::orderBy('firstname')->get();

        // haal of maak voortgang voor deze user + dit vak
        $voortgang = UserVakVoortgang::where('user_id', $cijfer->user_id)
            ->where('vak', $cijfer->vak)
            ->first();

        $totaal_toetsen = $voortgang ? $voortgang->totaal_toetsen : 5;

        return view('cijfers.edit', compact('cijfer', 'users', 'totaal_toetsen'));
    }


    public function update(Request $request, Cijfer $cijfer)
{
        // komma → punt
        $waarde = str_replace(',', '.', $request->waarde);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'naam' => 'required|string',
            'vak' => 'required|string',
            'weging' => 'required|numeric',
            'waarde' => 'required',
            'totaal_toetsen' => 'required|integer|min:1',
        ]);

        if (!is_numeric($waarde)) {
            return back()
               ->withErrors(['waarde' => 'Voer een geldig getal in (7,5 of 7.5).'])
               ->withInput();
        }

        // update cijfer
        $cijfer->update([
            'user_id' => $request->user_id,
            'naam'    => $request->naam,
            'vak'     => $request->vak,
            'weging'  => $request->weging,
            'waarde'  => $waarde,
        ]);

        // update voortgang per user per vak
        UserVakVoortgang::updateOrCreate(
            [
                'user_id' => $request->user_id,
                'vak' => $request->vak,
            ],
            [
                'totaal_toetsen' => $request->totaal_toetsen,
            ]
        );

        return redirect()->route('cijfers.show', $cijfer)
            ->with('success', 'Cijfer succesvol aangepast!');
    }

    public function create()
   {
        $users = User::orderBy('firstname')->get();
        $selectedUserId = request('user_id');

        return view('cijfers.create', [
            'users' => $users,
            'selectedUserId' => $selectedUserId
        ]);
    }

    public function store(Request $request)
    {
        
        $waarde = str_replace(',', '.', $request->waarde);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'naam' => 'required|string',
            'weging' => 'required|integer',
            'vak' => 'required|string',
            'waarde' => 'required',
        ]);

      
        if (!is_numeric($waarde)) {
            return back()
                ->withErrors(['waarde' => 'Voer een geldig getal in (bijv. 7,5 of 7.5).'])
                ->withInput();
       }

        Cijfer::create([
            'user_id' => $request->user_id,
            'naam' => $request->naam,
            'weging' => $request->weging,
            'vak' => $request->vak,
            'waarde' => $waarde,
        ]);

        return redirect()
            ->route('cijfers.index', ['user_id' => $request->user_id])
            ->with('success', 'Cijfer succesvol toegevoegd!');
    }
    public function destroy(Cijfer $cijfer)
    {
        $userId = $cijfer->user_id; // zodat we terug kunnen naar dezelfde user

        $cijfer->delete();

        return redirect()->route('cijfers.index', ['user_id' => $userId])->with('success', 'Cijfer verwijderd.');
    }



}
