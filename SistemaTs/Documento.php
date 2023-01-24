<?php
namespace SistemaTs;

use DateTime;
use SimpleXMLElement;

/**
 *
 * @author giova
 *        
 */
class Documento
{
    private $cf;
    private $cf_cifrato;
    private $piva;
    private $currentInvoice;
    private $xml;

    public function __construct($cf,$piva,$opzionale1=null,$opzionale2=null,$opzionale3=null) {
        $this->currentInvoice=null;
        $this->cf=$cf;
        $this->cf_cifrato=TsCrypt::crypt($this->cf);
        $this->piva=$piva;
        $this->xml=new \SimpleXMLElement(
'<'.'?xml version="1.0" encoding="UTF-8"?>
<precompilata xsi:noNamespaceSchemaLocation="730_precompilata.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
</precompilata>');
        if ($opzionale1) $this->xml->addChild('opzionale1', $opzionale1);
        if ($opzionale2) $this->xml->addChild('opzionale1', $opzionale2);
        if ($opzionale3) $this->xml->addChild('opzionale1', $opzionale3);
        
        $proprietario = $this->xml->addChild('proprietario');
        
        $proprietario->addChild('cfProprietario', $this->cf_cifrato);
    }
    public function addInvoice(DateTime $data,String $numDoc,String $cf,Bool $tracciato=true) {
        $documentoSpesa = $this->xml->addChild('documentoSpesa');
        $idSpesa = $documentoSpesa->addChild('idSpesa');
        $idSpesa->addChild('pIva', $this->piva);
        $idSpesa->addChild('dataEmissione', $data->format('Y-m-d'));
        $numDocumentoFiscale = $idSpesa->addChild('numDocumentoFiscale');
        $numDocumentoFiscale->addChild('dispositivo', '1');
        $numDocumentoFiscale->addChild('numDocumento', $numDoc);
        $documentoSpesa->addChild('dataPagamento', $data->format('Y-m-d'));
        $documentoSpesa->addChild('flagOperazione', 'I');
        $documentoSpesa->addChild('cfCittadino', TsCrypt::crypt($cf));
        $documentoSpesa->addChild('pagamentoTracciato', $tracciato?'SI':'NO');
        $documentoSpesa->addChild('tipoDocumento', 'F');
        $documentoSpesa->addChild('flagOpposizione', 0);
        $this->currentInvoice=$documentoSpesa;
        return $this;
        
    }
    public function addRow($importo,$aliquota,$tipoSpesa='SR') {
       
        $importo=number_format($importo,2,'.','');
        $aliquota=number_format($aliquota,2,'.','');
        $voceSpesa = $this->currentInvoice->addChild('voceSpesa');
        $voceSpesa->addChild('tipoSpesa', $tipoSpesa);
        $voceSpesa->addChild('importo', $importo);
        $voceSpesa->addChild('aliquotaIVA', $aliquota);
        return $this;
    }
    public function getCfProrietario(Bool $crypted=true) {
        return $crypted?$this->cf_enc:$this->cf;
    }
    public function dump($fname=null) {
        return $fname?$this->xml->asXML($fname):$this->xml->asXML();
    }
}

