<?php
/**
 * File: ControllerTest.php
 * User: lstrickland
 * Date: 9/6/13
 * Time: 1:14 PM
 */

namespace Frame\Tests;


class ControllerTest extends AbstractFrameTest {

    public function testJSONController() {
        $expected = '{"testing":"success"}';

        $output = $this->browser->request('GET', '/test/json');

        $this->assertSame($expected, $output->html());
    }

}
