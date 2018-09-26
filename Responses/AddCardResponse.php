<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/17/18
 * Time: 9:18 PM
 */

/**
 * Class AddCardResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class AddCardResponse extends BaseResponse {


	/**
	 * Parse XML to Response Object
	 *
	 * @param $xml
	 *
	 * @return AddCardResponse
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );

		$Result    = isset( $xmlData->Result ) ? (bool) $xmlData->Result : false;
		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';

		return new self( $Result, $ErrorDesc );
	}


}