<?php

namespace Drupal\mbgna_bed\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the bed entity edit forms.
 */
class BedForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New bed has been created.'));
        $this->logger('mbgna_bed')->notice('Created new bed');
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The bed has been updated.'));
        $this->logger('mbgna_bed')->notice('Updated bed.');
        break;
    }

    $form_state->setRedirect('entity.bed.canonical', ['bed' => $entity->id()]);

    return $result;
  }

}
