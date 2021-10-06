<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/11/18
 * Time: 6:53 PM.
 */

/**
 * Class LoginMobileResponse.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class LoginMobileResponse extends BaseResponse
{
    /**
     * @var string
     */
    private $CardholderID;

    /**
     * @var bool
     */
    private $Token;

    /**
     * LoginMobileResponse constructor.
     *
     * @param $CardholderID
     * @param $PIN
     * @param $Result
     * @param $ErrorDesc
     */
    public function __construct($CardholderID, $Token, $Result, $ErrorDesc)
    {
        parent::__construct($Result, $ErrorDesc);
        $this->CardholderID = $CardholderID;
        $this->Token = $Token;
    }

    /**
     * Parse XML to Response Objet.
     *
     * @param $xml string
     *
     * @return LoginMobileResponse
     */
    public static function parse($xml)
    {
        $xmlData = simplexml_load_string($xml);

        $CardholderID = isset($xmlData->CardholderID) ? (string) $xmlData->CardholderID : '';
        $Token = isset($xmlData->Token) ? (string) $xmlData->Token : '';
        $Result = isset($xmlData->Result) ? (string) $xmlData->Result : '';
        $ErrorDesc = isset($xmlData->ErrorDesc) ? (string) $xmlData->ErrorDesc : '';

        return new self($CardholderID, $Token, $Result, $ErrorDesc);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->Token;
    }

    /**
     * @return string
     */
    public function getCardholderID()
    {
        return $this->CardholderID;
    }
}
