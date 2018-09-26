<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/18/18
 * Time: 5:50 PM
 */

/**
 * Class BaseResponse
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 * @package Devloops_Epoints
 */
abstract class BaseResponse {

	/**
	 * @var bool
	 */
	protected $Result;

	/**
	 * @var string
	 */
	protected $ErrorDesc;


	/**
	 * BaseResponse constructor.
	 *
	 * @param $Result
	 * @param $ErrorDesc
	 */
	public function __construct( $Result, $ErrorDesc ) {
		$this->Result    = $Result;
		$this->ErrorDesc = $ErrorDesc;
	}

	/**
	 * Parse Response XML
	 *
	 * @param $xml
	 *
	 * @return self
	 */
	abstract public static function parse( $xml );

	/**
	 * @return bool
	 */
	public function getResult() {
		return filter_var( $this->Result, FILTER_VALIDATE_BOOLEAN );
	}

	/**
	 * @return string
	 */
	public function getError() {
		return $this->ErrorDesc;
	}

	/**
	 * @return bool
	 */
	public function hasError() {
		return $this->getResult() === false;
	}
}