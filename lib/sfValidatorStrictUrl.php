<?php

class sfValidatorStrictUrl extends \sfValidatorUrl
{
    const CTRL_HIBIT_REGEX = '/[\x00-\x1f\x7f-\xff]/';

    protected function doClean($value)
    {
        $clean = parent::doClean($value);

        if (preg_match(self::CTRL_HIBIT_REGEX, $clean)) {
            throw new sfValidatorError($this, 'invalid', array('value' => $value));
        }

        return $clean;
    }
}
