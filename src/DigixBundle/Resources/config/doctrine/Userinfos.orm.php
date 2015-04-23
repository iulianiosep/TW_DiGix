<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'DigixBundle\Entity\UserinfosRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'name',
   'fieldName' => 'name',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'email',
   'fieldName' => 'email',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'occupation',
   'fieldName' => 'occupation',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'age',
   'fieldName' => 'age',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'website',
   'fieldName' => 'website',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);