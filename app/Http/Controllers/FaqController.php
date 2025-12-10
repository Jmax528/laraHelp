<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Section;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $sections = Section::with('faqs')->orderBy('order')->get();
        return view('faq', compact('sections'));
    }

    public function create(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'question'   => 'required|string|max:255',
            'answer'     => 'required|string',
            'order'      => 'nullable|integer|min:0',
        ]);

        // Create new FAQ
        $faq = Faq::create($validated);

        // Return JSON response
        return response()->json([
            'success' => true,
            'faq'     => $faq,
        ]);
    }
}
