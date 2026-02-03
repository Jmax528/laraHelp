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
            'section_id' => 'required',
            'custom_section' => 'nullable|string|max:255',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order-section' => 'nullable|integer|min:0',
            'order-faq' => 'nullable|integer|min:0',
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

        // Determine order
        $order = $request->order !== null
            ? $request->order
            : (Faq::max('order') ?? 0) + 1;

        Faq::create([
            'section_id' => $sectionId,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $order,
        ]);

        return redirect()->back()->with('success', 'FAQ aangemaakt!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'order' => 'nullable|integer|min:0',
            'faq_id' => 'required|integer|exists:faqs,id',
        ]);

        $faq = Faq::find($request->faq_id);

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->order = $request->order;
        $faq->save();

        return redirect()->back()->with('success', 'FAQ aangepast!');
    }

    public function delete(Request $request)
    {
        $validated = $request->validate([
            'faq_id' => 'nullable|integer|min:0',
            'section_id' => 'nullable|integer|min:0',
        ]);

        if (!empty($validated['faq_id']) && Faq::destroy($validated['faq_id'])) {
            return redirect()->back()->with('success', 'Deleted');
        }

        if (!empty($validated['section_id']) && Section::destroy($validated['section_id'])) {
            return redirect()->back()->with('success', 'Deleted');
        }

        return response()->json([], 404);
    }
}
