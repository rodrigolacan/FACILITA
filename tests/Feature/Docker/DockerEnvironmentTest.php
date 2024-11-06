<?php

namespace Tests\Feature\Docker;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DockerEnvironmentTest extends TestCase
{
    /**
     * Teste básico que tenta executar o comando docker --version para verificar a existência do docker no sistema
     */
    public function testDockerIsInstalled(): void
    {
        $command = 'docker --version';
        
        exec($command, $output, $return_var);

        if ($return_var === 0) {
            $this->assertStringContainsString('Docker version', implode("\n", $output));
        } else {
            $this->fail('Docker não está instalado.');
        }
    }
}
