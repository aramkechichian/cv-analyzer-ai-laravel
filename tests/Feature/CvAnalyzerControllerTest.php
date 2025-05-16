<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\CvParserService;
use App\Services\CohereCvService;
use Mockery;

class CvAnalyzerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_upload_form_returns_view()
    {
        $response = $this->get(route('upload.form'));

        $response->assertStatus(200);
        $response->assertViewIs('upload');
    }

}