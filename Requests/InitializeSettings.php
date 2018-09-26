<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/2/18
 * Time: 11:50 PM
 */

class InitializeSettings {

	/**
	 * @var int
	 */
	public $CountryID;

	/**
	 * @var string
	 */
	public $OwnerID;

	/**
	 * @var string
	 */
	public $StationID;

	public function __construct( $CountryID, $OwnerID, $StationID ) {
		$this->CountryID = $CountryID;
		$this->OwnerID   = $OwnerID;
		$this->StationID = $StationID;
	}

	/**
	 * Map Data to JSON Object
	 *
	 * @return array
	 */
	public function toJson() {
		return array(
			'CountryID' => (int) $this->CountryID,
			'OwnerID'   => $this->OwnerID,
			'StationID' => $this->StationID,
		);
	}
}