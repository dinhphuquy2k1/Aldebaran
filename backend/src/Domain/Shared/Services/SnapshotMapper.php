<?php

namespace Src\Domain\Shared\Services;

use InvalidArgumentException;

final class SnapshotMapper
{
    /**
     * Map an array of items to snapshots using the static fromArray method on the snapshot class.
     *
     * @param string $snapshotClass Fully qualified snapshot class name
     * @param array $items
     * @return array
     */
    public static function mapFromArray(string $snapshotClass, array $items): array
    {
        if (!class_exists($snapshotClass)) {
            throw new InvalidArgumentException("Snapshot class {$snapshotClass} not found");
        }

        return array_map([$snapshotClass, 'fromArray'], $items);
    }
}
