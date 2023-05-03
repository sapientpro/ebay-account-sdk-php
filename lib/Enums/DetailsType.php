<?php

namespace EBay\Account\Enums;

/**
 * This enumerated type lists the types of details that may be needed for a KYC check.
 */
final class DetailsType
{
    /** @var string This enumeration value indicates that the seller is required to provide information about their company. More information about the check is shown in the detailMessage and other applicable, corresponding fields. */
    public const COMPANY_DETAILS = 'COMPANY_DETAILS';
    /** @var string This enumeration value indicates that the seller is required to provide personal information. More information about the check is shown in the detailMessage and other applicable, corresponding fields. */
    public const INDIVIDUAL_DETAILS = 'INDIVIDUAL_DETAILS';
    /** @var string This enumeration value indicates that the seller is required to provide information about their bank. More information about the check is shown in the detailMessage and other applicable, corresponding fields. */
    public const BANK_DETAILS = 'BANK_DETAILS';
}
