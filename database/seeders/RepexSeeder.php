<?php

namespace Database\Seeders;

use App\Models\Repex;
use App\Models\Juridiction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RepexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                ['paysId'=>4, 'label'=>'Ambassade de Madagascar en Algerie', 'adr'=>'22, rue Abdelkar Aouis, Bologhine, Alger', 'email'=>''],
                ['paysId'=>2, 'label'=>'Ambassade de Madagascar en Afrique du Sud', 'adr'=>'No 1, rue Blackwood, Arcadia, Pretoria', 'email'=>''],
                ['paysId'=>5, 'label'=>'Ambassade de Madagascar en Allemagne', 'adr'=>'Kurfürstendamm 72, 10709 Berlin', 'email'=>''],
                ['paysId'=>11, 'label'=>'Ambassade de Madagascar en Arabie Saoudite', 'adr'=>'Riyadh', 'email'=>''],
                ['paysId'=>23, 'label'=>'Ambassade de Madagascar en Belgique', 'adr'=>'Avenue de Tervuren 430, 1150 Bruxelles', 'email'=>''],
                ['paysId'=>38, 'label'=>'Ambassade de Madagascar au Canada', 'adr'=>'3, rue de Louvain, Ottawa, Ontario K1N 5M6', 'email'=>''],
                ['paysId'=>41, 'label'=>'Ambassade de Madagascar en Chine', 'adr'=>'No 8, Dong Wu Jie, San Li Tun, Beijing', 'email'=>''],
                ['paysId'=>65, 'label'=>'Ambassade de Madagascar en Etats-Unis', 'adr'=>'Calle de la Pena de Francia 3, 28034 Madrid', 'email'=>''],
                ['paysId'=>66, 'label'=>'Ambassade de Madagascar en Ethiopie', 'adr'=>'', 'email'=>''],
                ['paysId'=>69, 'label'=>'Ambassade de Madagascar en France', 'adr'=>'4, avenue Raphaël, 75016 Paris', 'email'=>''],
                ['paysId'=>146, 'label'=>'Ambassade de Madagascar à Maurice','adr'=>'MU, Guiot Pasceau, 74101, Maurice','email'=>''],
                ['paysId'=>110, 'label'=>'Ambassade de Madagascar en Inde', 'adr'=>'No 65, Paschimi Marg, Vasant Vihar, New Delhi', 'email'=>''],
                ['paysId'=>117, 'label'=>'Ambassade de Madagascar en Italie', 'adr'=>'Via Orazio 3, 00193 Rome', 'email'=>''],
                ['paysId'=>119, 'label'=>'Ambassade de Madagascar au Japon', 'adr'=>'No 50, Kowa Building, 9th Floor, 4-12', 'email'=>''],
                ['paysId'=>144, 'label'=>'Ambassade de Madagascar au Maroc', 'adr'=>'', 'email'=>''],
                ['paysId'=>217, 'label'=>'Ambassade de Madagascar en Suisse', 'adr'=>'Avenue de Riant-Parc 38, 1209 Genève, Suisse', 'email'=>''],
                ['paysId'=>188, 'label'=>'Ambassade de Madagascar en Grande Bretagne', 'adr'=>'8, Leinster Square, Bayswater, London W2 4PR', 'email'=>''],
                ['paysId'=>189, 'label'=>'Ambassade de Madagascar en Russie', 'adr'=>'Kursovoy Pereulok, 5, Moscow, Russie, 119091', 'email'=>''],
                ['paysId'=>205, 'label'=>'Ambassade de Madagascar au Sénégal', 'adr'=>'BP 25.395 Dakar Fann Imm Royal Building 2e étage, Almadies Zone 16 Dakar, 10700, Sénégal', 'email'=>''],
            ]

            ];

            foreach ($data as $item) {
                DB::table('repexes')->insert($item);
            }

        $dataJuridication = [
            [
                ['repexId' => 1, 'paysId' => 4],
                ['repexId' => 1, 'paysId' => 233],
                ['repexId' => 1, 'paysId' => 133],
                ['repexId' => 1, 'paysId' => 147],
                ['repexId' => 2, 'paysId' => 140],
                ['repexId' => 2, 'paysId' => 2],
                ['repexId' => 2, 'paysId' => 155],
                ['repexId' => 2, 'paysId' => 157],
                ['repexId' => 2, 'paysId' => 30],
                ['repexId' => 2, 'paysId' => 246],
                ['repexId' => 2, 'paysId' => 245],
                ['repexId' => 2, 'paysId' => 6],
                ['repexId' => 2, 'paysId' => 129],
                ['repexId' => 2, 'paysId' => 64],
                ['repexId' => 2, 'paysId' => 223],
                ['repexId' => 2, 'paysId' => 45],
                ['repexId' => 2, 'paysId' => 190],
                ['repexId' => 2, 'paysId' => 35],
                ['repexId' => 3, 'paysId' => 5],
                ['repexId' => 3, 'paysId' => 55],
                ['repexId' => 3, 'paysId' => 115],
                ['repexId' => 3, 'paysId' => 16],
                ['repexId' => 3, 'paysId' => 181],
                ['repexId' => 3, 'paysId' => 225],
                ['repexId' => 3, 'paysId' => 210],
                ['repexId' => 3, 'paysId' => 91],
                ['repexId' => 3, 'paysId' => 135],
                ['repexId' => 3, 'paysId' => 63],
                ['repexId' => 4, 'paysId' => 19],
                ['repexId' => 4, 'paysId' => 59],
                ['repexId' => 4, 'paysId' => 168],
                ['repexId' => 4, 'paysId' => 121],
                ['repexId' => 4, 'paysId' => 220],
                ['repexId' => 4, 'paysId' => 244],
                ['repexId' => 4, 'paysId' => 131],
                ['repexId' => 4, 'paysId' => 112],
                ['repexId' => 4, 'paysId' => 185],
                ['repexId' => 4, 'paysId' => 127],
                ['repexId' => 5, 'paysId' => 23],
                ['repexId' => 5, 'paysId' => 177],
                ['repexId' => 5, 'paysId' => 136],
                ['repexId' => 6, 'paysId' => 38],
                ['repexId' => 6, 'paysId' => 53],
                ['repexId' => 6, 'paysId' => 88],
                ['repexId' => 6, 'paysId' => 57],
                ['repexId' => 6, 'paysId' => 118],
                ['repexId' => 6, 'paysId' => 232],
                ['repexId' => 6, 'paysId' => 18],
                ['repexId' => 6, 'paysId' => 24],
                ['repexId' => 6, 'paysId' => 21],
                ['repexId' => 6, 'paysId' => 198],
                ['repexId' => 6, 'paysId' => 77],
                ['repexId' => 6, 'paysId' => 10],
                ['repexId' => 6, 'paysId' => 97],
                ['repexId' => 6, 'paysId' => 193],
                ['repexId' => 6, 'paysId' => 107],
                ['repexId' => 6, 'paysId' => 196],
                ['repexId' => 6, 'paysId' => 8],
                ['repexId' => 6, 'paysId' => 192],
                ['repexId' => 7, 'paysId' => 41],
                ['repexId' => 7, 'paysId' => 128],
                ['repexId' => 7, 'paysId' => 36],
                ['repexId' => 7, 'paysId' => 242],
                ['repexId' => 7, 'paysId' => 152],
                ['repexId' => 7, 'paysId' => 156],
                ['repexId' => 7, 'paysId' => 227],
                ['repexId' => 8, 'paysId' => 65],
                ['repexId' => 8, 'paysId' => 43],
                ['repexId' => 8, 'paysId' => 31],
                ['repexId' => 8, 'paysId' => 149],
                ['repexId' => 8, 'paysId' => 40],
                ['repexId' => 8, 'paysId' => 12],
                ['repexId' => 8, 'paysId' => 178],
                ['repexId' => 8, 'paysId' => 146],
                ['repexId' => 8, 'paysId' => 238],
                ['repexId' => 8, 'paysId' => 241],
                ['repexId' => 8, 'paysId' => 60],
                ['repexId' => 8, 'paysId' => 28],
                ['repexId' => 8, 'paysId' => 86],
                ['repexId' => 8, 'paysId' => 218],
                ['repexId' => 9, 'paysId' => 66],
                ['repexId' => 9, 'paysId' => 58],
                ['repexId' => 9, 'paysId' => 123],
                ['repexId' => 9, 'paysId' => 213],
                ['repexId' => 9, 'paysId' => 56],
                ['repexId' => 9, 'paysId' => 169],
                ['repexId' => 9, 'paysId' => 61],
                ['repexId' => 9, 'paysId' => 212],
                ['repexId' => 9, 'paysId' => 37],
                ['repexId' => 9, 'paysId' => 224],
                ['repexId' => 9, 'paysId' => 214],
                ['repexId' => 9, 'paysId' => 51],
                ['repexId' => 9, 'paysId' => 70],
                ['repexId' => 9, 'paysId' => 46],
                ['repexId' => 9, 'paysId' => 113],
                ['repexId' => 10, 'paysId' => 69],
                ['repexId' => 10, 'paysId' => 62],
                ['repexId' => 10, 'paysId' => 116],
                ['repexId' => 10, 'paysId' => 151],
                ['repexId' => 10, 'paysId' => 184],
                ['repexId' => 10, 'paysId' => 126],
                ['repexId' => 11, 'paysId' => 146],
                ['repexId' => 11, 'paysId' => 20],
                ['repexId' => 11, 'paysId' => 207],
                ['repexId' => 11, 'paysId' => 171],
                ['repexId' => 11, 'paysId' => 106],
                ['repexId' => 11, 'paysId' => 15],
                ['repexId' => 11, 'paysId' => 166],
                ['repexId' => 11, 'paysId' => 228],
                ['repexId' => 12, 'paysId' => 110],
                ['repexId' => 12, 'paysId' => 215],
                ['repexId' => 12, 'paysId' => 159],
                ['repexId' => 12, 'paysId' => 141],
                ['repexId' => 12, 'paysId' => 27],
                ['repexId' => 12, 'paysId' => 1],
                ['repexId' => 13, 'paysId' => 117],
                ['repexId' => 13, 'paysId' => 3],
                ['repexId' => 13, 'paysId' => 187],
                ['repexId' => 13, 'paysId' => 42],
                ['repexId' => 13, 'paysId' => 33],
                ['repexId' => 13, 'paysId' => 150],
                ['repexId' => 13, 'paysId' => 72],
                ['repexId' => 13, 'paysId' => 13],
                ['repexId' => 13, 'paysId' => 76],
                ['repexId' => 13, 'paysId' => 235],
                ['repexId' => 13, 'paysId' => 194],
                ['repexId' => 13, 'paysId' => 211],
                ['repexId' => 13, 'paysId' => 52],
                ['repexId' => 13, 'paysId' => 29],
                ['repexId' => 13, 'paysId' => 186],
                ['repexId' => 13, 'paysId' => 153],
                ['repexId' => 14, 'paysId' => 119],
                ['repexId' => 14, 'paysId' => 209],
                ['repexId' => 14, 'paysId' => 48],
                ['repexId' => 14, 'paysId' => 111],
                ['repexId' => 14, 'paysId' => 32],
                ['repexId' => 14, 'paysId' => 175],
                ['repexId' => 14, 'paysId' => 139],
                ['repexId' => 14, 'paysId' => 179],
                ['repexId' => 15, 'paysId' => 144],
                ['repexId' => 15, 'paysId' => 39],
                ['repexId' => 15, 'paysId' => 142],
                ['repexId' => 15, 'paysId' => 162],
                ['repexId' => 15, 'paysId' => 34],
                ['repexId' => 16, 'paysId' => 217],
                ['repexId' => 17, 'paysId' => 188],
                ['repexId' => 17, 'paysId' => 100],
                ['repexId' => 17, 'paysId' => 68],
                ['repexId' => 17, 'paysId' => 216],
                ['repexId' => 17, 'paysId' => 164],
                ['repexId' => 17, 'paysId' => 114],
                ['repexId' => 18, 'paysId' => 189],
                ['repexId' => 18, 'paysId' => 122],
                ['repexId' => 18, 'paysId' => 124],
                ['repexId' => 18, 'paysId' => 130],
                ['repexId' => 18, 'paysId' => 206],
                ['repexId' => 18, 'paysId' => 170],
                ['repexId' => 18, 'paysId' => 134],
                ['repexId' => 18, 'paysId' => 237],
                ['repexId' => 18, 'paysId' => 221],
                ['repexId' => 18, 'paysId' => 22],
                ['repexId' => 18, 'paysId' => 17],
                ['repexId' => 19, 'paysId' => 205],
                ['repexId' => 19, 'paysId' => 71],
                ['repexId' => 19, 'paysId' => 50],
                ['repexId' => 19, 'paysId' => 74],
                ['repexId' => 19, 'paysId' => 84],
                ['repexId' => 19, 'paysId' => 161],
                ['repexId' => 19, 'paysId' => 208],
                ['repexId' => 19, 'paysId' => 229],
                ['repexId' => 19, 'paysId' => 132],
                ['repexId' => 19, 'paysId' => 33],
                ['repexId' => 19, 'paysId' => 85],
                ['repexId' => 19, 'paysId' => 204],
                ['repexId' => 19, 'paysId' => 83],
            ]
            ];

            foreach ($dataJuridication as $item) {
                DB::table('juridictions')->insert($item);
            }
    }
}
