<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'admin_id' => '1',
                'email' => 'admin@gmail.com',
                'password' => '12345',
                'role' => 'admin'
            ],
            [
                'name' => 'NASRULLAH NURUL R.,S.Pd,M.Pd',
                'guru_id' => '1000',
                'email' => 'nasul@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Dr. SAMSORI, S.Pd, M.Pd',
                'guru_id' => '2000',
                'email' => 'samsori@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SRI UMI MARDIASIH, S.Pd, M.Pd',
                'guru_id' => '3000',
                'email' => 'sri@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ENDRIYANTO TRILAKSONO, S.Pd',
                'guru_id' => '4000',
                'email' => 'endri@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'M. ABU DARIN, S.Ag',
                'guru_id' => '5000',
                'email' => 'abu@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SITI SUNDARI, S.Pd, M.Pd',
                'guru_id' => '6000',
                'email' => 'siti@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'WIWIN MUSTIKAYANA, S.Pd.',
                'guru_id' => '7000',
                'email' => 'wiwin@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'DIAH RETNO WULAN T, S.Pd, M.Pd',
                'guru_id' => '8000',
                'email' => 'diyah@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ROSDINA HAEDAR, S.Pd. M.PdI',
                'guru_id' => '9000',
                'email' => 'rosdina@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'MOCH. NAFSIR, S.PdI',
                'guru_id' => '1100',
                'email' => 'nafsir@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'EVVI TRISNA MARTDIANY, S.Pd',
                'guru_id' => '1200',
                'email' => 'trisna@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ENUNG SARIFAH, S.Pd',
                'guru_id' => '1300',
                'email' => 'enung@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'DEWI NURYAWATI, S.Pd',
                'guru_id' => '1400',
                'email' => 'dewi@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'DUDI HARYADI, S.Pd',
                'guru_id' => '1500',
                'email' => 'dudi@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'AI SUHARTINI, SE',
                'guru_id' => '1600',
                'email' => 'ai@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'EVVA YAKVIAWATI,S.Pd',
                'guru_id' => '1700',
                'email' => 'evva@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'IDA LESTARI, S.Pd',
                'guru_id' => '1800',
                'email' => 'ida@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SITI DARAJAT, S.Pd.,Gr',
                'guru_id' => '1900',
                'email' => 'darajat@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'AGUS HERYANA,S.Pd.,Gr',
                'guru_id' => '2100',
                'email' => 'agus@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'AZIZI ANI NUR MELAWATI, S.Pd',
                'guru_id' => '2200',
                'email' => 'azizi@gmail.com',
                'password' => '12345',
                'role' => 'kurikulum'
            ],
            [
                'name' => 'JENNY NUR APRIYANTI, S.Pd.',
                'guru_id' => '2300',
                'email' => 'jenny@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'INDRA BATARA, S.Pd',
                'guru_id' => '2400',
                'email' => 'indra@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'WARDIATI, S.Pd.',
                'guru_id' => '2500',
                'email' => 'wardati@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'IKA NOVITASARI, S.Pd.',
                'guru_id' => '2600',
                'email' => 'ika@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'FITRAYANTI FEBRIA C., S.Pd.',
                'guru_id' => '2700',
                'email' => 'fitri@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ATIEK OCTARIA P. S.Pd',
                'guru_id' => '2800',
                'email' => 'atiek@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'RAKAI META PUSPARINI, S.Pt',
                'guru_id' => '2900',
                'email' => 'rakai@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SUKANDA WIGUNA, S.T.',
                'guru_id' => '3100',
                'email' => 'sukanda@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'RUDY, S.Pd.',
                'guru_id' => '3200',
                'email' => 'dury@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'LISTIA MEILIANA SARI, S.Pd.',
                'guru_id' => '3300',
                'email' => 'listia@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SALIMAN, S.Ag',
                'guru_id' => '3400',
                'email' => 'saliman@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'MUTIARA ZAHRA, S.Pd.',
                'guru_id' => '3500',
                'email' => 'mutiara@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'EUIS YULISTRIA, S.Kom.I',
                'guru_id' => '3600',
                'email' => 'euis@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ANNISA SABILLA',
                'guru_id' => '3700',
                'email' => 'annisa@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ELIZA PUSPA, S.Pd., M.Pd.',
                'guru_id' => '3800',
                'email' => 'eliza@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'LENI MARLIATI, S.Pd.',
                'guru_id' => '3900',
                'email' => 'leni@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'RIZKY FAUZI ACHMAN, S.Kom.',
                'guru_id' => '4100',
                'email' => 'rizki@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'MUHAMAD YUSRIL NUGRAHA',
                'guru_id' => '4200',
                'email' => '@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'MAYANG PERMATA SARI, S.Pd.',
                'guru_id' => '4300',
                'email' => 'mayang@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'FAUZIAH NUR ALIFAH, S.Pd.',
                'guru_id' => '4400',
                'email' => 'fauziah@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SENI JULIA TERESNA AYUNDA, S.Pd.',
                'guru_id' => '4500',
                'email' => 'seni@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'HIKMAL SETIAWAN, S.Pd.,M.Pd',
                'guru_id' => '4600',
                'email' => 'hikmal@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'MINATI ARFAH, S.Pd.',
                'guru_id' => '4700',
                'email' => 'minati@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'FARIDA TYAS, S.Pd.',
                'guru_id' => '4800',
                'email' => 'arafah@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'PUTRI NURJANAH MUSLIMAH, S.Pd.,Gr',
                'guru_id' => '4900',
                'email' => 'putri@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'DIAN HARDIANA, S.Kom.',
                'guru_id' => '5100',
                'email' => 'dian@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'NESA SEPTIANA, S.Psi.',
                'guru_id' => '5200',
                'email' => 'nesa@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'FAHRY FIRMANSAH ABDUL ROHMAN',
                'guru_id' => '5400',
                'email' => 'fahry@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'SUCI SULASTRI, S.Kom., MOS., MTCNA',
                'guru_id' => '5600',
                'email' => 'suci@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'RENI MULYANI,S.Pd',
                'guru_id' => '5700',
                'email' => 'reni@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'RIFKI AHMAD, S.Pd.',
                'guru_id' => '5800',
                'email' => 'rifki@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'EDI YUSMAN, S.E., M.M.',
                'guru_id' => '5900',
                'email' => 'edi@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'WIJAYA MUSTOPA, S.Ip',
                'guru_id' => '6100',
                'email' => 'wijaya@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'MUHAMMAD AKBAR, S.Pd.',
                'guru_id' => '6200',
                'email' => 'akbar@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'DIMAS YONATHAN, S.Pd.',
                'guru_id' => '6300',
                'email' => 'dimas@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'YUDI KURNIA SOLIHIN, S.Pd.',
                'guru_id' => '6400',
                'email' => 'yudi@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'INDAH NURSYAIFA D., S.Pd.',
                'guru_id' => '6500',
                'email' => 'indah@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'TETI SURYATI, S.Pd.',
                'guru_id' => '6600',
                'email' => 'teti@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Dennis Aji Muhammad Jabar, S.Kom',
                'guru_id' => '6700',
                'email' => 'aji@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Ria Pangestu, S.Pd',
                'guru_id' => '6800',
                'email' => 'ria@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'DENIS AJI MUHAMAD JABAR, S.Kom.',
                'guru_id' => '6900',
                'email' => 'denis@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'ABI ABDUL ZABAR',
                'siswa_id' => '102202058',
                'email' => 'abi@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AGNIA NURMAYA SARI',
                'siswa_id' => '102202060',
                'email' => 'agnia@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ALDYNA MAULIDA AKBAR',
                'siswa_id' => '102202093',
                'email' => 'ALDYNA@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ADITYA ZULFIANSYAH M',
                'siswa_id' => '102202094',
                'email' => 'aditya@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AISYAH FITRI',
                'siswa_id' => '102202095',
                'email' => 'aisyah@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ALIFA PUTRI FAUZIAH',
                'siswa_id' => '102202096',
                'email' => 'alifa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'DESTA RADITIA HIDAYAT PUTRA',
                'siswa_id' => '102202127',
                'email' => 'desta@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'DIKA PERMANA PUTRA',
                'siswa_id' => '102202128',
                'email' => 'dika@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'EKA RAMADANI',
                'siswa_id' => '102202129',
                'email' => 'eka@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ANNE PEBRIYANTI',
                'siswa_id' => '102202158',
                'email' => 'anne@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ASEP PURNAMA',
                'siswa_id' => '102202159',
                'email' => 'asep@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AZWAR DIKA PERMANA',
                'siswa_id' => '102202160',
                'email' => 'azwar@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AFNISA DWI ASRI',
                'siswa_id' => '102202189',
                'email' => 'afnisa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AMELIA ISMIANI',
                'siswa_id' => '102202190',
                'email' => 'amelia@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ASVIA NOVIYANTI',
                'siswa_id' => '102202192',
                'email' => 'asvisa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ANZELI STEVANI',
                'siswa_id' => '102202228',
                'email' => 'anzeli@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AQILA ZARA FAUZIAH',
                'siswa_id' => '102202229',
                'email' => 'aqila@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AUDRY PARANITA',
                'siswa_id' => '102202230',
                'email' => 'audry@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ISTI KOIRUN NISA',
                'siswa_id' => '102202260',
                'email' => 'isti@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'LIDYA NUR RAHMA',
                'siswa_id' => '102202261',
                'email' => 'lidya@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'M PAUJAN PATULOH',
                'siswa_id' => '102202263',
                'email' => 'paujan@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'AGNES VIOLLITA',
                'siswa_id' => '102202289',
                'email' => 'agnes@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ALYA ALIFA RAMADANI',
                'siswa_id' => '102202290',
                'email' => 'alya@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ANNISA TSANIA AFIFA',
                'siswa_id' => '102202292',
                'email' => 'tsafina@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ALIA NURHIKMAH',
                'siswa_id' => '102202325',
                'email' => 'alia@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ALWA RIZKIA NUR AULIA',
                'siswa_id' => '102202326',
                'email' => 'alwa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ANISA MAULINA',
                'siswa_id' => '102202327',
                'email' => 'maulina@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ALDIKAFAZRIAWAN',
                'siswa_id' => '102202362',
                'email' => 'aldi@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'ARFA RIZQI PRADITA',
                'siswa_id' => '102202363',
                'email' => 'arfa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'BUDIMAN MAULANA',
                'siswa_id' => '102202364',
                'email' => 'budiman@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'DENI RAMDHAN SAPUTRA',
                'siswa_id' => '102202404',
                'email' => 'deni@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'DENITA RISMA WANDARI',
                'siswa_id' => '102202405',
                'email' => 'denita@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'GINA MELANI PUTRI',
                'siswa_id' => '102202410',
                'email' => 'gina@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],          
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
