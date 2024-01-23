<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'seriesName' => 'required'
        ]);

        $formFields['name'] = $formFields['seriesName'];
        unset($formFields['seriesName']);
        
        $formFields['slug'] = str_replace(" ", '-', trim(preg_replace("/\W+/", " ", strtolower($formFields['name']))));

        Series::create($formFields);
        return redirect('/');
    }
}
