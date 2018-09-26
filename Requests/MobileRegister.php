<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/3/18
 * Time: 3:28 PM
 */


class MobileRegister {

	/**
	 * @var string
	 */
	public $Address = '';

	/**
	 * @var string
	 */
	public $CarBrandId = '';

	/**
	 * @var string
	 */
	public $CellPhoneNumber = '';

	/**
	 * @var string
	 */
	public $City = '';

	/**
	 * @var string
	 */
	public $CloneID = '';

	/**
	 * @var string
	 */
	public $College = '';

	/**
	 * @var string
	 */
	public $CountryID = '';

	/**
	 * @var string
	 */
	public $Dateofbirth = '';

	/**
	 * @var string
	 */
	public $EmailAddress = '';

	/**
	 * @var string
	 */
	public $FirstName = '';

	/**
	 * @var string
	 */
	public $Gender = '';

	/**
	 * @var string
	 */
	public $LanguageID = '';

	/**
	 * @var string
	 */
	public $Lastname = '';

	/**
	 * @var string
	 */
	public $LicenseNo = '';

	/**
	 * @var string
	 */
	public $Password = '';

	/**
	 * @var string
	 */
	public $State = '';

	/**
	 * @var string
	 */
	public $Token = '';

	/**
	 * @var string
	 */
	public $YearOfManufacturer = '';

	/**
	 * @var string
	 */
	public $Zip = '';


	/**
	 * MobileRegister constructor.
	 *
	 * @param $FirstName
	 * @param $Lastname
	 * @param $EmailAddress
	 * @param $CellPhoneNumber
	 * @param $Password
	 * @param $Token
	 * @param $CloneID
	 * @param $CountryID
	 */
	public function __construct( $FirstName, $Lastname, $EmailAddress, $CellPhoneNumber, $Password, $Token, $CloneID, $CountryID ) {
		$this->FirstName       = $FirstName;
		$this->Lastname        = $Lastname;
		$this->EmailAddress    = $EmailAddress;
		$this->CellPhoneNumber = $CellPhoneNumber;
		$this->Password        = $Password;
		$this->Token           = $Token;
		$this->CloneID         = $CloneID;
		$this->CountryID       = $CountryID;
	}


	/**
	 * Map Data to JSON Object
	 *
	 * @return array
	 */
	public function toJson() {
		return array(
			'Address'            => $this->Address,
			'CarBrandId'         => $this->CarBrandId,
			'CellPhoneNumber'    => $this->CellPhoneNumber,
			'City'               => $this->City,
			'CloneID'            => (int) $this->CloneID,
			'College'            => (int) $this->College,
			'CountryID'          => (int) $this->CountryID,
			'Dateofbirth'        => $this->Dateofbirth,
			'EmailAddress'       => $this->EmailAddress,
			'FirstName'          => $this->FirstName,
			'Gender'             => $this->Gender,
			'LanguageID'         => (int) $this->LanguageID,
			'Lastname'           => $this->Lastname,
			'LicenseNo'          => $this->LicenseNo,
			'Password'           => $this->Password,
			'State'              => $this->State,
			'Token'              => $this->Token,
			'YearOfManufacturer' => $this->YearOfManufacturer,
			'Zip'                => $this->Zip
		);
	}
}