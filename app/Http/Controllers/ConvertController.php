<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class ConvertController extends Controller
{
    public function store(Request $request)
    {
        $snappy = App::make('snappy.pdf');
        //To file
        // get body
        $html = $request->getContent();
        //$snappy->generateFromHtml($html, '/tmp/bill-123.pdf');
        //$snappy->generate('http://www.github.com', '/tmp/github.pdf');
        //Or output:
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );

        //return json_encode($request->all());
    }
}
