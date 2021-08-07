<?php
namespace SistemaTs;

use Carbon\Carbon;
use SoapClient;
use ZipArchive;

/**
 *
 * @author giova
 *        
 * @property self $instance 
 * @property TsConfig $config
*/

class TsClient
{

    static private $instance=null;
    private $config;
    private function __construct(TsConfig $config) {
        $this->config=$config;    
    }
    static public function getInstance(?TsConfig $config=null) : self {
        if (!is_object(self::$instance)) {
        if (empty($config)) {
            $config=new TsConfig();
        }
        self::$instance=new self($config);
        }
        return self::$instance;
    }
    public function invio(Documento $doc,String $login,String $password, String $pincode) {
        $soap=$this->getSoap(TsConfig::OP_INVIO,$login,$password);
        $fname=sys_get_temp_dir().'/TS_'.Carbon::now()->format('Y-m-d_His').'.xml';
        $zipname="{$fname}.zip";
        $doc->dump($fname);
        $zip=new ZipArchive();
        $zip->open($zipname,ZipArchive::CREATE);
        $zip->addFile($fname,basename($fname));
        $zip->close();
        $soapBody=[
                "nomeFileAllegato"		=> basename($zipname),
                "pincodeInvianteCifrato"	=> TsCrypt::crypt($pincode),
                "datiProprietario"		=> [ "cfProprietario" => $login ] 
            ]
        ;
        $soapBody["documento"]=file_get_contents($zipname);
        //return;        
        return $soap->inviaFileMtom($soapBody);
    }
    public function ricevutaPdf( String $protocollo,String $login,String $password, String $pincode) {
        $soap=$this->getSoap(TsConfig::OP_RICEVUTA,$login,$password);
        $soapBody=[
            'DatiInputRichiesta' => [
                "pinCode"	=> TsCrypt::crypt($pincode),
                "protocollo"		=> $protocollo,
                ]
        ]
        ;
        //return;
        return $soap->RicevutaPdf($soapBody);
    }
    public function getSoap($operation,$login,$password) : \SoapClient {
        $classmapper='\\SistemaTs\\Types\\'. ucfirst($operation) .'Classmap';
        $soapClientParam = [
//            "location"		=> "x",
            "soap_version" => SOAP_1_1,
            "login"		=> $login,
            "password"		=> $password,
            "authentication"	=> SOAP_AUTHENTICATION_BASIC,
            "trace"		=> true,
            "exceptions"	=> false,
            "location" => $this->config->getDomain().$this->config->getEndpoint($operation),
            "classmap" => $classmapper::getMap(),
//            'uri' => 'http://ejb.invioTelematicoSS730p.sanita.finanze.it/',
//            'location' => $this->location,
//            'location' => 'https://invioSS730pTest.sanita.finanze.it/InvioTelematicoSS730pMtomWeb/InvioTelematicoSS730pMtomPort',
//            'location' => "https://invioSS730p.sanita.finanze.it/InvioTelematicoSS730pMtomWeb/InvioTelematicoSS730pMtomPort",
            'cache_wsdl' => WSDL_CACHE_NONE
        ];
        if ($this->config->getEnvironment()==TsConfig::ENV_TEST) {
            $soapClientParam['stream_context'] = stream_context_create([
                'ssl' => [
                    // set some SSL/TLS specific options
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ],
            ]);
        }
//        $SoapClientParam['location']=$this->uri;
        return new \SoapClient($this->config->getWdsl($operation),$soapClientParam);
    }
}

