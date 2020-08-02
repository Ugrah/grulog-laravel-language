<?php

namespace Grulog\Language\Http\Controllers;

use Grulog\Language\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Grulog\Language\Jobs\ChangeLocale;

class LanguageController extends Controller
{

    /**
     * Change language.
     *
     * @param  String $lang
     * @param  Grulog\Language\Jobs\ChangeLocale $changeLocale
     * @return Response
     */
    public function language($lang, ChangeLocale $changeLocale)
    {
        $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');

        $changeLocale->lang = $lang;

        $this->dispatch($changeLocale);

        return redirect()->back();
    }
}
