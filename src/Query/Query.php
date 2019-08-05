<?php
namespace Bcerati\GraphqlKit\Query;

use Bcerati\GraphqlKit\Entry\EntryInterface;
use Bcerati\GraphqlKit\Entry\EntryTrait;
use GraphQL\Type\Definition\ObjectType;

/**
 * Class Query
 *
 * @package Bcerati\GraphqlKit\Query
 */
class Query extends ObjectType implements QueryInterface
{
    use EntryTrait;

    /**
     * Query constructor.
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
            'name' => 'Query',
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
