<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 8/5/18
 * Time: 2:58 PM.
 */

/**
 * Class GetItemGroups.
 *
 * @author Abdullah Al-Faqeir
 */
class GetItemGroups
{
    /**
     * @var int
     */
    private $CountryID;

    /**
     * @var string
     */
    private $StationID;

    /**
     * @var string
     */
    private $Token;

    /**
     * GetItemGroups constructor.
     *
     * @param $CountryID
     * @param $StationID
     * @param $Token
     */
    public function __construct($CountryID, $StationID, $Token)
    {
        $this->CountryID = $CountryID;
        $this->StationID = $StationID;
        $this->Token = $Token;
    }

    /**
     * Return data as json object.
     *
     * @return array
     */
    public function toJson()
    {
        return [
            'CountryID' => $this->CountryID,
            'StationID' => $this->StationID,
            'Token'     => $this->Token,
        ];
    }
}
