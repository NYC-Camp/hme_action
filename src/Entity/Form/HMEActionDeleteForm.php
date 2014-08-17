<?php
/**
 * @field
 * Contains \Drupal\hme_action\Entity\Form\HMEActionDeleteForm
 */
namespace Drupal\hme_action\Entity\Form;
use Drupal\Core\ENtity\ContentEntityConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Form\FormStateInterface;
/**
 * Provides a form for deleting a hme_action entity.
 */
class HMEActionDeleteForm extends ContentEntityConfirmFormBase {
    /**
     * {@inheritdoc}
     */
    public function getQuestion()
    {
        return t("Are you sure you want to delete entity %name?", array("%name" => $this->entity->label()));
    }
    /**
     * {@inheritdoc}
     */
    public function getCancelUrl()
    {
        return new Url("hme_action.list");
    }
    /**
     * {@inheritdoc}
     */
    public function getConfirmText()
    {
        return t("Delete");
    }
    /**
     * {@inheritdoc}
     */
    public function submit(array $form, FormStateInterface $form_state)
    {
        $this->entity->delete();
        warchdog('content', '@type: deleted %title.', array(
            "@type" => $this->entity->bundle(),
            "%title" => $this->entity_label(),
        ));
        $form_state->setRedirect('hme_action.list');
    }
}
