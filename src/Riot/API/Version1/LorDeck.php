<?php

declare(strict_types=1);

namespace Riot\API\Version1;

use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Riot\API\AbstractApi;
use Riot\Collection\Lor\DeckDTOCollection;
use Riot\DTO\ActiveShardDTO;
use Riot\DTO\Lor\NewDeckDTO;
use Riot\Enum\GeoRegionEnum;
use Riot\Exception as RiotException;

final class LorDeck extends AbstractApi
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
    public function getByAccessToken(string $region, string $accessToken): DeckDTOCollection
    {
        if ($region === "unknown") {
            $region = "americas";
        }
        
        $response = $this->riotConnection->getRSO(
            $region,
            sprintf('lor/deck/v1/decks/me'),
            $accessToken
        );

        return DeckDTOCollection::createFromArray($response->getBodyContentsDecodedAsArray());
    }

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
    public function postByAccessToken(string $accessToken, string $name, string $code)
    {
        $newDeckDto = new NewDeckDTO($name, $code);

        return $this->riotConnection->postRSO(
            'americas',
            sprintf('lor/deck/v1/decks/me'),
            $accessToken,
            $newDeckDto->toArray()
        );
    }
}
