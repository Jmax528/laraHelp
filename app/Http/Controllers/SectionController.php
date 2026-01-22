<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create()
    {
        $validated = request()->validate([
            'section_name' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        // Get the last section by order (not by ID)
        $lastOrder = Section::orderBy('order', 'desc')->first();

        // If user provided an order, use it; otherwise auto-increment
        if (!isset($validated['order'])) {
            $validated['order'] = $lastOrder ? $lastOrder->order + 1 : 0;
        }

        Section::create($validated);

        return back()->with('success', 'Section created successfully.');
    }

}
