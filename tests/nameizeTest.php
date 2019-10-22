<?php

use enricodias\nameize;
use PHPUnit\Framework\TestCase;

final class nameizeTest extends TestCase
{
    
    public function testCalls()
    {
        $original = "john o'grady-smith";
        $expected = "John O'Grady-Smith";

        $this->assertSame($expected, (new nameize())->name($original));

        $nameize = new nameize();
        $this->assertSame($expected, $nameize->name($original));
    }

    /**
     * @dataProvider nameProvider
     */
    public function testNames($name, $allowedCharacters, $expected)
    {
        $nameize = new nameize($allowedCharacters);

        $this->assertSame($expected, $nameize->name($name));
    }

    /**
     * 
     * @codeCoverageIgnore
     */
    public function nameProvider()
    {
        return [

            // issue #1
            //["Tri vu phu",        null, "Tri Vu Phu"],
            ["Carlo D'ippoliti",  null, "Carlo D'Ippoliti"],
            ["Kerényi ádám",      null, "Kerényi Ádám"],
            ["Matteo Dell'aqcua", null, "Matteo Dell'Aqcua"],
            //["Shuanping dai",     null, "Shuanping Dai"],

            // default tests
            ["john o'grady-smith",  null,            "John O'Grady-Smith"],
            ["JOHN O'GRADY-SMITH2", null,            "John O'Grady-Smith2"],
            ["john o'grady-smith3", "'",             "John O'Grady-smith3"],
            ["john o'grady-smith4", "-",             "John O'grady-Smith4"],
            ["john o'grady-smith5", array("'", "-"), "John O'Grady-Smith5"],
            ["joão da silva",       array(),         "João da Silva"],
            ["maria das dores",     null,            "Maria das Dores"],
            //["mendes d'eça",        null,            "Mendes d'Eça"],

        ];
    }
}
