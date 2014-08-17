<?php
/**
 * @file
 * Defines Drupal\hme_action\Entity\Form\HMEActionSettingsForm.
 */
namespace Drupal\hme_action\Entity\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class HMEActionSettingsForm extends FormBase
{
    /**
     * Returns a unique string identifying the form.
     *
     * @return string
     *  The unique string identifying the form.
     */
    public function getFormId()
    {
        return 'hme_action_settings';
    }
    /**
     * Form submission handler.
     *
     * @param array $form
     *  An associative array containing the structure of the form.
     * @param array $form_state
     *  An associative array containing the current state of the form.
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // Empty implementation of the abstract submit class.
    }
    /**
     * Define the form used for HMEAction settings.
     * @return array
     *  Form definition array.
     *
     * @param array $firm
     *  An associative array containing the structure of the form.
     * @param array $form_state
     *  An associative array containing the current state of the form.
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['hme_action_settings']['#markup'] = 'Settings form for Hypermedia Engine Actions. Manage field settings here.';
        return $form;
    }
}
