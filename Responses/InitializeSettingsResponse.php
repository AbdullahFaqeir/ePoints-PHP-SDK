<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/3/18
 * Time: 12:32 AM
 */

/**
 * Class InitializeSettingsResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class InitializeSettingsResponse extends BaseResponse {

	/**
	 * @var string
	 */
	private $Token;

	public function __construct( $Result, $Token, $ErrorDesc ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->Token = $Token;
	}

	/**
	 * Parse Response XML
	 *
	 * @param $xml
	 *
	 * @return InitializeSettingsResponse|RequestNewCardResponse
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );

		$Result    = isset( $xmlData->Result ) ? (bool) $xmlData->Result : false;
		$Token     = isset( $xmlData->Token ) ? (string) $xmlData->Token : '';
		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';

		return new self( $Result, $Token, $ErrorDesc );
	}

	/**
	 * @return string
	 */
	public function getToken() {
		return $this->Token;
	}


}