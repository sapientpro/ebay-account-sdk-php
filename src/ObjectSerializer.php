<?php

namespace SapientPro\EbayAccountSDK;

use DateTime;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use SapientPro\EbayAccountSDK\Model\ModelInterface;
use SplFileObject;

/**
 * @package  EBay\Account
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ObjectSerializer
{
    /**
     * Serialize data
     *
     * @param  mixed  $data  the data to serialize
     * @param  string  $format  the format of the Swagger type of the data
     *
     * @return string|object serialized form of $data
     */
    public static function sanitizeForSerialization($data, $format = null)
    {
        if (is_scalar($data) || null === $data) {
            return $data;
        } elseif ($data instanceof DateTime) {
            return ($format === 'date') ? $data->format('Y-m-d') : $data->format(DateTime::ATOM);
        } elseif (is_array($data)) {
            foreach ($data as $property => $value) {
                $data[$property] = self::sanitizeForSerialization($value);
            }

            return $data;
        } elseif (is_object($data)) {
            $values = [];
            $formats = $data::swaggerFormats();
            foreach ($data::swaggerTypes() as $property => $swaggerType) {
                $getter = $data::getters()[$property];
                $value = $data->$getter();
                if (
                    $value !== null
                    && !in_array($swaggerType, ['DateTime', 'bool', 'boolean', 'byte', 'double', 'float', 'int', 'integer', 'mixed', 'number', 'object', 'string', 'void'], true)
                    && method_exists($swaggerType, 'getAllowableEnumValues')
                    && !in_array($value, $swaggerType::getAllowableEnumValues())
                ) {
                    $imploded = implode("', '", $swaggerType::getAllowableEnumValues());
                    throw new InvalidArgumentException("Invalid value for enum '$swaggerType', must be one of: '$imploded'");
                }
                if ($value !== null) {
                    $values[$data::attributeMap()[$property]] = self::sanitizeForSerialization($value, $swaggerType, $formats[$property]);
                }
            }

            return (object)$values;
        } else {
            return (string)$data;
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the path, by url-encoding.
     *
     * @param  string  $value  a string which will be part of the path
     *
     * @return string the serialized object
     */
    public static function toPathValue($value)
    {
        return rawurlencode(self::toString($value));
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the parameter. If it's a string, pass through unchanged
     * If it's a datetime object, format it in RFC3339
     * If it's a date, format it in Y-m-d
     *
     * @param  string|DateTime  $value  the value of the parameter
     * @param  string|null  $format  the format of the parameter
     *
     * @return string the header string
     */
    public static function toString($value, $format = null)
    {
        if ($value instanceof DateTime) {
            return ($format === 'date') ? $value->format('Y-m-d') : $value->format(DateTime::ATOM);
        } else {
            return $value;
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the query, by imploding comma-separated if it's an object.
     * If it's a string, pass through unchanged. It will be url-encoded
     * later.
     *
     * @param  string[]|string|DateTime  $object  an object to be serialized to a string
     * @param  string|null  $format  the format of the parameter
     *
     * @return string the serialized object
     */
    public static function toQueryValue($object, $format = null)
    {
        if (is_array($object)) {
            return implode(',', $object);
        } else {
            return self::toString($object, $format);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the header. If it's a string, pass through unchanged
     * If it's a datetime object, format it in RFC3339
     *
     * @param  string  $value  a string which will be part of the header
     *
     * @return string the header string
     */
    public static function toHeaderValue(string $value): string
    {
        return self::toString($value);
    }

    /**
     * Deserialize a JSON string into an object
     *
     * @param  mixed  $data
     * @param  string|null  $class  class name is passed as a string
     * @return object|array|null an single or an array of $class instances
     */
    public static function deserialize(mixed $data, string $class = null): ModelInterface|array|null
    {
        if (null === $data || null === $class) {
            return null;
        }

        if ($class === 'object') {
            settype($data, 'array');

            return $data;
        }

        // If a discriminator is defined and points to a valid subclass, use it.
        $discriminator = $class::DISCRIMINATOR;
        if (!empty($discriminator) && isset($data->{$discriminator}) && is_string($data->{$discriminator})) {
            $subclass = '{{invokerPackage}}\Model\\' . $data->{$discriminator};
            if (is_subclass_of($subclass, $class)) {
                $class = $subclass;
            }
        }
        $instance = new $class();
        foreach ($instance::swaggerTypes() as $property => $type) {
            $propertySetter = $instance::setters()[$property];

            if (!isset($propertySetter) || !isset($data->{$instance::attributeMap()[$property]})) {
                continue;
            }

            $propertyValue = $data->{$instance::attributeMap()[$property]};
            if (isset($propertyValue)) {
                $instance->$propertySetter(self::deserializeProperty($propertyValue, $type, null));
            }
        }

        return $instance;
    }

    private static function deserializeProperty(mixed $data, string $type): mixed
    {
        if (is_object($data) && str_contains(get_class($data), 'SapientPro\EbayAccountSDK\Model')) {
            return self::deserialize($data);
        }
        settype($data, $type);

        return $data;
    }
}
