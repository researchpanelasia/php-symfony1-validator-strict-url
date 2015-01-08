[![Build Status](https://travis-ci.org/researchpanelasia/php-symfony1-validator-strict-url.svg?branch=master)](https://travis-ci.org/researchpanelasia/php-symfony1-validator-strict-url)

# NAME

sfValidatorStrictUrl - More strict URL validation for Symfony 1.x

# SYNOPSIS

Use this just like `sfValidatorUrl`.

# DESCRIPTION

This validator detects characters `[\x00-\x1f\x7f-\xff]` that are supposed to be URI escaped.
