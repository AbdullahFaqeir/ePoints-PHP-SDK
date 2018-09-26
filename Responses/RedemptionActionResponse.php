<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 8:39 PM
 */

/**
 * Class RedemptionActionResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class RedemptionActionResponse extends BaseResponse {

	/**
	 * @var int
	 */
	private $RequireReloadSettings;

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
	private $PointsBalanceBefor;

	/**
	 * @var string
	 */
	private $PointsRedeemed;

	/**
	 * @var string
	 */
	private $LastTransactionID;


	/**
	 * RedemptionActionResponse constructor.
	 *
	 * @param $Result
	 * @param $ErrorDesc
	 * @param $RequireReloadSettings
	 * @param $Date
	 * @param $Time
	 * @param $TransactionID
	 * @param $CardholderName
	 * @param $AvailablePointsBalance
	 * @param $CashEquivalent
	 * @param $Amount
	 * @param $PointsBalanceBefor
	 * @param $PointsRedeemed
	 * @param $LastTransactionID
	 */
	public function __construct( $Result, $ErrorDesc, $RequireReloadSettings, $Date, $Time, $TransactionID, $CardholderName, $AvailablePointsBalance, $CashEquivalent, $Amount, $PointsBalanceBefor, $PointsRedeemed, $LastTransactionID ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->RequireReloadSettings  = $RequireReloadSettings;
		$this->Date                   = $Date;
		$this->Time                   = $Time;
		$this->TransactionID          = $TransactionID;
		$this->CardholderName         = $CardholderName;
		$this->AvailablePointsBalance = $AvailablePointsBalance;
		$this->CashEquivalent         = $CashEquivalent;
		$this->Amount                 = $Amount;
		$this->PointsBalanceBefor     = $PointsBalanceBefor;
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
		$xmlData               = simplexml_load_string( $xml );
		$ErrorDesc             = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';
		$RequireReloadSettings = isset( $xmlData->RequireReloadSettings ) ? (string) $xmlData->RequireReloadSettings : '';
		$Result                = isset( $xmlData->Result ) ? (string) $xmlData->Result : 'false';

		$Date                   = isset( $xmlData->Date ) ? (string) $xmlData->Date : null;
		$Time                   = isset( $xmlData->Time ) ? (string) $xmlData->Time : null;
		$TransactionID          = isset( $xmlData->TransactionID ) ? (string) $xmlData->TransactionID : null;
		$CardholderName         = isset( $xmlData->CardholderName ) ? (string) $xmlData->CardholderName : null;
		$AvailablePointsBalance = isset( $xmlData->AvailablePointsBalance ) ? (string) $xmlData->AvailablePointsBalance : null;
		$CashEquivalent         = isset( $xmlData->CashEquivalent ) ? (string) $xmlData->CashEquivalent : null;
		$Amount                 = isset( $xmlData->Amount ) ? (string) $xmlData->Amount : null;
		$PointsBalanceBefor     = isset( $xmlData->PointsBalanceBefor ) ? (string) $xmlData->PointsBalanceBefor : null;
		$PointsRedeemed         = isset( $xmlData->PointsRedeemed ) ? (string) $xmlData->PointsRedeemed : null;
		$LastTransactionID      = isset( $xmlData->LastTransactionID ) ? (string) $xmlData->LastTransactionID : null;


		return new self( $Result, $ErrorDesc, $RequireReloadSettings, $Date, $Time, $TransactionID, $CardholderName, $AvailablePointsBalance, $CashEquivalent, $Amount, $PointsBalanceBefor, $PointsRedeemed, $LastTransactionID );
	}

	/**
	 * @return int
	 */
	public function getRequireReloadSettings() {
		return $this->RequireReloadSettings;
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
	public function getPointsBalanceBefor() {
		return $this->PointsBalanceBefor;
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