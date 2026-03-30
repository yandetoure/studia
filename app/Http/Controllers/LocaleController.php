<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Switch the application locale.
     *
     * @param  string  $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLocale(string $lang)
    {
        if (in_array($lang, ['en', 'fr', 'es', 'ar', 'tr'])) {
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}
