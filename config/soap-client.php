<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;

return Config::create()
    ->setEngine($engine = ExtSoapEngineFactory::fromOptions(
        ExtSoapOptions::defaults('D:\Workspaces\PERSONAL\sistema-ts-sdk\SistemaTs/../resources/RicevutaPdf730Service.wsdl', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('SistemaTs\Types\Type')
    ->setTypeNamespace('SistemaTs\Types\Type')
    ->setClientDestination('SistemaTs\Types')
    ->setClientName('RicevutaClient')
    ->setClientNamespace('SistemaTs\Types')
    ->setClassMapDestination('SistemaTs\Types')
    ->setClassMapName('RicevutaClassmap')
    ->setClassMapNamespace('SistemaTs\Types')
    ->addRule(new Rules\AssembleRule(new Assembler\GetterAssembler(new Assembler\GetterAssemblerOptions())))
    ->addRule(new Rules\AssembleRule(new Assembler\ImmutableSetterAssembler(
        new Assembler\ImmutableSetterAssemblerOptions()
    )))
    ->addRule(
        new Rules\IsRequestRule(
            $engine->getMetadata(),
            new Rules\MultiRule([
                new Rules\AssembleRule(new Assembler\RequestAssembler()),
                new Rules\AssembleRule(new Assembler\ConstructorAssembler(new Assembler\ConstructorAssemblerOptions())),
            ])
        )
    )
    ->addRule(
        new Rules\IsResultRule(
            $engine->getMetadata(),
            new Rules\MultiRule([
                new Rules\AssembleRule(new Assembler\ResultAssembler()),
            ])
        )
    )
;
