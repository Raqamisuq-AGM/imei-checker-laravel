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
            ['title' => 'APPLE FULL INFO [+Carrier] A', 'price' => '0.42'],
            ['title' => 'Apple FULL INFO [+Carrier] B', 'price' => '0.45'],
            ['title' => 'Apple BASIC INFO (PRO) - new', 'price' => '0.36'],
            ['title' => 'MDM Status On/Off (IMEI/SN)- updated 15/07/2024', 'price' => '1.02'],
            ['title' => 'Apple FULL + MDM + GSMA PRO', 'price' => '1.02'],
            ['title' => 'Apple Carrier Check (S2)', 'price' => '0.36'],
            ['title' => 'Apple SimLock Check', 'price' => '0.33'],
            ['title' => 'iCloud Clean/Lost Check', 'price' => '0.33'],
            ['title' => 'Apple FULL INFO [No Carrier]', 'price' => '0.39'],
            ['title' => 'Find My iPhone [ FMI ] (ON/OFF)', 'price' => '0.31'],
            ['title' => 'Warranty + Activation - PRO [IMEI/SN]', 'price' => '0.32'],
            ['title' => 'Blacklist Pro Check (GSMA)', 'price' => '0.38'],
            ['title' => 'Blacklist Status (GSMA)', 'price' => '0.33'],
            ['title' => 'SOLD BY [instant]', 'price' => '2.10'],
            ['title' => 'Model + Color + Storage + FMI', 'price' => '0.33'],
            ['title' => 'GSX Next Tether + iOS (GSX Carrier)', 'price' => '1.05'],
            ['title' => 'Replacement Status (Active Device)', 'price' => '0.32'],
            ['title' => 'Replaced Status (Original Device)', 'price' => '0.32'],
            ['title' => 'iMac FMI Status On/Off', 'price' => '0.40'],
            ['title' => 'IMEI to Model [all brands][IMEI/SN]', 'price' => '0.31'],
            ['title' => 'IMEI to Brand/Model/Name', 'price' => '0.31'],
            ['title' => 'Verizon (ESN) Clean/Lost Status', 'price' => '0.34'],
            ['title' => 'Samsung Info (S1) (IMEI)', 'price' => '0.36'],
            ['title' => 'Samsung Info & KNOX STATUS (S1)', 'price' => '0.44'],
            ['title' => 'Samsung Info (S1) + Blacklist', 'price' => '0.37'],
            ['title' => 'SAMSUNG INFO & KNOX STATUS (S2)', 'price' => '0.47'],
            ['title' => 'XIAOMI MI LOCK & INFO', 'price' => '0.36'],
            ['title' => 'Huawei IMEI Info', 'price' => '0.35'],
            ['title' => 'T-mobile (ESN) PRO Check', 'price' => '0.35'],
            ['title' => 'ONEPLUS IMEI INFO', 'price' => '0.35'],
            ['title' => 'LG IMEI INFO', 'price' => '0.36'],
            ['title' => 'APPLE GSX CASES INFO', 'price' => '2.10'],
            ['title' => 'Apple GSX FULL - INSTANT', 'price' => '2.80'],
            ['title' => 'MDM Status + Config (Pro) Apple All', 'price' => '4.50'],
            ['title' => 'IMEI to SN (Full Convertor)', 'price' => '0.32'],
            ['title' => 'Apple Carrier + SimLock - back-up', 'price' => '0.55'],
            ['title' => 'Apple SERIAL Info(model,size,color)', 'price' => '0.32'],
            ['title' => 'Warranty + Activation [SN ONLY]', 'price' => '0.31'],
            ['title' => 'Model Description (Any Apple SN/IMEI)', 'price' => '0.33'],
            ['title' => 'SOLD BY+ MAC (only iPad/ iWatch)', 'price' => '1.70'],
        ];

        DB::table('services')->insert($services);
    }
}


// paid ids = 4,5,14,16,19
