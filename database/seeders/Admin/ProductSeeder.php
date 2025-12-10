<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => [
                    'en' => 'Red Delicious Apple',
                    'fr' => 'Pomme Red Delicious',
                    'es' => 'Manzana Red Delicious',
                    'ar' => 'تفاح ريد ديلشوس'
                ],
                'description' => [
                    'en' => 'Crisp and sweet Red Delicious apples sourced from local orchards.',
                    'fr' => 'Pommes Red Delicious croquantes et sucrées provenant de vergers locaux.',
                    'es' => 'Manzanas Red Delicious crujientes et douces provenant de vergers locaux.',
                    'ar' => 'تفاح ريد ديلشوس مقرمش وحلو من بساتين محلية.'
                ],
                'meta_title' => [
                    'en' => 'Buy Red Delicious Apples Online | adMart',
                    'fr' => 'Acheter des pommes Red Delicious en ligne | adMart',
                    'es' => 'Comprar manzanas Red Delicious en línea | adMart',
                    'ar' => 'شراء تفاح ريد ديلشوس اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh, juicy Red Delicious apples for home delivery from adMart.',
                    'fr' => 'Commandez des pommes Red Delicious fraîches et juteuses pour la livraison à domicile auprès de adMart.',
                    'es' => 'Ordene manzanas Red Delicious frescas y jugosas para entrega a domicilio de adMart.',
                    'ar' => 'اطلب تفاح ريد ديلشوس الطازج والعصير للتوصيل إلى المنزل من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 3.50,
                'quantity'        => 0,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Organic Banana',
                    'fr' => 'Banane biologique',
                    'es' => 'Plátano orgánico',
                    'ar' => 'موز عضوي'
                ],
                'description' => [
                    'en' => 'Naturally ripened organic bananas, perfect for snacking and baking.',
                    'fr' => 'Bananes biologiques mûries naturellement, parfaites pour le grignotage et la pâtisserie.',
                    'es' => 'Plátanos orgánicos madurados naturalmente, perfectos para picar y hornear.',
                    'ar' => 'موز عضوي نضج بشكل طبيعي، مثالي للوجبات الخفيفة والخبز.'
                ],
                'meta_title' => [
                    'en' => 'Organic Bananas for Delivery | adMart',
                    'fr' => 'Bananes biologiques à livrer | adMart',
                    'es' => 'Plátanos orgánicos para entrega | adMart',
                    'ar' => 'موز عضوي للتوصيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Get fresh organic bananas delivered to your door from adMart.',
                    'fr' => 'Recevez des bananes biologiques fraîches livrées à votre porte par adMart.',
                    'es' => 'Reciba plátanos orgánicos frescos entregados en su puerta por adMart.',
                    'ar' => 'احصل على موز عضوي طازج يتم توصيله إلى باب منزلك من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 2.80,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Seedless Grapes',
                    'fr' => 'Raisins sans pépins',
                    'es' => 'Uvas sin semillas',
                    'ar' => 'عنب بدون بذور'
                ],
                'description' => [
                    'en' => 'Sweet and seedless green grapes, great for smoothies and salads.',
                    'fr' => 'Raisins verts sucrés et sans pépins, parfaits pour les smoothies et les salades.',
                    'es' => 'Uvas verdes dulces y sin semillas, ideales para batidos y ensaladas.',
                    'ar' => 'عنب أخضر حلو وخالي من البذور، رائع للعصائر والسلطات.'
                ],
                'meta_title' => [
                    'en' => 'Seedless Green Grapes Online | adMart',
                    'fr' => 'Raisins verts sans pépins en ligne | adMart',
                    'es' => 'Uvas verdes sin semillas en línea | adMart',
                    'ar' => 'عنب أخضر بدون بذور اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh seedless grapes delivered fast by adMart.',
                    'fr' => 'Raisins sans pépins frais livrés rapidement par adMart.',
                    'es' => 'Uvas sin semillas frescas entregadas rápidamente por adMart.',
                    'ar' => 'عنب بدون بذور طازج يتم توصيله بسرعة من قبل adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 4.20,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Tahiti Lime',
                    'fr' => 'Citron vert de Tahiti',
                    'es' => 'Lima de Tahití',
                    'ar' => 'ليمون تاهيتي'
                ],
                'description' => [
                    'en' => 'Zesty Tahiti limes, ideal for cooking and beverages.',
                    'fr' => 'Citrons verts de Tahiti piquants, idéaux pour la cuisine et les boissons.',
                    'es' => 'Limones de Tahití picantes, ideales para cocinar y bebidas.',
                    'ar' => 'ليمون تاهيتي لاذع، مثالي للطبخ والمشروبات.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Tahiti Limes | adMart Delivery',
                    'fr' => 'Citrons verts de Tahiti frais | Livraison adMart',
                    'es' => 'Limones de Tahití frescos | Entrega adMart',
                    'ar' => 'ليمون تاهيتي طازج | توصيل adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh Tahiti limes online with home delivery.',
                    'fr' => 'Achetez des citrons verts de Tahiti frais en ligne avec livraison à domicile.',
                    'es' => 'Compre limones de Tahití frescos en línea con entrega a domicilio.',
                    'ar' => 'اشترِ ليمون تاهيتي طازج اونلاين مع التوصيل إلى المنزل.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 1.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Manila Mango',
                    'fr' => 'Mangue de Manille',
                    'es' => 'Mango de Manila',
                    'ar' => 'مانجو مانيلا'
                ],
                'description' => [
                    'en' => 'Juicy, aromatic Manila mangoes in peak season.',
                    'fr' => 'Mangues de Manille juteuses et aromatiques en pleine saison.',
                    'es' => 'Mangos de Manila jugosos y aromáticos en temporada alta.',
                    'ar' => 'مانجو مانيلا العصير والعطري في ذروة الموسم.'
                ],
                'meta_title' => [
                    'en' => 'Manila Mangoes Online | adMart',
                    'fr' => 'Mangues de Manille en ligne | adMart',
                    'es' => 'Mangos de Manila en línea | adMart',
                    'ar' => 'مانجو مانيلا اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Sweet Manila mangoes delivered from farm to table.',
                    'fr' => 'Mangues de Manille sucrées livrées directement de la ferme à votre table.',
                    'es' => 'Mangos de Manila dulces entregados directamente de la granja a la mesa.',
                    'ar' => 'مانجو مانيلا الحلوة يتم توصيلها من المزرعة إلى المائدة.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 6.00,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Red Seedless Watermelon Slice',
                    'fr' => 'Tranche de pastèque rouge sans pépins',
                    'es' => 'Rebanada de sandía roja sin semillas',
                    'ar' => 'شريحة بطيخ أحمر بدون بذور'
                ],
                'description' => [
                    'en' => 'Freshly cut red seedless watermelon - perfect for summer.',
                    'fr' => 'Pastèque rouge sans pépins fraîchement coupée - parfaite pour l\'été.',
                    'es' => 'Sandía roja sin semillas recién cortada - perfecta para el verano.',
                    'ar' => 'بطيخ أحمر بدون بذور مقطوع طازج - مثالي لفصل الصيف.'
                ],
                'meta_title' => [
                    'en' => 'Watermelon Slices Delivery | adMart',
                    'fr' => 'Livraison de tranches de pastèque | adMart',
                    'es' => 'Entrega de rebanadas de sandía | adMart',
                    'ar' => 'توصيل شرائح البطيخ | adMart'
                ],
                'meta_description' => [
                    'en' => 'Refreshing seedless watermelon slices delivered by adMart.',
                    'fr' => 'Tranches de pastèque sans pépins rafraîchissantes livrées par adMart.',
                    'es' => 'Rebanadas refrescantes de sandía sin semillas entregadas por adMart.',
                    'ar' => 'شرائح بطيخ منعشة بدون بذور يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 2.00,
                'quantity'        => 1,
                'unit'            => 'slice'
            ],
            [
                'name' => [
                    'en' => 'Kiwi Fruit',
                    'fr' => 'Kiwi',
                    'es' => 'Kiwi',
                    'ar' => 'فاكهة الكيوي'
                ],
                'description' => [
                    'en' => 'Tangy and sweet kiwis high in vitamin C.',
                    'fr' => 'Kiwis acidulés et sucrés riches en vitamine C.',
                    'es' => 'Kiwis ácidos y dulces ricos en vitamina C.',
                    'ar' => 'كيوي لاذع وحلو غني بفيتامين سي.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Kiwis Online | adMart',
                    'fr' => 'Kiwis frais en ligne | adMart',
                    'es' => 'Kiwis frescos en línea | adMart',
                    'ar' => 'كيوي طازج اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh kiwis delivered quickly by adMart.',
                    'fr' => 'Commandez des kiwis frais livrés rapidement par adMart.',
                    'es' => 'Ordene kiwis frescos entregados rápidamente por adMart.',
                    'ar' => 'اطلب كيوي طازج يتم توصيله بسرعة من قبل adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 5.00,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Pineapple',
                    'fr' => 'Ananas',
                    'es' => 'Piña',
                    'ar' => 'أناناس'
                ],
                'description' => [
                    'en' => 'Ripe tropical pineapples, full of flavor.',
                    'fr' => 'Ananas tropicaux mûrs, pleins de saveur.',
                    'es' => 'Piñas tropicales maduras, llenas de sabor.',
                    'ar' => 'أناناس استوائي ناضج، مليء بالنكهة.'
                ],
                'meta_title' => [
                    'en' => 'Tropical Pineapples for Delivery | adMart',
                    'fr' => 'Ananas tropicaux à livrer | adMart',
                    'es' => 'Piñas tropicales para entrega | adMart',
                    'ar' => 'أناناس استوائي للتوصيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Sweet pineapples delivered fresh by adMart.',
                    'fr' => 'Ananas sucrés livrés frais par adMart.',
                    'es' => 'Piñas dulces entregadas frescas por adMart.',
                    'ar' => 'أناناس حلو يتم توصيله طازجًا من قبل adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 3.25,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Blueberry Punnet',
                    'fr' => 'Barquette de myrtilles',
                    'es' => 'Caja de arándanos',
                    'ar' => 'علبة توت أزرق'
                ],
                'description' => [
                    'en' => 'Fresh blueberries, perfect for baking and snacking.',
                    'fr' => 'Myrtilles fraîches, parfaites pour la pâtisserie et le grignotage.',
                    'es' => 'Arándanos frescos, perfectos para hornear y picar.',
                    'ar' => 'توت أزرق طازج، مثالي للخبز والوجبات الخفيفة.'
                ],
                'meta_title' => [
                    'en' => 'Buy Blueberries Online | adMart',
                    'fr' => 'Acheter des myrtilles en ligne | adMart',
                    'es' => 'Comprar arándanos en línea | adMart',
                    'ar' => 'شراء توت أزرق اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh punnets of blueberries delivered by adMart.',
                    'fr' => 'Barquettes de myrtilles fraîches livrées par adMart.',
                    'es' => 'Cajas de arándanos frescos entregadas por adMart.',
                    'ar' => 'علب توت أزرق طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 4.75,
                'quantity'        => 125,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pomegranate',
                    'fr' => 'Grenade',
                    'es' => 'Granada',
                    'ar' => 'رمان'
                ],
                'description' => [
                    'en' => 'Juicy pomegranates packed with antioxidants.',
                    'fr' => 'Grenades juteuses riches en antioxydants.',
                    'es' => 'Granadas jugosas llenas de antioxidantes.',
                    'ar' => 'رمان عصيري مليء بمضادات الأكسدة.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Pomegranates | adMart',
                    'fr' => 'Grenades fraîches | adMart',
                    'es' => 'Granadas frescas | adMart',
                    'ar' => 'رمان طازج | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order antioxidant-rich pomegranates online from adMart.',
                    'fr' => 'Commandez des grenades riches en antioxydants en ligne auprès de adMart.',
                    'es' => 'Ordene granadas ricas en antioxidantes en línea de adMart.',
                    'ar' => 'اطلب رمان غني بمضادات الأكسدة اونلاين من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 1,
                'price'           => 5.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],

            //10-20


            [
                'name' => [
                    'en' => 'Baby Carrot',
                    'fr' => 'Mini carotte',
                    'es' => 'Zanahoria bebé',
                    'ar' => 'جزر صغير'
                ],
                'description' => [
                    'en' => 'Crunchy baby carrots, perfect for salads and snacks.',
                    'fr' => 'Mini carottes croquantes, parfaites pour les salades et les collations.',
                    'es' => 'Zanahorias bebé crujientes, perfectas para ensaladas y snacks.',
                    'ar' => 'جزر صغير مقرمش، مثالي للسلطات والوجبات الخفيفة.'
                ],
                'meta_title' => [
                    'en' => 'Baby Carrots Online | adMart',
                    'fr' => 'Mini carottes en ligne | adMart',
                    'es' => 'Zanahorias bebé en línea | adMart',
                    'ar' => 'جزر صغير اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh baby carrots delivered to your door.',
                    'fr' => 'Mini carottes fraîches livrées à votre porte.',
                    'es' => 'Zanahorias bebé frescas entregadas en su puerta.',
                    'ar' => 'جزر صغير طازج يتم توصيله إلى باب منزلك.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 2.20,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Spinach Leaves',
                    'fr' => 'Feuilles d\'épinard',
                    'es' => 'Hojas de espinaca',
                    'ar' => 'أوراق سبانخ'
                ],
                'description' => [
                    'en' => 'Fresh green spinach, rich in iron and vitamins.',
                    'fr' => 'Épinards frais riches en fer et vitamines.',
                    'es' => 'Espinacas frescas ricas en hierro y vitaminas.',
                    'ar' => 'سبانخ طازج غني بالحديد والفيتامينات.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Spinach Leaves | adMart',
                    'fr' => 'Feuilles d\'épinard fraîches | adMart',
                    'es' => 'Hojas de espinaca frescas | adMart',
                    'ar' => 'أوراق سبانخ طازجة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh spinach online for healthy meals.',
                    'fr' => 'Achetez des épinards frais en ligne pour des repas sains.',
                    'es' => 'Compre espinacas frescas en línea para comidas saludables.',
                    'ar' => 'اشترِ سبانخ طازج اونلاين لوجبات صحية.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 1.80,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Broccoli Florets',
                    'fr' => 'Fleurs de brocoli',
                    'es' => 'Floretes de brócoli',
                    'ar' => 'زهور البروكلي'
                ],
                'description' => [
                    'en' => 'Nutritious broccoli florets, ready to cook.',
                    'fr' => 'Fleurs de brocoli nutritives, prêtes à cuire.',
                    'es' => 'Floretes de brócoli nutritivos, listos para cocinar.',
                    'ar' => 'زهور بروكلي مغذية، جاهزة للطبخ.'
                ],
                'meta_title' => [
                    'en' => 'Broccoli Florets Delivery | adMart',
                    'fr' => 'Livraison de fleurs de brocoli | adMart',
                    'es' => 'Entrega de floretes de brócoli | adMart',
                    'ar' => 'توصيل زهور البروكلي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh broccoli florets delivered by adMart.',
                    'fr' => 'Fleurs de brocoli fraîches livrées par adMart.',
                    'es' => 'Floretes de brócoli frescos entregados por adMart.',
                    'ar' => 'زهور بروكلي طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 3.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Red Bell Pepper',
                    'fr' => 'Poivron rouge',
                    'es' => 'Pimiento rojo',
                    'ar' => 'فلفل أحمر'
                ],
                'description' => [
                    'en' => 'Sweet red bell peppers, ideal for stir-fries.',
                    'fr' => 'Poivrons rouges sucrés, idéaux pour les sautés.',
                    'es' => 'Pimientos rojos dulces, ideales para salteados.',
                    'ar' => 'فلفل أحمر حلو، مثالي للقلي السريع.'
                ],
                'meta_title' => [
                    'en' => 'Red Bell Peppers Online | adMart',
                    'fr' => 'Poivrons rouges en ligne | adMart',
                    'es' => 'Pimientos rojos en línea | adMart',
                    'ar' => 'فلفل أحمر اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order crisp red bell peppers from adMart.',
                    'fr' => 'Commandez des poivrons rouges croquants chez adMart.',
                    'es' => 'Ordene pimientos rojos crujientes de adMart.',
                    'ar' => 'اطلب فلفل أحمر مقرمش من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 2.75,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Potato (Russet)',
                    'fr' => 'Pomme de terre (Russet)',
                    'es' => 'Papa (Russet)',
                    'ar' => 'بطاطس (روستيت)'
                ],
                'description' => [
                    'en' => 'Starchy russet potatoes, great for baking and mashing.',
                    'fr' => 'Pommes de terre Russet riches en amidon, parfaites pour la cuisson au four et la purée.',
                    'es' => 'Papas Russet con almidón, excelentes para hornear y hacer puré.',
                    'ar' => 'بطاطس روستيت نشوية، رائعة للخبز والهرس.'
                ],
                'meta_title' => [
                    'en' => 'Russet Potatoes Delivery | adMart',
                    'fr' => 'Livraison de pommes de terre Russet | adMart',
                    'es' => 'Entrega de papas Russet | adMart',
                    'ar' => 'توصيل بطاطس روستيت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy russet potatoes online with fast delivery.',
                    'fr' => 'Achetez des pommes de terre Russet en ligne avec livraison rapide.',
                    'es' => 'Compre papas Russet en línea con entrega rápida.',
                    'ar' => 'اشترِ بطاطس روستيت اونلاين مع توصيل سريع.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 1.50,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Tomatoes (Vine)',
                    'fr' => 'Tomates (sur vigne)',
                    'es' => 'Tomates (en rama)',
                    'ar' => 'طماطم (على الكرمة)'
                ],
                'description' => [
                    'en' => 'Juicy vine tomatoes, perfect for salads and sauces.',
                    'fr' => 'Tomates sur vigne juteuses, parfaites pour les salades et les sauces.',
                    'es' => 'Tomates en rama jugosas, perfectas para ensaladas y salsas.',
                    'ar' => 'طماطم على الكرمة عصيرية، مثالية للسلطات والصلصات.'
                ],
                'meta_title' => [
                    'en' => 'Vine Tomatoes Online | adMart',
                    'fr' => 'Tomates sur vigne en ligne | adMart',
                    'es' => 'Tomates en rama en línea | adMart',
                    'ar' => 'طماطم على الكرمة اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh vine tomatoes delivered by adMart.',
                    'fr' => 'Tomates sur vigne fraîches livrées par adMart.',
                    'es' => 'Tomates en rama frescas entregadas por adMart.',
                    'ar' => 'طماطم على الكرمة طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 2.30,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Cucumber',
                    'fr' => 'Concombre',
                    'es' => 'Pepino',
                    'ar' => 'خيار'
                ],
                'description' => [
                    'en' => 'Crisp cucumbers, great for salads and sandwiches.',
                    'fr' => 'Concombres croquants, parfaits pour les salades et les sandwichs.',
                    'es' => 'Pepinos crujientes, ideales para ensaladas y sándwiches.',
                    'ar' => 'خيار مقرمش، رائع للسلطات والشطائر.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Cucumbers Online | adMart',
                    'fr' => 'Concombres frais en ligne | adMart',
                    'es' => 'Pepinos frescos en línea | adMart',
                    'ar' => 'خيار طازج اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh cucumbers from adMart.',
                    'fr' => 'Commandez des concombres frais chez adMart.',
                    'es' => 'Ordene pepinos frescos de adMart.',
                    'ar' => 'اطلب خيار طازج من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 1.20,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Eggplant (Japanese)',
                    'fr' => 'Aubergine japonaise',
                    'es' => 'Berenjena japonesa',
                    'ar' => 'باذنجان ياباني'
                ],
                'description' => [
                    'en' => 'Tender Japanese eggplants, ideal for grilling.',
                    'fr' => 'Aubergines japonaises tendres, idéales pour le grill.',
                    'es' => 'Berenjenas japonesas tiernas, ideales para asar.',
                    'ar' => 'باذنجان ياباني طري، مثالي للشوي.'
                ],
                'meta_title' => [
                    'en' => 'Japanese Eggplants Delivery | adMart',
                    'fr' => 'Livraison d\'aubergines japonaises | adMart',
                    'es' => 'Entrega de berenjenas japonesas | adMart',
                    'ar' => 'توصيل باذنجان ياباني | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh Japanese eggplants delivered by adMart.',
                    'fr' => 'Aubergines japonaises fraîches livrées par adMart.',
                    'es' => 'Berenjenas japonesas frescas entregadas por adMart.',
                    'ar' => 'باذنجان ياباني طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 3.40,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Green Beans',
                    'fr' => 'Haricots verts',
                    'es' => 'Judías verdes',
                    'ar' => 'فاصوليا خضراء'
                ],
                'description' => [
                    'en' => 'Fresh green beans, perfect steamed or sautéed.',
                    'fr' => 'Haricots verts frais, parfaits cuits à la vapeur ou sautés.',
                    'es' => 'Judías verdes frescas, perfectas al vapor o salteadas.',
                    'ar' => 'فاصوليا خضراء طازجة، مثالية للطهي على البخار أو القلي السريع.'
                ],
                'meta_title' => [
                    'en' => 'Green Beans Online | adMart',
                    'fr' => 'Haricots verts en ligne | adMart',
                    'es' => 'Judías verdes en línea | adMart',
                    'ar' => 'فاصوليا خضراء اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh green beans delivered by adMart.',
                    'fr' => 'Achetez des haricots verts frais livrés par adMart.',
                    'es' => 'Compre judías verdes frescas entregadas por adMart.',
                    'ar' => 'اشترِ فاصوليا خضراء طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 2.60,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Mixed Lettuce Pack',
                    'fr' => 'Mélange de laitues',
                    'es' => 'Paquete de lechuga mixta',
                    'ar' => 'خليط خس'
                ],
                'description' => [
                    'en' => 'Assorted lettuce leaves for salads and wraps.',
                    'fr' => 'Mélange de feuilles de laitue pour salades et wraps.',
                    'es' => 'Hojas de lechuga variadas para ensaladas y wraps.',
                    'ar' => 'خليط من أوراق الخس للسلطات واللفائف.'
                ],
                'meta_title' => [
                    'en' => 'Lettuce Mix Online | adMart',
                    'fr' => 'Mélange de laitues en ligne | adMart',
                    'es' => 'Mezcla de lechuga en línea | adMart',
                    'ar' => 'خليط خس اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh mixed lettuce delivered by adMart.',
                    'fr' => 'Mélange de laitues fraîches livré par adMart.',
                    'es' => 'Mezcla de lechuga fresca entregada por adMart.',
                    'ar' => 'خليط خس طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 2,
                'price'           => 3.20,
                'quantity'        => 200,
                'unit'            => 'g'
            ],

            //20-30

            [
                'name' => [
                    'en' => 'Fresh Coriander Leaves',
                    'fr' => 'Feuilles de coriandre fraîches',
                    'es' => 'Hojas de cilantro frescas',
                    'ar' => 'أوراق كزبرة طازجة'
                ],
                'description' => [
                    'en' => 'Fragrant coriander leaves, perfect for garnishing and flavor.',
                    'fr' => 'Feuilles de coriandre parfumées, parfaites pour la garniture et l\'aromatisation.',
                    'es' => 'Hojas de cilantro fragantes, perfectas para decorar y sazonar.',
                    'ar' => 'أوراق كزبرة عطرية، مثالية للتزيين والنكهة.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Coriander Leaves Online | adMart',
                    'fr' => 'Feuilles de coriandre fraîches en ligne | adMart',
                    'es' => 'Hojas de cilantro frescas en línea | adMart',
                    'ar' => 'أوراق كزبرة طازجة اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh coriander leaves for your recipes from adMart.',
                    'fr' => 'Commandez des feuilles de coriandre fraîches pour vos recettes chez adMart.',
                    'es' => 'Ordene hojas de cilantro frescas para sus recetas de adMart.',
                    'ar' => 'اطلب أوراق كزبرة طازجة لوصفاتك من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 1.90,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Organic Mint Leaves',
                    'fr' => 'Feuilles de menthe bio',
                    'es' => 'Hojas de menta orgánica',
                    'ar' => 'أوراق نعناع عضوي'
                ],
                'description' => [
                    'en' => 'Cool and refreshing mint leaves for beverages and dishes.',
                    'fr' => 'Feuilles de menthe fraîches et rafraîchissantes pour boissons et plats.',
                    'es' => 'Hojas de menta frescas y refrescantes para bebidas y platos.',
                    'ar' => 'أوراق نعناع منعشة وباردة للمشروبات والأطباق.'
                ],
                'meta_title' => [
                    'en' => 'Organic Mint Leaves | adMart Delivery',
                    'fr' => 'Feuilles de menthe bio | Livraison adMart',
                    'es' => 'Hojas de menta orgánica | Entrega adMart',
                    'ar' => 'أوراق نعناع عضوي | توصيل adMart'
                ],
                'meta_description' => [
                    'en' => 'Get organic mint leaves delivered fresh by adMart.',
                    'fr' => 'Recevez des feuilles de menthe bio fraîches livrées par adMart.',
                    'es' => 'Obtenga hojas de menta orgánica frescas entregadas por adMart.',
                    'ar' => 'احصل على أوراق نعناع عضوي طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 2.50,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Basil Leaves',
                    'fr' => 'Feuilles de basilic',
                    'es' => 'Hojas de albahaca',
                    'ar' => 'أوراق ريحان'
                ],
                'description' => [
                    'en' => 'Sweet basil leaves, ideal for pesto and Italian cooking.',
                    'fr' => 'Feuilles de basilic doux, idéales pour le pesto et la cuisine italienne.',
                    'es' => 'Hojas de albahaca dulce, ideales para pesto y cocina italiana.',
                    'ar' => 'أوراق ريحان حلوة، مثالية للبيستو والمطبخ الإيطالي.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Basil Leaves | adMart',
                    'fr' => 'Feuilles de basilic fraîches | adMart',
                    'es' => 'Hojas de albahaca frescas | adMart',
                    'ar' => 'أوراق ريحان طازجة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh basil leaves for your gourmet dishes online.',
                    'fr' => 'Achetez des feuilles de basilic fraîches pour vos plats gastronomiques en ligne.',
                    'es' => 'Compre hojas de albahaca frescas para sus platos gourmet en línea.',
                    'ar' => 'اشترِ أوراق ريحان طازجة لأطباقك الفاخرة اونلاين.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 3.20,
                'quantity'        => 50,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Dill Weed',
                    'fr' => 'Aneth',
                    'es' => 'Eneldo',
                    'ar' => 'شبت'
                ],
                'description' => [
                    'en' => 'Delicate dill weed, perfect for pickling and seafood.',
                    'fr' => 'Aneth délicat, parfait pour les conserves et les fruits de mer.',
                    'es' => 'Eneldo delicado, perfecto para encurtidos y mariscos.',
                    'ar' => 'شبت رقيق، مثالي للتخليل والمأكولات البحرية.'
                ],
                'meta_title' => [
                    'en' => 'Dill Weed Online | adMart',
                    'fr' => 'Aneth en ligne | adMart',
                    'es' => 'Eneldo en línea | adMart',
                    'ar' => 'شبت اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh dill weed delivered by adMart.',
                    'fr' => 'Commandez de l\'aneth frais livré par adMart.',
                    'es' => 'Ordene eneldo fresco entregado por adMart.',
                    'ar' => 'اطلب شبت طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 2.10,
                'quantity'        => 30,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Parsley (Curly)',
                    'fr' => 'Persil frisé',
                    'es' => 'Perejil rizado',
                    'ar' => 'بقدونس مجعد'
                ],
                'description' => [
                    'en' => 'Vibrant curly parsley, great for garnishing.',
                    'fr' => 'Persil frisé vibrant, parfait pour la garniture.',
                    'es' => 'Perejil rizado vibrante, ideal para decorar.',
                    'ar' => 'بقدونس مجعد نابض بالحياة، رائع للتزيين.'
                ],
                'meta_title' => [
                    'en' => 'Curly Parsley Delivery | adMart',
                    'fr' => 'Livraison de persil frisé | adMart',
                    'es' => 'Entrega de perejil rizado | adMart',
                    'ar' => 'توصيل بقدونس مجعد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh curly parsley for your dishes, delivered by adMart.',
                    'fr' => 'Persil frisé frais pour vos plats, livré par adMart.',
                    'es' => 'Perejil rizado fresco para sus platos, entregado por adMart.',
                    'ar' => 'بقدونس مجعد طازج لأطباقك، يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 1.80,
                'quantity'        => 50,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Rosemary Sprigs',
                    'fr' => 'Branches de romarin',
                    'es' => 'Ramas de romero',
                    'ar' => 'أغصان إكليل الجبل'
                ],
                'description' => [
                    'en' => 'Woody rosemary sprigs for roasting meats and vegetables.',
                    'fr' => 'Branches de romarin boisées pour rôtir viandes et légumes.',
                    'es' => 'Ramas de romero leñosas para asar carnes y verduras.',
                    'ar' => 'أغصان إكليل الجبل الخشبية لتحميص اللحوم والخضروات.'
                ],
                'meta_title' => [
                    'en' => 'Rosemary Sprigs Online | adMart',
                    'fr' => 'Branches de romarin en ligne | adMart',
                    'es' => 'Ramas de romero en línea | adMart',
                    'ar' => 'أغصان إكليل الجبل اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy rosemary sprigs for flavorful cooking from adMart.',
                    'fr' => 'Achetez des branches de romarin pour une cuisine savoureuse chez adMart.',
                    'es' => 'Compre ramas de romero para cocinar con sabor de adMart.',
                    'ar' => 'اشترِ أغصان إكليل الجبل للطهي اللذيذ من adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 2.75,
                'quantity'        => 40,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Thyme Leaves',
                    'fr' => 'Feuilles de thym',
                    'es' => 'Hojas de tomillo',
                    'ar' => 'أوراق زعتر'
                ],
                'description' => [
                    'en' => 'Earthy thyme leaves, ideal for stews and marinades.',
                    'fr' => 'Feuilles de thym terreuses, idéales pour les ragoûts et marinades.',
                    'es' => 'Hojas de tomillo terrosas, ideales para guisos y adobos.',
                    'ar' => 'أوراق زعتر ترابية، مثالية لليخنات والتتبيلات.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Thyme Leaves | adMart',
                    'fr' => 'Feuilles de thym fraîches | adMart',
                    'es' => 'Hojas de tomillo frescas | adMart',
                    'ar' => 'أوراق زعتر طازجة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order thyme leaves online for your culinary needs.',
                    'fr' => 'Commandez des feuilles de thym en ligne pour vos besoins culinaires.',
                    'es' => 'Ordene hojas de tomillo en línea para sus necesidades culinarias.',
                    'ar' => 'اطلب أوراق زعتر اونلاين لاحتياجاتك الطهي.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 2.60,
                'quantity'        => 30,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chives',
                    'fr' => 'Ciboulette',
                    'es' => 'Cebollino',
                    'ar' => 'الثوم المعمر'
                ],
                'description' => [
                    'en' => 'Mild onion-flavored chives for garnishing and flavoring.',
                    'fr' => 'Ciboulette à saveur d\'oignon doux pour garniture et assaisonnement.',
                    'es' => 'Cebollino con sabor suave a cebolla para decorar y sazonar.',
                    'ar' => 'ثوم معمر بنكهة البصل الخفيفة للتزيين والتتبيل.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Chives Online | adMart',
                    'fr' => 'Ciboulette fraîche en ligne | adMart',
                    'es' => 'Cebollino fresco en línea | adMart',
                    'ar' => 'ثوم معمر طازج اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Get fresh chives delivered by adMart.',
                    'fr' => 'Recevez de la ciboulette fraîche livrée par adMart.',
                    'es' => 'Obtenga cebollino fresco entregado por adMart.',
                    'ar' => 'احصل على ثوم معمر طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 2.00,
                'quantity'        => 25,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Lemongrass',
                    'fr' => 'Citronnelle',
                    'es' => 'Hierba de limón',
                    'ar' => 'ليمون جراس'
                ],
                'description' => [
                    'en' => 'Aromatic lemongrass stalks for soups and teas.',
                    'fr' => 'Tiges de citronnelle aromatiques pour soupes et thés.',
                    'es' => 'Tallos de hierba de limón aromáticos para sopas y tés.',
                    'ar' => 'سيقان ليمون جراس عطرية للحساء والشاي.'
                ],
                'meta_title' => [
                    'en' => 'Lemongrass Delivery | adMart',
                    'fr' => 'Livraison de citronnelle | adMart',
                    'es' => 'Entrega de hierba de limón | adMart',
                    'ar' => 'توصيل ليمون جراس | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh lemongrass delivered by adMart for your recipes.',
                    'fr' => 'Citronnelle fraîche livrée par adMart pour vos recettes.',
                    'es' => 'Hierba de limón fresca entregada por adMart para sus recetas.',
                    'ar' => 'ليمون جراس طازج يتم توصيله بواسطة adMart لوصفاتك.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 1.70,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Curry Leaves',
                    'fr' => 'Feuilles de curry',
                    'es' => 'Hojas de curry',
                    'ar' => 'أوراق الكاري'
                ],
                'description' => [
                    'en' => 'Fragrant curry leaves for authentic South Asian dishes.',
                    'fr' => 'Feuilles de curry parfumées pour des plats sud-asiatiques authentiques.',
                    'es' => 'Hojas de curry fragantes para platos auténticos del sur de Asia.',
                    'ar' => 'أوراق كاري عطرية لأطباق جنوب آسيا الأصيلة.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Curry Leaves | adMart',
                    'fr' => 'Feuilles de curry fraîches | adMart',
                    'es' => 'Hojas de curry frescas | adMart',
                    'ar' => 'أوراق كاري طازجة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh curry leaves delivered by adMart.',
                    'fr' => 'Commandez des feuilles de curry fraîches livrées par adMart.',
                    'es' => 'Ordene hojas de curry frescas entregadas por adMart.',
                    'ar' => 'اطلب أوراق كاري طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 1,
                'sub_category_id' => 3,
                'price'           => 2.25,
                'quantity'        => 30,
                'unit'            => 'g'
            ],
            //30-40

            [
                'name' => [
                    'en' => 'Boneless Chicken Breast',
                    'fr' => 'Poitrine de poulet désossée',
                    'es' => 'Pechuga de pollo sin hueso',
                    'ar' => 'صدر دجاج منزوع العظم'
                ],
                'description' => [
                    'en' => 'Lean boneless chicken breasts, perfect for grilling and baking.',
                    'fr' => 'Poitrines de poulet désossées maigres, parfaites pour le grill et la cuisson au four.',
                    'es' => 'Pechugas de pollo sin hueso magras, perfectas para asar y hornear.',
                    'ar' => 'صدور دجاج خالية من العظم والدهون، مثالية للشوي والخبز.'
                ],
                'meta_title' => [
                    'en' => 'Boneless Chicken Breast Online | adMart',
                    'fr' => 'Poitrine de poulet désossée en ligne | adMart',
                    'es' => 'Pechuga de pollo sin hueso en línea | adMart',
                    'ar' => 'صدر دجاج منزوع العظم اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh boneless chicken breasts delivered to your door.',
                    'fr' => 'Poitrines de poulet désossées fraîches livrées à votre porte.',
                    'es' => 'Pechugas de pollo sin hueso frescas entregadas en su puerta.',
                    'ar' => 'صدور دجاج طازجة منزوعة العظم يتم توصيلها إلى باب منزلك.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 6.50,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Beef Sirloin Steak',
                    'fr' => 'Steak de surlonge de bœuf',
                    'es' => 'Filete de solomillo de res',
                    'ar' => 'ستيك لحم البقر سيرلون'
                ],
                'description' => [
                    'en' => 'Premium grade beef sirloin steak, tender and flavorful.',
                    'fr' => 'Steak de surlonge de bœuf de qualité supérieure, tendre et savoureux.',
                    'es' => 'Filete de solomillo de res de primera calidad, tierno y sabroso.',
                    'ar' => 'ستيك لحم بقري درجة أولى من منطقة السيرلون، طري ومليء بالنكهة.'
                ],
                'meta_title' => [
                    'en' => 'Beef Sirloin Steak Online | adMart',
                    'fr' => 'Steak de surlonge de bœuf en ligne | adMart',
                    'es' => 'Filete de solomillo de res en línea | adMart',
                    'ar' => 'ستيك لحم البقر سيرلون اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order top-quality beef sirloin steaks from adMart.',
                    'fr' => 'Commandez des steaks de surlonge de bœuf de première qualité chez adMart.',
                    'es' => 'Ordene filetes de solomillo de res de primera calidad de adMart.',
                    'ar' => 'اطلب ستيك لحم بقري سيرلون عالي الجودة من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 12.00,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Pork Tenderloin',
                    'fr' => 'Filet de porc',
                    'es' => 'Lomo de cerdo',
                    'ar' => 'فيليه لحم الخنزير'
                ],
                'description' => [
                    'en' => 'Lean pork tenderloin, ideal for roasting and stir-fry.',
                    'fr' => 'Filet de porc maigre, idéal pour rôtir et sauter.',
                    'es' => 'Lomo de cerdo magro, ideal para asar y saltear.',
                    'ar' => 'فيليه لحم خنزير خالي من الدهون، مثالي للتحمير والقلي السريع.'
                ],
                'meta_title' => [
                    'en' => 'Pork Tenderloin Delivery | adMart',
                    'fr' => 'Livraison de filet de porc | adMart',
                    'es' => 'Entrega de lomo de cerdo | adMart',
                    'ar' => 'توصيل فيليه لحم الخنزير | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh pork tenderloin delivered by adMart.',
                    'fr' => 'Filet de porc frais livré par adMart.',
                    'es' => 'Lomo de cerdo fresco entregado por adMart.',
                    'ar' => 'فيليه لحم خنزير طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 8.75,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Mutton Chops',
                    'fr' => 'Côtelettes de mouton',
                    'es' => 'Chuletas de cordero',
                    'ar' => 'قطع لحم الضأن'
                ],
                'description' => [
                    'en' => 'Premium mutton chops, rich and succulent.',
                    'fr' => 'Côtelettes de mouton premium, riches et succulentes.',
                    'es' => 'Chuletas de cordero premium, ricas y suculentas.',
                    'ar' => 'قطع لحم ضأن ممتازة، غنية وعصيرية.'
                ],
                'meta_title' => [
                    'en' => 'Mutton Chops Online | adMart',
                    'fr' => 'Côtelettes de mouton en ligne | adMart',
                    'es' => 'Chuletas de cordero en línea | adMart',
                    'ar' => 'قطع لحم الضأن اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh mutton chops for delivery from adMart.',
                    'fr' => 'Commandez des côtelettes de mouton fraîches pour livraison chez adMart.',
                    'es' => 'Ordene chuletas de cordero frescas para entrega de adMart.',
                    'ar' => 'اطلب قطع لحم ضأن طازجة للتوصيل من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 10.50,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Chicken Drumsticks',
                    'fr' => 'Pilons de poulet',
                    'es' => 'Muslos de pollo',
                    'ar' => 'أفخاذ دجاج'
                ],
                'description' => [
                    'en' => 'Juicy chicken drumsticks, perfect for baking and frying.',
                    'fr' => 'Pilons de poulet juteux, parfaits pour la cuisson au four et la friture.',
                    'es' => 'Muslos de pollo jugosos, perfectos para hornear y freír.',
                    'ar' => 'أفخاذ دجاج عصيرية، مثالية للخبز والقلي.'
                ],
                'meta_title' => [
                    'en' => 'Chicken Drumsticks Delivery | adMart',
                    'fr' => 'Livraison de pilons de poulet | adMart',
                    'es' => 'Entrega de muslos de pollo | adMart',
                    'ar' => 'توصيل أفخاذ دجاج | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh chicken drumsticks online from adMart.',
                    'fr' => 'Achetez des pilons de poulet frais en ligne chez adMart.',
                    'es' => 'Compre muslos de pollo frescos en línea de adMart.',
                    'ar' => 'اشترِ أفخاذ دجاج طازجة اونلاين من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 5.20,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Ground Turkey',
                    'fr' => 'Dinde hachée',
                    'es' => 'Pavo molido',
                    'ar' => 'لحم ديك رومي مفروم'
                ],
                'description' => [
                    'en' => 'Lean ground turkey meat, versatile for many recipes.',
                    'fr' => 'Viande de dinde hachée maigre, polyvalente pour de nombreuses recettes.',
                    'es' => 'Carne de pavo molida magra, versátil para muchas recetas.',
                    'ar' => 'لحم ديك رومي مفروم قليل الدهون، متعدد الاستخدامات للعديد من الوصفات.'
                ],
                'meta_title' => [
                    'en' => 'Ground Turkey Online | adMart',
                    'fr' => 'Dinde hachée en ligne | adMart',
                    'es' => 'Pavo molido en línea | adMart',
                    'ar' => 'لحم ديك رومي مفروم اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Healthy ground turkey delivered fresh by adMart.',
                    'fr' => 'Dinde hachée saine livrée fraîche par adMart.',
                    'es' => 'Pavo molido saludable entregado fresco por adMart.',
                    'ar' => 'لحم ديك رومي مفروم صحي يتم توصيله طازجًا بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 7.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Lamb Mince',
                    'fr' => 'Viande d\'agneau hachée',
                    'es' => 'Carne de cordero molida',
                    'ar' => 'لحم ضأن مفروم'
                ],
                'description' => [
                    'en' => 'Rich lamb mince, great for kebabs and burgers.',
                    'fr' => 'Viande d\'agneau hachée riche, parfaite pour les brochettes et les hamburgers.',
                    'es' => 'Carne de cordero molida rica, ideal para kebabs y hamburguesas.',
                    'ar' => 'لحم ضأن مفروم غني، رائع للكباب والبرغر.'
                ],
                'meta_title' => [
                    'en' => 'Lamb Mince Delivery | adMart',
                    'fr' => 'Livraison de viande d\'agneau hachée | adMart',
                    'es' => 'Entrega de carne de cordero molida | adMart',
                    'ar' => 'توصيل لحم ضأن مفروم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh lamb mince delivered by adMart for your meals.',
                    'fr' => 'Viande d\'agneau hachée fraîche livrée par adMart pour vos repas.',
                    'es' => 'Carne de cordero molida fresca entregada por adMart para sus comidas.',
                    'ar' => 'لحم ضأن مفروم طازج يتم توصيله بواسطة adMart لوجباتك.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 11.25,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chicken Wings',
                    'fr' => 'Ailes de poulet',
                    'es' => 'Alitas de pollo',
                    'ar' => 'أجنحة دجاج'
                ],
                'description' => [
                    'en' => 'Flavorful chicken wings, perfect for grilling and frying.',
                    'fr' => 'Ailes de poulet savoureuses, parfaites pour le grill et la friture.',
                    'es' => 'Alitas de pollo sabrosas, perfectas para asar y freír.',
                    'ar' => 'أجنحة دجاج لذيذة، مثالية للشوي والقلي.'
                ],
                'meta_title' => [
                    'en' => 'Chicken Wings Online | adMart',
                    'fr' => 'Ailes de poulet en ligne | adMart',
                    'es' => 'Alitas de pollo en línea | adMart',
                    'ar' => 'أجنحة دجاج اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh chicken wings delivered by adMart.',
                    'fr' => 'Commandez des ailes de poulet fraîches livrées par adMart.',
                    'es' => 'Ordene alitas de pollo frescas entregadas por adMart.',
                    'ar' => 'اطلب أجنحة دجاج طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 4.80,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Pork Belly Slices',
                    'fr' => 'Tranches de poitrine de porc',
                    'es' => 'Lonchas de panceta de cerdo',
                    'ar' => 'شرائح بطن الخنزير'
                ],
                'description' => [
                    'en' => 'Succulent pork belly slices, great for roasting and BBQ.',
                    'fr' => 'Tranches de poitrine de porc succulentes, parfaites pour rôtir et BBQ.',
                    'es' => 'Lonchas de panceta de cerdo suculentas, ideales para asar y barbacoa.',
                    'ar' => 'شرائح بطن خنزير عصيرية، رائعة للتحمير والشواء.'
                ],
                'meta_title' => [
                    'en' => 'Pork Belly Slices | adMart Delivery',
                    'fr' => 'Tranches de poitrine de porc | Livraison adMart',
                    'es' => 'Lonchas de panceta de cerdo | Entrega adMart',
                    'ar' => 'شرائح بطن الخنزير | توصيل adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh pork belly slices delivered by adMart.',
                    'fr' => 'Tranches de poitrine de porc fraîches livrées par adMart.',
                    'es' => 'Lonchas de panceta de cerdo frescas entregadas por adMart.',
                    'ar' => 'شرائح بطن خنزير طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 9.00,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Duck Breast Fillet',
                    'fr' => 'Filet de canard',
                    'es' => 'Filete de pechuga de pato',
                    'ar' => 'فيليه صدر البط'
                ],
                'description' => [
                    'en' => 'Tender duck breast fillets, ideal for gourmet dishes.',
                    'fr' => 'Filets de canard tendres, idéaux pour les plats gastronomiques.',
                    'es' => 'Filetes de pechuga de pato tiernos, ideales para platos gourmet.',
                    'ar' => 'شرائح صدر بط طرية، مثالية للأطباق الفاخرة.'
                ],
                'meta_title' => [
                    'en' => 'Duck Breast Fillet Online | adMart',
                    'fr' => 'Filet de canard en ligne | adMart',
                    'es' => 'Filete de pechuga de pato en línea | adMart',
                    'ar' => 'فيليه صدر البط اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium duck breast fillets delivered by adMart.',
                    'fr' => 'Filets de canard premium livrés par adMart.',
                    'es' => 'Filetes de pechuga de pato premium entregados por adMart.',
                    'ar' => 'شرائح صدر بط ممتازة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 4,
                'price'           => 14.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            //40-50

            [
                'name' => [
                    'en' => 'Fresh Atlantic Salmon Fillet',
                    'fr' => 'Filet de saumon atlantique frais',
                    'es' => 'Filete de salmón atlántico fresco',
                    'ar' => 'فيليه سلمون الأطلنطي الطازج'
                ],
                'description' => [
                    'en' => 'Premium Atlantic salmon fillets, rich in omega-3.',
                    'fr' => 'Filets de saumon atlantique premium, riches en oméga-3.',
                    'es' => 'Filetes de salmón atlántico premium, ricos en omega-3.',
                    'ar' => 'شرائح سلمون أطلنطي ممتازة، غنية بأوميجا 3.'
                ],
                'meta_title' => [
                    'en' => 'Atlantic Salmon Fillet | adMart',
                    'fr' => 'Filet de saumon atlantique | adMart',
                    'es' => 'Filete de salmón atlántico | adMart',
                    'ar' => 'فيليه سلمون الأطلنطي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh Atlantic salmon fillets delivered by adMart.',
                    'fr' => 'Commandez des filets de saumon atlantique frais livrés par adMart.',
                    'es' => 'Ordene filetes de salmón atlántico fresco entregados por adMart.',
                    'ar' => 'اطلب شرائح سلمون أطلنطي طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 15.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Wild-Caught Shrimp',
                    'fr' => 'Crevettes sauvages',
                    'es' => 'Camarones silvestres',
                    'ar' => 'جمبري صيد طبيعي'
                ],
                'description' => [
                    'en' => 'Deveined wild-caught shrimp, perfect for grilling.',
                    'fr' => 'Crevettes sauvages éveinées, parfaites pour le grill.',
                    'es' => 'Camarones silvestres desvenados, perfectos para asar.',
                    'ar' => 'جمبري صيد طبيعي منزوع العرق، مثالي للشوي.'
                ],
                'meta_title' => [
                    'en' => 'Wild-Caught Shrimp Online | adMart',
                    'fr' => 'Crevettes sauvages en ligne | adMart',
                    'es' => 'Camarones silvestres en línea | adMart',
                    'ar' => 'جمبري صيد طبيعي اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh wild-caught shrimp delivered by adMart.',
                    'fr' => 'Crevettes sauvages fraîches livrées par adMart.',
                    'es' => 'Camarones silvestres frescos entregados por adMart.',
                    'ar' => 'جمبري صيد طبيعي طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 12.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Whole Tilapia',
                    'fr' => 'Tilapia entier',
                    'es' => 'Tilapia entera',
                    'ar' => 'بلطي كامل'
                ],
                'description' => [
                    'en' => 'Fresh whole tilapia, ideal for baking and frying.',
                    'fr' => 'Tilapia entier frais, idéal pour la cuisson au four et la friture.',
                    'es' => 'Tilapia entera fresca, ideal para hornear y freír.',
                    'ar' => 'سمك بلطي كامل طازج، مثالي للخبز والقلي.'
                ],
                'meta_title' => [
                    'en' => 'Whole Tilapia Delivery | adMart',
                    'fr' => 'Livraison de tilapia entier | adMart',
                    'es' => 'Entrega de tilapia entera | adMart',
                    'ar' => 'توصيل بلطي كامل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh whole tilapia online from adMart.',
                    'fr' => 'Achetez du tilapia entier frais en ligne chez adMart.',
                    'es' => 'Compre tilapia entera fresca en línea de adMart.',
                    'ar' => 'اشترِ سمك بلطي كامل طازج اونلاين من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 6.80,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Scallops (U/10)',
                    'fr' => 'Coquilles Saint-Jacques (U/10)',
                    'es' => 'Vieiras (U/10)',
                    'ar' => 'أسقلوب (U/10)'
                ],
                'description' => [
                    'en' => 'Large sea scallops, quick-sear ready.',
                    'fr' => 'Grosses coquilles Saint-Jacques, prêtes à saisir rapidement.',
                    'es' => 'Vieiras grandes listas para sellar rápidamente.',
                    'ar' => 'أسقلوب بحري كبير، جاهز للشوي السريع.'
                ],
                'meta_title' => [
                    'en' => 'Sea Scallops Online | adMart',
                    'fr' => 'Coquilles Saint-Jacques en ligne | adMart',
                    'es' => 'Vieiras en línea | adMart',
                    'ar' => 'أسقلوب بحري اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh sea scallops delivered by adMart.',
                    'fr' => 'Coquilles Saint-Jacques fraîches livrées par adMart.',
                    'es' => 'Vieiras frescas entregadas por adMart.',
                    'ar' => 'أسقلوب بحري طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 18.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Calamari Rings',
                    'fr' => 'Anneaux de calmar',
                    'es' => 'Aros de calamar',
                    'ar' => 'حلقات كالاماري'
                ],
                'description' => [
                    'en' => 'Tender calamari rings, ready for frying.',
                    'fr' => 'Anneaux de calmar tendres, prêts à frire.',
                    'es' => 'Aros de calamar tiernos, listos para freír.',
                    'ar' => 'حلقات كالاماري طرية، جاهزة للقلي.'
                ],
                'meta_title' => [
                    'en' => 'Calamari Rings Online | adMart',
                    'fr' => 'Anneaux de calmar en ligne | adMart',
                    'es' => 'Aros de calamar en línea | adMart',
                    'ar' => 'حلقات كالاماري اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh calamari rings delivered by adMart.',
                    'fr' => 'Anneaux de calmar frais livrés par adMart.',
                    'es' => 'Aros de calamar frescos entregados por adMart.',
                    'ar' => 'حلقات كالاماري طازجة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 11.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Mussels in Shell',
                    'fr' => 'Moules en coquille',
                    'es' => 'Mejillones en concha',
                    'ar' => 'بلح البحر بالقشرة'
                ],
                'description' => [
                    'en' => 'Fresh mussels, ideal for steaming.',
                    'fr' => 'Moules fraîches, idéales pour la cuisson à la vapeur.',
                    'es' => 'Mejillones frescos, ideales para cocer al vapor.',
                    'ar' => 'بلح البحر الطازج، مثالي للطهي على البخار.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Mussels Online | adMart',
                    'fr' => 'Moules fraîches en ligne | adMart',
                    'es' => 'Mejillones frescos en línea | adMart',
                    'ar' => 'بلح البحر الطازج اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh mussels delivered by adMart.',
                    'fr' => 'Commandez des moules fraîches livrées par adMart.',
                    'es' => 'Ordene mejillones frescos entregados por adMart.',
                    'ar' => 'اطلب بلح البحر الطازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 7.20,
                'quantity'        => 1,
                'unit'            => 'kg'
            ],
            [
                'name' => [
                    'en' => 'Smoked Mackerel',
                    'fr' => 'Maquereau fumé',
                    'es' => 'Caballa ahumada',
                    'ar' => 'ماكريل مدخن'
                ],
                'description' => [
                    'en' => 'Smoky-flavored mackerel fillets in brine.',
                    'fr' => 'Filets de maquereau fumé en saumure.',
                    'es' => 'Filetes de caballa ahumada en salmuera.',
                    'ar' => 'شرائح ماكريل مدخن بنكهة دخانية في محلول ملحي.'
                ],
                'meta_title' => [
                    'en' => 'Smoked Mackerel Delivery | adMart',
                    'fr' => 'Livraison de maquereau fumé | adMart',
                    'es' => 'Entrega de caballa ahumada | adMart',
                    'ar' => 'توصيل ماكريل مدخن | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy smoked mackerel fillets online from adMart.',
                    'fr' => 'Achetez des filets de maquereau fumé en ligne chez adMart.',
                    'es' => 'Compre filetes de caballa ahumada en línea de adMart.',
                    'ar' => 'اشترِ شرائح ماكريل مدخن اونلاين من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 9.50,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Octopus Tentacles',
                    'fr' => 'Tentacules de poulpe',
                    'es' => 'Tentáculos de pulpo',
                    'ar' => 'مخالب أخطبوط'
                ],
                'description' => [
                    'en' => 'Cooked octopus tentacles, ready to heat.',
                    'fr' => 'Tentacules de poulpe cuits, prêts à réchauffer.',
                    'es' => 'Tentáculos de pulpo cocidos, listos para calentar.',
                    'ar' => 'مخالب أخطبوط مطبوخة، جاهزة للتسخين.'
                ],
                'meta_title' => [
                    'en' => 'Octopus Tentacles | adMart',
                    'fr' => 'Tentacules de poulpe | adMart',
                    'es' => 'Tentáculos de pulpo | adMart',
                    'ar' => 'مخالب أخطبوط | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order cooked octopus tentacles delivered by adMart.',
                    'fr' => 'Commandez des tentacules de poulpe cuits livrés par adMart.',
                    'es' => 'Ordene tentáculos de pulpo cocidos entregados por adMart.',
                    'ar' => 'اطلب مخالب أخطبوط مطبوخة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 20.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Crab Meat (Canned)',
                    'fr' => 'Chair de crabe (en conserve)',
                    'es' => 'Carne de cangrejo (enlatada)',
                    'ar' => 'لحم سرطان البحر (معلب)'
                ],
                'description' => [
                    'en' => 'Premium canned crab meat, ready to use.',
                    'fr' => 'Chair de crabe en conserve premium, prête à l\'emploi.',
                    'es' => 'Carne de cangrejo enlatada premium, lista para usar.',
                    'ar' => 'لحم سرطان البحر المعلب الممتاز، جاهز للاستخدام.'
                ],
                'meta_title' => [
                    'en' => 'Canned Crab Meat Online | adMart',
                    'fr' => 'Chair de crabe en conserve en ligne | adMart',
                    'es' => 'Carne de cangrejo enlatada en línea | adMart',
                    'ar' => 'لحم سرطان البحر المعلب اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy premium canned crab meat from adMart.',
                    'fr' => 'Achetez de la chair de crabe en conserve premium chez adMart.',
                    'es' => 'Compre carne de cangrejo enlatada premium de adMart.',
                    'ar' => 'اشترِ لحم سرطان البحر المعلب الممتاز من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 8.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Smoked Salmon Slices',
                    'fr' => 'Tranches de saumon fumé',
                    'es' => 'Lonchas de salmón ahumado',
                    'ar' => 'شرائح سلمون مدخن'
                ],
                'description' => [
                    'en' => 'Thinly sliced smoked salmon, ideal for brunch.',
                    'fr' => 'Saumon fumé finement tranché, idéal pour le brunch.',
                    'es' => 'Salmón ahumado en lonchas finas, ideal para brunch.',
                    'ar' => 'شرائح رقيقة من السلمون المدخن، مثالية لوجبة البرانش.'
                ],
                'meta_title' => [
                    'en' => 'Smoked Salmon Online | adMart',
                    'fr' => 'Saumon fumé en ligne | adMart',
                    'es' => 'Salmón ahumado en línea | adMart',
                    'ar' => 'سلمون مدخن اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order thinly sliced smoked salmon delivered by adMart.',
                    'fr' => 'Commandez du saumon fumé finement tranché livré par adMart.',
                    'es' => 'Ordene salmón ahumado en lonchas finas entregado por adMart.',
                    'ar' => 'اطلب شرائح سلمون مدخن رقيقة يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 5,
                'price'           => 14.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            //50-60

            [
                'name' => [
                    'en' => 'Beef Salami',
                    'fr' => 'Salami de bœuf',
                    'es' => 'Salami de res',
                    'ar' => 'سلامي لحم بقري'
                ],
                'description' => [
                    'en' => 'Spicy beef salami, perfect for sandwiches.',
                    'fr' => 'Salami de bœuf épicé, parfait pour les sandwichs.',
                    'es' => 'Salami de res picante, perfecto para sándwiches.',
                    'ar' => 'سلامي لحم بقري حار، مثالي للسندويشات.'
                ],
                'meta_title' => [
                    'en' => 'Beef Salami Online | adMart',
                    'fr' => 'Salami de bœuf en ligne | adMart',
                    'es' => 'Salami de res en línea | adMart',
                    'ar' => 'سلامي لحم بقري اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order spicy beef salami delivered by adMart.',
                    'fr' => 'Commandez du salami de bœuf épicé livré par adMart.',
                    'es' => 'Ordene salami de res picante entregado por adMart.',
                    'ar' => 'اطلب سلامي لحم بقري حار يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 7.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chicken Ham',
                    'fr' => 'Jambon de poulet',
                    'es' => 'Jamón de pollo',
                    'ar' => 'لحم دجاج مدخن'
                ],
                'description' => [
                    'en' => 'Lean chicken ham slices for salads.',
                    'fr' => 'Tranches de jambon de poulet maigre pour salades.',
                    'es' => 'Lonchas de jamón de pollo magro para ensaladas.',
                    'ar' => 'شرائح لحم دجاج مدخن قليل الدهن للسلطات.'
                ],
                'meta_title' => [
                    'en' => 'Chicken Ham Delivery | adMart',
                    'fr' => 'Livraison de jambon de poulet | adMart',
                    'es' => 'Entrega de jamón de pollo | adMart',
                    'ar' => 'توصيل لحم دجاج مدخن | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy lean chicken ham online from adMart.',
                    'fr' => 'Achetez du jambon de poulet maigre en ligne chez adMart.',
                    'es' => 'Compre jamón de pollo magro en línea de adMart.',
                    'ar' => 'اشترِ لحم دجاج مدخن قليل الدهن اونلاين من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 5.80,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Smoked Turkey Breast',
                    'fr' => 'Poitrine de dinde fumée',
                    'es' => 'Pechuga de pavo ahumada',
                    'ar' => 'صدر ديك رومي مدخن'
                ],
                'description' => [
                    'en' => 'Savory smoked turkey breast, ready to serve.',
                    'fr' => 'Poitrine de dinde fumée savoureuse, prête à servir.',
                    'es' => 'Pechuga de pavo ahumada sabrosa, lista para servir.',
                    'ar' => 'صدر ديك رومي مدخن لذيذ، جاهز للتقديم.'
                ],
                'meta_title' => [
                    'en' => 'Smoked Turkey Breast | adMart',
                    'fr' => 'Poitrine de dinde fumée | adMart',
                    'es' => 'Pechuga de pavo ahumada | adMart',
                    'ar' => 'صدر ديك رومي مدخن | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fresh smoked turkey breast delivered by adMart.',
                    'fr' => 'Poitrine de dinde fumée fraîche livrée par adMart.',
                    'es' => 'Pechuga de pavo ahumada fresca entregada por adMart.',
                    'ar' => 'صدر ديك رومي مدخن طازج يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 9.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pork Sausages',
                    'fr' => 'Saucisses de porc',
                    'es' => 'Salchichas de cerdo',
                    'ar' => 'سجق لحم خنزير'
                ],
                'description' => [
                    'en' => 'Juicy pork sausages, great for grilling.',
                    'fr' => 'Saucisses de porc juteuses, parfaites pour le grill.',
                    'es' => 'Salchichas de cerdo jugosas, ideales para asar.',
                    'ar' => 'سجق لحم خنزير عصيري، رائع للشوي.'
                ],
                'meta_title' => [
                    'en' => 'Pork Sausages Online | adMart',
                    'fr' => 'Saucisses de porc en ligne | adMart',
                    'es' => 'Salchichas de cerdo en línea | adMart',
                    'ar' => 'سجق لحم خنزير اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order juicy pork sausages delivered by adMart.',
                    'fr' => 'Commandez des saucisses de porc juteuses livrées par adMart.',
                    'es' => 'Ordene salchichas de cerdo jugosas entregadas por adMart.',
                    'ar' => 'اطلب سجق لحم خنزير عصيري يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 6.20,
                'quantity'        => 1,
                'unit'            => 'pack'
            ],
            [
                'name' => [
                    'en' => 'Beef Pepperoni',
                    'fr' => 'Pepperoni de bœuf',
                    'es' => 'Pepperoni de res',
                    'ar' => 'بيبروني لحم بقري'
                ],
                'description' => [
                    'en' => 'Spicy beef pepperoni slices for pizzas.',
                    'fr' => 'Tranches de pepperoni de bœuf épicé pour pizzas.',
                    'es' => 'Lonchas de pepperoni de res picante para pizzas.',
                    'ar' => 'شرائح بيبروني لحم بقري حار للبيتزا.'
                ],
                'meta_title' => [
                    'en' => 'Beef Pepperoni Delivery | adMart',
                    'fr' => 'Livraison de pepperoni de bœuf | adMart',
                    'es' => 'Entrega de pepperoni de res | adMart',
                    'ar' => 'توصيل بيبروني لحم بقري | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy spicy beef pepperoni from adMart.',
                    'fr' => 'Achetez du pepperoni de bœuf épicé chez adMart.',
                    'es' => 'Compre pepperoni de res picante de adMart.',
                    'ar' => 'اشترِ بيبروني لحم بقري حار من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 8.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chicken Bologna',
                    'fr' => 'Bologne de poulet',
                    'es' => 'Mortadela de pollo',
                    'ar' => 'بولونيا دجاج'
                ],
                'description' => [
                    'en' => 'Soft chicken bologna slices, great in sandwiches.',
                    'fr' => 'Tranches de bologne de poulet tendres, parfaites pour les sandwichs.',
                    'es' => 'Lonchas de mortadela de pollo suaves, ideales para sándwiches.',
                    'ar' => 'شرائح بولونيا دجاج طرية، رائعة في السندويشات.'
                ],
                'meta_title' => [
                    'en' => 'Chicken Bologna Online | adMart',
                    'fr' => 'Bologne de poulet en ligne | adMart',
                    'es' => 'Mortadela de pollo en línea | adMart',
                    'ar' => 'بولونيا دجاج اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order chicken bologna slices delivered by adMart.',
                    'fr' => 'Commandez des tranches de bologne de poulet livrées par adMart.',
                    'es' => 'Ordene lonchas de mortadela de pollo entregadas por adMart.',
                    'ar' => 'اطلب شرائح بولونيا دجاج يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 5.30,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Smoked Chorizo',
                    'fr' => 'Chorizo fumé',
                    'es' => 'Chorizo ahumado',
                    'ar' => 'تشوريزو مدخن'
                ],
                'description' => [
                    'en' => 'Spicy smoked chorizo, ideal for tapas.',
                    'fr' => 'Chorizo fumé épicé, idéal pour les tapas.',
                    'es' => 'Chorizo ahumado picante, ideal para tapas.',
                    'ar' => 'تشوريزو مدخن حار، مثالي للتاباس.'
                ],
                'meta_title' => [
                    'en' => 'Smoked Chorizo Online | adMart',
                    'fr' => 'Chorizo fumé en ligne | adMart',
                    'es' => 'Chorizo ahumado en línea | adMart',
                    'ar' => 'تشوريزو مدخن اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy spicy smoked chorizo from adMart.',
                    'fr' => 'Achetez du chorizo fumé épicé chez adMart.',
                    'es' => 'Compre chorizo ahumado picante de adMart.',
                    'ar' => 'اشترِ تشوريزو مدخن حار من adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 9.75,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Duck Rillettes',
                    'fr' => 'Rillettes de canard',
                    'es' => 'Rillettes de pato',
                    'ar' => 'ريت البط'
                ],
                'description' => [
                    'en' => 'Creamy duck rillettes, perfect for spreading.',
                    'fr' => 'Rillettes de canard crémeuses, parfaites à tartiner.',
                    'es' => 'Rillettes de pato cremosas, perfectas para untar.',
                    'ar' => 'ريت البط الكريمي، مثالي للدهن.'
                ],
                'meta_title' => [
                    'en' => 'Duck Rillettes | adMart',
                    'fr' => 'Rillettes de canard | adMart',
                    'es' => 'Rillettes de pato | adMart',
                    'ar' => 'ريت البط | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order creamy duck rillettes delivered by adMart.',
                    'fr' => 'Commandez des rillettes de canard crémeuses livrées par adMart.',
                    'es' => 'Ordene rillettes de pato cremosas entregadas por adMart.',
                    'ar' => 'اطلب ريت البط الكريمي يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 12.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Bacon Strips',
                    'fr' => 'Lardons fumés',
                    'es' => 'Tiras de tocino',
                    'ar' => 'شرائح بيكون'
                ],
                'description' => [
                    'en' => 'Streaky bacon strips, ideal for breakfast.',
                    'fr' => 'Lardons fumés striés, idéaux pour le petit-déjeuner.',
                    'es' => 'Tiras de tocino veteadas, ideales para el desayuno.',
                    'ar' => 'شرائح بيكون مخططة، مثالية للإفطار.'
                ],
                'meta_title' => [
                    'en' => 'Bacon Strips Online | adMart',
                    'fr' => 'Lardons fumés en ligne | adMart',
                    'es' => 'Tiras de tocino en línea | adMart',
                    'ar' => 'شرائح بيكون اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order bacon strips delivered by adMart.',
                    'fr' => 'Commandez des lardons fumés livrés par adMart.',
                    'es' => 'Ordene tiras de tocino entregadas por adMart.',
                    'ar' => 'اطلب شرائح بيكون يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 7.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Beef Jerky',
                    'fr' => 'Bœuf séché',
                    'es' => 'Cecina de res',
                    'ar' => 'لحم بقري مجفف'
                ],
                'description' => [
                    'en' => 'Savory beef jerky, high-protein snack.',
                    'fr' => 'Bœuf séché savoureux, collation riche en protéines.',
                    'es' => 'Cecina de res sabrosa, snack alto en proteínas.',
                    'ar' => 'لحم بقري مجفف لذيذ، وجبة خفيفة غنية بالبروتين.'
                ],
                'meta_title' => [
                    'en' => 'Beef Jerky Online | adMart',
                    'fr' => 'Bœuf séché en ligne | adMart',
                    'es' => 'Cecina de res en línea | adMart',
                    'ar' => 'لحم بقري مجفف اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order savory beef jerky delivered by adMart.',
                    'fr' => 'Commandez du bœuf séché savoureux livré par adMart.',
                    'es' => 'Ordene cecina de res sabrosa entregada por adMart.',
                    'ar' => 'اطلب لحم بقري مجفف لذيذ يتم توصيله بواسطة adMart.'
                ],
                'category_id'     => 2,
                'sub_category_id' => 6,
                'price'           => 10.50,
                'quantity'        => 100,
                'unit'            => 'g'
            ],

            //60-70


            [
                'name' => [
                    'en' => 'Full Cream Milk',
                    'fr' => 'Lait entier',
                    'es' => 'Leche entera',
                    'ar' => 'حليب كامل الدسم'
                ],
                'description' => [
                    'en' => 'Rich and creamy full-cream cow\'s milk.',
                    'fr' => 'Lait de vache entier riche et crémeux.',
                    'es' => 'Leche de vaca entera rica y cremosa.',
                    'ar' => 'حليب بقر كامل الدسم غني وكريمي.'
                ],
                'meta_title' => [
                    'en' => 'Full Cream Milk Online | adMart',
                    'fr' => 'Lait entier en ligne | adMart',
                    'es' => 'Leche entera en línea | adMart',
                    'ar' => 'حليب كامل الدسم اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order rich full-cream milk delivered fresh.',
                    'fr' => 'Commandez du lait entier riche livré frais.',
                    'es' => 'Ordene leche entera rica entregada fresca.',
                    'ar' => 'اطلب حليب كامل الدسم الغني يتم توصيله طازجًا.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.20,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Skimmed Milk',
                    'fr' => 'Lait écrémé',
                    'es' => 'Leche desnatada',
                    'ar' => 'حليب خالي الدسم'
                ],
                'description' => [
                    'en' => 'Low-fat skimmed cow\'s milk, healthy choice.',
                    'fr' => 'Lait de vache écrémé faible en gras, choix sain.',
                    'es' => 'Leche de vaca desnatada baja en grasa, opción saludable.',
                    'ar' => 'حليب بقر خالي الدسم قليل الدهون، خيار صحي.'
                ],
                'meta_title' => [
                    'en' => 'Skimmed Milk Delivery | adMart',
                    'fr' => 'Livraison de lait écrémé | adMart',
                    'es' => 'Entrega de leche desnatada | adMart',
                    'ar' => 'توصيل حليب خالي الدسم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy low-fat skimmed milk online.',
                    'fr' => 'Achetez du lait écrémé faible en gras en ligne.',
                    'es' => 'Compre leche desnatada baja en grasa en línea.',
                    'ar' => 'اشترِ حليب خالي الدسم قليل الدهون اونلاين.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.00,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Double Cream',
                    'fr' => 'Crème double',
                    'es' => 'Crema doble',
                    'ar' => 'كريمة مزدوجة'
                ],
                'description' => [
                    'en' => 'Luxurious double cream for desserts and sauces.',
                    'fr' => 'Crème double luxueuse pour desserts et sauces.',
                    'es' => 'Crema doble lujosa para postres y salsas.',
                    'ar' => 'كريمة مزدوجة فاخرة للحلويات والصلصات.'
                ],
                'meta_title' => [
                    'en' => 'Double Cream Online | adMart',
                    'fr' => 'Crème double en ligne | adMart',
                    'es' => 'Crema doble en línea | adMart',
                    'ar' => 'كريمة مزدوجة اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Get rich double cream delivered.',
                    'fr' => 'Obtenez de la crème double riche livrée.',
                    'es' => 'Obtenga crema doble rica entregada.',
                    'ar' => 'احصل على كريمة مزدوجة غنية يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 2.50,
                'quantity'        => 200,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'UHT Milk',
                    'fr' => 'Lait UHT',
                    'es' => 'Leche UHT',
                    'ar' => 'حليب معقم'
                ],
                'description' => [
                    'en' => 'Long-life UHT milk, shelf-stable convenience.',
                    'fr' => 'Lait UHT longue conservation, commodité stable.',
                    'es' => 'Leche UHT de larga duración, conveniencia estable.',
                    'ar' => 'حليب معقم طويل الأجل، مناسب للتخزين.'
                ],
                'meta_title' => [
                    'en' => 'UHT Milk Delivery | adMart',
                    'fr' => 'Livraison de lait UHT | adMart',
                    'es' => 'Entrega de leche UHT | adMart',
                    'ar' => 'توصيل حليب معقم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order UHT milk delivered to your door.',
                    'fr' => 'Commandez du lait UHT livré à votre porte.',
                    'es' => 'Ordene leche UHT entregada en su puerta.',
                    'ar' => 'اطلب حليب معقم يتم توصيله إلى باب منزلك.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.30,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Goat Milk',
                    'fr' => 'Lait de chèvre',
                    'es' => 'Leche de cabra',
                    'ar' => 'حليب ماعز'
                ],
                'description' => [
                    'en' => 'Nutritious goat milk, naturally allergen-friendly.',
                    'fr' => 'Lait de chèvre nutritif, naturellement hypoallergénique.',
                    'es' => 'Leche de cabra nutritiva, naturalmente hipoalergénica.',
                    'ar' => 'حليب ماعز مغذي، مناسب للحساسية بشكل طبيعي.'
                ],
                'meta_title' => [
                    'en' => 'Goat Milk Online | adMart',
                    'fr' => 'Lait de chèvre en ligne | adMart',
                    'es' => 'Leche de cabra en línea | adMart',
                    'ar' => 'حليب ماعز اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh goat milk delivered.',
                    'fr' => 'Achetez du lait de chèvre frais livré.',
                    'es' => 'Compre leche de cabra fresca entregada.',
                    'ar' => 'اشترِ حليب ماعز طازج يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 2.00,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Heavy Whipping Cream',
                    'fr' => 'Crème à fouetter épaisse',
                    'es' => 'Crema para batir espesa',
                    'ar' => 'كريمة خفق ثقيلة'
                ],
                'description' => [
                    'en' => 'Perfect for whipping and baking.',
                    'fr' => 'Parfait pour fouetter et cuire.',
                    'es' => 'Perfecta para batir y hornear.',
                    'ar' => 'مثالية للخبز والخفق.'
                ],
                'meta_title' => [
                    'en' => 'Heavy Whipping Cream | adMart',
                    'fr' => 'Crème à fouetter épaisse | adMart',
                    'es' => 'Crema para batir espesa | adMart',
                    'ar' => 'كريمة خفق ثقيلة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order heavy whipping cream delivered.',
                    'fr' => 'Commandez de la crème à fouetter épaisse livrée.',
                    'es' => 'Ordene crema para batir espesa entregada.',
                    'ar' => 'اطلب كريمة خفق ثقيلة يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 2.20,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Condensed Milk',
                    'fr' => 'Lait concentré sucré',
                    'es' => 'Leche condensada',
                    'ar' => 'حليب مكثف محلى'
                ],
                'description' => [
                    'en' => 'Sweetened condensed milk for desserts.',
                    'fr' => 'Lait concentré sucré pour desserts.',
                    'es' => 'Leche condensada azucarada para postres.',
                    'ar' => 'حليب مكثف محلى للحلويات.'
                ],
                'meta_title' => [
                    'en' => 'Condensed Milk Online | adMart',
                    'fr' => 'Lait concentré sucré en ligne | adMart',
                    'es' => 'Leche condensada en línea | adMart',
                    'ar' => 'حليب مكثف محلى اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy sweet condensed milk delivered.',
                    'fr' => 'Achetez du lait concentré sucré livré.',
                    'es' => 'Compre leche condensada azucarada entregada.',
                    'ar' => 'اشترِ حليب مكثف محلى يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.80,
                'quantity'        => 395,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Evaporated Milk',
                    'fr' => 'Lait évaporé',
                    'es' => 'Leche evaporada',
                    'ar' => 'حليب مبخر'
                ],
                'description' => [
                    'en' => 'Thick evaporated milk for recipes.',
                    'fr' => 'Lait évaporé épais pour recettes.',
                    'es' => 'Leche evaporada espesa para recetas.',
                    'ar' => 'حليب مبخر كثيف للوصفات.'
                ],
                'meta_title' => [
                    'en' => 'Evaporated Milk Delivery | adMart',
                    'fr' => 'Livraison de lait évaporé | adMart',
                    'es' => 'Entrega de leche evaporada | adMart',
                    'ar' => 'توصيل حليب مبخر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order evaporated milk delivered.',
                    'fr' => 'Commandez du lait évaporé livré.',
                    'es' => 'Ordene leche evaporada entregada.',
                    'ar' => 'اطلب حليب مبخر يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.75,
                'quantity'        => 410,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Low Fat Milk',
                    'fr' => 'Lait faible en gras',
                    'es' => 'Leche baja en grasa',
                    'ar' => 'حليب قليل الدسم'
                ],
                'description' => [
                    'en' => 'Reduced-fat milk, balanced nutrition.',
                    'fr' => 'Lait réduit en gras, nutrition équilibrée.',
                    'es' => 'Leche reducida en grasa, nutrición equilibrada.',
                    'ar' => 'حليب مخفض الدسم، تغذية متوازنة.'
                ],
                'meta_title' => [
                    'en' => 'Low Fat Milk Online | adMart',
                    'fr' => 'Lait faible en gras en ligne | adMart',
                    'es' => 'Leche baja en grasa en línea | adMart',
                    'ar' => 'حليب قليل الدسم اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy low-fat milk delivered.',
                    'fr' => 'Achetez du lait faible en gras livré.',
                    'es' => 'Compre leche baja en grasa entregada.',
                    'ar' => 'اشترِ حليب قليل الدسم يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.10,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Flavored Milk (Strawberry)',
                    'fr' => 'Lait aromatisé (fraise)',
                    'es' => 'Leche saborizada (fresa)',
                    'ar' => 'حليب بنكهة (فراولة)'
                ],
                'description' => [
                    'en' => 'Creamy strawberry-flavored milk for kids.',
                    'fr' => 'Lait crémeux à la fraise pour enfants.',
                    'es' => 'Leche cremosa con sabor a fresa para niños.',
                    'ar' => 'حليب كريمي بنكهة الفراولة للأطفال.'
                ],
                'meta_title' => [
                    'en' => 'Strawberry Flavored Milk | adMart',
                    'fr' => 'Lait aromatisé à la fraise | adMart',
                    'es' => 'Leche sabor fresa | adMart',
                    'ar' => 'حليب بنكهة الفراولة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order strawberry milk delivered.',
                    'fr' => 'Commandez du lait à la fraise livré.',
                    'es' => 'Ordene leche de fresa entregada.',
                    'ar' => 'اطلب حليب الفراولة يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 7,
                'price'           => 1.50,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            //70-80

            [
                'name' => [
                    'en' => 'Cheddar Cheese Block',
                    'fr' => 'Bloc de cheddar',
                    'es' => 'Bloque de queso cheddar',
                    'ar' => 'قطعة جبن شيدر'
                ],
                'description' => [
                    'en' => 'Matured cheddar cheese block, sharp flavor.',
                    'fr' => 'Bloc de cheddar affiné, saveur prononcée.',
                    'es' => 'Bloque de queso cheddar madurado, sabor intenso.',
                    'ar' => 'قطعة جبن شيدر معتقة، بنكهة قوية.'
                ],
                'meta_title' => [
                    'en' => 'Cheddar Cheese Online | adMart',
                    'fr' => 'Cheddar en ligne | adMart',
                    'es' => 'Queso cheddar en línea | adMart',
                    'ar' => 'جبن شيدر اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy matured cheddar cheese delivered.',
                    'fr' => 'Achetez du cheddar affiné livré.',
                    'es' => 'Compre queso cheddar madurado entregado.',
                    'ar' => 'اشترِ جبن شيدر معتق يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 4.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Mozzarella Shreds',
                    'fr' => 'Lamelles de mozzarella',
                    'es' => 'Tiras de mozzarella',
                    'ar' => 'شرائح موزاريلا'
                ],
                'description' => [
                    'en' => 'Mild mozzarella cheese strips, ideal for pizza.',
                    'fr' => 'Lamelles de mozzarella douce, idéales pour pizza.',
                    'es' => 'Tiras de queso mozzarella suave, ideal para pizza.',
                    'ar' => 'شرائح جبن موزاريلا خفيفة، مثالية للبيتزا.'
                ],
                'meta_title' => [
                    'en' => 'Mozzarella Shreds | adMart',
                    'fr' => 'Lamelles de mozzarella | adMart',
                    'es' => 'Tiras de mozzarella | adMart',
                    'ar' => 'شرائح موزاريلا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order mozzarella shreds for pizza making.',
                    'fr' => 'Commandez des lamelles de mozzarella pour pizza.',
                    'es' => 'Ordene tiras de mozzarella para hacer pizza.',
                    'ar' => 'اطلب شرائح موزاريلا لصنع البيتزا.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 3.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Parmesan Cheese Grated',
                    'fr' => 'Parmesan râpé',
                    'es' => 'Queso parmesano rallado',
                    'ar' => 'بارميزان مبشور'
                ],
                'description' => [
                    'en' => 'Finely grated Parmesan for pasta topping.',
                    'fr' => 'Parmesan finement râpé pour garniture de pâtes.',
                    'es' => 'Parmesano finamente rallado para cubrir pasta.',
                    'ar' => 'بارميزان مبشور ناعم لتزيين المعكرونة.'
                ],
                'meta_title' => [
                    'en' => 'Parmesan Cheese Online | adMart',
                    'fr' => 'Parmesan en ligne | adMart',
                    'es' => 'Queso parmesano en línea | adMart',
                    'ar' => 'بارميزان اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy grated Parmesan cheese delivered.',
                    'fr' => 'Achetez du parmesan râpé livré.',
                    'es' => 'Compre queso parmesano rallado entregado.',
                    'ar' => 'اشترِ بارميزان مبشور يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 5.00,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Cream Cheese',
                    'fr' => 'Fromage à la crème',
                    'es' => 'Queso crema',
                    'ar' => 'جبن كريمي'
                ],
                'description' => [
                    'en' => 'Smooth cream cheese for spreads and baking.',
                    'fr' => 'Fromage à la crème lisse pour tartines et pâtisserie.',
                    'es' => 'Queso crema suave para untar y hornear.',
                    'ar' => 'جبن كريمي ناعم للدهن والخبز.'
                ],
                'meta_title' => [
                    'en' => 'Cream Cheese Delivery | adMart',
                    'fr' => 'Livraison de fromage à la crème | adMart',
                    'es' => 'Entrega de queso crema | adMart',
                    'ar' => 'توصيل جبن كريمي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order cream cheese online.',
                    'fr' => 'Commandez du fromage à la crème en ligne.',
                    'es' => 'Ordene queso crema en línea.',
                    'ar' => 'اطلب جبن كريمي اونلاين.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 2.20,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Feta Cheese',
                    'fr' => 'Feta',
                    'es' => 'Queso feta',
                    'ar' => 'جبنة فيتا'
                ],
                'description' => [
                    'en' => 'Tangy Greek-style feta cheese cubes.',
                    'fr' => 'Dés de feta grecque piquante.',
                    'es' => 'Cubos de queso feta griego ácido.',
                    'ar' => 'مكعبات جبنة فيتا يونانية لاذعة.'
                ],
                'meta_title' => [
                    'en' => 'Feta Cheese Online | adMart',
                    'fr' => 'Feta en ligne | adMart',
                    'es' => 'Queso feta en línea | adMart',
                    'ar' => 'جبنة فيتا اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy feta cheese cubes delivered.',
                    'fr' => 'Achetez des dés de feta livrés.',
                    'es' => 'Compre cubos de queso feta entregados.',
                    'ar' => 'اشترِ مكعبات جبنة فيتا يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 4.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Goat Cheese Log',
                    'fr' => 'Bûche de chèvre',
                    'es' => 'Tronco de queso de cabra',
                    'ar' => 'جبنة ماعز على شكل جذع'
                ],
                'description' => [
                    'en' => 'Soft goat cheese log, distinct flavor.',
                    'fr' => 'Bûche de chèvre tendre, saveur distincte.',
                    'es' => 'Tronco de queso de cabra suave, sabor distintivo.',
                    'ar' => 'جبنة ماعز طرية على شكل جذع، بنكهة مميزة.'
                ],
                'meta_title' => [
                    'en' => 'Goat Cheese Online | adMart',
                    'fr' => 'Fromage de chèvre en ligne | adMart',
                    'es' => 'Queso de cabra en línea | adMart',
                    'ar' => 'جبنة ماعز اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order goat cheese logs delivered.',
                    'fr' => 'Commandez des bûches de chèvre livrées.',
                    'es' => 'Ordene troncos de queso de cabra entregados.',
                    'ar' => 'اطلب جذوع جبنة الماعز يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 6.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Blue Cheese Crumbles',
                    'fr' => 'Miettes de bleu',
                    'es' => 'Migas de queso azul',
                    'ar' => 'فتات جبنة زرقاء'
                ],
                'description' => [
                    'en' => 'Pungent blue cheese crumbles, ideal for salads.',
                    'fr' => 'Miettes de bleu piquant, idéales pour salades.',
                    'es' => 'Migas de queso azul picante, ideal para ensaladas.',
                    'ar' => 'فتات جبنة زرقاء لاذعة، مثالية للسلطات.'
                ],
                'meta_title' => [
                    'en' => 'Blue Cheese Crumbles | adMart',
                    'fr' => 'Miettes de bleu | adMart',
                    'es' => 'Migas de queso azul | adMart',
                    'ar' => 'فتات جبنة زرقاء | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy blue cheese crumbles delivered.',
                    'fr' => 'Achetez des miettes de bleu livrées.',
                    'es' => 'Compre migas de queso azul entregadas.',
                    'ar' => 'اشترِ فتات جبنة زرقاء يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 5.50,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Ricotta Cheese',
                    'fr' => 'Ricotta',
                    'es' => 'Queso ricotta',
                    'ar' => 'جبنة ريكوتا'
                ],
                'description' => [
                    'en' => 'Soft ricotta cheese for lasagna and desserts.',
                    'fr' => 'Ricotta tendre pour lasagnes et desserts.',
                    'es' => 'Queso ricotta suave para lasaña y postres.',
                    'ar' => 'جبنة ريكوتا طرية لللازانيا والحلويات.'
                ],
                'meta_title' => [
                    'en' => 'Ricotta Cheese Online | adMart',
                    'fr' => 'Ricotta en ligne | adMart',
                    'es' => 'Queso ricotta en línea | adMart',
                    'ar' => 'جبنة ريكوتا اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order ricotta cheese delivered.',
                    'fr' => 'Commandez de la ricotta livrée.',
                    'es' => 'Ordene queso ricotta entregado.',
                    'ar' => 'اطلب جبنة ريكوتا يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 3.00,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Swiss Cheese Slices',
                    'fr' => 'Tranches d\'emmental',
                    'es' => 'Lonchas de queso suizo',
                    'ar' => 'شرائح جبنة سويسرية'
                ],
                'description' => [
                    'en' => 'Mild Swiss cheese slices, great for sandwiches.',
                    'fr' => 'Tranches d\'emmental doux, parfaites pour sandwichs.',
                    'es' => 'Lonchas de queso suizo suave, ideales para sándwiches.',
                    'ar' => 'شرائح جبنة سويسرية خفيفة، رائعة للسندويشات.'
                ],
                'meta_title' => [
                    'en' => 'Swiss Cheese Slices | adMart',
                    'fr' => 'Tranches d\'emmental | adMart',
                    'es' => 'Lonchas de queso suizo | adMart',
                    'ar' => 'شرائح جبنة سويسرية | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy Swiss cheese slices delivered.',
                    'fr' => 'Achetez des tranches d\'emmental livrées.',
                    'es' => 'Compre lonchas de queso suizo entregadas.',
                    'ar' => 'اشترِ شرائح جبنة سويسرية يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 4.20,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Cottage Cheese',
                    'fr' => 'Fromage blanc',
                    'es' => 'Requesón',
                    'ar' => 'جبنة قريش'
                ],
                'description' => [
                    'en' => 'Light cottage cheese for healthy meals.',
                    'fr' => 'Fromage blanc léger pour repas sains.',
                    'es' => 'Requesón ligero para comidas saludables.',
                    'ar' => 'جبنة قريش خفيفة للوجبات الصحية.'
                ],
                'meta_title' => [
                    'en' => 'Cottage Cheese Online | adMart',
                    'fr' => 'Fromage blanc en ligne | adMart',
                    'es' => 'Requesón en línea | adMart',
                    'ar' => 'جبنة قريش اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order cottage cheese delivered.',
                    'fr' => 'Commandez du fromage blanc livré.',
                    'es' => 'Ordene requesón entregado.',
                    'ar' => 'اطلب جبنة قريش يتم توصيلها.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 8,
                'price'           => 2.80,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            //80-90


            [
                'name' => [
                    'en' => 'Free-Range Brown Eggs',
                    'fr' => 'Œufs bruns de poules élevées en plein air',
                    'es' => 'Huevos marrones de gallinas camperas',
                    'ar' => 'بيض بني من دجاج المراعي'
                ],
                'description' => [
                    'en' => 'Cage-free brown eggs from pasture-raised hens.',
                    'fr' => 'Œufs bruns de poules élevées en plein air sans cage.',
                    'es' => 'Huevos marrones de gallinas criadas en pastos libres de jaulas.',
                    'ar' => 'بيض بني من دجاج المراعي غير المحبوس في أقفاص.'
                ],
                'meta_title' => [
                    'en' => 'Free-Range Eggs Online | adMart',
                    'fr' => 'Œufs de plein air en ligne | adMart',
                    'es' => 'Huevos camperos en línea | adMart',
                    'ar' => 'بيض المراعي اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy free-range brown eggs delivered.',
                    'fr' => 'Achetez des œufs bruns de plein air livrés.',
                    'es' => 'Compre huevos marrones camperos entregados.',
                    'ar' => 'اشترِ بيض بني من المراعي يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 3.00,
                'quantity'        => 12,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Organic White Eggs',
                    'fr' => 'Œufs blancs biologiques',
                    'es' => 'Huevos blancos orgánicos',
                    'ar' => 'بيض أبيض عضوي'
                ],
                'description' => [
                    'en' => 'Organic white eggs, high in protein.',
                    'fr' => 'Œufs blancs biologiques, riches en protéines.',
                    'es' => 'Huevos blancos orgánicos, altos en proteínas.',
                    'ar' => 'بيض أبيض عضوي، غني بالبروتين.'
                ],
                'meta_title' => [
                    'en' => 'Organic Eggs Delivery | adMart',
                    'fr' => 'Livraison d\'œufs biologiques | adMart',
                    'es' => 'Entrega de huevos orgánicos | adMart',
                    'ar' => 'توصيل بيض عضوي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order organic white eggs online.',
                    'fr' => 'Commandez des œufs blancs biologiques en ligne.',
                    'es' => 'Ordene huevos blancos orgánicos en línea.',
                    'ar' => 'اطلب بيض أبيض عضوي اونلاين.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 3.50,
                'quantity'        => 12,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Duck Eggs',
                    'fr' => 'Œufs de canard',
                    'es' => 'Huevos de pato',
                    'ar' => 'بيض بط'
                ],
                'description' => [
                    'en' => 'Rich duck eggs, excellent for baking.',
                    'fr' => 'Œufs de canard riches, excellents pour la pâtisserie.',
                    'es' => 'Huevos de pato ricos, excelentes para hornear.',
                    'ar' => 'بيض بط غني، ممتاز للخبز.'
                ],
                'meta_title' => [
                    'en' => 'Duck Eggs Online | adMart',
                    'fr' => 'Œufs de canard en ligne | adMart',
                    'es' => 'Huevos de pato en línea | adMart',
                    'ar' => 'بيض بط اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy duck eggs delivered.',
                    'fr' => 'Achetez des œufs de canard livrés.',
                    'es' => 'Compre huevos de pato entregados.',
                    'ar' => 'اشترِ بيض بط يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 4.00,
                'quantity'        => 6,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Quail Eggs',
                    'fr' => 'Œufs de caille',
                    'es' => 'Huevos de codorniz',
                    'ar' => 'بيض سمان'
                ],
                'description' => [
                    'en' => 'Delicate quail eggs, gourmet treat.',
                    'fr' => 'Œufs de caille délicats, mets gastronomique.',
                    'es' => 'Huevos de codorniz delicados, manjar gourmet.',
                    'ar' => 'بيض سمان لذيذ، طعام فاخر.'
                ],
                'meta_title' => [
                    'en' => 'Quail Eggs Delivery | adMart',
                    'fr' => 'Livraison d\'œufs de caille | adMart',
                    'es' => 'Entrega de huevos de codorniz | adMart',
                    'ar' => 'توصيل بيض سمان | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order quail eggs online.',
                    'fr' => 'Commandez des œufs de caille en ligne.',
                    'es' => 'Ordene huevos de codorniz en línea.',
                    'ar' => 'اطلب بيض سمان اونلاين.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 5.00,
                'quantity'        => 20,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Omega-3 Enriched Eggs',
                    'fr' => 'Œufs enrichis en oméga-3',
                    'es' => 'Huevos enriquecidos con omega-3',
                    'ar' => 'بيض مدعم بأوميغا 3'
                ],
                'description' => [
                    'en' => 'Eggs enriched with omega-3 fatty acids.',
                    'fr' => 'Œufs enrichis en acides gras oméga-3.',
                    'es' => 'Huevos enriquecidos con ácidos grasos omega-3.',
                    'ar' => 'بيض مدعم بأحماض أوميغا 3 الدهنية.'
                ],
                'meta_title' => [
                    'en' => 'Omega-3 Eggs | adMart',
                    'fr' => 'Œufs oméga-3 | adMart',
                    'es' => 'Huevos omega-3 | adMart',
                    'ar' => 'بيض أوميغا 3 | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy omega-3 enriched eggs delivered.',
                    'fr' => 'Achetez des œufs enrichis en oméga-3 livrés.',
                    'es' => 'Compre huevos enriquecidos con omega-3 entregados.',
                    'ar' => 'اشترِ بيض مدعم بأوميغا 3 يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 3.80,
                'quantity'        => 12,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Brown Organic Free-Range Eggs',
                    'fr' => 'Œufs bruns bio de plein air',
                    'es' => 'Huevos marrones orgánicos camperos',
                    'ar' => 'بيض بني عضوي من المراعي'
                ],
                'description' => [
                    'en' => 'Brown free-range eggs from certified organic farms.',
                    'fr' => 'Œufs bruns de plein air provenant de fermes biologiques certifiées.',
                    'es' => 'Huevos marrones camperos de granjas orgánicas certificadas.',
                    'ar' => 'بيض بني من المراعي من مزارع عضوية معتمدة.'
                ],
                'meta_title' => [
                    'en' => 'Brown Organic Eggs | adMart',
                    'fr' => 'Œufs bruns bio | adMart',
                    'es' => 'Huevos marrones orgánicos | adMart',
                    'ar' => 'بيض بني عضوي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order brown organic free-range eggs delivered.',
                    'fr' => 'Commandez des œufs bruns bio de plein air livrés.',
                    'es' => 'Ordene huevos marrones orgánicos camperos entregados.',
                    'ar' => 'اطلب بيض بني عضوي من المراعي يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 4.20,
                'quantity'        => 12,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Large White Eggs',
                    'fr' => 'Gros œufs blancs',
                    'es' => 'Huevos blancos grandes',
                    'ar' => 'بيض أبيض كبير'
                ],
                'description' => [
                    'en' => 'Fresh large white eggs, consistent size for baking.',
                    'fr' => 'Gros œufs blancs frais, taille uniforme pour la pâtisserie.',
                    'es' => 'Huevos blancos grandes frescos, tamaño consistente para hornear.',
                    'ar' => 'بيض أبيض كبير طازج، حجم متسق للخبز.'
                ],
                'meta_title' => [
                    'en' => 'Large White Eggs | adMart',
                    'fr' => 'Gros œufs blancs | adMart',
                    'es' => 'Huevos blancos grandes | adMart',
                    'ar' => 'بيض أبيض كبير | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy large white eggs delivered fresh.',
                    'fr' => 'Achetez des gros œufs blancs livrés frais.',
                    'es' => 'Compre huevos blancos grandes entregados frescos.',
                    'ar' => 'اشترِ بيض أبيض كبير يتم توصيله طازجًا.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 2.90,
                'quantity'        => 12,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Peewee Baby Eggs',
                    'fr' => 'Petits œufs bébé',
                    'es' => 'Huevos pequeños bebé',
                    'ar' => 'بيض صغير الحجم'
                ],
                'description' => [
                    'en' => 'Tiny baby eggs, unique gourmet experience.',
                    'fr' => 'Tout petits œufs, expérience gastronomique unique.',
                    'es' => 'Huevos bebé diminutos, experiencia gourmet única.',
                    'ar' => 'بيض صغير الحجم، تجربة فاخرة فريدة.'
                ],
                'meta_title' => [
                    'en' => 'Peewee Eggs | adMart',
                    'fr' => 'Petits œufs | adMart',
                    'es' => 'Huevos pequeños | adMart',
                    'ar' => 'بيض صغير الحجم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order rare peewee baby eggs delivered.',
                    'fr' => 'Commandez des petits œufs bébé rares livrés.',
                    'es' => 'Ordene huevos bebé pequeños raros entregados.',
                    'ar' => 'اطلب بيض صغير الحجم النادر يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 6.00,
                'quantity'        => 30,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Pasture-Raised Eggs',
                    'fr' => 'Œufs de pâturage',
                    'es' => 'Huevos de pastoreo',
                    'ar' => 'بيض المراعي الطبيعية'
                ],
                'description' => [
                    'en' => 'Eggs from hens raised on open pasture.',
                    'fr' => 'Œufs de poules élevées en pâturage ouvert.',
                    'es' => 'Huevos de gallinas criadas en pastos abiertos.',
                    'ar' => 'بيض من دجاج يربى في مراعي مفتوحة.'
                ],
                'meta_title' => [
                    'en' => 'Pasture-Raised Eggs | adMart',
                    'fr' => 'Œufs de pâturage | adMart',
                    'es' => 'Huevos de pastoreo | adMart',
                    'ar' => 'بيض المراعي الطبيعية | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy pasture-raised eggs delivered.',
                    'fr' => 'Achetez des œufs de pâturage livrés.',
                    'es' => 'Compre huevos de pastoreo entregados.',
                    'ar' => 'اشترِ بيض المراعي الطبيعية يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 3.60,
                'quantity'        => 12,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Vegan Egg Substitute',
                    'fr' => 'Substitut d\'œuf végan',
                    'es' => 'Sustituto de huevo vegano',
                    'ar' => 'بديل البيض النباتي'
                ],
                'description' => [
                    'en' => 'Plant-based egg replacement powder.',
                    'fr' => 'Poudre de remplacement d\'œuf à base de plantes.',
                    'es' => 'Polvo sustituto de huevo a base de plantas.',
                    'ar' => 'مسحوق بديل البيض النباتي.'
                ],
                'meta_title' => [
                    'en' => 'Vegan Egg Substitute | adMart',
                    'fr' => 'Substitut d\'œuf végan | adMart',
                    'es' => 'Sustituto de huevo vegano | adMart',
                    'ar' => 'بديل البيض النباتي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order vegan egg substitute delivered.',
                    'fr' => 'Commandez un substitut d\'œuf végan livré.',
                    'es' => 'Ordene sustituto de huevo vegano entregado.',
                    'ar' => 'اطلب بديل البيض النباتي يتم توصيله.'
                ],
                'category_id'     => 3,
                'sub_category_id' => 9,
                'price'           => 7.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            //90-100


            [
                'name' => [
                    'en' => 'Arabica Ground Coffee',
                    'fr' => 'Café Arabica moulu',
                    'es' => 'Café Arábica molido',
                    'ar' => 'قهوة عربية مطحونة'
                ],
                'description' => [
                    'en' => 'Medium roast Arabica coffee for rich flavor.',
                    'fr' => 'Café Arabica torréfié à point pour une saveur riche.',
                    'es' => 'Café Arábica tostado medio para un sabor intenso.',
                    'ar' => 'قهوة عربية محمصة متوسطة لنكهة غنية.'
                ],
                'meta_title' => [
                    'en' => 'Arabica Ground Coffee | adMart',
                    'fr' => 'Café Arabica moulu | adMart',
                    'es' => 'Café Arábica molido | adMart',
                    'ar' => 'قهوة عربية مطحونة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy medium roast Arabica ground coffee delivered.',
                    'fr' => 'Achetez du café Arabica moulu torréfié à point livré.',
                    'es' => 'Compre café Arábica molido tostado medio entregado.',
                    'ar' => 'اشترِ قهوة عربية مطحونة محمصة متوسطة يتم توصيلها.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 8.00,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Green Tea Bags',
                    'fr' => 'Sachets de thé vert',
                    'es' => 'Bolsitas de té verde',
                    'ar' => 'أكياس الشاي الأخضر'
                ],
                'description' => [
                    'en' => 'Premium green tea bags, antioxidant-rich.',
                    'fr' => 'Sachets de thé vert premium riches en antioxydants.',
                    'es' => 'Bolsitas de té verde premium ricas en antioxidantes.',
                    'ar' => 'أكياس شاي أخضر ممتاز غني بمضادات الأكسدة.'
                ],
                'meta_title' => [
                    'en' => 'Green Tea Bags Online | adMart',
                    'fr' => 'Sachets de thé vert en ligne | adMart',
                    'es' => 'Bolsitas de té verde en línea | adMart',
                    'ar' => 'أكياس الشاي الأخضر اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order premium green tea bags delivered.',
                    'fr' => 'Commandez des sachets de thé vert premium livrés.',
                    'es' => 'Ordene bolsitas de té verde premium entregadas.',
                    'ar' => 'اطلب أكياس الشاي الأخضر الممتازة يتم توصيلها.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 4.50,
                'quantity'        => 20,
                'unit'            => 'bags'
            ],
            [
                'name' => [
                    'en' => 'Earl Grey Tea',
                    'fr' => 'Thé Earl Grey',
                    'es' => 'Té Earl Grey',
                    'ar' => 'شاي إيرل جراي'
                ],
                'description' => [
                    'en' => 'Classic Earl Grey tea leaves with bergamot.',
                    'fr' => 'Feuilles de thé Earl Grey classique à la bergamote.',
                    'es' => 'Hojas de té Earl Grey clásico con bergamota.',
                    'ar' => 'أوراق شاي إيرل جراي الكلاسيكية مع البرغموت.'
                ],
                'meta_title' => [
                    'en' => 'Earl Grey Tea Leaves | adMart',
                    'fr' => 'Feuilles de thé Earl Grey | adMart',
                    'es' => 'Hojas de té Earl Grey | adMart',
                    'ar' => 'أوراق شاي إيرل جراي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy classic Earl Grey tea from adMart.',
                    'fr' => 'Achetez du thé Earl Grey classique chez adMart.',
                    'es' => 'Compre té Earl Grey clásico de adMart.',
                    'ar' => 'اشترِ شاي إيرل جراي الكلاسيكي من adMart.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 6.00,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Hot Chocolate Mix',
                    'fr' => 'Mélange pour chocolat chaud',
                    'es' => 'Mezcla para chocolate caliente',
                    'ar' => 'مسحوق الشوكولاتة الساخنة'
                ],
                'description' => [
                    'en' => 'Rich hot chocolate powder for indulgence.',
                    'fr' => 'Poudre de chocolat chaud riche pour se faire plaisir.',
                    'es' => 'Polvo de chocolate caliente rico para consentirse.',
                    'ar' => 'مسحوق شوكولاتة ساخنة غنية للمتعة.'
                ],
                'meta_title' => [
                    'en' => 'Hot Chocolate Mix | adMart',
                    'fr' => 'Mélange pour chocolat chaud | adMart',
                    'es' => 'Mezcla para chocolate caliente | adMart',
                    'ar' => 'مسحوق الشوكولاتة الساخنة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order rich hot chocolate mix delivered.',
                    'fr' => 'Commandez un mélange riche pour chocolat chaud livré.',
                    'es' => 'Ordene mezcla rica para chocolate caliente entregada.',
                    'ar' => 'اطلب مسحوق الشوكولاتة الساخنة الغنية يتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 5.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Instant Coffee Sachets',
                    'fr' => 'Sachets de café instantané',
                    'es' => 'Sobres de café instantáneo',
                    'ar' => 'أكياس قهوة سريعة التحضير'
                ],
                'description' => [
                    'en' => 'Convenient instant coffee sachets.',
                    'fr' => 'Sachets de café instantané pratiques.',
                    'es' => 'Sobres de café instantáneo convenientes.',
                    'ar' => 'أكياس قهوة سريعة التحضير مريحة.'
                ],
                'meta_title' => [
                    'en' => 'Instant Coffee Sachets | adMart',
                    'fr' => 'Sachets de café instantané | adMart',
                    'es' => 'Sobres de café instantáneo | adMart',
                    'ar' => 'أكياس قهوة سريعة التحضير | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy instant coffee sachets delivered.',
                    'fr' => 'Achetez des sachets de café instantané livrés.',
                    'es' => 'Compre sobres de café instantáneo entregados.',
                    'ar' => 'اشترِ أكياس قهوة سريعة التحضير يتم توصيلها.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 3.00,
                'quantity'        => 10,
                'unit'            => 'sachets'
            ],
            [
                'name' => [
                    'en' => 'Matcha Powder',
                    'fr' => 'Poudre de matcha',
                    'es' => 'Polvo de matcha',
                    'ar' => 'مسحوق الماتشا'
                ],
                'description' => [
                    'en' => 'Ceremonial grade matcha green tea powder.',
                    'fr' => 'Poudre de thé vert matcha de qualité cérémoniale.',
                    'es' => 'Polvo de té verde matcha grado ceremonial.',
                    'ar' => 'مسحوق شاي ماتشا أخضر درجة احتفالية.'
                ],
                'meta_title' => [
                    'en' => 'Matcha Powder Online | adMart',
                    'fr' => 'Poudre de matcha en ligne | adMart',
                    'es' => 'Polvo de matcha en línea | adMart',
                    'ar' => 'مسحوق الماتشا اونلاين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order ceremonial matcha powder delivered.',
                    'fr' => 'Commandez de la poudre de matcha cérémoniale livrée.',
                    'es' => 'Ordene polvo de matcha ceremonial entregado.',
                    'ar' => 'اطلب مسحوق الماتشا الاحتفالي يتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 12.00,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chamomile Tea',
                    'fr' => 'Tisane de camomille',
                    'es' => 'Té de manzanilla',
                    'ar' => 'شاي البابونج'
                ],
                'description' => [
                    'en' => 'Soothing chamomile tea bags for relaxation.',
                    'fr' => 'Sachets de camomille apaisante pour se détendre.',
                    'es' => 'Bolsitas de manzanilla relajante para relajarse.',
                    'ar' => 'أكياس شاي البابونج المهدئة للاسترخاء.'
                ],
                'meta_title' => [
                    'en' => 'Chamomile Tea Bags | adMart',
                    'fr' => 'Sachets de camomille | adMart',
                    'es' => 'Bolsitas de manzanilla | adMart',
                    'ar' => 'أكياس شاي البابونج | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy calming chamomile tea delivered.',
                    'fr' => 'Achetez de la tisane de camomille apaisante livrée.',
                    'es' => 'Compre té de manzanilla relajante entregado.',
                    'ar' => 'اشترِ شاي البابونج المهدئ يتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 4.00,
                'quantity'        => 20,
                'unit'            => 'bags'
            ],
            [
                'name' => [
                    'en' => 'Espresso Beans',
                    'fr' => 'Grains d\'espresso',
                    'es' => 'Granos de espresso',
                    'ar' => 'حبوب إسبرسو'
                ],
                'description' => [
                    'en' => 'Dark roast espresso whole beans.',
                    'fr' => 'Grains d\'espresso entiers torréfiés foncés.',
                    'es' => 'Granos de espresso enteros tostado oscuro.',
                    'ar' => 'حبوب إسبرسو كاملة محمصة داكنة.'
                ],
                'meta_title' => [
                    'en' => 'Espresso Beans | adMart',
                    'fr' => 'Grains d\'espresso | adMart',
                    'es' => 'Granos de espresso | adMart',
                    'ar' => 'حبوب إسبرسو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order dark roast espresso beans delivered.',
                    'fr' => 'Commandez des grains d\'espresso torréfiés foncés livrés.',
                    'es' => 'Ordene granos de espresso tostado oscuro entregados.',
                    'ar' => 'اطلب حبوب إسبرسو محمصة داكنة يتم توصيلها.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 9.00,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Rooibos Tea',
                    'fr' => 'Thé rooibos',
                    'es' => 'Té rooibos',
                    'ar' => 'شاي رويبوس'
                ],
                'description' => [
                    'en' => 'Caffeine-free rooibos tea bags.',
                    'fr' => 'Sachets de thé rooibos sans caféine.',
                    'es' => 'Bolsitas de té rooibos sin cafeína.',
                    'ar' => 'أكياس شاي رويبوس خالية من الكافيين.'
                ],
                'meta_title' => [
                    'en' => 'Rooibos Tea Bags | adMart',
                    'fr' => 'Sachets de thé rooibos | adMart',
                    'es' => 'Bolsitas de té rooibos | adMart',
                    'ar' => 'أكياس شاي رويبوس | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy rooibos tea delivered fresh.',
                    'fr' => 'Achetez du thé rooibos livré frais.',
                    'es' => 'Compre té rooibos entregado fresco.',
                    'ar' => 'اشترِ شاي رويبوس يتم توصيله طازجًا.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 5.00,
                'quantity'        => 20,
                'unit'            => 'bags'
            ],
            [
                'name' => [
                    'en' => 'Instant Latte Mix',
                    'fr' => 'Mélange instantané pour latte',
                    'es' => 'Mezcla instantánea para latte',
                    'ar' => 'خليط لاتيه سريع التحضير'
                ],
                'description' => [
                    'en' => 'Creamy instant latte powder for quick coffee.',
                    'fr' => 'Poudre instantanée pour latte crémeux pour café rapide.',
                    'es' => 'Polvo instantáneo para latte cremoso para café rápido.',
                    'ar' => 'مسحوق لاتيه سريع التحضير كريمي للقهوة السريعة.'
                ],
                'meta_title' => [
                    'en' => 'Instant Latte Mix | adMart',
                    'fr' => 'Mélange instantané pour latte | adMart',
                    'es' => 'Mezcla instantánea para latte | adMart',
                    'ar' => 'خليط لاتيه سريع التحضير | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order instant latte mix delivered.',
                    'fr' => 'Commandez un mélange instantané pour latte livré.',
                    'es' => 'Ordene mezcla instantánea para latte entregada.',
                    'ar' => 'اطلب خليط لاتيه سريع التحضير يتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 10,
                'price'           => 4.75,
                'quantity'        => 10,
                'unit'            => 'sachets'
            ],
            //100-110

            [
                'name' => [
                    'en' => 'Sparkling Mineral Water',
                    'fr' => 'Eau minérale pétillante',
                    'es' => 'Agua mineral con gas',
                    'ar' => 'مياه معدنية فوارة'
                ],
                'description' => [
                    'en' => 'Naturally carbonated mineral water.',
                    'fr' => 'Eau minérale naturellement gazeuse.',
                    'es' => 'Agua mineral naturalmente carbonatada.',
                    'ar' => 'مياه معدنية متفحمة طبيعياً.'
                ],
                'meta_title' => [
                    'en' => 'Sparkling Mineral Water | adMart',
                    'fr' => 'Eau minérale pétillante | adMart',
                    'es' => 'Agua mineral con gas | adMart',
                    'ar' => 'مياه معدنية فوارة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Refreshing sparkling mineral water delivered.',
                    'fr' => 'Eau minérale pétillante rafraîchissante livrée.',
                    'es' => 'Refrescante agua mineral con gas entregada.',
                    'ar' => 'مياه معدنية فوارة منعشة يتم توصيلها.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.50,
                'quantity'        => 500,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Cola (330ml)',
                    'fr' => 'Cola (330ml)',
                    'es' => 'Cola (330ml)',
                    'ar' => 'كولا (330 مل)'
                ],
                'description' => [
                    'en' => 'Classic cola-flavored soft drink.',
                    'fr' => 'Boisson gazeuse classique au goût de cola.',
                    'es' => 'Refresco clásico con sabor a cola.',
                    'ar' => 'مشروب غازي بنكهة الكولا الكلاسيكية.'
                ],
                'meta_title' => [
                    'en' => 'Cola Soft Drink | adMart',
                    'fr' => 'Boisson gazeuse Cola | adMart',
                    'es' => 'Refresco de Cola | adMart',
                    'ar' => 'مشروب الكولا الغازي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy classic cola online with home delivery.',
                    'fr' => 'Achetez du cola classique en ligne avec livraison à domicile.',
                    'es' => 'Compra cola clásica en línea con entrega a domicilio.',
                    'ar' => 'اشترِ الكولا الكلاسيكية عبر الإنترنت مع التوصيل إلى المنزل.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.20,
                'quantity'        => 330,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Lemon-Lime Soda',
                    'fr' => 'Soda citron-lime',
                    'es' => 'Soda de limón y lima',
                    'ar' => 'صودا الليمون واللايم'
                ],
                'description' => [
                    'en' => 'Crisp lemon-lime flavored soda.',
                    'fr' => 'Soda rafraîchissant au goût de citron et lime.',
                    'es' => 'Refresco refrescante con sabor a limón y lima.',
                    'ar' => 'صودا منعشة بنكهة الليمون واللايم.'
                ],
                'meta_title' => [
                    'en' => 'Lemon-Lime Soda | adMart',
                    'fr' => 'Soda citron-lime | adMart',
                    'es' => 'Soda de limón y lima | adMart',
                    'ar' => 'صودا الليمون واللايم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order lemon-lime soda delivered fast.',
                    'fr' => 'Commandez du soda citron-lime livré rapidement.',
                    'es' => 'Ordene soda de limón y lima entregada rápidamente.',
                    'ar' => 'اطلب صودا الليمون واللايم ليتم توصيلها بسرعة.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.20,
                'quantity'        => 330,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Orange Soda',
                    'fr' => 'Soda à l\'orange',
                    'es' => 'Soda de naranja',
                    'ar' => 'صودا البرتقال'
                ],
                'description' => [
                    'en' => 'Sweet and tangy orange-flavored drink.',
                    'fr' => 'Boisson sucrée et piquante au goût d\'orange.',
                    'es' => 'Bebida dulce y ácida con sabor a naranja.',
                    'ar' => 'مشروب حلو ومنعش بنكهة البرتقال.'
                ],
                'meta_title' => [
                    'en' => 'Orange Soda Online | adMart',
                    'fr' => 'Soda à l\'orange en ligne | adMart',
                    'es' => 'Soda de naranja en línea | adMart',
                    'ar' => 'صودا البرتقال عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy orange soda delivered by adMart.',
                    'fr' => 'Achetez du soda à l\'orange livré par adMart.',
                    'es' => 'Compre soda de naranja entregada por adMart.',
                    'ar' => 'اشترِ صودا البرتقال التي يتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.20,
                'quantity'        => 330,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Ginger Ale',
                    'fr' => 'Ginger Ale',
                    'es' => 'Ginger Ale',
                    'ar' => 'جنزبيل آيل'
                ],
                'description' => [
                    'en' => 'Refreshing ginger-flavored soft drink.',
                    'fr' => 'Boisson gazeuse rafraîchissante au goût de gingembre.',
                    'es' => 'Refresco refrescante con sabor a jengibre.',
                    'ar' => 'مشروب غازي منعش بنكهة الزنجبيل.'
                ],
                'meta_title' => [
                    'en' => 'Ginger Ale | adMart',
                    'fr' => 'Ginger Ale | adMart',
                    'es' => 'Ginger Ale | adMart',
                    'ar' => 'جنزبيل آيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order ginger ale delivered fresh.',
                    'fr' => 'Commandez du ginger ale livré frais.',
                    'es' => 'Ordene ginger ale entregado fresco.',
                    'ar' => 'اطلب مشروب الزنجبيل ليتم توصيله طازجًا.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.30,
                'quantity'        => 330,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Tonic Water',
                    'fr' => 'Eau tonique',
                    'es' => 'Agua tónica',
                    'ar' => 'ماء التونيك'
                ],
                'description' => [
                    'en' => 'Crisp tonic water, perfect for mixers.',
                    'fr' => 'Eau tonique rafraîchissante, parfaite pour les mixers.',
                    'es' => 'Agua tónica refrescante, perfecta para mezclas.',
                    'ar' => 'ماء تونيك منعش، مثالي للمشروبات المختلطة.'
                ],
                'meta_title' => [
                    'en' => 'Tonic Water Online | adMart',
                    'fr' => 'Eau tonique en ligne | adMart',
                    'es' => 'Agua tónica en línea | adMart',
                    'ar' => 'ماء التونيك عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy tonic water delivered for your cocktails.',
                    'fr' => 'Achetez de l\'eau tonique livrée pour vos cocktails.',
                    'es' => 'Compre agua tónica entregada para sus cócteles.',
                    'ar' => 'اشترِ ماء التونيك ليتم توصيله لمشروباتك الكحولية.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.40,
                'quantity'        => 500,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Root Beer',
                    'fr' => 'Root Beer',
                    'es' => 'Root Beer',
                    'ar' => 'جعة الجذور'
                ],
                'description' => [
                    'en' => 'Rich root beer soda with classic flavor.',
                    'fr' => 'Soda root beer riche avec une saveur classique.',
                    'es' => 'Refresco root beer rico con sabor clásico.',
                    'ar' => 'صودا جعة الجذور الغنية بنكهة كلاسيكية.'
                ],
                'meta_title' => [
                    'en' => 'Root Beer Soda | adMart',
                    'fr' => 'Soda Root Beer | adMart',
                    'es' => 'Refresco Root Beer | adMart',
                    'ar' => 'صودا جعة الجذور | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order root beer delivered by adMart.',
                    'fr' => 'Commandez du root beer livré par adMart.',
                    'es' => 'Ordene root beer entregado por adMart.',
                    'ar' => 'اطلب جعة الجذور ليتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.30,
                'quantity'        => 355,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Cola Zero',
                    'fr' => 'Cola Zéro',
                    'es' => 'Cola Zero',
                    'ar' => 'كولا زيرو'
                ],
                'description' => [
                    'en' => 'Zero-sugar cola for guilt-free refreshment.',
                    'fr' => 'Cola sans sucre pour un rafraîchissement sans culpabilité.',
                    'es' => 'Cola sin azúcar para un refresco sin culpa.',
                    'ar' => 'كولا خالية من السكر لانتعاش خالٍ من الشعور بالذنب.'
                ],
                'meta_title' => [
                    'en' => 'Cola Zero Online | adMart',
                    'fr' => 'Cola Zéro en ligne | adMart',
                    'es' => 'Cola Zero en línea | adMart',
                    'ar' => 'كولا زيرو عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy zero-sugar cola delivered.',
                    'fr' => 'Achetez du cola sans sucre livré.',
                    'es' => 'Compre cola sin azúcar entregada.',
                    'ar' => 'اشترِ كولا خالية من السكر ليتم توصيلها.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.25,
                'quantity'        => 330,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Fruit Punch',
                    'fr' => 'Punch aux fruits',
                    'es' => 'Ponche de frutas',
                    'ar' => 'مشروب فواكه'
                ],
                'description' => [
                    'en' => 'Mixed fruit juice punch with sparkling water.',
                    'fr' => 'Punch aux jus de fruits mélangés avec eau pétillante.',
                    'es' => 'Ponche de jugo de frutas mixtas con agua con gas.',
                    'ar' => 'مشروب فواكه مختلط مع مياه فوارة.'
                ],
                'meta_title' => [
                    'en' => 'Fruit Punch Drink | adMart',
                    'fr' => 'Boisson Punch aux fruits | adMart',
                    'es' => 'Bebida Ponche de frutas | adMart',
                    'ar' => 'مشروب فواكه | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order refreshing fruit punch delivered.',
                    'fr' => 'Commandez un punch aux fruits rafraîchissant livré.',
                    'es' => 'Ordene ponche de frutas refrescante entregado.',
                    'ar' => 'اطلب مشروب الفواكه المنعش ليتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.50,
                'quantity'        => 500,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Club Soda',
                    'fr' => 'Soda club',
                    'es' => 'Soda club',
                    'ar' => 'صودا كلوب'
                ],
                'description' => [
                    'en' => 'Carbonated club soda for mixing and drinking.',
                    'fr' => 'Soda club gazeux pour mélanges et consommation.',
                    'es' => 'Soda club carbonatada para mezclar y beber.',
                    'ar' => 'صودا كلوب غازية للخلط والشرب.'
                ],
                'meta_title' => [
                    'en' => 'Club Soda | adMart',
                    'fr' => 'Soda club | adMart',
                    'es' => 'Soda club | adMart',
                    'ar' => 'صودا كلوب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy club soda delivered by adMart.',
                    'fr' => 'Achetez du soda club livré par adMart.',
                    'es' => 'Compre soda club entregada por adMart.',
                    'ar' => 'اشترِ صودا كلوب ليتم توصيلها بواسطة adMart.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 11,
                'price'           => 1.30,
                'quantity'        => 500,
                'unit'            => 'ml'
            ],
            //110-120


            [
                'name' => [
                    'en' => 'Orange Juice',
                    'fr' => 'Jus d\'orange',
                    'es' => 'Jugo de naranja',
                    'ar' => 'عصير برتقال'
                ],
                'description' => [
                    'en' => '100% pure squeezed orange juice.',
                    'fr' => 'Jus d\'orange 100% pur pressé.',
                    'es' => 'Jugo de naranja 100% puro exprimido.',
                    'ar' => 'عصير برتقال طبيعي 100% معصور.'
                ],
                'meta_title' => [
                    'en' => 'Fresh Orange Juice | adMart',
                    'fr' => 'Jus d\'orange frais | adMart',
                    'es' => 'Jugo de naranja fresco | adMart',
                    'ar' => 'عصير برتقال طازج | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy pure orange juice delivered fresh.',
                    'fr' => 'Achetez du jus d\'orange pur livré frais.',
                    'es' => 'Compre jugo de naranja puro entregado fresco.',
                    'ar' => 'اشترِ عصير برتقال نقي يتم توصيله طازجًا.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Apple Juice',
                    'fr' => 'Jus de pomme',
                    'es' => 'Jugo de manzana',
                    'ar' => 'عصير تفاح'
                ],
                'description' => [
                    'en' => 'Clear pressed apple juice, no added sugar.',
                    'fr' => 'Jus de pomme pressé clair, sans sucre ajouté.',
                    'es' => 'Jugo de manzana prensado claro, sin azúcar añadido.',
                    'ar' => 'عصير تفاح معصور صافٍ بدون سكر مضاف.'
                ],
                'meta_title' => [
                    'en' => 'Apple Juice Online | adMart',
                    'fr' => 'Jus de pomme en ligne | adMart',
                    'es' => 'Jugo de manzana en línea | adMart',
                    'ar' => 'عصير تفاح عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order clear apple juice delivered.',
                    'fr' => 'Commandez du jus de pomme clair livré.',
                    'es' => 'Ordene jugo de manzana claro entregado.',
                    'ar' => 'اطلب عصير تفاح صافٍ ليتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Mixed Berry Smoothie',
                    'fr' => 'Smoothie aux baies mixtes',
                    'es' => 'Batido de bayas mixtas',
                    'ar' => 'سموذي التوت المختلط'
                ],
                'description' => [
                    'en' => 'Blend of strawberries, blueberries, and raspberries.',
                    'fr' => 'Mélange de fraises, myrtilles et framboises.',
                    'es' => 'Mezcla de fresas, arándanos y frambuesas.',
                    'ar' => 'مزيج من الفراولة والتوت الأزرق وتوت العليق.'
                ],
                'meta_title' => [
                    'en' => 'Mixed Berry Smoothie | adMart',
                    'fr' => 'Smoothie aux baies mixtes | adMart',
                    'es' => 'Batido de bayas mixtas | adMart',
                    'ar' => 'سموذي التوت المختلط | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy berry smoothie delivered chilled.',
                    'fr' => 'Achetez un smoothie aux baies livré frais.',
                    'es' => 'Compre batido de bayas entregado frío.',
                    'ar' => 'اشترِ سموذي التوت ليتم توصيله مبردًا.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.00,
                'quantity'        => 400,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Mango Lassi',
                    'fr' => 'Lassi à la mangue',
                    'es' => 'Lassi de mango',
                    'ar' => 'لاسي المانجو'
                ],
                'description' => [
                    'en' => 'Creamy mango yogurt smoothie.',
                    'fr' => 'Smoothie crémeux au yaourt et à la mangue.',
                    'es' => 'Batido cremoso de yogur y mango.',
                    'ar' => 'سموذي مانجو بالزبادي الكريمي.'
                ],
                'meta_title' => [
                    'en' => 'Mango Lassi Online | adMart',
                    'fr' => 'Lassi à la mangue en ligne | adMart',
                    'es' => 'Lassi de mango en línea | adMart',
                    'ar' => 'لاسي المانجو عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order authentic mango lassi delivered.',
                    'fr' => 'Commandez un lassi à la mangue authentique livré.',
                    'es' => 'Ordene lassi de mango auténtico entregado.',
                    'ar' => 'اطلب لاسي المانجو الأصلي ليتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.50,
                'quantity'        => 400,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Carrot & Ginger Juice',
                    'fr' => 'Jus de carotte et gingembre',
                    'es' => 'Jugo de zanahoria y jengibre',
                    'ar' => 'عصير جزر وزنجبيل'
                ],
                'description' => [
                    'en' => 'Fresh carrot and ginger cold-pressed juice.',
                    'fr' => 'Jus frais de carotte et gingembre pressé à froid.',
                    'es' => 'Jugo fresco de zanahoria y jengibre prensado en frío.',
                    'ar' => 'عصير جزر وزنجبيل طازج معصور على البارد.'
                ],
                'meta_title' => [
                    'en' => 'Carrot Ginger Juice | adMart',
                    'fr' => 'Jus de carotte et gingembre | adMart',
                    'es' => 'Jugo de zanahoria y jengibre | adMart',
                    'ar' => 'عصير جزر وزنجبيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy healthy carrot ginger juice.',
                    'fr' => 'Achetez du jus sain de carotte et gingembre.',
                    'es' => 'Compre jugo saludable de zanahoria y jengibre.',
                    'ar' => 'اشترِ عصير جزر وزنجبيل صحي.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.20,
                'quantity'        => 300,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Green Detox Smoothie',
                    'fr' => 'Smoothie vert détox',
                    'es' => 'Batido verde desintoxicante',
                    'ar' => 'سموذي الديتوكس الأخضر'
                ],
                'description' => [
                    'en' => 'Spinach, kale, and apple detox blend.',
                    'fr' => 'Mélange détox d\'épinards, kale et pomme.',
                    'es' => 'Mezcla desintoxicante de espinacas, kale y manzana.',
                    'ar' => 'مزيج الديتوكس من السبانخ واللفت والتفاح.'
                ],
                'meta_title' => [
                    'en' => 'Green Detox Smoothie | adMart',
                    'fr' => 'Smoothie vert détox | adMart',
                    'es' => 'Batido verde desintoxicante | adMart',
                    'ar' => 'سموذي الديتوكس الأخضر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order detox smoothie delivered fresh.',
                    'fr' => 'Commandez un smoothie détox livré frais.',
                    'es' => 'Ordene batido desintoxicante entregado fresco.',
                    'ar' => 'اطلب سموذي الديتوكس ليتم توصيله طازجًا.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.80,
                'quantity'        => 400,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Pineapple Coconut Juice',
                    'fr' => 'Jus d\'ananas et noix de coco',
                    'es' => 'Jugo de piña y coco',
                    'ar' => 'عصير أناناس وجوز الهند'
                ],
                'description' => [
                    'en' => 'Tropical blend of pineapple and coconut water.',
                    'fr' => 'Mélange tropical d\'ananas et d\'eau de coco.',
                    'es' => 'Mezcla tropical de piña y agua de coco.',
                    'ar' => 'مزيج استوائي من الأناناس وماء جوز الهند.'
                ],
                'meta_title' => [
                    'en' => 'Pineapple Coconut Juice | adMart',
                    'fr' => 'Jus d\'ananas et noix de coco | adMart',
                    'es' => 'Jugo de piña y coco | adMart',
                    'ar' => 'عصير أناناس وجوز الهند | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy tropical juice delivered chilled.',
                    'fr' => 'Achetez du jus tropical livré frais.',
                    'es' => 'Compre jugo tropical entregado frío.',
                    'ar' => 'اشترِ العصير الاستوائي ليتم توصيله مبردًا.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Strawberry Banana Smoothie',
                    'fr' => 'Smoothie fraise-banane',
                    'es' => 'Batido de fresa y plátano',
                    'ar' => 'سموذي فراولة وموز'
                ],
                'description' => [
                    'en' => 'Classic strawberry and banana blend.',
                    'fr' => 'Mélange classique de fraise et banane.',
                    'es' => 'Mezcla clásica de fresa y plátano.',
                    'ar' => 'مزيج كلاسيكي من الفراولة والموز.'
                ],
                'meta_title' => [
                    'en' => 'Strawberry Banana Smoothie | adMart',
                    'fr' => 'Smoothie fraise-banane | adMart',
                    'es' => 'Batido de fresa y plátano | adMart',
                    'ar' => 'سموذي فراولة وموز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order delicious strawberry banana smoothie.',
                    'fr' => 'Commandez un délicieux smoothie fraise-banane.',
                    'es' => 'Ordene delicioso batido de fresa y plátano.',
                    'ar' => 'اطلب سموذي الفراولة والموز اللذيذ.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.00,
                'quantity'        => 400,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Beetroot Juice',
                    'fr' => 'Jus de betterave',
                    'es' => 'Jugo de remolacha',
                    'ar' => 'عصير الشمندر'
                ],
                'description' => [
                    'en' => 'Nutrient-packed beetroot cold-pressed juice.',
                    'fr' => 'Jus de betterave pressé à froid riche en nutriments.',
                    'es' => 'Jugo de remolacha prensado en frío rico en nutrientes.',
                    'ar' => 'عصير الشمندر المعصور على البارد الغني بالمغذيات.'
                ],
                'meta_title' => [
                    'en' => 'Beetroot Juice Online | adMart',
                    'fr' => 'Jus de betterave en ligne | adMart',
                    'es' => 'Jugo de remolacha en línea | adMart',
                    'ar' => 'عصير الشمندر عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy fresh beetroot juice delivered.',
                    'fr' => 'Achetez du jus de betterave frais livré.',
                    'es' => 'Compre jugo de remolacha fresco entregado.',
                    'ar' => 'اشترِ عصير الشمندر الطازج ليتم توصيله.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 3.50,
                'quantity'        => 300,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Tropical Smoothie Bowl',
                    'fr' => 'Bol smoothie tropical',
                    'es' => 'Tazón de smoothie tropical',
                    'ar' => 'وعاء سموذي استوائي'
                ],
                'description' => [
                    'en' => 'Smoothie bowl with mango, pineapple, and chia.',
                    'fr' => 'Bol smoothie avec mangue, ananas et chia.',
                    'es' => 'Tazón de smoothie con mango, piña y chía.',
                    'ar' => 'وعاء سموذي مع المانجو والأناناس والشيا.'
                ],
                'meta_title' => [
                    'en' => 'Tropical Smoothie Bowl | adMart',
                    'fr' => 'Bol smoothie tropical | adMart',
                    'es' => 'Tazón de smoothie tropical | adMart',
                    'ar' => 'وعاء سموذي استوائي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order smoothie bowl delivered with toppings.',
                    'fr' => 'Commandez un bol smoothie livré avec garnitures.',
                    'es' => 'Ordene tazón de smoothie entregado con toppings.',
                    'ar' => 'اطلب وعاء السموذي ليتم توصيله مع الإضافات.'
                ],
                'category_id'     => 4,
                'sub_category_id' => 12,
                'price'           => 4.50,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            //120-130

            [
                'name' => [
                    'en' => 'Classic Potato Chips',
                    'fr' => 'Chips de pommes de terre classiques',
                    'es' => 'Patatas fritas clásicas',
                    'ar' => 'رقائق البطاطس الكلاسيكية'
                ],
                'description' => [
                    'en' => 'Crispy salted potato chips for snacking.',
                    'fr' => 'Chips de pommes de terre croustillantes et salées pour le grignotage.',
                    'es' => 'Patatas fritas crujientes y saladas para picar.',
                    'ar' => 'رقائق بطاطس مقرمشة مملحة للوجبات الخفيفة.'
                ],
                'meta_title' => [
                    'en' => 'Classic Potato Chips | adMart',
                    'fr' => 'Chips de pommes de terre classiques | adMart',
                    'es' => 'Patatas fritas clásicas | adMart',
                    'ar' => 'رقائق البطاطس الكلاسيكية | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy crispy potato chips delivered.',
                    'fr' => 'Achetez des chips de pommes de terre croustillantes livrées.',
                    'es' => 'Compre patatas fritas crujientes entregadas.',
                    'ar' => 'اشترِ رقائق البطاطس المقرمشة ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 1.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Barbecue Tortilla Chips',
                    'fr' => 'Tortillas chips barbecue',
                    'es' => 'Totopos sabor barbacoa',
                    'ar' => 'رقائق التورتيلا بنكهة الشواء'
                ],
                'description' => [
                    'en' => 'Corn tortilla chips with tangy BBQ seasoning.',
                    'fr' => 'Tortillas chips de maïs avec assaisonnement barbecue acidulé.',
                    'es' => 'Totopos de maíz con condimento barbacoa ácido.',
                    'ar' => 'رقائق تورتيلا الذرة مع توابل الشواء اللاذعة.'
                ],
                'meta_title' => [
                    'en' => 'BBQ Tortilla Chips | adMart',
                    'fr' => 'Tortillas chips barbecue | adMart',
                    'es' => 'Totopos barbacoa | adMart',
                    'ar' => 'رقائق التورتيلا بالشواء | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order barbecue flavored tortilla chips delivered.',
                    'fr' => 'Commandez des tortillas chips saveur barbecue livrées.',
                    'es' => 'Ordene totopos sabor barbacoa entregados.',
                    'ar' => 'اطلب رقائق التورتيلا بنكهة الشواء ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 1.80,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sea Salt Kettle Chips',
                    'fr' => 'Chips kettle au sel de mer',
                    'es' => 'Patatas kettle con sal marina',
                    'ar' => 'رقائق كيتل بملح البحر'
                ],
                'description' => [
                    'en' => 'Thick-cut kettle chips with sea salt.',
                    'fr' => 'Chips kettle épaisses avec sel de mer.',
                    'es' => 'Patatas kettle gruesas con sal marina.',
                    'ar' => 'رقائق كيتل مقطعة سميكة مع ملح البحر.'
                ],
                'meta_title' => [
                    'en' => 'Kettle Chips Sea Salt | adMart',
                    'fr' => 'Chips kettle sel de mer | adMart',
                    'es' => 'Patatas kettle sal marina | adMart',
                    'ar' => 'رقائق كيتل ملح البحر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy sea salt kettle chips delivered.',
                    'fr' => 'Achetez des chips kettle au sel de mer livrées.',
                    'es' => 'Compre patatas kettle con sal marina entregadas.',
                    'ar' => 'اشترِ رقائق كيتل بملح البحر ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.00,
                'quantity'        => 180,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sweet Chili Prawn Crackers',
                    'fr' => 'Craquants aux crevettes chili doux',
                    'es' => 'Galletas de camarón con chile dulce',
                    'ar' => 'كراكرز الجمبري بالفلفل الحلو'
                ],
                'description' => [
                    'en' => 'Crunchy prawn crackers with sweet chili flavor.',
                    'fr' => 'Craquants aux crevettes croustillants avec saveur chili doux.',
                    'es' => 'Galletas de camarón crujientes con sabor a chile dulce.',
                    'ar' => 'مقرمشات الجمبري المقرمشة بنكهة الفلفل الحلو.'
                ],
                'meta_title' => [
                    'en' => 'Sweet Chili Prawn Crackers | adMart',
                    'fr' => 'Craquants aux crevettes chili doux | adMart',
                    'es' => 'Galletas de camarón con chile dulce | adMart',
                    'ar' => 'كراكرز الجمبري بالفلفل الحلو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order prawn crackers delivered.',
                    'fr' => 'Commandez des craquants aux crevettes livrés.',
                    'es' => 'Ordene galletas de camarón entregadas.',
                    'ar' => 'اطلب كراكرز الجمبري ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.50,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Veggie Straws',
                    'fr' => 'Pailles de légumes',
                    'es' => 'Pajitas de verduras',
                    'ar' => 'قشور الخضار'
                ],
                'description' => [
                    'en' => 'Straw-shaped crisps made from veggies.',
                    'fr' => 'Croustilles en forme de paille faites de légumes.',
                    'es' => 'Crujientes en forma de pajita hechos de verduras.',
                    'ar' => 'رقائق على شكل قش مصنوعة من الخضار.'
                ],
                'meta_title' => [
                    'en' => 'Veggie Straws | adMart',
                    'fr' => 'Pailles de légumes | adMart',
                    'es' => 'Pajitas de verduras | adMart',
                    'ar' => 'قشور الخضار | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy healthy veggie straws delivered.',
                    'fr' => 'Achetez des pailles de légumes saines livrées.',
                    'es' => 'Compre pajitas de verduras saludables entregadas.',
                    'ar' => 'اشترِ قشور الخضار الصحية ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.20,
                'quantity'        => 120,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sour Cream & Onion Chips',
                    'fr' => 'Chips crème aigre et oignon',
                    'es' => 'Patatas crema agria y cebolla',
                    'ar' => 'رقائق كريمة حامضة وبصل'
                ],
                'description' => [
                    'en' => 'Creamy sour cream and onion flavored chips.',
                    'fr' => 'Chips saveur crème aigre et oignon crémeuse.',
                    'es' => 'Patatas con sabor a crema agria y cebolla cremosas.',
                    'ar' => 'رقائق بنكهة الكريمة الحامضة والبصل الكريمية.'
                ],
                'meta_title' => [
                    'en' => 'Sour Cream Onion Chips | adMart',
                    'fr' => 'Chips crème aigre et oignon | adMart',
                    'es' => 'Patatas crema agria y cebolla | adMart',
                    'ar' => 'رقائق كريمة حامضة وبصل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order sour cream & onion chips delivered.',
                    'fr' => 'Commandez des chips crème aigre et oignon livrées.',
                    'es' => 'Ordene patatas crema agria y cebolla entregadas.',
                    'ar' => 'اطلب رقائق الكريمة الحامضة والبصل ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 1.75,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Wasabi Pea Crisps',
                    'fr' => 'Croustilles de pois au wasabi',
                    'es' => 'Crispis de guisante con wasabi',
                    'ar' => 'رقائق البازلاء بالوسابي'
                ],
                'description' => [
                    'en' => 'Spicy wasabi-coated pea crisps.',
                    'fr' => 'Croustilles de pois enrobées de wasabi épicé.',
                    'es' => 'Crispis de guisante recubiertos de wasabi picante.',
                    'ar' => 'رقائق البازلاء المغطاة بالوسابي الحار.'
                ],
                'meta_title' => [
                    'en' => 'Wasabi Pea Crisps | adMart',
                    'fr' => 'Croustilles de pois au wasabi | adMart',
                    'es' => 'Crispis de guisante con wasabi | adMart',
                    'ar' => 'رقائق البازلاء بالوسابي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy wasabi pea crisps delivered.',
                    'fr' => 'Achetez des croustilles de pois au wasabi livrées.',
                    'es' => 'Compre crispis de guisante con wasabi entregados.',
                    'ar' => 'اشترِ رقائق البازلاء بالوسابي ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.30,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Multigrain Chips',
                    'fr' => 'Chips multigrains',
                    'es' => 'Patatas multigrano',
                    'ar' => 'رقائق متعددة الحبوب'
                ],
                'description' => [
                    'en' => 'Chips made from a blend of grains.',
                    'fr' => 'Chips faites d\'un mélange de céréales.',
                    'es' => 'Patatas hechas de una mezcla de granos.',
                    'ar' => 'رقائق مصنوعة من مزيج من الحبوب.'
                ],
                'meta_title' => [
                    'en' => 'Multigrain Chips | adMart',
                    'fr' => 'Chips multigrains | adMart',
                    'es' => 'Patatas multigrano | adMart',
                    'ar' => 'رقائق متعددة الحبوب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order multigrain chips delivered.',
                    'fr' => 'Commandez des chips multigrains livrées.',
                    'es' => 'Ordene patatas multigrano entregadas.',
                    'ar' => 'اطلب الرقائق متعددة الحبوب ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sweet Potato Chips',
                    'fr' => 'Chips de patates douces',
                    'es' => 'Patatas de boniato',
                    'ar' => 'رقائق البطاطا الحلوة'
                ],
                'description' => [
                    'en' => 'Thinly sliced sweet potato chips, lightly salted.',
                    'fr' => 'Chips de patates douces finement tranchées, légèrement salées.',
                    'es' => 'Patatas de boniato en rodajas finas, ligeramente saladas.',
                    'ar' => 'رقائق بطاطا حلوة مقطعة رقيقة ومملحة قليلاً.'
                ],
                'meta_title' => [
                    'en' => 'Sweet Potato Chips | adMart',
                    'fr' => 'Chips de patates douces | adMart',
                    'es' => 'Patatas de boniato | adMart',
                    'ar' => 'رقائق البطاطا الحلوة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy sweet potato chips delivered.',
                    'fr' => 'Achetez des chips de patates douces livrées.',
                    'es' => 'Compre patatas de boniato entregadas.',
                    'ar' => 'اشترِ رقائق البطاطا الحلوة ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Parmesan Herb Crisps',
                    'fr' => 'Croustilles parmesan et herbes',
                    'es' => 'Crispis de parmesano y hierbas',
                    'ar' => 'رقائق البارميزان والأعشاب'
                ],
                'description' => [
                    'en' => 'Crisps flavored with parmesan and herbs.',
                    'fr' => 'Croustilles aromatisées au parmesan et aux herbes.',
                    'es' => 'Crispis con sabor a parmesano y hierbas.',
                    'ar' => 'رقائق بنكهة البارميزان والأعشاب.'
                ],
                'meta_title' => [
                    'en' => 'Parmesan Herb Crisps | adMart',
                    'fr' => 'Croustilles parmesan et herbes | adMart',
                    'es' => 'Crispis de parmesano y hierbas | adMart',
                    'ar' => 'رقائق البارميزان والأعشاب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order parmesan herb crisps delivered.',
                    'fr' => 'Commandez des croustilles parmesan et herbes livrées.',
                    'es' => 'Ordene crispis de parmesano y hierbas entregados.',
                    'ar' => 'اطلب رقائق البارميزان والأعشاب ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 13,
                'price'           => 2.75,
                'quantity'        => 100,
                'unit'            => 'g'
            ],

            //130-140

            [
                'name' => [
                    'en' => 'Raw Almonds',
                    'fr' => 'Amandes crues',
                    'es' => 'Almendras crudas',
                    'ar' => 'لوز خام'
                ],
                'description' => [
                    'en' => 'Naturally crunchy raw almonds.',
                    'fr' => 'Amandes crues naturellement croquantes.',
                    'es' => 'Almendras crudas naturalmente crujientes.',
                    'ar' => 'لوز خام مقرمش طبيعيًا.'
                ],
                'meta_title' => [
                    'en' => 'Raw Almonds Online | adMart',
                    'fr' => 'Amandes crues en ligne | adMart',
                    'es' => 'Almendras crudas en línea | adMart',
                    'ar' => 'لوز خام عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy raw almonds delivered.',
                    'fr' => 'Achetez des amandes crues livrées.',
                    'es' => 'Compre almendras crudas entregadas.',
                    'ar' => 'اشترِ لوزًا خامًا ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 8.00,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Roasted Cashews',
                    'fr' => 'Noix de cajou grillées',
                    'es' => 'Anacardos tostados',
                    'ar' => 'كاجو محمص'
                ],
                'description' => [
                    'en' => 'Lightly salted roasted cashew nuts.',
                    'fr' => 'Noix de cajou grillées légèrement salées.',
                    'es' => 'Anacardos tostados ligeramente salados.',
                    'ar' => 'كاجو محمص مملح قليلاً.'
                ],
                'meta_title' => [
                    'en' => 'Roasted Cashews | adMart',
                    'fr' => 'Noix de cajou grillées | adMart',
                    'es' => 'Anacardos tostados | adMart',
                    'ar' => 'كاجو محمص | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order roasted cashews delivered.',
                    'fr' => 'Commandez des noix de cajou grillées livrées.',
                    'es' => 'Ordene anacardos tostados entregados.',
                    'ar' => 'اطلب كاجو محمص ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 7.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pumpkin Seeds',
                    'fr' => 'Graines de citrouille',
                    'es' => 'Semillas de calabaza',
                    'ar' => 'بذور اليقطين'
                ],
                'description' => [
                    'en' => 'Shelled pumpkin seeds, high in magnesium.',
                    'fr' => 'Graines de citrouille décortiquées, riches en magnésium.',
                    'es' => 'Semillas de calabaza peladas, ricas en magnesio.',
                    'ar' => 'بذور يقطين مقشرة، غنية بالمغنيسيوم.'
                ],
                'meta_title' => [
                    'en' => 'Pumpkin Seeds Online | adMart',
                    'fr' => 'Graines de citrouille en ligne | adMart',
                    'es' => 'Semillas de calabaza en línea | adMart',
                    'ar' => 'بذور اليقطين عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy pumpkin seeds delivered.',
                    'fr' => 'Achetez des graines de citrouille livrées.',
                    'es' => 'Compre semillas de calabaza entregadas.',
                    'ar' => 'اشترِ بذور اليقطين ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 3.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pistachios (Salted)',
                    'fr' => 'Pistaches (salées)',
                    'es' => 'Pistachos (salados)',
                    'ar' => 'فستق (مملح)'
                ],
                'description' => [
                    'en' => 'Delicious salted pistachio nuts.',
                    'fr' => 'Délicieuses pistaches salées.',
                    'es' => 'Deliciosos pistachos salados.',
                    'ar' => 'فستق لذيذ مملح.'
                ],
                'meta_title' => [
                    'en' => 'Salted Pistachios | adMart',
                    'fr' => 'Pistaches salées | adMart',
                    'es' => 'Pistachos salados | adMart',
                    'ar' => 'فستق مملح | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order salted pistachios delivered.',
                    'fr' => 'Commandez des pistaches salées livrées.',
                    'es' => 'Ordene pistachos salados entregados.',
                    'ar' => 'اطلب فستقًا مملحًا ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 10.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Mixed Nuts',
                    'fr' => 'Mélange de noix',
                    'es' => 'Frutos secos mixtos',
                    'ar' => 'مكسرات متنوعة'
                ],
                'description' => [
                    'en' => 'Blend of almonds, cashews, and walnuts.',
                    'fr' => 'Mélange d\'amandes, de noix de cajou et de noix.',
                    'es' => 'Mezcla de almendras, anacardos y nueces.',
                    'ar' => 'مزيج من اللوز والكاجو والجوز.'
                ],
                'meta_title' => [
                    'en' => 'Mixed Nuts Online | adMart',
                    'fr' => 'Mélange de noix en ligne | adMart',
                    'es' => 'Frutos secos mixtos en línea | adMart',
                    'ar' => 'مكسرات متنوعة عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy mixed nuts delivered.',
                    'fr' => 'Achetez un mélange de noix livré.',
                    'es' => 'Compre frutos secos mixtos entregados.',
                    'ar' => 'اشترِ مكسرات متنوعة ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 9.00,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sunflower Seeds',
                    'fr' => 'Graines de tournesol',
                    'es' => 'Semillas de girasol',
                    'ar' => 'بذور دوار الشمس'
                ],
                'description' => [
                    'en' => 'Roasted sunflower seeds, crunchy snack.',
                    'fr' => 'Graines de tournesol grillées, en-cas croquant.',
                    'es' => 'Semillas de girasol tostadas, snack crujiente.',
                    'ar' => 'بذور دوار الشمس محمصة، وجبة خفيفة مقرمشة.'
                ],
                'meta_title' => [
                    'en' => 'Sunflower Seeds | adMart',
                    'fr' => 'Graines de tournesol | adMart',
                    'es' => 'Semillas de girasol | adMart',
                    'ar' => 'بذور دوار الشمس | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order sunflower seeds delivered.',
                    'fr' => 'Commandez des graines de tournesol livrées.',
                    'es' => 'Ordene semillas de girasol entregadas.',
                    'ar' => 'اطلب بذور دوار الشمس ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 2.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chia Seeds',
                    'fr' => 'Graines de chia',
                    'es' => 'Semillas de chía',
                    'ar' => 'بذور الشيا'
                ],
                'description' => [
                    'en' => 'Nutritious chia seeds, ideal for smoothies and baking.',
                    'fr' => 'Graines de chia nutritives, idéales pour les smoothies et la pâtisserie.',
                    'es' => 'Semillas de chía nutritivas, ideales para batidos y horneados.',
                    'ar' => 'بذور شيا مغذية، مثالية للعصائر والخبز.'
                ],
                'meta_title' => [
                    'en' => 'Chia Seeds Online | adMart',
                    'fr' => 'Graines de chia en ligne | adMart',
                    'es' => 'Semillas de chía en línea | adMart',
                    'ar' => 'بذور الشيا عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy chia seeds delivered for your recipes.',
                    'fr' => 'Achetez des graines de chia livrées pour vos recettes.',
                    'es' => 'Compre semillas de chía entregadas para sus recetas.',
                    'ar' => 'اشترِ بذور الشيا ليتم توصيلها لوصفاتك.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 4.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Walnuts (Halves)',
                    'fr' => 'Noix (moitiés)',
                    'es' => 'Nueces (mitades)',
                    'ar' => 'جوز (أنصاف)'
                ],
                'description' => [
                    'en' => 'Fresh walnut halves, rich in omega-3.',
                    'fr' => 'Moitiés de noix fraîches, riches en oméga-3.',
                    'es' => 'Mitades de nueces frescas, ricas en omega-3.',
                    'ar' => 'أنصاف جوز طازجة، غنية بأوميغا 3.'
                ],
                'meta_title' => [
                    'en' => 'Walnut Halves | adMart',
                    'fr' => 'Moitiés de noix | adMart',
                    'es' => 'Mitades de nueces | adMart',
                    'ar' => 'أنصاف الجوز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order walnut halves delivered for healthy snacking.',
                    'fr' => 'Commandez des moitiés de noix livrées pour des collations saines.',
                    'es' => 'Ordene mitades de nueces entregadas para refrigerios saludables.',
                    'ar' => 'اطلب أنصاف الجوز ليتم توصيلها لوجبات خفيفة صحية.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 9.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Flax Seeds',
                    'fr' => 'Graines de lin',
                    'es' => 'Semillas de lino',
                    'ar' => 'بذور الكتان'
                ],
                'description' => [
                    'en' => 'Ground flax seeds, perfect for cereals and smoothies.',
                    'fr' => 'Graines de lin moulues, parfaites pour les céréales et les smoothies.',
                    'es' => 'Semillas de lino molidas, perfectas para cereales y batidos.',
                    'ar' => 'بذور كتان مطحونة، مثالية للحبوب والعصائر.'
                ],
                'meta_title' => [
                    'en' => 'Flax Seeds Online | adMart',
                    'fr' => 'Graines de lin en ligne | adMart',
                    'es' => 'Semillas de lino en línea | adMart',
                    'ar' => 'بذور الكتان عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy ground flax seeds delivered fresh.',
                    'fr' => 'Achetez des graines de lin moulues livrées fraîches.',
                    'es' => 'Compre semillas de lino molidas entregadas frescas.',
                    'ar' => 'اشترِ بذور الكتان المطحونة ليتم توصيلها طازجة.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 3.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Brazil Nuts',
                    'fr' => 'Noix du Brésil',
                    'es' => 'Nueces de Brasil',
                    'ar' => 'جوز البرازيل'
                ],
                'description' => [
                    'en' => 'Creamy Brazil nuts, rich in selenium.',
                    'fr' => 'Noix du Brésil crémeuses, riches en sélénium.',
                    'es' => 'Nueces de Brasil cremosas, ricas en selenio.',
                    'ar' => 'جوز برازيل كريمي، غني بالسيلينيوم.'
                ],
                'meta_title' => [
                    'en' => 'Brazil Nuts | adMart',
                    'fr' => 'Noix du Brésil | adMart',
                    'es' => 'Nueces de Brasil | adMart',
                    'ar' => 'جوز البرازيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order Brazil nuts delivered for healthy snacking.',
                    'fr' => 'Commandez des noix du Brésil livrées pour des collations saines.',
                    'es' => 'Ordene nueces de Brasil entregadas para refrigerios saludables.',
                    'ar' => 'اطلب جوز البرازيل ليتم توصيله لوجبات خفيفة صحية.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 11.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],

            //140-150

            [
                'name' => [
                    'en' => 'Raw Almonds',
                    'fr' => 'Amandes crues',
                    'es' => 'Almendras crudas',
                    'ar' => 'لوز خام'
                ],
                'description' => [
                    'en' => 'Naturally crunchy raw almonds.',
                    'fr' => 'Amandes crues naturellement croquantes.',
                    'es' => 'Almendras crudas naturalmente crujientes.',
                    'ar' => 'لوز خام مقرمش طبيعيًا.'
                ],
                'meta_title' => [
                    'en' => 'Raw Almonds Online | adMart',
                    'fr' => 'Amandes crues en ligne | adMart',
                    'es' => 'Almendras crudas en línea | adMart',
                    'ar' => 'لوز خام عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy raw almonds delivered.',
                    'fr' => 'Achetez des amandes crues livrées.',
                    'es' => 'Compre almendras crudas entregadas.',
                    'ar' => 'اشترِ لوزًا خامًا ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 8.00,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Roasted Cashews',
                    'fr' => 'Noix de cajou grillées',
                    'es' => 'Anacardos tostados',
                    'ar' => 'كاجو محمص'
                ],
                'description' => [
                    'en' => 'Lightly salted roasted cashew nuts.',
                    'fr' => 'Noix de cajou grillées légèrement salées.',
                    'es' => 'Anacardos tostados ligeramente salados.',
                    'ar' => 'كاجو محمص مملح قليلاً.'
                ],
                'meta_title' => [
                    'en' => 'Roasted Cashews | adMart',
                    'fr' => 'Noix de cajou grillées | adMart',
                    'es' => 'Anacardos tostados | adMart',
                    'ar' => 'كاجو محمص | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order roasted cashews delivered.',
                    'fr' => 'Commandez des noix de cajou grillées livrées.',
                    'es' => 'Ordene anacardos tostados entregados.',
                    'ar' => 'اطلب كاجو محمص ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 7.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pumpkin Seeds',
                    'fr' => 'Graines de citrouille',
                    'es' => 'Semillas de calabaza',
                    'ar' => 'بذور اليقطين'
                ],
                'description' => [
                    'en' => 'Shelled pumpkin seeds, high in magnesium.',
                    'fr' => 'Graines de citrouille décortiquées, riches en magnésium.',
                    'es' => 'Semillas de calabaza peladas, ricas en magnesio.',
                    'ar' => 'بذور يقطين مقشرة، غنية بالمغنيسيوم.'
                ],
                'meta_title' => [
                    'en' => 'Pumpkin Seeds Online | adMart',
                    'fr' => 'Graines de citrouille en ligne | adMart',
                    'es' => 'Semillas de calabaza en línea | adMart',
                    'ar' => 'بذور اليقطين عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy pumpkin seeds delivered.',
                    'fr' => 'Achetez des graines de citrouille livrées.',
                    'es' => 'Compre semillas de calabaza entregadas.',
                    'ar' => 'اشترِ بذور اليقطين ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 3.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pistachios (Salted)',
                    'fr' => 'Pistaches (salées)',
                    'es' => 'Pistachos (salados)',
                    'ar' => 'فستق (مملح)'
                ],
                'description' => [
                    'en' => 'Delicious salted pistachio nuts.',
                    'fr' => 'Délicieuses pistaches salées.',
                    'es' => 'Deliciosos pistachos salados.',
                    'ar' => 'فستق لذيذ مملح.'
                ],
                'meta_title' => [
                    'en' => 'Salted Pistachios | adMart',
                    'fr' => 'Pistaches salées | adMart',
                    'es' => 'Pistachos salados | adMart',
                    'ar' => 'فستق مملح | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order salted pistachios delivered.',
                    'fr' => 'Commandez des pistaches salées livrées.',
                    'es' => 'Ordene pistachos salados entregados.',
                    'ar' => 'اطلب فستقًا مملحًا ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 10.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Mixed Nuts',
                    'fr' => 'Mélange de noix',
                    'es' => 'Frutos secos mixtos',
                    'ar' => 'مكسرات متنوعة'
                ],
                'description' => [
                    'en' => 'Blend of almonds, cashews, and walnuts.',
                    'fr' => 'Mélange d\'amandes, de noix de cajou et de noix.',
                    'es' => 'Mezcla de almendras, anacardos y nueces.',
                    'ar' => 'مزيج من اللوز والكاجو والجوز.'
                ],
                'meta_title' => [
                    'en' => 'Mixed Nuts Online | adMart',
                    'fr' => 'Mélange de noix en ligne | adMart',
                    'es' => 'Frutos secos mixtos en línea | adMart',
                    'ar' => 'مكسرات متنوعة عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy mixed nuts delivered.',
                    'fr' => 'Achetez un mélange de noix livré.',
                    'es' => 'Compre frutos secos mixtos entregados.',
                    'ar' => 'اشترِ مكسرات متنوعة ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 9.00,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sunflower Seeds',
                    'fr' => 'Graines de tournesol',
                    'es' => 'Semillas de girasol',
                    'ar' => 'بذور دوار الشمس'
                ],
                'description' => [
                    'en' => 'Roasted sunflower seeds, crunchy snack.',
                    'fr' => 'Graines de tournesol grillées, en-cas croquant.',
                    'es' => 'Semillas de girasol tostadas, snack crujiente.',
                    'ar' => 'بذور دوار الشمس محمصة، وجبة خفيفة مقرمشة.'
                ],
                'meta_title' => [
                    'en' => 'Sunflower Seeds | adMart',
                    'fr' => 'Graines de tournesol | adMart',
                    'es' => 'Semillas de girasol | adMart',
                    'ar' => 'بذور دوار الشمس | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order sunflower seeds delivered.',
                    'fr' => 'Commandez des graines de tournesol livrées.',
                    'es' => 'Ordene semillas de girasol entregadas.',
                    'ar' => 'اطلب بذور دوار الشمس ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 2.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chia Seeds',
                    'fr' => 'Graines de chia',
                    'es' => 'Semillas de chía',
                    'ar' => 'بذور الشيا'
                ],
                'description' => [
                    'en' => 'Nutritious chia seeds, ideal for smoothies and baking.',
                    'fr' => 'Graines de chia nutritives, idéales pour les smoothies et la pâtisserie.',
                    'es' => 'Semillas de chía nutritivas, ideales para batidos y horneados.',
                    'ar' => 'بذور شيا مغذية، مثالية للعصائر والخبز.'
                ],
                'meta_title' => [
                    'en' => 'Chia Seeds Online | adMart',
                    'fr' => 'Graines de chia en ligne | adMart',
                    'es' => 'Semillas de chía en línea | adMart',
                    'ar' => 'بذور الشيا عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy chia seeds delivered for your recipes.',
                    'fr' => 'Achetez des graines de chia livrées pour vos recettes.',
                    'es' => 'Compre semillas de chía entregadas para sus recetas.',
                    'ar' => 'اشترِ بذور الشيا ليتم توصيلها لوصفاتك.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 4.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Walnuts (Halves)',
                    'fr' => 'Noix (moitiés)',
                    'es' => 'Nueces (mitades)',
                    'ar' => 'جوز (أنصاف)'
                ],
                'description' => [
                    'en' => 'Fresh walnut halves, rich in omega-3.',
                    'fr' => 'Moitiés de noix fraîches, riches en oméga-3.',
                    'es' => 'Mitades de nueces frescas, ricas en omega-3.',
                    'ar' => 'أنصاف جوز طازجة، غنية بأوميغا 3.'
                ],
                'meta_title' => [
                    'en' => 'Walnut Halves | adMart',
                    'fr' => 'Moitiés de noix | adMart',
                    'es' => 'Mitades de nueces | adMart',
                    'ar' => 'أنصاف الجوز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order walnut halves delivered for healthy snacking.',
                    'fr' => 'Commandez des moitiés de noix livrées pour des collations saines.',
                    'es' => 'Ordene mitades de nueces entregadas para refrigerios saludables.',
                    'ar' => 'اطلب أنصاف الجوز ليتم توصيلها لوجبات خفيفة صحية.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 9.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Flax Seeds',
                    'fr' => 'Graines de lin',
                    'es' => 'Semillas de lino',
                    'ar' => 'بذور الكتان'
                ],
                'description' => [
                    'en' => 'Ground flax seeds, perfect for cereals and smoothies.',
                    'fr' => 'Graines de lin moulues, parfaites pour les céréales et les smoothies.',
                    'es' => 'Semillas de lino molidas, perfectas para cereales y batidos.',
                    'ar' => 'بذور كتان مطحونة، مثالية للحبوب والعصائر.'
                ],
                'meta_title' => [
                    'en' => 'Flax Seeds Online | adMart',
                    'fr' => 'Graines de lin en ligne | adMart',
                    'es' => 'Semillas de lino en línea | adMart',
                    'ar' => 'بذور الكتان عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy ground flax seeds delivered fresh.',
                    'fr' => 'Achetez des graines de lin moulues livrées fraîches.',
                    'es' => 'Compre semillas de lino molidas entregadas frescas.',
                    'ar' => 'اشترِ بذور الكتان المطحونة ليتم توصيلها طازجة.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 3.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Brazil Nuts',
                    'fr' => 'Noix du Brésil',
                    'es' => 'Nueces de Brasil',
                    'ar' => 'جوز البرازيل'
                ],
                'description' => [
                    'en' => 'Creamy Brazil nuts, rich in selenium.',
                    'fr' => 'Noix du Brésil crémeuses, riches en sélénium.',
                    'es' => 'Nueces de Brasil cremosas, ricas en selenio.',
                    'ar' => 'جوز برازيل كريمي، غني بالسيلينيوم.'
                ],
                'meta_title' => [
                    'en' => 'Brazil Nuts | adMart',
                    'fr' => 'Noix du Brésil | adMart',
                    'es' => 'Nueces de Brasil | adMart',
                    'ar' => 'جوز البرازيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order Brazil nuts delivered for healthy snacking.',
                    'fr' => 'Commandez des noix du Brésil livrées pour des collations saines.',
                    'es' => 'Ordene nueces de Brasil entregadas para refrigerios saludables.',
                    'ar' => 'اطلب جوز البرازيل ليتم توصيله لوجبات خفيفة صحية.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 14,
                'price'           => 11.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],

            //150-160


            [
                'name' => [
                    'en' => 'Butter Cookies',
                    'fr' => 'Biscuits au beurre',
                    'es' => 'Galletas de mantequilla',
                    'ar' => 'بسكويت زبدة'
                ],
                'description' => [
                    'en' => 'Classic buttery cookies, melt-in-mouth texture.',
                    'fr' => 'Biscuits classiques au beurre, texture fondante.',
                    'es' => 'Galletas clásicas de mantequilla, textura que se derrite en la boca.',
                    'ar' => 'بسكويت زبدة كلاسيكي، يذوب في الفم.'
                ],
                'meta_title' => [
                    'en' => 'Butter Cookies Online | adMart',
                    'fr' => 'Biscuits au beurre en ligne | adMart',
                    'es' => 'Galletas de mantequilla en línea | adMart',
                    'ar' => 'بسكويت زبدة عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy buttery cookies delivered fresh.',
                    'fr' => 'Achetez des biscuits au beurre livrés frais.',
                    'es' => 'Compre galletas de mantequilla entregadas frescas.',
                    'ar' => 'اشترِ بسكويت زبدة ليتم توصيله طازجًا.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Digestive Biscuits',
                    'fr' => 'Biscuits digestifs',
                    'es' => 'Galletas digestivas',
                    'ar' => 'بسكويت هضمي'
                ],
                'description' => [
                    'en' => 'Whole wheat digestive biscuits, lightly sweetened.',
                    'fr' => 'Biscuits digestifs à base de blé complet, légèrement sucrés.',
                    'es' => 'Galletas digestivas de trigo integral, ligeramente endulzadas.',
                    'ar' => 'بسكويت هضمي من القمح الكامل، محلى قليلاً.'
                ],
                'meta_title' => [
                    'en' => 'Digestive Biscuits | adMart',
                    'fr' => 'Biscuits digestifs | adMart',
                    'es' => 'Galletas digestivas | adMart',
                    'ar' => 'بسكويت هضمي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order digestive biscuits delivered.',
                    'fr' => 'Commandez des biscuits digestifs livrés.',
                    'es' => 'Ordene galletas digestivas entregadas.',
                    'ar' => 'اطلب بسكويت هضمي ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 1.80,
                'quantity'        => 250,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Cheese Crackers',
                    'fr' => 'Craquelins au fromage',
                    'es' => 'Galletas saladas de queso',
                    'ar' => 'كراكرز الجبن'
                ],
                'description' => [
                    'en' => 'Savory cheese-flavored crackers.',
                    'fr' => 'Craquelins savoureux au goût de fromage.',
                    'es' => 'Galletas saladas con sabor a queso.',
                    'ar' => 'كراكرز بنكهة الجبن اللذيذة.'
                ],
                'meta_title' => [
                    'en' => 'Cheese Crackers Online | adMart',
                    'fr' => 'Craquelins au fromage en ligne | adMart',
                    'es' => 'Galletas saladas de queso en línea | adMart',
                    'ar' => 'كراكرز الجبن عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy cheese crackers delivered.',
                    'fr' => 'Achetez des craquelins au fromage livrés.',
                    'es' => 'Compre galletas saladas de queso entregadas.',
                    'ar' => 'اشترِ كراكرز الجبن ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.20,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Oatmeal Raisin Cookies',
                    'fr' => 'Biscuits aux flocons d\'avoine et raisins secs',
                    'es' => 'Galletas de avena con pasas',
                    'ar' => 'بسكويت الشوفان مع الزبيب'
                ],
                'description' => [
                    'en' => 'Soft oatmeal cookies with plump raisins.',
                    'fr' => 'Biscuits moelleux aux flocons d\'avoine avec raisins secs moelleux.',
                    'es' => 'Galletas suaves de avena con pasas jugosas.',
                    'ar' => 'بسكويت شوفان طري مع زبيب ممتلئ.'
                ],
                'meta_title' => [
                    'en' => 'Oatmeal Raisin Cookies | adMart',
                    'fr' => 'Biscuits avoine et raisins secs | adMart',
                    'es' => 'Galletas de avena con pasas | adMart',
                    'ar' => 'بسكويت الشوفان مع الزبيب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order oatmeal raisin cookies delivered.',
                    'fr' => 'Commandez des biscuits aux flocons d\'avoine et raisins secs livrés.',
                    'es' => 'Ordene galletas de avena con pasas entregadas.',
                    'ar' => 'اطلب بسكويت الشوفان مع الزبيب ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Saltine Crackers',
                    'fr' => 'Craquelins salés',
                    'es' => 'Galletas saltinas',
                    'ar' => 'كراكرز مملحة'
                ],
                'description' => [
                    'en' => 'Light and crispy saltine crackers.',
                    'fr' => 'Craquelins salés légers et croustillants.',
                    'es' => 'Galletas saltinas ligeras y crujientes.',
                    'ar' => 'كراكرز مملحة خفيفة ومقرمشة.'
                ],
                'meta_title' => [
                    'en' => 'Saltine Crackers | adMart',
                    'fr' => 'Craquelins salés | adMart',
                    'es' => 'Galletas saltinas | adMart',
                    'ar' => 'كراكرز مملحة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy saltine crackers delivered.',
                    'fr' => 'Achetez des craquelins salés livrés.',
                    'es' => 'Compre galletas saltinas entregadas.',
                    'ar' => 'اشترِ كراكرز مملحة ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 1.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chocolate Chip Cookies',
                    'fr' => 'Biscuits aux pépites de chocolat',
                    'es' => 'Galletas con chispas de chocolate',
                    'ar' => 'بسكويت رقائق الشوكولاتة'
                ],
                'description' => [
                    'en' => 'Classic cookies studded with chocolate chips.',
                    'fr' => 'Biscuits classiques parsemés de pépites de chocolat.',
                    'es' => 'Galletas clásicas con chispas de chocolate.',
                    'ar' => 'بسكويت كلاسيكي مرصع برقائق الشوكولاتة.'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Chip Cookies | adMart',
                    'fr' => 'Biscuits aux pépites de chocolat | adMart',
                    'es' => 'Galletas con chispas de chocolate | adMart',
                    'ar' => 'بسكويت رقائق الشوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order chocolate chip cookies delivered.',
                    'fr' => 'Commandez des biscuits aux pépites de chocolat livrés.',
                    'es' => 'Ordene galletas con chispas de chocolate entregadas.',
                    'ar' => 'اطلب بسكويت رقائق الشوكولاتة ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.75,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Multigrain Crackers',
                    'fr' => 'Craquelins multigrains',
                    'es' => 'Galletas multicereales',
                    'ar' => 'كراكرز متعددة الحبوب'
                ],
                'description' => [
                    'en' => 'Crunchy crackers made with multiple grains.',
                    'fr' => 'Craquelins croustillants faits de plusieurs céréales.',
                    'es' => 'Galletas crujientes hechas con múltiples cereales.',
                    'ar' => 'كراكرز مقرمشة مصنوعة من حبوب متعددة.'
                ],
                'meta_title' => [
                    'en' => 'Multigrain Crackers | adMart',
                    'fr' => 'Craquelins multigrains | adMart',
                    'es' => 'Galletas multicereales | adMart',
                    'ar' => 'كراكرز متعددة الحبوب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy multigrain crackers delivered.',
                    'fr' => 'Achetez des craquelins multigrains livrés.',
                    'es' => 'Compre galletas multicereales entregadas.',
                    'ar' => 'اشترِ كراكرز متعددة الحبوب ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.30,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Ginger Biscuits',
                    'fr' => 'Biscuits au gingembre',
                    'es' => 'Galletas de jengibre',
                    'ar' => 'بسكويت الزنجبيل'
                ],
                'description' => [
                    'en' => 'Spicy ginger-flavored biscuits.',
                    'fr' => 'Biscuits épicés au goût de gingembre.',
                    'es' => 'Galletas con sabor picante a jengibre.',
                    'ar' => 'بسكويت بنكهة الزنجبيل الحارة.'
                ],
                'meta_title' => [
                    'en' => 'Ginger Biscuits | adMart',
                    'fr' => 'Biscuits au gingembre | adMart',
                    'es' => 'Galletas de jengibre | adMart',
                    'ar' => 'بسكويت الزنجبيل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order ginger biscuits delivered.',
                    'fr' => 'Commandez des biscuits au gingembre livrés.',
                    'es' => 'Ordene galletas de jengibre entregadas.',
                    'ar' => 'اطلب بسكويت الزنجبيل ليتم توصيله.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.00,
                'quantity'        => 175,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pretzel Crisps',
                    'fr' => 'Bretzels croustillants',
                    'es' => 'Galletas pretzel',
                    'ar' => 'رقائق البريتزل'
                ],
                'description' => [
                    'en' => 'Thin, crispy pretzel crackers.',
                    'fr' => 'Craquelins bretzel fins et croustillants.',
                    'es' => 'Galletas pretzel finas y crujientes.',
                    'ar' => 'رقائق بريتزل رقيقة ومقرمشة.'
                ],
                'meta_title' => [
                    'en' => 'Pretzel Crisps | adMart',
                    'fr' => 'Bretzels croustillants | adMart',
                    'es' => 'Galletas pretzel | adMart',
                    'ar' => 'رقائق البريتزل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy pretzel crisps delivered.',
                    'fr' => 'Achetez des bretzels croustillants livrés.',
                    'es' => 'Compre galletas pretzel entregadas.',
                    'ar' => 'اشترِ رقائق البريتزل ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 2.50,
                'quantity'        => 120,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Shortbread Fingers',
                    'fr' => 'Biscuits sablés en bâtonnets',
                    'es' => 'Galletas de manteca en dedos',
                    'ar' => 'أصابع شورت بريد'
                ],
                'description' => [
                    'en' => 'Buttery shortbread fingers, ideal with tea.',
                    'fr' => 'Bâtonnets sablés au beurre, idéaux avec le thé.',
                    'es' => 'Dedos de galleta de manteca, ideales con té.',
                    'ar' => 'أصابع شورت بريد زبدية، مثالية مع الشاي.'
                ],
                'meta_title' => [
                    'en' => 'Shortbread Fingers | adMart',
                    'fr' => 'Bâtonnets sablés | adMart',
                    'es' => 'Dedos de galleta de manteca | adMart',
                    'ar' => 'أصابع شورت بريد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order shortbread fingers delivered.',
                    'fr' => 'Commandez des bâtonnets sablés livrés.',
                    'es' => 'Ordene dedos de galleta de manteca entregados.',
                    'ar' => 'اطلب أصابع شورت بريد ليتم توصيلها.'
                ],
                'category_id'     => 5,
                'sub_category_id' => 15,
                'price'           => 3.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],

            //160-170

            [
                'name' => [
                    'en' => 'Sourdough Loaf',
                    'fr' => 'Pain au levain',
                    'es' => 'Pan de masa madre',
                    'ar' => 'رغيف خبز العجين المخمر'
                ],
                'description' => [
                    'en' => 'Artisan sourdough bread with crisp crust.',
                    'fr' => 'Pain au levain artisanal avec croûte croustillante.',
                    'es' => 'Pan de masa madre artesanal con corteza crujiente.',
                    'ar' => 'خبز العجين المخمر الحرفي بقشرة مقرمشة.'
                ],
                'meta_title' => [
                    'en' => 'Artisan Sourdough Loaf | adMart',
                    'fr' => 'Pain au levain artisanal | adMart',
                    'es' => 'Pan de masa madre artesanal | adMart',
                    'ar' => 'رغيف خبز العجين المخمر الحرفي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh sourdough loaf delivered.',
                    'fr' => 'Commandez un pain au levain frais livré.',
                    'es' => 'Ordene pan de masa madre fresco entregado.',
                    'ar' => 'اطلب رغيف خبز العجين المخمر الطازج ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 4.00,
                'quantity'        => 1,
                'unit'            => 'loaf'
            ],
            [
                'name' => [
                    'en' => 'Whole Wheat Bread',
                    'fr' => 'Pain complet',
                    'es' => 'Pan integral',
                    'ar' => 'خبز القمح الكامل'
                ],
                'description' => [
                    'en' => 'Soft whole wheat bread, high fiber.',
                    'fr' => 'Pain complet moelleux, riche en fibres.',
                    'es' => 'Pan integral suave, alto en fibra.',
                    'ar' => 'خبز قمح كامل طري، غني بالألياف.'
                ],
                'meta_title' => [
                    'en' => 'Whole Wheat Bread | adMart',
                    'fr' => 'Pain complet | adMart',
                    'es' => 'Pan integral | adMart',
                    'ar' => 'خبز القمح الكامل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy whole wheat bread delivered.',
                    'fr' => 'Achetez du pain complet livré.',
                    'es' => 'Compre pan integral entregado.',
                    'ar' => 'اشترِ خبز القمح الكامل ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 3.50,
                'quantity'        => 1,
                'unit'            => 'loaf'
            ],
            [
                'name' => [
                    'en' => 'Baguette',
                    'fr' => 'Baguette',
                    'es' => 'Baguette',
                    'ar' => 'الباغيت'
                ],
                'description' => [
                    'en' => 'Classic French baguette, crispy exterior.',
                    'fr' => 'Baguette française classique, extérieur croustillant.',
                    'es' => 'Baguette francesa clásica, exterior crujiente.',
                    'ar' => 'باغيت فرنسي كلاسيكي بقشرة خارجية مقرمشة.'
                ],
                'meta_title' => [
                    'en' => 'French Baguette | adMart',
                    'fr' => 'Baguette française | adMart',
                    'es' => 'Baguette francesa | adMart',
                    'ar' => 'الباغيت الفرنسي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh baguette delivered.',
                    'fr' => 'Commandez une baguette fraîche livrée.',
                    'es' => 'Ordene baguette fresca entregada.',
                    'ar' => 'اطلب باغيت طازج ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 2.20,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Multigrain Loaf',
                    'fr' => 'Pain multigrains',
                    'es' => 'Pan multicereal',
                    'ar' => 'رغيف متعدد الحبوب'
                ],
                'description' => [
                    'en' => 'Loaf made with a blend of grains and seeds.',
                    'fr' => 'Pain fait avec un mélange de céréales et graines.',
                    'es' => 'Pan hecho con una mezcla de cereales y semillas.',
                    'ar' => 'رغيف مصنوع من مزيج من الحبوب والبذور.'
                ],
                'meta_title' => [
                    'en' => 'Multigrain Loaf | adMart',
                    'fr' => 'Pain multigrains | adMart',
                    'es' => 'Pan multicereal | adMart',
                    'ar' => 'رغيف متعدد الحبوب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy multigrain loaf delivered.',
                    'fr' => 'Achetez du pain multigrains livré.',
                    'es' => 'Compre pan multicereal entregado.',
                    'ar' => 'اشترِ رغيفًا متعدد الحبوب ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 4.50,
                'quantity'        => 1,
                'unit'            => 'loaf'
            ],
            [
                'name' => [
                    'en' => 'Ciabatta',
                    'fr' => 'Ciabatta',
                    'es' => 'Ciabatta',
                    'ar' => 'تشاباتا'
                ],
                'description' => [
                    'en' => 'Soft Italian ciabatta bread with airy crumb.',
                    'fr' => 'Pain italien ciabatta moelleux avec mie aérée.',
                    'es' => 'Pan italiano ciabatta suave con miga aireada.',
                    'ar' => 'خبز تشاباتا الإيطالي الطري مع فتات هوائي.'
                ],
                'meta_title' => [
                    'en' => 'Ciabatta Bread | adMart',
                    'fr' => 'Pain ciabatta | adMart',
                    'es' => 'Pan ciabatta | adMart',
                    'ar' => 'خبز التشاباتا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh ciabatta delivered.',
                    'fr' => 'Commandez de la ciabatta fraîche livrée.',
                    'es' => 'Ordene ciabatta fresca entregada.',
                    'ar' => 'اطلب خبز تشاباتا طازج ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Rye Bread',
                    'fr' => 'Pain de seigle',
                    'es' => 'Pan de centeno',
                    'ar' => 'خبز الجاودار'
                ],
                'description' => [
                    'en' => 'Dense rye bread, rich flavor.',
                    'fr' => 'Pain de seigle dense, saveur riche.',
                    'es' => 'Pan de centeno denso, sabor intenso.',
                    'ar' => 'خبز جاودار كثيف، بنكهة غنية.'
                ],
                'meta_title' => [
                    'en' => 'Rye Bread Online | adMart',
                    'fr' => 'Pain de seigle en ligne | adMart',
                    'es' => 'Pan de centeno en línea | adMart',
                    'ar' => 'خبز الجاودار عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy rye bread delivered.',
                    'fr' => 'Achetez du pain de seigle livré.',
                    'es' => 'Compre pan de centeno entregado.',
                    'ar' => 'اشترِ خبز الجاودار ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 3.75,
                'quantity'        => 1,
                'unit'            => 'loaf'
            ],
            [
                'name' => [
                    'en' => 'Brioche',
                    'fr' => 'Brioche',
                    'es' => 'Brioche',
                    'ar' => 'بريوش'
                ],
                'description' => [
                    'en' => 'Buttery brioche loaf, soft texture.',
                    'fr' => 'Brioche au beurre, texture moelleuse.',
                    'es' => 'Pan brioche mantecoso, textura suave.',
                    'ar' => 'رغيف بريوش زبدي، ملمس ناعم.'
                ],
                'meta_title' => [
                    'en' => 'Brioche Loaf | adMart',
                    'fr' => 'Brioche | adMart',
                    'es' => 'Pan brioche | adMart',
                    'ar' => 'رغيف البريوش | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order brioche delivered fresh.',
                    'fr' => 'Commandez de la brioche fraîche livrée.',
                    'es' => 'Ordene brioche fresca entregada.',
                    'ar' => 'اطلب البريوش ليتم توصيله طازجًا.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 5.00,
                'quantity'        => 1,
                'unit'            => 'loaf'
            ],
            [
                'name' => [
                    'en' => 'Pita Bread',
                    'fr' => 'Pain pita',
                    'es' => 'Pan pita',
                    'ar' => 'خبز بيتا'
                ],
                'description' => [
                    'en' => 'Soft and versatile pita pockets.',
                    'fr' => 'Pains pita moelleux et polyvalents.',
                    'es' => 'Pan pita suave y versátil.',
                    'ar' => 'جيب خبز بيتا الطري والمتعدد الاستخدامات.'
                ],
                'meta_title' => [
                    'en' => 'Pita Bread Online | adMart',
                    'fr' => 'Pain pita en ligne | adMart',
                    'es' => 'Pan pita en línea | adMart',
                    'ar' => 'خبز بيتا عبر الإنترنت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy pita bread delivered.',
                    'fr' => 'Achetez du pain pita livré.',
                    'es' => 'Compre pan pita entregado.',
                    'ar' => 'اشترِ خبز بيتا ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 2.00,
                'quantity'        => 6,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Focaccia',
                    'fr' => 'Focaccia',
                    'es' => 'Focaccia',
                    'ar' => 'فوكاتشا'
                ],
                'description' => [
                    'en' => 'Herbed Italian flatbread with olive oil.',
                    'fr' => 'Pain plat italien aux herbes avec huile d\'olive.',
                    'es' => 'Pan plano italiano con hierbas y aceite de oliva.',
                    'ar' => 'خبز مسطح إيطالي مع أعشاب وزيت الزيتون.'
                ],
                'meta_title' => [
                    'en' => 'Focaccia Bread | adMart',
                    'fr' => 'Focaccia | adMart',
                    'es' => 'Pan focaccia | adMart',
                    'ar' => 'خبز الفوكاتشا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh focaccia delivered.',
                    'fr' => 'Commandez de la focaccia fraîche livrée.',
                    'es' => 'Ordene focaccia fresca entregada.',
                    'ar' => 'اطلب فوكاتشا طازجة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 4.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Garlic Bread',
                    'fr' => 'Pain à l\'ail',
                    'es' => 'Pan de ajo',
                    'ar' => 'خبز الثوم'
                ],
                'description' => [
                    'en' => 'Baguette topped with garlic butter.',
                    'fr' => 'Baguette garnie de beurre à l\'ail.',
                    'es' => 'Baguette cubierta con mantequilla de ajo.',
                    'ar' => 'باغيت مغطى بزبدة الثوم.'
                ],
                'meta_title' => [
                    'en' => 'Garlic Bread | adMart',
                    'fr' => 'Pain à l\'ail | adMart',
                    'es' => 'Pan de ajo | adMart',
                    'ar' => 'خبز الثوم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy garlic bread delivered.',
                    'fr' => 'Achetez du pain à l\'ail livré.',
                    'es' => 'Compre pan de ajo entregado.',
                    'ar' => 'اشترِ خبز الثوم ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 16,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],


            //170-180

            [
                'name' => [
                    'en' => 'Croissant',
                    'fr' => 'Croissant',
                    'es' => 'Croissant',
                    'ar' => 'كرواسون'
                ],
                'description' => [
                    'en' => 'Buttery French croissant, flaky layers.',
                    'fr' => 'Croissant français au beurre, feuilleté.',
                    'es' => 'Croissant francés mantecoso, capas hojaldradas.',
                    'ar' => 'كرواسون فرنسي زبدي، طبقات متقشرة.'
                ],
                'meta_title' => [
                    'en' => 'Croissant | adMart',
                    'fr' => 'Croissant | adMart',
                    'es' => 'Croissant | adMart',
                    'ar' => 'كرواسون | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh buttery croissants delivered.',
                    'fr' => 'Commandez des croissants frais et beurrés livrés.',
                    'es' => 'Ordene croissants mantecosos frescos entregados.',
                    'ar' => 'اطلب كرواسون طازج زبدي ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Danish Pastry',
                    'fr' => 'Viennoiserie danoise',
                    'es' => 'Pastelería danesa',
                    'ar' => 'معجنات دنماركية'
                ],
                'description' => [
                    'en' => 'Fruit-filled Danish pastry, sweet glaze.',
                    'fr' => 'Viennoiserie danoise fourrée aux fruits, glaçage sucré.',
                    'es' => 'Pastelería danesa rellena de frutas, glaseado dulce.',
                    'ar' => 'معجنات دنماركية محشوة بالفواكه، مع طبقة سكرية.'
                ],
                'meta_title' => [
                    'en' => 'Danish Pastry | adMart',
                    'fr' => 'Viennoiserie danoise | adMart',
                    'es' => 'Pastelería danesa | adMart',
                    'ar' => 'معجنات دنماركية | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy Danish pastries delivered.',
                    'fr' => 'Achetez des viennoiseries danoises livrées.',
                    'es' => 'Compre pastelería danesa entregada.',
                    'ar' => 'اشترِ معجنات دنماركية ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Pain au Chocolat',
                    'fr' => 'Pain au chocolat',
                    'es' => 'Pain au chocolat',
                    'ar' => 'بان أو شوكولا'
                ],
                'description' => [
                    'en' => 'Flaky pastry with chocolate filling.',
                    'fr' => 'Pâte feuilletée avec garniture au chocolat.',
                    'es' => 'Masa hojaldrada con relleno de chocolate.',
                    'ar' => 'معجنات متقشرة مع حشوة الشوكولاتة.'
                ],
                'meta_title' => [
                    'en' => 'Pain au Chocolat | adMart',
                    'fr' => 'Pain au chocolat | adMart',
                    'es' => 'Pain au chocolat | adMart',
                    'ar' => 'بان أو شوكولا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order pain au chocolat delivered.',
                    'fr' => 'Commandez des pains au chocolat livrés.',
                    'es' => 'Ordene pain au chocolat entregado.',
                    'ar' => 'اطلب بان أو شوكولا ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.25,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Cinnamon Roll',
                    'fr' => 'Roulé à la cannelle',
                    'es' => 'Rollito de canela',
                    'ar' => 'لفافة القرفة'
                ],
                'description' => [
                    'en' => 'Soft roll with cinnamon sugar swirl and icing.',
                    'fr' => 'Roulé moelleux avec spirale de cannelle-sucre et glaçage.',
                    'es' => 'Rollito suave con espiral de azúcar y canela y glaseado.',
                    'ar' => 'لفافة طرية مع دوامة قرفة وسكر وتغطية سكرية.'
                ],
                'meta_title' => [
                    'en' => 'Cinnamon Roll | adMart',
                    'fr' => 'Roulé à la cannelle | adMart',
                    'es' => 'Rollito de canela | adMart',
                    'ar' => 'لفافة القرفة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy cinnamon rolls delivered.',
                    'fr' => 'Achetez des roulés à la cannelle livrés.',
                    'es' => 'Compre rollitos de canela entregados.',
                    'ar' => 'اشترِ لفائف القرفة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 2.75,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Apple Turnover',
                    'fr' => 'Chausson aux pommes',
                    'es' => 'Empanadilla de manzana',
                    'ar' => 'تفاح ملفوف'
                ],
                'description' => [
                    'en' => 'Puff pastry turnover with apple filling.',
                    'fr' => 'Feuilleté fourré aux pommes.',
                    'es' => 'Hojaldre relleno de manzana.',
                    'ar' => 'معجنات نفخة مع حشوة التفاح.'
                ],
                'meta_title' => [
                    'en' => 'Apple Turnover | adMart',
                    'fr' => 'Chausson aux pommes | adMart',
                    'es' => 'Empanadilla de manzana | adMart',
                    'ar' => 'تفاح ملفوف | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order apple turnovers delivered.',
                    'fr' => 'Commandez des chaussons aux pommes livrés.',
                    'es' => 'Ordene empanadillas de manzana entregadas.',
                    'ar' => 'اطلب تفاحًا ملفوفًا ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Cheese Danish',
                    'fr' => 'Danish au fromage',
                    'es' => 'Danés de queso',
                    'ar' => 'دنماركي بالجبن'
                ],
                'description' => [
                    'en' => 'Pastry filled with sweet cream cheese.',
                    'fr' => 'Viennoiserie fourrée au fromage à la crème sucré.',
                    'es' => 'Pastelería rellena de queso crema dulce.',
                    'ar' => 'معجنات محشوة بجبنة كريمية حلوة.'
                ],
                'meta_title' => [
                    'en' => 'Cheese Danish | adMart',
                    'fr' => 'Danish au fromage | adMart',
                    'es' => 'Danés de queso | adMart',
                    'ar' => 'دنماركي بالجبن | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy cheese danish delivered.',
                    'fr' => 'Achetez des danish au fromage livrés.',
                    'es' => 'Compre danés de queso entregado.',
                    'ar' => 'اشترِ دنماركي بالجبن ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.25,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Almond Croissant',
                    'fr' => 'Croissant aux amandes',
                    'es' => 'Croissant de almendras',
                    'ar' => 'كرواسون باللوز'
                ],
                'description' => [
                    'en' => 'Croissant filled with almond paste and flakes.',
                    'fr' => 'Croissant fourré à la pâte d\'amandes et amandes effilées.',
                    'es' => 'Croissant relleno de pasta de almendras y láminas.',
                    'ar' => 'كرواسون محشو بعجينة اللوز ورقائق اللوز.'
                ],
                'meta_title' => [
                    'en' => 'Almond Croissant | adMart',
                    'fr' => 'Croissant aux amandes | adMart',
                    'es' => 'Croissant de almendras | adMart',
                    'ar' => 'كرواسون باللوز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order almond croissants delivered.',
                    'fr' => 'Commandez des croissants aux amandes livrés.',
                    'es' => 'Ordene croissants de almendras entregados.',
                    'ar' => 'اطلب كرواسون باللوز ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Chocolate Eclair',
                    'fr' => 'Éclair au chocolat',
                    'es' => 'Eclair de chocolate',
                    'ar' => 'إكلير شوكولاتة'
                ],
                'description' => [
                    'en' => 'Choux pastry with chocolate cream filling.',
                    'fr' => 'Pâte à choux avec crème au chocolat.',
                    'es' => 'Masa choux con relleno de crema de chocolate.',
                    'ar' => 'عجينة شو مع حشوة كريمة الشوكولاتة.'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Eclair | adMart',
                    'fr' => 'Éclair au chocolat | adMart',
                    'es' => 'Eclair de chocolate | adMart',
                    'ar' => 'إكلير شوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy chocolate eclairs delivered.',
                    'fr' => 'Achetez des éclairs au chocolat livrés.',
                    'es' => 'Compre eclairs de chocolate entregados.',
                    'ar' => 'اشترِ إكلير شوكولاتة ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.75,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Fruit Tart',
                    'fr' => 'Tarte aux fruits',
                    'es' => 'Tarta de frutas',
                    'ar' => 'فطيرة الفواكه'
                ],
                'description' => [
                    'en' => 'Tart shell with custard and fresh fruits.',
                    'fr' => 'Croûte à tarte avec crème pâtissière et fruits frais.',
                    'es' => 'Corteza de tarta con crema pastelera y frutas frescas.',
                    'ar' => 'قشرة فطيرة مع كاسترد وفواكه طازجة.'
                ],
                'meta_title' => [
                    'en' => 'Fruit Tart | adMart',
                    'fr' => 'Tarte aux fruits | adMart',
                    'es' => 'Tarta de frutas | adMart',
                    'ar' => 'فطيرة الفواكه | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order fresh fruit tarts delivered.',
                    'fr' => 'Commandez des tartes aux fruits frais livrées.',
                    'es' => 'Ordene tartas de frutas frescas entregadas.',
                    'ar' => 'اطلب فطائر الفواكه الطازجة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 4.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Savory Puff',
                    'fr' => 'Feuilleté salé',
                    'es' => 'Hojaldre salado',
                    'ar' => 'معجنات مالحة'
                ],
                'description' => [
                    'en' => 'Puff pastry filled with spinach and feta.',
                    'fr' => 'Pâte feuilletée fourrée aux épinards et feta.',
                    'es' => 'Hojaldre relleno de espinacas y queso feta.',
                    'ar' => 'معجنات نفخة محشوة بالسبانخ وجبنة الفيتا.'
                ],
                'meta_title' => [
                    'en' => 'Savory Puff Pastry | adMart',
                    'fr' => 'Feuilleté salé | adMart',
                    'es' => 'Hojaldre salado | adMart',
                    'ar' => 'معجنات مالحة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy savory puff pastries delivered.',
                    'fr' => 'Achetez des feuilletés salés livrés.',
                    'es' => 'Compre hojaldres salados entregados.',
                    'ar' => 'اشترِ معجنات مالحة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 17,
                'price'           => 3.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],

            //180-190

            [
                'name' => [
                    'en' => 'Chocolate Muffin',
                    'fr' => 'Muffin au chocolat',
                    'es' => 'Muffin de chocolate',
                    'ar' => 'مافن الشوكولاتة'
                ],
                'description' => [
                    'en' => 'Soft chocolate muffins with chocolate chips.',
                    'fr' => 'Muffins moelleux au chocolat avec pépites de chocolat.',
                    'es' => 'Muffins suaves de chocolate con chispas de chocolate.',
                    'ar' => 'مافن شوكولاتة طري مع رقائق الشوكولاتة.'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Muffin | adMart',
                    'fr' => 'Muffin au chocolat | adMart',
                    'es' => 'Muffin de chocolate | adMart',
                    'ar' => 'مافن الشوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order chocolate muffins delivered.',
                    'fr' => 'Commandez des muffins au chocolat livrés.',
                    'es' => 'Ordene muffins de chocolate entregados.',
                    'ar' => 'اطلب مافن الشوكولاتة ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Blueberry Muffin',
                    'fr' => 'Muffin aux myrtilles',
                    'es' => 'Muffin de arándanos',
                    'ar' => 'مافن التوت الأزرق'
                ],
                'description' => [
                    'en' => 'Muffins studded with fresh blueberries.',
                    'fr' => 'Muffins parsemés de myrtilles fraîches.',
                    'es' => 'Muffins con arándanos frescos.',
                    'ar' => 'مافن مرصع بالتوت الأزرق الطازج.'
                ],
                'meta_title' => [
                    'en' => 'Blueberry Muffin | adMart',
                    'fr' => 'Muffin aux myrtilles | adMart',
                    'es' => 'Muffin de arándanos | adMart',
                    'ar' => 'مافن التوت الأزرق | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy blueberry muffins delivered.',
                    'fr' => 'Achetez des muffins aux myrtilles livrés.',
                    'es' => 'Compre muffins de arándanos entregados.',
                    'ar' => 'اشترِ مافن التوت الأزرق ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Red Velvet Cupcake',
                    'fr' => 'Cupcake red velvet',
                    'es' => 'Cupcake de terciopelo rojo',
                    'ar' => 'كب كيك ريد فيلفت'
                ],
                'description' => [
                    'en' => 'Moist red velvet cupcakes with cream cheese frosting.',
                    'fr' => 'Cupcakes red velvet moelleux avec glaçage au cream cheese.',
                    'es' => 'Cupcakes de terciopelo rojo húmedos con glaseado de queso crema.',
                    'ar' => 'كب كيك ريد فيلفت رطب مع تزيين بجبنة الكريمة.'
                ],
                'meta_title' => [
                    'en' => 'Red Velvet Cupcake | adMart',
                    'fr' => 'Cupcake red velvet | adMart',
                    'es' => 'Cupcake de terciopelo rojo | adMart',
                    'ar' => 'كب كيك ريد فيلفت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order red velvet cupcakes delivered.',
                    'fr' => 'Commandez des cupcakes red velvet livrés.',
                    'es' => 'Ordene cupcakes de terciopelo rojo entregados.',
                    'ar' => 'اطلب كب كيك ريد فيلفت ليتم توصيله.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Lemon Drizzle Cake',
                    'fr' => 'Gâteau citronné',
                    'es' => 'Pastel de limón',
                    'ar' => 'كعكة الليمون'
                ],
                'description' => [
                    'en' => 'Zesty lemon drizzle loaf cake.',
                    'fr' => 'Gâteau au citron arrosé de sirop.',
                    'es' => 'Pastel de limón con glaseado.',
                    'ar' => 'كعكة ليمون منقوعة بالشراب.'
                ],
                'meta_title' => [
                    'en' => 'Lemon Drizzle Cake | adMart',
                    'fr' => 'Gâteau citronné | adMart',
                    'es' => 'Pastel de limón | adMart',
                    'ar' => 'كعكة الليمون | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy lemon drizzle cake delivered.',
                    'fr' => 'Achetez du gâteau citronné livré.',
                    'es' => 'Compre pastel de limón entregado.',
                    'ar' => 'اشترِ كعكة الليمون ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 4.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Carrot Cake Slice',
                    'fr' => 'Tranche de gâteau aux carottes',
                    'es' => 'Rebanada de pastel de zanahoria',
                    'ar' => 'شريحة كعكة الجزر'
                ],
                'description' => [
                    'en' => 'Spiced carrot cake with cream cheese icing.',
                    'fr' => 'Gâteau aux carottes épicé avec glaçage au cream cheese.',
                    'es' => 'Pastel de zanahoria especiado con glaseado de queso crema.',
                    'ar' => 'كعكة جزر معطرة مع تزيين بجبنة الكريمة.'
                ],
                'meta_title' => [
                    'en' => 'Carrot Cake Slice | adMart',
                    'fr' => 'Tranche de gâteau aux carottes | adMart',
                    'es' => 'Rebanada de pastel de zanahoria | adMart',
                    'ar' => 'شريحة كعكة الجزر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order carrot cake slices delivered.',
                    'fr' => 'Commandez des tranches de gâteau aux carottes livrées.',
                    'es' => 'Ordene rebanadas de pastel de zanahoria entregadas.',
                    'ar' => 'اطلب شرائح كعكة الجزر ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chocolate Cake Slice',
                    'fr' => 'Tranche de gâteau au chocolat',
                    'es' => 'Rebanada de pastel de chocolate',
                    'ar' => 'شريحة كعكة الشوكولاتة'
                ],
                'description' => [
                    'en' => 'Rich chocolate cake slice with ganache topping.',
                    'fr' => 'Tranche de gâteau au chocolat riche avec ganache.',
                    'es' => 'Rebanada de pastel de chocolate rico con cobertura de ganache.',
                    'ar' => 'شريحة كعكة شوكولاتة غنية مع طبقة جاناش.'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Cake Slice | adMart',
                    'fr' => 'Tranche de gâteau au chocolat | adMart',
                    'es' => 'Rebanada de pastel de chocolate | adMart',
                    'ar' => 'شريحة كعكة الشوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy chocolate cake slices delivered.',
                    'fr' => 'Achetez des tranches de gâteau au chocolat livrées.',
                    'es' => 'Compre rebanadas de pastel de chocolate entregadas.',
                    'ar' => 'اشترِ شرائح كعكة الشوكولاتة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.75,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Muffin Variety Pack',
                    'fr' => 'Assortiment de muffins',
                    'es' => 'Paquete variado de muffins',
                    'ar' => 'مجموعة متنوعة من المافن'
                ],
                'description' => [
                    'en' => 'Assorted muffins including chocolate, blueberry, and banana.',
                    'fr' => 'Assortiment de muffins incluant chocolat, myrtilles et banane.',
                    'es' => 'Muffins surtidos incluyendo chocolate, arándanos y plátano.',
                    'ar' => 'مافن متنوع يشمل الشوكولاتة والتوت الأزرق والموز.'
                ],
                'meta_title' => [
                    'en' => 'Muffin Variety Pack | adMart',
                    'fr' => 'Assortiment de muffins | adMart',
                    'es' => 'Paquete variado de muffins | adMart',
                    'ar' => 'مجموعة متنوعة من المافن | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order assorted muffin pack delivered.',
                    'fr' => 'Commandez un assortiment de muffins livré.',
                    'es' => 'Ordene paquete variado de muffins entregado.',
                    'ar' => 'اطلب مجموعة مافن متنوعة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 10.00,
                'quantity'        => 6,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Banana Bread Slice',
                    'fr' => 'Tranche de pain à la banane',
                    'es' => 'Rebanada de pan de plátano',
                    'ar' => 'شريحة خبز الموز'
                ],
                'description' => [
                    'en' => 'Homemade banana bread with walnuts.',
                    'fr' => 'Pain à la banane fait maison avec noix.',
                    'es' => 'Pan de plátano casero con nueces.',
                    'ar' => 'خبز موز منزلي الصنع مع الجوز.'
                ],
                'meta_title' => [
                    'en' => 'Banana Bread Slice | adMart',
                    'fr' => 'Tranche de pain à la banane | adMart',
                    'es' => 'Rebanada de pan de plátano | adMart',
                    'ar' => 'شريحة خبز الموز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy banana bread slices delivered.',
                    'fr' => 'Achetez des tranches de pain à la banane livrées.',
                    'es' => 'Compre rebanadas de pan de plátano entregadas.',
                    'ar' => 'اشترِ شرائح خبز الموز ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Coffee Walnut Cake',
                    'fr' => 'Gâteau café-noix',
                    'es' => 'Pastel de café y nueces',
                    'ar' => 'كعكة القهوة والجوز'
                ],
                'description' => [
                    'en' => 'Moist coffee walnut cake, perfect with tea.',
                    'fr' => 'Gâteau café-noix moelleux, parfait avec le thé.',
                    'es' => 'Pastel de café y nueces húmedo, perfecto con té.',
                    'ar' => 'كعكة قهوة وجوز رطبة، مثالية مع الشاي.'
                ],
                'meta_title' => [
                    'en' => 'Coffee Walnut Cake | adMart',
                    'fr' => 'Gâteau café-noix | adMart',
                    'es' => 'Pastel de café y nueces | adMart',
                    'ar' => 'كعكة القهوة والجوز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order coffee walnut cake delivered.',
                    'fr' => 'Commandez du gâteau café-noix livré.',
                    'es' => 'Ordene pastel de café y nueces entregado.',
                    'ar' => 'اطلب كعكة القهوة والجوز ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 4.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Raspberry Tartlet',
                    'fr' => 'Tartlette à la framboise',
                    'es' => 'Tartaleta de frambuesa',
                    'ar' => 'فطيرة توت العليق الصغيرة'
                ],
                'description' => [
                    'en' => 'Mini tartlet filled with raspberry jam and custard.',
                    'fr' => 'Mini tartelette fourrée à la confiture de framboises et crème pâtissière.',
                    'es' => 'Mini tartaleta rellena de mermelada de frambuesa y crema pastelera.',
                    'ar' => 'فطيرة صغيرة محشوة بمربى توت العليق والكاسترد.'
                ],
                'meta_title' => [
                    'en' => 'Raspberry Tartlet | adMart',
                    'fr' => 'Tartlette à la framboise | adMart',
                    'es' => 'Tartaleta de frambuesa | adMart',
                    'ar' => 'فطيرة توت العليق الصغيرة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy raspberry tartlets delivered.',
                    'fr' => 'Achetez des tartelettes à la framboise livrées.',
                    'es' => 'Compre tartaletas de frambuesa entregadas.',
                    'ar' => 'اشترِ فطائر توت العليق الصغيرة ليتم توصيلها.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 2.75,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],

            //190-200

            [
                'name' => [
                    'en' => 'Chocolate Muffin',
                    'fr' => 'Muffin au chocolat',
                    'es' => 'Muffin de chocolate',
                    'ar' => 'كعكة الشوكولاتة الصغيرة'
                ],
                'description' => [
                    'en' => 'Soft chocolate muffins with chocolate chips.',
                    'fr' => 'Muffins moelleux au chocolat avec pépites de chocolat.',
                    'es' => 'Muffins suaves de chocolate con trozos de chocolate.',
                    'ar' => 'كعكات شوكولاتة ناعمة مع قطع شوكولاتة.'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Muffin | adMart',
                    'fr' => 'Muffin au chocolat | adMart',
                    'es' => 'Muffin de chocolate | adMart',
                    'ar' => 'كعكة الشوكولاتة الصغيرة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order chocolate muffins delivered.',
                    'fr' => 'Commandez des muffins au chocolat livrés.',
                    'es' => 'Ordene muffins de chocolate entregados.',
                    'ar' => 'اطلب كعكات الشوكولاتة الصغيرة للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Blueberry Muffin',
                    'fr' => 'Muffin aux myrtilles',
                    'es' => 'Muffin de arándanos',
                    'ar' => 'كعكة التوت الأزرق الصغيرة'
                ],
                'description' => [
                    'en' => 'Muffins studded with fresh blueberries.',
                    'fr' => 'Muffins garnis de myrtilles fraîches.',
                    'es' => 'Muffins con arándanos frescos.',
                    'ar' => 'كعكات صغيرة محشوة بالتوت الأزرق الطازج.'
                ],
                'meta_title' => [
                    'en' => 'Blueberry Muffin | adMart',
                    'fr' => 'Muffin aux myrtilles | adMart',
                    'es' => 'Muffin de arándanos | adMart',
                    'ar' => 'كعكة التوت الأزرق الصغيرة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy blueberry muffins delivered.',
                    'fr' => 'Achetez des muffins aux myrtilles livrés.',
                    'es' => 'Compre muffins de arándanos entregados.',
                    'ar' => 'اشترِ كعكات التوت الأزرق الصغيرة للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Red Velvet Cupcake',
                    'fr' => 'Cupcake red velvet',
                    'es' => 'Cupcake de terciopelo rojo',
                    'ar' => 'كب كيك ريد فيلفت'
                ],
                'description' => [
                    'en' => 'Moist red velvet cupcakes with cream cheese frosting.',
                    'fr' => 'Cupcakes red velvet moelleux avec glaçage au fromage à la crème.',
                    'es' => 'Cupcakes de terciopelo rojo húmedos con glaseado de queso crema.',
                    'ar' => 'كب كيك ريد فيلفت طري مع طبقة من جبنة الكريمة.'
                ],
                'meta_title' => [
                    'en' => 'Red Velvet Cupcake | adMart',
                    'fr' => 'Cupcake red velvet | adMart',
                    'es' => 'Cupcake de terciopelo rojo | adMart',
                    'ar' => 'كب كيك ريد فيلفت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order red velvet cupcakes delivered.',
                    'fr' => 'Commandez des cupcakes red velvet livrés.',
                    'es' => 'Ordene cupcakes de terciopelo rojo entregados.',
                    'ar' => 'اطلب كب كيك ريد فيلفت للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.00,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Lemon Drizzle Cake',
                    'fr' => 'Gâteau au citron',
                    'es' => 'Pastel de limón',
                    'ar' => 'كعكة الليمون'
                ],
                'description' => [
                    'en' => 'Zesty lemon drizzle loaf cake.',
                    'fr' => 'Gâteau au citron arrosé de sirop.',
                    'es' => 'Pastel de limón con glaseado.',
                    'ar' => 'كعكة ليمون منقوعة بالشراب.'
                ],
                'meta_title' => [
                    'en' => 'Lemon Drizzle Cake | adMart',
                    'fr' => 'Gâteau au citron | adMart',
                    'es' => 'Pastel de limón | adMart',
                    'ar' => 'كعكة الليمون | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy lemon drizzle cake delivered.',
                    'fr' => 'Achetez un gâteau au citron livré.',
                    'es' => 'Compre pastel de limón entregado.',
                    'ar' => 'اشترِ كعكة الليمون للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 4.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Carrot Cake Slice',
                    'fr' => 'Tranche de gâteau aux carottes',
                    'es' => 'Rebanada de pastel de zanahoria',
                    'ar' => 'شريحة كعكة الجزر'
                ],
                'description' => [
                    'en' => 'Spiced carrot cake with cream cheese icing.',
                    'fr' => 'Gâteau aux carottes épicé avec glaçage au fromage à la crème.',
                    'es' => 'Pastel de zanahoria especiado con glaseado de queso crema.',
                    'ar' => 'كعكة جزر معطرة مع طبقة من جبنة الكريمة.'
                ],
                'meta_title' => [
                    'en' => 'Carrot Cake Slice | adMart',
                    'fr' => 'Tranche de gâteau aux carottes | adMart',
                    'es' => 'Rebanada de pastel de zanahoria | adMart',
                    'ar' => 'شريحة كعكة الجزر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order carrot cake slices delivered.',
                    'fr' => 'Commandez des tranches de gâteau aux carottes livrées.',
                    'es' => 'Ordene rebanadas de pastel de zanahoria entregadas.',
                    'ar' => 'اطلب شرائح كعكة الجزر للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.50,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Chocolate Cake Slice',
                    'fr' => 'Tranche de gâteau au chocolat',
                    'es' => 'Rebanada de pastel de chocolate',
                    'ar' => 'شريحة كعكة الشوكولاتة'
                ],
                'description' => [
                    'en' => 'Rich chocolate cake slice with ganache topping.',
                    'fr' => 'Tranche de gâteau au chocolat riche avec ganache.',
                    'es' => 'Rebanada de pastel de chocolate con cobertura de ganache.',
                    'ar' => 'شريحة كعكة شوكولاتة غنية مع طبقة جاناش.'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Cake Slice | adMart',
                    'fr' => 'Tranche de gâteau au chocolat | adMart',
                    'es' => 'Rebanada de pastel de chocolate | adMart',
                    'ar' => 'شريحة كعكة الشوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy chocolate cake slices delivered.',
                    'fr' => 'Achetez des tranches de gâteau au chocolat livrées.',
                    'es' => 'Compre rebanadas de pastel de chocolate entregadas.',
                    'ar' => 'اشترِ شرائح كعكة الشوكولاتة للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.75,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Muffin Variety Pack',
                    'fr' => 'Assortiment de muffins',
                    'es' => 'Paquete variado de muffins',
                    'ar' => 'مجموعة متنوعة من الكعكات الصغيرة'
                ],
                'description' => [
                    'en' => 'Assorted muffins including chocolate, blueberry, and banana.',
                    'fr' => 'Assortiment de muffins incluant chocolat, myrtilles et banane.',
                    'es' => 'Paquete variado de muffins incluyendo chocolate, arándanos y plátano.',
                    'ar' => 'مجموعة متنوعة من الكعكات الصغيرة تشمل الشوكولاتة والتوت والموز.'
                ],
                'meta_title' => [
                    'en' => 'Muffin Variety Pack | adMart',
                    'fr' => 'Assortiment de muffins | adMart',
                    'es' => 'Paquete variado de muffins | adMart',
                    'ar' => 'مجموعة متنوعة من الكعكات الصغيرة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order assorted muffin pack delivered.',
                    'fr' => 'Commandez un assortiment de muffins livré.',
                    'es' => 'Ordene paquete variado de muffins entregado.',
                    'ar' => 'اطلب مجموعة متنوعة من الكعكات الصغيرة للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 10.00,
                'quantity'        => 6,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Banana Bread Slice',
                    'fr' => 'Tranche de pain à la banane',
                    'es' => 'Rebanada de pan de plátano',
                    'ar' => 'شريحة خبز الموز'
                ],
                'description' => [
                    'en' => 'Homemade banana bread with walnuts.',
                    'fr' => 'Pain à la banane maison avec noix.',
                    'es' => 'Pan de plátano casero con nueces.',
                    'ar' => 'خبز موز منزلي مع الجوز.'
                ],
                'meta_title' => [
                    'en' => 'Banana Bread Slice | adMart',
                    'fr' => 'Tranche de pain à la banane | adMart',
                    'es' => 'Rebanada de pan de plátano | adMart',
                    'ar' => 'شريحة خبز الموز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy banana bread slices delivered.',
                    'fr' => 'Achetez des tranches de pain à la banane livrées.',
                    'es' => 'Compre rebanadas de pan de plátano entregadas.',
                    'ar' => 'اشترِ شرائح خبز الموز للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 3.00,
                'quantity'        => 150,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Coffee Walnut Cake',
                    'fr' => 'Gâteau café et noix',
                    'es' => 'Pastel de café y nueces',
                    'ar' => 'كعكة القهوة والجوز'
                ],
                'description' => [
                    'en' => 'Moist coffee walnut cake, perfect with tea.',
                    'fr' => 'Gâteau café et noix moelleux, parfait avec le thé.',
                    'es' => 'Pastel de café y nueces húmedo, perfecto con té.',
                    'ar' => 'كعكة قهوة وجوز طرية، مثالية مع الشاي.'
                ],
                'meta_title' => [
                    'en' => 'Coffee Walnut Cake | adMart',
                    'fr' => 'Gâteau café et noix | adMart',
                    'es' => 'Pastel de café y nueces | adMart',
                    'ar' => 'كعكة القهوة والجوز | adMart'
                ],
                'meta_description' => [
                    'en' => 'Order coffee walnut cake delivered.',
                    'fr' => 'Commandez un gâteau café et noix livré.',
                    'es' => 'Ordene pastel de café y nueces entregado.',
                    'ar' => 'اطلب كعكة القهوة والجوز للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 4.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Raspberry Tartlet',
                    'fr' => 'Tartlette à la framboise',
                    'es' => 'Tartaleta de frambuesa',
                    'ar' => 'فطيرة توت العليق الصغيرة'
                ],
                'description' => [
                    'en' => 'Mini tartlet filled with raspberry jam and custard.',
                    'fr' => 'Mini tartelette fourrée à la confiture de framboises et crème pâtissière.',
                    'es' => 'Tartaleta mini rellena de mermelada de frambuesa y crema pastelera.',
                    'ar' => 'فطيرة صغيرة محشوة بمربى التوت وكريمة البودنج.'
                ],
                'meta_title' => [
                    'en' => 'Raspberry Tartlet | adMart',
                    'fr' => 'Tartlette à la framboise | adMart',
                    'es' => 'Tartaleta de frambuesa | adMart',
                    'ar' => 'فطيرة توت العليق الصغيرة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy raspberry tartlets delivered.',
                    'fr' => 'Achetez des tartelettes à la framboise livrées.',
                    'es' => 'Compre tartaletas de frambuesa entregadas.',
                    'ar' => 'اشترِ فطائر توت العليق الصغيرة للتوصيل.'
                ],
                'category_id'     => 6,
                'sub_category_id' => 18,
                'price'           => 2.75,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],


            //200-210

            [
                'name' => [
                    'en' => 'Tomato Pasta Sauce',
                    'fr' => 'Sauce tomate pour pâtes',
                    'es' => 'Salsa de tomate para pasta',
                    'ar' => 'صلصة طماطم للمعكرونة'
                ],
                'description' => [
                    'en' => 'Rich tomato sauce for pasta dishes',
                    'fr' => 'Sauce tomate riche pour plats de pâtes',
                    'es' => 'Rica salsa de tomate para platos de pasta',
                    'ar' => 'صلصة طماطم غنية لأطباق المعكرونة'
                ],
                'meta_title' => [
                    'en' => 'Tomato Pasta Sauce | adMart',
                    'fr' => 'Sauce tomate pour pâtes | adMart',
                    'es' => 'Salsa de tomate para pasta | adMart',
                    'ar' => 'صلصة طماطم للمعكرونة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Buy delicious tomato pasta sauce online',
                    'fr' => 'Achetez une délicieuse sauce tomate pour pâtes en ligne',
                    'es' => 'Compre deliciosa salsa de tomate para pasta en línea',
                    'ar' => 'اشترِ صلصة طماطم لذيذة للمعكرونة عبر الإنترنت'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pesto Sauce',
                    'fr' => 'Sauce pesto',
                    'es' => 'Salsa pesto',
                    'ar' => 'صلصة البيستو'
                ],
                'description' => [
                    'en' => 'Basil pesto with pine nuts and parmesan',
                    'fr' => 'Pesto au basilic avec pignons et parmesan',
                    'es' => 'Pesto de albahaca con piñones y parmesano',
                    'ar' => 'بيستو ريحان مع صنوبر وجبن بارميزان'
                ],
                'meta_title' => [
                    'en' => 'Pesto Sauce | adMart',
                    'fr' => 'Sauce pesto | adMart',
                    'es' => 'Salsa pesto | adMart',
                    'ar' => 'صلصة البيستو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Authentic Italian pesto sauce for pasta',
                    'fr' => 'Sauce pesto italienne authentique pour pâtes',
                    'es' => 'Auténtica salsa pesto italiana para pasta',
                    'ar' => 'صلصة بيستو إيطالية أصيلة للمعكرونة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 3.20,
                'quantity'        => 190,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Alfredo Sauce',
                    'fr' => 'Sauce alfredo',
                    'es' => 'Salsa alfredo',
                    'ar' => 'صلصة ألفريدو'
                ],
                'description' => [
                    'en' => 'Creamy white sauce for pasta dishes',
                    'fr' => 'Sauce blanche crémeuse pour plats de pâtes',
                    'es' => 'Salsa blanca cremosa para platos de pasta',
                    'ar' => 'صلصة بيضاء كريمية لأطباق المعكرونة'
                ],
                'meta_title' => [
                    'en' => 'Alfredo Sauce | adMart',
                    'fr' => 'Sauce alfredo | adMart',
                    'es' => 'Salsa alfredo | adMart',
                    'ar' => 'صلصة ألفريدو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Rich and creamy alfredo pasta sauce',
                    'fr' => 'Sauce alfredo pour pâtes riche et crémeuse',
                    'es' => 'Rica y cremosa salsa alfredo para pasta',
                    'ar' => 'صلصة ألفريدو غنية وكريمية للمعكرونة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.80,
                'quantity'        => 400,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Marinara Sauce',
                    'fr' => 'Sauce marinara',
                    'es' => 'Salsa marinara',
                    'ar' => 'صلصة مارينارا'
                ],
                'description' => [
                    'en' => 'Classic Italian tomato and herb sauce',
                    'fr' => 'Sauce italienne classique à la tomate et aux herbes',
                    'es' => 'Salsa italiana clásica de tomate y hierbas',
                    'ar' => 'صلصة إيطالية كلاسيكية من الطماطم والأعشاب'
                ],
                'meta_title' => [
                    'en' => 'Marinara Sauce | adMart',
                    'fr' => 'Sauce marinara | adMart',
                    'es' => 'Salsa marinara | adMart',
                    'ar' => 'صلصة مارينارا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Traditional marinara sauce for pasta',
                    'fr' => 'Sauce marinara traditionnelle pour pâtes',
                    'es' => 'Salsa marinara tradicional para pasta',
                    'ar' => 'صلصة مارينارا تقليدية للمعكرونة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.30,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'BBQ Sauce',
                    'fr' => 'Sauce barbecue',
                    'es' => 'Salsa BBQ',
                    'ar' => 'صلصة باربيكيو'
                ],
                'description' => [
                    'en' => 'Sweet and smoky barbecue sauce',
                    'fr' => 'Sauce barbecue sucrée et fumée',
                    'es' => 'Salsa barbacoa dulce y ahumada',
                    'ar' => 'صلصة باربيكيو حلوة ومدخنة'
                ],
                'meta_title' => [
                    'en' => 'BBQ Sauce | adMart',
                    'fr' => 'Sauce barbecue | adMart',
                    'es' => 'Salsa BBQ | adMart',
                    'ar' => 'صلصة باربيكيو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Perfect BBQ sauce for grilling',
                    'fr' => 'Sauce barbecue parfaite pour le grill',
                    'es' => 'Salsa BBQ perfecta para parrilla',
                    'ar' => 'صلصة باربيكيو مثالية للشواء'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.20,
                'quantity'        => 350,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Teriyaki Sauce',
                    'fr' => 'Sauce teriyaki',
                    'es' => 'Salsa teriyaki',
                    'ar' => 'صلصة ترياكي'
                ],
                'description' => [
                    'en' => 'Japanese-style sweet and savory sauce',
                    'fr' => 'Sauce japonaise sucrée-salée',
                    'es' => 'Salsa japonesa agridulce',
                    'ar' => 'صلصة يابانية حلوة ومالحة'
                ],
                'meta_title' => [
                    'en' => 'Teriyaki Sauce | adMart',
                    'fr' => 'Sauce teriyaki | adMart',
                    'es' => 'Salsa teriyaki | adMart',
                    'ar' => 'صلصة ترياكي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Authentic teriyaki sauce for stir-fries',
                    'fr' => 'Sauce teriyaki authentique pour sautés',
                    'es' => 'Auténtica salsa teriyaki para salteados',
                    'ar' => 'صلصة ترياكي أصلية للقلي السريع'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.60,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Sweet Chili Sauce',
                    'fr' => 'Sauce chili douce',
                    'es' => 'Salsa de chile dulce',
                    'ar' => 'صلصة فلفل حلو'
                ],
                'description' => [
                    'en' => 'Thai-style sweet and spicy dipping sauce',
                    'fr' => 'Sauce thaïlandaise sucrée et épicée pour trempette',
                    'es' => 'Salsa tailandesa agridulce y picante para mojar',
                    'ar' => 'صلصة تايلندية حلوة وحارة للتغميس'
                ],
                'meta_title' => [
                    'en' => 'Sweet Chili Sauce | adMart',
                    'fr' => 'Sauce chili douce | adMart',
                    'es' => 'Salsa de chile dulce | adMart',
                    'ar' => 'صلصة فلفل حلو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Versatile sweet chili sauce for appetizers',
                    'fr' => 'Sauce chili douce polyvalente pour apéritifs',
                    'es' => 'Versátil salsa de chile dulce para aperitivos',
                    'ar' => 'صلصة فلفل حلو متعددة الاستخدامات للمقبلات'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.10,
                'quantity'        => 300,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hoisin Sauce',
                    'fr' => 'Sauce hoisin',
                    'es' => 'Salsa hoisin',
                    'ar' => 'صلصة هويسين'
                ],
                'description' => [
                    'en' => 'Chinese sweet and savory sauce',
                    'fr' => 'Sauce chinoise sucrée-salée',
                    'es' => 'Salsa china agridulce',
                    'ar' => 'صلصة صينية حلوة ومالحة'
                ],
                'meta_title' => [
                    'en' => 'Hoisin Sauce | adMart',
                    'fr' => 'Sauce hoisin | adMart',
                    'es' => 'Salsa hoisin | adMart',
                    'ar' => 'صلصة هويسين | adMart'
                ],
                'meta_description' => [
                    'en' => 'Authentic hoisin sauce for Asian dishes',
                    'fr' => 'Sauce hoisin authentique pour plats asiatiques',
                    'es' => 'Auténtica salsa hoisin para platos asiáticos',
                    'ar' => 'صلصة هويسين أصلية للأطباق الآسيوية'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.70,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Curry Sauce',
                    'fr' => 'Sauce curry',
                    'es' => 'Salsa curry',
                    'ar' => 'صلصة كاري'
                ],
                'description' => [
                    'en' => 'Mild Indian-style curry sauce',
                    'fr' => 'Sauce curry indienne douce',
                    'es' => 'Salsa curry al estilo indio suave',
                    'ar' => 'صلصة كاري هندية خفيفة'
                ],
                'meta_title' => [
                    'en' => 'Curry Sauce | adMart',
                    'fr' => 'Sauce curry | adMart',
                    'es' => 'Salsa curry | adMart',
                    'ar' => 'صلصة كاري | adMart'
                ],
                'meta_description' => [
                    'en' => 'Ready-to-use curry sauce for quick meals',
                    'fr' => 'Sauce curry prête à l\'emploi pour repas rapides',
                    'es' => 'Salsa curry lista para usar para comidas rápidas',
                    'ar' => 'صلصة كاري جاهزة للاستخدام للوجبات السريعة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 3.00,
                'quantity'        => 400,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Sriracha Sauce',
                    'fr' => 'Sauce sriracha',
                    'es' => 'Salsa sriracha',
                    'ar' => 'صلصة سريراتشا'
                ],
                'description' => [
                    'en' => 'Spicy Thai chili sauce',
                    'fr' => 'Sauce piquante thaïlandaise au piment',
                    'es' => 'Salsa picante tailandesa de chile',
                    'ar' => 'صلصة فلفل تايلندية حارة'
                ],
                'meta_title' => [
                    'en' => 'Sriracha Sauce | adMart',
                    'fr' => 'Sauce sriracha | adMart',
                    'es' => 'Salsa sriracha | adMart',
                    'ar' => 'صلصة سريراتشا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Popular spicy sriracha chili sauce',
                    'fr' => 'Sauce sriracha piquante populaire',
                    'es' => 'Popular salsa picante de chile sriracha',
                    'ar' => 'صلصة سريراتشا الحارة الشهيرة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 22,
                'price'           => 2.40,
                'quantity'        => 455,
                'unit'            => 'ml'
            ],

            //210-220

            [
                'name' => [
                    'en' => 'Ranch Dressing',
                    'fr' => 'Vinaigrette ranch',
                    'es' => 'Aderezo ranch',
                    'ar' => 'صوص الرانش'
                ],
                'description' => [
                    'en' => 'Creamy ranch salad dressing',
                    'fr' => 'Vinaigrette ranch crémeuse pour salade',
                    'es' => 'Aderezo ranch cremoso para ensaladas',
                    'ar' => 'صوص رانش كريمي للسلطات'
                ],
                'meta_title' => [
                    'en' => 'Ranch Dressing | adMart',
                    'fr' => 'Vinaigrette ranch | adMart',
                    'es' => 'Aderezo ranch | adMart',
                    'ar' => 'صوص الرانش | adMart'
                ],
                'meta_description' => [
                    'en' => 'Classic ranch dressing for salads',
                    'fr' => 'Vinaigrette ranch classique pour salades',
                    'es' => 'Aderezo ranch clásico para ensaladas',
                    'ar' => 'صوص رانش كلاسيكي للسلطات'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 2.50,
                'quantity'        => 300,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Caesar Dressing',
                    'fr' => 'Vinaigrette César',
                    'es' => 'Aderezo César',
                    'ar' => 'صوص سيزر'
                ],
                'description' => [
                    'en' => 'Creamy Caesar salad dressing',
                    'fr' => 'Vinaigrette César crémeuse',
                    'es' => 'Aderezo César cremoso',
                    'ar' => 'صوص سيزر كريمي'
                ],
                'meta_title' => [
                    'en' => 'Caesar Dressing | adMart',
                    'fr' => 'Vinaigrette César | adMart',
                    'es' => 'Aderezo César | adMart',
                    'ar' => 'صوص سيزر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Traditional Caesar dressing with parmesan',
                    'fr' => 'Vinaigrette César traditionnelle avec parmesan',
                    'es' => 'Aderezo César tradicional con parmesano',
                    'ar' => 'صوص سيزر تقليدي مع جبن بارميزان'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 2.80,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Balsamic Vinaigrette',
                    'fr' => 'Vinaigrette balsamique',
                    'es' => 'Vinagreta balsámica',
                    'ar' => 'صوص بلسميك'
                ],
                'description' => [
                    'en' => 'Tangy balsamic vinegar dressing',
                    'fr' => 'Vinaigrette au vinaigre balsamique acidulé',
                    'es' => 'Aderezo de vinagre balsámico ácido',
                    'ar' => 'صوص خل بلسميك منعش'
                ],
                'meta_title' => [
                    'en' => 'Balsamic Vinaigrette | adMart',
                    'fr' => 'Vinaigrette balsamique | adMart',
                    'es' => 'Vinagreta balsámica | adMart',
                    'ar' => 'صوص بلسميك | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium balsamic vinaigrette dressing',
                    'fr' => 'Vinaigrette balsamique premium',
                    'es' => 'Vinagreta balsámica premium',
                    'ar' => 'صوص بلسميك ممتاز'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 2.60,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hummus',
                    'fr' => 'Hoummous',
                    'es' => 'Hummus',
                    'ar' => 'حمص'
                ],
                'description' => [
                    'en' => 'Creamy chickpea dip',
                    'fr' => 'Trempette crémeuse à base de pois chiches',
                    'es' => 'Salsa cremosa de garbanzos',
                    'ar' => 'صوص حمص كريمي'
                ],
                'meta_title' => [
                    'en' => 'Hummus | adMart',
                    'fr' => 'Hoummous | adMart',
                    'es' => 'Hummus | adMart',
                    'ar' => 'حمص | adMart'
                ],
                'meta_description' => [
                    'en' => 'Smooth and creamy hummus dip',
                    'fr' => 'Hoummous lisse et crémeux',
                    'es' => 'Hummus suave y cremoso',
                    'ar' => 'حمص ناعم وكريمي'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 3.20,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Guacamole',
                    'fr' => 'Guacamole',
                    'es' => 'Guacamole',
                    'ar' => 'جواكامولي'
                ],
                'description' => [
                    'en' => 'Fresh avocado dip',
                    'fr' => 'Trempette fraîche à l\'avocat',
                    'es' => 'Salsa fresca de aguacate',
                    'ar' => 'صوص أفوكادو طازج'
                ],
                'meta_title' => [
                    'en' => 'Guacamole | adMart',
                    'fr' => 'Guacamole | adMart',
                    'es' => 'Guacamole | adMart',
                    'ar' => 'جواكامولي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Authentic guacamole dip with lime',
                    'fr' => 'Guacamole authentique avec citron vert',
                    'es' => 'Guacamole auténtico con lima',
                    'ar' => 'جواكامولي أصلي مع الليمون'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 3.50,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Tzatziki',
                    'fr' => 'Tzatzíki',
                    'es' => 'Tzatziki',
                    'ar' => 'تزاتزيكي'
                ],
                'description' => [
                    'en' => 'Greek yogurt and cucumber dip',
                    'fr' => 'Sauce grecque au yaourt et concombre',
                    'es' => 'Salsa griega de yogur y pepino',
                    'ar' => 'صوص يوناني بالزبادي والخيار'
                ],
                'meta_title' => [
                    'en' => 'Tzatziki | adMart',
                    'fr' => 'Tzatzíki | adMart',
                    'es' => 'Tzatziki | adMart',
                    'ar' => 'تزاتزيكي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Refreshing Greek tzatziki sauce',
                    'fr' => 'Sauce tzatzíki grecque rafraîchissante',
                    'es' => 'Refrescante salsa griega tzatziki',
                    'ar' => 'صوص تزاتزيكي يوناني منعش'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 3.00,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Salsa',
                    'fr' => 'Salsa',
                    'es' => 'Salsa',
                    'ar' => 'صلصة سالسا'
                ],
                'description' => [
                    'en' => 'Chunky tomato salsa',
                    'fr' => 'Salsa tomate avec morceaux',
                    'es' => 'Salsa de tomate troceada',
                    'ar' => 'صلصة طماطم قطع كبيرة'
                ],
                'meta_title' => [
                    'en' => 'Salsa | adMart',
                    'fr' => 'Salsa | adMart',
                    'es' => 'Salsa | adMart',
                    'ar' => 'صلصة سالسا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Medium spicy tomato salsa',
                    'fr' => 'Salsa tomate moyennement épicée',
                    'es' => 'Salsa de tomate medianamente picante',
                    'ar' => 'صلصة طماطم متوسطة الحرارة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 2.30,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'French Onion Dip',
                    'fr' => 'Trempette à l\'oignon français',
                    'es' => 'Salsa francesa de cebolla',
                    'ar' => 'صوص بصل فرنسي'
                ],
                'description' => [
                    'en' => 'Creamy onion flavored dip',
                    'fr' => 'Trempette crémeuse à l\'oignon',
                    'es' => 'Salsa cremosa de cebolla',
                    'ar' => 'صوص كريمي بنكهة البصل'
                ],
                'meta_title' => [
                    'en' => 'French Onion Dip | adMart',
                    'fr' => 'Trempette à l\'oignon français | adMart',
                    'es' => 'Salsa francesa de cebolla | adMart',
                    'ar' => 'صوص بصل فرنسي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Classic French onion dip for chips',
                    'fr' => 'Trempette classique à l\'oignon français pour chips',
                    'es' => 'Salsa clásica francesa de cebolla para papas',
                    'ar' => 'صوص بصل فرنسي كلاسيكي للبطاطس'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 2.40,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Blue Cheese Dressing',
                    'fr' => 'Vinaigrette au bleu',
                    'es' => 'Aderezo de queso azul',
                    'ar' => 'صوص جبنة زرقاء'
                ],
                'description' => [
                    'en' => 'Rich blue cheese salad dressing',
                    'fr' => 'Vinaigrette riche au fromage bleu',
                    'es' => 'Aderezo rico de queso azul',
                    'ar' => 'صوص غني بجبنة زرقاء للسلطات'
                ],
                'meta_title' => [
                    'en' => 'Blue Cheese Dressing | adMart',
                    'fr' => 'Vinaigrette au bleu | adMart',
                    'es' => 'Aderezo de queso azul | adMart',
                    'ar' => 'صوص جبنة زرقاء | adMart'
                ],
                'meta_description' => [
                    'en' => 'Creamy blue cheese dressing',
                    'fr' => 'Vinaigrette crémeuse au fromage bleu',
                    'es' => 'Aderezo cremoso de queso azul',
                    'ar' => 'صوص كريمي بجبنة زرقاء'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 2.90,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Tahini',
                    'fr' => 'Tahini',
                    'es' => 'Tahini',
                    'ar' => 'طحينة'
                ],
                'description' => [
                    'en' => 'Sesame seed paste',
                    'fr' => 'Pâte de sésame',
                    'es' => 'Pasta de sésamo',
                    'ar' => 'معجون السمسم'
                ],
                'meta_title' => [
                    'en' => 'Tahini | adMart',
                    'fr' => 'Tahini | adMart',
                    'es' => 'Tahini | adMart',
                    'ar' => 'طحينة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Pure sesame tahini paste',
                    'fr' => 'Pâte de tahini pur sésame',
                    'es' => 'Pasta de tahini puro de sésamo',
                    'ar' => 'طحينة سمسم نقي'
                ],
                'category_id'     => 8,
                'sub_category_id' => 23,
                'price'           => 3.50,
                'quantity'        => 300,
                'unit'            => 'g'
            ],

            //220-230

            [
                'name' => [
                    'en' => 'Dill Pickles',
                    'fr' => 'Cornichons à l\'aneth',
                    'es' => 'Pepinillos en vinagre',
                    'ar' => 'مخلل الشبت'
                ],
                'description' => [
                    'en' => 'Crunchy dill pickled cucumbers',
                    'fr' => 'Concombres croquants marinés à l\'aneth',
                    'es' => 'Pepinos encurtidos crujientes con eneldo',
                    'ar' => 'خيار مخلل مقرمش مع الشبت'
                ],
                'meta_title' => [
                    'en' => 'Dill Pickles | adMart',
                    'fr' => 'Cornichons à l\'aneth | adMart',
                    'es' => 'Pepinillos en vinagre | adMart',
                    'ar' => 'مخلل الشبت | adMart'
                ],
                'meta_description' => [
                    'en' => 'Traditional dill pickles in brine',
                    'fr' => 'Cornichons traditionnels à l\'aneth en saumure',
                    'es' => 'Pepinillos tradicionales en salmuera',
                    'ar' => 'مخلل الشبت التقليدي في محلول ملحي'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.20,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Bread & Butter Pickles',
                    'fr' => 'Cornichons aigres-doux',
                    'es' => 'Pepinillos dulces',
                    'ar' => 'مخلل الخبز والزبدة'
                ],
                'description' => [
                    'en' => 'Sweet cucumber pickles',
                    'fr' => 'Cornichons sucrés',
                    'es' => 'Pepinillos dulces',
                    'ar' => 'مخلل الخيار الحلو'
                ],
                'meta_title' => [
                    'en' => 'Bread & Butter Pickles | adMart',
                    'fr' => 'Cornichons aigres-doux | adMart',
                    'es' => 'Pepinillos dulces | adMart',
                    'ar' => 'مخلل الخبز والزبدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Sweet and tangy bread & butter pickles',
                    'fr' => 'Cornichons aigres-doux sucrés et épicés',
                    'es' => 'Pepinillos dulces y ácidos',
                    'ar' => 'مخلل الخبز والزبدة الحلو واللاذع'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.40,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pickled Jalapeños',
                    'fr' => 'Jalapeños marinés',
                    'es' => 'Jalapeños en escabeche',
                    'ar' => 'هالبينو مخلل'
                ],
                'description' => [
                    'en' => 'Spicy pickled chili peppers',
                    'fr' => 'Piments jalapeños épicés marinés',
                    'es' => 'Chiles jalapeños picantes en escabeche',
                    'ar' => 'فلفل حار مخلل'
                ],
                'meta_title' => [
                    'en' => 'Pickled Jalapeños | adMart',
                    'fr' => 'Jalapeños marinés | adMart',
                    'es' => 'Jalapeños en escabeche | adMart',
                    'ar' => 'هالبينو مخلل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Sliced pickled jalapeño peppers',
                    'fr' => 'Jalapeños marinés en tranches',
                    'es' => 'Jalapeños en escabeche en rodajas',
                    'ar' => 'شرائح فلفل هالبينو مخلل'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.30,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Mango Chutney',
                    'fr' => 'Chutney à la mangue',
                    'es' => 'Chutney de mango',
                    'ar' => 'تشاتني المانجو'
                ],
                'description' => [
                    'en' => 'Sweet and spicy mango relish',
                    'fr' => 'Condiment sucré et épicé à la mangue',
                    'es' => 'Salsa de mango dulce y picante',
                    'ar' => 'صلصة مانجو حلوة وحارة'
                ],
                'meta_title' => [
                    'en' => 'Mango Chutney | adMart',
                    'fr' => 'Chutney à la mangue | adMart',
                    'es' => 'Chutney de mango | adMart',
                    'ar' => 'تشاتني المانجو | adMart'
                ],
                'meta_description' => [
                    'en' => 'Indian-style mango chutney',
                    'fr' => 'Chutney à la mangue style indien',
                    'es' => 'Chutney de mango al estilo indio',
                    'ar' => 'تشاتني المانجو على الطريقة الهندية'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 3.00,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Olives',
                    'fr' => 'Olives',
                    'es' => 'Aceitunas',
                    'ar' => 'زيتون'
                ],
                'description' => [
                    'en' => 'Mixed Mediterranean olives',
                    'fr' => 'Mélange d\'olives méditerranéennes',
                    'es' => 'Mezcla de aceitunas mediterráneas',
                    'ar' => 'مزيج من الزيتون المتوسطي'
                ],
                'meta_title' => [
                    'en' => 'Olives | adMart',
                    'fr' => 'Olives | adMart',
                    'es' => 'Aceitunas | adMart',
                    'ar' => 'زيتون | adMart'
                ],
                'meta_description' => [
                    'en' => 'Assorted pitted olives in brine',
                    'fr' => 'Olives dénoyautées assorties en saumure',
                    'es' => 'Aceitunas deshuesadas variadas en salmuera',
                    'ar' => 'زيتون منزوع النوى متنوع في محلول ملحي'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 3.20,
                'quantity'        => 200,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pickled Onions',
                    'fr' => 'Oignons marinés',
                    'es' => 'Cebollas en vinagre',
                    'ar' => 'بصل مخلل'
                ],
                'description' => [
                    'en' => 'Tangy pickled pearl onions',
                    'fr' => 'Oignons grelots marinés acidulés',
                    'es' => 'Cebollitas perla en vinagre',
                    'ar' => 'بصل لؤلؤي مخلل لاذع'
                ],
                'meta_title' => [
                    'en' => 'Pickled Onions | adMart',
                    'fr' => 'Oignons marinés | adMart',
                    'es' => 'Cebollas en vinagre | adMart',
                    'ar' => 'بصل مخلل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Small pickled onions in vinegar',
                    'fr' => 'Petits oignons marinés au vinaigre',
                    'es' => 'Pequeñas cebollas en vinagre',
                    'ar' => 'بصل صغير مخلل في الخل'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.10,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pepperoncini',
                    'fr' => 'Pepperoncini',
                    'es' => 'Pepperoncini',
                    'ar' => 'بيبيرونسيني'
                ],
                'description' => [
                    'en' => 'Mild Italian pickled peppers',
                    'fr' => 'Poivrons italiens doux marinés',
                    'es' => 'Pimientos italianos suaves en vinagre',
                    'ar' => 'فلفل إيطالي خفيف مخلل'
                ],
                'meta_title' => [
                    'en' => 'Pepperoncini | adMart',
                    'fr' => 'Pepperoncini | adMart',
                    'es' => 'Pepperoncini | adMart',
                    'ar' => 'بيبيرونسيني | adMart'
                ],
                'meta_description' => [
                    'en' => 'Tangy pickled pepperoncini peppers',
                    'fr' => 'Poivrons pepperoncini marinés acidulés',
                    'es' => 'Pimientos pepperoncini en vinagre',
                    'ar' => 'فلفل بيبيرونسيني مخلل لاذع'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.30,
                'quantity'        => 300,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pickled Ginger',
                    'fr' => 'Gingembre mariné',
                    'es' => 'Jengibre en vinagre',
                    'ar' => 'زنجبيل مخلل'
                ],
                'description' => [
                    'en' => 'Japanese-style pickled ginger',
                    'fr' => 'Gingembre mariné style japonais',
                    'es' => 'Jengibre en vinagre al estilo japonés',
                    'ar' => 'زنجبيل مخلل على الطريقة اليابانية'
                ],
                'meta_title' => [
                    'en' => 'Pickled Ginger | adMart',
                    'fr' => 'Gingembre mariné | adMart',
                    'es' => 'Jengibre en vinagre | adMart',
                    'ar' => 'زنجبيل مخلل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Pink pickled ginger for sushi',
                    'fr' => 'Gingembre mariné rose pour sushi',
                    'es' => 'Jengibre en vinagre rosa para sushi',
                    'ar' => 'زنجبيل مخلل وردي للسوشي'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.80,
                'quantity'        => 100,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Kimchi',
                    'fr' => 'Kimchi',
                    'es' => 'Kimchi',
                    'ar' => 'كيمتشي'
                ],
                'description' => [
                    'en' => 'Spicy Korean fermented vegetables',
                    'fr' => 'Légumes fermentés coréens épicés',
                    'es' => 'Verduras fermentadas coreanas picantes',
                    'ar' => 'خضروات كورية مخمرة حارة'
                ],
                'meta_title' => [
                    'en' => 'Kimchi | adMart',
                    'fr' => 'Kimchi | adMart',
                    'es' => 'Kimchi | adMart',
                    'ar' => 'كيمتشي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Traditional Korean kimchi',
                    'fr' => 'Kimchi coréen traditionnel',
                    'es' => 'Kimchi coreano tradicional',
                    'ar' => 'كيمتشي كوري تقليدي'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 4.20,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Pickled Beets',
                    'fr' => 'Betteraves marinées',
                    'es' => 'Remolachas en vinagre',
                    'ar' => 'شمندر مخلل'
                ],
                'description' => [
                    'en' => 'Sweet pickled beetroot slices',
                    'fr' => 'Tranches de betterave sucrées marinées',
                    'es' => 'Rodajas de remolacha dulce en vinagre',
                    'ar' => 'شرائح الشمندر الحلو المخلل'
                ],
                'meta_title' => [
                    'en' => 'Pickled Beets | adMart',
                    'fr' => 'Betteraves marinées | adMart',
                    'es' => 'Remolachas en vinagre | adMart',
                    'ar' => 'شمندر مخلل | adMart'
                ],
                'meta_description' => [
                    'en' => 'Tender pickled beet slices',
                    'fr' => 'Tranches de betterave marinées tendres',
                    'es' => 'Tiernas rodajas de remolacha en vinagre',
                    'ar' => 'شرائح الشمندر الطرية المخللة'
                ],
                'category_id'     => 8,
                'sub_category_id' => 24,
                'price'           => 2.50,
                'quantity'        => 400,
                'unit'            => 'g'
            ],

            //230-240

            [
                'name' => [
                    'en' => 'Frozen Peas',
                    'fr' => 'Pois surgelés',
                    'es' => 'Guisantes congelados',
                    'ar' => 'بازلاء مجمدة'
                ],
                'description' => [
                    'en' => 'Sweet garden peas, flash frozen',
                    'fr' => 'Pois gourmands surgelés rapidement',
                    'es' => 'Guisantes dulces del jardín, ultracongelados',
                    'ar' => 'بازلاء حدائق حلوة مجمدة سريعاً'
                ],
                'meta_title' => [
                    'en' => 'Frozen Peas | adMart',
                    'fr' => 'Pois surgelés | adMart',
                    'es' => 'Guisantes congelados | adMart',
                    'ar' => 'بازلاء مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen peas for cooking',
                    'fr' => 'Pois surgelés premium pour la cuisine',
                    'es' => 'Guisantes congelados premium para cocinar',
                    'ar' => 'بازلاء مجمدة ممتازة للطبخ'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Mixed Vegetables',
                    'fr' => 'Légumes surgelés mélangés',
                    'es' => 'Verduras mixtas congeladas',
                    'ar' => 'خضروات مجمدة متنوعة'
                ],
                'description' => [
                    'en' => 'Blend of carrots, corn, peas and green beans',
                    'fr' => 'Mélange de carottes, maïs, pois et haricots verts',
                    'es' => 'Mezcla de zanahorias, maíz, guisantes y judías verdes',
                    'ar' => 'مزيج من الجزر والذرة والبازلاء والفاصوليا الخضراء'
                ],
                'meta_title' => [
                    'en' => 'Frozen Mixed Vegetables | adMart',
                    'fr' => 'Légumes surgelés mélangés | adMart',
                    'es' => 'Verduras mixtas congeladas | adMart',
                    'ar' => 'خضروات مجمدة متنوعة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen vegetable mix',
                    'fr' => 'Mélange pratique de légumes surgelés',
                    'es' => 'Mezcla conveniente de verduras congeladas',
                    'ar' => 'خليط خضروات مجمدة مريح'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.20,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Broccoli Florets',
                    'fr' => 'Brocolis en fleurettes surgelés',
                    'es' => 'Floretes de brócoli congelados',
                    'ar' => 'بروكلي مجمد'
                ],
                'description' => [
                    'en' => 'Fresh broccoli florets, frozen',
                    'fr' => 'Fleurettes de brocolis frais surgelées',
                    'es' => 'Floretes de brócoli frescos congelados',
                    'ar' => 'براعم بروكلي طازجة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Broccoli | adMart',
                    'fr' => 'Brocolis surgelés | adMart',
                    'es' => 'Brócoli congelado | adMart',
                    'ar' => 'بروكلي مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Nutritious frozen broccoli florets',
                    'fr' => 'Fleurettes de brocolis surgelées nutritives',
                    'es' => 'Floretes de brócoli congelados nutritivos',
                    'ar' => 'براعم بروكلي مجمدة مغذية'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Spinach',
                    'fr' => 'Épinards surgelés',
                    'es' => 'Espinacas congeladas',
                    'ar' => 'سبانخ مجمدة'
                ],
                'description' => [
                    'en' => 'Chopped spinach, frozen',
                    'fr' => 'Épinards hachés surgelés',
                    'es' => 'Espinacas picadas congeladas',
                    'ar' => 'سبانخ مفرومة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Spinach | adMart',
                    'fr' => 'Épinards surgelés | adMart',
                    'es' => 'Espinacas congeladas | adMart',
                    'ar' => 'سبانخ مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen chopped spinach',
                    'fr' => 'Épinards hachés surgelés pratiques',
                    'es' => 'Espinacas picadas congeladas convenientes',
                    'ar' => 'سبانخ مفرومة مجمدة مريحة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 1.80,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Corn Kernels',
                    'fr' => 'Grains de maïs surgelés',
                    'es' => 'Granos de maíz congelados',
                    'ar' => 'حبات ذرة مجمدة'
                ],
                'description' => [
                    'en' => 'Sweet corn kernels, frozen',
                    'fr' => 'Grains de maïs doux surgelés',
                    'es' => 'Granos de maíz dulce congelados',
                    'ar' => 'حبات ذرة حلوة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Corn | adMart',
                    'fr' => 'Maïs surgelé | adMart',
                    'es' => 'Maíz congelado | adMart',
                    'ar' => 'ذرة مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Sweet frozen corn kernels',
                    'fr' => 'Grains de maïs doux surgelés',
                    'es' => 'Granos de maíz dulce congelados',
                    'ar' => 'حبات ذرة حلوة مجمدة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 1.90,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Green Beans',
                    'fr' => 'Haricots verts surgelés',
                    'es' => 'Judías verdes congeladas',
                    'ar' => 'فاصوليا خضراء مجمدة'
                ],
                'description' => [
                    'en' => 'Tender green beans, frozen',
                    'fr' => 'Haricots verts tendres surgelés',
                    'es' => 'Judías verdes tiernas congeladas',
                    'ar' => 'فاصوليا خضراء طرية مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Green Beans | adMart',
                    'fr' => 'Haricots verts surgelés | adMart',
                    'es' => 'Judías verdes congeladas | adMart',
                    'ar' => 'فاصوليا خضراء مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen green beans',
                    'fr' => 'Haricots verts surgelés premium',
                    'es' => 'Judías verdes congeladas premium',
                    'ar' => 'فاصوليا خضراء مجمدة ممتازة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.10,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Cauliflower',
                    'fr' => 'Chou-fleur surgelé',
                    'es' => 'Coliflor congelada',
                    'ar' => 'قرنبيط مجمد'
                ],
                'description' => [
                    'en' => 'Fresh cauliflower florets, frozen',
                    'fr' => 'Fleurettes de chou-fleur frais surgelées',
                    'es' => 'Floretes de coliflor frescos congelados',
                    'ar' => 'براعم قرنبيط طازجة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Cauliflower | adMart',
                    'fr' => 'Chou-fleur surgelé | adMart',
                    'es' => 'Coliflor congelada | adMart',
                    'ar' => 'قرنبيط مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Nutritious frozen cauliflower',
                    'fr' => 'Chou-fleur surgelé nutritif',
                    'es' => 'Coliflor congelada nutritiva',
                    'ar' => 'قرنبيط مجمد مغذي'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.30,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Stir Fry Mix',
                    'fr' => 'Mélange pour sauté surgelé',
                    'es' => 'Mezcla para salteados congelada',
                    'ar' => 'خليط سوتيه مجمد'
                ],
                'description' => [
                    'en' => 'Asian-style vegetable mix for stir frying',
                    'fr' => 'Mélange de légumes style asiatique pour sauté',
                    'es' => 'Mezcla de verduras al estilo asiático para saltear',
                    'ar' => 'خليط خضار على الطريقة الآسيوية للقلي السريع'
                ],
                'meta_title' => [
                    'en' => 'Frozen Stir Fry Vegetables | adMart',
                    'fr' => 'Légumes pour sauté surgelés | adMart',
                    'es' => 'Verduras para saltear congeladas | adMart',
                    'ar' => 'خضروات سوتيه مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen stir fry mix',
                    'fr' => 'Mélange pratique pour sauté surgelé',
                    'es' => 'Mezcla conveniente para saltear congelada',
                    'ar' => 'خليط سوتيه مجمد مريح'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.40,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Edamame',
                    'fr' => 'Edamame surgelé',
                    'es' => 'Edamame congelado',
                    'ar' => 'إدامامي مجمد'
                ],
                'description' => [
                    'en' => 'Young soybeans in pods, frozen',
                    'fr' => 'Jeunes fèves de soja en gousses surgelées',
                    'es' => 'Soja joven en vainas, congelada',
                    'ar' => 'فول صويا صغير في قرون مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Edamame | adMart',
                    'fr' => 'Edamame surgelé | adMart',
                    'es' => 'Edamame congelado | adMart',
                    'ar' => 'إدامامي مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Nutritious frozen edamame beans',
                    'fr' => 'Fèves edamame surgelées nutritives',
                    'es' => 'Soja edamame congelada nutritiva',
                    'ar' => 'فول إدامامي مجمد مغذي'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 3.00,
                'quantity'        => 400,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Brussels Sprouts',
                    'fr' => 'Choux de Bruxelles surgelés',
                    'es' => 'Coles de Bruselas congeladas',
                    'ar' => 'كرنب بروكسل مجمد'
                ],
                'description' => [
                    'en' => 'Fresh Brussels sprouts, frozen',
                    'fr' => 'Choux de Bruxelles frais surgelés',
                    'es' => 'Coles de Bruselas frescas congeladas',
                    'ar' => 'كرنب بروكسل طازج مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Brussels Sprouts | adMart',
                    'fr' => 'Choux de Bruxelles surgelés | adMart',
                    'es' => 'Coles de Bruselas congeladas | adMart',
                    'ar' => 'كرنب بروكسل مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen Brussels sprouts',
                    'fr' => 'Choux de Bruxelles surgelés premium',
                    'es' => 'Coles de Bruselas congeladas premium',
                    'ar' => 'كرنب بروكسل مجمد ممتاز'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.60,
                'quantity'        => 500,
                'unit'            => 'g'
            ],

            //240-250

            [
                'name' => [
                    'en' => 'Frozen Peas',
                    'fr' => 'Pois surgelés',
                    'es' => 'Guisantes congelados',
                    'ar' => 'بازلاء مجمدة'
                ],
                'description' => [
                    'en' => 'Sweet garden peas, flash frozen',
                    'fr' => 'Pois gourmands surgelés rapidement',
                    'es' => 'Guisantes dulces del jardín, ultracongelados',
                    'ar' => 'بازلاء حدائق حلوة مجمدة سريعاً'
                ],
                'meta_title' => [
                    'en' => 'Frozen Peas | adMart',
                    'fr' => 'Pois surgelés | adMart',
                    'es' => 'Guisantes congelados | adMart',
                    'ar' => 'بازلاء مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen peas for cooking',
                    'fr' => 'Pois surgelés premium pour la cuisine',
                    'es' => 'Guisantes congelados premium para cocinar',
                    'ar' => 'بازلاء مجمدة ممتازة للطبخ'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.00,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Mixed Vegetables',
                    'fr' => 'Légumes surgelés mélangés',
                    'es' => 'Verduras mixtas congeladas',
                    'ar' => 'خضروات مجمدة متنوعة'
                ],
                'description' => [
                    'en' => 'Blend of carrots, corn, peas and green beans',
                    'fr' => 'Mélange de carottes, maïs, pois et haricots verts',
                    'es' => 'Mezcla de zanahorias, maíz, guisantes y judías verdes',
                    'ar' => 'مزيج من الجزر والذرة والبازلاء والفاصوليا الخضراء'
                ],
                'meta_title' => [
                    'en' => 'Frozen Mixed Vegetables | adMart',
                    'fr' => 'Légumes surgelés mélangés | adMart',
                    'es' => 'Verduras mixtas congeladas | adMart',
                    'ar' => 'خضروات مجمدة متنوعة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen vegetable mix',
                    'fr' => 'Mélange pratique de légumes surgelés',
                    'es' => 'Mezcla conveniente de verduras congeladas',
                    'ar' => 'خليط خضروات مجمدة مريح'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.20,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Broccoli Florets',
                    'fr' => 'Brocolis en fleurettes surgelés',
                    'es' => 'Floretes de brócoli congelados',
                    'ar' => 'بروكلي مجمد'
                ],
                'description' => [
                    'en' => 'Fresh broccoli florets, frozen',
                    'fr' => 'Fleurettes de brocolis frais surgelées',
                    'es' => 'Floretes de brócoli frescos congelados',
                    'ar' => 'براعم بروكلي طازجة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Broccoli | adMart',
                    'fr' => 'Brocolis surgelés | adMart',
                    'es' => 'Brócoli congelado | adMart',
                    'ar' => 'بروكلي مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Nutritious frozen broccoli florets',
                    'fr' => 'Fleurettes de brocolis surgelées nutritives',
                    'es' => 'Floretes de brócoli congelados nutritivos',
                    'ar' => 'براعم بروكلي مجمدة مغذية'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Spinach',
                    'fr' => 'Épinards surgelés',
                    'es' => 'Espinacas congeladas',
                    'ar' => 'سبانخ مجمدة'
                ],
                'description' => [
                    'en' => 'Chopped spinach, frozen',
                    'fr' => 'Épinards hachés surgelés',
                    'es' => 'Espinacas picadas congeladas',
                    'ar' => 'سبانخ مفرومة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Spinach | adMart',
                    'fr' => 'Épinards surgelés | adMart',
                    'es' => 'Espinacas congeladas | adMart',
                    'ar' => 'سبانخ مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen chopped spinach',
                    'fr' => 'Épinards hachés surgelés pratiques',
                    'es' => 'Espinacas picadas congeladas convenientes',
                    'ar' => 'سبانخ مفرومة مجمدة مريحة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 1.80,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Corn Kernels',
                    'fr' => 'Grains de maïs surgelés',
                    'es' => 'Granos de maíz congelados',
                    'ar' => 'حبات ذرة مجمدة'
                ],
                'description' => [
                    'en' => 'Sweet corn kernels, frozen',
                    'fr' => 'Grains de maïs doux surgelés',
                    'es' => 'Granos de maíz dulce congelados',
                    'ar' => 'حبات ذرة حلوة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Corn | adMart',
                    'fr' => 'Maïs surgelé | adMart',
                    'es' => 'Maíz congelado | adMart',
                    'ar' => 'ذرة مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Sweet frozen corn kernels',
                    'fr' => 'Grains de maïs doux surgelés',
                    'es' => 'Granos de maíz dulce congelados',
                    'ar' => 'حبات ذرة حلوة مجمدة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 1.90,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Green Beans',
                    'fr' => 'Haricots verts surgelés',
                    'es' => 'Judías verdes congeladas',
                    'ar' => 'فاصوليا خضراء مجمدة'
                ],
                'description' => [
                    'en' => 'Tender green beans, frozen',
                    'fr' => 'Haricots verts tendres surgelés',
                    'es' => 'Judías verdes tiernas congeladas',
                    'ar' => 'فاصوليا خضراء طرية مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Green Beans | adMart',
                    'fr' => 'Haricots verts surgelés | adMart',
                    'es' => 'Judías verdes congeladas | adMart',
                    'ar' => 'فاصوليا خضراء مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen green beans',
                    'fr' => 'Haricots verts surgelés premium',
                    'es' => 'Judías verdes congeladas premium',
                    'ar' => 'فاصوليا خضراء مجمدة ممتازة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.10,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Cauliflower',
                    'fr' => 'Chou-fleur surgelé',
                    'es' => 'Coliflor congelada',
                    'ar' => 'قرنبيط مجمد'
                ],
                'description' => [
                    'en' => 'Fresh cauliflower florets, frozen',
                    'fr' => 'Fleurettes de chou-fleur frais surgelées',
                    'es' => 'Floretes de coliflor frescos congelados',
                    'ar' => 'براعم قرنبيط طازجة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Cauliflower | adMart',
                    'fr' => 'Chou-fleur surgelé | adMart',
                    'es' => 'Coliflor congelada | adMart',
                    'ar' => 'قرنبيط مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Nutritious frozen cauliflower',
                    'fr' => 'Chou-fleur surgelé nutritif',
                    'es' => 'Coliflor congelada nutritiva',
                    'ar' => 'قرنبيط مجمد مغذي'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.30,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Stir Fry Mix',
                    'fr' => 'Mélange pour sauté surgelé',
                    'es' => 'Mezcla para salteados congelada',
                    'ar' => 'خليط سوتيه مجمد'
                ],
                'description' => [
                    'en' => 'Asian-style vegetable mix for stir frying',
                    'fr' => 'Mélange de légumes style asiatique pour sauté',
                    'es' => 'Mezcla de verduras al estilo asiático para saltear',
                    'ar' => 'خليط خضار على الطريقة الآسيوية للقلي السريع'
                ],
                'meta_title' => [
                    'en' => 'Frozen Stir Fry Vegetables | adMart',
                    'fr' => 'Légumes pour sauté surgelés | adMart',
                    'es' => 'Verduras para saltear congeladas | adMart',
                    'ar' => 'خضروات سوتيه مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen stir fry mix',
                    'fr' => 'Mélange pratique pour sauté surgelé',
                    'es' => 'Mezcla conveniente para saltear congelada',
                    'ar' => 'خليط سوتيه مجمد مريح'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.40,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Edamame',
                    'fr' => 'Edamame surgelé',
                    'es' => 'Edamame congelado',
                    'ar' => 'إدامامي مجمد'
                ],
                'description' => [
                    'en' => 'Young soybeans in pods, frozen',
                    'fr' => 'Jeunes fèves de soja en gousses surgelées',
                    'es' => 'Soja joven en vainas, congelada',
                    'ar' => 'فول صويا صغير في قرون مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Edamame | adMart',
                    'fr' => 'Edamame surgelé | adMart',
                    'es' => 'Edamame congelado | adMart',
                    'ar' => 'إدامامي مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Nutritious frozen edamame beans',
                    'fr' => 'Fèves edamame surgelées nutritives',
                    'es' => 'Soja edamame congelada nutritiva',
                    'ar' => 'فول إدامامي مجمد مغذي'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 3.00,
                'quantity'        => 400,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Brussels Sprouts',
                    'fr' => 'Choux de Bruxelles surgelés',
                    'es' => 'Coles de Bruselas congeladas',
                    'ar' => 'كرنب بروكسل مجمد'
                ],
                'description' => [
                    'en' => 'Fresh Brussels sprouts, frozen',
                    'fr' => 'Choux de Bruxelles frais surgelés',
                    'es' => 'Coles de Bruselas frescas congeladas',
                    'ar' => 'كرنب بروكسل طازج مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Brussels Sprouts | adMart',
                    'fr' => 'Choux de Bruxelles surgelés | adMart',
                    'es' => 'Coles de Bruselas congeladas | adMart',
                    'ar' => 'كرنب بروكسل مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen Brussels sprouts',
                    'fr' => 'Choux de Bruxelles surgelés premium',
                    'es' => 'Coles de Bruselas congeladas premium',
                    'ar' => 'كرنب بروكسل مجمد ممتاز'
                ],
                'category_id'     => 9,
                'sub_category_id' => 25,
                'price'           => 2.60,
                'quantity'        => 500,
                'unit'            => 'g'
            ],

            //250-260

            [
                'name' => [
                    'en' => 'Vanilla Ice Cream',
                    'fr' => 'Glace à la vanille',
                    'es' => 'Helado de vainilla',
                    'ar' => 'آيس كريم فانيليا'
                ],
                'description' => [
                    'en' => 'Classic vanilla bean ice cream',
                    'fr' => 'Glace classique à la gousse de vanille',
                    'es' => 'Helado clásico de vainilla',
                    'ar' => 'آيس كريم فانيليا كلاسيكي'
                ],
                'meta_title' => [
                    'en' => 'Vanilla Ice Cream | adMart',
                    'fr' => 'Glace à la vanille | adMart',
                    'es' => 'Helado de vainilla | adMart',
                    'ar' => 'آيس كريم فانيليا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium vanilla ice cream',
                    'fr' => 'Glace à la vanille premium',
                    'es' => 'Helado de vainilla premium',
                    'ar' => 'آيس كريم فانيليا ممتاز'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.50,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Chocolate Ice Cream',
                    'fr' => 'Glace au chocolat',
                    'es' => 'Helado de chocolate',
                    'ar' => 'آيس كريم شوكولاتة'
                ],
                'description' => [
                    'en' => 'Rich chocolate ice cream',
                    'fr' => 'Glace riche au chocolat',
                    'es' => 'Helado de chocolate intenso',
                    'ar' => 'آيس كريم شوكولاتة غني'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Ice Cream | adMart',
                    'fr' => 'Glace au chocolat | adMart',
                    'es' => 'Helado de chocolate | adMart',
                    'ar' => 'آيس كريم شوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Decadent chocolate ice cream',
                    'fr' => 'Glace au chocolat décadente',
                    'es' => 'Helado de chocolate decadente',
                    'ar' => 'آيس كريم شوكولاتة فاخر'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.50,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Strawberry Ice Cream',
                    'fr' => 'Glace à la fraise',
                    'es' => 'Helado de fresa',
                    'ar' => 'آيس كريم فراولة'
                ],
                'description' => [
                    'en' => 'Creamy strawberry ice cream',
                    'fr' => 'Glace onctueuse à la fraise',
                    'es' => 'Helado cremoso de fresa',
                    'ar' => 'آيس كريم فراولة كريمي'
                ],
                'meta_title' => [
                    'en' => 'Strawberry Ice Cream | adMart',
                    'fr' => 'Glace à la fraise | adMart',
                    'es' => 'Helado de fresa | adMart',
                    'ar' => 'آيس كريم فراولة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Fruity strawberry ice cream',
                    'fr' => 'Glace fruitée à la fraise',
                    'es' => 'Helado de fresa afrutado',
                    'ar' => 'آيس كريم فراولة فواكه'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.50,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Mint Chocolate Chip Ice Cream',
                    'fr' => 'Glace menthe aux pépites de chocolat',
                    'es' => 'Helado de menta con trozos de chocolate',
                    'ar' => 'آيس كريم نعناع برقائق الشوكولاتة'
                ],
                'description' => [
                    'en' => 'Mint ice cream with chocolate chips',
                    'fr' => 'Glace à la menthe avec pépites de chocolat',
                    'es' => 'Helado de menta con trozos de chocolate',
                    'ar' => 'آيس كريم نعناع مع رقائق شوكولاتة'
                ],
                'meta_title' => [
                    'en' => 'Mint Chocolate Chip Ice Cream | adMart',
                    'fr' => 'Glace menthe-chocolat | adMart',
                    'es' => 'Helado de menta con chocolate | adMart',
                    'ar' => 'آيس كريم نعناع برقائق الشوكولاتة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Refreshing mint chocolate chip ice cream',
                    'fr' => 'Glace rafraîchissante menthe-chocolat',
                    'es' => 'Refrescante helado de menta con trozos de chocolate',
                    'ar' => 'آيس كريم منعش بالنعناع ورقائق الشوكولاتة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.80,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Cookies & Cream Ice Cream',
                    'fr' => 'Glace cookies and cream',
                    'es' => 'Helado de galletas y crema',
                    'ar' => 'آيس كريم كوكيز وكريمة'
                ],
                'description' => [
                    'en' => 'Vanilla ice cream with cookie pieces',
                    'fr' => 'Glace à la vanille avec morceaux de cookies',
                    'es' => 'Helado de vainilla con trozos de galleta',
                    'ar' => 'آيس كريم فانيليا مع قطع كوكيز'
                ],
                'meta_title' => [
                    'en' => 'Cookies & Cream Ice Cream | adMart',
                    'fr' => 'Glace cookies and cream | adMart',
                    'es' => 'Helado de galletas y crema | adMart',
                    'ar' => 'آيس كريم كوكيز وكريمة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Classic cookies and cream ice cream',
                    'fr' => 'Glace classique cookies and cream',
                    'es' => 'Clásico helado de galletas y crema',
                    'ar' => 'آيس كريم كلاسيكي كوكيز وكريمة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.80,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Sorbet (Raspberry)',
                    'fr' => 'Sorbet (Framboise)',
                    'es' => 'Sorbete (Frambuesa)',
                    'ar' => 'سوربيت (توت العليق)'
                ],
                'description' => [
                    'en' => 'Dairy-free raspberry sorbet',
                    'fr' => 'Sorbet à la framboise sans lait',
                    'es' => 'Sorbete de frambuesa sin lácteos',
                    'ar' => 'سوربيت توت عليق خالي من الألبان'
                ],
                'meta_title' => [
                    'en' => 'Raspberry Sorbet | adMart',
                    'fr' => 'Sorbet framboise | adMart',
                    'es' => 'Sorbete de frambuesa | adMart',
                    'ar' => 'سوربيت توت العليق | adMart'
                ],
                'meta_description' => [
                    'en' => 'Refreshing raspberry sorbet',
                    'fr' => 'Sorbet framboise rafraîchissant',
                    'es' => 'Refrescante sorbete de frambuesa',
                    'ar' => 'سوربيت توت العليق المنعش'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.20,
                'quantity'        => 500,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Frozen Yogurt (Vanilla)',
                    'fr' => 'Yaourt glacé (Vanille)',
                    'es' => 'Yogur helado (Vainilla)',
                    'ar' => 'زبادي مجمد (فانيليا)'
                ],
                'description' => [
                    'en' => 'Low-fat vanilla frozen yogurt',
                    'fr' => 'Yaourt glacé à la vanille allégé',
                    'es' => 'Yogur helado de vainilla bajo en grasa',
                    'ar' => 'زبادي مجمد فانيليا قليل الدسم'
                ],
                'meta_title' => [
                    'en' => 'Vanilla Frozen Yogurt | adMart',
                    'fr' => 'Yaourt glacé vanille | adMart',
                    'es' => 'Yogur helado de vainilla | adMart',
                    'ar' => 'زبادي مجمد فانيليا | adMart'
                ],
                'meta_description' => [
                    'en' => 'Creamy vanilla frozen yogurt',
                    'fr' => 'Yaourt glacé vanille onctueux',
                    'es' => 'Yogur helado de vainilla cremoso',
                    'ar' => 'زبادي مجمد فانيليا كريمي'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 4.00,
                'quantity'        => 1,
                'unit'            => 'L'
            ],
            [
                'name' => [
                    'en' => 'Ice Cream Sandwich',
                    'fr' => 'Sandwich glacé',
                    'es' => 'Sándwich de helado',
                    'ar' => 'ساندويتش آيس كريم'
                ],
                'description' => [
                    'en' => 'Vanilla ice cream between chocolate wafers',
                    'fr' => 'Glace à la vanille entre deux gaufrettes chocolatées',
                    'es' => 'Helado de vainilla entre obleas de chocolate',
                    'ar' => 'آيس كريم فانيليا بين طبقات من الويفر بالشوكولاتة'
                ],
                'meta_title' => [
                    'en' => 'Ice Cream Sandwiches | adMart',
                    'fr' => 'Sandwichs glacés | adMart',
                    'es' => 'Sándwiches de helado | adMart',
                    'ar' => 'ساندويتشات آيس كريم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Classic ice cream sandwiches',
                    'fr' => 'Sandwichs glacés classiques',
                    'es' => 'Clásicos sándwiches de helado',
                    'ar' => 'ساندويتشات آيس كريم كلاسيكية'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 3.50,
                'quantity'        => 4,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Frozen Cheesecake',
                    'fr' => 'Cheesecake surgelé',
                    'es' => 'Tarta de queso congelada',
                    'ar' => 'تشيز كيك مجمد'
                ],
                'description' => [
                    'en' => 'New York style cheesecake, frozen',
                    'fr' => 'Cheesecake style New York, surgelé',
                    'es' => 'Tarta de queso estilo Nueva York, congelada',
                    'ar' => 'تشيز كيك على طريقة نيويورك، مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Cheesecake | adMart',
                    'fr' => 'Cheesecake surgelé | adMart',
                    'es' => 'Tarta de queso congelada | adMart',
                    'ar' => 'تشيز كيك مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Creamy frozen cheesecake',
                    'fr' => 'Cheesecake surgelé onctueux',
                    'es' => 'Tarta de queso congelada cremosa',
                    'ar' => 'تشيز كيك مجمد كريمي'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 6.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Chocolate Lava Cake',
                    'fr' => 'Gâteau au chocolat coulant surgelé',
                    'es' => 'Pastel de chocolate fundente congelado',
                    'ar' => 'كعكة الشوكولاتة الذائبة المجمدة'
                ],
                'description' => [
                    'en' => 'Decadent chocolate cake with molten center',
                    'fr' => 'Gâteau au chocolat décadent avec cœur coulant',
                    'es' => 'Pastel de chocolate decadente con centro fundente',
                    'ar' => 'كعكة شوكولاتة فاخرة بقلب ذائب'
                ],
                'meta_title' => [
                    'en' => 'Chocolate Lava Cake | adMart',
                    'fr' => 'Gâteau chocolat coulant | adMart',
                    'es' => 'Pastel de chocolate fundente | adMart',
                    'ar' => 'كعكة الشوكولاتة الذائبة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Indulgent frozen chocolate lava cake',
                    'fr' => 'Gâteau au chocolat coulant surgelé indulgent',
                    'es' => 'Pastel de chocolate fundente congelado indulgente',
                    'ar' => 'كعكة الشوكولاتة الذائبة المجمدة الفاخرة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 26,
                'price'           => 5.00,
                'quantity'        => 2,
                'unit'            => 'pcs'
            ],

            //260-270

            [
                'name' => [
                    'en' => 'Frozen Pizza (Pepperoni)',
                    'fr' => 'Pizza surgelée (Pepperoni)',
                    'es' => 'Pizza congelada (Pepperoni)',
                    'ar' => 'بيتزا مجمدة (بيبروني)'
                ],
                'description' => [
                    'en' => 'Classic pepperoni pizza, frozen',
                    'fr' => 'Pizza classique pepperoni surgelée',
                    'es' => 'Pizza pepperoni clásica congelada',
                    'ar' => 'بيتزا بيبروني كلاسيكية مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Pepperoni Pizza | adMart',
                    'fr' => 'Pizza pepperoni surgelée | adMart',
                    'es' => 'Pizza pepperoni congelada | adMart',
                    'ar' => 'بيتزا بيبروني مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Ready-to-bake pepperoni pizza',
                    'fr' => 'Pizza pepperoni prête à cuire',
                    'es' => 'Pizza pepperoni lista para hornear',
                    'ar' => 'بيتزا بيبروني جاهزة للخبز'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 5.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Frozen Lasagna',
                    'fr' => 'Lasagnes surgelées',
                    'es' => 'Lasaña congelada',
                    'ar' => 'لازانيا مجمدة'
                ],
                'description' => [
                    'en' => 'Traditional beef lasagna, frozen',
                    'fr' => 'Lasagnes traditionnelles au bœuf surgelées',
                    'es' => 'Lasaña de carne tradicional congelada',
                    'ar' => 'لازانيا لحم تقليدية مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Lasagna | adMart',
                    'fr' => 'Lasagnes surgelées | adMart',
                    'es' => 'Lasaña congelada | adMart',
                    'ar' => 'لازانيا مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Ready-to-bake frozen lasagna',
                    'fr' => 'Lasagnes surgelées prêtes à cuire',
                    'es' => 'Lasaña congelada lista para hornear',
                    'ar' => 'لازانيا مجمدة جاهزة للخبز'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 6.00,
                'quantity'        => 800,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Chicken Nuggets',
                    'fr' => 'Nuggets de poulet surgelés',
                    'es' => 'Nuggets de pollo congelados',
                    'ar' => 'قطع دجاج مجمدة'
                ],
                'description' => [
                    'en' => 'Breaded chicken nuggets, frozen',
                    'fr' => 'Nuggets de poulet panés surgelés',
                    'es' => 'Nuggets de pollo empanados congelados',
                    'ar' => 'قطع دجاج مقلية ومجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Chicken Nuggets | adMart',
                    'fr' => 'Nuggets de poulet surgelés | adMart',
                    'es' => 'Nuggets de pollo congelados | adMart',
                    'ar' => 'قطع دجاج مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Crispy frozen chicken nuggets',
                    'fr' => 'Nuggets de poulet surgelés croustillants',
                    'es' => 'Nuggets de pollo congelados crujientes',
                    'ar' => 'قطع دجاج مقرمشة مجمدة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 4.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Fish Fillets',
                    'fr' => 'Filets de poisson surgelés',
                    'es' => 'Filetes de pescado congelados',
                    'ar' => 'شرائح سمك مجمدة'
                ],
                'description' => [
                    'en' => 'Breaded white fish fillets, frozen',
                    'fr' => 'Filets de poisson blanc panés surgelés',
                    'es' => 'Filetes de pescado blanco empanados congelados',
                    'ar' => 'شرائح سمك أبيض مقلية ومجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Fish Fillets | adMart',
                    'fr' => 'Filets de poisson surgelés | adMart',
                    'es' => 'Filetes de pescado congelados | adMart',
                    'ar' => 'شرائح سمك مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Premium frozen fish fillets',
                    'fr' => 'Filets de poisson surgelés premium',
                    'es' => 'Filetes de pescado congelados premium',
                    'ar' => 'شرائح سمك مجمدة ممتازة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 5.20,
                'quantity'        => 400,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Vegetable Stir Fry',
                    'fr' => 'Mélange à sauté de légumes surgelé',
                    'es' => 'Mezcla para saltear de verduras congelada',
                    'ar' => 'خليط خضروات سوتيه مجمد'
                ],
                'description' => [
                    'en' => 'Complete vegetable stir fry meal kit',
                    'fr' => 'Kit complet de sauté de légumes surgelé',
                    'es' => 'Kit completo de salteado de verduras congelado',
                    'ar' => 'وجبة خضروات سوتيه كاملة مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Stir Fry Meal | adMart',
                    'fr' => 'Repas sauté surgelé | adMart',
                    'es' => 'Comida salteada congelada | adMart',
                    'ar' => 'وجبة سوتيه مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Convenient frozen stir fry kit',
                    'fr' => 'Kit sauté surgelé pratique',
                    'es' => 'Práctico kit de salteado congelado',
                    'ar' => 'خليط سوتيه مجمد مريح'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 4.80,
                'quantity'        => 600,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Mac & Cheese',
                    'fr' => 'Macaroni au fromage surgelé',
                    'es' => 'Macarrones con queso congelados',
                    'ar' => 'ماك أند تشيز مجمد'
                ],
                'description' => [
                    'en' => 'Creamy macaroni and cheese, frozen',
                    'fr' => 'Macaroni au fromage crémeux surgelé',
                    'es' => 'Macarrones con queso cremosos congelados',
                    'ar' => 'معكرونة بالجبن كريمية مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Mac & Cheese | adMart',
                    'fr' => 'Macaroni au fromage surgelé | adMart',
                    'es' => 'Macarrones con queso congelados | adMart',
                    'ar' => 'ماك أند تشيز مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Ready-to-heat mac and cheese',
                    'fr' => 'Macaroni au fromage prêt à réchauffer',
                    'es' => 'Macarrones con queso listos para calentar',
                    'ar' => 'ماك أند تشيز جاهز للتسخين'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 3.80,
                'quantity'        => 400,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Chicken Pot Pie',
                    'fr' => 'Tourte au poulet surgelée',
                    'es' => 'Pastel de pollo congelado',
                    'ar' => 'فطيرة الدجاج المجمدة'
                ],
                'description' => [
                    'en' => 'Classic chicken pot pie, frozen',
                    'fr' => 'Tourte classique au poulet surgelée',
                    'es' => 'Pastel clásico de pollo congelado',
                    'ar' => 'فطيرة دجاج كلاسيكية مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Chicken Pot Pie | adMart',
                    'fr' => 'Tourte au poulet surgelée | adMart',
                    'es' => 'Pastel de pollo congelado | adMart',
                    'ar' => 'فطيرة الدجاج المجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Hearty frozen chicken pot pie',
                    'fr' => 'Tourte au poulet surgelée copieuse',
                    'es' => 'Sustancioso pastel de pollo congelado',
                    'ar' => 'فطيرة دجاج مجمدة شهية'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 4.20,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Frozen Breakfast Sandwich',
                    'fr' => 'Sandwich petit-déjeuner surgelé',
                    'es' => 'Sándwich de desayuno congelado',
                    'ar' => 'ساندويتش إفطار مجمد'
                ],
                'description' => [
                    'en' => 'Egg and cheese breakfast sandwich, frozen',
                    'fr' => 'Sandwich petit-déjeuner œuf et fromage surgelé',
                    'es' => 'Sándwich de desayuno de huevo y queso congelado',
                    'ar' => 'ساندويتش إفطار بالبيض والجبن مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Breakfast Sandwich | adMart',
                    'fr' => 'Sandwich petit-déjeuner surgelé | adMart',
                    'es' => 'Sándwich de desayuno congelado | adMart',
                    'ar' => 'ساندويتش إفطار مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Quick frozen breakfast sandwich',
                    'fr' => 'Sandwich petit-déjeuner surgelé rapide',
                    'es' => 'Rápido sándwich de desayuno congelado',
                    'ar' => 'ساندويتش إفطار مجمد سريع'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 3.50,
                'quantity'        => 4,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Frozen Dumplings',
                    'fr' => 'Raviolis surgelés',
                    'es' => 'Empanadillas congeladas',
                    'ar' => 'زلابية مجمدة'
                ],
                'description' => [
                    'en' => 'Pork and vegetable dumplings, frozen',
                    'fr' => 'Raviolis au porc et légumes surgelés',
                    'es' => 'Empanadillas de cerdo y verduras congeladas',
                    'ar' => 'زلابية لحم خنزير وخضروات مجمدة'
                ],
                'meta_title' => [
                    'en' => 'Frozen Dumplings | adMart',
                    'fr' => 'Raviolis surgelés | adMart',
                    'es' => 'Empanadillas congeladas | adMart',
                    'ar' => 'زلابية مجمدة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Asian-style frozen dumplings',
                    'fr' => 'Raviolis surgelés style asiatique',
                    'es' => 'Empanadillas congeladas estilo asiático',
                    'ar' => 'زلابية على الطريقة الآسيوية مجمدة'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 5.50,
                'quantity'        => 500,
                'unit'            => 'g'
            ],
            [
                'name' => [
                    'en' => 'Frozen Garlic Bread',
                    'fr' => 'Pain à l\'ail surgelé',
                    'es' => 'Pan de ajo congelado',
                    'ar' => 'خبز ثوم مجمد'
                ],
                'description' => [
                    'en' => 'Garlic butter bread, frozen',
                    'fr' => 'Pain au beurre à l\'ail surgelé',
                    'es' => 'Pan con mantequilla de ajo congelado',
                    'ar' => 'خبز بالزبدة والثوم مجمد'
                ],
                'meta_title' => [
                    'en' => 'Frozen Garlic Bread | adMart',
                    'fr' => 'Pain à l\'ail surgelé | adMart',
                    'es' => 'Pan de ajo congelado | adMart',
                    'ar' => 'خبز ثوم مجمد | adMart'
                ],
                'meta_description' => [
                    'en' => 'Ready-to-bake frozen garlic bread',
                    'fr' => 'Pain à l\'ail surgelé prêt à cuire',
                    'es' => 'Pan de ajo congelado listo para hornear',
                    'ar' => 'خبز ثوم مجمد جاهز للخبز'
                ],
                'category_id'     => 9,
                'sub_category_id' => 27,
                'price'           => 3.20,
                'quantity'        => 1,
                'unit'            => 'loaf'
            ],

            //270-280

            [
                'name' => [
                    'en' => 'Daily Moisturizer',
                    'fr' => 'Crème hydratante quotidienne',
                    'es' => 'Crema hidratante diaria',
                    'ar' => 'مرطب يومي'
                ],
                'description' => [
                    'en' => 'Lightweight moisturizer with SPF 30 for daily use',
                    'fr' => 'Crème hydratante légère avec SPF 30 pour un usage quotidien',
                    'es' => 'Hidratante ligera con FPS 30 para uso diario',
                    'ar' => 'مرطب خفيف مع عامل حماية من الشمس 30 للاستخدام اليومي'
                ],
                'meta_title' => [
                    'en' => 'Daily Face Moisturizer | adMart',
                    'fr' => 'Crème hydratante visage quotidienne | adMart',
                    'es' => 'Crema hidratante facial diaria | adMart',
                    'ar' => 'مرطب الوجه اليومي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Hydrating daily moisturizer with sun protection',
                    'fr' => 'Crème hydratante quotidienne avec protection solaire',
                    'es' => 'Hidratante diario con protección solar',
                    'ar' => 'مرطب يومي مرطب مع حماية من الشمس'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 12.99,
                'quantity'        => 50,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Vitamin C Serum',
                    'fr' => 'Sérum à la vitamine C',
                    'es' => 'Suero de vitamina C',
                    'ar' => 'مصل فيتامين سي'
                ],
                'description' => [
                    'en' => 'Brightening serum with vitamin C and hyaluronic acid',
                    'fr' => 'Sérum éclaircissant à la vitamine C et acide hyaluronique',
                    'es' => 'Suero iluminador con vitamina C y ácido hialurónico',
                    'ar' => 'مصل مضيء يحتوي على فيتامين سي وحمض الهيالورونيك'
                ],
                'meta_title' => [
                    'en' => 'Vitamin C Serum | adMart',
                    'fr' => 'Sérum vitamine C | adMart',
                    'es' => 'Suero de vitamina C | adMart',
                    'ar' => 'مصل فيتامين سي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Antioxidant serum for glowing skin',
                    'fr' => 'Sérum antioxydant pour un teint éclatant',
                    'es' => 'Suero antioxidante para una piel radiante',
                    'ar' => 'مصل مضاد للأكسدة لبشرة متوهجة'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 19.99,
                'quantity'        => 30,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Charcoal Face Mask',
                    'fr' => 'Masque visage au charbon',
                    'es' => 'Mascarilla facial de carbón',
                    'ar' => 'قناع وجه بالفحم'
                ],
                'description' => [
                    'en' => 'Purifying clay mask with activated charcoal',
                    'fr' => 'Masque argile purifiant au charbon activé',
                    'es' => 'Mascarilla de arcilla purificante con carbón activado',
                    'ar' => 'قناع طين تنقية بالفحم المنشط'
                ],
                'meta_title' => [
                    'en' => 'Charcoal Face Mask | adMart',
                    'fr' => 'Masque au charbon | adMart',
                    'es' => 'Mascarilla de carbón | adMart',
                    'ar' => 'قناع وجه بالفحم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Deep cleansing mask for all skin types',
                    'fr' => 'Masque nettoyant profond pour tous types de peau',
                    'es' => 'Mascarilla limpiadora profunda para todo tipo de piel',
                    'ar' => 'قناع تنظيف عميق لجميع أنواع البشرة'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 8.50,
                'quantity'        => 100,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Eye Cream',
                    'fr' => 'Crème pour les yeux',
                    'es' => 'Crema para ojos',
                    'ar' => 'كريم العيون'
                ],
                'description' => [
                    'en' => 'Anti-aging eye cream with caffeine and peptides',
                    'fr' => 'Crème anti-âge pour les yeux avec caféine et peptides',
                    'es' => 'Crema anti-edad para ojos con cafeína y péptidos',
                    'ar' => 'كريم عيون مضاد للشيخوخة مع الكافيين والببتيدات'
                ],
                'meta_title' => [
                    'en' => 'Anti-Aging Eye Cream | adMart',
                    'fr' => 'Crème yeux anti-âge | adMart',
                    'es' => 'Crema anti-edad para ojos | adMart',
                    'ar' => 'كريم عيون مضاد للشيخوخة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Reduces puffiness and dark circles',
                    'fr' => 'Réduit les poches et les cernes',
                    'es' => 'Reduce bolsas y ojeras',
                    'ar' => 'يقلل من الانتفاخات والهالات السوداء'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 15.99,
                'quantity'        => 15,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Facial Cleanser',
                    'fr' => 'Nettoyant visage',
                    'es' => 'Limpiador facial',
                    'ar' => 'غسول الوجه'
                ],
                'description' => [
                    'en' => 'Gentle foaming cleanser for all skin types',
                    'fr' => 'Nettoyant moussant doux pour tous types de peau',
                    'es' => 'Limpiador espumoso suave para todo tipo de piel',
                    'ar' => 'غسول رغوي لطيف لجميع أنواع البشرة'
                ],
                'meta_title' => [
                    'en' => 'Gentle Facial Cleanser | adMart',
                    'fr' => 'Nettoyant visage doux | adMart',
                    'es' => 'Limpiador facial suave | adMart',
                    'ar' => 'غسول وجه لطيف | adMart'
                ],
                'meta_description' => [
                    'en' => 'Removes impurities without stripping skin',
                    'fr' => 'Élimine les impuretés sans agresser la peau',
                    'es' => 'Elimina impurezas sin resecar la piel',
                    'ar' => 'يزيل الشوائب دون تجريد البشرة من زيوتها'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 9.99,
                'quantity'        => 150,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Sunscreen SPF 50',
                    'fr' => 'Écran solaire SPF 50',
                    'es' => 'Protector solar FPS 50',
                    'ar' => 'واقي شمسي SPF 50'
                ],
                'description' => [
                    'en' => 'Broad spectrum sunscreen for face and body',
                    'fr' => 'Écran solaire large spectre pour visage et corps',
                    'es' => 'Protector solar de amplio espectro para cara y cuerpo',
                    'ar' => 'واقي شمسي واسع الطيف للوجه والجسم'
                ],
                'meta_title' => [
                    'en' => 'SPF 50 Sunscreen | adMart',
                    'fr' => 'Écran solaire SPF 50 | adMart',
                    'es' => 'Protector solar FPS 50 | adMart',
                    'ar' => 'واقي شمسي SPF 50 | adMart'
                ],
                'meta_description' => [
                    'en' => 'Lightweight non-greasy sun protection',
                    'fr' => 'Protection solaire légère non grasse',
                    'es' => 'Protección solar ligera no grasa',
                    'ar' => 'حماية شمسية خفيفة غير دهنية'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 14.50,
                'quantity'        => 100,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Retinol Night Cream',
                    'fr' => 'Crème nuit au rétinol',
                    'es' => 'Crema nocturna con retinol',
                    'ar' => 'كريم ليلي بالريتينول'
                ],
                'description' => [
                    'en' => 'Anti-aging night treatment with retinol',
                    'fr' => 'Traitement de nuit anti-âge au rétinol',
                    'es' => 'Tratamiento nocturno anti-edad con retinol',
                    'ar' => 'علاج ليلي مضاد للشيخوخة بالريتينول'
                ],
                'meta_title' => [
                    'en' => 'Retinol Night Cream | adMart',
                    'fr' => 'Crème nuit rétinol | adMart',
                    'es' => 'Crema nocturna con retinol | adMart',
                    'ar' => 'كريم ليلي بالريتينول | adMart'
                ],
                'meta_description' => [
                    'en' => 'Reduces fine lines while you sleep',
                    'fr' => 'Réduit les rides fines pendant votre sommeil',
                    'es' => 'Reduce líneas finas mientras duermes',
                    'ar' => 'يقلل من الخطوط الدقيقة أثناء النوم'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 22.99,
                'quantity'        => 50,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Facial Toner',
                    'fr' => 'Tonique visage',
                    'es' => 'Tónico facial',
                    'ar' => 'تونر الوجه'
                ],
                'description' => [
                    'en' => 'Alcohol-free toner to balance skin pH',
                    'fr' => 'Tonique sans alcool pour équilibrer le pH de la peau',
                    'es' => 'Tónico sin alcohol para equilibrar el pH de la piel',
                    'ar' => 'تونر خالي من الكحول لموازنة درجة حموضة البشرة'
                ],
                'meta_title' => [
                    'en' => 'Facial Toner | adMart',
                    'fr' => 'Tonique visage | adMart',
                    'es' => 'Tónico facial | adMart',
                    'ar' => 'تونر الوجه | adMart'
                ],
                'meta_description' => [
                    'en' => 'Refreshing toner for all skin types',
                    'fr' => 'Tonique rafraîchissant pour tous types de peau',
                    'es' => 'Tónico refrescante para todo tipo de piel',
                    'ar' => 'تونر منعش لجميع أنواع البشرة'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 10.50,
                'quantity'        => 200,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Acne Spot Treatment',
                    'fr' => 'Traitement localisé anti-acné',
                    'es' => 'Tratamiento localizado para acné',
                    'ar' => 'علاج موضعي لحب الشباب'
                ],
                'description' => [
                    'en' => 'Fast-acting acne treatment with salicylic acid',
                    'fr' => 'Traitement anti-acné rapide à l\'acide salicylique',
                    'es' => 'Tratamiento rápido para acné con ácido salicílico',
                    'ar' => 'علاج سريع المفعول لحب الشباب بحمض الساليسيليك'
                ],
                'meta_title' => [
                    'en' => 'Acne Spot Treatment | adMart',
                    'fr' => 'Traitement anti-acné | adMart',
                    'es' => 'Tratamiento para acné | adMart',
                    'ar' => 'علاج حب الشباب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Targeted treatment for blemishes',
                    'fr' => 'Traitement ciblé pour imperfections',
                    'es' => 'Tratamiento dirigido para imperfecciones',
                    'ar' => 'علاج موجه للعيوب'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 7.99,
                'quantity'        => 15,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Lip Balm',
                    'fr' => 'Baume à lèvres',
                    'es' => 'Bálsamo labial',
                    'ar' => 'مرطب شفاه'
                ],
                'description' => [
                    'en' => 'Moisturizing lip balm with SPF 15',
                    'fr' => 'Baume à lèvres hydratant avec SPF 15',
                    'es' => 'Bálsamo labial hidratante con FPS 15',
                    'ar' => 'مرطب شفاه مع عامل حماية من الشمس 15'
                ],
                'meta_title' => [
                    'en' => 'SPF Lip Balm | adMart',
                    'fr' => 'Baume à lèvres SPF | adMart',
                    'es' => 'Bálsamo labial FPS | adMart',
                    'ar' => 'مرطب شفاه مع SPF | adMart'
                ],
                'meta_description' => [
                    'en' => 'Protects and hydrates lips',
                    'fr' => 'Protège et hydrate les lèvres',
                    'es' => 'Protege e hidrata los labios',
                    'ar' => 'يحمي ويرطب الشفاه'
                ],
                'category_id'     => 10,
                'sub_category_id' => 28,
                'price'           => 3.50,
                'quantity'        => 4,
                'unit'            => 'g'
            ],


            //280-290

            [
                'name' => [
                    'en' => 'Shampoo (Volume)',
                    'fr' => 'Shampooing (Volume)',
                    'es' => 'Champú (Volumen)',
                    'ar' => 'شامبو (حجم)'
                ],
                'description' => [
                    'en' => 'Volumizing shampoo for fine hair',
                    'fr' => 'Shampooing volumisant pour cheveux fins',
                    'es' => 'Champú voluminizador para cabello fino',
                    'ar' => 'شامبو يضيف الحجم للشعر الناعم'
                ],
                'meta_title' => [
                    'en' => 'Volumizing Shampoo | adMart',
                    'fr' => 'Shampooing volumisant | adMart',
                    'es' => 'Champú voluminizador | adMart',
                    'ar' => 'شامبو مكثف | adMart'
                ],
                'meta_description' => [
                    'en' => 'Adds body and shine to fine hair',
                    'fr' => 'Donne du corps et de la brillance aux cheveux fins',
                    'es' => 'Añade cuerpo y brillo al cabello fino',
                    'ar' => 'يضيف كثافة ولمعان للشعر الناعم'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 8.99,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Conditioner (Moisture)',
                    'fr' => 'Après-shampooing (Hydratation)',
                    'es' => 'Acondicionador (Hidratación)',
                    'ar' => 'بلسم (ترطيب)'
                ],
                'description' => [
                    'en' => 'Deep conditioning treatment for dry hair',
                    'fr' => 'Traitement nourrissant intense pour cheveux secs',
                    'es' => 'Tratamiento acondicionador profundo para cabello seco',
                    'ar' => 'علاج ترطيب عميق للشعر الجاف'
                ],
                'meta_title' => [
                    'en' => 'Moisturizing Conditioner | adMart',
                    'fr' => 'Après-shampooing hydratant | adMart',
                    'es' => 'Acondicionador hidratante | adMart',
                    'ar' => 'بلسم مرطب | adMart'
                ],
                'meta_description' => [
                    'en' => 'Repairs dry, damaged hair',
                    'fr' => 'Répare les cheveux secs et abîmés',
                    'es' => 'Repara el cabello seco y dañado',
                    'ar' => 'يصلح الشعر الجاف التالف'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 8.99,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hair Mask',
                    'fr' => 'Masque capillaire',
                    'es' => 'Mascarilla para el cabello',
                    'ar' => 'قناع الشعر'
                ],
                'description' => [
                    'en' => 'Weekly intensive repair hair treatment',
                    'fr' => 'Traitement capillaire réparateur intensif hebdomadaire',
                    'es' => 'Tratamiento reparador intensivo semanal para el cabello',
                    'ar' => 'علاج أسبوعي مكثف لإصلاح الشعر'
                ],
                'meta_title' => [
                    'en' => 'Repair Hair Mask | adMart',
                    'fr' => 'Masque réparateur pour cheveux | adMart',
                    'es' => 'Mascarilla reparadora para el cabello | adMart',
                    'ar' => 'قناع إصلاح الشعر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Deep conditioning hair mask',
                    'fr' => 'Masque capillaire nourrissant intense',
                    'es' => 'Mascarilla capilar de acondicionamiento profundo',
                    'ar' => 'قناع ترطيب عميق للشعر'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 12.50,
                'quantity'        => 200,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hair Oil',
                    'fr' => 'Huile capillaire',
                    'es' => 'Aceite para el cabello',
                    'ar' => 'زيت الشعر'
                ],
                'description' => [
                    'en' => 'Nourishing argan oil for hair',
                    'fr' => 'Huile d\'argan nourrissante pour les cheveux',
                    'es' => 'Aceite de argán nutritivo para el cabello',
                    'ar' => 'زيت الأرغان المغذي للشعر'
                ],
                'meta_title' => [
                    'en' => 'Argan Hair Oil | adMart',
                    'fr' => 'Huile capillaire à l\'argan | adMart',
                    'es' => 'Aceite de argán para el cabello | adMart',
                    'ar' => 'زيت أرغان للشعر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Adds shine and reduces frizz',
                    'fr' => 'Apporte de la brillance et réduit les frisottis',
                    'es' => 'Añade brillo y reduce el frizz',
                    'ar' => 'يضيف لمعان ويقلل من التجعيد'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 14.99,
                'quantity'        => 100,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Dry Shampoo',
                    'fr' => 'Shampooing sec',
                    'es' => 'Champú seco',
                    'ar' => 'شامبو جاف'
                ],
                'description' => [
                    'en' => 'Instant refresh for between washes',
                    'fr' => 'Rafraîchissement instantané entre les shampooings',
                    'es' => 'Refresco instantáneo entre lavados',
                    'ar' => 'انتعاش فوري بين غسلات الشعر'
                ],
                'meta_title' => [
                    'en' => 'Dry Shampoo | adMart',
                    'fr' => 'Shampooing sec | adMart',
                    'es' => 'Champú seco | adMart',
                    'ar' => 'شامبو جاف | adMart'
                ],
                'meta_description' => [
                    'en' => 'Absorbs oil and adds volume',
                    'fr' => 'Absorbe l\'excès de sébum et ajoute du volume',
                    'es' => 'Absorbe el aceite y añade volumen',
                    'ar' => 'يمتص الزيوت ويضيف حجم'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 9.50,
                'quantity'        => 150,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Heat Protectant Spray',
                    'fr' => 'Spray protecteur de chaleur',
                    'es' => 'Spray protector de calor',
                    'ar' => 'سبراي حماية من الحرارة'
                ],
                'description' => [
                    'en' => 'Protects hair from heat styling damage',
                    'fr' => 'Protège les cheveux des dommages causés par la chaleur',
                    'es' => 'Protege el cabello del daño por calor',
                    'ar' => 'يحمي الشعر من أضرار أدوات التصفيف الحرارية'
                ],
                'meta_title' => [
                    'en' => 'Heat Protectant Spray | adMart',
                    'fr' => 'Spray protecteur de chaleur | adMart',
                    'es' => 'Spray protector de calor | adMart',
                    'ar' => 'سبراي حماية من الحرارة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Essential for heat styling',
                    'fr' => 'Essentiel pour le coiffage à chaud',
                    'es' => 'Esencial para el peinado con calor',
                    'ar' => 'ضروري لتصفيف الشعر بالحرارة'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 11.99,
                'quantity'        => 200,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hair Gel',
                    'fr' => 'Gel coiffant',
                    'es' => 'Gel para el cabello',
                    'ar' => 'جل شعر'
                ],
                'description' => [
                    'en' => 'Strong hold gel for styling',
                    'fr' => 'Gel coiffant à forte tenue',
                    'es' => 'Gel de fijación fuerte para peinados',
                    'ar' => 'جل تثبيت قوي لتصفيف الشعر'
                ],
                'meta_title' => [
                    'en' => 'Strong Hold Hair Gel | adMart',
                    'fr' => 'Gel coiffant forte tenue | adMart',
                    'es' => 'Gel para cabello de fijación fuerte | adMart',
                    'ar' => 'جل شعر بتثبيت قوي | adMart'
                ],
                'meta_description' => [
                    'en' => 'Provides long-lasting hold',
                    'fr' => 'Offre une tenue longue durée',
                    'es' => 'Proporciona sujeción duradera',
                    'ar' => 'يوفر تثبيت طويل الأمد'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 6.99,
                'quantity'        => 250,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hair Spray',
                    'fr' => 'Laque',
                    'es' => 'Laca para el cabello',
                    'ar' => 'سبراي تثبيت الشعر'
                ],
                'description' => [
                    'en' => 'Flexible hold finishing spray',
                    'fr' => 'Spray de finition à tenue flexible',
                    'es' => 'Spray de acabado con sujeción flexible',
                    'ar' => 'سبراي نهائي بتثبيت مرن'
                ],
                'meta_title' => [
                    'en' => 'Finishing Hair Spray | adMart',
                    'fr' => 'Laque de finition | adMart',
                    'es' => 'Laca de acabado | adMart',
                    'ar' => 'سبراي نهائي للشعر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Locks styles in place',
                    'fr' => 'Fige les coiffures en place',
                    'es' => 'Fija los peinados en su lugar',
                    'ar' => 'يثبت التسريحات في مكانها'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 10.50,
                'quantity'        => 300,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Dandruff Shampoo',
                    'fr' => 'Shampooing anti-pelliculaire',
                    'es' => 'Champú anticaspa',
                    'ar' => 'شامبو مضاد للقشرة'
                ],
                'description' => [
                    'en' => 'Medicated shampoo for dandruff control',
                    'fr' => 'Shampooing médicamenteux contre les pellicules',
                    'es' => 'Champú medicado para controlar la caspa',
                    'ar' => 'شامبو طبي للتحكم في قشرة الرأس'
                ],
                'meta_title' => [
                    'en' => 'Dandruff Shampoo | adMart',
                    'fr' => 'Shampooing anti-pelliculaire | adMart',
                    'es' => 'Champú anticaspa | adMart',
                    'ar' => 'شامبو مضاد للقشرة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Relieves itchy, flaky scalp',
                    'fr' => 'Soulage les démangeaisons et les pellicules',
                    'es' => 'Alivia el cuero cabelludo con picazón y descamación',
                    'ar' => 'يخفف من حكة وتقشر فروة الرأس'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 9.99,
                'quantity'        => 200,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Hair Thickening Spray',
                    'fr' => 'Spray épaississant pour cheveux',
                    'es' => 'Spray espesante para el cabello',
                    'ar' => 'سبراي تكثيف الشعر'
                ],
                'description' => [
                    'en' => 'Instantly adds volume to fine hair',
                    'fr' => 'Ajoute instantanément du volume aux cheveux fins',
                    'es' => 'Añade volumen instantáneo al cabello fino',
                    'ar' => 'يضيف حجم فوري للشعر الناعم'
                ],
                'meta_title' => [
                    'en' => 'Hair Thickening Spray | adMart',
                    'fr' => 'Spray épaississant pour cheveux | adMart',
                    'es' => 'Spray espesante para el cabello | adMart',
                    'ar' => 'سبراي تكثيف الشعر | adMart'
                ],
                'meta_description' => [
                    'en' => 'Creates fuller-looking hair',
                    'fr' => 'Crée l\'illusion de cheveux plus épais',
                    'es' => 'Crea la apariencia de cabello más grueso',
                    'ar' => 'يعطي مظهر شعر أكثر كثافة'
                ],
                'category_id'     => 10,
                'sub_category_id' => 29,
                'price'           => 13.50,
                'quantity'        => 150,
                'unit'            => 'ml'
            ],


            //290-300

            [
                'name' => [
                    'en' => 'Toothpaste (Whitening)',
                    'fr' => 'Dentifrice (Blanchissant)',
                    'es' => 'Pasta dental (Blanqueadora)',
                    'ar' => 'معجون أسنان (تبييض)'
                ],
                'description' => [
                    'en' => 'Whitening toothpaste with fluoride',
                    'fr' => 'Dentifrice blanchissant au fluor',
                    'es' => 'Pasta dental blanqueadora con flúor',
                    'ar' => 'معجون أسنان مبيض بالفلورايد'
                ],
                'meta_title' => [
                    'en' => 'Whitening Toothpaste | adMart',
                    'fr' => 'Dentifrice blanchissant | adMart',
                    'es' => 'Pasta dental blanqueadora | adMart',
                    'ar' => 'معجون أسنان مبيض | adMart'
                ],
                'meta_description' => [
                    'en' => 'Removes stains and protects enamel',
                    'fr' => 'Élimine les taches et protège l\'émail',
                    'es' => 'Elimina manchas y protege el esmalte',
                    'ar' => 'يزيل البقع ويحمي المينا'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 4.99,
                'quantity'        => 100,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Electric Toothbrush',
                    'fr' => 'Brosse à dents électrique',
                    'es' => 'Cepillo de dientes eléctrico',
                    'ar' => 'فرشاة أسنان كهربائية'
                ],
                'description' => [
                    'en' => 'Rechargeable electric toothbrush',
                    'fr' => 'Brosse à dents électrique rechargeable',
                    'es' => 'Cepillo dental eléctrico recargable',
                    'ar' => 'فرشاة أسنان كهربائية قابلة للشحن'
                ],
                'meta_title' => [
                    'en' => 'Electric Toothbrush | adMart',
                    'fr' => 'Brosse à dents électrique | adMart',
                    'es' => 'Cepillo eléctrico para dientes | adMart',
                    'ar' => 'فرشاة أسنان كهربائية | adMart'
                ],
                'meta_description' => [
                    'en' => 'Professional cleaning at home',
                    'fr' => 'Nettoyage professionnel à domicile',
                    'es' => 'Limpieza profesional en casa',
                    'ar' => 'تنظيف احترافي في المنزل'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 39.99,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Dental Floss',
                    'fr' => 'Fil dentaire',
                    'es' => 'Hilo dental',
                    'ar' => 'خيط أسنان'
                ],
                'description' => [
                    'en' => 'Mint flavored dental floss',
                    'fr' => 'Fil dentaire à la menthe',
                    'es' => 'Hilo dental con sabor a menta',
                    'ar' => 'خيط أسنان بنكهة النعناع'
                ],
                'meta_title' => [
                    'en' => 'Dental Floss | adMart',
                    'fr' => 'Fil dentaire | adMart',
                    'es' => 'Hilo dental | adMart',
                    'ar' => 'خيط الأسنان | adMart'
                ],
                'meta_description' => [
                    'en' => 'Effective plaque removal',
                    'fr' => 'Élimination efficace de la plaque',
                    'es' => 'Eliminación efectiva de placa',
                    'ar' => 'إزالة فعالة للبلاك'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 2.99,
                'quantity'        => 50,
                'unit'            => 'm'
            ],
            [
                'name' => [
                    'en' => 'Mouthwash',
                    'fr' => 'Bain de bouche',
                    'es' => 'Enjuague bucal',
                    'ar' => 'غسول الفم'
                ],
                'description' => [
                    'en' => 'Alcohol-free mouthwash for fresh breath',
                    'fr' => 'Bain de bouche sans alcool pour une haleine fraîche',
                    'es' => 'Enjuague bucal sin alcohol para aliento fresco',
                    'ar' => 'غسول فم خالي من الكحول لنفس منعش'
                ],
                'meta_title' => [
                    'en' => 'Mouthwash | adMart',
                    'fr' => 'Bain de bouche | adMart',
                    'es' => 'Enjuague bucal | adMart',
                    'ar' => 'غسول الفم | adMart'
                ],
                'meta_description' => [
                    'en' => 'Kills germs without burning',
                    'fr' => 'Tue les germes sans brûlure',
                    'es' => 'Mata gérmenes sin ardor',
                    'ar' => 'يقتل الجراثيم دون حرقة'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 5.50,
                'quantity'        => 500,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Toothbrush (Soft)',
                    'fr' => 'Brosse à dents (Souple)',
                    'es' => 'Cepillo de dientes (Suave)',
                    'ar' => 'فرشاة أسنان (ناعمة)'
                ],
                'description' => [
                    'en' => 'Soft bristle manual toothbrush',
                    'fr' => 'Brosse à dents manuelle à poils souples',
                    'es' => 'Cepillo dental manual de cerdas suaves',
                    'ar' => 'فرشاة أسنان يدوية بشعيرات ناعمة'
                ],
                'meta_title' => [
                    'en' => 'Soft Toothbrush | adMart',
                    'fr' => 'Brosse à dents souple | adMart',
                    'es' => 'Cepillo dental suave | adMart',
                    'ar' => 'فرشاة أسنان ناعمة | adMart'
                ],
                'meta_description' => [
                    'en' => 'Gentle on gums and enamel',
                    'fr' => 'Doux pour les gencives et l\'émail',
                    'es' => 'Suave con encías y esmalte',
                    'ar' => 'لطيف على اللثة والمينا'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 2.50,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Teeth Whitening Strips',
                    'fr' => 'Bandelettes blanchissantes',
                    'es' => 'Tiras blanqueadoras',
                    'ar' => 'شرائط تبييض الأسنان'
                ],
                'description' => [
                    'en' => 'Professional teeth whitening strips',
                    'fr' => 'Bandelettes blanchissantes professionnelles',
                    'es' => 'Tiras blanqueadoras dentales profesionales',
                    'ar' => 'شرائح تبييض أسنان احترافية'
                ],
                'meta_title' => [
                    'en' => 'Whitening Strips | adMart',
                    'fr' => 'Bandelettes blanchissantes | adMart',
                    'es' => 'Tiras blanqueadoras | adMart',
                    'ar' => 'شرائط تبييض | adMart'
                ],
                'meta_description' => [
                    'en' => 'Removes stains for whiter teeth',
                    'fr' => 'Élimine les taches pour des dents plus blanches',
                    'es' => 'Elimina manchas para dientes más blancos',
                    'ar' => 'يزيل البقع لأسنان أكثر بياضًا'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 24.99,
                'quantity'        => 14,
                'unit'            => 'strips'
            ],
            [
                'name' => [
                    'en' => 'Tongue Cleaner',
                    'fr' => 'Gratte-langue',
                    'es' => 'Limpiador de lengua',
                    'ar' => 'مكشطة اللسان'
                ],
                'description' => [
                    'en' => 'Stainless steel tongue scraper',
                    'fr' => 'Gratte-langue en acier inoxydable',
                    'es' => 'Raspador de lengua de acero inoxidable',
                    'ar' => 'أداة تنظيف اللسان من الفولاذ المقاوم للصدأ'
                ],
                'meta_title' => [
                    'en' => 'Tongue Cleaner | adMart',
                    'fr' => 'Gratte-langue | adMart',
                    'es' => 'Limpiador de lengua | adMart',
                    'ar' => 'مكشطة اللسان | adMart'
                ],
                'meta_description' => [
                    'en' => 'Removes bacteria for fresher breath',
                    'fr' => 'Élimine les bactéries pour une haleine plus fraîche',
                    'es' => 'Elimina bacterias para un aliento más fresco',
                    'ar' => 'يزيل البكتيريا لنفس أكثر انتعاشًا'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 3.99,
                'quantity'        => 1,
                'unit'            => 'pc'
            ],
            [
                'name' => [
                    'en' => 'Interdental Brushes',
                    'fr' => 'Brossettes interdentaires',
                    'es' => 'Cepillos interdentales',
                    'ar' => 'فرش بين الأسنان'
                ],
                'description' => [
                    'en' => 'Small brushes for cleaning between teeth',
                    'fr' => 'Petites brosses pour nettoyer entre les dents',
                    'es' => 'Pequeños cepillos para limpiar entre dientes',
                    'ar' => 'فرش صغيرة لتنظيف ما بين الأسنان'
                ],
                'meta_title' => [
                    'en' => 'Interdental Brushes | adMart',
                    'fr' => 'Brossettes interdentaires | adMart',
                    'es' => 'Cepillos interdentales | adMart',
                    'ar' => 'فرش بين الأسنان | adMart'
                ],
                'meta_description' => [
                    'en' => 'Cleans hard-to-reach areas',
                    'fr' => 'Nettoie les zones difficiles d\'accès',
                    'es' => 'Limpia áreas de difícil acceso',
                    'ar' => 'ينظف المناطق التي يصعب الوصول إليها'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 4.50,
                'quantity'        => 6,
                'unit'            => 'pcs'
            ],
            [
                'name' => [
                    'en' => 'Toothpaste (Sensitive)',
                    'fr' => 'Dentifrice (Sensible)',
                    'es' => 'Pasta dental (Sensible)',
                    'ar' => 'معجون أسنان (حساس)'
                ],
                'description' => [
                    'en' => 'Toothpaste for sensitive teeth',
                    'fr' => 'Dentifrice pour dents sensibles',
                    'es' => 'Pasta dental para dientes sensibles',
                    'ar' => 'معجون أسنان للأسنان الحساسة'
                ],
                'meta_title' => [
                    'en' => 'Sensitive Toothpaste | adMart',
                    'fr' => 'Dentifrice sensible | adMart',
                    'es' => 'Pasta dental sensible | adMart',
                    'ar' => 'معجون أسنان للحساسية | adMart'
                ],
                'meta_description' => [
                    'en' => 'Relieves tooth sensitivity',
                    'fr' => 'Soulage la sensibilité dentaire',
                    'es' => 'Alivia la sensibilidad dental',
                    'ar' => 'يخفف من حساسية الأسنان'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 5.99,
                'quantity'        => 100,
                'unit'            => 'ml'
            ],
            [
                'name' => [
                    'en' => 'Denture Cleanser',
                    'fr' => 'Nettoyant pour prothèses dentaires',
                    'es' => 'Limpiador de dentaduras',
                    'ar' => 'منظف طقم الأسنان'
                ],
                'description' => [
                    'en' => 'Effervescent tablets for cleaning dentures',
                    'fr' => 'Comprimés effervescents pour nettoyer les prothèses',
                    'es' => 'Tabletas efervescentes para limpiar dentaduras',
                    'ar' => 'أقراص فوارة لتنظيف أطقم الأسنان'
                ],
                'meta_title' => [
                    'en' => 'Denture Cleanser | adMart',
                    'fr' => 'Nettoyant pour prothèses | adMart',
                    'es' => 'Limpiador de dentaduras | adMart',
                    'ar' => 'منظف طقم الأسنان | adMart'
                ],
                'meta_description' => [
                    'en' => 'Keeps dentures fresh and clean',
                    'fr' => 'Garde les prothèses fraîches et propres',
                    'es' => 'Mantiene dentaduras frescas y limpias',
                    'ar' => 'يحافظ على طقم الأسنان منعشًا ونظيفًا'
                ],
                'category_id'     => 10,
                'sub_category_id' => 30,
                'price'           => 6.50,
                'quantity'        => 36,
                'unit'            => 'tablets'
            ],

            // ...
        ];

        $data = [];
        foreach ($products as $index => $product) {
            $data[] = [
                'id'              => $index + 1,
                'sub_category_id' => $product['sub_category_id'],
                'category_id'     => $product['category_id'],
                // 'area_id'         => rand(1, 3),
                'unit_id'         => rand(1, 7),
                'shipment_id'     => rand(1, 2),
                'data'            => json_encode([
                    'language' => [
                        'en' => [
                            'name'             => $product['name']['en'],
                            'description'      => $product['description']['en'],
                            'meta_title'       => $product['meta_title']['en'],
                            'meta_description' => $product['meta_description']['en'] ?? ''
                        ],
                        'fr' => [
                            'name'             => $product['name']['fr'],
                            'description'      => $product['description']['fr'],
                            'meta_title'       => $product['meta_title']['fr'],
                            'meta_description' => $product['meta_description']['fr'] ?? ''
                        ],
                        'es' => [
                            'name'             => $product['name']['es'],
                            'description'      => $product['description']['es'],
                            'meta_title'       => $product['meta_title']['es'],
                            'meta_description' => $product['meta_description']['es'] ?? ''
                        ],
                        'ar' => [
                            'name'             => $product['name']['ar'],
                            'description'      => $product['description']['ar'],
                            'meta_title'       => $product['meta_title']['ar'],
                            'meta_description' => $product['meta_description']['ar'] ?? ''
                        ]
                    ]
                ]),
                'price'              => $product['price'],
                'offer_price'        => rand(0, 1) ? round(mt_rand(1, $product['price'] * 100) / 100, 2) : null,
                'uuid'               => \Illuminate\Support\Str::uuid(),
                'quantity'           => $product['quantity'],
                'available_quantity' => $product['quantity'],
                'order_quantity'     => 1,
                'image'              => 'product-' . ($index + 1) . '.webp',
                'status'             => 1,
                'popular'            => rand(0, 1),
                'created_at'         => now(),
                'updated_at'         => now(),
                'meta_image'         => 'product-' . ($index + 1) . '.webp'
            ];
        }

        Product::insert($data);
    }
}
