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
        // Validate basic fields first
        $validated = $request->validate([
            'section_id'      => 'required',
            'custom_section'  => 'nullable|string|max:255',
            'question'        => 'required|string|max:255',
            'answer'          => 'required|string',
            'order'           => 'nullable|integer|min:0',
        ]);

        // If user selected "custom", create a new section
        if ($request->section_id === 'custom') {

            // Validate custom section name
            $request->validate([
                'custom_section' => 'required|string|max:255'
            ]);

            $sectionId = Section::create([
                'name' => $request->custom_section,
                'order' => Section::max('order') + 1,
            ])->id;


        } else {
            // Normal section
            $sectionId = $request->section_id;
        }

        // Create the FAQ
        $faq = Faq::create([
            'section_id' => $sectionId,
            'question'   => $request->question,
            'answer'     => $request->answer,
            'order'      => $request->order,
        ]);

        return response()->json([
            'success' => true,
            'faq'     => $faq,
        ]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'question'        => 'required|string|max:255',
            'answer'          => 'required|string',
            'order'           => 'nullable|integer|min:0',
            'id'              => 'required|integer|exists:faqs,id',
        ]);

        $faq = Faq::find($request->id);
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'faq_id'     => 'nullable|integer|min:0',
            'section_id' => 'nullable|integer|min:0',
        ]);

        if (!empty($validated['faq_id']) && Faq::destroy($validated['faq_id'])) {
            return response()->json([], 200);
        }

        if (!empty($validated['section_id']) && Section::destroy($validated['section_id'])) {
            return response()->json([], 200);
        }

        return response()->json([], 404);
    }
}
