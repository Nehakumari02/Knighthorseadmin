<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            // Fruits & Vegetables (Category 1)
            [
                'category_id' => 1,
                'en'          => ['name' => 'Fresh Fruits', 'title' => 'Seasonal fresh fruits'],
                'fr'          => ['name' => 'Fruits Frais', 'title' => 'Fruits frais de saison'],
                'es'          => ['name' => 'Frutas Frescas', 'title' => 'Frutas frescas de temporada'],
                'ar'          => ['name' => 'فواكه طازجة', 'title' => 'فواكه طازجة موسمية']
            ],
            [
                'category_id' => 1,
                'en'          => ['name' => 'Fresh Vegetables', 'title' => 'Farm fresh vegetables'],
                'fr'          => ['name' => 'Légumes Frais', 'title' => 'Légumes frais de la ferme'],
                'es'          => ['name' => 'Verduras Frescas', 'title' => 'Verduras frescas de granja'],
                'ar'          => ['name' => 'خضروات طازجة', 'title' => 'خضروات طازجة من المزرعة']
            ],
            [
                'category_id' => 1,
                'en'          => ['name' => 'Herbs & Greens', 'title' => 'Fresh herbs and salad greens'],
                'fr'          => ['name' => 'Herbes et Verts', 'title' => 'Herbes fraîches et verdures à salade'],
                'es'          => ['name' => 'Hierbas y Hojas Verdes', 'title' => 'Hierbas frescas y hojas para ensalada'],
                'ar'          => ['name' => 'أعشاب وخضروات ورقية', 'title' => 'أعشاب طازجة وخضروات سلطة']
            ],

            // Meat & Seafood (Category 2)
            [
                'category_id' => 2,
                'en'          => ['name' => 'Fresh Meat', 'title' => 'Premium quality fresh meat'],
                'fr'          => ['name' => 'Viande Fraîche', 'title' => 'Viande fraîche de qualité supérieure'],
                'es'          => ['name' => 'Carne Fresca', 'title' => 'Carne fresca de primera calidad'],
                'ar'          => ['name' => 'لحوم طازجة', 'title' => 'لحوم طازجة عالية الجودة']
            ],
            [
                'category_id' => 2,
                'en'          => ['name' => 'Seafood', 'title' => 'Fresh seafood products'],
                'fr'          => ['name' => 'Fruits de Mer', 'title' => 'Produits de la mer frais'],
                'es'          => ['name' => 'Mariscos', 'title' => 'Productos del mar frescos'],
                'ar'          => ['name' => 'مأكولات بحرية', 'title' => 'منتجات بحرية طازجة']
            ],
            [
                'category_id' => 2,
                'en'          => ['name' => 'Processed Meat', 'title' => 'Quality processed meat products'],
                'fr'          => ['name' => 'Viande Transformée', 'title' => 'Produits carnés transformés de qualité'],
                'es'          => ['name' => 'Carne Procesada', 'title' => 'Productos cárnicos procesados de calidad'],
                'ar'          => ['name' => 'لحوم مصنعة', 'title' => 'منتجات اللحوم المصنعة عالية الجودة']
            ],

            // Dairy & Eggs (Category 3)
            [
                'category_id' => 3,
                'en'          => ['name' => 'Milk & Cream', 'title' => 'Fresh dairy milk and cream'],
                'fr'          => ['name' => 'Lait et Crème', 'title' => 'Lait frais et crème laitère'],
                'es'          => ['name' => 'Leche y Crema', 'title' => 'Leche fresca y crema de leche'],
                'ar'          => ['name' => 'حليب وقشدة', 'title' => 'حليب طازج وقشدة']
            ],
            [
                'category_id' => 3,
                'en'          => ['name' => 'Cheese', 'title' => 'Various cheese varieties'],
                'fr'          => ['name' => 'Fromage', 'title' => 'Différentes variétés de fromage'],
                'es'          => ['name' => 'Queso', 'title' => 'Diferentes variedades de queso'],
                'ar'          => ['name' => 'جبن', 'title' => 'مختلف أنواع الجبن']
            ],
            [
                'category_id' => 3,
                'en'          => ['name' => 'Eggs', 'title' => 'Farm fresh eggs'],
                'fr'          => ['name' => 'Œufs', 'title' => 'Œufs frais de la ferme'],
                'es'          => ['name' => 'Huevos', 'title' => 'Huevos frescos de granja'],
                'ar'          => ['name' => 'بيض', 'title' => 'بيض طازج من المزرعة']
            ],

            // Beverages (Category 4)
            [
                'category_id' => 4,
                'en'          => ['name' => 'Hot Drinks', 'title' => 'Coffee, tea and hot chocolate'],
                'fr'          => ['name' => 'Boissons Chaudes', 'title' => 'Café, thé et chocolat chaud'],
                'es'          => ['name' => 'Bebidas Calientes', 'title' => 'Café, té y chocolate caliente'],
                'ar'          => ['name' => 'مشروبات ساخنة', 'title' => 'قهوة، شاي وشوكولاتة ساخنة']
            ],
            [
                'category_id' => 4,
                'en'          => ['name' => 'Soft Drinks', 'title' => 'Carbonated and non-carbonated drinks'],
                'fr'          => ['name' => 'Boissons Gazeuses', 'title' => 'Boissons gazeuses et non gazeuses'],
                'es'          => ['name' => 'Refrescos', 'title' => 'Bebidas carbonatadas y no carbonatadas'],
                'ar'          => ['name' => 'مشروبات غازية', 'title' => 'مشروبات غازية وغير غازية']
            ],
            [
                'category_id' => 4,
                'en'          => ['name' => 'Juices & Smoothies', 'title' => 'Fresh and packaged juices'],
                'fr'          => ['name' => 'Jus et Smoothies', 'title' => 'Jus frais et emballés'],
                'es'          => ['name' => 'Jugos y Batidos', 'title' => 'Jugos frescos y envasados'],
                'ar'          => ['name' => 'عصائر وسموثيز', 'title' => 'عصائر طازجة ومعلبة']
            ],


            // Snacks (Category 5)
            [
                'category_id' => 5,
                'en'          => ['name' => 'Chips & Crisps', 'title' => 'Potato chips and snacks'],
                'fr'          => ['name' => 'Chips et Frites', 'title' => 'Chips de pommes de terre et snacks'],
                'es'          => ['name' => 'Papas Fritas y Snacks', 'title' => 'Patatas fritas y snacks'],
                'ar'          => ['name' => 'رقائق البطاطس والوجبات الخفيفة', 'title' => 'شيبس ووجبات خفيفة']
            ],
            [
                'category_id' => 5,
                'en'          => ['name' => 'Nuts & Seeds', 'title' => 'Healthy nuts and seeds'],
                'fr'          => ['name' => 'Noix et Graines', 'title' => 'Noix et graines saines'],
                'es'          => ['name' => 'Frutos Secos y Semillas', 'title' => 'Frutos secos y semillas saludables'],
                'ar'          => ['name' => 'مكسرات وبذور', 'title' => 'مكسرات وبذور صحية']
            ],
            [
                'category_id' => 5,
                'en'          => ['name' => 'Biscuits & Crackers', 'title' => 'Sweet and savory biscuits'],
                'fr'          => ['name' => 'Biscuits et Crackers', 'title' => 'Biscuits sucrés et salés'],
                'es'          => ['name' => 'Galletas y Crackers', 'title' => 'Galletas dulces y saladas'],
                'ar'          => ['name' => 'بسكويت وكراكرز', 'title' => 'بسكويت حلو ومالح']
            ],

            // Bakery (Category 6)
            [
                'category_id' => 6,
                'en'          => ['name' => 'Bread', 'title' => 'Freshly baked bread'],
                'fr'          => ['name' => 'Pain', 'title' => 'Pain frais cuit au four'],
                'es'          => ['name' => 'Pan', 'title' => 'Pan recién horneado'],
                'ar'          => ['name' => 'خبز', 'title' => 'خبز طازج']
            ],
            [
                'category_id' => 6,
                'en'          => ['name' => 'Pastries', 'title' => 'Delicious bakery pastries'],
                'fr'          => ['name' => 'Pâtisseries', 'title' => 'Délicieuses pâtisseries'],
                'es'          => ['name' => 'Pasteles', 'title' => 'Deliciosos pasteles de panadería'],
                'ar'          => ['name' => 'معجنات', 'title' => 'معجنات لذيذة']
            ],
            [
                'category_id' => 6,
                'en'          => ['name' => 'Cakes & Muffins', 'title' => 'Sweet cakes and muffins'],
                'fr'          => ['name' => 'Gâteaux et Muffins', 'title' => 'Gâteaux et muffins sucrés'],
                'es'          => ['name' => 'Pasteles y Muffins', 'title' => 'Pasteles y muffins dulces'],
                'ar'          => ['name' => 'كيك وكعك', 'title' => 'كيك وكعك حلو']
            ],
            // Pantry Staples (Category 7)
            [
                'category_id' => 7,
                'en'          => ['name' => 'Rice & Grains', 'title' => 'Various rice and grain types'],
                'fr'          => ['name' => 'Riz et Céréales', 'title' => 'Différents types de riz et céréales'],
                'es'          => ['name' => 'Arroz y Granos', 'title' => 'Diferentes tipos de arroz y granos'],
                'ar'          => ['name' => 'أرز وحبوب', 'title' => 'أنواع مختلفة من الأرز والحبوب']
            ],
            [
                'category_id' => 7,
                'en'          => ['name' => 'Pasta & Noodles', 'title' => 'Italian pasta and Asian noodles'],
                'fr'          => ['name' => 'Pâtes et Nouilles', 'title' => 'Pâtes italiennes et nouilles asiatiques'],
                'es'          => ['name' => 'Pasta y Fideos', 'title' => 'Pasta italiana y fideos asiáticos'],
                'ar'          => ['name' => 'معكرونة ونودلز', 'title' => 'معكرونة إيطالية ونودلز آسيوية']
            ],
            [
                'category_id' => 7,
                'en'          => ['name' => 'Flour & Baking Mixes', 'title' => 'Baking essentials and premixes'],
                'fr'          => ['name' => 'Farine et Préparations', 'title' => 'Essentiels de pâtisserie et préparations'],
                'es'          => ['name' => 'Harina y Mezclas', 'title' => 'Esenciales para hornear y mezclas'],
                'ar'          => ['name' => 'دقيق وخلطات خبز', 'title' => 'أساسيات الخبز والخلطات الجاهزة']
            ],

            // Sauces & Condiments (Category 8)
            [
                'category_id' => 8,
                'en'          => ['name' => 'Cooking Sauces', 'title' => 'Sauces for cooking and marinating'],
                'fr'          => ['name' => 'Sauces de Cuisine', 'title' => 'Sauces pour cuisiner et mariner'],
                'es'          => ['name' => 'Salsas para Cocinar', 'title' => 'Salsas para cocinar y marinar'],
                'ar'          => ['name' => 'صلصات الطبخ', 'title' => 'صلصات للطبخ والتتبيل']
            ],
            [
                'category_id' => 8,
                'en'          => ['name' => 'Dressings & Dips', 'title' => 'Salad dressings and dipping sauces'],
                'fr'          => ['name' => 'Vinaigrettes et Sauces', 'title' => 'Vinaigrettes et sauces à tremper'],
                'es'          => ['name' => 'Aderezos y Salsas', 'title' => 'Aderezos para ensaladas y salsas'],
                'ar'          => ['name' => 'صوصات وتغميسات', 'title' => 'صوصات السلطة والغموس']
            ],
            [
                'category_id' => 8,
                'en'          => ['name' => 'Pickles & Chutneys', 'title' => 'Pickled vegetables and fruit chutneys'],
                'fr'          => ['name' => 'Cornichons et Chutneys', 'title' => 'Légumes marinés et chutneys de fruits'],
                'es'          => ['name' => 'Encurtidos y Chutneys', 'title' => 'Vegetales encurtidos y chutneys de frutas'],
                'ar'          => ['name' => 'مخللات وتشاتني', 'title' => 'خضروات مخللة وتشاتني الفواكه']
            ],

            // Frozen Foods (Category 9)
            [
                'category_id' => 9,
                'en'          => ['name' => 'Frozen Vegetables', 'title' => 'Frozen vegetable mixes'],
                'fr'          => ['name' => 'Légumes Surgelés', 'title' => 'Mélanges de légumes surgelés'],
                'es'          => ['name' => 'Vegetales Congelados', 'title' => 'Mezclas de vegetales congelados'],
                'ar'          => ['name' => 'خضروات مجمدة', 'title' => 'مزيج من الخضروات المجمدة']
            ],
            [
                'category_id' => 9,
                'en'          => ['name' => 'Ice Cream & Desserts', 'title' => 'Frozen treats and desserts'],
                'fr'          => ['name' => 'Glaces et Desserts', 'title' => 'Desserts et douceurs glacées'],
                'es'          => ['name' => 'Helados y Postres', 'title' => 'Postres y golosinas congeladas'],
                'ar'          => ['name' => 'آيس كريم وحلويات', 'title' => 'حلويات ومثلجات مجمدة']
            ],
            [
                'category_id' => 9,
                'en'          => ['name' => 'Ready Meals', 'title' => 'Prepared frozen meals'],
                'fr'          => ['name' => 'Plats Préparés', 'title' => 'Plats préparés surgelés'],
                'es'          => ['name' => 'Comidas Preparadas', 'title' => 'Comidas preparadas congeladas'],
                'ar'          => ['name' => 'وجبات جاهزة', 'title' => 'وجبات مجهزة مجمدة']
            ],

            //Personal Care (Category 10)
            [
                'category_id' => 10,
                'en'          => ['name' => 'Skin Care', 'title' => 'Face and body care products'],
                'fr'          => ['name' => 'Soins de la Peau', 'title' => 'Produits de soins pour le visage et le corps'],
                'es'          => ['name' => 'Cuidado de la Piel', 'title' => 'Productos para el cuidado facial y corporal'],
                'ar'          => ['name' => 'العناية بالبشرة', 'title' => 'منتجات العناية بالوجه والجسم']
            ],
            [
                'category_id' => 10,
                'en'          => ['name' => 'Hair Care', 'title' => 'Shampoos, conditioners and treatments'],
                'fr'          => ['name' => 'Soins Capillaires', 'title' => 'Shampoings, après-shampoings et traitements'],
                'es'          => ['name' => 'Cuidado del Cabello', 'title' => 'Champús, acondicionadores y tratamientos'],
                'ar'          => ['name' => 'العناية بالشعر', 'title' => 'شامبو، بلسم وعلاجات']
            ],
            [
                'category_id' => 10,
                'en'          => ['name' => 'Oral Care', 'title' => 'Toothpaste, brushes and mouthwash'],
                'fr'          => ['name' => 'Hygiène Buccale', 'title' => 'Dentifrice, brosses et bain de bouche'],
                'es'          => ['name' => 'Cuidado Oral', 'title' => 'Pasta dental, cepillos y enjuague bucal'],
                'ar'          => ['name' => 'العناية بالفم', 'title' => 'معجون أسنان، فرش وغسول فم']
            ]

        ];

        $data = [];
        foreach ($subCategories as $index => $subCategory) {
                        $slug = Str::slug($subCategory['en']['name']); 

            $data[] = [
                'id'          => $index + 1,
                'category_id' => $subCategory['category_id'],
              'slug'        => $slug, 
                'data'        => json_encode([
                    'language' => [
                        'en' => $subCategory['en'],
                        'fr' => $subCategory['fr'],
                        'es' => $subCategory['es'],
                        'ar' => $subCategory['ar']
                    ],
                ]),
                'uuid'       => Str::uuid(),
                'image'      => 'subcategory-' . ($index + 1) . '.png',
                'status'     => true,
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now()
            ];
        }

        SubCategory::insert($data);
    }
}
