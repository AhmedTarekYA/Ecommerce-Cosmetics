-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 12:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'احمد طارق', 'assets/uploads/admins/26791684868908.webp', 'admin@admin.com', '$2y$10$fFm91rpfgyt.bSXBw28s6u1Qi2sFv5cHNGtE1fVYSXeiBrVYkCOc2', '2023-04-03 02:00:10', '2023-05-23 21:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `desc`, `image`, `admin_id`, `created_at`, `updated_at`) VALUES
(4, 'انتظروا قريبا اقوي العروض في مجال الاحذية !', '<p>دائمًا ما يبحث الرجل عن أحدث صيحات الموضة للأحذية، ومع اقتراب فصل الشتاء نرشح لك أفضل وأحدث صيحات الموضة من الأحذية الرجالية سواء رياضية أو رسمية، بخصومات تصل حتي 41% ضمن عروض نهاية العام التي أطلقتها &quot;أمازون&quot; للتجارة الإلكترونية مؤخراً، دعنا نستعرضها معك كالتالي :-</p>\r\n\r\n<p>Activ Mens Sneaker</p>\r\n\r\n<p>يأتي بخصم 18%</p>\r\n\r\n<p>حذاء رياضي عالي الجودة مصنوع من الجلد.</p>\r\n\r\n<p>إنه يبرز الحرفية والجلد الناعم ، مما يمنحك مظهرًا أنيقًا</p>\r\n\r\n<p>بطانة جلد بمسامات تهوية</p>', 'assets/uploads/blogs/41651684938077.webp', 1, '2023-05-23 22:14:47', '2023-05-24 13:21:17'),
(5, 'تعاقد جديد قادم', '<p>لا خلاف على أن شركة&nbsp;<a href=\"http://ar.wikipedia.org/wiki/%D9%86%D8%A7%D9%8A%D9%83%D9%8A\" target=\"_blank\">نايكي</a>&nbsp;(Nike) هي أحد أشهر شركات المنتجات الرياضية في العالم، ويعد مؤسسها المشارك ورئيسها أقوى شخصية في عالم الرياضة، على الرغم من أنه لم يحترف رياضة يوما ولم يشتر فريقا رياضيا ما. قدرت مجلة فوربز ثروته في 2014 بقرابة 22 مليار دولار، وهو رجل أعمال ومتبرع خيري سخي. بدأ هذه الامبراطورية من فكرة جاءته شابا ووضعها في ورقة بحث جامعية وتخرج ليطبقها بنفسه.</p>', 'assets/uploads/blogs/11281684938050.webp', 1, '2023-05-23 22:15:53', '2023-05-24 13:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'سوليت', 'assets/uploads/brands/22471685709209.webp', '2023-06-02 11:33:29', '2023-06-02 11:33:29'),
(2, 'تاب', 'assets/uploads/brands/68891685709230.webp', '2023-06-02 11:33:51', '2023-06-02 11:33:51'),
(3, 'بايبال', 'assets/uploads/brands/72261685709242.webp', '2023-06-02 11:34:02', '2023-06-02 11:34:02'),
(4, 'فودافون كاش', 'assets/uploads/brands/80531685709253.webp', '2023-06-02 11:34:14', '2023-06-02 11:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(10) NOT NULL DEFAULT 1,
  `price` decimal(20,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'الكترونيات', 'assets/uploads/categories/36161685651529.webp', '2023-06-01 19:32:09', '2023-06-01 19:32:09'),
(2, 'ادوات تصوير', 'assets/uploads/categories/71981685651572.webp', '2023-06-01 19:32:52', '2023-06-01 19:32:52'),
(3, 'هواتف', 'assets/uploads/categories/53851685651692.webp', '2023-06-01 19:34:52', '2023-06-01 19:34:52'),
(4, 'اداوت تجميل', 'assets/uploads/categories/38611685707494.webp', '2023-06-02 11:04:54', '2023-06-02 11:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(6, NULL, 'jahyxoqo@mailinator.com', NULL, NULL, NULL, '2023-05-10 17:33:22', '2023-05-10 17:33:22'),
(7, 'Fulton Wilder', 'gywewirib@mailinator.com', '+1 (548) 294-1825', 'Nesciunt natus nesc', 'Quis consectetur am', '2023-05-10 21:36:20', '2023-05-10 21:36:20'),
(8, NULL, 'rynprogrammer@gmail.com', NULL, NULL, NULL, '2023-05-11 11:29:04', '2023-05-11 11:29:04'),
(9, NULL, 'ahmedtarekya100@gmail.com', NULL, NULL, NULL, '2023-05-12 00:05:14', '2023-05-12 00:05:14'),
(10, NULL, 'admin@admin.com', NULL, NULL, NULL, '2023-05-12 00:07:58', '2023-05-12 00:07:58'),
(11, NULL, 'ahmed@gmail.com', NULL, NULL, NULL, '2023-06-08 14:12:11', '2023-06-08 14:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorite_products`
--

INSERT INTO `favorite_products` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 12, 4, '2023-06-22 21:09:21', '2023-06-22 21:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_04_02_205801_create_admins_table', 1),
(18, '2023_05_04_021724_create_product_images_table', 3),
(19, '2023_05_04_011416_create_products_table', 4),
(21, '2023_05_09_184751_create_reviews_table', 5),
(22, '2023_05_10_171809_create_contact_us_table', 6),
(23, '2023_05_11_234250_create_sliders_table', 7),
(24, '2023_05_18_113742_create_blogs_table', 8),
(25, '2023_05_18_183022_create_settings_table', 9),
(26, '2023_06_01_221255_create_categories_table', 10),
(27, '2023_06_02_141640_create_brands_table', 11),
(28, '2023_06_07_202633_create_users_table', 12),
(29, '2023_06_08_153141_create_carts_table', 13),
(30, '2023_06_12_174229_create_favorite_products_table', 14),
(31, '2023_06_22_151726_create_orders_table', 15),
(32, '2023_06_22_153143_create_order_details_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `total_price` decimal(20,0) DEFAULT NULL,
  `status` enum('new','accepted','refused','completed') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `notes`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(4, 3, 'الغربية محل الامل شارع 20', '01011001218', NULL, '423', 'accepted', '2023-06-22 15:34:36', '2023-06-22 15:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(6, 4, 13, 1, '75.00', '2023-06-22 15:34:36', '2023-06-22 15:34:36'),
(7, 4, 18, 1, '299.00', '2023-06-22 15:34:36', '2023-06-22 15:34:36'),
(8, 4, 15, 1, '19.00', '2023-06-22 15:34:36', '2023-06-22 15:34:36'),
(9, 4, 16, 1, '30.00', '2023-06-22 15:34:36', '2023-06-22 15:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price_before` decimal(8,2) DEFAULT NULL,
  `price_after` decimal(8,2) DEFAULT NULL,
  `reviews_num` int(11) NOT NULL DEFAULT 0,
  `stars` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `title`, `desc`, `price_before`, `price_after`, `reviews_num`, `stars`, `created_at`, `updated_at`) VALUES
(11, 4, 'assets/uploads/products/18481684501307.webp', 'سبراي للقشرة', '<p>بخاخ علاجي مبتكر لعلاج قشرة الرأس والعدوى الفطرية بالجلد قوة مزدوجة للقضاء على الفطريات المسببة للقشرة المنتج الوحيد المعزز والغني بالكيوي لتغذية الشعر وترطيبه لا يسبب اي جفاف للشعر يقلل تساقط الشعر المصاحب للقشرة يقلل من الالتهابات ومن حكة فروة الرأس ينظم الافرازات الدهنية للحصول على المظهر المثالي</p>', '50.00', '0.00', 12, '5', '2023-05-19 15:01:47', '2023-06-02 11:07:14'),
(12, 4, 'assets/uploads/products/24641684870397.webp', 'مرهم جفن للعيون', '<p>دواء معقم ومطهر يستخدم لعلاج أمراض الجفن الحادة مثل التهاب الجفن (بالإنجليزية: Blepharitis)، ويمنع البيبروكاثول التفاقم الالتهاب، إذ أنه عندما يتراكم الإفراز حول الغدد الموجودة على حافة الجفن، يزيد من مخاطر نمو البكتيريا، لذلك فإن استخدام المواد المطهرة، يطهر الحافة المتهيجة للجفن والملتحمة المحيطة، ويخلق البيبروكاثول حاجزاً &nbsp;فعالاً ضد البكتيريا، ويحد من نموها</p>', '120.00', '90.00', 3, '4', '2023-05-23 21:33:17', '2023-06-02 11:07:36'),
(13, 4, 'assets/uploads/products/79261684870732.webp', 'صباع روج روز', '<p>يمنحك شفاه ممتلئة وممتلئة ورائعة بشكل طبيعي. يمنحك شعورًا بالخدر لبضع دقائق متبوعًا بالتأثير المرغوب ، ابحث عن الجزء الأكثر اكتمالا من شفتك السفلية وقم بتدوير ذلك بالقلم الرصاص أيضًا. استمر في استخدام القلم ، املئي الفراغ الصغير بين الخطوط التي رسمتها للتو وشفتيك ، ثم ضعي أحمر الشفاه فوقها كلها.</p>', '75.00', '0.00', 2, '4', '2023-05-23 21:38:52', '2023-06-02 11:07:44'),
(14, 4, 'assets/uploads/products/17291684870819.webp', 'مرطب شفاه سحري', '<p>مرطب بالألوف من QIUFSSE أحمر شفاه ماجيك درجة الحرارة متغير لون أحمر الشفاه بلسم الشفاه وصمة عار طويلة La 3 قطع من أحمر شفاه الألوة فيرا ، QIUFSSE أحمر شفاه مرطب من الألوة ، أحمر شفاه مرطب بدرجة حرارة سحرية ، أحمر شفاه متغير اللون ، مرطب شفاه ، أحمر شفاه مقاوم للماء يدوم طويلاً</p>', '50.00', '39.00', 12, '5', '2023-05-23 21:40:19', '2023-06-02 11:07:51'),
(15, 4, 'assets/uploads/products/79911684870895.webp', 'فرشة ميك اب', '<p>تستخدم الفرشاة الكبيرة في وضع بودرة الوجه المضغوطة بعد وضع كريم الأساس لإعطاء وجهك ملمسا حريرياً. ويمكنك استخدام هذه الفرشاة أيضًا على الجسم. أما فرشاة البودرة الصغيرة، فيتم استعمالها في وضع أحمر الخدود على الوجنتين والأنف</p>', '30.00', '19.00', 5, '5', '2023-05-23 21:41:35', '2023-06-02 11:08:00'),
(16, 4, 'assets/uploads/products/43971684871011.webp', 'كريم نيفيا', '<p>كريم نيفيا هو المرطب الأصلي للعائلة بأكملها. هذا المنتج الأيقوني غني بمادة الأيوسيريت والتي تمنح البشرة عناية وقائية تحتاجها بشرتك للبقاء ناعمة ونضرة,للاستخدام اليومي: تركيبة خفيفة مثالية للاستخدام في جميع أنحاء الوجه واليدين والجسم ، وخاصة على المناطق الخشنة مثل الركبتين والقدمين والمرفقين واليدين النتيجة: ترطيب مكثف ، بشرة ناعمة وناعمة ، تغذية وحماية ضد الإحساس الخشن والجاف خالية من المواد الحافظة: خالية من المواد الحافظة ومناسبة لبشرة الأطفال</p>', '40.00', '30.00', 17, '5', '2023-05-23 21:43:31', '2023-06-02 11:08:08'),
(17, 4, 'assets/uploads/products/80091684871071.webp', 'سبراي شعر', '<p>مثبت الشعر مصفف الشعر هو منتج تصفيف شعر تجميلي شائع يتم رشه على الشعر لحمايته من الرطوبة والرياح. تتكون بخاخات الشعر عادة من عدة مكونات للشعر بالإضافة إلى مادة قاذفة. المكونات تتكون بخاخات الشعر من المكونات التالية: المركز، والملدنات، وعوامل اللمعان، والعطور، بالإضافة إلى المواد القاذفة</p>', '165.00', '120.00', 6, '3', '2023-05-23 21:44:31', '2023-06-02 11:07:02'),
(18, 4, 'assets/uploads/products/23781684871183.webp', 'علية ميك اب تركي', '<p>شنطة مكياج بسعة كبيرة من 3 طبقات لتنظيم مستحضرات التجميل وفرش المكياج، صندوق خبراء المكياج لمكواة تمويج الشعر وفرش فرد الشعر ومستحضرات التجميل , مادة أولية كريستال نوع النهاية مصقول</p>', '350.00', '299.00', 7, '2', '2023-05-23 21:46:23', '2023-06-02 11:05:12'),
(19, 1, 'assets/uploads/products/52221685707852.webp', 'ساعة سمارت اصدار W2', '<p>وظائف hk8 pro max ultraشاشه اموليد عاليه الدقه<br />\r\n&bull; مكالمة بلوتوث: قم بإجراء مكالمة والرد على المكالمة<br />\r\nإشعار الرسائل: مكالمة واردة ، WhatsApp ، Facebook ، WeChat ، إلخ ، إشعارات البريد الإلكتروني والرسائل<br />\r\nأوضاع رياضية متعددة ، خطوات ، سعرات حرارية ، مسافة قطع قياسية<br />\r\nتذكير المكالمات<br />\r\nمراقب معدل ضربات القلب<br />\r\nمقياس الأكسجين في الدم<br />\r\nجهاز قياس ضغط الدم<br />\r\nتذكير مستقر<br />\r\nمراقبة النوم<br />\r\nمكافحة خسر<br />\r\nمشغل الموسيقى: قم بتشغيل موسيقى الهاتف<br />\r\nدليل الهاتف وسجلات المكالمات: مزامنة دليل الهاتف وسجل المكالمات مع الهاتف المحمول<br />\r\nالمعلومات الأساسيةاسم المنتج: HK8 Pro MAX<br />\r\nمادة الجسم سبائك الزنك + عملية حقن IML<br />\r\nمتطلبات الجهاز: Android 5.0 أو ios 10.0 وما فوق<br />\r\nحجم الساعة الذكية: 49 * 44 * 14.4 ملم<br />\r\nمادة السوار: سيليكون سائل<br />\r\nالبلوتوث: BT 5.2</p>', '1750.00', '1699.00', 3, '4', '2023-06-02 11:10:52', '2023-06-02 11:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(28, 12, 'assets/uploads/products/27951684870397.webp', '2023-05-23 21:33:17', '2023-05-23 21:33:17'),
(29, 12, 'assets/uploads/products/25991684870397.webp', '2023-05-23 21:33:17', '2023-05-23 21:33:17'),
(30, 13, 'assets/uploads/products/21381684870732.webp', '2023-05-23 21:38:52', '2023-05-23 21:38:52'),
(31, 13, 'assets/uploads/products/86931684870732.webp', '2023-05-23 21:38:52', '2023-05-23 21:38:52'),
(32, 13, 'assets/uploads/products/79461684870732.webp', '2023-05-23 21:38:52', '2023-05-23 21:38:52'),
(34, 14, 'assets/uploads/products/401684870819.webp', '2023-05-23 21:40:19', '2023-05-23 21:40:19'),
(35, 14, 'assets/uploads/products/18861684870819.webp', '2023-05-23 21:40:19', '2023-05-23 21:40:19'),
(37, 15, 'assets/uploads/products/69591684870895.webp', '2023-05-23 21:41:35', '2023-05-23 21:41:35'),
(38, 16, 'assets/uploads/products/92371684871011.webp', '2023-05-23 21:43:31', '2023-05-23 21:43:31'),
(39, 16, 'assets/uploads/products/77281684871011.webp', '2023-05-23 21:43:31', '2023-05-23 21:43:31'),
(41, 17, 'assets/uploads/products/43191684871071.webp', '2023-05-23 21:44:31', '2023-05-23 21:44:31'),
(42, 18, 'assets/uploads/products/10021684871183.webp', '2023-05-23 21:46:23', '2023-05-23 21:46:23'),
(43, 18, 'assets/uploads/products/88831684871183.webp', '2023-05-23 21:46:23', '2023-05-23 21:46:23'),
(44, 19, 'assets/uploads/products/25221685707852.webp', '2023-06-02 11:10:53', '2023-06-02 11:10:53'),
(45, 19, 'assets/uploads/products/15271685707853.webp', '2023-06-02 11:10:53', '2023-06-02 11:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `stars` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `image`, `name`, `desc`, `stars`, `created_at`, `updated_at`) VALUES
(26, 12, 'assets/uploads/reviews/89051684870516.webp', 'دكتور مهند راشد', 'منتج رائع وبلا اثار جانية , أمن علي الحوامل ومرضي السكر والدم ولا يحتوي علي اي مواد غير معروفة المصدر , انصح به بدون شك', '5', '2023-05-23 21:35:16', '2023-05-23 21:35:16'),
(27, 12, 'assets/uploads/reviews/41511684870541.webp', 'دكتورة بسمة محمد', 'نقدم النصائح الطبية لجعل حياتك أفضل نقدم النصائح الطبية لجعل حياتك أفضل نقدم النصائح الطبية لجعل حياتك أفضل', '5', '2023-05-23 21:35:41', '2023-05-23 21:35:41'),
(28, 12, 'assets/uploads/reviews/47891684870618.webp', 'دكتور منصور', 'كريم امن للاطفال والكبار ولا يحتوي علي كحوليات , انصح به واتمني زيادة الكميات او زيادة حجم العلبة لتلائم احتياجات الجميع', '5', '2023-05-23 21:36:58', '2023-05-23 21:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_type` enum('whatsapp','site') NOT NULL DEFAULT 'whatsapp',
  `title` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `about_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `order_type`, `title`, `desc`, `logo`, `phone`, `whatsapp`, `facebook`, `gmail`, `about`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 'site', 'Aya Cosmetics', 'شحن مجاني للمنتجات فوق 250 ج.م', 'assets/uploads/78701684496183.webp', '+201098380656', '+201098380656', 'https://www.facebook.com/ahmedtarekya/', 'ahmedtarekya100@gmail.com', '<p>&nbsp;تستخدم للعناية بالبشرة والشعر والجسم. يمكن أن يكون المتجر جزءًا من سلسلة متاجر أو مستقلاً، ويتميز بتوفير مجموعة واسعة من المنتجات التي تتناسب مع احتياجات العملاء المختلفة.</p>\r\n\r\n<p>يتضمن متجر مستحضرات التجميل عادةً مجموعة متنوعة من المنتجات، مثل الكريمات والزيوت والماسكات والأمبولات والشامبو والبلسم والصابون ومنتجات الاستحمام وغيرها. وتتوفر هذه المنتجات عادة في عدة أحجام وأنواع وتركيبات مختلفة لتناسب احتياجات العملاء المختلفة.</p>\r\n\r\n<p>يمكن أن يشمل متجر مستحضرات التجميل أيضًا خدمات إضافية مثل الاستشارة الشخصية لاختيار المنتجات المناسبة، وعروض خاصة وتخفيضات على المنتجات، وعروض تجريبية للمنتجات الجديدة</p>', 'assets/uploads/93771684938021.webp', '2023-05-18 15:40:14', '2023-06-22 15:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'نصائح مستمرة وقيمة للعناية بالبشرة', 'فريق طبي متكامل', 'assets/uploads/sliders/94191684497025.webp', '2023-05-11 21:20:51', '2023-05-19 13:50:26'),
(4, 'عروض حصرية ومستمرة دايما', 'تابعوا عروضنا', 'assets/uploads/sliders/97211684497416.webp', '2023-05-19 13:56:56', '2023-05-19 13:56:56'),
(5, 'منتجات بأفضل جودة', 'استكشفي منتجاتنا', 'assets/uploads/sliders/55551684497891.webp', '2023-05-19 14:04:51', '2023-05-19 14:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'assets/uploads/users/54601686176252.webp', 'احمد طارق عباس يحيي', 'ahmedtarekya100@gmail.com', '$2y$10$VFfdLY1jHZaBnLHhbOkWxeYsTXQIBi04Ie3OYO/ydGHzDv5KThSXW', 'المنوفية شبين الكوم البتانون امام مول الحاج عبودة العشماوي مباشرة شقة 212', NULL, '2023-06-07 21:17:33', '2023-06-07 21:17:33'),
(3, NULL, 'محمد علي كامل', 'mohamed@gmail.com', '$2y$10$i0QXoo5hjjDvShXWu/Q6SeIxe44shY1AbADsxPq.LqHEjz5Mya6ru', 'الغربية محل الامل شارع 20', NULL, '2023-06-22 15:33:35', '2023-06-22 15:33:35'),
(4, 'assets/uploads/users/22141687452165.webp', 'محمد ناصر كامل علي', 'nasser@gmail.com', '$2y$10$oSaShHnya3cQ8OxvGKWJhe9dVHpZjDtP3xq.11fbOMisvLtklVo8.', 'منوف المنوفيه شارع 87', NULL, '2023-06-22 15:42:46', '2023-06-22 15:42:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_products_product_id_foreign` (`product_id`),
  ADD KEY `favorite_products_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id_relation` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD CONSTRAINT `favorite_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id_relation` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
