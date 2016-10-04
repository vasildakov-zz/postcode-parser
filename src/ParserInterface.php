<?php
/**
 * ParserInterface
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace VasilDakov\Postcode;

interface ParserInterface
{
    /**
     * @return string $outward
     */
    public function outward();

    /**
     * @return string $inward
     */
    public function inward();

    /**
     * @return string $district
     */
    public function district();

    /**
     * @return string $area
     */
    public function area();

    /**
     * @return string $unit
     */
    public function unit();

    /**
     * @return array
     */
    public function parse();

}
