<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event): Response
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        $guests = $event->guests()->latest()->get();

        return Inertia::render('Guests/Index', [
            'event' => $event,
            'guests' => $guests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event): Response
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        return Inertia::render('Guests/Create', [
            'event' => $event,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        $validated['event_id'] = $event->id;

        Guest::create($validated);

        return redirect()->route('events.guests.index', $event)->with('success', 'Invitée ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Guest $guest): Response
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        // Vérifier que l'invité appartient à l'événement
        if ($guest->event_id !== $event->id) {
            abort(404);
        }

        return Inertia::render('Guests/Show', [
            'event' => $event,
            'guest' => $guest,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event, Guest $guest): Response
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        // Vérifier que l'invité appartient à l'événement
        if ($guest->event_id !== $event->id) {
            abort(404);
        }

        return Inertia::render('Guests/Edit', [
            'event' => $event,
            'guest' => $guest,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event, Guest $guest)
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        // Vérifier que l'invité appartient à l'événement
        if ($guest->event_id !== $event->id) {
            abort(404);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
        ]);

        $guest->update($validated);

        return redirect()->route('events.guests.index', $event)->with('success', 'Invitée mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Guest $guest)
    {
        // Vérifier que l'utilisateur est propriétaire de l'événement
        if ($event->user_id !== Auth::id()) {
            abort(403);
        }

        // Vérifier que l'invité appartient à l'événement
        if ($guest->event_id !== $event->id) {
            abort(404);
        }

        $guest->delete();

        return redirect()->route('events.guests.index', $event)->with('success', 'Invitée supprimée avec succès.');
    }
}
