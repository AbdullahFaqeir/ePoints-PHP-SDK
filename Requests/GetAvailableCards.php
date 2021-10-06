<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 6:25 PM.
 */

/**
 * Class GetAvailableCards.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class GetAvailableCards
{
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
    private $Token;

    /**
     * @var string
     */
    private $Username;

    /**
     * GetAvailableCards constructor.
     *
     * @param $CloneID
     * @param $CountryID
     * @param $Token
     * @param $Username
     */
    public function __construct($CloneID, $CountryID, $Token, $Username)
    {
        $this->CloneID = (int) $CloneID;
        $this->CountryID = (int) $CountryID;
        $this->Token = $Token;
        $this->Username = $Username;
    }

    /**
     * @param int $LanguageID
     */
    public function setLanguageID($LanguageID)
    {
        $this->LanguageID = $LanguageID;
    }

    /**
     * @return array
     */
    public function toJson()
    {
        return [
            'CloneID'    => $this->CloneID,
            'CountryID'  => $this->CountryID,
            'LanguageID' => $this->LanguageID,
            'Token'      => $this->Token,
            'Username'   => $this->Username,
        ];
    }
}
