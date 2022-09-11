<?php

declare(strict_types=1);

namespace Riot\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static self AMERICAS()
 * @method static self APAC()
 * @method static self EUROPE()
 * @method static self SEA()
 *
 * @extends Enum<string>
 * @psalm-immutable
 */
final class GeoRegionEnum extends Enum
{
    private const AMERICAS = 'americas';
    private const APAC = 'sea';
    private const EUROPE = 'europe';
    private const SEA = 'sea';
}
