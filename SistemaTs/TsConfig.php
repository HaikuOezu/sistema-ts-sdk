<?php
namespace SistemaTs;

/**
 *
 * @author giova
 *        
 */
class TsConfig
{
    const OP_INVIO='invio';
    const OP_ESITO='esito';
    const OP_ERRORE='errore';
    const OP_RICEVUTA='ricevuta';
    const ENV_PRODUCTION="production";
    const ENV_TEST="test";
    private const defaultConfig=[
        'wsdl' => [
            self::OP_INVIO => __DIR__.'/../resources/InvioTelematicoSpeseSanitarie730p.wsdl',
            self::OP_ESITO => __DIR__.'/../resources/EsitoInvioDatiSpesa730Service.wsdl',
            self::OP_ERRORE => __DIR__.'/../resources/DettaglioErrori730Service.wsdl',
            self::OP_RICEVUTA => __DIR__.'/../resources/RicevutaPdf730Service.wsdl',
        ],
        'endpoint' => [
            self::OP_INVIO => '/InvioTelematicoSS730pMtomWeb/InvioTelematicoSS730pMtomPort',
            self::OP_ESITO=>'/EsitoStatoInviiWEB/DettaglioErrori730Service',
            self::OP_ERRORE => __DIR__.'/../resources/DettaglioErrori730Service.wsdl',
            self::OP_RICEVUTA => '/Ricevute730ServiceWeb/ricevutePdf',
            
        ],
        'domain' => [
            self::ENV_PRODUCTION=>'https://invioSS730p.sanita.finanze.it',
            self::ENV_TEST=>'https://invioSS730pTest.sanita.finanze.it',
        ],
        'certificate' =>'
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
-----END CERTIFICATE-----'
    ];
    private $config=[];
    private $sslCert;
    private $domain;
    private $environment=self::ENV_PRODUCTION;
    public function __construct($environment=self::ENV_PRODUCTION,$mergeConf=[]) {
        $this->config=array_merge(self::defaultConfig,$mergeConf);
        $this->sslCert=openssl_get_publickey($this->config['certificate']);
        $this->setEnvironment($environment);
        $this->domain=$this->config['domain'][$this->getEnvironment()];
    }
    public function getCcertificate() {
        return $this->sslCert;
    }
    public function setEnvironment(String $environment) {
        if ($environment!=self::ENV_PRODUCTION) $environment=self::ENV_TEST;
        $this->environment=$environment;
        $this->domain=$this->config['domain'][$this->getEnvironment()];
    }
    public function getEnvironment() {
        return $this->environment;
    }
    public function getDomain() {
        return $this->domain;
    }
    public function getWdsl(string $operation=null) {
        if (is_null($operation)) return $this->config['wsdl'];
        if (array_key_exists($operation, $this->config['wsdl'])) {
            return $this->config['wsdl'][$operation];
        }
        throw new ExceptionInvalidMethod("Invalid operation {$operation}");
    }
    public function getEndpoint(string $operation=null) {
        if (array_key_exists($operation, $this->config['endpoint'])) {
            return $this->config['endpoint'][$operation];
        }
        throw new ExceptionInvalidMethod("Invalid operation {$operation}");
    }
}

