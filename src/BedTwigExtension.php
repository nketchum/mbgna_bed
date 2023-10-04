<?php

namespace Drupal\mbgna_bed;

/**
 * Class DefaultService.
 *
 * @package Drupal\MyTwigModule
 */
class BedTwigExtension extends \Twig\Extension\AbstractExtension {

  /**
   * {@inheritdoc}
   * Name of this extension.
   */
  public function getName() {
    return 'bed_number';
  }

  /**
   * Declare the get_bed_number twig extention.
   */
  public function getFunctions() {
    return array(
      new \Twig\TwigFunction('get_bed_number', array($this, 'get_bed_number'), array('is_safe' => array('html')))
    );
  }

  /**
   * Get the bed number from the bed entity.
   */
  public function get_bed_number($bed) {
    if ($bed->get('field_bed_number')) {
      return $bed->get('field_bed_number')->first()->getValue()['value'];
    }
  }

}
