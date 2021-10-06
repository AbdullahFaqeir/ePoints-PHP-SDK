<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 8/5/18
 * Time: 3:02 PM.
 */
class GetItemGroupsResponse extends BaseResponse
{
    /**
     * @var ItemGroup[]
     */
    private $ItemGroups;

    /**
     * GetItemGroupsResponse constructor.
     *
     * @param $Result
     * @param $ErrorDesc
     * @param $ItemGroups
     */
    public function __construct($Result, $ErrorDesc, $ItemGroups)
    {
        parent::__construct($Result, $ErrorDesc);
        $this->ItemGroups = $ItemGroups;
    }

    /**
     * @return ItemGroup[]
     */
    public function getItemGroups()
    {
        return $this->ItemGroups;
    }

    /**
     * Parse Response XML.
     *
     * @param $xml
     *
     * @return self
     */
    public static function parse($xml)
    {
        $xmlData = simplexml_load_string($xml);

        $Result = isset($xmlData->Result) ? (bool) $xmlData->Result : false;
        $ErrorDesc = isset($xmlData->ErrorDesc) ? (string) $xmlData->ErrorDesc : '';

        $ItemGroups = [];

        if (isset($xmlData->ItemGroups, $xmlData->ItemGroups->ItemGroup) && !empty($xmlData->ItemGroups->ItemGroup)) {
            foreach ($xmlData->ItemGroups->ItemGroup as $ItemGroup) {
                $ItemGroupID = isset($ItemGroup->ItemGroupID) ? (int) $ItemGroup->ItemGroupID : '';
                $ItemGroupName = isset($ItemGroup->ItemGroupName) ? (string) $ItemGroup->ItemGroupName : '';
                $ItemGroups[] = new ItemGroup($ItemGroupID, $ItemGroupName);
            }
        }

        return new self($Result, $ErrorDesc, $ItemGroups);
    }
}

/**
 * Class ItemGroup.
 *
 * @author Abdullah Al-Faqeir
 */
class ItemGroup
{
    /**
     * @var int
     */
    private $ItemGroupID;

    /**
     * @var string
     */
    private $ItemGroupName;

    /**
     * ItemGroup constructor.
     *
     * @param $ItemGroupID
     * @param $ItemGroupName
     */
    public function __construct($ItemGroupID, $ItemGroupName)
    {
        $this->ItemGroupID = $ItemGroupID;
        $this->ItemGroupName = $ItemGroupName;
    }

    /**
     * @return mixed
     */
    public function getItemGroupID()
    {
        return $this->ItemGroupID;
    }

    /**
     * @return mixed
     */
    public function getItemGroupName()
    {
        return $this->ItemGroupName;
    }
}
