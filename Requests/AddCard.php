<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/17/18
 * Time: 9:12 PM.
 */

/**
 * Class AddCard.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class AddCard
{
    /**
     * @var string
     */
    private $CardholderID;

    /**
     * @var int
     */
    private $CloneID;

    /**
     * @var int
     */
    private $CountryID;

    /**
     * @var string
     */
    private $Token;

    /**
     * @var
     */
    private $Username;

    /**
     * AddCard constructor.
     *
     * @param $CardholderID
     * @param $CloneID
     * @param $CountryID
     * @param $Token
     * @param $Username
     */
    public function __construct($CardholderID, $CloneID, $CountryID, $Token, $Username)
    {
        $this->CardholderID = $CardholderID;
        $this->CloneID = (int) $CloneID;
        $this->CountryID = (int) $CountryID;
        $this->Token = $Token;
        $this->Username = $Username;
    }

    /**
     * @return array
     */
    public function toJson()
    {
        return [
            'CardholderID' => $this->CardholderID,
            'CloneID'      => $this->CloneID,
            'CountryID'    => $this->CountryID,
            'Token'        => $this->Token,
            'Username'     => $this->Username,
        ];
    }
}
