<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class CoffeeController extends Controller
{
    public function index(): View
    {
        $response = Http::get('https://api.sampleapis.com/coffee/hot');
        $coffees = $response->json();
        return view('coffees.index', compact('coffees'));
    }

    public function show($id): View
    {
        $response = Http::get("https://api.sampleapis.com/coffee/hot/$id");
        $coffee = $response->json();
        return view('coffees.show', compact('coffee'));
    }

    public function filter(Request $request): View
    {
        $response = Http::get('https://api.sampleapis.com/coffee/hot');
        $coffees = collect($response->json());

        $sortBy = $request->input('sort_by');

        if ($sortBy) {
            $coffees = $coffees->sortBy($sortBy);
        }

        return view('coffees.index', compact('coffees'));
    }

    public function search(Request $request): View
    {
        $response = Http::get('https://api.sampleapis.com/coffee/hot');
        $coffees = collect($response->json());

        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $coffees = $coffees->filter(function ($coffee) use ($searchTerm) {
                return str_contains(strtolower($coffee['title']), strtolower($searchTerm));
            });
        }

        return view('coffees.index', compact('coffees'));
    }

}
