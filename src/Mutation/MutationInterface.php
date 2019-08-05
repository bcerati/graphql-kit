<?php
namespace Bcerati\GraphqlKit\Mutation;

use Bcerati\GraphqlKit\Entry\EntryInterface;

/**
 * Interface MutationInterface
 *
 * @package Bcerati\GraphqlKit\Mutation
 */
interface MutationInterface
{
    /**
     * @param EntryInterface[] $entries
     *
     * @return $this
     */
    public function addEntry(EntryInterface...$entries);
}
