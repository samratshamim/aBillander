<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Configuration Keys Language Lines :: Español
	|--------------------------------------------------------------------------
	|
	*/

	'Settings' => 'Configuración',
	'My Company' => 'Mi Empresa',
	'ALLOW_PRODUCT_SUBCATEGORIES.name' => 'Permitir Subcategorías de Productos',
	'ALLOW_PRODUCT_SUBCATEGORIES.help' => '1 : Permitir subcategorías. Los productos se asocian entonces a subcategorías. <br />0 : Los productos se asocian a categorías. <br />NOTA: las subcategorías son "Categorías-hijas".',
	'ALLOW_SALES_RISK_EXCEEDED.name' => 'Permitir ventas a Clientes con el Riesgo excedido',
	'ALLOW_SALES_RISK_EXCEEDED.help' => '',
	'ALLOW_SALES_WITHOUT_STOCK.name' => 'Permitir Ventas sin Stock',
	'ALLOW_SALES_WITHOUT_STOCK.help' => '',
	'CUSTOMER_ORDERS_NEED_VALIDATION.name' => 'Los Pedidos de Clientes necesitan Validación',
	'CUSTOMER_ORDERS_NEED_VALIDATION.help' => 'Sólo los Pedidos de Clientes que han sido validados podrán enviarse y facturarse.<br />1: Los Pedidos de Clientes se crearán con Estado = "<strong>draft</strong>".<br />0: Los Pedidos de Clientes se crearán con Estado = "<strong>confirmed</strong>".',
	'ENABLE_COMBINATIONS.name' => 'Activar Combinaciones',
	'ENABLE_COMBINATIONS.help' => 'Permitir crear Productos con Combinaciones.',
	'ENABLE_WEBSHOP_CONNECTOR.name' => 'Activar enlace con la Tienda online.',
	'ENABLE_WEBSHOP_CONNECTOR.help' => 'Para que el enlace funcione correctamente, puede ser necesario algún "package". adicional.',
	'MARGIN_METHOD.name' => 'Método para calcular el Margen',
	'MARGIN_METHOD.option.CST' => '<strong>CST</strong>: Sobre el Precio de Coste<br />Margen = (Precio de Venta - Precio de Coste) / Precio de Coste X 100',
	'MARGIN_METHOD.option.PRC' => '<strong>PRC</strong>: Sobre el Precio de Venta<br />Margen = (Precio de Venta - Precio de Coste) / Precio de Venta X 100',
	'MARGIN_METHOD.help' => '',
	'NEW_PRICE_LIST_POPULATE.name' => 'Añadir Productos a una nueva Tarifa',
	'NEW_PRICE_LIST_POPULATE.help' => '1: Cuando se crea una nueva Tarifa, todos los Productos se añaden. El Precio se calcula según el Tipo de Tarifa.<br />0: Los Productos deberán añadirse manualmente a la nueva Tarifa.',
	'NEW_PRODUCT_TO_ALL_PRICELISTS.name' => 'Añadir un nuevo Producto a todas las Tarifas',
	'NEW_PRODUCT_TO_ALL_PRICELISTS.help' => '1: Los nuevos Productos se añaden a todas las Tarifas. El Precio se calcula según el Tipo de Tarifa.<br />0: Los nuevos Productos deberán añadirse manualmente a las Tarifas.',
	'PRICES_ENTERED_WITH_TAX.name' => 'Los Precios se introducen con IVA incluido',
	'PRICES_ENTERED_WITH_TAX.help' => 'Cambiar esta opción no actualizará los Productos existentes.',
	'PRODUCT_NOT_IN_PRICELIST.name' => 'Si un Producto no está en una tarifa',
	'PRODUCT_NOT_IN_PRICELIST.option.block' => '<strong>block</strong>: No permitir ventas',
	'PRODUCT_NOT_IN_PRICELIST.option.pricelist' => '<strong>pricelist</strong>: Calcular el Precio según el Tipo de tarifa',
	'PRODUCT_NOT_IN_PRICELIST.option.product' => '<strong>product</strong>: Tomar el Precio por defecto de los datos del Producto',
	'PRODUCT_NOT_IN_PRICELIST.help' => '',
	'QUOTES_EXPIRE_AFTER.name' => 'Un presupuesto expira después de',
	'QUOTES_EXPIRE_AFTER.help' => 'Días',
	'ROUND_PRICES_WITH_TAX.name' => 'Redondear Precios con el Impuesto incluido',
	'ROUND_PRICES_WITH_TAX.help' => '<p>Redondear los Precios en Facturas con el Impuesto incluido. El número de decimales resultante es el que corresponda a la Divisa del Precio.</p><p>Valores:</p><ul>	<li>	<p><strong>Sí</strong><br />	1.- Redondear el Precio con el Impuesto incluido.<br />	2.- Calcular y redondear el Precio sin el Impuesto.<br />	3.- El Impuesto se calcula por diferencia (no es necesario redondeo).</p>	</li>	<li>	<p><strong>No</strong><br />	1.- Redondear el Precio sin el Impuesto.<br />	2.- Calcular y redondear el Precio con el Impuesto incluido.<br />	3.- El Impuesto se calcula por diferencia (no es necesario redondeo).</p>	</li></ul>',
	'SKU_AUTOGENERATE.name' => 'Generar un valor para el campo "Referencia" (SKU) del Producto',
	'SKU_AUTOGENERATE.help' => 'Generar automáticamente un valor secuencial para el campo "Referencia" (SKU) del Producto si no se introduce ninguno.',
	'TAX_BASED_ON_SHIPPING_ADDRESS.name' => 'Los Impuestos se calculan según',
	'TAX_BASED_ON_SHIPPING_ADDRESS.option.1' => 'La Dirección de Envío',
	'TAX_BASED_ON_SHIPPING_ADDRESS.option.0' => 'La Dirección de Facturación',
	'TAX_BASED_ON_SHIPPING_ADDRESS.help' => '',
	'Default Values' => 'Valores por Defecto',
	'DEF_CARRIER.name' => 'Transportista',
	'DEF_CARRIER.help' => '',
	'DEF_COMPANY.name' => 'Empresa',
	'DEF_COMPANY.help' => '',
	'DEF_COUNTRY.name' => 'País',
	'DEF_COUNTRY.help' => '',
	'DEF_CURRENCY.name' => 'Divisa',
	'DEF_CURRENCY.help' => 'Moneda por defecto.',
	'DEF_CUSTOMER_INVOICE_SEQUENCE.name' => 'Serie de Facturas para Clientes',
	'DEF_CUSTOMER_INVOICE_SEQUENCE.help' => '',
	'DEF_CUSTOMER_INVOICE_TEMPLATE.name' => 'Plantilla de Facturas para Clientes',
	'DEF_CUSTOMER_INVOICE_TEMPLATE.help' => '',
	'DEF_CUSTOMER_PAYMENT_METHOD.name' => 'Forma de Pago para Clientes',
	'DEF_CUSTOMER_PAYMENT_METHOD.help' => '',
	'DEF_LANGUAGE.name' => 'Idioma',
	'DEF_LANGUAGE.help' => '',
	'DEF_MEASURE_UNIT_FOR_BOMS.name' => 'Unidad de Medida para BOMs',
	'DEF_MEASURE_UNIT_FOR_BOMS.help' => 'Unidad de Medida pordefecto para Listas de Materiales.',
	'DEF_MEASURE_UNIT_FOR_PRODUCTS.name' => 'Unidad de Medida para Productos',
	'DEF_MEASURE_UNIT_FOR_PRODUCTS.help' => 'Unidad de Medida pordefecto para Productos y Combinaciones.',
	'DEF_OUTSTANDING_AMOUNT.name' => 'Riesgo Máximo',
	'DEF_OUTSTANDING_AMOUNT.help' => 'Riesgo Máximo permitido para un Cliente. Use el punto "." para separar los decimales.',
	'DEF_TAX.name' => 'Tipo de Impuesto',
	'DEF_TAX.help' => 'Tipo de Impuesto pordefecto para Productos y Combinaciones.',
	'DEF_WAREHOUSE.name' => 'Almacén',
	'DEF_WAREHOUSE.help' => '',
	'Other' => 'Otros',
	'DEF_ITEMS_PERAJAX.name' => 'Items por consulta Ajax',
	'DEF_ITEMS_PERAJAX.help' => 'Número de items (máximo) devuelto por una consulta Ajax.',
	'DEF_ITEMS_PERPAGE.name' => 'Items por página',
	'DEF_ITEMS_PERPAGE.help' => 'Número de items (máximo) para resultados paginados.',
	'DEF_LOGS_PERPAGE.name' => 'Registros del log por página',
	'DEF_LOGS_PERPAGE.help' => 'Número de registros del log (máximo) para resultados paginados.',
	'DEF_PERCENT_DECIMALS.name' => 'Decimales en Porcentajes',
	'DEF_PERCENT_DECIMALS.help' => 'Número de decimales para porcentajes.',
	'DEF_QUANTITY_DECIMALS.name' => 'Decimales en Cantidades',
	'DEF_QUANTITY_DECIMALS.help' => 'Número de decimales para cantidades (stock, etc.).',
	'TIMEZONE.name' => 'Zona Horaria',
	'TIMEZONE.help' => 'Zona horaria admitida por PHP.',
	'USE_CUSTOM_THEME.name' => 'Usar Tema presonalizado',
	'USE_CUSTOM_THEME.help' => 'El Tema personalizado está en la carpeta <i>/resources/theme/</i>.',
	'Auto-SKU' => 'Auto-SKU',
	'SKU_PREFIX_LENGTH.name' => 'Prefijo',
	'SKU_PREFIX_LENGTH.help' => 'Se toma el ID del Producto. Si tiene una longitud (número de cifras) menor que este valor, se rellena con ceros por la izquierda hasta esta longitud.',
	'SKU_PREFIX_OFFSET.name' => 'Offset',
	'SKU_PREFIX_OFFSET.help' => 'Este valor se sumará al ID del Producto. Así se evitan valores de SKU demasiado cortos.',
	'SKU_SEPARATOR.name' => 'Separador',
	'SKU_SEPARATOR.help' => 'Este campo se colocará entre el prefijo y el sufijo.',
	'SKU_SUFFIX_LENGTH.name' => 'Sufijo',
	'SKU_SUFFIX_LENGTH.help' => 'Se toma el ID de la Combinación. Si tiene una longitud (número de cifras) menor que este valor, se rellena con ceros por la izquierda hasta esta longitud.',
	'Auto-SKU.help' => '<blockquote><p>Ejemplo:</p><p>SKU_PREFIX_LENGTH = 6</p><p>SKU_PREFIX_OFFSET = 10000</p><p>SKU_SUFFIX_LENGTH = 3</p><p>SKU_SEPARATOR = "-" (sin comillas)</p><p>ID de Producto = 323</p><p>ID de Combinación = 12</p><p><strong>SKU</strong> = 010323-012</p><p>Si SKU_SUFFIX_LENGTH = 1, entonces <strong>SKU</strong> = 010323-12.</p><p>Si no es una Combinación (ID de Combinación = 0), entonces <strong>SKU</strong> = 010323.</p></blockquote>',
	'All Keys' => 'Todas las Claves',
	'Configuration Keys' => 'Claves de Configuración',
	'Back to Configurations' => 'Volver a Configuración',
	'Date Updated' => 'Actualizado',
	'Configuration Keys - Create' => 'Claves de Configuración - Crear',
	'New Configuration Key' => 'Nueva Clave de Configuración',
	'Name' => 'Nombre',
	'Value' => 'Valor',
	'Description' => 'Descripción',
	'Configuration Keys - Edit' => 'Claves de Configuración - Modificar',
	'Edit Configuration Key' => 'Modificar Clave de Configuración',


];
