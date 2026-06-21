<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RaceSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('races')->truncate();
        Schema::enableForeignKeyConstraints();

        $races = [
            // ==================== CHIENS ====================
            [
                'nom' => 'CHIOT HUSKY SIBERIEN',
                'slug' => 'husky-siberien',
                'categorie' => 'chien',
                'description' => 'Le Husky Sibérien est un chien de traîneau originaire de Sibérie. C\'est un chien énergique, intelligent et sociable. Il est parfait pour les familles actives.',
                'taille' => '50-60 cm',
                'poids' => '16-27 kg',
                'esperance_vie' => '12-14 ans',
                'prix_moyen' => '700-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHIOT POMSKY',
                'slug' => 'pomsky',
                'categorie' => 'chien',
                'description' => 'Le Pomsky est un croisement entre le Husky Sibérien et le Spitz nain (Pomeranian). C\'est un chien de petite taille avec l\'apparence d\'un husky.',
                'taille' => '25-38 cm',
                'poids' => '4-11 kg',
                'esperance_vie' => '13-15 ans',
                'prix_moyen' => '750-2000 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHIOT GOLDEN RETRIEVER',
                'slug' => 'golden-retriever',
                'categorie' => 'chien',
                'description' => 'Le Golden Retriever est un chien de rapport originaire d\'Écosse. C\'est un chien doux, intelligent et dévoué, parfait pour les familles.',
                'taille' => '51-61 cm',
                'poids' => '25-34 kg',
                'esperance_vie' => '10-12 ans',
                'prix_moyen' => '700-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHIOT SPITZ NAIN',
                'slug' => 'spitz-nain-pomeranien',
                'categorie' => 'chien',
                'description' => 'Le Spitz Nain, aussi appelé Pomeranian, est un chien de petite taille originaire de Poméranie. C\'est un chien vif, intelligent et affectueux.',
                'taille' => '18-22 cm',
                'poids' => '1.5-3.5 kg',
                'esperance_vie' => '12-16 ans',
                'prix_moyen' => '1000-2500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHIOT YORKSHIRE',
                'slug' => 'yorkshire-terrier',
                'categorie' => 'chien',
                'description' => 'Le Yorkshire Terrier est un chien de petite taille originaire d\'Angleterre. C\'est un chien courageux, intelligent et plein d\'énergie.',
                'taille' => '15-23 cm',
                'poids' => '1.5-3.5 kg',
                'esperance_vie' => '12-15 ans',
                'prix_moyen' => '700-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHIOT CKC',
                'slug' => 'ckc',
                'categorie' => 'chien',
                'description' => 'Le Cavalier King Charles Spaniel est un chien de petite taille originaire d\'Angleterre. C\'est un chien affectueux, doux et élégant.',
                'taille' => '30-33 cm',
                'poids' => '5-8 kg',
                'esperance_vie' => '9-14 ans',
                'prix_moyen' => '700-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHIOT JACK RUSSEL',
                'slug' => 'jack-russel',
                'categorie' => 'chien',
                'description' => 'Le Jack Russell Terrier est un chien de petite taille originaire d\'Angleterre. C\'est un chien énergique, intelligent et courageux.',
                'taille' => '25-30 cm',
                'poids' => '5-8 kg',
                'esperance_vie' => '13-16 ans',
                'prix_moyen' => '650-1200 €',
                'is_active' => true,
            ],



            // ==================== CHATONS ====================
            [
                'nom' => 'CHATON BENGALE',
                'slug' => 'bengale',
                'categorie' => 'chat',
                'description' => 'Le Bengal est un chat au pelage tacheté rappelant celui du léopard. C\'est un chat actif, intelligent et affectueux.',
                'taille' => '30-45 cm',
                'poids' => '4-8 kg',
                'esperance_vie' => '12-16 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON SAVANNAH',
                'slug' => 'savannah',
                'categorie' => 'chat',
                'description' => 'Le Savannah est un croisement entre un chat domestique et un serval. C\'est un chat grand, actif et très intelligent.',
                'taille' => '40-60 cm',
                'poids' => '5-12 kg',
                'esperance_vie' => '12-20 ans',
                'prix_moyen' => '850-2500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON SPHYNX',
                'slug' => 'sphynx',
                'categorie' => 'chat',
                'description' => 'Le Sphynx est un chat sans poils, affectueux et très sociable. Il a besoin d\'attention et de chaleur.',
                'taille' => '20-30 cm',
                'poids' => '3-5 kg',
                'esperance_vie' => '12-15 ans',
                'prix_moyen' => '850-2000 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON BLEU RUSSE',
                'slug' => 'bleu-russe',
                'categorie' => 'chat',
                'description' => 'Le Bleu Russe est un chat au pelage gris-bleu et aux yeux verts. C\'est un chat calme, intelligent et réservé.',
                'taille' => '20-25 cm',
                'poids' => '3-5 kg',
                'esperance_vie' => '15-20 ans',
                'prix_moyen' => '700-1200 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON CHARTREUX',
                'slug' => 'chartreux',
                'categorie' => 'chat',
                'description' => 'Le Chartreux est un chat au pelage bleu-gris et aux yeux cuivrés. C\'est un chat calme, doux et affectueux.',
                'taille' => '20-30 cm',
                'poids' => '4-7 kg',
                'esperance_vie' => '12-15 ans',
                'prix_moyen' => '650-1200 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON RAGDOLL',
                'slug' => 'ragdoll',
                'categorie' => 'chat',
                'description' => 'Le Ragdoll est un chat grand et calme, connu pour son caractère doux et sa tendance à s\'assouplir quand on le porte.',
                'taille' => '25-35 cm',
                'poids' => '4-9 kg',
                'esperance_vie' => '12-17 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON SIBERIEN',
                'slug' => 'siberien',
                'categorie' => 'chat',
                'description' => 'Le Sibérien est un chat de grande taille originaire de Russie. C\'est un chat hypoallergénique, affectueux et joueur.',
                'taille' => '25-35 cm',
                'poids' => '4-9 kg',
                'esperance_vie' => '12-18 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON MAIN COON',
                'slug' => 'main-coon',
                'categorie' => 'chat',
                'description' => 'Le Maine Coon est un chat de très grande taille, au pelage mi-long. C\'est un chat doux, sociable et surnommé "gentil géant".',
                'taille' => '25-40 cm',
                'poids' => '4-10 kg',
                'esperance_vie' => '12-15 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'BRITISH SHORTHAIR',
                'slug' => 'british-shorthair',
                'categorie' => 'chat',
                'description' => 'Le British Shorthair est un chat au pelage dense et au corps trapu. C\'est un chat calme, indépendant et affectueux.',
                'taille' => '30-35 cm',
                'poids' => '4-8 kg',
                'esperance_vie' => '12-17 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON BRITISH LONGHAIR',
                'slug' => 'british-longhair',
                'categorie' => 'chat',
                'description' => 'Le British Longhair est la version à poil long du British Shorthair. C\'est un chat calme, doux et affectueux.',
                'taille' => '30-35 cm',
                'poids' => '4-8 kg',
                'esperance_vie' => '12-17 ans',
                'prix_moyen' => '550-1200 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON SCOTTISH FOLD',
                'slug' => 'scottish-fold',
                'categorie' => 'chat',
                'description' => 'Le Scottish Fold est reconnaissable à ses oreilles repliées vers l\'avant. C\'est un chat doux, calme et affectueux.',
                'taille' => '25-30 cm',
                'poids' => '3-6 kg',
                'esperance_vie' => '11-14 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON SACRE DE BIRMANIE',
                'slug' => 'sacre-de-birmanie',
                'categorie' => 'chat',
                'description' => 'Le Sacré de Birmanie est un chat au pelage mi-long et aux yeux bleus. C\'est un chat doux, calme et affectueux.',
                'taille' => '25-30 cm',
                'poids' => '3-6 kg',
                'esperance_vie' => '12-16 ans',
                'prix_moyen' => '650-1500 €',
                'is_active' => true,
            ],
            [
                'nom' => 'CHATON SIAMOIS',
                'slug' => 'siamois',
                'categorie' => 'chat',
                'description' => 'Le Siamois est un chat au corps élancé et aux yeux bleus. C\'est un chat très sociable, bavard et affectueux.',
                'taille' => '25-30 cm',
                'poids' => '3-5 kg',
                'esperance_vie' => '12-15 ans',
                'prix_moyen' => '650-1200 €',
                'is_active' => true,
            ],

            // ==================== OISEAUX ====================
            [
                'nom' => 'Gris du Gabon (Perroquet)',
                'slug' => 'perroquet-gris-du-gabon',
                'categorie' => 'oiseau',
                'description' => 'Le Perroquet Gris du Gabon (Jaco) est un oiseau très intelligent, capable d\'imiter la parole humaine. C\'est un compagnon exceptionnel.',
                'taille' => '35-42 cm',
                'poids' => '400-600 g',
                'esperance_vie' => '40-80 ans',
                'prix_moyen' => '700-2000 €',
                'is_active' => true,
            ],
        ];

        foreach ($races as $race) {
            DB::table('races')->insert($race);
        }

        $this->command->info('✅ ' . count($races) . ' races ont été insérées avec succès !');
    }
}
