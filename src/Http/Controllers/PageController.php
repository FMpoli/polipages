<?php
namespace Detit\Polipages\Http\Controllers;

use Detit\Polipages\Models\Page;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function show($slug = '/')
    {
        $page = Page::where('slug->' . app()->getLocale(), $slug)->first();

        if ($page) {
        } else {
            abort(404);
        }

        return view('polipages::pages.default', compact('page'));
    }
}
