<?php

declare(strict_types=1);

namespace Riot\DTO\Lor;

use Riot\DTO\DTOInterface;

final class CardDTO implements DTOInterface
{
    private string $code;

    private int $count;

    public function __construct(string $code, int $count)
    {
        $this->code = $code;
        $this->count = $count;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['code'],
            $data['count']
        );
    }
}
