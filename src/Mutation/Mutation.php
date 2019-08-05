<?php
namespace Bcerati\GraphqlKit\Mutation;

use Bcerati\GraphqlKit\Entry\EntryInterface;
use Bcerati\GraphqlKit\Entry\EntryTrait;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class Mutation
 *
 * @package Bcerati\GraphqlKit\Mutation
 */
class Mutation extends ObjectType implements MutationInterface
{
    use EntryTrait;

    /**
     * Mutation constructor.
     *
     * @param EntryInterface[] $entries
     */
    public function __construct(EntryInterface ...$entries)
    {
        $this->addEntry(...$entries);

        parent::__construct($this->getConfig());
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return [
            'name' => 'Mutation',
            'fields' => $this->parseEntries(),
        ];
    }

    /**
     * Parse the entries injected with the compiler pass
     *
     * @return array
     */
    protected function parseEntries(): array
    {
        $entries = [];

        /** @var EntryInterface $entry */
        foreach ($this->getEntries() as $entry)
        {
            $entries[$entry->getName()] = $entry->toArray();
        }

        return $entries;
    }
}
