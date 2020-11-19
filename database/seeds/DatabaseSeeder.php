<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
                'name'=>'Trần Thanh Phụng',
                'email'=>'phung@gmail.com',
                'password'=>Hash::make('123')

            ]
        ];
        DB::table('users')->insert($user);

        $loaisanpham=[
            [
                'lsp_ten'=>'Bông tai'
            ],
            [
                'lsp_ten'=>'Nhẫn'
            ],
            [
                'lsp_ten'=>'Dây chuyền'
            ],
            [
                'lsp_ten'=>'Kiềng'
            ],
            [
                'lsp_ten'=>'Vàng miếng'
            ],
            [
                'lsp_ten'=>'Lắc'
            ]
        ];

        DB::table('loaisanpham')->insert($loaisanpham);

        $sanpham=[
            [
                'sp_ten'=>'Bông tai Vàng trắng Ý 18K PNJ 0000W000202',
                'sp_gia'=>2017000,
                'sp_hinhanh'=>'bong-tai-vang-trang-y.png',
                'lsp_id'=>1
            ],
            [
                'sp_ten'=>'Bông tai Vàng 18K PNJ 0000Y000080',
                'sp_gia'=>2620000,
                'sp_hinhanh'=>'bong-tai-pnj-vang-18k-001.png',
                'lsp_id'=>1
            ],
            [
                'sp_ten'=>'Mặt dây chuyền Vàng Ý 18K PNJ 0000Y000238',
                'sp_gia'=>28490000,
                'sp_hinhanh'=>'gm0000y000238-mat-day-chuyen-vang-y-18k-pnj-0000y000238-01.png',
                'lsp_id'=>3
            ],
            [
                'sp_ten'=>'Dây chuyền Vàng 18K PNJ 0000Y000885',
                'sp_gia'=>9087000,
                'sp_hinhanh'=>'gd0000y000885-day-chuyen-vang-18k-pnj.png',
                'lsp_id'=>3
            ],
            [
                'sp_ten'=>'Dây chuyền Vàng trắng Ý 18K PNJ 0000W000250',
                'sp_gia'=>28490000,
                'sp_hinhanh'=>'nha-ban-son-tra-da-nang-1811836191_1_cafeland.vn.png',
                'lsp_id'=>3
            ],
           
           
            
        ];

        DB::table('sanpham')->insert($sanpham);
    }
}
