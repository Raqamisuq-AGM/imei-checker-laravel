<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['service_id' => 1, 'title' => 'Find My iPhone [ FMI ] (ON/OFF)', 'price' => 0.00],
            ['service_id' => 2, 'title' => 'Warranty + Activation - PRO [IMEI/SN]', 'price' => 0.00],
            ['service_id' => 3, 'title' => 'Apple FULL INFO [No Carrier]', 'price' => 0.37],
            ['service_id' => 4, 'title' => 'iCloud Clean/Lost Check', 'price' => 0.00],
            ['service_id' => 5, 'title' => 'Blacklist Status (GSMA)', 'price' => 0.00],
            ['service_id' => 6, 'title' => 'Blacklist Pro Check (GSMA)', 'price' => 0.37],
            ['service_id' => 7, 'title' => 'Apple Carrier + SimLock - back-up', 'price' => 0.41],
            ['service_id' => 8, 'title' => 'Samsung Info (S1) (IMEI)', 'price' => 0.34],
            ['service_id' => 9, 'title' => 'SOLD BY [instant]', 'price' => 1.90],
            ['service_id' => 10, 'title' => 'IMEI to Model [all brands][IMEI/SN]', 'price' => 0.00],
            ['service_id' => 11, 'title' => 'IMEI to Brand/Model/Name', 'price' => 0.00],
            ['service_id' => 12, 'title' => 'GSX Next Tether + iOS (GSX Carrier)', 'price' => 0.90],
            ['service_id' => 13, 'title' => 'Model + Color + Storage + FMI', 'price' => 0.00],
            ['service_id' => 14, 'title' => 'IMEI to SN (Full Convertor)', 'price' => 0.00],
            ['service_id' => 15, 'title' => 'T-mobile (ESN) PRO Check', 'price' => 0.34],
            ['service_id' => 16, 'title' => 'Verizon (ESN) Clean/Lost Status', 'price' => 0.33],
            ['service_id' => 17, 'title' => 'Huawei IMEI Info', 'price' => 0.33],
            ['service_id' => 18, 'title' => 'iMac FMI Status On/Off', 'price' => 0.60],
            ['service_id' => 19, 'title' => 'Apple FULL INFO [+Carrier] B', 'price' => 0.42],
            ['service_id' => 20, 'title' => 'Apple SimLock Check', 'price' => 0.00],
            ['service_id' => 21, 'title' => 'SAMSUNG INFO & KNOX STATUS (S2)', 'price' => 0.44],
            ['service_id' => 22, 'title' => 'Apple BASIC INFO (PRO) - new', 'price' => 0.34],
            ['service_id' => 23, 'title' => 'Apple Carrier Check (S2)', 'price' => 0.34],
            ['service_id' => 25, 'title' => 'XIAOMI MI LOCK & INFO', 'price' => 0.35],
            ['service_id' => 27, 'title' => 'ONEPLUS IMEI INFO', 'price' => 0.34],
            ['service_id' => 33, 'title' => 'Replacement Status (Active Device)', 'price' => 0.00],
            ['service_id' => 34, 'title' => 'Replaced Status (Original Device)', 'price' => 0.00],
            ['service_id' => 36, 'title' => 'Samsung Info (S1) + Blacklist', 'price' => 0.36],
            ['service_id' => 37, 'title' => 'Samsung Info & KNOX STATUS (S1)', 'price' => 0.39],
            ['service_id' => 39, 'title' => 'APPLE FULL INFO [+Carrier] A', 'price' => 0.40],
            ['service_id' => 40, 'title' => 'APPLE GSX CASES INFO', 'price' => 1.80],
            ['service_id' => 42, 'title' => 'LG IMEI INFO', 'price' => 0.35],
            ['service_id' => 43, 'title' => 'Apple GSX FULL - INSTANT', 'price' => 2.50],
            ['service_id' => 44, 'title' => 'MDM Status + Config (Pro) Apple All', 'price' => 3.90],
            ['service_id' => 46, 'title' => 'MDM Status On/Off (IMEI/SN)- updated 15/07/2024', 'price' => 1.20],
            ['service_id' => 47, 'title' => 'Apple FULL + MDM + GSMA PRO', 'price' => 1.20],
            ['service_id' => 50, 'title' => 'Apple SERIAL Info(model,size,color)', 'price' => 0.00],
            ['service_id' => 51, 'title' => 'Warranty + Activation [SN ONLY]', 'price' => 0.00],
            ['service_id' => 52, 'title' => 'Model Description (Any Apple SN/IMEI)', 'price' => 0.00],
            ['service_id' => 54, 'title' => 'SOLD BY+ MAC (only iPad/ iWatch)', 'price' => 1.60],
        ];

        DB::table('services')->insert($services);
    }
}


// paid ids = 4,5,14,16,19
