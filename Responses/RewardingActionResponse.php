<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/20/18
 * Time: 9:26 PM
 */

/**
 * Class RewardingActionResponse
 *
 * @author Abdullah Al-Faqeir
 * @package Devloops_Epoints
 */
class RewardingActionResponse extends BaseResponse {

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
	private $LastTransactionID;

	/**
	 * @var string
	 */
	private $DiscountedAmount;

	/**
	 * @var string
	 */
	private $PointsEarned;

	/**
	 * @var string
	 */
	private $TotalAmount;

	/**
	 * @var string
	 */
	protected $rowResponse;

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
	 * @param $PointsEarned
	 * @param $LastTransactionID
	 * @param $TotalAmount
	 * @param $DiscountedAmount
	 */
	public function __construct( $xml, $Result, $ErrorDesc, $RequireReloadSettings, $Date, $Time, $TransactionID, $CardholderName, $AvailablePointsBalance, $CashEquivalent, $Amount, $PointsEarned, $LastTransactionID, $TotalAmount, $DiscountedAmount ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->RequireReloadSettings  = $RequireReloadSettings;
		$this->Date                   = $Date;
		$this->Time                   = $Time;
		$this->TransactionID          = $TransactionID;
		$this->CardholderName         = $CardholderName;
		$this->AvailablePointsBalance = $AvailablePointsBalance;
		$this->CashEquivalent         = $CashEquivalent;
		$this->Amount                 = $Amount;
		$this->PointsEarned           = $PointsEarned;
		$this->LastTransactionID      = $LastTransactionID;
		$this->TotalAmount            = $TotalAmount;
		$this->rowResponse            = $xml;
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
		$PointsEarned           = isset( $xmlData->PointsEarned ) ? (string) $xmlData->PointsEarned : null;
		$LastTransactionID      = isset( $xmlData->LastTransactionID ) ? (string) $xmlData->LastTransactionID : null;
		$TotalAmount            = isset( $xmlData->TotalAmount ) ? (string) $xmlData->TotalAmount : null;
		$DiscountedAmount       = isset( $xmlData->DiscountedAmount ) ? (string) $xmlData->DiscountedAmount : null;


		return new self( $xml, $Result, $ErrorDesc, $RequireReloadSettings, $Date, $Time, $TransactionID, $CardholderName, $AvailablePointsBalance, $CashEquivalent, $Amount, $PointsEarned, $LastTransactionID, $TotalAmount, $DiscountedAmount );
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
	public function getLastTransactionID() {
		return $this->LastTransactionID;
	}

	/**
	 * @return string
	 */
	public function getDiscountedAmount() {
		return $this->DiscountedAmount;
	}

	/**
	 * @return string
	 */
	public function getPointsEarned() {
		return $this->PointsEarned;
	}

	/**
	 * @return string
	 */
	public function getTotalAmount() {
		return $this->TotalAmount;
	}


}