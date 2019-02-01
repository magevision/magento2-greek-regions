<?php
/**
 * MageVision Greek Regions Extension
 *
 * @category     MageVision
 * @package      MageVision_GreekRegions
 * @author       MageVision Team
 * @copyright    Copyright (c) 2018 MageVision (http://www.magevision.com)
 * @license      http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace MageVision\GreekRegions\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Fill table directory/country_region
         * Fill table directory/country_region_name for el_GR locale
         * Fill table directory/country_region_name for en_US locale
         */
        $data = [
            ['GR', 'AI', 'Αιτωλοακαρνανίας', 'Aetolia-Acarnania'],
            ['GR', 'ARG', 'Αργολίδας', 'Argolis'],
            ['GR', 'ARK', 'Αρκαδίας', 'Arcadia'],
            ['GR', 'AR', 'Άρτας', 'Arta'],
            ['GR', 'AT', 'Αττικής', 'Attica'],
            ['GR', 'AC', 'Αχαΐας', 'Achaea'],
            ['GR', 'BO', 'Βοιωτίας', 'Boeotia'],
            ['GR', 'GRV', 'Γρεβενών', 'Grevena'],
            ['GR', 'DR', 'Δράμας', 'Drama'],
            ['GR', 'DO', 'Δωδεκανήσου', 'Dodecanese'],
            ['GR', 'EVR', 'Έβρου', 'Evros'],
            ['GR', 'EU', 'Εύβοιας', 'Euboea'],
            ['GR', 'EV', 'Ευρυτανίας', 'Evrytania'],
            ['GR', 'ZA', 'Ζακύνθου', 'Zakynthos'],
            ['GR', 'EL', 'Ηλείας', 'Elis'],
            ['GR', 'IM', 'Ημαθίας', 'Imathia'],
            ['GR', 'HE', 'Ηρακλείου', 'Heraklion'],
            ['GR', 'THE', 'Θεσπρωτίας', 'Thesprotia'],
            ['GR', 'TH', 'Θεσσαλονίκης', 'Thessaloniki'],
            ['GR', 'IO', 'Ιωαννίνων', 'Ioannina'],
            ['GR', 'KA', 'Καβάλας', 'Kavala'],
            ['GR', 'KAR', 'Καρδίτσας', 'Karditsa'],
            ['GR', 'KAS', 'Καστοριάς', 'Kastoria'],
            ['GR', 'CO', 'Κέρκυρας', 'Corfu'],
            ['GR', 'KE', 'Κεφαλληνίας', 'Kefalonia and Ithaca'],
            ['GR', 'KI', 'Κιλκίς', 'Kilkis'],
            ['GR', 'KO', 'Κοζάνης', 'Kozani'],
            ['GR', 'COR', 'Κορινθίας', 'Corinthia'],
            ['GR', 'CY', 'Κυκλάδων', 'Cyclades'],
            ['GR', 'LAC', 'Λακωνίας', 'Laconia'],
            ['GR', 'LAR', 'Λάρισας', 'Larissa'],
            ['GR', 'LA', 'Λασιθίου', 'Lasithi'],
            ['GR', 'LES', 'Λέσβου', 'Lesbos'],
            ['GR', 'LE', 'Λευκάδας', 'Lefkada'],
            ['GR', 'MA', 'Μαγνησίας', 'Magnesia'],
            ['GR', 'ME', 'Μεσσηνίας', 'Messenia'],
            ['GR', 'XA', 'Ξάνθης', 'Xanthi'],
            ['GR', 'PE', 'Πέλλας', 'Pella'],
            ['GR', 'PI', 'Πιερίας', 'Pieria'],
            ['GR', 'PR', 'Πρέβεζας', 'Preveza'],
            ['GR', 'RE', 'Ρεθύμνης', 'Rethymno'],
            ['GR', 'RH', 'Ροδόπης', 'Rhodope'],
            ['GR', 'SA', 'Σάμου', 'Samos'],
            ['GR', 'SE', 'Σερρών', 'Serres'],
            ['GR', 'TR', 'Τρικάλων', 'Trikala'],
            ['GR', 'PHT', 'Φθιώτιδας', 'Phthiotis'],
            ['GR', 'FL', 'Φλώρινας', 'Florina'],
            ['GR', 'PH', 'Φωκίδας', 'Phocis'],
            ['GR', 'CHAL', 'Χαλκιδικής', 'Chalkidiki'],
            ['GR', 'CH', 'Χανίων', 'Chania'],
            ['GR', 'CHI', 'Χίου', 'Chios']
        ];

        foreach ($data as $row) {
            $bind = ['country_id' => $row[0], 'code' => $row[1], 'default_name' => $row[3]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region'), $bind);
            $regionId = $setup->getConnection()->lastInsertId($setup->getTable('directory_country_region'));

            $bind = ['locale' => 'en_US', 'region_id' => $regionId, 'name' => $row[3]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region_name'), $bind);

            $bind = ['locale' => 'el_GR', 'region_id' => $regionId, 'name' => $row[2]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region_name'), $bind);
        }
    }
}
