<?php

namespace Drupal\mbgna_bed\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\mbgna_bed\BedInterface;

/**
 * Defines the bed entity class.
 *
 * @ContentEntityType(
 *   id = "bed",
 *   label = @Translation("Bed"),
 *   label_collection = @Translation("Beds"),
 *   label_singular = @Translation("bed"),
 *   label_plural = @Translation("beds"),
 *   label_count = @PluralTranslation(
 *     singular = "@count beds",
 *     plural = "@count beds",
 *   ),
 *   bundle_label = @Translation("Bed type"),
 *   handlers = {
 *     "list_builder" = "Drupal\mbgna_bed\BedListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\mbgna_bed\BedAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\mbgna_bed\Form\BedForm",
 *       "edit" = "Drupal\mbgna_bed\Form\BedForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "bed",
 *   admin_permission = "administer bed types",
 *   entity_keys = {
 *     "id" = "id",
 *     "bundle" = "bundle",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/bed",
 *     "add-form" = "/bed/add/{bed_type}",
 *     "add-page" = "/bed/add",
 *     "canonical" = "/bed/{bed}",
 *     "edit-form" = "/bed/{bed}/edit",
 *     "delete-form" = "/bed/{bed}/delete",
 *   },
 *   bundle_entity_type = "bed_type",
 *   field_ui_base_route = "entity.bed_type.edit_form",
 * )
 */
class Bed extends ContentEntityBase implements BedInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['label'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Published'))
      ->setDefaultValue(TRUE)
      ->setSetting('on_label', 'Published')
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'settings' => [
          'display_label' => FALSE,
        ],
        'weight' => 0,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'boolean',
        'label' => 'above',
        'weight' => 0,
        'settings' => [
          'format' => 'enabled-disabled',
        ],
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
