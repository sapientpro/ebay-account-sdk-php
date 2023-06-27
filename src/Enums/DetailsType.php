<?php

namespace SapientPro\EbayAccountSDK\Enums;

enum DetailsType: string
{
    /** @var string This enumeration value indicates that the seller is required to provide information about their company. More information about the check is shown in the detailMessage and other applicable, corresponding fields. */
    case COMPANY_DETAILS = 'COMPANY_DETAILS';

    /** @var string This enumeration value indicates that the seller is required to provide personal information. More information about the check is shown in the detailMessage and other applicable, corresponding fields. */
    case INDIVIDUAL_DETAILS = 'INDIVIDUAL_DETAILS';

    /** @var string This enumeration value indicates that the seller is required to provide information about their bank. More information about the check is shown in the detailMessage and other applicable, corresponding fields. */
    case BANK_DETAILS = 'BANK_DETAILS';
}
