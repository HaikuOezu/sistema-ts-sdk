<?php

namespace tests\Feature;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use SistemaTs\SistemaTsService;
use SistemaTs\clients\invioClientFactory;
use SistemaTs\clients\Type\InviaFileMtom;
use SistemaTs\clients\Type\Proprietario;
use SistemaTs\Documento;
use SistemaTs\TsClient;
use SistemaTs\TsConfig;
use SistemaTs\Types\Type\InviaFileMtomResponse;

class InvioTst extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    const CERTIFICATE='
-----BEGIN CERTIFICATE-----
MIIEkjCCAnqgAwIBAgIISbny2mZ0+qIwDQYJKoZIhvcNAQELBQAwUDELMAkGA1UE
BhMCSVQxHjAcBgNVBAoMFUFnZW56aWEgZGVsbGUgRW50cmF0ZTEhMB8GA1UEAwwY
Q0EgQWdlbnppYSBkZWxsZSBFbnRyYXRlMB4XDTIxMDIyNjEzMjc0OFoXDTI0MDIy
NzEzMjc0OFowXjELMAkGA1UEBhMCSVQxHjAcBgNVBAoMFUFnZW56aWEgZGVsbGUg
RW50cmF0ZTEbMBkGA1UECwwSU2Vydml6aSBUZWxlbWF0aWNpMRIwEAYDVQQDDAlT
YW5pdGVsQ0YwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANQfl8dJ65QsUGAI
RviObyQPA2AYBpxgVjTimrn+B9C9YUSz6bbZv83ZX5dMYb368G6zsJhvZvoqVZQG
ofz5psc9HzXNAtZ9BqaZfFQ1JJmdenarRSsTdPWXuJrkktAMQ10hEo1By2fG2oy1
f934idprxOvcoxsO6tqSF8W9MtHvAgMBAAGjgeUwgeIwHwYDVR0jBBgwFoAUrsVd
VIjaAAwlPJ1qgpTX7CJbd70wgY8GA1UdHwSBhzCBhDCBgaB/oH2Ge2xkYXA6Ly9j
YWRzLmVudHJhdGUuZmluYW56ZS5pdC9DTj1DQSUyMEFnZW56aWElMjBkZWxsZSUy
MEVudHJhdGUsTz1BZ2VuemlhJTIwZGVsbGUlMjBFbnRyYXRlLEM9SVQ/Y2VydGlm
aWNhdGVSZXZvY2F0aW9uTGlzdDAdBgNVHQ4EFgQUk40paPskEoq8te6R8PK19/Bb
02AwDgYDVR0PAQH/BAQDAgQwMA0GCSqGSIb3DQEBCwUAA4ICAQBVLkFeRMqcY2kk
FBG6BGuWfcn4MEQXD0jglVH8O4avQCwEoOaxJMXXNPIzxZ/GcZALwLnOWloZWVVu
1UHAic04A+xMaNGqpWDzjBGrv2k/Dolyf0qYLeqP3JFim5ftx2hFOWTdWFZ/7/Z3
V4Es9JfLg3Ts+1q+JZ5YOmEiqQEtqXA20YYb8aYdu2uPg8HVDI7Do7Wf98sS3dYN
mg+wDOhd6WVkf9qQqAITrNKsgUoXy2mHE5iF69HrwRP4HeRo0zz7R8t7Jz8ytlRG
wQYE10wdhOlI//i6GdKXM6UEMVhGVQ8P3zHZ2LF3GGVsZoey2hAlNCcfPw0q6Yr+
uZQ1IfLHO1pWVgygL1oBpV+74lKsoNszY4v+KGvThCRU9UZ45/+FHH0AhWhJmkHz
66H5/x5Xbvdbf5lWJST+wPvu8Ic7p3x6tCRJDavk6JSyNJ13ATA0UnuMtTc1PkDw
dTEd8Gp4jTv4kh/5rMey0oZQz+Y9MKda2MP2eiBHEsGr7Ujbm0wzt8Td15I/28jn
mlXwjzdvio+InsVg3bH9xNdj0IL5xbOJquHUooZVMfiQHqcRzDQvENphVa9KVNyR
QokY6bsLtnHY/L2VsnoJ3BMXchXXnQOiKwebVe41JNyoL85h3wVLYQyIJXJHGKYu
yOukb9CRvgr1irK7KY6Hkpdua2RnuA==
-----END CERTIFICATE-----';
    const User='PROVAX00X00X000Y';
    const Password='Salve123';
    const Pincode='1234567890';
    //const Pincode_cifrato='HmhwvMEtyHOwDm5K3YEQ9RZiNAkJ+FvRwXodiABj9HpRbdQUaLa4cyYZU8YqaBsSs4Lq6u85uDci6xowmF7ZrVgLhZ83q4nSi8bSvVDPS5pPStBlOJfvo8AisqDiKdJvEPbkIhBVnbmf28gh28G/vQLkp2RgVEYinPA0LUCz8PQ=';
    const Pincode_cifrato='q4V9OEL0ukM6VE3vQAkBG45XMvuc1GsoeYfTY3coNrjXI/ykZw9Ix+/nUAOSOQleRAL1ZnGtPeOjXZPEzM8VD+RZvPQF1uMKPjhw03FB2EC5TZknm/jEKZywLvbSSME7fOCTZQOZHPu3ZMA81ri4FpPB+d45xnloB+fjiECwqRk=';
    const CF_cifrato='Ix4OzmfPxB0TTwS6+Hc0enwIhMtunRUkB4CjlDDDns5pCy2iZJ4Qxy+C/X8mMpLRz37tOXnklkkPml5Di32wtQlXpCL2qais/ZjSmwwLldUFvxQPRrwsOSgbH0yK3n+cfgXHbuyTFmjKBAT1dkc5xJ4sTW6qPlaMEIJIevQXvrQ';
    public function testInvio()
    {
        /*
        $client=new TsClient(
            self::CERTIFICATE,
            dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'InvioTelematicoSpeseSanitarie730p.wsdl',
            'https://invioSS730pTest.sanita.finanze.it/InvioTelematicoSS730pMtomWeb/InvioTelematicoSS730pMtomPort'
            );
            */
        $config=new TsConfig();
        $config->setEnvironment(TsConfig::ENV_TEST);
        $client=TsClient::getInstance($config);
        $doc=new Documento("PROVAX00X00X000Y", "00265910661", self::Pincode);
        $doc
        ->addInvoice(Carbon::now(), "1", "GRGGNN60T30D612N")
            ->addRow("1500.00", "10")
            ->addRow("1200.00", "10")
        ->addInvoice(Carbon::now(), "2", "GRGGNN60T30D612N")
            ->addRow("1400.00", "10")
            ->addRow("1600.00", "10")
            ;
        /** @var InviaFileMtomResponse $answer */
        $answer=$client->invio($doc,self::User,self::Password,self::Pincode);
        $this->assertEquals("000",$answer->getReturn()->getCodiceEsito());
        $protocollo=$answer->getReturn()->getProtocollo();
        $doc->dump("{$protocollo}.xml");
        return $protocollo;
        
    }
    /** @depends testInvio */
    public function testRicevuta($protocollo=null) {
        if (empty($protocollo)) $protocollo="21080518322352573";
        $config=new TsConfig();
        $config->setEnvironment(TsConfig::ENV_TEST);
        $client=TsClient::getInstance($config);
        /** @var \SistemaTs\Types\Type\RicevutaPdfResponse $answer */
        $answer=$client->ricevutaPdf($protocollo,self::User,self::Password,self::Pincode);
        $this->assertEquals("0",$answer->getDatiOutputRichiesta()->getEsitoChiamata());
        return [$protocollo,$answer->getDatiOutputRichiesta()->getEsitiPositivi()->getDettagliEsito()->getPdf()];
    }
    /** @depends testRicevuta */
    public function testPdf($data) {
        $this->assertEquals("0","0");
        $protocollo=array_shift($data);
        $pdf=array_shift($data);
        file_put_contents("{$protocollo}.pdf", $pdf);
        
    }
}
