<?php

require_once dirname(__FILE__) . '/../vendor/symfony/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class sfValidatorStrictUrlTest extends \PHPUnit_Framework_TestCase
{

    public $v;

    protected function setUp()
    {
        $this->v = new sfValidatorStrictUrl(array('required' => true));
    }

    public function testOK_URL()
    {
        $ok_urls = array(
            'http://www.google.com',
            'https://google.com/',
            'https://google.com:80/',
            'http://www.symfony-project.com/',
            'http://127.0.0.1/',
            'http://127.0.0.1:80/',
        );

        foreach ($ok_urls as $url) {
            $this->assertEquals($this->v->clean($url), $url);
        }
    }

    public function testNG_URL()
    {
        $ng_urls = array(
            'google.com',
            'http:/google.com',
            #'http://google.com::aa', # should test?
        );

        foreach ($ng_urls as $url) {
            try {
                $this->v->clean($url);

                $this->assertTrue(FALSE);
            }
            catch (Exception $e) {
                $this->assertEquals($e->getCode(), 'invalid', $url . ' is invalid');
            }
        }
    }

    public function testMissing_URL()
    {
        try {
            $this->v->clean(null);

            $this->assertTrue(FALSE);
        }
        catch (Exception $e) {
            $this->assertEquals($e->getCode(), 'required');
        }
    }

    public function testURL_with_multibyte_char()
    {
        try {
            $this->v->clean('http://www.researchpanelasia.com/testあ');

            $this->assertTrue(FALSE);
        }
        catch (Exception $e) {
            $this->assertEquals($e->getCode(), 'invalid');
        }
    }
}
