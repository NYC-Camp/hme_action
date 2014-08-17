<?php
/**
 * @file
 * Contains \Drupal\hme_action\Entity\Controller\HMEActionListBuilder.
 */
namespace Drupal\hme_action\Entity\Controller;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
/**
 * Provides a list controller for hme_action entity.
 */
class HMEActionListBuilder extends EntityListBuilder
{
    /**
     * {@inheritdoc}
     */
    public function buildHeader()
    {
        $header['id'] = t('Action ID');
        $header['label'] = t('Label');
        $header['action_type_field'] = t('Action Type Field');
        return $header + parent::buildHeader();
    }
    /**
     * {@inheritdoc}
     */
    public function buildRow(EntityInterface $entity)
    {
        /* @var $entity \Drupal\hme_action\Entity\HMEAction */
        $row['id'] = $entity->id();
        $row['label'] = l($this->getLabel($entity), 'hypermedia/action/' . $entity->id());
        $row['action_type_field'] = $entity->getActionTypeField();
        return $row + parent::buildRow($entity);
    }
}
