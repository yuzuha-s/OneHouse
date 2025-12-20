-- テーブル名        tablename
-- ユーザー情報      users
-- プロフィール情報   profile
-- 住宅メーカー      makers
-- ※中間テーブル makers_features 
-- 住宅メーカータグfeatures
-- 住宅メーカータグカテゴリー makerOptionCategories
-- 建築可能面積 landProperties
-- チェックリスト checklists
-- フェーズ phase

insert into users (name, email, password) values
(Test User, test@example.com, password),
(yuzuha, yuzuha@com.jp, pass123);

insert into profile (user_id) values
(1),
(2);

insert into markers (profile_id, name, sales, option star) values
(1, ミサワホーム, 田中, 紹介で３０万円割引特典あり, 2),
(1, スター工務店, 立花, なし, 1);

insert into makerOptionCategories (name) values
1(ブランド力),
2(工法・構造),
3(耐熱性脳・省エネ性),
4(耐震性),
5(保証・アフターサービス),
6(デザイン間取りの自由度);



insert into features (category_id, tag) values
(1, 信頼性),
(1, 実績),
(1, 品質),
(1, ブランドイメージ),
(2, 木造),
(2, 鉄骨),
(2, RC造),
(2, ハイブリッド工法),
(2, その他),
(3, 等級6以上),
(3, 等級5),
(3, 等級4),
(3, 等級3以下),
(4, 等級3),
(4, 等級2),
(4, 等級1),
(5, 保証あり),
(5, アフターサービスあり),
(6, 規格型),
(6, セミオーダー),
(6, フルオーダー),
(6, 外観デザイン),
(6, 内装デザイン),
(6, ステップフロア可);

insert into makers_features (marker_id, feature_id) values
(1, 4),
(1, 5),
(1, 10),
(1, 14),
(1, 17),
(1, 20),
(2, 3),
(2, 6),
(2, 10),
(2, 15),
(2, 18),
(2, 22);


insert into landProperties (profile_id, address, landarea,  far, bcr, floor, buildable_area, pricePerTsubo ) values
(1, 東京都板橋区3丁目1-55, 80, 200, 80, 2, 0, 87);
(1, 東京都板橋区5丁目2-66, 90, 150, 60, 3, 0, 77);

insert into phase (phase, list) values
(1, 家族希望条件を整理した),
(1, 大体の予算を知った),
(1, 家探しの流れが大体わかった),
(2, 複数社のモデルハウスを見学した),
(2, 見積もりをもらって比較した),
(2, 営業担当との相性を確認した),
(3, 住宅ローンの種類（固定・変動・ミックス）を比較した),
(3, 住宅ローンの事前審査をした),
(3, 諸経費を確認した),
(3, 契約金(頭金)を準備した),
(4, 検討中の土地を訪問した),
(4, 土地の用途地域・建ぺい率・容積率の確認),
(4, 立地とアクセスを確認した),
(4, 法規制の確認をした),
(4, 地盤調査をした),
(5, 間取が決まった),
(5, 内装が決まった),
(5, 着工日程が決まった),
(5, 建物確定金額が出た),
(5, 登記・火災保険・地震保険の加入手続きをした),
(5, 地鎮祭をした),
(5, 上棟をした),
(5, 家が完成した);


insert into checklists (profile_id, phase_id, checked) values
(1, 1, true),
(1, 2, true),
(1, 3, true),
(1, 4, true),
(1, 5, true),
(1, 6, true),
(1, 7, true),
(1, 8, true),
(1, 9, true),
(1, 10, true),
(1, 11, true),
(1, 12, true),
(1, 13, true),
(1, 14, true),
(1, 15, false),
(1, 16, false),
(1, 17, false),
(1, 18, false),
(1, 19, false),
(1, 20, false),
(1, 21, false),
(1, 22, false),
(1, 23, false),


