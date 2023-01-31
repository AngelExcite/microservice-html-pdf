<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Knp\Snappy\Pdf;

class PdfController extends Controller
{
    public function htmlToPdf(Request $request)
    {
        //$snappy = App::make('snappy.pdf');

        $projectDirectory = base_path();

        $snappy = new Pdf($projectDirectory . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        $html = $request->getContent();
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );
    }
}
