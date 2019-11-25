<?php
/**
 * @property string $ItemGUID
 * @property int $ItemVersion
 * @property string $CreatedByGUID
 * @property string $FileAs
 * @property bool $IsPrivate
 * @property string $ItemChanged
 * @property string $ItemCreated
 * @property string $ModifiedByGUID
 * @property string $OwnerGUID
 * @property object|null $Relations
 * @property int|null $AccountNumber
 * @property int $AdditionalDiscount
 * @property string $Address1City
 * @property string $Address1CountryEn
 * @property string $Address1POBox
 * @property string|null $Address1PostalCode
 * @property string $Address1State
 * @property string $Address1Street
 * @property string $CompanyName
 * @property object|null $Competitor
 * @property string|null $Department
 * @property string|null $Email
 * @property bool $EmailOptOut
 * @property int $EmployeesCount
 * @property string|null $Fax
 * @property string|null $FirstContactEn
 * @property string|null $ICQ
 * @property int $ID
 * @property int|null $IdentificationNumber
 * @property string $ImportanceEn
 * @property string $LastActivity
 * @property string|null $LineOfBusiness
 * @property string|null $MSN
 * @property bool $MailingListOther
 * @property string|null $Mobile
 * @property string|null $MobileNormalized
 * @property string|null $NextStep
 * @property string|null $Note
 * @property string|null $NotificationBy
 * @property bool $NotificationByEmail
 * @property string $Phone
 * @property int $PhoneNormalized
 * @property bool $Purchaser
 * @property int $Reversal
 * @property string|null $SalePriceGuid
 * @property string|null $Skype
 * @property bool $Suppliers
 * @property string|null $TypeEn
 * @property string|null $VATNumber
 * @property string|null $WebPage
 */
class Contact {
    protected $fillable = [
          "ItemGUID",
          "ItemVersion",
          "CreatedByGUID",
          "FileAs",
          "IsPrivate",
          "ItemChanged",
          "ItemCreated",
          "ModifiedByGUID",
          "OwnerGUID",
          "Relations",
          "AccountNumber",
          "AdditionalDiscount",
          "Address1City",
          "Address1CountryEn",
          "Address1POBox",
          "Address1PostalCode",
          "Address1State",
          "Address1Street",
          "CompanyName",
          "Competitor",
          "Department",
          "Email",
          "EmailOptOut",
          "EmployeesCount",
          "Fax",
          "FirstContactEn",
          "ICQ",
          "ID",
          "IdentificationNumber",
          "ImportanceEn",
          "LastActivity",
          "LineOfBusiness",
          "MSN",
          "MailingListOther",
          "Mobile",
          "MobileNormalized",
          "NextStep",
          "Note",
          "NotificationBy",
          "NotificationByEmail",
          "Phone",
          "PhoneNormalized",
          "Purchaser",
          "Reversal",
          "SalePriceGuid",
          "Skype",
          "Suppliers",
          "TypeEn",
          "VATNumber",
          "WebPage"
    ];
}