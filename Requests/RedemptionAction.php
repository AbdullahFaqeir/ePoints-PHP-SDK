<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 8:31 PM
 */

/**
 * Class RedemptionAction
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class RedemptionAction {

	/**
	 * @var string
	 */
	private $Amount;

	/**
	 * @var string
	 */
	private $CardholderId;

	/**
	 * @var int
	 */
	private $CountryID;

	/**
	 * @var string
	 */
	private $InvoiceNo;

	/**
	 * @var int
	 */
	private $LastTransactionID = 0;

	/**
	 * @var string
	 */
	private $StationID;

	/**
	 * @var string
	 */
	private $Token;

	/**
	 * RedemptionAction constructor.
	 *
	 * @param $Amount
	 * @param $CardholderId
	 * @param $CountryID
	 * @param $InvoiceNo
	 * @param $LastTransactionID
	 * @param $StationID
	 * @param $Token
	 */
	public function __construct( $Amount, $CardholderId, $CountryID, $InvoiceNo, $LastTransactionID, $StationID, $Token ) {
		$this->Amount            = $Amount;
		$this->CardholderId      = $CardholderId;
		$this->CountryID         = (int) $CountryID;
		$this->InvoiceNo         = $InvoiceNo;
		$this->LastTransactionID = (int) $LastTransactionID;
		$this->StationID         = $StationID;
		$this->Token             = $Token;
	}

	/**
	 * @return array
	 */
	public function toJson() {
		return array(
			'Amount'            => $this->Amount,
			'CardholderId'      => $this->CardholderId,
			'CountryID'         => $this->CountryID,
			'InvoiceNo'         => $this->InvoiceNo,
			'LastTransactionID' => $this->LastTransactionID,
			'StationID'         => $this->StationID,
			'Token'             => $this->Token,
		);
	}

}