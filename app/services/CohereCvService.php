<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class CohereCvService
{
    protected Client $client;
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.cohere.api_key');

        $this->client = new Client([
            'base_uri' => 'https://api.cohere.ai/v1/',
            'headers' => [
                'Authorization' => "Bearer {$this->apiKey}",
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function analyzeCompatibility(string $cvText, string $jobDescription): array
    {
        $cvText = mb_convert_encoding($cvText, 'UTF-8', 'UTF-8');
        $jobDescription = mb_convert_encoding($jobDescription, 'UTF-8', 'UTF-8');

        $cvText = preg_replace('/[^\P{C}\n]+/u', '', $cvText);
        $jobDescription = preg_replace('/[^\P{C}\n]+/u', '', $jobDescription);

        $prompt = "Compare this CV with the job description and respond with:\n" .
                  "- Compatibility score from 0 to 100.\n" .
                  "- 3 candidate strengths.\n" .
                  "- 3 improvement areas.\n" .
                  "- A personalized cover letter for this job.\n\n" .
                  "CV:\n{$cvText}\n\n" .
                  "Job Description:\n{$jobDescription}\n\n" .
                  "Response:";

        $body = [
            'model' => 'command-r-plus',
            'prompt' => $prompt,
            'max_tokens' => 500,
            'temperature' => 0.7,
            'stop_sequences' => ["--END--"],
        ];

        try {
            $response = $this->client->post('generate', ['json' => $body]);
            $data = json_decode($response->getBody()->getContents(), true);

            $text = $data['generations'][0]['text'] ?? '';

            return [
                'raw' => trim($text),
            ];
        } catch (\Exception $e) {
            Log::error('Cohere API error: ' . $e->getMessage());
            return [
                'error' => 'Failed to get response from AI.',
            ];
        }
    }
}
