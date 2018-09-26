<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/3/18
 * Time: 3:36 PM
 */

/**
 * Class MobileRegisterResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class MobileRegisterResponse extends BaseResponse {


	/**
	 * @var string
	 */
	private $CardholderID;

	/**
	 * @var string
	 */
	private $PIN;


	/**
	 * MobileRegisterResponse constructor.
	 *
	 * @param $CardholderID
	 * @param $PIN
	 * @param $Result
	 * @param $ErrorDesc
	 */
	public function __construct( $CardholderID, $PIN, $Result, $ErrorDesc ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->CardholderID = $CardholderID;
		$this->PIN          = $PIN;
	}

	/**
	 * Parse XML into Response object
	 *
	 * @param $xml string
	 *
	 * @return MobileRegisterResponse
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );

		$CardholderID = isset( $xmlData->CardholderID ) ? (string) $xmlData->CardholderID : '';
		$PIN          = isset( $xmlData->PIN ) ? (string) $xmlData->PIN : '';
		$Result       = isset( $xmlData->Result ) ? (string) $xmlData->Result : '';
		$ErrorDesc    = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';


		return new self( $CardholderID, $PIN, $Result, $ErrorDesc );
	}

	/**
	 * @return string
	 */
	public function getCardholderID() {
		return $this->CardholderID;
	}

	/**
	 * @return string
	 */
	public function getPIN() {
		return $this->PIN;
	}


}