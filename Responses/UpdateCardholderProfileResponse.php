<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 4:41 PM
 */

/**
 * Class UpdateCardholderProfileResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class UpdateCardholderProfileResponse extends BaseResponse {


	/**
	 * Parse XML to Response Object
	 *
	 * @param $xml
	 *
	 * @return UpdateCardholderProfileResponse
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );

		$Result    = isset( $xmlData->Result ) ? (bool) $xmlData->Result : false;
		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';

		return new self( $Result, $ErrorDesc );
	}

}