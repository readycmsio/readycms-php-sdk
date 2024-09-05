<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class SettingsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Ecommerce store locations
    public function getStoreLocations(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-locations', $options);
    }

    public function getStoreLocationsCount(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-locations/count', $options);
    }

    // Email templates
    public function getEmailTemplates(array $options = [])
    {
        return $this->client->get('/settings/email-templates', $options);
    }

    public function getEmails(array $options = [])
    {
        return $this->client->get('/settings/emails', $options);
    }

    // Media settings
    public function getMediaSettings(array $options = [])
    {
        return $this->client->get('/settings/media', $options);
    }

    // Ecommerce shipping rates
    public function getShippingRates(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/shipping-rates', $options);
    }

    public function getShippingRatesCount(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/shipping-rates/count', $options);
    }

    public function getShippingRatesGroup(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/shipping-rates/group', $options);
    }

    // Additional ecommerce settings
    public function getStoreOrderRates(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-order-rates', $options);
    }

    public function getStoreWeightRates(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-weight-rates', $options);
    }

    public function getStorePriceRates(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-price-rates', $options);
    }

    public function getStoreShippingCountries(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-shipping-countries', $options);
    }

    public function getStoreShipping(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-shipping', $options);
    }

    public function getStoreCheckout(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-checkout', $options);
    }

    public function getStorePayment(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-payment', $options);
    }

    public function getStoreTax(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-tax', $options);
    }

    public function getStoreCurrency(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-currency', $options);
    }

    public function getStoreFormats(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-formats', $options);
    }

    public function getStoreAddress(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-address', $options);
    }

    public function getStoreEmail(array $options = [])
    {
        return $this->client->get('/settings/ecommerce/store-email', $options);
    }

    public function getEcommerceSettings(array $options = [])
    {
        return $this->client->get('/settings/ecommerce', $options);
    }

    // Access settings
    public function getAccessSettings(array $options = [])
    {
        return $this->client->get('/settings/access', $options);
    }

    // General website settings
    public function getWebsiteSettings(array $options = [])
    {
        return $this->client->get('/settings/website', $options);
    }

    public function getWebsiteBackgrounds(array $options = [])
    {
        return $this->client->get('/settings/website/backgrounds', $options);
    }

    public function getWebsiteAPIs(array $options = [])
    {
        return $this->client->get('/settings/website/apis', $options);
    }

    public function getWebsiteOtherSettings(array $options = [])
    {
        return $this->client->get('/settings/website/other', $options);
    }

    public function getWebsiteAnalytics(array $options = [])
    {
        return $this->client->get('/settings/website/analytics', $options);
    }

    public function getWebsiteMaps(array $options = [])
    {
        return $this->client->get('/settings/website/maps', $options);
    }

    public function getWebsiteContact(array $options = [])
    {
        return $this->client->get('/settings/website/contact', $options);
    }

    public function getWebsiteSocial(array $options = [])
    {
        return $this->client->get('/settings/website/social', $options);
    }

    public function getWebsiteFonts(array $options = [])
    {
        return $this->client->get('/settings/website/fonts', $options);
    }

    public function getWebsiteColors(array $options = [])
    {
        return $this->client->get('/settings/website/colors', $options);
    }

    public function getWebsiteScripts(array $options = [])
    {
        return $this->client->get('/settings/website/scripts', $options);
    }

    public function getWebsiteCSS(array $options = [])
    {
        return $this->client->get('/settings/website/css', $options);
    }

    public function getWebsiteSEO(array $options = [])
    {
        return $this->client->get('/settings/website/seo', $options);
    }

    public function getCacheSettings(array $options = [])
    {
        return $this->client->get('/settings/cache', $options);
    }

    public function getWhitelabelSettings(array $options = [])
    {
        return $this->client->get('/settings/whitelabel', $options);
    }

    public function getRewardSystemSettings(array $options = [])
    {
        return $this->client->get('/settings/reward-system', $options);
    }

    public function getAllSettings(array $options = [])
    {
        return $this->client->get('/settings/all', $options);
    }

    public function getGeneralSettings(array $options = [])
    {
        return $this->client->get('/settings', $options);
    }
}
