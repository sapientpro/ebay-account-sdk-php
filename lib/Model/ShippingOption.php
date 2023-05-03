<?php
/**
 * ShippingOption
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
 * ShippingOption Class Doc Comment
 *
 * @category Class
 * @description This type is used by the &lt;b&gt;shippingOptions&lt;/b&gt; array, which is used to provide detailed information on the domestic and international shipping options available for the policy. A separate &lt;b&gt;ShippingOption&lt;/b&gt; object covers domestic shipping service options and international shipping service options (if the seller ships to international locations).
 * @package  EBay\Account
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ShippingOption implements ModelInterface, ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'ShippingOption';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes
        = [
            'cost_type'             => 'string',
            'insurance_fee'         => '\EBay\Account\Model\Amount',
            'insurance_offered'     => 'bool',
            'option_type'           => 'string',
            'package_handling_cost' => '\EBay\Account\Model\Amount',
            'rate_table_id'         => 'string',
            'shipping_services'     => '\EBay\Account\Model\ShippingService[]',
        ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats
        = [
            'cost_type'             => null,
            'insurance_fee'         => null,
            'insurance_offered'     => null,
            'option_type'           => null,
            'package_handling_cost' => null,
            'rate_table_id'         => null,
            'shipping_services'     => null,
        ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap
        = [
            'cost_type'             => 'costType',
            'insurance_fee'         => 'insuranceFee',
            'insurance_offered'     => 'insuranceOffered',
            'option_type'           => 'optionType',
            'package_handling_cost' => 'packageHandlingCost',
            'rate_table_id'         => 'rateTableId',
            'shipping_services'     => 'shippingServices',
        ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters
        = [
            'cost_type'             => 'setCostType',
            'insurance_fee'         => 'setInsuranceFee',
            'insurance_offered'     => 'setInsuranceOffered',
            'option_type'           => 'setOptionType',
            'package_handling_cost' => 'setPackageHandlingCost',
            'rate_table_id'         => 'setRateTableId',
            'shipping_services'     => 'setShippingServices',
        ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters
        = [
            'cost_type'             => 'getCostType',
            'insurance_fee'         => 'getInsuranceFee',
            'insurance_offered'     => 'getInsuranceOffered',
            'option_type'           => 'getOptionType',
            'package_handling_cost' => 'getPackageHandlingCost',
            'rate_table_id'         => 'getRateTableId',
            'shipping_services'     => 'getShippingServices',
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
        $this->container['cost_type'] = isset($data['cost_type']) ? $data['cost_type'] : null;
        $this->container['insurance_fee'] = isset($data['insurance_fee']) ? $data['insurance_fee'] : null;
        $this->container['insurance_offered'] = isset($data['insurance_offered']) ? $data['insurance_offered'] : null;
        $this->container['option_type'] = isset($data['option_type']) ? $data['option_type'] : null;
        $this->container['package_handling_cost'] = isset($data['package_handling_cost']) ? $data['package_handling_cost'] : null;
        $this->container['rate_table_id'] = isset($data['rate_table_id']) ? $data['rate_table_id'] : null;
        $this->container['shipping_services'] = isset($data['shipping_services']) ? $data['shipping_services'] : null;
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
     * Gets cost_type
     *
     * @return string
     */
    public function getCostType()
    {
        return $this->container['cost_type'];
    }

    /**
     * Sets cost_type
     *
     * @param  string  $cost_type  This field defines whether the shipping cost model is <code>FLAT_RATE</code> (the same rate for all buyers, or buyers within a region if shipping rate tables are used) or <code>CALCULATED</code> (the shipping rate varies by the ship-to location and size and weight of the package). <br/><br/>This field is conditionally required if any shipping service options are specified (domestic and/or international). For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/account/types/api:ShippingCostTypeEnum'>eBay API documentation</a>
     *
     * @return $this
     */
    public function setCostType($cost_type)
    {
        $this->container['cost_type'] = $cost_type;

        return $this;
    }

    /**
     * Gets insurance_fee
     *
     * @return Amount
     */
    public function getInsuranceFee()
    {
        return $this->container['insurance_fee'];
    }

    /**
     * Sets insurance_fee
     *
     * @param  Amount  $insurance_fee  insurance_fee
     *
     * @return $this
     */
    public function setInsuranceFee($insurance_fee)
    {
        $this->container['insurance_fee'] = $insurance_fee;

        return $this;
    }

    /**
     * Gets insurance_offered
     *
     * @return bool
     */
    public function getInsuranceOffered()
    {
        return $this->container['insurance_offered'];
    }

    /**
     * Sets insurance_offered
     *
     * @param  bool  $insurance_offered  This field has been deprecated. <br/><br/>Shipping insurance is offered only via a shipping carrier's shipping services and is no longer available via eBay shipping policies.
     *
     * @return $this
     */
    public function setInsuranceOffered($insurance_offered)
    {
        $this->container['insurance_offered'] = $insurance_offered;

        return $this;
    }

    /**
     * Gets option_type
     *
     * @return string
     */
    public function getOptionType()
    {
        return $this->container['option_type'];
    }

    /**
     * Sets option_type
     *
     * @param  string  $option_type  This field is used to indicate if the corresponding shipping service options (under <b>shippingServices</b> array) are domestic or international shipping service options. This field is conditionally required if any shipping service options are specified (domestic and/or international). For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/account/types/api:ShippingOptionTypeEnum'>eBay API documentation</a>
     *
     * @return $this
     */
    public function setOptionType($option_type)
    {
        $this->container['option_type'] = $option_type;

        return $this;
    }

    /**
     * Gets package_handling_cost
     *
     * @return Amount
     */
    public function getPackageHandlingCost()
    {
        return $this->container['package_handling_cost'];
    }

    /**
     * Sets package_handling_cost
     *
     * @param  Amount  $package_handling_cost  package_handling_cost
     *
     * @return $this
     */
    public function setPackageHandlingCost($package_handling_cost)
    {
        $this->container['package_handling_cost'] = $package_handling_cost;

        return $this;
    }

    /**
     * Gets rate_table_id
     *
     * @return string
     */
    public function getRateTableId()
    {
        return $this->container['rate_table_id'];
    }

    /**
     * Sets rate_table_id
     *
     * @param  string  $rate_table_id  This field is used if the seller wants to associate a domestic or international shipping rate table to the fulfillment business policy. The <a href=\"/api-docs/sell/account/resources/rate_table/methods/getRateTables\">getRateTables</a> method can be used to retrieve shipping rate table IDs.<br/><br/>With domestic and international shipping rate tables, the seller can set different shipping costs based on shipping regions and shipping speed/level of service (one-day, expedited, standard, economy). There are also options to additional per-weight and handling charges.<br/><br/>Sellers need to be careful that shipping rate tables match the corresponding shipping service options. In other words, a domestic shipping rate table must not be specified in the same container where international shipping service options are being specified, and vice versa, and the shipping speed/level of service of the provided shipping service options should match the shipping speed/level of service options that are defined in the shipping rate tables. For example, if the corresponding shipping rate table defines costs for one-day shipping services, there should be at least one one-day shipping service option specified under the <b>shippingServices</b> array.<br/><br/>This field is returned if set.
     *
     * @return $this
     */
    public function setRateTableId($rate_table_id)
    {
        $this->container['rate_table_id'] = $rate_table_id;

        return $this;
    }

    /**
     * Gets shipping_services
     *
     * @return ShippingService[]
     */
    public function getShippingServices()
    {
        return $this->container['shipping_services'];
    }

    /**
     * Sets shipping_services
     *
     * @param  ShippingService[]  $shipping_services  This array consists of the domestic or international shipping services options that are defined for the policy. The shipping service options defined under this array should match what is set in the corresponding <b>shippingOptions.optionType</b> field (which controls whether domestic or international shipping service options are being defined). If a shipping rate table is being used, the specified shipping service options should also match the shipping rate table settings (domestic or international, shipping speed/level of service, etc.) <br/><br/>Sellers can specify up to four domestic shipping services and up to five international shipping service options by using separate <b>shippingService</b> containers for each. If the seller is using the Global Shipping Program as an international option, only a total of four international shipping service options (including GSP) can be offered. <br/><br/> See <a href=\"/api-docs/sell/static/seller-accounts/ht_shipping-setting-shipping-carrier-and-service-values.html\" target=\"_blank\">How to set up shipping carrier and shipping service values</a>. <br /><br />To use the eBay standard envelope service (eSE), see <a href=\"/api-docs/sell/static/seller-accounts/using-the-ebay-standard-envelope-service.html\" target=\"_blank\">Using eBay standard envelope (eSE) service</a>.<br /><br />This array is conditionally required if the seller is offering one or more domestic and/or international shipping service options.
     *
     * @return $this
     */
    public function setShippingServices($shipping_services)
    {
        $this->container['shipping_services'] = $shipping_services;

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
