<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\Collection\Lor\CardDTOCollection;
use Riot\DTO\ActiveShardDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Exception as RiotException;

use App\Models\BuiltDeck;

final class LorInventory extends AbstractApi
{
    /**
     * @throws JsonException
     * @throws RiotException\BadGatewayException
     * @throws RiotException\BadRequestException
     * @throws RiotException\DataNotFoundException
     * @throws RiotException\ForbiddenException
     * @throws RiotException\GatewayTimeoutException
     * @throws RiotException\InternalServerErrorException
     * @throws RiotException\MethodNotAllowedException
     * @throws RiotException\RateLimitExceededException
     * @throws RiotException\ServiceUnavailableException
     * @throws RiotException\UnauthorizedException
     * @throws RiotException\UnsupportedMediaTypeException
     * @throws ClientExceptionInterface
     */
    public function getByAccessToken(string $region, string $accessToken): CardDTOCollection
    {
        if ($region === "unknown") {
            $region = "americas";
        }

        $response = $this->riotConnection->getRSO(
            $region,
            sprintf('lor/inventory/v1/cards/me'),
            $accessToken
        );

        return CardDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }
}
