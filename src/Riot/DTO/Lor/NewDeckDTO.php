<?php

declare(strict_types=1);

namespace Riot\DTO\Lor;

use Riot\DTO\DTOInterface;

final class NewDeckDTO implements DTOInterface
{
    private string $name;

    private string $code;

    public function __construct(string $name, string $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code
        ];
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['code']
        );
    }
}
