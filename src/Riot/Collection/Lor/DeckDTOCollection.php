<?php

declare(strict_types=1);

namespace Riot\Collection\Lor;

use Ramsey\Collection\AbstractCollection;
use Riot\DTO\Lor\DeckDTO;

/**
 * @codeCoverageIgnore
 */
final class DeckDTOCollection extends AbstractCollection
{
    public function getType(): string
    {
        return DeckDTO::class;
    }

    /**
     * @param array<array<string, int|string|array>> $data
     *
     * @return DeckDTOCollection<DeckDTO>
     */
    public static function createFromArray(array $data): self
    {
        $collection = new self();
        foreach ($data as $item) {
            $collection->add(DeckDTO::createFromArray($item));
        }

        return $collection;
    }
}
