<?php

namespace Mjr\Library\QueueBundle\Entities\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ObjectType;

class SafeObjectType extends ObjectType
{
    public function getSQLDeclaration(
        array $fieldDeclaration,
        AbstractPlatform $platform)
    {
        return $platform->getBlobTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName()
    {
        return 'library_job_safe_object';
    }
}