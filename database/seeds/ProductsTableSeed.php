<?php

use Illuminate\Database\Seeder;

class ProductsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('products')->get()->count() == 0){

            $datas =  [[68, 50, 'Saltwort', 1],[66, 45, 'Lecho', 1],
                [64, 70, 'Salmon ear', 1],[65, 33, 'Borsch', 1],[67, 40, 'Okroshka', 1],[62, 50, 'Laghman', 1],[63, 45, 'Kharcho', 1],[40, 120, 'Pork steak', 2]
                ,[41, 200, 'Porterhouse', 2],[39, 170, 'Striploin', 2],[36, 250, 'Chateaubriand', 2],[35, 180, 'Ti-Bon', 2],
                [37, 200, 'Salmon steak', 2],[42, 140, 'Beef steak', 2],[38, 160, 'Ribeye', 2],[48, 85, 'Lasagna', 3],
                [49, 70, 'Primavera', 3],[50, 65, 'Carbonara', 3],[51, 70, 'Bolognese', 3],[52, 90, 'Arabyata', 3],
                [89, 88, 'National', 4],[88, 75, 'Afro-burger', 4],[86, 90, 'American dream', 4],[87, 75, 'Bavarian', 4],
                [43, 60, 'Favorite', 5],[45, 50, 'Olivie', 5],[46, 58, 'Caesar', 5],[47, 60, 'Grecian', 5],[44, 64, 'Nicoise', 5],
                [78, 55, 'Banana', 6],[79, 50, 'Classic', 6],[80, 65, 'Bilberry', 6],[85, 70, 'Violet', 7],[84, 35, 'Napoleon', 7],
                [83, 50, 'Cappuccino cake', 7],[82, 40, 'Honey cake', 7],[81, 90, 'Esterhazy', 7],[92, 70, 'Peppermint', 8],
                [91, 55, 'Chocolate', 8],[90, 60, 'American', 8],[93, 55, 'Chery', 8],[59, 40, 'Sorbet', 9],[60, 30, 'Plombir', 9]
                ,[61, 35, 'Creme brulee', 9],[19, 42, 'Finladia Lime', 10],[22, 42, 'Finlandia', 10],[23, 36, 'Rada Respect', 10],
                [20, 44, 'Smirnoff Red', 10],[17, 22, 'Kozatska Rada', 10],[18, 100, 'Ciroc', 10],[21, 28, 'First Guild', 10],
                [13, 44, 'Bells', 11],[10, 85, 'Crown Royale', 11],[11, 65, 'Red Label', 11],[12, 68, 'Jack Daniesls', 11],
                [14, 190, 'Cardhu', 11],[15, 200, 'Talisker', 11],[16, 200, 'Glenkinchie', 11],[1, 340, 'Carmenere', 12],
                [3, 350, 'Saperavi', 12],[4, 420, 'Bardolino', 12],[5, 420, 'Branco', 12],[6, 420, 'Tinto', 12],
                [7, 350, 'Tsinandali', 12],[8, 400, 'Riesling', 12],[9, 360, 'Shiraz', 12],[2, 420, 'Soave', 12],
                [26, 45, 'Cinxano Rosso', 13],[25, 45, 'Cinzano Rose', 13],[28, 25, 'Marengo Bianco', 13],[24, 26, 'Marengo Dry', 13],
                [27, 26, 'Marengo Sea', 13],[95, 33, 'Carlsberg', 14],[96, 26, 'Tuborg', 14],[97, 40, 'Kronenburg', 14],
                [98, 56, 'Corona', 14],[99, 55, 'Grimbergen', 14],[94, 48, 'Heineken', 14],[30, 20, 'Black tea', 15],
                [29, 80, 'White tea', 15],[31, 25, 'Green tea', 15],[32, 80, 'Yellow', 15],[33, 70, 'Oolong tea', 15],[34, 65, 'Puer tea', 15],
                [103, 70, 'Grape', 15],[108, 40, 'Konpanna', 16],[110, 45, 'Corretto', 16],[111, 35, 'Latte', 16],[112, 35, 'Lungo', 16],
                [113, 40, 'Doppio', 16],[107, 25, 'Americano', 16],[106, 35, 'Cappuccino', 16],[109, 35, 'Irish', 16],[114, 35, 'Glace', 16],
                [105, 50, 'Apple juice', 17],[104, 75, 'Celery', 17],[101, 90, 'Pomegranate', 17],[100, 60, 'Tomato juice', 17],
                [102, 65, 'Citrus juice', 17],];

            foreach ($datas as $data) {
                DB::insert("INSERT INTO `products` (`id`, `price`, `prod_name`, `subcategory_id`) VALUES (?,?,?,? )", $data);
            }

        } else { echo "\eTable is not empty \n"; }
    }
}
