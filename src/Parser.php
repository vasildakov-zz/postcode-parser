<?php
/**
 * UK Postcode Parser
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace VasilDakov\Postcode;

use VasilDakov\Postcode\PostcodeInterface;

class Parser implements ParserInterface
{
    /**
     * Regular expression pattern for Outward code
     */
    const OUTWARD = "/\d[A-Za-z]{1,2}$/i";


    /**
     * Regular expression pattern for Inward code
     */
    const INWARD = "/\d[A-Za-z]{2}$/i";


    /**
     * Regular expression pattern for Area code
     */
    const AREA = "/^[A-Za-z]{1,2}/i";


    /**
     * Regular expression pattern for Sector code
     */
    const SECTOR = "/^[A-Za-z]{1,2}\d[A-Za-z\d]?\s*\d/i";


    /**
     * Regular expression pattern for Unit code
     */
    const UNIT = "/[A-Za-z]{2}$/i";


    /**
     * Regular expression pattern for District code
     */
    const DISTRICT = "/^([A-Za-z]{1,2}\d)([A-Za-z])$/i";


    /**
     * Regular expression pattern for Subdistrict code
     */
    const SUBDISTRICT = "/^([A-Za-z]{1,2}\d)([A-Za-z])$/i";


    /**
     * Postcode $postcode
     */
    private $postcode;


    /**
     * Constructor
     *
     * @param Postcode $postcode
     */
    public function __construct(PostcodeInterface $postcode)
    {
        $this->postcode = (string)$postcode;
    }

    /**
     * @return string $outward
     */
    public function outward()
    {
        return \trim(\preg_replace(self::OUTWARD, "", $this->postcode));
    }

    /**
     * @return string $inward
     */
    public function inward()
    {
        return (\preg_match(self::INWARD, $this->postcode, $matches)) ? $matches[0] : "";
    }


    /**
     * @return string $area
     */
    public function area()
    {
        return (\preg_match(self::AREA, $this->postcode, $matches)) ? $matches[0] : "";
    }

    /**
     * @return string $district
     */
    public function district()
    {
        return (\preg_match(self::DISTRICT, $this->outward(), $matches)) ? $matches[1] : "";
    }

    /**
     * Subdistrict code
     *
     * @return string  Example: "AA9A"
     */
    public function subdistrict()
    {
        return (\preg_match(self::SUBDISTRICT, $this->outward(), $matches)) ? $matches[0] : "";
    }

    /**
     * @return string $sector
     */
    public function sector()
    {
        return (\preg_match(self::SECTOR, $this->postcode, $matches)) ? $matches[0] : "";
    }


    /**
     * @return string $unit
     */
    public function unit()
    {
        return (\preg_match(self::UNIT, $this->postcode, $matches)) ? $matches[0] : "";
    }

    /**
     * @return array
     */
    public function parse()
    {
        return [
            'outward' => $this->outward(),
            'inward' => $this->inward(),
            'area' => $this->area(),
            'district' => $this->district(),
            'subdistrict' => $this->subdistrict(),
            'sector' => $this->sector(),
            'unit' => $this->unit()
        ];
    }
}
