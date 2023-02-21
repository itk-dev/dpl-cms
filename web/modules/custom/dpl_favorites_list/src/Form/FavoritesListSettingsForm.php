<?php

namespace Drupal\dpl_favorites_list\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Favorites list setting form.
 */
class FavoritesListSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return [
      'favorites_list.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'favorites_list_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('favorites_list.settings');

    $form['settings'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Basic settings'),
      '#tree' => FALSE,
    ];

    $form['settings']['page_size_mobile'] = [
      '#type' => 'number',
      '#title' => $this->t('Page size mobile'),
      '#default_value' => $config->get('page_size_mobile') ?? 25,
    ];
    $form['settings']['page_size_desktop'] = [
      '#type' => 'number',
      '#title' => $this->t('Page size desktop'),
      '#default_value' => $config->get('page_size_desktop') ?? 25,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    $pageSizeMobile = $form_state->getValue('page_size_mobile');
    if (!is_int($pageSizeMobile) && $pageSizeMobile <= 0) {
      $form_state->setErrorByName('page_size_mobile', $this->t('Page size mobile has to be a positive integer'));
    }

    $pageSizeDesktop = $form_state->getValue('page_size_desktop');
    if (!is_int($pageSizeDesktop) && $pageSizeDesktop <= 0) {
      $form_state->setErrorByName('page_size_desktop', $this->t('Page size desktop has to be a positive integer'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    parent::submitForm($form, $form_state);

    $this->config('favorites_list.settings')
      ->set('page_size_desktop', $form_state->getValue('page_size_desktop'))
      ->set('page_size_mobile', $form_state->getValue('page_size_mobile'))
      ->save();
  }

}
