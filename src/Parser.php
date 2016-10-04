<?php
/**
 * Parser
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace VasilDakov\Postcode;

use VasilDakov\Postcode\Postcode;

class Parser implements ParserInterface
{
    /**
     * Constructor
     *
     * @param Postcode $postcode
     */
    public function __construct(Postcode $postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string $outward
     */
    public function outward() {}

    /**
     * @return string $inward
     */
    public function inward() {}

    /**
     * @return string $district
     */
    public function district() {}

    /**
     * @return string $area
     */
    public function area() {}

    /**
     * @return string $unit
     */
    public function unit() {}

    /**
     * @return array
     */
    public function parse() {}
}
