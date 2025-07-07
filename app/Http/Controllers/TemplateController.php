<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $templates = Template::with('category')->latest()->get();
        $categories = Category::all();

        return Inertia::render('Templates/Index', [
            'templates' => $templates,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $categories = Category::all();

        return Inertia::render('Templates/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'html_content' => 'required|string',
            'preview_image' => 'nullable|string|max:255',
        ]);

        Template::create($validated);

        return redirect()->route('templates.index')->with('success', 'Template créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template): Response
    {
        $template->load('category');

        return Inertia::render('Templates/Show', [
            'template' => $template,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template): Response
    {
        $categories = Category::all();

        return Inertia::render('Templates/Edit', [
            'template' => $template,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'html_content' => 'required|string',
            'preview_image' => 'nullable|string|max:255',
        ]);

        $template->update($validated);

        return redirect()->route('templates.show', $template)->with('success', 'Template mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('templates.index')->with('success', 'Template supprimé avec succès.');
    }

    /**
     * Get templates by category.
     */
    public function byCategory(Category $category): Response
    {
        $templates = Template::with('category')->where('category_id', $category->id)->latest()->get();
        $categories = Category::all();

        return Inertia::render('Templates/Index', [
            'templates' => $templates,
            'categories' => $categories,
            'currentCategory' => $category,
        ]);
    }

    /**
     * Preview template with event data.
     */
    public function preview(Template $template, Request $request): Response
    {
        // Récupérer les données de l'événement pour le preview
        $eventData = $request->input('event_data', []);
        
        // Remplacer les variables dans le template HTML
        $htmlContent = $this->replaceTemplateVariables($template->html_content, $eventData);

        return Inertia::render('Templates/Preview', [
            'template' => $template,
            'previewHtml' => $htmlContent,
            'eventData' => $eventData,
        ]);
    }

    /**
     * Replace template variables with actual data.
     */
    private function replaceTemplateVariables(string $htmlContent, array $eventData): string
    {
        $variables = [
            '{{EVENT_TITLE}}' => $eventData['title'] ?? 'Titre de l\'événement',
            '{{EVENT_DATE}}' => $eventData['date'] ?? 'Date de l\'événement',
            '{{EVENT_TIME}}' => $eventData['time'] ?? 'Heure de l\'événement',
            '{{EVENT_LOCATION}}' => $eventData['location'] ?? 'Lieu de l\'événement',
            '{{EVENT_DESCRIPTION}}' => $eventData['description'] ?? 'Description de l\'événement',
            '{{GUEST_NAME}}' => $eventData['guest_name'] ?? 'Nom de l\'invité',
            '{{GUEST_FIRST_NAME}}' => $eventData['guest_first_name'] ?? 'Prénom de l\'invité',
            '{{GUEST_LAST_NAME}}' => $eventData['guest_last_name'] ?? 'Nom de famille de l\'invité',
        ];

        return str_replace(array_keys($variables), array_values($variables), $htmlContent);
    }
}
