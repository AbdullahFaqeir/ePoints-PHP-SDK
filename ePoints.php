<?php
/**
 * Created by PhpStorm.
 * User: AbdullahFaqeir
 * Date: 7/2/18
 * Time: 11:39 PM.
 */
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/BaseResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/InitializeSettings.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/InitializeSettingsResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/MobileRegister.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/MobileRegisterResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/LoginMobile.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/LoginMobileResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/GetAllowCardType.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/GetAllowCardTypeResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/AddCard.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/AddCardResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/RequestNewCard.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/RequestNewCardResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/GetAvailableCards.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/GetAvailableCardsResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/RedemptionAction.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/RedemptionActionResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/RewardingAction.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/RewardingActionResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/RewardingSegmentedAction.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/RewardingSegmentedActionResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/UpdateCardholderProfile.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/UpdateCardholderProfileResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/GetItemGroups.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/GetItemGroupsResponse.php';

include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Requests/VoidAction.php';
include_once Mage::getBaseDir('code').'/community/Devloops/Epoints/Api/Responses/VoidActionResponse.php';

/**
 * ePoints API Class.
 *
 * Handle's all API calls to ePoint end-point
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 *
 * @category   Devloops
 */
class ePoints
{
    /**
     * @var string
     */
    private $EndPoint = 'http://ws.e-points.net/EpointsWebIntegrationService/EpointsWebIntegrationService';

    /**
     * @var string
     */
    private $MobileEndPoint = 'http://ws.e-points.net/EpointsMobileService/EpointsMobileService';

    /**
     * API Country ID.
     *
     * @var string
     */
    private static $CountryId;

    /**
     * API Owner ID.
     *
     * @var string
     */
    private static $OwnerId;

    /**
     * API Station ID.
     *
     * @var string
     */
    private static $StationId;

    /**
     * API Clone ID.
     *
     * @var string
     */
    private static $CloneId;

    /**
     * API Token.
     *
     * @var string
     */
    private static $Token;

    /**
     * @var ePoints
     */
    private static $instance;

    /**
     * ePoints constructor.
     *
     * @param int    $CountryId
     * @param int    $OwnerId
     * @param int    $StationId
     * @param int    $CloneId
     * @param string $Token
     */
    public function __construct($CountryId = null, $OwnerId = null, $StationId = null, $CloneId = null, $Token = null)
    {
        self::$CountryId = $CountryId;
        self::$OwnerId = $OwnerId;
        self::$StationId = $StationId;
        self::$CloneId = $CloneId;
        self::$Token = $Token;
    }

    /**
     * Set Token to be used in the API.
     *
     * @param $token
     */
    public static function setToken($token)
    {
        self::$Token = $token;
    }

