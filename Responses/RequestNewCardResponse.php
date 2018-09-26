<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 5:47 PM
 */

/**
 * Class RequestNewCardResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class RequestNewCardResponse extends BaseResponse {

	/**
	 * Parse Response XML
	 *
	 * @param $xml
	 *
	 * @return RequestNewCardResponse
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );


		$Result    = isset( $xmlData->Result ) ? (bool) $xmlData->Result : false;
		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';


		return new self( $Result, $ErrorDesc );
	}
}