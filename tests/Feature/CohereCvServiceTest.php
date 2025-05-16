<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CohereCvService;

class CohereCvServiceTest extends TestCase
{
    public function test_analyzeCompatibility_returns_array_with_raw()
    {
        $service = new CohereCvService();

        $result = $service->analyzeCompatibility('CV text', 'Job description');

        $this->assertIsArray($result);
        $this->assertArrayHasKey('raw', $result);
    }
}
