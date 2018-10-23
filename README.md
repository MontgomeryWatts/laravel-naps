[logo]:https://naps.rit.edu/logo.svg

# Laravel-Naps

![Naps Logo][logo]


[![Build Status](https://travis-ci.org/ritstudentgovernment/laravel-naps.svg?branch=master)](https://travis-ci.org/ritstudentgovernment/laravel-naps)
[![Maintainability](https://api.codeclimate.com/v1/badges/161a8ae6b28d5aa0ee91/maintainability)](https://codeclimate.com/github/ritstudentgovernment/laravel-naps/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/161a8ae6b28d5aa0ee91/test_coverage)](https://codeclimate.com/github/ritstudentgovernment/laravel-naps/test_coverage)

The Naps service rewritten in PHP

## Configuration

This guide will help you configure your own instance of Naps.

#### Shibboleth (SAML2)

The default application is setup to support [https://samltest.id](https://samltest.id) out of the box for local development testing.
In order to use this service you just have to upload the metadata for this application from your installation.

The metadata is found at the '/saml2/metadata' route.

Save that file as XML and name it something unique, then [upload it](https://samltest.id/upload.php) to the samltest service.

Once that is done basic Shibboleth auth should be configured.

When you're ready to move to a production environment you will need to modify this configuration. This is done by editing the .env
file attributes beginning with the 'SAML2' prefix and the 'config/saml2_settings.php file.'

\****Note***\* The SAMLController is not setup for SLO. If you would like to implement that you must do so yourself. Right now
the application only logs you out of itself, it does not contact the SAML IdP. (The [library](https://github.com/aacotroneo/laravel-saml2) being used does allow for this however)
Once you implement the SAMLController SLO code you should be all set, the 'Saml2LogoutEventListener' has already been provided.