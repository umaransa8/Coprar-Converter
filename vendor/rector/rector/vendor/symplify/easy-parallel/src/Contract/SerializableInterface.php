<?php

declare (strict_types=1);
namespace RectorPrefix20211209\Symplify\EasyParallel\Contract;

use JsonSerializable;
interface SerializableInterface extends \JsonSerializable
{
    /**
     * @param array<string, mixed> $json
     */
    public static function decode($json) : self;
}
