<?php

namespace App\Http\Controllers;

use App\Models\Destination;

class DestinationController extends Controller
{
    public function index()
    {
        $hiking = Destination::where('category', 'hiking')->latest()->first();
        $trekking = Destination::where('category', 'trekking')->latest()->first();
        $camping = Destination::where('category', 'camping')->latest()->first();

        $featuredDestinations = collect([
            $hiking,
            $trekking,
            $camping,
        ])->filter();

        return view('activities', compact('featuredDestinations'));
    }

    public function category($category)
    {
        $allowedCategories = ['hiking', 'trekking', 'camping'];

        if (! in_array($category, $allowedCategories)) {
            abort(404);
        }

        $destinations = Destination::where('category', $category)
            ->latest()
            ->paginate(9);

        return view('destinations.category', compact('destinations', 'category'));
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }
}
