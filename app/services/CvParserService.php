<?php

namespace App\Services;

use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory;

class CvParserService
{
    public function parse($file)
    {
        $extension = $file->getClientOriginalExtension();

        if ($extension === 'pdf') {
            return $this->parsePdf($file->getPathname());
        } elseif ($extension === 'docx') {
            return $this->parseDocx($file->getPathname());
        }

        return '';
    }

    protected function parsePdf($path)
    {
        $parser = new Parser();
        $pdf = $parser->parseFile($path);
        $text = $pdf->getText();

        return $text;
    }

    protected function parseDocx($path)
    {
        $phpWord = IOFactory::load($path);
        $text = '';

        foreach ($phpWord->getSections() as $section) {
            $elements = $section->getElements();
            foreach ($elements as $element) {
                if (method_exists($element, 'getText')) {
                    $text .= $element->getText() . "\n";
                }
            }
        }

        return $text;
    }
}
