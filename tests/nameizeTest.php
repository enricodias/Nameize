<?php

use enricodias\nameize;
use PHPUnit\Framework\TestCase;

final class nameizeTest extends TestCase
{
    /**
     * @dataProvider nameProvider
     */
    public function testNames($name, $allowedCharacters, $expected)
    {
        $instance = new nameize($allowedCharacters);

        $this->assertSame($expected, $instance->nameize($name));
    }

    public function testStaticMethod()
    {
        $instance = new nameize();

        $this->assertSame($instance->nameize("john o'grady-smith"), nameize::format("john o'grady-smith"));
    }

    public function nameProvider()
    {
        return [
            ["john o'grady-smith", "", "John O'Grady-Smith"],
            ["JOHN O'GRADY-SMITH", array(), "John O'Grady-Smith"],
            ["john o'grady-smith", "'", "John O'Grady-smith"],
            ["john o'grady-smith", "-", "John O'grady-Smith"],
            ["john o'grady-smith", array("'", "-"), "John O'Grady-Smith"],
            ["joão da silva",      array(""), "João da Silva"],
            ["maria das dores",    "", "Maria das Dores"],
        ];
    }
}

