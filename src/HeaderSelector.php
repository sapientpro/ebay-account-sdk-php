<?php

namespace SapientPro\EbayAccountSDK;

/**
 * @package  SapientPro\EbayAccountSDK
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class HeaderSelector
{
    public function selectHeadersForMultipart(array $accept): array
    {
        $headers = $this->selectHeaders($accept, []);

        unset($headers['Content-Type']);

        return $headers;
    }

    public function selectHeaders(array $accept, array $contentTypes): array
    {
        $headers = [];

        $accept = $this->selectAcceptHeader($accept);

        if (null !== $accept) {
            $headers['Accept'] = $accept;
        }

        $headers['Content-Type'] = $this->selectContentTypeHeader($contentTypes);

        return $headers;
    }

    private function selectAcceptHeader(array $accept): ?string
    {
        if (count($accept) === 0 || (count($accept) === 1 && $accept[0] === '')) {
            return null;
        } elseif (preg_grep("/application\/json/i", $accept)) {
            return 'application/json';
        } else {
            return implode(',', $accept);
        }
    }

    /**
     * Return the content type based on an array of content-type provided
     *
     * @param  string[]  $contentType  Array fo content-type
     *
     * @return string Content-Type (e.g. application/json)
     */
    private function selectContentTypeHeader(array $contentType): string
    {
        if (count($contentType) === 0 || (count($contentType) === 1 && $contentType[0] === '')) {
            return 'application/json';
        } elseif (preg_grep("/application\/json/i", $contentType)) {
            return 'application/json';
        } else {
            return implode(',', $contentType);
        }
    }
}
