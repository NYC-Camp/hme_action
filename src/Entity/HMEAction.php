<?php
/**
 * @file
 * Contains \Drupal\hme_action\Entity\HMEAction.
 */
namespace Drupal\hme_action\Entity;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\FieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\hme_action\HMEActionInterface;
use Drupal\Core\Entity\EntityTypeInterface;
/**
 * Defines the Foo Bar entity.
 *
 * @ContentEntityType(
 *   id = "hme_action",
 *   label = @Translation("Hypermedia Engine Action entity"),
 *   controllers = {
 *      "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *      "list_builder" = "Drupal\hme_action\Entity\Controller\HMEActionListBuilder",
 *      "form" = {
 *          "add" = "Drupal\hme_action\Entity\Form\HMEActionFormController",
 *          "edit" = "Drupal\hme_action\Entity\Form\HMEActionFormController",
 *          "delete" = "Drupal\hme_action\Entity\Form\HMEActionDeleteForm"
 *      },
 *      "translation" = "Drupal\content_translation\ContentTranslationController"
 *   },
 *   base_table = "hme_action",
 *   admin_permission = "admin_hme_action",
 *   fieldable = TRUE,
 *   translateable = TRUE,
 *   entity_keys = {
 *      "id" = "hmeaid",
 *      "label" = "name",
 *      "uuid" = "uuid"
 *   },
 *   links = {
 *      "edit-form" = "hme_action.edit",
 *      "admin-form" = "hme_action.edit",
 *      "delete-form" = "hme_action.delete",
 *   }
 * )
 */
class HMEAction extends ContentEntityBase implements HMEActionINterface {
    /**
     * {@inheritdoc}
     */
    public function id()
    {
        return $this->get('hmeaid')->value;
    }
    /**
     * {@inheritdoc}
     */
    public function getActionTypeField()
    {
        return $this->action_type_field->value;
    }
    /**
     * {@inheritdoc}
     */
    public static function preCreate(EntityStorageInterface $storage_controller, array &$values)
    {
        parent::preCreate($storage_controller, $values);
        $values += array(
            'user_id' => \Drupal::currentUser()->id(),
        );
    }
    /**
     * {@inheritdoc}
     */
    public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
    {
        $fields['hmeaid'] = FieldDefinition::create('integer')
            ->setLabel(t('ID'))
            ->setDescription(t('The ID of the Hypermedia Engine Action entity.'))
            ->setReadOnly(TRUE);
        $fields['uuid'] = FieldDefinition::create('uuid')
            ->setLabel(t('UUID'))
            ->setDescription(t('The UUID of the Hypermedia Engine Action entity.'))
            ->setReadOnly(TRUE);
        $fields['langcode'] = FieldDefinition::create('language')
            ->setLabel(t('Language code'))
            ->setDescription(t('The language code of the Hypermedia Engine Action entity.'));
        $fields['name'] = FieldDefinition::create('string')
            ->setLabel(t('Name'))
            ->setDescription(t('The name of the Hypermedia Engine Action entity.'))
            ->setTranslatable(TRUE)
            ->setPropertyConstraints('value', array('Length' => array('max' => 32)))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -6,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string',
                'weight' => -6,
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        $fields['type'] = FieldDefinition::create('string')
            ->setLabel(t('Type'))
            ->setDescription(t('The bundle of the Hypermedia Engine Action entity.'))
            ->setRequired(TRUE);
        $fields['user_id'] = FieldDefinition::create('entity_reference')
            ->setLabel(t('User ID'))
            ->setDescription(t('The ID of the associated user.'))
            ->setSettings(array('target_type' => 'user'))
            ->setTranslatable(TRUE);
        $fields['action_type_field'] = FieldDefinition::create('string')
            ->setLabel(t('Action Type Field'))
            ->setDescription(t('The type of this Action entity.'))
            ->setTranslatable(TRUE)
            ->setPropertyConstraints('value', array('Length' => array('max' => 32)))
            ->setSettings(array(
                'default_value' => '',
                'max_length' => 255,
                'text_processing' => 0,
            ))
            ->setDisplayOptions('view', array(
                'label' => 'above',
                'type' => 'string',
                'weight' => -5,
            ))
            ->setDisplayOptions('form', array(
                'type' => 'string',
                'weight' => -5
            ))
            ->setDisplayConfigurable('form', TRUE)
            ->setDisplayConfigurable('view', TRUE);
        return $fields;
    }
}
