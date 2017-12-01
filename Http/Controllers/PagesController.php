<?php

namespace Modules\Pages\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Pages\Page;
use Modules\Location\Facades\Location;

class PagesController extends Controller
{
    public function index()
    {
        $regs = Page::all();

        dd(Location::getLocation());

        return view('Page::index')->with('pages',$regs);
    }
}