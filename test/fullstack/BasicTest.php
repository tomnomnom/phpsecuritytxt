<?php
require_once __DIR__.'/../../SecurityTxt/Parser.php';

class BasicTest extends \PHPUnit_Framework_TestCase {
    const BASIC_FILE = __DIR__.'/../fixtures/basic.txt';

    public function testParse(){
        $raw = @file_get_contents(self::BASIC_FILE);

        $s = new \SecurityTxt\Parser();
        
        $r = $s->parse($raw);

        // The basic file has some errors, so the parse result should be false
        $this->assertFalse($r, "expected false result from parse()");

        $this->assertTrue($s->hasComments());
        $this->assertTrue($s->hasErrors());
        $this->assertTrue($s->hasContact());
        $this->assertTrue($s->hasEncryption());
        $this->assertTrue($s->hasAcknowledgement());

        $this->assertEquals(2, sizeOf($s->comments()));
        $this->assertEquals(3, sizeOf($s->errors()));
        $this->assertEquals(4, sizeOf($s->contact()));
        $this->assertEquals(1, sizeOf($s->encryption()));
        $this->assertEquals(1, sizeOf($s->acknowledgement()));
    }

}
