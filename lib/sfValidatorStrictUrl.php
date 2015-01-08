<?php

class sfValidatorStrictUrl extends \sfValidatorRegex
{
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);

        $this->setOption('pattern', '/\As?https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+\z/i');
    }
}
