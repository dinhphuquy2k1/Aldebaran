<?php

namespace Src\Domain\Shared\Snapshots;

use InvalidArgumentException;

class SnapshotHelper
{
    /**
     * @template T
     * @param class-string<T> $snapshotClass
     * @param object $data
     * @return T
     */
    public static function makeSnapshot(string $snapshotClass, object $data)
    {
        if (!method_exists($snapshotClass, 'fromArray')) {
            throw new InvalidArgumentException("Class {$snapshotClass} must implement a static fromArray method.");
        }

        return $snapshotClass::fromArray($data);
    }
}
