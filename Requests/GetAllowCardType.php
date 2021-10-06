<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/17/18
 * Time: 7:13 PM.
 */

/**
 * Class GetAllowCardType.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class GetAllowCardType
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
     * @var string
     */
    private $WebUserName;

    /**
     * GetAllowCardType constructor.
     *
     * @param $CloneID
     * @param $CountryID
     * @param $WebUserName
     */
    public function __construct($CloneID, $CountryID, $WebUserName)
    {
        $this->CloneID = (int) $CloneID;
        $this->CountryID = (int) $CountryID;
        $this->WebUserName = $WebUserName;
    }

    /**
     * @return array
     */
    public function toJson()
    {
        return [
            'CloneID'     => $this->CloneID,
            'CountryID'   => $this->CountryID,
            'WebUserName' => $this->WebUserName,
        ];
    }
}
