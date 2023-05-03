<?php
/**
 * FulfillmentPolicy
 *
 * PHP version 5
 *
 * @category Class
 * @package  EBay\Account
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Account API
 *
 * The <b>Account API</b> gives sellers the ability to configure their eBay seller accounts, including the seller's policies (eBay business policies and seller-defined custom policies), opt in and out of eBay seller programs, configure sales tax tables, and get account information.  <br/><br/>For details on the availability of the methods in this API, see <a href=\"/api-docs/sell/account/overview.html#requirements\">Account API requirements and restrictions</a>.
 *
 * OpenAPI spec version: v1.7.0
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.33
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace EBay\Account\Model;

use ArrayAccess;
use EBay\Account\ObjectSerializer;

/**
 * FulfillmentPolicy Class Doc Comment
 *
 * @category Class
 * @description This type is used by the &lt;b&gt;fulfillmentPolicy&lt;/b&gt; response container, a container which defines a seller&#x27;s fulfillment policy for a specific marketplace.
 * @package  EBay\Account
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class FulfillmentPolicy implements ModelInterface, ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'FulfillmentPolicy';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes
        = [
            'category_types'        => '\EBay\Account\Model\CategoryType[]',
            'description'           => 'string',
            'freight_shipping'      => 'bool',
            'fulfillment_policy_id' => 'string',
            'global_shipping'       => 'bool',
            'handling_time'         => '\EBay\Account\Model\TimeDuration',
            'local_pickup'          => 'bool',
            'marketplace_id'        => 'string',
            'name'                  => 'string',
            'pickup_drop_off'       => 'bool',
            'shipping_options'      => '\EBay\Account\Model\ShippingOption[]',
            'ship_to_locations'     => '\EBay\Account\Model\RegionSet',
        ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats
        = [
            'category_types'        => null,
            'description'           => null,
            'freight_shipping'      => null,
            'fulfillment_policy_id' => null,
            'global_shipping'       => null,
            'handling_time'         => null,
            'local_pickup'          => null,
            'marketplace_id'        => null,
            'name'                  => null,
            'pickup_drop_off'       => null,
            'shipping_options'      => null,
            'ship_to_locations'     => null,
        ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap
        = [
            'category_types'        => 'categoryTypes',
            'description'           => 'description',
            'freight_shipping'      => 'freightShipping',
            'fulfillment_policy_id' => 'fulfillmentPolicyId',
            'global_shipping'       => 'globalShipping',
            'handling_time'         => 'handlingTime',
            'local_pickup'          => 'localPickup',
            'marketplace_id'        => 'marketplaceId',
            'name'                  => 'name',
            'pickup_drop_off'       => 'pickupDropOff',
            'shipping_options'      => 'shippingOptions',
            'ship_to_locations'     => 'shipToLocations',
        ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters
        = [
            'category_types'        => 'setCategoryTypes',
            'description'           => 'setDescription',
            'freight_shipping'      => 'setFreightShipping',
            'fulfillment_policy_id' => 'setFulfillmentPolicyId',
            'global_shipping'       => 'setGlobalShipping',
            'handling_time'         => 'setHandlingTime',
            'local_pickup'          => 'setLocalPickup',
            'marketplace_id'        => 'setMarketplaceId',
            'name'                  => 'setName',
            'pickup_drop_off'       => 'setPickupDropOff',
            'shipping_options'      => 'setShippingOptions',
            'ship_to_locations'     => 'setShipToLocations',
        ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters
        = [
            'category_types'        => 'getCategoryTypes',
            'description'           => 'getDescription',
            'freight_shipping'      => 'getFreightShipping',
            'fulfillment_policy_id' => 'getFulfillmentPolicyId',
            'global_shipping'       => 'getGlobalShipping',
            'handling_time'         => 'getHandlingTime',
            'local_pickup'          => 'getLocalPickup',
            'marketplace_id'        => 'getMarketplaceId',
            'name'                  => 'getName',
            'pickup_drop_off'       => 'getPickupDropOff',
            'shipping_options'      => 'getShippingOptions',
            'ship_to_locations'     => 'getShipToLocations',
        ];
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param  mixed[]  $data  Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['category_types'] = isset($data['category_types']) ? $data['category_types'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['freight_shipping'] = isset($data['freight_shipping']) ? $data['freight_shipping'] : null;
        $this->container['fulfillment_policy_id'] = isset($data['fulfillment_policy_id']) ? $data['fulfillment_policy_id'] : null;
        $this->container['global_shipping'] = isset($data['global_shipping']) ? $data['global_shipping'] : null;
        $this->container['handling_time'] = isset($data['handling_time']) ? $data['handling_time'] : null;
        $this->container['local_pickup'] = isset($data['local_pickup']) ? $data['local_pickup'] : null;
        $this->container['marketplace_id'] = isset($data['marketplace_id']) ? $data['marketplace_id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['pickup_drop_off'] = isset($data['pickup_drop_off']) ? $data['pickup_drop_off'] : null;
        $this->container['shipping_options'] = isset($data['shipping_options']) ? $data['shipping_options'] : null;
        $this->container['ship_to_locations'] = isset($data['ship_to_locations']) ? $data['ship_to_locations'] : null;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

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
        return self::$swaggerModelName;
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
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Gets category_types
     *
     * @return CategoryType[]
     */
    public function getCategoryTypes()
    {
        return $this->container['category_types'];
    }

    /**
     * Sets category_types
     *
     * @param  CategoryType[]  $category_types  This container indicates whether the fulfillment policy applies to motor vehicle listings, or if it applies to non-motor vehicle listings.
     *
     * @return $this
     */
    public function setCategoryTypes($category_types)
    {
        $this->container['category_types'] = $category_types;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param  string  $description  A seller-defined description of the fulfillment policy. This description is only for the seller's use, and is not exposed on any eBay pages. This field is returned if set for the policy. <br/><br/><b>Max length</b>: 250
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets freight_shipping
     *
     * @return bool
     */
    public function getFreightShipping()
    {
        return $this->container['freight_shipping'];
    }

    /**
     * Sets freight_shipping
     *
     * @param  bool  $freight_shipping  If returned as <code>true</code>, the seller offers freight shipping. Freight shipping can be used for large items over 150 lbs.
     *
     * @return $this
     */
    public function setFreightShipping($freight_shipping)
    {
        $this->container['freight_shipping'] = $freight_shipping;

        return $this;
    }

    /**
     * Gets fulfillment_policy_id
     *
     * @return string
     */
    public function getFulfillmentPolicyId()
    {
        return $this->container['fulfillment_policy_id'];
    }

    /**
     * Sets fulfillment_policy_id
     *
     * @param  string  $fulfillment_policy_id  A unique eBay-assigned ID for the fulfillment policy. This ID is generated when the policy is created.
     *
     * @return $this
     */
    public function setFulfillmentPolicyId($fulfillment_policy_id)
    {
        $this->container['fulfillment_policy_id'] = $fulfillment_policy_id;

        return $this;
    }

    /**
     * Gets global_shipping
     *
     * @return bool
     */
    public function getGlobalShipping()
    {
        return $this->container['global_shipping'];
    }

    /**
     * Sets global_shipping
     *
     * @param  bool  $global_shipping  If returned as <code>true</code>, eBay's Global Shipping Program will be used by the seller to ship items to international locations.
     *
     * @return $this
     */
    public function setGlobalShipping($global_shipping)
    {
        $this->container['global_shipping'] = $global_shipping;

        return $this;
    }

    /**
     * Gets handling_time
     *
     * @return TimeDuration
     */
    public function getHandlingTime()
    {
        return $this->container['handling_time'];
    }

    /**
     * Sets handling_time
     *
     * @param  TimeDuration  $handling_time  handling_time
     *
     * @return $this
     */
    public function setHandlingTime($handling_time)
    {
        $this->container['handling_time'] = $handling_time;

        return $this;
    }

    /**
     * Gets local_pickup
     *
     * @return bool
     */
    public function getLocalPickup()
    {
        return $this->container['local_pickup'];
    }

    /**
     * Sets local_pickup
     *
     * @param  bool  $local_pickup  If returned as <code>true</code>, local pickup is available for this policy.
     *
     * @return $this
     */
    public function setLocalPickup($local_pickup)
    {
        $this->container['local_pickup'] = $local_pickup;

        return $this;
    }

    /**
     * Gets marketplace_id
     *
     * @return string
     */
    public function getMarketplaceId()
    {
        return $this->container['marketplace_id'];
    }

    /**
     * Sets marketplace_id
     *
     * @param  string  $marketplace_id  The ID of the eBay marketplace to which this fulfillment policy applies. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum'>eBay API documentation</a>
     *
     * @return $this
     */
    public function setMarketplaceId($marketplace_id)
    {
        $this->container['marketplace_id'] = $marketplace_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param  string  $name  A seller-defined name for this fulfillment policy. Names must be unique for policies assigned to the same marketplace. <br/><br/><b>Max length</b>: 64
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets pickup_drop_off
     *
     * @return bool
     */
    public function getPickupDropOff()
    {
        return $this->container['pickup_drop_off'];
    }

    /**
     * Sets pickup_drop_off
     *
     * @param  bool  $pickup_drop_off  If returned as <code>true</code>, the seller offers the \"Click and Collect\" option. <br/><br/>Currently, \"Click and Collect\" is available only to large retail merchants the eBay AU and UK marketplaces.
     *
     * @return $this
     */
    public function setPickupDropOff($pickup_drop_off)
    {
        $this->container['pickup_drop_off'] = $pickup_drop_off;

        return $this;
    }

    /**
     * Gets shipping_options
     *
     * @return ShippingOption[]
     */
    public function getShippingOptions()
    {
        return $this->container['shipping_options'];
    }

    /**
     * Sets shipping_options
     *
     * @param  ShippingOption[]  $shipping_options  This array is used to provide detailed information on the domestic and international shipping options available for the policy. A separate <b>ShippingOption</b> object covers domestic shipping service options and international shipping service options (if the seller ships to international locations). The <b>optionType</b> field indicates whether the <b>ShippingOption</b> object applies to domestic or international shipping, and the <b>costType</b> field indicates whether flat-rate shipping or calculated shipping will be used. <p>A separate <b>ShippingServices</b> object is used to specify cost and other details for every available domestic and international shipping service option. </p>
     *
     * @return $this
     */
    public function setShippingOptions($shipping_options)
    {
        $this->container['shipping_options'] = $shipping_options;

        return $this;
    }

    /**
     * Gets ship_to_locations
     *
     * @return RegionSet
     */
    public function getShipToLocations()
    {
        return $this->container['ship_to_locations'];
    }

    /**
     * Sets ship_to_locations
     *
     * @param  RegionSet  $ship_to_locations  ship_to_locations
     *
     * @return $this
     */
    public function setShipToLocations($ship_to_locations)
    {
        $this->container['ship_to_locations'] = $ship_to_locations;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param  int  $offset  Offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param  int  $offset  Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param  int  $offset  Offset
     * @param  mixed  $value  Value to be set
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
     * @param  int  $offset  Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
