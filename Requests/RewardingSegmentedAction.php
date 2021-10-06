<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/20/18
 * Time: 9:21 PM.
 */

/**
 * Class RewardingSegmentedAction.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class RewardingSegmentedAction
{
    /**
     * @var string
     */
    private $Amount;

    /**
     * @var string
     */
    private $CardholderId;

    /**
     * @var int
     */
    private $CountryID;

    /**
     * @var string
     */
    private $InvoiceNo;

    /**
     * @var int
     */
    private $LastTransactionID = 0;

    /**
     * @var int
     */
    private $NumberOfSegments = 0;

    /**
     * @var RewardingSegment[]
     */
    private $RewardingSegments;

    /**
     * @var string
     */
    private $StationID;

    /**
     * @var string
     */
    private $Token;

    /**
     * RewardingAction constructor.
     *
     * @param $Amount
     * @param $CardholderId
     * @param $CountryID
     * @param $InvoiceNo
     * @param $StationID
     * @param $Token
     * @param $Segments
     */
    public function __construct($Amount, $CardholderId, $CountryID, $InvoiceNo, $StationID, $Token, $Segments)
    {
        $this->Amount = $Amount;
        $this->CardholderId = $CardholderId;
        $this->CountryID = (int) $CountryID;
        $this->InvoiceNo = $InvoiceNo;
        $this->StationID = $StationID;
        $this->Token = $Token;
        $this->NumberOfSegments = count($Segments);
        $this->RewardingSegments = array_map([$this, 'parseSegments'], $Segments);
    }

    /**
     * @return array
     */
    public function toJson()
    {
        return [
            'Amount'            => $this->Amount,
            'CardholderId'      => $this->CardholderId,
            'CountryID'         => $this->CountryID,
            'InvoiceNo'         => $this->InvoiceNo,
            'LastTransactionID' => $this->LastTransactionID,
            'NumberOfSegments'  => $this->NumberOfSegments,
            'RewardingSegments' => $this->RewardingSegments,
            'StationID'         => $this->StationID,
            'Token'             => $this->Token,
        ];
    }

    /**
     * @param RewardingSegment $segment
     *
     * @return array
     */
    public function parseSegments($segment)
    {
        return $segment->toArray();
    }
}

/**
 * Class RewardingSegment.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class RewardingSegment
{
    /**
     * @var float
     */
    private $Amount;

    /**
     * @var int
     */
    private $SegmentID;

    /**
     * RewardingSegment constructor.
     *
     * @param $Amount
     * @param $SegmentID
     */
    public function __construct($Amount, $SegmentID)
    {
        $this->Amount = $Amount;
        $this->SegmentID = $SegmentID;
    }

    /**
     * Create Reward Segment Item.
     *
     * @param $Amount
     * @param $SegmentID
     *
     * @return RewardingSegment
     */
    public static function generate($Amount, $SegmentID)
    {
        return new self($Amount, $SegmentID);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'Amount'    => $this->Amount,
            'SegmentID' => $this->SegmentID,
        ];
    }
}
