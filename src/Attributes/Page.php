<?php

namespace BoringDragon\LaravelInertiaMeta\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Page
{
    public function __construct(
        public string $title,
        public string $description,
    ) {
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    public function getSharedKey(): string
    {
        return 'meta';
    }
}
