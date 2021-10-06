<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/25/18
 * Time: 2:21 PM.
 */

/**
 * Class VoidAction.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class VoidAction
{
    /**
     * @var int
     */
    private $CountryID;

    /**
     * @var string
     */
    private $StationID;

    /**
     * @var string
     */
    private $Token;

    /**
     * @var string
     */
    private $InvoiceNo;

    /**
     * @var int string
     */
    private $LastTransactionID = 0;

    /**
     * @var string
     */
    private $CardholderId;

    /**
     * @var string
     */
    private $TransactionId;

    /**
     * VoidAction constructor.
     *
     * @param $CountryID
     * @param $StationID
     * @param $Token
     * @param $InvoiceNo
     * @param $LastTransactionID
     * @param $CardholderId
     * @param $TransactionId
     */
    public function __construct($CountryID, $StationID, $Token, $InvoiceNo, $LastTransactionID, $CardholderId, $TransactionId)
    {
        $this->CountryID = (int) $CountryID;
        $this->StationID = $StationID;
        $this->Token = $Token;
        $this->InvoiceNo = $InvoiceNo;
        $this->LastTransactionID = (int) $LastTransactionID;
        $this->CardholderId = $CardholderId;
        $this->TransactionId = $TransactionId;
    }

    /**
     * Return fields as an array to be json encoded.
     *
     * @return array
     */
    public function toJson()
    {
        return [
            'CountryID'         => $this->CountryID,
            'StationID'         => $this->StationID,
            'Token'             => $this->Token,
            'InvoiceNo'         => $this->InvoiceNo,
            'LastTransactionID' => $this->LastTransactionID,
            'CardholderId'      => $this->CardholderId,
            'TransactionId'     => $this->TransactionId,
        ];
    }
}
