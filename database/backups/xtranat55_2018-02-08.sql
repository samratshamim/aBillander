-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-02-2018 a las 13:06:20
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xtranat55`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configurations`
--

CREATE TABLE `configurations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configurations`
--

INSERT INTO `configurations` (`id`, `name`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, 'SW_VERSION', NULL, '0.2.2', '2015-03-31 09:12:55', '2017-07-18 09:58:20'),
(3, 'MARGIN_METHOD', '\'CST\' => Sales Margin is related to Product Cost Price,  // Markup Percentage = (Sales Price – Unit Cost)/Unit Cost X 100\r\n\'PRC\' => Sales Margin is related to Product Sales Price,  // Gross Margin Percentage = (Gross Profit/Sales Price) X 100\r\nGross Profit = Sales Price – Unit Cost', 'PRC', '2015-03-31 09:12:55', '2017-11-14 12:19:49'),
(4, 'ALLOW_SALES_WITHOUT_STOCK', NULL, '0', '2015-03-31 09:12:55', '2015-05-19 15:14:47'),
(5, 'ALLOW_SALES_RISK_EXCEEDED', NULL, '0', '2015-03-31 09:12:55', '2015-05-19 15:14:47'),
(6, 'DEF_LANGUAGE', NULL, '2', '2015-03-31 09:12:55', '2017-07-18 09:48:49'),
(7, 'DEF_COUNTRY', '', '1', '2015-03-31 09:12:55', '2017-08-16 17:05:13'),
(8, 'DEF_CUSTOMER_INVOICE_SEQUENCE', NULL, '2', '2015-03-31 09:12:55', '2017-10-09 13:19:52'),
(9, 'DEF_CUSTOMER_INVOICE_TEMPLATE', NULL, '1', '2015-03-31 09:12:55', '2017-10-30 09:16:03'),
(10, 'DEF_CUSTOMER_PAYMENT_METHOD', NULL, '1', '2015-03-31 09:12:55', '2017-10-10 10:35:14'),
(11, 'DEF_OUTSTANDING_AMOUNT', NULL, '3000.0', '2015-03-31 09:12:55', '2015-03-31 09:12:55'),
(12, 'DEF_CARRIER', NULL, '0', '2015-03-31 09:12:55', '2015-03-31 09:12:55'),
(13, 'DEF_WAREHOUSE', NULL, '5', '2015-03-31 09:12:55', '2017-09-28 12:54:36'),
(14, 'DEF_ITEMS_PERPAGE', NULL, '5', '2015-03-31 09:12:55', '2015-06-30 06:15:00'),
(15, 'DEF_ITEMS_PERAJAX', 'Number of items (maximum) returned by an ajax request', '10', '2015-03-31 09:12:55', '2017-10-20 10:07:29'),
(16, 'TIMEZONE', NULL, 'Europe/Madrid', '2015-04-01 20:00:00', '2015-04-01 20:00:00'),
(17, 'DEF_COMPANY', NULL, '2', '2015-04-03 05:54:13', '2017-10-19 10:58:40'),
(18, 'DEF_PERCENT_DECIMALS', NULL, '2', '2015-04-18 15:58:22', '2015-04-18 16:01:54'),
(19, 'DEF_CURRENCY', NULL, '15', '2015-05-08 10:03:37', '2017-09-22 14:29:16'),
(20, 'DEF_CUSTOMER_PAYMENT_DAY', NULL, '1', '2015-06-22 15:54:06', '2015-06-22 15:54:06'),
(21, 'SUPPORT_CENTER_EMAIL', NULL, 'dcomobject@hotmail.com', '2015-07-09 08:13:38', '2017-09-28 08:28:47'),
(22, 'SUPPORT_CENTER_NAME', NULL, 'aBillander Support Center', '2015-07-09 08:14:11', '2015-07-09 08:14:11'),
(23, 'ENABLE_SALES_EQUALIZATION', NULL, '1', '2017-07-18 19:00:10', '2017-07-18 19:00:10'),
(24, 'ENABLE_COMBINATIONS', NULL, '1', '2017-07-18 19:02:52', '2017-07-18 19:04:17'),
(25, 'ENABLE_WAREHOUSE', NULL, '1', '2017-07-20 08:37:48', '2017-07-20 08:37:48'),
(26, 'QUOTES_EXPIRE_AFTER', NULL, '15', '2017-07-25 15:38:02', '2017-07-25 15:38:02'),
(27, 'SW_DATABASE_VERSION', NULL, '0.2.2', '2017-07-26 05:35:19', '2017-07-26 05:35:19'),
(29, 'ENABLE_WEBSHOP_CONNECTOR', NULL, '1', '2017-07-26 10:30:47', '2017-10-16 10:01:02'),
(30, 'ALLOW_PRODUCT_SUBCATEGORIES', '=1 : Permite subcategorías. Los productos se asocian a subcategorías.\r\n=0 : Los productos se asocian a categorías.\r\nNOTA: las subcategorías son "Categorías-hijas"', '1', '2017-08-19 07:37:57', '2017-09-16 10:58:41'),
(31, 'HEADER_TITLE', 'Texto en la barra de menús, a la izquierda', '<span style="color:#bbb"><i class="fa fa-bolt"></i> Lar<span style="color:#fff">aBillander</span> LXVII</span>', '2017-08-31 05:00:28', '2017-10-16 10:02:15'),
(32, 'DEF_QUANTITY_DECIMALS', 'Default decimal positions for quantities (stock, etc.)', '2', '2017-09-10 10:19:49', '2017-09-10 10:19:49'),
(33, 'DEF_MEASURE_UNIT', 'Default measure unit for products and combinations', 'ud', '2017-09-12 08:53:07', '2017-09-12 09:08:41'),
(34, 'DEF_WEIGHT_UNIT', 'The default weight unit for your shop (e.g."kg" for kilograms, "lbs" for pound-mass, etc.).', 'kg', '2017-09-12 09:05:10', '2017-09-12 09:05:10'),
(35, 'DEF_DISTANCE_UNIT', 'The default distance unit for your shop (e.g. "km" for kilometer, "mi" for mile, etc.).', 'km', '2017-09-12 09:06:34', '2017-09-12 09:06:34'),
(36, 'DEF_VOLUME_UNIT', 'The default volume unit for your shop (e.g. "L" for liter, "gal" for gallon, etc.).', 'cl', '2017-09-12 09:07:39', '2017-09-12 09:07:39'),
(37, 'DEF_DIMENSION_UNIT', 'The default dimension unit for your shop (e.g. "cm" for centimeter, "in" for inch, etc.).', 'cm', '2017-09-12 09:08:26', '2017-09-12 09:08:26'),
(39, 'DEF_TAX', 'Default Tax for Products', '1', '2017-09-16 19:31:45', '2017-09-16 19:31:45'),
(40, 'DEF_PRICELIST', 'Default Price List for products', '1', '2017-09-18 07:28:21', '2017-09-18 07:28:21'),
(41, 'STOCK_COUNT_IN_PROGRESS', 'Stock count is in progress. Routes / Controlleres that modify stock are voided.', '0', '2017-09-29 16:36:03', '2017-09-29 16:36:03'),
(42, 'PRICES_ENTERED_WITH_TAX', '1.- I will enter prices inclusive of tax\r\n0.- I will enter prices exclusive of tax\r\nChanging this option will not update existing products', '0', '2017-10-15 09:02:16', '2017-10-16 09:55:16'),
(43, 'ROUND_PRICES_WITH_TAX', '1.- \r\na: Round price inclusive of tax b: Calculate and round price exclusive of tax c: Tax is the difference (no round needed)\r\n0.- \r\na: Round price exclusive of tax b: Calculate and round price inclusive of tax c: Tax is the difference (no round needed)', '1', '2017-10-15 09:10:24', '2017-10-27 09:49:23'),
(44, 'SKU_PREFIX_OFFSET', 'This value will be added to the Product ID to obtain an unique SKU', '100', '2017-11-11 14:47:07', '2017-11-11 15:37:38'),
(45, 'SKU_PREFIX_LENGTH', 'Product ID will be (zero padded) this length (minimum) as SKU prefix.', '4', '2017-11-11 14:48:34', '2017-11-11 17:08:27'),
(46, 'SKU_SUFFIX_LENGTH', 'Combination ID will be (zero padded) this length (minimum) as SKU suffix.', '1', '2017-11-11 14:49:50', '2017-11-11 17:07:06'),
(47, 'SKU_SEPARATOR', 'This will be placed between SKU Prefix and SKU Suffix', '-', '2017-11-11 14:52:01', '2017-11-11 14:52:01'),
(48, 'SKU_AUTOGENERATE', 'Auto-generate a SKU if none is given', '1', '2017-11-11 15:40:40', '2017-11-11 15:40:40'),
(49, 'WOOC_DEF_CURRENCY', 'WooCommerce Currency ID (within aBillander)', '15', '2017-12-02 13:55:24', '2017-12-02 13:55:24'),
(51, 'WOOC_DEF_LANGUAGE', 'WooCommerce Language ID (within aBillander)', '2', '2017-12-08 13:46:13', '2017-12-08 18:02:53'),
(52, 'WOOC_DEF_INVOICE_SEQUENCE', 'Invoiced WooCommerce Orders will go to this Sequence', '2', '2017-12-10 09:25:23', '2017-12-10 09:26:27'),
(53, 'WOOC_SAVE_INVOICE_AS_DRAFT', 'Invoices after WooCommerce Orders will be saved with status \'draft\' (1) or \'pending\' (0)', '1', '2017-12-10 09:30:04', '2017-12-10 09:31:59'),
(54, 'WOOC_USE_LOCAL_PRODUCT_NAME', 'Use local Product & Combination names in documents, instead of WooCommerce Shop names', '1', '2017-12-10 12:19:41', '2017-12-10 13:15:45'),
(55, 'WOOC_DEF_TAX', 'Default Tax for not found products', '1', '2017-12-10 13:05:16', '2017-12-10 13:05:16'),
(56, 'WOOC_TAXES_CACHE', NULL, '[{"slug":"standard","name":"Tarifa est\\u00e1ndar","_links":{"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/taxes\\/classes"}]}},{"slug":"reduced-rate","name":"Reduced Rate","_links":{"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/taxes\\/classes"}]}},{"slug":"r-e","name":"R.E.","_links":{"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/taxes\\/classes"}]}}]', '2017-12-11 12:37:15', '2017-12-11 12:37:15'),
(57, 'WOOC_TAX_STANDARD', NULL, '1', '2017-12-11 12:57:57', '2017-12-11 12:57:57'),
(58, 'WOOC_TAX_REDUCED-RATE', NULL, '2', '2017-12-11 12:57:57', '2017-12-11 12:57:57'),
(59, 'WOOC_TAX_R-E', NULL, '2', '2017-12-11 12:57:57', '2017-12-11 12:57:57'),
(60, 'WOOC_TAXES_DICTIONARY_CACHE', NULL, '{"standard":"1","reduced-rate":"2","r-e":"2"}', '2017-12-11 13:44:38', '2017-12-11 13:44:38'),
(61, 'TAX_BASED_ON_SHIPPING_ADDRESS', 'Tax calculation based on: 1.- delivery address (default) 0.- invoice address', '0', '2017-12-12 10:16:03', '2017-12-12 10:18:47'),
(62, 'WOOC_DEF_SHIPPING_TAX', 'Default Tax for shipping expenses. It is a WooCommerce Store Setting.', '1', '2017-12-12 14:01:51', '2017-12-12 14:41:10'),
(63, 'WOOC_DECIMAL_PLACES', 'Number of decimal places WooCommerce works with. It is a WooCommerce Store Setting.', '2', '2017-12-12 14:40:41', '2017-12-12 14:40:41'),
(64, 'WOOC_PAYMENT_GATEWAYS_CACHE', NULL, '[{"id":"redsys","title":"Tarjeta de cr\\u00e9dito\\/d\\u00e9bito","description":"Paga con tu tarjeta de cr\\u00e9dito o de d\\u00e9bito","order":0,"enabled":true,"method_title":"Pago con Tarjeta (REDSYS)","method_description":"Esta es la opci\\u00f3n de la pasarela de pago de Redsys.","_links":{"self":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways\\/redsys"}],"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways"}]}},{"id":"iupay","title":"IUPAY","description":"Paga con Iupay","order":1,"enabled":true,"method_title":"Pago con Tarjeta (IUPAY)","method_description":"Esta es la opci\\u00f3n de la pasarela de pago de Iupay.","_links":{"self":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways\\/iupay"}],"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways"}]}},{"id":"paypal","title":"PayPal","description":"Pagar con PayPal; puedes pagar con tu tarjeta de cr\\u00e9dito si no tienes una cuenta de PayPal.","order":2,"enabled":true,"method_title":"PayPal","method_description":"PayPal est\\u00e1ndar funciona enviando al usuario a PayPal para que introduzca su informaci\\u00f3n de pago. La IPN de PayPal IPN requiere compatibilidad con fsockopen\\/cURL para actualizar el estado del pedido despu\\u00e9s del pago. Revisa la p\\u00e1gina del <a href=\\"http:\\/\\/localhost\\/wooc\\/wp-admin\\/admin.php?page=wc-status\\">estado del sistema<\\/a> para m\\u00e1s detalles.","_links":{"self":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways\\/paypal"}],"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways"}]}},{"id":"bacs","title":"Transferencia bancaria","description":"Realiza tu pago directamente en nuestra cuenta bancaria. Por favor usa la referencia del pedido como referencia de pago. El pedido no ser\\u00e1 enviado hasta que el importe completo haya sido recibido en nuestra cuenta.","order":3,"enabled":false,"method_title":"Transferencia bancaria","method_description":"Permite el pago mediante transferencia bancaria.","_links":{"self":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways\\/bacs"}],"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways"}]}},{"id":"cheque","title":"Giro a 30 d\\u00edas","description":"El importe facturado se cargar\\u00e1 en su cuenta bancaria 30 d\\u00edas despu\\u00e9s de la fecha de factura. Solo disponible para clientes que hayan firmado la ORDEN DE DOMICILIACI\\u00d3N SEPA.","order":4,"enabled":true,"method_title":"Pagos por cheque","method_description":"Permite el pago por cheque. \\u00bfPor qu\\u00e9 aceptar cheques a estas alturas? Probablemente no deber\\u00edas pero te permite hacer compras de prueba para probar los correos electr\\u00f3nicos de pedido, las p\\u00e1ginas de \'conseguido\', etc.","_links":{"self":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways\\/cheque"}],"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways"}]}},{"id":"cod","title":"Contra reembolso","description":"Pagar en efectivo al momento de la entrega.","order":5,"enabled":false,"method_title":"Contra reembolso","method_description":"Permite que sus clientes paguen en efectivo (o por otros medios) cuando se entrega el producto.","_links":{"self":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways\\/cod"}],"collection":[{"href":"http:\\/\\/localhost\\/wooc\\/wp-json\\/wc\\/v2\\/payment_gateways"}]}}]', '2017-12-13 09:40:42', '2017-12-16 13:29:43'),
(65, 'WOOC_PAYMENT_GATEWAY_REDSYS', NULL, '1', '2017-12-13 10:21:29', '2017-12-13 10:21:29'),
(66, 'WOOC_PAYMENT_GATEWAY_IUPAY', NULL, '1', '2017-12-13 10:21:29', '2017-12-13 10:21:29'),
(67, 'WOOC_PAYMENT_GATEWAY_PAYPAL', NULL, '1', '2017-12-13 10:21:29', '2017-12-13 10:21:29'),
(68, 'WOOC_PAYMENT_GATEWAY_BACS', NULL, '2', '2017-12-13 10:21:29', '2017-12-13 10:21:29'),
(69, 'WOOC_PAYMENT_GATEWAY_CHEQUE', NULL, '2', '2017-12-13 10:21:29', '2017-12-13 10:21:29'),
(70, 'WOOC_PAYMENT_GATEWAY_COD', NULL, '2', '2017-12-13 10:21:30', '2017-12-13 10:21:30'),
(71, 'WOOC_PAYMENT_GATEWAYS_DICTIONARY_CACHE', NULL, '{"redsys":"1","iupay":"1","paypal":"1","bacs":"2","cheque":"2","cod":"2"}', '2017-12-13 10:21:30', '2017-12-13 10:21:30'),
(72, 'WOOC_CONFIGURATIONS_CACHE', NULL, '[{"id":"woocommerce_default_country","description":"Esto es d\\u00f3nde est\\u00e1 situado tu negocio. Los impuestos estar\\u00e1n basados en este pa\\u00eds.","value":"ES:V"},{"id":"woocommerce_allowed_countries","description":"Con esta opci\\u00f3n puedes elegir a qu\\u00e9 pa\\u00edses quieres vender.","value":"specific"},{"id":"woocommerce_all_except_countries","description":"","value":[]},{"id":"woocommerce_specific_allowed_countries","description":"","value":["ES","PT"]},{"id":"woocommerce_ship_to_countries","description":"Elige a qu\\u00e9 pa\\u00edses quieres enviar, o elige enviar a todos los lugares que vendes.","value":""},{"id":"woocommerce_specific_ship_to_countries","description":"","value":[]},{"id":"woocommerce_default_customer_address","description":"","value":"geolocation"},{"id":"woocommerce_calc_taxes","description":"Activa los impuestos y los c\\u00e1lculos de impuestos","value":"yes"},{"id":"woocommerce_demo_store","description":"Activa un aviso de texto en toda la tienda","value":"no"},{"id":"woocommerce_demo_store_notice","description":"","value":"CERRADO POR VACACIONES HASTA EL 21 DE AGOSTO"},{"id":"woocommerce_currency","description":"Esto controla en qu\\u00e9 moneda se listan los precios en el cat\\u00e1logo y en qu\\u00e9 moneda se realizar\\u00e1n los pagos a trav\\u00e9s de las opciones de pago.","value":"EUR"},{"id":"woocommerce_currency_pos","description":"Esto controla la posici\\u00f3n del s\\u00edmbolo de moneda.","value":"right"},{"id":"woocommerce_price_thousand_sep","description":"Esto establece el separador de miles de los precios mostrados.","value":"."},{"id":"woocommerce_price_decimal_sep","description":"Esto establece el separador decimal de los precios mostrados.","value":","},{"id":"woocommerce_price_num_decimals","description":"Esto establece el n\\u00famero de decimales que se muestran en los precios mostrados.","value":"2"},{"id":"woocommerce_weight_unit","description":"Esto controla en qu\\u00e9 unidad definir\\u00e1s los pesos.","value":"g"},{"id":"woocommerce_dimension_unit","description":"Esto controla en qu\\u00e9 unidad definir\\u00e1s las longitudes.","value":"cm"},{"id":"woocommerce_enable_reviews","description":"Activar valoraciones de producto","value":"yes"},{"id":"woocommerce_review_rating_verification_label","description":"Mostrar la etiqueta \\"propietario verificado\\" en las valoraciones de los clientes","value":"yes"},{"id":"woocommerce_review_rating_verification_required","description":"Las rese\\u00f1as solo las pueden dejar \\"propietarios verificados\\"","value":"no"},{"id":"woocommerce_enable_review_rating","description":"Activar valoraciones con estrellas en las rese\\u00f1as","value":"yes"},{"id":"woocommerce_review_rating_required","description":"Las valoraciones con estrellas deber\\u00e1n ser obligatorias, no opcionales","value":"yes"},{"id":"woocommerce_shop_page_display","description":"Esto controla lo que se muestra en el archivo de productos.","value":""},{"id":"woocommerce_category_archive_display","description":"Esto controla lo que se muestra en Archivo de la categor\\u00eda.","value":""},{"id":"woocommerce_default_catalog_orderby","description":"Esto controla el orden de clasificaci\\u00f3n por defecto del cat\\u00e1logo.","value":"menu_order"},{"id":"woocommerce_cart_redirect_after_add","description":"Redirigir a la p\\u00e1gina del carrito tras a\\u00f1adir productos con \\u00e9xito","value":"no"},{"id":"woocommerce_enable_ajax_add_to_cart","description":"Activar botones AJAX de a\\u00f1adir al carrito en los archivos","value":"yes"},{"id":"shop_catalog_image_size","description":"Este tama\\u00f1o se utiliza generalmente en los listados de productos. (W x H)","value":{"width":400,"height":400,"crop":true}},{"id":"shop_single_image_size","description":"Este es el tama\\u00f1o utilizado en la imagen principal de la p\\u00e1gina del producto. (W x H)","value":{"width":600,"height":600,"crop":true}},{"id":"shop_thumbnail_image_size","description":"Este tama\\u00f1o se utiliza generalmente para la galer\\u00eda de im\\u00e1genes en la p\\u00e1gina del producto. (W x H)","value":{"width":180,"height":180,"crop":true}},{"id":"woocommerce_manage_stock","description":"Activar la gesti\\u00f3n de inventario","value":"yes"},{"id":"woocommerce_hold_stock_minutes","description":"Mantener el inventario (para pedidos pendientes de pago) durante x minutos. Cuando se alcance este l\\u00edmite se cancelar\\u00e1 el pedido pendiente. D\\u00e9jalo en blanco para desactivarlo.","value":"60"},{"id":"woocommerce_notify_low_stock","description":"Activar avisos de pocas existencias","value":"yes"},{"id":"woocommerce_notify_no_stock","description":"Activar avisos de inventario agotado","value":"yes"},{"id":"woocommerce_stock_email_recipient","description":"Introduce destinatarios (separados por coma) que recibir\\u00e1n este aviso.","value":"info@localhost.dev"},{"id":"woocommerce_notify_low_stock_amount","description":"Cuando el inventario del producto alcance esta cantidad ser\\u00e1s notificado por correo electr\\u00f3nico.","value":"12"},{"id":"woocommerce_notify_no_stock_amount","description":"Cuando el inventario del producto alcanza esta cantidad el estado del inventario cambiar\\u00e1 a \\"sin existencias\\" y recibir\\u00e1s un aviso por correo electr\\u00f3nico. Este ajuste no afecta a los productos \\"con existencias\\".","value":"0"},{"id":"woocommerce_hide_out_of_stock_items","description":"Ocultar en el cat\\u00e1logo los art\\u00edculos agotados","value":"no"},{"id":"woocommerce_stock_format","description":"Esto controla c\\u00f3mo se muestran las cantidades del inventario en la tienda.","value":"no_amount"},{"id":"woocommerce_file_download_method","description":"Forzar descargas mantendr\\u00e1 ocultas las URLs, pero puede que algunos servidores sirvan archivos grandes de manera poco segura. Si es compatible, puedes usar en su lugar <code>X-Accel-Redirect<\\/code> \\/ <code>X-Sendfile<\\/code> para servir descargas (el servidor requiere <code>mod_xsendfile<\\/code> ).","value":"force"},{"id":"woocommerce_downloads_require_login","description":"Las descargas requieren inicio de sesi\\u00f3n","value":"no"},{"id":"woocommerce_downloads_grant_access_after_payment","description":"Permitir acceso a los productos descargables despu\\u00e9s del pago","value":"yes"},{"id":"woocommerce_prices_include_tax","description":"","value":"no"},{"id":"woocommerce_tax_based_on","description":"","value":"base"},{"id":"woocommerce_shipping_tax_class","description":"Control opcional para la tasa de impuesto por env\\u00edo, o d\\u00e9jalo tal cual si el impuesto por env\\u00edo est\\u00e1 basado en los productos del carrito.","value":""},{"id":"woocommerce_tax_round_at_subtotal","description":"Redondeo de impuesto en el subtotal, en lugar de redondeo por cada l\\u00ednea","value":"no"},{"id":"woocommerce_tax_classes","description":"","value":"Reduced Rate\\r\\nR.E."},{"id":"woocommerce_tax_display_shop","description":"","value":"incl"},{"id":"woocommerce_tax_display_cart","description":"","value":"incl"},{"id":"woocommerce_price_display_suffix","description":"","value":""},{"id":"woocommerce_tax_total_display","description":"","value":"itemized"},{"id":"woocommerce_enable_shipping_calc","description":"Activar la calculadora de env\\u00edos en la p\\u00e1gina de compra","value":"yes"},{"id":"woocommerce_shipping_cost_requires_address","description":"Ocultar los gastos de env\\u00edo hasta que se introduzca una direcci\\u00f3n","value":"yes"},{"id":"woocommerce_ship_to_destination","description":"Esto controla qu\\u00e9 direcci\\u00f3n de env\\u00edo se usa por defecto.","value":"billing"},{"id":"woocommerce_shipping_debug_mode","description":"Activar el modo de depuraci\\u00f3n","value":"no"},{"id":"woocommerce_enable_coupons","description":"Activa el uso de cupones","value":"yes"},{"id":"woocommerce_calc_discounts_sequentially","description":"Calcular descuentos de cupones secuencialmente","value":"no"},{"id":"woocommerce_enable_guest_checkout","description":"Permitir finalizar compra como invitado","value":"no"},{"id":"woocommerce_force_ssl_checkout","description":"Forzar el pago seguro","value":"no"},{"id":"woocommerce_unforce_ssl_checkout","description":"Forzar HTTP al terminar el pago","value":"no"},{"id":"woocommerce_checkout_pay_endpoint","description":"Variable de la p\\u00e1gina de \\"Finalizar compra &rarr; Pagar\\".","value":"order-pay"},{"id":"woocommerce_checkout_order_received_endpoint","description":"Variable de la p\\u00e1gina \\"Finalizar compra &rarr; Pedido recibido\\".","value":"order-received"},{"id":"woocommerce_myaccount_add_payment_method_endpoint","description":"Variable de la p\\u00e1gina \\"Finalizar compra &rarr; A\\u00f1adir m\\u00e9todo de pago\\".","value":"add-payment-method"},{"id":"woocommerce_myaccount_delete_payment_method_endpoint","description":"Variable para la p\\u00e1gina de eliminar m\\u00e9todo de pago","value":"delete-payment-method"},{"id":"woocommerce_myaccount_set_default_payment_method_endpoint","description":"Variable para establecer una p\\u00e1gina de m\\u00e9todo de pago por defecto","value":"set-default-payment-method"},{"id":"woocommerce_enable_signup_and_login_from_checkout","description":"Permitir el alta como cliente en la p\\u00e1gina \\"Finalizar compra\\"","value":"yes"},{"id":"woocommerce_enable_myaccount_registration","description":"Permitir el alta como cliente en la p\\u00e1gina \\"Mi cuenta\\"","value":"yes"},{"id":"woocommerce_enable_checkout_login_reminder","description":"Muestra un recordatorio de acceso al cliente ya registrado en la p\\u00e1gina de \\"Finalizar compra\\"","value":"yes"},{"id":"woocommerce_registration_generate_username","description":"Genera autom\\u00e1ticamente el nombre de usuario a partir del correo electr\\u00f3nico del cliente","value":"no"},{"id":"woocommerce_registration_generate_password","description":"Genera autom\\u00e1ticamente la contrase\\u00f1a del cliente","value":"no"},{"id":"woocommerce_myaccount_orders_endpoint","description":"Variable para la p\\u00e1gina \\"Mi cuenta &rarr; Pedidos\\".","value":"orders"},{"id":"woocommerce_myaccount_view_order_endpoint","description":"Variable de la p\\u00e1gina \\"Mi cuenta &rarr; Ver pedido\\".","value":"view-order"},{"id":"woocommerce_myaccount_downloads_endpoint","description":"Variable para la p\\u00e1gina \\"Mi cuenta &rarr; Descargas\\".","value":"downloads"},{"id":"woocommerce_myaccount_edit_account_endpoint","description":"Variable de la p\\u00e1gina \\"Mi cuenta &rarr; Editar cuenta\\".","value":"edit-account"},{"id":"woocommerce_myaccount_edit_address_endpoint","description":"Variable para la p\\u00e1gina \\"Mi cuenta &rarr; Direcciones\\".","value":"edit-address"},{"id":"woocommerce_myaccount_payment_methods_endpoint","description":"Variable para la p\\u00e1gina \\"Mi cuenta &rarr; M\\u00e9todos de pago\\".","value":"payment-methods"},{"id":"woocommerce_myaccount_lost_password_endpoint","description":"Variable de la p\\u00e1gina \\"Mi cuenta &rarr; Contrase\\u00f1a perdida\\".","value":"lost-password"},{"id":"woocommerce_logout_endpoint","description":"Variable para forzar la desconexi\\u00f3n. Puedes a\\u00f1adir esto a tus men\\u00fas con un enlace personalizado: tusitio.com\\/?customer-logout=true","value":"customer-logout"},{"id":"woocommerce_email_from_name","description":"C\\u00f3mo aparece el nombre del remitente en los correos electr\\u00f3nicos salientes de WooCommerce.","value":"Carlota Organic"},{"id":"woocommerce_email_from_address","description":"C\\u00f3mo aparece la direcci\\u00f3n de correo electr\\u00f3nico del remitente en los correos salientes de WooCommerce.","value":"info@localhost.dev"},{"id":"woocommerce_email_header_image","description":"URL de la imagen que quieres mostrar en la cabecera del correo electr\\u00f3nico. Sube las im\\u00e1genes utilizando la subida de multimedia (Administrador > Multimedia).","value":"http:\\/\\/localhost\\/wooc\\/wp-content\\/uploads\\/2016\\/06\\/logo-carlota-organic-email.png"},{"id":"woocommerce_email_footer_text","description":"El texto que aparece en el pie de p\\u00e1gina de mensajes de correo electr\\u00f3nico WooCommerce.","value":"<strong>V\\u00eda Org\\u00e1nica SL<\\/strong> - Centro de Negocios Industrial (CNI) - Cam\\u00ed del Port, 143 - 46470 Catarroja (Valencia) - NIF 98761604B"},{"id":"woocommerce_email_base_color","description":"El color base para las plantillas de correo electr\\u00f3nico de WooCommerce. Por defecto <code>#96588a<\\/code>.","value":"#222222"},{"id":"woocommerce_email_background_color","description":"El color de fondo para las plantillas de correo electr\\u00f3nico de WooCommerce. Por defecto <code>#f7f7f7<\\/code>.","value":"#ffffff"},{"id":"woocommerce_email_body_background_color","description":"El color principal del fondo de la p\\u00e1gina. Por defecto <code>#ffffff<\\/code>.","value":"#ffffff"},{"id":"woocommerce_email_text_color","description":"El color principal del texto de la p\\u00e1gina. Por defecto <code>#3c3c3c<\\/code>.","value":"#222222"},{"id":"woocommerce_api_enabled","description":"Activa la API REST","value":"yes"},{"id":"enabled","description":"","value":"yes"},{"id":"recipient","description":"Introduce los destinatarios (separados por comas) de este correo electr\\u00f3nico. Por defecto es <code>carlotaorganic@localhost.dev<\\/code>.","value":""},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"recipient","description":"Introduce los destinatarios (separados por comas) de este correo electr\\u00f3nico. Por defecto es <code>carlotaorganic@localhost.dev<\\/code>.","value":""},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"recipient","description":"Introduce los destinatarios (separados por comas) de este correo electr\\u00f3nico. Por defecto es <code>carlotaorganic@localhost.dev<\\/code>.","value":""},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"no"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":"Se ha completado tu pedido en {site_title} del {order_date}."},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":"El pedido se ha completado"},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"subject_full","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"subject_partial","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading_full","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading_partial","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"subject_paid","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"heading_paid","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}, {order_date}, {order_number}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"},{"id":"enabled","description":"","value":"yes"},{"id":"subject","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"heading","description":"Marcadores de posici\\u00f3n disponibles: <code>{site_title}<\\/code>","value":""},{"id":"email_type","description":"Elige el formato en el que se enviar\\u00e1n los correos electr\\u00f3nicos.","value":"html"}]', '2017-12-16 14:01:58', '2017-12-16 18:05:26'),
(73, 'XTR_COMPAMY_NAME', NULL, 'La Extranatural', '2018-02-08 11:52:02', '2018-02-08 11:52:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_num` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signPlacement` tinyint(4) NOT NULL DEFAULT '1',
  `thousandsSeparator` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.',
  `decimalSeparator` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',',
  `decimalPlaces` tinyint(4) NOT NULL DEFAULT '2',
  `blank` tinyint(4) NOT NULL DEFAULT '0',
  `conversion_rate` decimal(20,6) NOT NULL DEFAULT '1.000000',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `iso_code`, `iso_code_num`, `sign`, `signPlacement`, `thousandsSeparator`, `decimalSeparator`, `decimalPlaces`, `blank`, `conversion_rate`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'Euro', 'EUR', '978', '€', 1, '.', ',', 2, 0, '1.000000', 1, '2017-09-22 14:29:16', '2017-09-22 14:29:16', NULL),
