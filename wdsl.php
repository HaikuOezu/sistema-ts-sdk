<?php 
require __DIR__.'/vendor/autoload.php';
use SistemaTs\TsConfig;
use SistemaTs\TsClient;
use SistemaTs\Documento;
use Carbon\Carbon;

$config=new TsConfig();
foreach ($config->getWdsl() as $operation=>$wdsl) {
    echo $operation, "\t",$wdsl,"\n";
    /*
    $soap=new SoapClient($wdsl);
    print_r($soap->__getFunctions());
    print_r($soap->__getTypes());
    */
}
$config=new TsConfig();
$config->setEnvironment(TsConfig::ENV_TEST);
$client=TsClient::getInstance($config);
$doc=new Documento("PROVAX00X00X000Y", "00265910661", "0123456789");
$doc
->addInvoice(Carbon::now(), "1", "GRGGNN60T30D612N")
->addRow("1500.00", "10.00")
->addRow("1200.00", "10.00")
->addInvoice(Carbon::now(), "2", "GRGGNN60T30D612N")
->addRow("1400.00", "10.00")
->addRow("1600.00", "10.00");
echo "\n";
echo  $doc->dump();
echo "\n";
