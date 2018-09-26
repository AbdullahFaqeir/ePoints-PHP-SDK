<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/25/18
 * Time: 2:27 PM
 */

class VoidActionResponse extends BaseResponse {

	/**
	 * @var string
	 */
	private $Date;

	/**
	 * @var string
	 */
	private $Time;

	/**
	 * @var string
	 */
	private $TransactionID;

	/**
	 * @var string
	 */
	private $VoidedTransactionID;

	/**
	 * @var string
	 */
	private $CardholderName;

	/**
	 * @var string
	 */
	private $AvailablePointsBalance;

	/**
	 * @var string
	 */
	private $CashEquivalent;

	/**
	 * @var string
	 */
	private $Amount;

	/**
	 * @var string
	 */
	private $CanceledPoints;

	/**
	 * @var string
	 */
	private $PointsRedeemed;

	/**
	 * @var string
	 */
	private $LastTransactionID;

	/**
	 * VoidActionResponse constructor.
	 *
	 * @param $Result
	 * @param $ErrorDesc
	 * @param $Date
	 * @param $Time
	 * @param $TransactionID
	 * @param $VoidedTransactionID
	 * @param $CardholderName
	 * @param $AvailablePointsBalance
	 * @param $CashEquivalent
	 * @param $Amount
	 * @param $CanceledPoints
	 * @param $PointsRedeemed
	 * @param $LastTransactionID
	 */
	public function __construct( $Result, $ErrorDesc, $Date, $Time, $TransactionID, $VoidedTransactionID, $CardholderName, $AvailablePointsBalance, $CashEquivalent, $Amount, $CanceledPoints, $PointsRedeemed, $LastTransactionID ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->Date                   = $Date;
		$this->Time                   = $Time;
		$this->TransactionID          = $TransactionID;
		$this->VoidedTransactionID    = $VoidedTransactionID;
		$this->CardholderName         = $CardholderName;
		$this->AvailablePointsBalance = $AvailablePointsBalance;
		$this->CashEquivalent         = $CashEquivalent;
		$this->Amount                 = $Amount;
		$this->CanceledPoints         = $CanceledPoints;
		$this->PointsRedeemed         = $PointsRedeemed;
		$this->LastTransactionID      = $LastTransactionID;
	}

	/**
	 * Parse Response XML
	 *
	 * @param $xml
	 *
	 * @return self
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );

		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';
		$Result    = isset( $xmlData->Result ) ? (string) $xmlData->Result : 'false';

		$Date                   = isset( $xmlData->Date ) ? (string) $xmlData->Date : null;
		$Time                   = isset( $xmlData->Time ) ? (string) $xmlData->Time : null;
		$TransactionID          = isset( $xmlData->TransactionID ) ? (string) $xmlData->TransactionID : null;
		$VoidedTransactionID    = isset( $xmlData->VoidedTransactionID ) ? (string) $xmlData->VoidedTransactionID : null;
		$CardholderName         = isset( $xmlData->CardholderName ) ? (string) $xmlData->CardholderName : null;
		$AvailablePointsBalance = isset( $xmlData->AvailablePointsBalance ) ? (string) $xmlData->AvailablePointsBalance : null;
		$CashEquivalent         = isset( $xmlData->CashEquivalent ) ? (string) $xmlData->CashEquivalent : null;
		$Amount                 = isset( $xmlData->Amount ) ? (string) $xmlData->Amount : null;
		$CanceledPoints         = isset( $xmlData->CanceledPoints ) ? (string) $xmlData->CanceledPoints : null;
		$PointsRedeemed         = isset( $xmlData->PointsRedeemed ) ? (string) $xmlData->PointsRedeemed : null;
		$LastTransactionID      = isset( $xmlData->LastTransactionID ) ? (string) $xmlData->LastTransactionID : null;

		return new self( $Result, $ErrorDesc, $Date, $Time, $TransactionID, $VoidedTransactionID, $CardholderName, $AvailablePointsBalance, $CashEquivalent, $Amount, $CanceledPoints, $PointsRedeemed, $LastTransactionID );
	}

	/**
	 * @return string
	 */
	public function getDate() {
		return $this->Date;
	}

	/**
	 * @return string
	 */
	public function getTime() {
		return $this->Time;
	}

	/**
	 * @return string
	 */
	public function getTransactionID() {
		return $this->TransactionID;
	}

	/**
	 * @return string
	 */
	public function getVoidedTransactionID() {
		return $this->VoidedTransactionID;
	}

	/**
	 * @return string
	 */
	public function getCardholderName() {
		return $this->CardholderName;
	}

	/**
	 * @return string
	 */
	public function getAvailablePointsBalance() {
		return $this->AvailablePointsBalance;
	}

	/**
	 * @return string
	 */
	public function getCashEquivalent() {
		return $this->CashEquivalent;
	}

	/**
	 * @return string
	 */
	public function getAmount() {
		return $this->Amount;
	}

	/**
	 * @return string
	 */
	public function getCanceledPoints() {
		return $this->CanceledPoints;
	}

	/**
	 * @return string
	 */
	public function getPointsRedeemed() {
		return $this->PointsRedeemed;
	}

	/**
	 * @return string
	 */
	public function getLastTransactionID() {
		return $this->LastTransactionID;
	}


}