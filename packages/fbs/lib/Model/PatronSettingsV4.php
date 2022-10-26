<?php
/**
 * PatronSettingsV4
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  DanskernesDigitaleBibliotek\FBS
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * FBS Adapter
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace DanskernesDigitaleBibliotek\FBS\Model;

use \ArrayAccess;
use \DanskernesDigitaleBibliotek\FBS\ObjectSerializer;

/**
 * PatronSettingsV4 Class Doc Comment
 *
 * @category Class
 * @package  DanskernesDigitaleBibliotek\FBS
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class PatronSettingsV4 implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PatronSettingsV4';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'email_address' => 'string',
        'notification_protocols' => 'string[]',
        'on_hold' => '\DanskernesDigitaleBibliotek\FBS\Model\Period',
        'phone_number' => 'string',
        'preferred_language' => 'string',
        'preferred_pickup_branch' => 'string',
        'receive_email' => 'bool',
        'receive_postal_mail' => 'bool',
        'receive_sms' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'email_address' => null,
        'notification_protocols' => null,
        'on_hold' => null,
        'phone_number' => null,
        'preferred_language' => null,
        'preferred_pickup_branch' => null,
        'receive_email' => null,
        'receive_postal_mail' => null,
        'receive_sms' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'email_address' => 'emailAddress',
        'notification_protocols' => 'notificationProtocols',
        'on_hold' => 'onHold',
        'phone_number' => 'phoneNumber',
        'preferred_language' => 'preferredLanguage',
        'preferred_pickup_branch' => 'preferredPickupBranch',
        'receive_email' => 'receiveEmail',
        'receive_postal_mail' => 'receivePostalMail',
        'receive_sms' => 'receiveSms'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email_address' => 'setEmailAddress',
        'notification_protocols' => 'setNotificationProtocols',
        'on_hold' => 'setOnHold',
        'phone_number' => 'setPhoneNumber',
        'preferred_language' => 'setPreferredLanguage',
        'preferred_pickup_branch' => 'setPreferredPickupBranch',
        'receive_email' => 'setReceiveEmail',
        'receive_postal_mail' => 'setReceivePostalMail',
        'receive_sms' => 'setReceiveSms'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email_address' => 'getEmailAddress',
        'notification_protocols' => 'getNotificationProtocols',
        'on_hold' => 'getOnHold',
        'phone_number' => 'getPhoneNumber',
        'preferred_language' => 'getPreferredLanguage',
        'preferred_pickup_branch' => 'getPreferredPickupBranch',
        'receive_email' => 'getReceiveEmail',
        'receive_postal_mail' => 'getReceivePostalMail',
        'receive_sms' => 'getReceiveSms'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['email_address'] = $data['email_address'] ?? null;
        $this->container['notification_protocols'] = $data['notification_protocols'] ?? null;
        $this->container['on_hold'] = $data['on_hold'] ?? null;
        $this->container['phone_number'] = $data['phone_number'] ?? null;
        $this->container['preferred_language'] = $data['preferred_language'] ?? null;
        $this->container['preferred_pickup_branch'] = $data['preferred_pickup_branch'] ?? null;
        $this->container['receive_email'] = $data['receive_email'] ?? null;
        $this->container['receive_postal_mail'] = $data['receive_postal_mail'] ?? null;
        $this->container['receive_sms'] = $data['receive_sms'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['preferred_pickup_branch'] === null) {
            $invalidProperties[] = "'preferred_pickup_branch' can't be null";
        }
        if ($this->container['receive_email'] === null) {
            $invalidProperties[] = "'receive_email' can't be null";
        }
        if ($this->container['receive_postal_mail'] === null) {
            $invalidProperties[] = "'receive_postal_mail' can't be null";
        }
        if ($this->container['receive_sms'] === null) {
            $invalidProperties[] = "'receive_sms' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets email_address
     *
     * @return string|null
     */
    public function getEmailAddress()
    {
        return $this->container['email_address'];
    }

    /**
     * Sets email_address
     *
     * @param string|null $email_address Required if patron should receive email notifications  Existing email addresses are overwritten with this value  If left empty existing email addresses are deleted
     *
     * @return self
     */
    public function setEmailAddress($email_address)
    {
        $this->container['email_address'] = $email_address;

        return $this;
    }

    /**
     * Gets notification_protocols
     *
     * @return string[]|null
     */
    public function getNotificationProtocols()
    {
        return $this->container['notification_protocols'];
    }

    /**
     * Sets notification_protocols
     *
     * @param string[]|null $notification_protocols Notification protocols that the patron want to receive notification on. SMS and EMAIL are not included.
     *
     * @return self
     */
    public function setNotificationProtocols($notification_protocols)
    {
        $this->container['notification_protocols'] = $notification_protocols;

        return $this;
    }

    /**
     * Gets on_hold
     *
     * @return \DanskernesDigitaleBibliotek\FBS\Model\Period|null
     */
    public function getOnHold()
    {
        return $this->container['on_hold'];
    }

    /**
     * Sets on_hold
     *
     * @param \DanskernesDigitaleBibliotek\FBS\Model\Period|null $on_hold on_hold
     *
     * @return self
     */
    public function setOnHold($on_hold)
    {
        $this->container['on_hold'] = $on_hold;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string|null $phone_number Required if patron should receive SMS notifications  Existing phonenumbers are overwritten with this value  If left empty existing phonenumbers are deleted
     *
     * @return self
     */
    public function setPhoneNumber($phone_number)
    {
        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets preferred_language
     *
     * @return string|null
     */
    public function getPreferredLanguage()
    {
        return $this->container['preferred_language'];
    }

    /**
     * Sets preferred_language
     *
     * @param string|null $preferred_language Language in which the patron prefers the communication with the library to take place  If left empty default library language will be used
     *
     * @return self
     */
    public function setPreferredLanguage($preferred_language)
    {
        $this->container['preferred_language'] = $preferred_language;

        return $this;
    }

    /**
     * Gets preferred_pickup_branch
     *
     * @return string
     */
    public function getPreferredPickupBranch()
    {
        return $this->container['preferred_pickup_branch'];
    }

    /**
     * Sets preferred_pickup_branch
     *
     * @param string $preferred_pickup_branch ISIL-number of preferred pickup branch
     *
     * @return self
     */
    public function setPreferredPickupBranch($preferred_pickup_branch)
    {
        $this->container['preferred_pickup_branch'] = $preferred_pickup_branch;

        return $this;
    }

    /**
     * Gets receive_email
     *
     * @return bool
     */
    public function getReceiveEmail()
    {
        return $this->container['receive_email'];
    }

    /**
     * Sets receive_email
     *
     * @param bool $receive_email receive_email
     *
     * @return self
     */
    public function setReceiveEmail($receive_email)
    {
        $this->container['receive_email'] = $receive_email;

        return $this;
    }

    /**
     * Gets receive_postal_mail
     *
     * @return bool
     */
    public function getReceivePostalMail()
    {
        return $this->container['receive_postal_mail'];
    }

    /**
     * Sets receive_postal_mail
     *
     * @param bool $receive_postal_mail receive_postal_mail
     *
     * @return self
     */
    public function setReceivePostalMail($receive_postal_mail)
    {
        $this->container['receive_postal_mail'] = $receive_postal_mail;

        return $this;
    }

    /**
     * Gets receive_sms
     *
     * @return bool
     */
    public function getReceiveSms()
    {
        return $this->container['receive_sms'];
    }

    /**
     * Sets receive_sms
     *
     * @param bool $receive_sms receive_sms
     *
     * @return self
     */
    public function setReceiveSms($receive_sms)
    {
        $this->container['receive_sms'] = $receive_sms;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


