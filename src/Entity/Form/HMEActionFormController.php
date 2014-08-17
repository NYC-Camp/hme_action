<?php
/**
 * @file
 * Definition of Drupal\hme_action\Entity\Form\HMEActionFormController.
 */
namespace Drupal\hme_action\Entity\Form;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;
/**
 * Form Controller for the hme_action entity edit forms.
 */
class HMEActionFormController extends ContentEntityForm
{
    /**
     * Overrides Drupal\Core\Entity\EntityFormController::form().
     */
    public function form(array $form, FormStateInterface $form_state)
    {
        /* @var $entity \Drupal\hme_action\Entity\HMEAction */
        $form = parent::form($form, $form_state);
        $entity = $this->entity;
        $form['user_id'] = array(
            "#type" => "textfield",
            "#title" => "UID",
            "#default_value" => $entity->user_id->target_id,
            "#size" => 60,
            "#maxlength" => 128,
            "#required" => TRUE,
            "#weight" => -10,
        );
        $form['langcode'] = array(
            "#title" => t("Language"),
            "#type" => "language_select",
            "#default_value" => $entity->getUntranslated()->language()->id,
            "#languages" => Language::STATE_ALL,
        );
        $form['type'] = array(
            "#type" => "hidden",
            "#default_value" => $entity->getEntityTypeId(),
        );
        return $form;
    }
    /**
     * Overrides \Drupal\Core\Entity\EntityFormController::submit().
     */
    public function submit(array $form, FormStateInterface $form_state)
    {
        // Build the entity object from the submitted values.
        $entity = parent::submit($form, $form_state);
        $form_state->setRedirect("hme_action.list");
        return $entity;
    }
    /**
     * Overrides Drupal\Core\Entity\EntityFormController::save().
     */
    public function save(array $form, FormStateInterface $form_state)
    {
        $entity = $this->entity;
        $entity->save();
    }
}
