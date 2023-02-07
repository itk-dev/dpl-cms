<?php

namespace Drupal\dpl_loaner_status_menu\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dpl_react_apps\Controller\DplReactAppsController;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides user intermediate list.
 *
 * @block(
 *   id = "dpl_loaner_status_menu_block",
 *   admin_label = "Loaner status menu"
 * )
 */
class LoanerStatusMenuBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  private ConfigFactoryInterface $configFactory;

  /**
   * LoanerStatusMenuBlock constructor.
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
    $loaner_list_menu_settings = $this->configFactory->get('menu.settings');
    $context = ['context' => 'Loan list'];
    $contextAria = ['context' => 'Loan list (Aria)'];

    $fbsConfig = $this->configFactory->get('dpl_fbs.settings');
    $publizonConfig = $this->configFactory->get('dpl_publizon.settings');
    $build = [
      'menu' => dpl_react_render('menu', [
        // Page sige.
        "page-size-desktop" => $loaner_list_menu_settings->get('page_size_desktop'),
        "page-size-mobile" => $loaner_list_menu_settings->get('page_size_mobile'),
        // Config.
        "threshold-config" => $this->configFactory->get('dpl_library_agency.general_settings')->get('threshold_config'),
        // Urls.
        "fbs-base-url" => $fbsConfig->get('base_url'),
        "publizon-base-url" => $publizonConfig->get('base_url'),
        'fees-page-url' => $loaner_list_menu_settings->get('fees_page_url'),
        'material-overdue-url' => $loaner_list_menu_settings->get('material_overdue_url'),
        'dpl-cms-base-url' => DplReactAppsController::dplCmsBaseUrl(),
        // Texts.
        'menu-navigation-data-config' => $this->t('[{"name": "Loans","link": "","dataId": "1"},{"name": "Reservations","link": "","dataId": "2"},{"name": "My list","link": "","dataId": "3"},{"name": "Fees & Replacement costs","link": "","dataId": "4"},{"name": "My account","link": "","dataId": "5"}]', [], $context),
        'menu-view-your-profile-text' => $this->t("My Account", [], $context),
        'menu-view-your-profile-text-url' => $this->t("/YourProfile", [], $context),
        'menu-notification-loans-expired-text' => $this->t("loans expired", [], $context),
        'menu-notification-loans-expired-url' => $this->t("/LoansExpired", [], $context),
        'menu-notification-loans-expiring-soon-text' => $this->t("loans expiring soon", [], $context),
        'menu-notification-loans-expiring-soon-url' => $this->t("/LoansExpiringSoon", [], $context),
        'menu-notification-ready-for-pickup-text' => $this->t("reservations ready for pickup", [], $context),
        'menu-notification-ready-for-pickup-url' => $this->t("/ReservationsReadyForPickup", [], $context),
        'menu-log-out-text' => $this->t("Log Out", [], $context),
        'menu-log-out-url' => $this->t("/Logout", [], $context)
        ] + DplReactAppsController::externalApiBaseUrls()),
      ];
      return $build;
    }
}
