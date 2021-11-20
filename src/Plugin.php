<?php

namespace Burceyz\Psalm\LaravelCollection;

use SimpleXMLElement;
use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;

class Plugin implements PluginEntryPointInterface
{
    /** @return void */
    public function __invoke(RegistrationInterface $registration, ?SimpleXMLElement $config = null):void
    {
        foreach ($this->getStubFiles() as $file) {
            $registration->addStubFile($file);
        }
    }

    /** @return list<string> */
    private function getStubFiles(): array
    {
        return glob(__DIR__ . '/../stubs/*.phpstub') ?: [];
    }
}
