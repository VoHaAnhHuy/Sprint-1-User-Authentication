<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database with sample products and variants.
     */
    public function run(): void
    {
        $products = [
            [
                'title'       => 'iPhone 16 Pro Max',
                'description' => 'Điện thoại Apple iPhone 16 Pro Max với chip A18 Pro, camera 48MP, màn hình Super Retina XDR 6.9 inch.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '256GB', 'option_2' => 'Titan Sa Mạc',    'price' => 34990000, 'compare_at_price' => 36990000, 'inventory_quantity' => 50],
                    ['option_1' => '512GB', 'option_2' => 'Titan Đen',       'price' => 41990000, 'compare_at_price' => 43990000, 'inventory_quantity' => 30],
                ],
            ],
            [
                'title'       => 'Samsung Galaxy S25 Ultra',
                'description' => 'Samsung Galaxy S25 Ultra với chip Snapdragon 8 Elite, camera 200MP, bút S-Pen tích hợp AI.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '256GB', 'option_2' => 'Titanium Black',  'price' => 33990000, 'compare_at_price' => 35990000, 'inventory_quantity' => 45],
                    ['option_1' => '512GB', 'option_2' => 'Titanium Silver', 'price' => 39990000, 'compare_at_price' => 41990000, 'inventory_quantity' => 25],
                ],
            ],
            [
                'title'       => 'MacBook Pro 14 M4 Pro',
                'description' => 'MacBook Pro 14 inch chip M4 Pro, 18GB RAM, màn hình Liquid Retina XDR, thời lượng pin 17 giờ.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '512GB SSD', 'option_2' => 'Space Black',  'price' => 49990000, 'compare_at_price' => 52990000, 'inventory_quantity' => 20],
                    ['option_1' => '1TB SSD',   'option_2' => 'Silver',       'price' => 59990000, 'compare_at_price' => 62990000, 'inventory_quantity' => 15],
                ],
            ],
            [
                'title'       => 'iPad Air M3',
                'description' => 'iPad Air chip M3, màn hình Liquid Retina 11 inch, hỗ trợ Apple Pencil Pro và Magic Keyboard.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '128GB', 'option_2' => 'Xanh Dương', 'price' => 16990000, 'compare_at_price' => 17990000, 'inventory_quantity' => 60],
                    ['option_1' => '256GB', 'option_2' => 'Tím',        'price' => 19990000, 'compare_at_price' => 20990000, 'inventory_quantity' => 40],
                ],
            ],
            [
                'title'       => 'Apple Watch Ultra 3',
                'description' => 'Apple Watch Ultra 3 với vỏ Titan, GPS + Cellular, chống nước 100m, pin 72 giờ sử dụng bình thường.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '49mm', 'option_2' => 'Dây Alpine Loop Cam', 'price' => 21990000, 'compare_at_price' => 23990000, 'inventory_quantity' => 35],
                    ['option_1' => '49mm', 'option_2' => 'Dây Ocean Band Đen',  'price' => 22990000, 'compare_at_price' => 24990000, 'inventory_quantity' => 25],
                ],
            ],
            [
                'title'       => 'Sony WH-1000XM6',
                'description' => 'Tai nghe chống ồn Sony WH-1000XM6 với driver 40mm, LDAC, pin 40 giờ, chống ồn thế hệ mới.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'Đen',  'price' => 8990000, 'compare_at_price' => 9990000, 'inventory_quantity' => 80],
                    ['option_1' => 'Bạc',  'price' => 8990000, 'compare_at_price' => 9990000, 'inventory_quantity' => 60],
                ],
            ],
            [
                'title'       => 'AirPods Pro 3',
                'description' => 'Apple AirPods Pro 3 với chip H3, chống ồn chủ động thích ứng, âm thanh không gian, chống nước IPX4.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'USB-C',      'price' => 6790000, 'compare_at_price' => 7290000, 'inventory_quantity' => 100],
                    ['option_1' => 'Lightning',  'price' => 5990000, 'compare_at_price' => 6790000, 'inventory_quantity' => 40],
                ],
            ],
            [
                'title'       => 'Dell XPS 16 9640',
                'description' => 'Laptop Dell XPS 16 với Intel Core Ultra 9, RTX 4070, màn hình OLED 4K+ cảm ứng, 32GB RAM.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '1TB SSD', 'option_2' => 'Platinum', 'price' => 62990000, 'compare_at_price' => 66990000, 'inventory_quantity' => 10],
                    ['option_1' => '2TB SSD', 'option_2' => 'Graphite', 'price' => 72990000, 'compare_at_price' => 76990000, 'inventory_quantity' => 8],
                ],
            ],
            [
                'title'       => 'Xiaomi 15 Ultra',
                'description' => 'Xiaomi 15 Ultra với Snapdragon 8 Elite, camera Leica 50MP, sạc nhanh 90W, pin 5500mAh.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '256GB', 'option_2' => 'Trắng',  'price' => 23990000, 'compare_at_price' => 25990000, 'inventory_quantity' => 55],
                    ['option_1' => '512GB', 'option_2' => 'Đen',    'price' => 27990000, 'compare_at_price' => 29990000, 'inventory_quantity' => 35],
                ],
            ],
            [
                'title'       => 'Google Pixel 9 Pro',
                'description' => 'Google Pixel 9 Pro với chip Tensor G4, camera AI 50MP, 7 năm cập nhật, Android thuần.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '256GB', 'option_2' => 'Obsidian',   'price' => 24990000, 'compare_at_price' => 26990000, 'inventory_quantity' => 40],
                    ['option_1' => '512GB', 'option_2' => 'Porcelain',  'price' => 29990000, 'compare_at_price' => 31990000, 'inventory_quantity' => 20],
                ],
            ],
            [
                'title'       => 'Nintendo Switch 2',
                'description' => 'Nintendo Switch 2 màn hình LCD 8 inch, Joy-Con từ tính, tương thích ngược với game Switch.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'Standard Edition',   'price' => 9990000,  'compare_at_price' => 10990000, 'inventory_quantity' => 70],
                    ['option_1' => 'Mario Kart Bundle',  'price' => 11990000, 'compare_at_price' => 12990000, 'inventory_quantity' => 50],
                ],
            ],
            [
                'title'       => 'Sony PlayStation 5 Pro',
                'description' => 'PS5 Pro với GPU nâng cấp, ray tracing nâng cao, SSD 2TB, hỗ trợ 8K và 120fps.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'Digital Edition',  'price' => 15990000, 'compare_at_price' => 16990000, 'inventory_quantity' => 30],
                    ['option_1' => 'Disc Edition',     'price' => 18990000, 'compare_at_price' => 19990000, 'inventory_quantity' => 25],
                ],
            ],
            [
                'title'       => 'Samsung Galaxy Tab S10 Ultra',
                'description' => 'Máy tính bảng Samsung Galaxy Tab S10 Ultra, Snapdragon 8 Gen 3, màn hình AMOLED 14.6 inch.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '256GB WiFi',         'option_2' => 'Graphite', 'price' => 28990000, 'compare_at_price' => 30990000, 'inventory_quantity' => 25],
                    ['option_1' => '512GB WiFi + 5G',    'option_2' => 'Beige',    'price' => 35990000, 'compare_at_price' => 37990000, 'inventory_quantity' => 15],
                ],
            ],
            [
                'title'       => 'Logitech MX Master 3S',
                'description' => 'Chuột không dây Logitech MX Master 3S, cảm biến 8000 DPI, sạc USB-C, kết nối 3 thiết bị.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'Graphite',      'price' => 2490000, 'compare_at_price' => 2790000, 'inventory_quantity' => 120],
                    ['option_1' => 'Pale Grey',     'price' => 2490000, 'compare_at_price' => 2790000, 'inventory_quantity' => 90],
                ],
            ],
            [
                'title'       => 'Keychron Q1 Max',
                'description' => 'Bàn phím cơ Keychron Q1 Max, kết nối 3 chế độ (Bluetooth/2.4GHz/USB-C), hot-swap, QMK/VIA.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'Gateron Jupiter Red',    'option_2' => 'Carbon Black', 'price' => 4990000, 'compare_at_price' => 5490000, 'inventory_quantity' => 45],
                    ['option_1' => 'Gateron Jupiter Brown',  'option_2' => 'Silver Grey',  'price' => 4990000, 'compare_at_price' => 5490000, 'inventory_quantity' => 35],
                ],
            ],
            [
                'title'       => 'LG UltraGear 27GP850-B',
                'description' => 'Màn hình gaming LG UltraGear 27 inch, Nano IPS, QHD 2K, 180Hz, 1ms, HDR400, G-Sync.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '27 inch QHD', 'price' => 9990000, 'compare_at_price' => 11990000, 'inventory_quantity' => 30],
                    ['option_1' => '32 inch QHD', 'price' => 12990000, 'compare_at_price' => 14990000, 'inventory_quantity' => 20],
                ],
            ],
            [
                'title'       => 'DJI Mini 4 Pro',
                'description' => 'Flycam DJI Mini 4 Pro, camera 4K HDR, cảm biến chống va chạm đa hướng, bay 34 phút.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => 'Standard',    'price' => 18990000, 'compare_at_price' => 20990000, 'inventory_quantity' => 20],
                    ['option_1' => 'Fly More Combo', 'price' => 24990000, 'compare_at_price' => 26990000, 'inventory_quantity' => 15],
                ],
            ],
            [
                'title'       => 'Samsung T7 Shield SSD',
                'description' => 'Ổ cứng di động Samsung T7 Shield, tốc độ đọc 1050MB/s, chống nước IP65, chống rơi 3m.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '1TB',  'option_2' => 'Đen',   'price' => 2690000, 'compare_at_price' => 3190000, 'inventory_quantity' => 100],
                    ['option_1' => '2TB',  'option_2' => 'Xanh',  'price' => 4990000, 'compare_at_price' => 5490000, 'inventory_quantity' => 60],
                ],
            ],
            [
                'title'       => 'Anker PowerCore 26800mAh',
                'description' => 'Pin sạc dự phòng Anker PowerCore 26800mAh, sạc nhanh PD 65W, 3 cổng USB-C, màn hình LED.',
                'status'      => 'published',
                'variants'    => [
                    ['option_1' => '26800mAh', 'option_2' => 'Đen',   'price' => 1290000, 'compare_at_price' => 1490000, 'inventory_quantity' => 150],
                    ['option_1' => '10000mAh', 'option_2' => 'Trắng', 'price' => 690000,  'compare_at_price' => 790000,  'inventory_quantity' => 200],
                ],
            ],
            [
                'title'       => 'GoPro Hero 13 Black',
                'description' => 'Camera hành trình GoPro Hero 13 Black, quay 5.3K 60fps, chống nước 10m, ổn định HyperSmooth 7.0.',
                'status'      => 'draft',
                'variants'    => [
                    ['option_1' => 'Standard',       'price' => 10990000, 'compare_at_price' => 12990000, 'inventory_quantity' => 25],
                    ['option_1' => 'Creator Edition', 'price' => 14990000, 'compare_at_price' => 16990000, 'inventory_quantity' => 10],
                ],
            ],
        ];

        foreach ($products as $productData) {
            $variants = $productData['variants'];
            unset($productData['variants']);

            $productData['slug'] = Str::slug($productData['title']);

            $product = Product::create($productData);

            foreach ($variants as $position => $variantData) {
                $variantData['position'] = $position + 1;
                $product->variants()->create($variantData);
            }
        }
    }
}
