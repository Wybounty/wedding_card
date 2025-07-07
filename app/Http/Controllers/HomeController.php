<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $templates = Template::all();
        $formattedTemplates = [];
        
        foreach ($templates as $template) {
            $formattedTemplates[] = [
                'id' => $template->id,
                'name' => $template->name,
                'description' => $template->description,
                'image' => $template->image,
                'category' => $template->category,
                'created_at' => $template->created_at,
                'updated_at' => $template->updated_at,
            ];
        }

        return Inertia::render('Home', [
            'templates' => $formattedTemplates,
        ]);
    }
}