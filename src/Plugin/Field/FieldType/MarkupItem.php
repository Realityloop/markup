<?php

/**
 * @file
 * Contains \Drupal\markup\Plugin\Field\FieldType\MarkupItem.
 */

namespace Drupal\markup\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_field_info().
 */
//function markup_field_info() {
//  return array(
//    'markup' => array(
//      'label' => 'Markup',
//      'description' => t('Provides field to output markup on the entities edit form'),
//      'default_widget' => 'markup',
//      'default_formatter' => 'markup_default',
//      'settings' => array(
//        'markup' => array(
//          'format' => filter_default_format(),
//        ),
//      ),
//    ),
//  );
//}

/**
 * Plugin implementation of the 'markup' field type.
 *
 * @FieldType(
 *   id = "markup",
 *   label = @Translation("Markup"),
 *   description = @Translation("Provides field to output markup on the entities edit form"),
 *   category = @Translation("General"),
 *   default_widget = "markup",
 *   default_formatter = "markup_default",
 * )
 */
class MarkupItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return [
      'markup' => [
        'value'  => '',
        'format' => '',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $settings = $this->getSettings();

    $element['markup'] = [
      '#type'          => 'text_format',
      '#title'         => t('Markup'),
      '#default_value' => isset($settings['markup']['value']) ? $settings['markup']['value'] : '',
      '#format'        => isset($settings['markup']['format']) ? $settings['markup']['format'] : filter_default_format(),
      '#required'      => TRUE,
      '#rows'          => 15,
      '#description'   => t('The markup to be displayed. Any HTML is legal here, so be careful not to break your page layout.'),
    ];

    $element['instructions'] = [
      '#markup' => htmlentities(t('This is a special field. It will output the markup below, on the node/edit form for this content type. Consider wrapping any visible output in <div class="form-item"></div> to follow form standards.')),
      '#weight' => -1,
    ];

    return $element;
  }

}
