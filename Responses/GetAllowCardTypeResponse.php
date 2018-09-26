<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/17/18
 * Time: 7:20 PM
 */

/**
 * Class GetAllowCardTypeResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class GetAllowCardTypeResponse extends BaseResponse {


	/**
	 * @var CardType[]
	 */
	private $CardTypes;


	/**
	 * GetAllowCardTypeResponse constructor.
	 *
	 * @param $Cardtypes
	 * @param $ErrorDesc
	 * @param $Result
	 */
	public function __construct( $Cardtypes, $ErrorDesc, $Result ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->CardTypes = $Cardtypes;
	}

	/**
	 * Parse XML to Response Object
	 *
	 * @param $xml string
	 *
	 * @return GetAllowCardTypeResponse
	 */
	public static function parse( $xml ) {
		$xmlData = simplexml_load_string( $xml );

		$CardTypes = array();

		if ( isset( $xmlData->Cardtypes, $xmlData->Cardtypes->Cardtype ) && ! empty( $xmlData->Cardtypes->Cardtype ) ) {
			foreach ( $xmlData->Cardtypes->Cardtype as $CardType ) {
				$CardTypeID   = isset( $CardType->CardtypeID ) ? (string) $CardType->CardtypeID : '';
				$CardTypeName = isset( $CardType->CardtypeName ) ? (string) $CardType->CardtypeName : '';
				$CardTypes[]  = new CardType( $CardTypeID, $CardTypeName );
			}
		}
		$Result    = isset( $xmlData->Result ) ? (string) $xmlData->Result : '';
		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';

		return new self( $CardTypes, $ErrorDesc, $Result );
	}

	/**
	 * @return CardType[]
	 */
	public function getCardTypes() {
		return $this->CardTypes;
	}

}

/**
 * Class Cardtype
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class CardType {

	/**
	 * @var string
	 */
	private $CardTypeID;

	/**
	 * @var string
	 */
	private $CardTypeName;

	/**
	 * Cardtypes constructor.
	 *
	 * @param $CardTypeID
	 * @param $CardTypeName
	 */
	public function __construct( $CardTypeID, $CardTypeName ) {
		$this->CardTypeID   = $CardTypeID;
		$this->CardTypeName = $CardTypeName;
	}

	/**
	 * @return string
	 */
	public function getCardTypeID() {
		return $this->CardTypeID;
	}

	/**
	 * @return string
	 */
	public function getCardTypeName() {
		return $this->CardTypeName;
	}


}