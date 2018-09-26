<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/11/18
 * Time: 6:45 PM
 */

class LoginMobile {


	/**
	 * @var string
	 */
	private $Token;

	/**
	 * @var string
	 */
	private $Username;

	/**
	 * @var string
	 */
	private $CardholderID;

	/**
	 * @var int
	 */
	private $CloneID;

	/**
	 * @var string
	 */
	private $Password;

	/**
	 * @var int
	 */
	private $CountryID;

	/**
	 * LoginMobile constructor.
	 *
	 * @param $Token
	 * @param $Username
	 * @param $CardholderID
	 * @param $CloneID
	 * @param $Password
	 * @param $CountryID
	 */
	public function __construct( $Token, $Username, $CardholderID, $CloneID, $Password, $CountryID ) {
		$this->Token        = $Token;
		$this->Username     = $Username;
		$this->CardholderID = $CardholderID;
		$this->CloneID      = $CloneID;
		$this->Password     = $Password;
		$this->CountryID    = $CountryID;
	}

	/**
	 * @return array
	 */
	public function toJson() {
		return array(
			'Token'        => $this->Token,
			'Username'     => $this->Username,
			'CardholderID' => $this->CardholderID,
			'CloneID'      => (int) $this->CloneID,
			'Password'     => $this->Password,
			'CountryID'    => (int) $this->CountryID,
		);
	}
}