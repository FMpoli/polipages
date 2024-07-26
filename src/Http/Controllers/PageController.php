<?php
namespace Detit\Polipages\Http\Controllers;

use Detit\Polipages\Models\Page;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function show($slug = '/')
    {
        // Se lo slug è vuoto, imposta lo slug alla home page
        if ($slug == '/') {
            $page = Page::where('slug->' . app()->getLocale(), $slug)->first();
        } else {

            $page = Page::where('slug->' . app()->getLocale(), $slug)->first();
        }

        if ($page) {
            // Log per vedere il contenuto della pagina
            Log::debug('Page found:', ['page' => $page]);
        } else {
            Log::debug('Page not found for slug:', ['slug' => $slug]);
            abort(404);
        }

        return view('pages.default', compact('page'));
    }
}
