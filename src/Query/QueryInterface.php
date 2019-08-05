<?php
namespace Bcerati\GraphqlKit\Query;

use Bcerati\GraphqlKit\Entry\EntryInterface;

/**
 * Interface QueryInterface
 *
 * @package Bcerati\GraphqlKit\Query
 */
interface QueryInterface
{
    /**
     * @param EntryInterface[] $entries
     *
     * @return $this
     */
    public function addEntry(EntryInterface...$entries);
}
