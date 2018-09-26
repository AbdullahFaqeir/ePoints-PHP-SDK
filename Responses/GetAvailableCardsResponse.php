<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 6:29 PM
 */

class GetAvailableCardsResponse extends BaseResponse {

	/**
	 * @var CardHolderType[]
	 */
	private $CardholderTypes;

	/**
	 * GetAvailableCardsResponse constructor.
	 *
	 * @param $CardholderTypes
	 * @param $Result
	 * @param $ErrorDesc
	 */
	public function __construct( $CardholderTypes, $Result, $ErrorDesc ) {
		parent::__construct( $Result, $ErrorDesc );
		$this->CardholderTypes = $CardholderTypes;
	}

	/**
	 * Parse Response XML
	 *
	 * @param $xml
	 *
	 * @return GetAvailableCardsResponse
	 */
	public static function parse( $xml ) {
		$xmlData         = simplexml_load_string( $xml );
		$CardholderTypes = [];

		$Result    = isset( $xmlData->Result ) ? (string) $xmlData->Result : '';
		$ErrorDesc = isset( $xmlData->ErrorDesc ) ? (string) $xmlData->ErrorDesc : '';

		if ( isset( $xmlData->CardholderTypes, $xmlData->CardholderTypes->CardholderType ) && ! empty( $xmlData->CardholderTypes->CardholderType ) ) {
			foreach ( $xmlData->CardholderTypes->CardholderType as $CardholderType ) {
				$AddCardFlag    = isset( $CardholderType->AddCardFlag ) ? (string) $CardholderType->AddCardFlag : '';
				$CardTypeLogo   = isset( $CardholderType->CardTypeLogo ) ? (string) $CardholderType->CardTypeLogo : '';
				$CardTypeName   = isset( $CardholderType->CardTypeName ) ? (string) $CardholderType->CardTypeName : '';
				$CardholderID   = isset( $CardholderType->CardholderID ) ? (string) $CardholderType->CardholderID : '';
				$CashEquivalent = isset( $CardholderType->CashEquivalent ) ? (string) $CardholderType->CashEquivalent : '';
				$IsGiftCard     = isset( $CardholderType->IsGiftCard ) ? (string) $CardholderType->IsGiftCard : '';
				$PointsEarned   = isset( $CardholderType->PointsEarned ) ? (string) $CardholderType->PointsEarned : '';

				$data = array(
					'AddCardFlag'    => $AddCardFlag,
					'CardTypeLogo'   => $CardTypeLogo,
					'CardTypeName'   => $CardTypeName,
					'CardholderID'   => $CardholderID,
					'CashEquivalent' => $CashEquivalent,
					'IsGiftCard'     => $IsGiftCard,
					'PointsEarned'   => $PointsEarned,
				);

				$CardholderTypes[] = new CardHolderType( $data );
			}
		}

		return new self( $CardholderTypes, $Result, $ErrorDesc );
	}

	/**
	 * @return CardHolderType[]
	 */
	public function getCardholderTypes() {
		return $this->CardholderTypes;
	}

}

/**
 * Class CardHolderType
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
class CardHolderType {

	/**
	 * @var string
	 */
	private $AddCardFlag;

	/**
	 * @var string
	 */
	private $CardTypeLogo;

	/**
	 * @var string
	 */
	private $CardTypeName;

	/**
	 * @var string
	 */
	private $CardholderID;

	/**
	 * @var string
	 */
	private $CashEquivalent;

	/**
	 * @var string
	 */
	private $IsGiftCard;

	/**
	 * @var string
	 */
	private $PointsEarned;

	/**
	 * CardHolderType constructor.
	 *
	 * @param array $Data
	 */
	public function __construct( array $Data ) {
		foreach ( $Data as $key => $value ) {
			if ( property_exists( $this, $key ) ) {
				$this->{$key} = $value;
			}
		}
	}

	/**
	 * @return string
	 */
	public function getAddCardFlag() {
		return $this->AddCardFlag;
	}

	/**
	 * @return string
	 */
	public function getCardTypeLogo() {
		return $this->CardTypeLogo;
	}

	/**
	 * @return string
	 */
	public function getCardTypeName() {
		return $this->CardTypeName;
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
	public function getCashEquivalent() {
		return $this->CashEquivalent;
	}

	/**
	 * @return string
	 */
	public function getisGiftCard() {
		return $this->IsGiftCard;
	}

	/**
	 * @return string
	 */
	public function getPointsEarned() {
		return $this->PointsEarned;
	}


}