<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'en' => ['name' => 'Fruits & Vegetables', 'title' => 'Fresh fruits and vegetables'],
                'fr' => ['name' => 'Fruits et Légumes', 'title' => 'Fruits et légumes frais'],
                'es' => ['name' => 'Frutas y Verduras', 'title' => 'Frutas y verduras frescas'],
                'ar' => ['name' => 'فواكه وخضروات', 'title' => 'فواكه وخضروات طازجة']
            ],
            [
                'en' => ['name' => 'Meat & Seafood', 'title' => 'Quality meat and seafood products'],
                'fr' => ['name' => 'Viande et Fruits de Mer', 'title' => 'Produits de viande et fruits de mer de qualité'],
                'es' => ['name' => 'Carne y Mariscos', 'title' => 'Productos de carne y mariscos de calidad'],
                'ar' => ['name' => 'لحوم ومأكولات بحرية', 'title' => 'منتجات اللحوم والمأكولات البحرية عالية الجودة']
            ],
            [
                'en' => ['name' => 'Dairy & Eggs', 'title' => 'Fresh dairy products and eggs'],
                'fr' => ['name' => 'Produits Laitiers et Œufs', 'title' => 'Produits laitiers frais et œufs'],
                'es' => ['name' => 'Lácteos y Huevos', 'title' => 'Productos lácteos y huevos frescos'],
                'ar' => ['name' => 'منتجات الألبان والبيض', 'title' => 'منتجات الألبان الطازجة والبيض']
            ],
            [
                'en' => ['name' => 'Beverages', 'title' => 'Refreshing drinks for every occasion'],
                'fr' => ['name' => 'Boissons', 'title' => 'Boissons rafraîchissantes pour toutes les occasions'],
                'es' => ['name' => 'Bebidas', 'title' => 'Bebidas refrescantes para cada ocasión'],
                'ar' => ['name' => 'مشروبات', 'title' => 'مشروبات منعشة لكل المناسبات']
            ],
            [
                'en' => ['name' => 'Snacks', 'title' => 'Delicious snacks for quick bites'],
                'fr' => ['name' => 'Collations', 'title' => 'Délicieuses collations pour une pause rapide'],
                'es' => ['name' => 'Snacks', 'title' => 'Deliciosos snacks para picar'],
                'ar' => ['name' => 'وجبات خفيفة', 'title' => 'وجبات خفيفة لذيذة للقضمات السريعة']
            ],
            [
                'en' => ['name' => 'Bakery', 'title' => 'Freshly baked goods daily'],
                'fr' => ['name' => 'Boulangerie', 'title' => 'Produits de boulangerie frais quotidiennement'],
                'es' => ['name' => 'Panadería', 'title' => 'Productos de panadería frescos diariamente'],
                'ar' => ['name' => 'مخبوزات', 'title' => 'منتجات مخبوزة طازجة يومياً']
            ],
            [
                'en' => ['name' => 'Pantry Staples', 'title' => 'Essential kitchen ingredients'],
                'fr' => ['name' => 'Articles de Base', 'title' => 'Ingrédients de cuisine essentiels'],
                'es' => ['name' => 'Productos Básicos', 'title' => 'Ingredientes esenciales de cocina'],
                'ar' => ['name' => 'أساسيات المخزن', 'title' => 'مكونات المطبخ الأساسية']
            ],
            [
                'en' => ['name' => 'Sauces & Condiments', 'title' => 'Flavor enhancers for your meals'],
                'fr' => ['name' => 'Sauces et Condiments', 'title' => 'Exhausteurs de goût pour vos repas'],
                'es' => ['name' => 'Salsas y Condimentos', 'title' => 'Potenciadores de sabor para tus comidas'],
                'ar' => ['name' => 'صلصات وتوابل', 'title' => 'معززات النكهة لوجباتك']
            ],
            [
                'en' => ['name' => 'Frozen Foods', 'title' => 'Quality frozen food items'],
                'fr' => ['name' => 'Surgelés', 'title' => 'Produits surgelés de qualité'],
                'es' => ['name' => 'Alimentos Congelados', 'title' => 'Productos congelados de calidad'],
                'ar' => ['name' => 'أطعمة مجمدة', 'title' => 'منتجات غذائية مجمدة عالية الجودة']
            ],
            [
                'en' => ['name' => 'Personal Care', 'title' => 'Health and beauty products'],
                'fr' => ['name' => 'Soins Personnels', 'title' => 'Produits de santé et beauté'],
                'es' => ['name' => 'Cuidado Personal', 'title' => 'Productos de salud y belleza'],
                'ar' => ['name' => 'العناية الشخصية', 'title' => 'منتجات الصحة والجمال']
            ]
        ];

        $data = [];
        foreach ($categories as $index => $category) {
            $data[] = [
                'id'   => $index + 1,
                'data' => json_encode([
                    'language' => $category,
                ]),
                'uuid'       => Str::uuid(),
                'image'      => 'category-' . ($index + 1) . '.png',
                'status'     => true,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()
            ];
        }

        Category::insert($data);
    }
}
