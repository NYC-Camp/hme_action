<?php
/**
 * @file
 * Contains \Drupal\hme_action\HMEActionInterface.
 */
namespace Drupal\hme_action;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
/**
 * Provides an interface defining a Hypermedia Engine Action entity.
 */
interface HMEActionInterface extends EntityInterface
{
    /**
     * Returns the identifier.
     *
     * @return int
     *      The entity identifier.
     */
    public function id();
    /**
     * Returns the entity UUID (Universally Unique Identifier).
     *
     * The UUID is guaranteed to be unique and can be used to identify an entity
     * across multiple systems.
     *
     * @return string
     *      The UUID of the entity.
     */
    public function uuid();
    /**
     * Return the Value of the Action Type Field.
     *
     * @return string
     *      The content of the field.
     */
    public function getActionTypeField();
    /**
     * Defines the base fields of the entity type.
     *
     * @param string $entity_type
     *   Name of the entity type
     *
     * @return \Drupal\Core\Field|fieldDefinitionInterface[]
     *  An array of entity field definitions, keyed by field name.
     */
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type);
}