(16, 'Dollar', 'USD', '840', '$', 0, ',', '.', 2, 0, '1.220000', 1, '2017-09-22 14:29:16', '2017-09-22 14:29:16', NULL),
(17, 'Pound Sterling', 'GBP', '826', '£', 0, ',', '.', 2, 0, '0.880000', 1, '2017-09-22 14:29:16', '2017-09-22 14:29:16', NULL),
(18, 'Yen', 'JPY', '392', '¥', 0, ',', '', 0, 0, '130.000000', 1, '2017-09-22 14:29:16', '2017-09-22 14:29:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_lite` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_full` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_lite_view` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_full_view` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_code`, `language_code`, `date_format_lite`, `date_format_full`, `date_format_lite_view`, `date_format_full_view`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', 'en', 'en-en', 'm/j/Y', 'm/j/Y H:i:s', 'm/j/Y', 'm/j/Y H:i:s', 1, '2017-09-20 16:39:27', '2017-09-20 16:39:27', NULL),
(2, 'Español', 'es', 'es-es', 'd/m/Y', 'd/m/Y H:i:s', 'd/m/yy', 'd/m/yy H:i:s', 1, '2017-09-20 16:39:28', '2017-09-26 10:24:33', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_11_15_074910_create_sequences_table', 1),
(2, '2013_11_15_100934_create_configurations_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2014_11_23_100432_create_currencies_table', 1),
(6, '2015_01_04_072748_create_languages_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sequences`
--

CREATE TABLE `sequences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequenceable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` tinyint(3) UNSIGNED NOT NULL,
  `separator` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_id` int(10) UNSIGNED NOT NULL,
  `last_date_used` timestamp NULL DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sequences`
--

INSERT INTO `sequences` (`id`, `name`, `model_name`, `sequenceable_type`, `prefix`, `length`, `separator`, `next_id`, `last_date_used`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Recuentos de Stock', 'StockCount', '', 'REC', 6, '-', 2, '2017-10-02 09:30:50', 1, '2017-09-30 19:15:15', '2017-10-02 09:30:50', NULL),
(2, 'Facturas Nacional', 'CustomerInvoice', '', 'NAC', 5, '-', 12, '2018-01-30 13:38:37', 1, '2017-10-05 12:07:21', '2018-01-30 13:38:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_page` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `language_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `home_page`, `firstname`, `lastname`, `remember_token`, `is_admin`, `active`, `language_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'wasp', 'admin@abillander.com', '$2y$10$b3bC4GwpaXr2Si/.jFHp.O/NTw1mGop/jv8ECybAYCbsxuI/5qamu', '/', 'Lara', 'Billander', 'jAfBZaqB4SKbBojonz7bs6xAusyhuGctv7ttNdMZubSYJvQ3RKUWVqvhPmXJ', 1, 1, 1, '2018-02-07 16:42:55', '2018-02-07 16:42:55', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configurations_name_unique` (`name`);

--
-- Indices de la tabla `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `sequences`
--
ALTER TABLE `sequences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sequences_prefix_index` (`prefix`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sequences`
--
ALTER TABLE `sequences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
