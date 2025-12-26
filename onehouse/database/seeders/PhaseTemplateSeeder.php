<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhaseTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $phaseTemplates = [
            [
                'number' => 1,
                'list' => "家族希望条件を整理した",
            ],
            [
                'number' => 1,
                'list' => "大体の予算を知った",
            ],
            [
                'number' => 1,
                'list' => "家探しの流れが大体わかった",
            ],
            [
                'number' => 2,
                'list' => "見積もりをもらって比較した",
            ],
            [
                'number' => 2,
                'list' => "営業担当との相性を確認した",
            ],
            [
                'number' => 2,
                'list' => "複数社のモデルハウスを見学した",
            ],

            [
                'number' => 3,
                'list' => "住宅ローンの種類（固定・変動・ミックス）を比較した",
            ],
            [
                'number' => 3,
                'list' => "住宅ローンの事前審査をした",
            ],
            [
                'number' => 3,
                'list' => "諸経費を確認した",
            ],
            [
                'number' => 3,
                'list' => "契約金(頭金)を準備した",
            ],
            [
                'number' => 4,
                'list' => "検討中の土地を訪問した",
            ],

            [
                'number' => 4,
                'list' => "土地の用途地域・建ぺい率・容積率の確認)",
            ],
            [
                'number' => 4,
                'list' => "立地とアクセスを確認した",
            ],
            [
                'number' => 4,
                'list' => "法規制の確認をした",
            ],
            [
                'number' => 4,
                'list' => "地盤調査をした",
            ],

            [
                'number' => 5,
                'list' => "間取が決まった",
            ],
            [
                'number' => 5,
                'list' => "内装が決まった",
            ],
            [
                'number' => 5,
                'list' => "着工日程が決まった",
            ],
            [
                'number' => 5,
                'list' => "建物確定金額が出た",
            ],
            [
                'number' => 5,
                'list' => "登記・火災保険・地震保険の加入手続きをした",
            ],
            [
                'number' => 5,
                'list' => "鎮祭をした",
            ],
            [
                'number' => 5,
                'list' => "上棟をした",
            ],
            [
                'number' => 5,
                'list' => "家が完成した",
            ],

        ];
        foreach ($phaseTemplates as  $phaseTemplate) {
            PhaseTemplate::firstOrCreate($phaseTemplate);
        }
    }
}
