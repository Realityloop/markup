<?php

/**
 * @file
 * Contains \Drupal\markup\Plugin\Field\FieldFormatter\MarkupFormatter.
 */

namespace Drupal\markup\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'markup_default' formatter.
 *
 * @FieldFormatter(
 *   id = "markup_default",
 *   label = @Translation("Markup"),
 *   field_types = {
 *     "markup"
 *   }
 * )
 */
class MarkupFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $test = 1;
  }

}
