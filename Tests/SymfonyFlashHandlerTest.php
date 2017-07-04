<?php

namespace XM\FilterBundle\Tests;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Symfony\Component\Translation\TranslatorInterface;
use XM\FlashBundle\SymfonyFlashHandler;

class SymfonyFlashHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider addDataProvider
     */
    public function testAdd($input, $output, $params)
    {
        $session = new Session(new MockArraySessionStorage());

        $translator = \Mockery::mock(TranslatorInterface::class, [
            'trans' => $output,
        ]);

        (new SymfonyFlashHandler($session, $translator))->add('warning', $input, $params);

        $result = $session->getFlashBag()->all();
        $this->assertCount(1, $result);
        $this->assertEquals(['warning' => [$output]], $result);
    }

    public function addDataProvider()
    {
        return [
            ['String', 'String', []],
            ['message.key', 'Message Translated', []],
            ['message.key', 'Message Translated', ['%key%' => 'value']],
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        \Mockery::close();
    }
}