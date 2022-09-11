<?php

declare(strict_types=1);

namespace Riot\DTO\Lor;

use Riot\DTO\DTOInterface;

final class DeckDTO implements DTOInterface
{
    private string $id;

    private string $name;

    private string $code;

    public function __construct(string $id, string $name, string $code)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['code']
        );
    }
}
