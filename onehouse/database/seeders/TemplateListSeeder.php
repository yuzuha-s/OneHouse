<?php

namespace Database\Seeders;

use App\Models\TemplateList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templateLists = [
            [
                'phase' => 1,
                'list' => "家族希望条件を整理した",
            ],
            [
                'phase' => 1,
                'list' => "大体の予算を知った",
            ],
            [
                'phase' => 1,
                'list' => "家探しの流れが大体わかった",
            ],
            [
                'phase' => 2,
                'list' => "見積もりをもらって比較した",
            ],
            [
                'phase' => 2,
                'list' => "営業担当との相性を確認した",
            ],
            [
                'phase' => 2,
                'list' => "複数社のモデルハウスを見学した",
            ],

            [
                'phase' => 3,
                'list' => "住宅ローンの種類（固定・変動・ミックス）を比較した",
            ],
            [
                'phase' => 3,
                'list' => "住宅ローンの事前審査をした",
            ],
            [
                'phase' => 3,
                'list' => "諸経費を確認した",
            ],
            [
                'phase' => 3,
                'list' => "契約金(頭金)を準備した",
            ],
            [
                'phase' => 4,
                'list' => "検討中の土地を訪問した",
            ],

            [
                'phase' => 4,
                'list' => "土地の用途地域・建ぺい率・容積率の確認)",
            ],
            [
                'phase' => 4,
                'list' => "立地とアクセスを確認した",
            ],
            [
                'phase' => 4,
                'list' => "法規制の確認をした",
            ],
            [
                'phase' => 4,
                'list' => "地盤調査をした",
            ],

            [
                'phase' => 5,
                'list' => "間取が決まった",
            ],
            [
                'phase' => 5,
                'list' => "内装が決まった",
            ],
            [
                'phase' => 5,
                'list' => "着工日程が決まった",
            ],
            [
                'phase' => 5,
                'list' => "建物確定金額が出た",
            ],
            [
                'phase' => 5,
                'list' => "登記・火災保険・地震保険の加入手続きをした",
            ],
            [
                'phase' => 5,
                'list' => "鎮祭をした",
            ],
            [
                'phase' => 5,
                'list' => "上棟をした",
            ],
            [
                'phase' => 5,
                'list' => "家が完成した",
            ],

        ];
        foreach ($templateLists as $templateList) {
            TemplateList::firstOrCreate($templateList);
        }
    }
}
