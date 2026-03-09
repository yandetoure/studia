<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function orientation()
    {
        return view('pages.services.orientation');
    }

    public function abroad()
    {
        return view('pages.services.abroad');
    }

    public function visa()
    {
        return view('pages.services.visa');
    }

    public function departure()
    {
        return view('pages.services.departure');
    }

    public function housing()
    {
        return view('pages.housing');
    }

    public function flight()
    {
        return view('pages.services.flight');
    }

    public function consulting()
    {
        return view('pages.services.consulting');
    }

    public function destinations()
    {
        return view('pages.destinations');
    }

    public function whyStudia()
    {
        return view('pages.why-studia');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
