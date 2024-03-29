<?php

namespace SapientPro\EbayAccountSDK\Models;

/**
 * This type is used to provide details about any KYC check that is applicable to the managed payments seller.
 *
 * @deprecated Will not be returned, see: https://developer.ebay.com/api-docs/sell/account/resources/kyc/methods/getKYC
 */
class KycCheck implements EbayModelInterface
{
    /** The enumeration value returned in this field categorizes the type of details needed for the KYC check. More information about the check is shown in the detailMessage and other applicable, corresponding fields. For implementation help, refer to <a href='https://developer.ebay.com/api-docs/sell/account/types/kyc:DetailsType'>eBay API documentation</a> */
    public string $dataRequired;

    /** The timestamp in this field indicates the date by which the seller should resolve the KYC requirement.The timestamp in this field uses the UTC date and time format described in the <a href="https://www.iso.org/iso-8601-date-and-time-format.html" target="_blank">ISO 8601 Standard</a>. See below for this format and an example: <i>MM-DD-YYYY HH:MM:SS</i><br/><code>06-05-2020 10:34:18</code> */
    public string $dueDate;

    /** If applicable and available, a URL will be returned in this field, and the link will take the seller to an eBay page where they can provide the requested information. */
    public string $remedyUrl;

    /** This field gives a short summary of what is required from the seller. An example might be, '<code>Upload bank document now.</code>'. The detailMessage field will often provide more details on what is required of the seller. */
    public string $alert;

    /** This field gives a detailed message about what is required from the seller. An example might be, '<code>Please upload a bank document by 2020-08-01 to get your account back in good standing.</code>'. */
    public string $detailMessage;
}
