<?php

declare(strict_types=1);

namespace Riot\Tests\Unit\API\Version4;

use Riot\API\Version4\ThirdPartyCode;
use Riot\Tests\APITestCase;

final class ThirdPartyCodeTest extends APITestCase
{
    public function testGetBySummonerIdReturnsStringOnSuccess(): void
    {
        $thirdPartyCode = new ThirdPartyCode($this->createConnectionMock(
            'lol/platform/v4/third-party-code/by-summoner/simivar',
            '"test"',
        ));
        $result = $thirdPartyCode->getBySummonerId('simivar', 'eun1');
        self::assertSame('test', $result);
    }
}
