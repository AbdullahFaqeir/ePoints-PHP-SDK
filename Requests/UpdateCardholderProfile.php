<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 4:39 PM.
 */

/**
 * Class UpdateCardholderProfile.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class UpdateCardholderProfile
{
    /**
     * @var string
     */
    private $Address;

    /**
     * @var string
     */
    private $CellPhoneNumber;

    /**
     * @var string
     */
    private $CloneID;

    /**
     * @var string
     */
    private $CountryID;

    /**
     * @var string
     */
    private $EmailAddress;

    /**
     * @var string
     */
    private $FirstName;

    /**
     * @var string
     */
    private $Lastname;

    /**
     * @var string
     */
    private $Gender;

    /**
     * @var string
     */
    private $Password;

    /**
     * @var string
     */
    private $Token;

    /**
     * @var string
     */
    private $Username;

    /**
     * UpdateCardholderProfile constructor.
     *
     * @param $Address
     * @param $CellPhoneNumber
     * @param $CloneID
     * @param $CountryID
     * @param $EmailAddress
     * @param $FirstName
     * @param $Lastname
     * @param $Gender
     * @param $Password
     * @param $Token
     * @param $Username
     */
    public function __construct($Address, $CellPhoneNumber, $CloneID, $CountryID, $EmailAddress, $FirstName, $Lastname, $Gender, $Password, $Token, $Username)
    {
        $this->Address = $Address;
        $this->CellPhoneNumber = $CellPhoneNumber;
        $this->CloneID = $CloneID;
        $this->CountryID = $CountryID;
        $this->EmailAddress = $EmailAddress;
        $this->FirstName = $FirstName;
        $this->Lastname = $Lastname;
        $this->Gender = $Gender;
        $this->Password = $Password;
        $this->Token = $Token;
        $this->Username = $Username;
    }

    /**
     * @return array
     */
    public function toJson()
    {
        $data = [
            'Address'         => $this->Address,
            'CellPhoneNumber' => $this->CellPhoneNumber,
            'CloneID'         => $this->CloneID,
            'CountryID'       => $this->CountryID,
            'EmailAddress'    => $this->EmailAddress,
            'FirstName'       => $this->FirstName,
            'Lastname'        => $this->Lastname,
            'Gender'          => $this->Gender,
            'Token'           => $this->Token,
            'Username'        => $this->Username,
        ];

        if ($this->Password !== null) {
            $data['Password'] = $this->Password;
        }

        return $data;
    }
}
