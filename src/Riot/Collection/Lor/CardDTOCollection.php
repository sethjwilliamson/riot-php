<?php

declare(strict_types=1);

namespace Riot\Collection\Lor;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lor\CardDTO;

/**
 * @codeCoverageIgnore
 */
final class CardDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return CardDTO::class;
    }

    /**
     * @param array<array<string, int|string|array>> $data
     *
     * @return CardDTOCollection<CardDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(CardDTO::createFromArray($item));
        }

        return $collection;
    }
}
