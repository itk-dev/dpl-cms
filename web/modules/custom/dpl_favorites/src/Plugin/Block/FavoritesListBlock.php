<?php

namespace Drupal\dpl_favorites\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dpl_react_apps\Controller\DplReactAppsController;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides user favorites list.
 *
 * @Block(
 *   id = "dpl_favorites_list_block",
 *   admin_label = "List user favorites"
 * )
 */
class FavoritesListBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  private ConfigFactoryInterface $configFactory;

  /**
   * FavoritesListBlock constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Drupal config factory to get FBS and Publizon settings.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $configFactory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configuration = $configuration;
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory'),
    );
  }

  /**
   * {@inheritDoc}
   *
   * @return mixed[]
   *   The app render array.
   */
  public function build() {
    $context = ['context' => 'Favorites list'];

    $fbsConfig = $this->configFactory->get('dpl_fbs.settings');
    $publizonConfig = $this->configFactory->get('dpl_publizon.settings');
    $react_apps_settings = $this->configFactory->get('dpl_react_apps.settings');
    // $react_apps_settings->get('services')['material-list']['base_url']

    $build = [
      'favorites-list' => dpl_react_render('favorites-list', [
        // Config.
        "threshold-config" => $this->configFactory->get('dpl_library_agency.general_settings')->get('threshold_config'),
        // Urls.
        "fbs-base-url" => $fbsConfig->get('base_url'),
        "publizon-base-url" => $publizonConfig->get('base_url'),
        "page-size-desktop" => 50,
        "page-size-mobile" => 25,
        'dpl-cms-base-url' => DplReactAppsController::dplCmsBaseUrl(),
        'material-url' => DplReactAppsController::materialUrl(),
        // Texts.
        "show-more-text" => $this->t( "show more", [], $context),
        "result-pager-status-text" => $this->t( "Showing @itemsShown out of @hitcount results", [], $context),
        "favorites-list-materials-text" => $this->t( "@count materials", [], $context),
        "favorites-list-header-text" => $this->t( "Favorites", [], $context),
        "by-author-text" => $this->t( "By", [], $context),
        "et-al-text" => $this->t( "...", [], $context),
        "favorites-list-empty-text" => $this->t( "Your favorites list is empty", [], $context),
        "number-description-text" => $this->t( "Nr.", [], $context),
        "in-series-text" => $this->t( "in series", [], $context),
      ] + DplReactAppsController::externalApiBaseUrls()),
    ];
    return $build;
  }

}
