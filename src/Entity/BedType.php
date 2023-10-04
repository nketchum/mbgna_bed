<?php

namespace Drupal\mbgna_bed\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Bed type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "bed_type",
 *   label = @Translation("Bed type"),
 *   label_collection = @Translation("Bed types"),
 *   label_singular = @Translation("bed type"),
 *   label_plural = @Translation("beds types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count beds type",
 *     plural = "@count beds types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\mbgna_bed\Form\BedTypeForm",
 *       "edit" = "Drupal\mbgna_bed\Form\BedTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\mbgna_bed\BedTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer bed types",
 *   bundle_of = "bed",
 *   config_prefix = "bed_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/bed_types/add",
 *     "edit-form" = "/admin/structure/bed_types/manage/{bed_type}",
 *     "delete-form" = "/admin/structure/bed_types/manage/{bed_type}/delete",
 *     "collection" = "/admin/structure/bed_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class BedType extends ConfigEntityBundleBase {

  /**
   * The machine name of this bed type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the bed type.
   *
   * @var string
   */
  protected $label;

}
