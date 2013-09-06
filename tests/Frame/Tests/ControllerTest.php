<?php
namespace Frame\Tests;


class ControllerTest extends AbstractFrameTest {

    public function testJSONController() {
        $expected = '{"testing":"success"}';

        $output = $this->browser->request('GET', '/test/json');

        $this->assertSame($expected, $output->html());
    }

}
