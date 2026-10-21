<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function pricing(): View
    {
        return view('pages.pricing');
    }

    public function warranty()
    {
        return view('pages.warranty');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function contactGuide()
    {
        return view('pages.contact-guide');
    }
}