    /**
     * Get an Instance from ePoints API.
     *
     * @return ePoints
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Test ePoints API and Generates a Token.
     *
     * @throws Varien_Exception
     *
     * @return InitializeSettingsResponse|null
     */
    public function testApi()
    {
        $initSettings = new InitializeSettings(self::$CountryId, self::$OwnerId, self::$StationId);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'InitializeSettings', $initSettings->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * initialize ePoints Settings.
     *
     * @throws Varien_Exception
     *
     * @return InitializeSettingsResponse|null
     */
    private function initializeSettings()
    {
        $initSettings = new InitializeSettings(self::$CountryId, self::$OwnerId, self::$StationId);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'InitializeSettings', $initSettings->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Get Segments (Item Groups).
     *
     * @throws Varien_Exception
     *
     * @return GetItemGroupsResponse|null
     */
    public function getItemGroups()
    {
        $GetItemGroups = new GetItemGroups(self::$CountryId, self::$StationId, self::$Token);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'GetRewardingItemGroups', $GetItemGroups->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Execute Void Action.
     *
     * @param $InvoiceNo
     * @param $LastTransactionID
     * @param $CardHolderId
     * @param $TransactionId
     *
     * @throws Varien_Exception
     *
     * @return VoidActionResponse|null
     */
    public function voidAction($InvoiceNo, $CardHolderId, $TransactionId)
    {
        $VoidAction = new VoidAction(self::$CountryId, self::$StationId, self::$Token, $InvoiceNo, 0, $CardHolderId, $TransactionId);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'VoidAction', $VoidAction->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Reward Customer with Points.
     *
     * @param float $amount
     * @param int   $cardHolderId
     * @param int   $orderId
     * @param array $SegmentsArr
     *
     * @throws Varien_Exception
     *
     * @return RewardingActionResponse|null
     */
    public function rewardingSegmentedAction($amount, $cardHolderId, $orderId, $SegmentsArr)
    {
        $initializeSettings = $this->initializeSettings();
        $Segments = [];
        foreach ($SegmentsArr as $SegmentId => $Amount) {
            $Segments[] = RewardingSegment::generate($Amount, $SegmentId);
        }

        $RewardingAction = new RewardingSegmentedAction($amount, $cardHolderId, self::$CountryId, $orderId, self::$StationId, $initializeSettings->getToken(), $Segments);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'RewardingSegmentedAction', $RewardingAction->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Reward Customer with Points.
     *
     * @param $amount
     * @param $cardHolderId
     * @param $orderId
     *
     * @throws Varien_Exception
     *
     * @return RewardingActionResponse|null
     */
    public function rewardingAction($amount, $cardHolderId, $orderId)
    {
        $initializeSettings = $this->initializeSettings();

        $RewardingAction = new RewardingAction($amount, $cardHolderId, self::$CountryId, $orderId, self::$StationId, $initializeSettings->getToken());

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'RewardingAction', $RewardingAction->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Redeem ePoints Credit to purchase an order.
     *
     * @param $amount
     * @param $cardHolderId
     * @param $orderId
     *
     * @throws Varien_Exception
     *
     * @return RedemptionActionResponse|null
     */
    public function redemptionAction($amount, $cardHolderId, $orderId)
    {
        $initializeSettings = $this->initializeSettings();

        $RedemptionAction = new RedemptionAction($amount, $cardHolderId, self::$CountryId, $orderId, 0, self::$StationId, $initializeSettings->getToken());

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'RedemptionAction', $RedemptionAction->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Get User Cards from ePoints.
     *
     * @param $Token
     * @param $Username
     *
     * @throws Varien_Exception
     *
     * @return GetAvailableCardsResponse|null
     */
    public function getAvailableCards($Token, $Username)
    {
        $GetAvailableCards = new GetAvailableCards(self::$CloneId, self::$CountryId, $Token, $Username);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'GetAvailableCards', $GetAvailableCards->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Request new ePoints Card.
     *
     * @param $cardTypeId
     * @param $Username
     * @param $Token
     *
     * @throws Varien_Exception
     *
     * @return RequestNewCardResponse|null
     */
    public function requestNewCard($cardTypeId, $Username, $Token)
    {
        $RequestNewCard = new RequestNewCard($cardTypeId, self::$CloneId, self::$CountryId, $Token, $Username);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'RequestNewCard', $RequestNewCard->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Update User Profile on ePoints.
     *
     * @param $address
     * @param $cellPhoneNumber
     * @param $email
     * @param $firstname
     * @param $lastname
     * @param $gender
     * @param $password
     * @param $toke
     * @param $username
     *
     * @throws Varien_Exception
     *
     * @return UpdateCardholderProfileResponse|null
     */
    public function updateCardholderProfile($address, $cellPhoneNumber, $email, $firstname, $lastname, $gender, $password, $toke, $username)
    {
        $UpdateCardholderProfile = new UpdateCardholderProfile($address, $cellPhoneNumber, self::$CloneId, self::$CountryId, $email, $firstname, $lastname, $gender, $password, $toke, $username);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'UpdateCardholderProfile', $UpdateCardholderProfile->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Get List of Allowed Cards to be requested(created) by the user.
     *
     * @param $email
     *
     * @throws Varien_Exception
     *
     * @return GetAllowCardTypeResponse|null
     */
    public function getAllowCardType($email)
    {
        $GetAllowCardType = new GetAllowCardType(self::$CloneId, self::$CountryId, $email);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'GetAllowCardType', $GetAllowCardType->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * @param $cardId
     * @param $email
     * @param $token
     *
     * @throws Varien_Exception
     *
     * @return AddCardResponse|null
     */
    public function addCard($cardId, $email, $token)
    {
        $GetAllowCardType = new AddCard($cardId, self::$CloneId, self::$CountryId, $token, $email);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'AddCard', $GetAllowCardType->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Call EnrollmentAction from ePoints API.
     *
     * @param $data
     *
     * @throws Varien_Exception
     *
     * @return MobileRegisterResponse|null
     */
    public function register($data)
    {
        $MobileRegister = new MobileRegister($data['firstname'], $data['lastname'], $data['email'], $data['mobile_number'], $data['password'], self::$Token, self::$CloneId, self::$CountryId);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'MobileRegister', $MobileRegister->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Call LoginMobile from ePoints API.
     *
     * @param $data
     *
     * @throws Varien_Exception
     *
     * @return LoginMobileResponse|null
     */
    public function login($data)
    {
        $LoginMobile = new LoginMobile(self::$Token, $data['email'], $data['CardholderID'], self::$CloneId, $data['password'], self::$CountryId);

        try {
            $Result = $this->_makeApiCall(ePointMethods::POST, 'LoginMobile', $LoginMobile->toJson());

            return $Result;
        } catch (ePointException $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());

            return null;
        }
    }

    /**
     * Make a request to ePoints API.
     *
     * @param $method
     * @param $endPoint
     * @param $body
     *
     * @throws ePointException
     *
     * @return mixed|null
     */
    public function _makeApiCall($method, $endPoint, $body)
    {
        $curl = curl_init();
        $endPointURL = $this->_getEndPointURL($endPoint);
        curl_setopt($curl, CURLOPT_URL, $endPointURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $bodyData = json_encode($body);
        if ($method === ePointMethods::POST) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $bodyData);
        } elseif ($method !== ePointMethods::POST) {
            curl_setopt($curl, CURLOPT_POST, false);
        } else {
            throw new ePointException('Invalid Method Provided', 1001);
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: '.strlen($bodyData),
        ]);

        $resp = curl_exec($curl);
        curl_close($curl);

        $result = $this->_parseResult($resp, $endPoint);

        return $result;
    }

    /**
     * Return endpoint complete url since we have another mobile interface.
     *
     * @param $endPoint string
     *
     * @return string
     */
    private function _getEndPointURL($endPoint)
    {
        switch ($endPoint) {
            case 'LoginMobile':
            case 'MobileRegister':
            case 'GetAllowCardType':
            case 'AddCard':
            case 'UpdateCardholderProfile':
            case 'RequestNewCard':
            case 'GetAvailableCards':
                return $this->MobileEndPoint.'/'.$endPoint;
            default:
                return $this->EndPoint.'/'.$endPoint;
        }
    }

    /**
     * Parse ePoints API response into it's corresponding object based on the endPoint.
     *
     * @param $response
     * @param $endPoint
     *
     * @return mixed|null
     */
    public function _parseResult($response, $endPoint)
    {
        $result = null;
        switch ($endPoint) {
            case 'InitializeSettings':
                $result = InitializeSettingsResponse::parse($response);
                break;
            case 'MobileRegister':
                $result = MobileRegisterResponse::parse($response);
                break;
            case 'LoginMobile':
                $result = LoginMobileResponse::parse($response);
                break;
            case 'GetAllowCardType':
                $result = GetAllowCardTypeResponse::parse($response);
                break;
            case 'AddCard':
                $result = AddCardResponse::parse($response);
                break;
            case 'UpdateCardholderProfile':
                $result = UpdateCardholderProfileResponse::parse($response);
                break;
            case 'RequestNewCard':
                $result = RequestNewCardResponse::parse($response);
                break;
            case 'GetAvailableCards':
                $result = GetAvailableCardsResponse::parse($response);
                break;
            case 'RedemptionAction':
                $result = RedemptionActionResponse::parse($response);
                break;
            case 'RewardingAction':
                $result = RewardingActionResponse::parse($response);
                break;
            case 'RewardingSegmentedAction':
                $result = RewardingSegmentedActionResponse::parse($response);
                break;
            case 'GetRewardingItemGroups':
                $result = GetItemGroupsResponse::parse($response);
                break;
            case 'VoidAction':
                $result = VoidActionResponse::parse($response);
                break;
        }

        return $result;
    }
}

/**
 * Class ePointException.
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
class ePointException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code, null);
    }
}

/**
 * Class ePointMethods.
 *
 * Get & Post
 *
 * @author Abdullah Al-Faqeir <abdullah@devloops.net>
 */
abstract class ePointMethods
{
    /**
     * Post Request.
     *
     * @var int
     */
    const POST = 1510;

    /**
     * Get Request.
     *
     * @var int
     */
    const sGET = 1994;
}
