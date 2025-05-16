<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CvParserService;
use App\Services\CohereCvService;

class CvAnalyzerController extends Controller
{
    protected CvParserService $parserService;
    protected CohereCvService $cohereService;

    public function __construct(CvParserService $parserService, CohereCvService $cohereService)
    {
        $this->parserService = $parserService;
        $this->cohereService = $cohereService;
    }

    public function showUploadForm()
    {
        return view('upload');
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf,docx',
            'job_description' => 'required|string|min:10',
        ]);

        $cvText = $this->parserService->parse($request->file('cv_file'));
        $jobDescription = $request->input('job_description');

        $result = $this->cohereService->analyzeCompatibility($cvText, $jobDescription);

        return view('result', ['result' => $result]);
    }
}
