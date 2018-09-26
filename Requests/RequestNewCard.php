<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 5:41 PM
 */

/**
 * Class RequestNewCard
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class RequestNewCard {

	/**
	 * @var int
	 */
	private $CardTypeID;

	/**
	 * @var int
	 */
	private $CloneID;

	/**
	 * @var int
	 */
	private $CountryID;

	/**
	 * @var int
	 */
	private $LanguageID = 1;

	/**
	 * @var string
	 */
	private $MerchantID = '-1';

	/**
	 * @var string
	 */
	private $Token;

	/**
	 * @var string
	 */
	private $Username;

	/**
	 * RequestNewCard constructor.
	 *
	 * @param $CardTypeID
	 * @param $CloneID
	 * @param $CountryID
	 * @param $Token
	 * @param $Username
	 */
	public function __construct( $CardTypeID, $CloneID, $CountryID, $Token, $Username ) {
		$this->CardTypeID = (int) $CardTypeID;
		$this->CloneID    = (int) $CloneID;
		$this->CountryID  = (int) $CountryID;
		$this->Token      = $Token;
		$this->Username   = $Username;
	}

	/**
	 * @param int $LanguageID
	 */
	public function setLanguageID( $LanguageID ) {
		$this->LanguageID = $LanguageID;
	}

	/**
	 * @param int $MerchantID
	 */
	public function setMerchantID( $MerchantID ) {
		$this->MerchantID = $MerchantID;
	}

	/**
	 * @return array
	 */
	public function toJson() {
		return array(
			'CardTypeID' => $this->CardTypeID,
			'CloneID'    => $this->CloneID,
			'CountryID'  => $this->CountryID,
			'LanguageID' => $this->LanguageID,
			'MerchantID' => $this->MerchantID,
			'Token'      => $this->Token,
			'Username'   => $this->Username
		);
	}

}