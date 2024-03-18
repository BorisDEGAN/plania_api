<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppConfiguration;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppConfigurationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    $app_config = [
      [
        'name' => 'String Conf',
        'code' => 'str-conf',
        'value' => 'str',
        'type' => AppConfiguration::STRING_TYPE,
      ],
      [
        'name' => 'numeric conf',
        'code' => 'numeric-conf',
        'value' => "542",
        'type' => AppConfiguration::NUMERIC_TYPE,
      ],
      [
        'name' => 'Bool conf',
        'code' => 'bool-conf',
        'value' => true,
        'type' => AppConfiguration::BOOLEAN_TYPE,
      ],
      [
        'name' => 'array conf',
        'code' => 'array-conf',
        'value' => "element 1,element 2",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Password Reset Token Lifetime',
        'code' => 'auth.password.reset.token.lifetime',
        'value' => 10,
        'type' => AppConfiguration::NUMERIC_TYPE,
      ],

      [
        'name' => 'Ajout de la clé fedapay',
        'code' => 'config.fedapay.key',
        'value' => 'fedapay',
        'type' => AppConfiguration::STRING_TYPE,
      ],
      [
        'name' => 'Ajout de la clé kkiapay',
        'code' => 'config.kkiapay.key',
        'value' => 'kkiapay',
        'type' => AppConfiguration::STRING_TYPE,
      ],
      [
        'name' => 'Autoriser la modification de mot de passe par le collaborateur.',
        'code' => 'login.configuration.forgotPassword',
        'value' => true,
        'type' => AppConfiguration::BOOLEAN_TYPE,
      ],

      [
        'name' => 'Permettre la connexion avec un OTP.',
        'code' => 'login.configuration.enable_otp',
        'value' => false,
        'type' => AppConfiguration::BOOLEAN_TYPE,
      ],
      [
        'name' => 'Activer/Désactiver la gestion des config',
        'code' => 'concours.configuration.enable',
        'value' => false,
        'type' => AppConfiguration::BOOLEAN_TYPE,
      ],
      // UEH
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEH_autorisation_premier_classement',
        'code' => 'config.configuration.UEH_autorisation_premier_classement',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEH_reclassement',
        'code' => 'config.configuration.UEH_reclassement',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEH_notification',
        'code' => 'config.configuration.UEH_notification',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],

      // UEAV
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEAV_licence',
        'code' => 'config.configuration.UEAV_licence',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEAV_agrement',
        'code' => 'config.configuration.UEAV_agrement',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEAV_renew_agrement_licence',
        'code' => 'config.configuration.UEAV_renew_agrement_licence',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEAV_notification',
        'code' => 'config.configuration.UEAV_notification',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],

      //UEGT
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEGT_carte_professionnelle',
        'code' => 'config.configuration.UEGT_carte_professionnelle',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEGT_renew_carte_professionnelle',
        'code' => 'config.configuration.UEGT_renew_carte_professionnelle',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEGT_changement_affectation',
        'code' => 'config.configuration.UEGT_changement_affectation',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEGT_ajout_specialite',
        'code' => 'config.configuration.UEGT_ajout_specialite',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UEGT_exercice_au_dela_60',
        'code' => 'config.configuration.UEGT_exercice_au_dela_60',
        'value' => "5,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],

      //UER
      [
        'name' => 'Configuration du delais de traitement d\'une demande UER_autorisation',
        'code' => 'config.configuration.UER_autorisation',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UER_classement',
        'code' => 'config.configuration.UER_classement',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UER_renew_autorisation',
        'code' => 'config.configuration.UER_renew_autorisation',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UER_renew_classement',
        'code' => 'config.configuration.UER_renew_classement',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],
      [
        'name' => 'Configuration du delais de traitement d\'une demande UER_notification',
        'code' => 'config.configuration.UER_notification',
        'value' => "5,30,30",
        'type' => AppConfiguration::ARRAY_TYPE,
      ],

    ];

    AppConfiguration::insert($app_config);
  }
}
