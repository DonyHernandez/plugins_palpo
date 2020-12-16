<?php
/**
 * Plugin Name:       PalpoDeliveryPlugin
 * Description:       Calculo de precio dependiendo del lugar y tiempo de entrega
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            PalpoDeliveryPlugin
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       PalpoDeliveryPlugin
 * Domain Path:       /languages
 */

// define('ABSPATH') or die;


register_activation_hook(__FILE__, 'Delivery_palpo_init');
// register_deactivation_hook(__FILE__, 'remove_Delivery_palpo_init');



function Delivery_palpo_init()
{
    global $wpdb;
    $tabla_zonaEnvio = $wpdb->prefix . 'zonaEnvio';
    $charset_collate = $wpdb->get_charset_collate();
    // Prepara la consulta que vamos a lanzar para crear la tabla_zonaEnvio
    $query = "CREATE TABLE IF NOT EXISTS $tabla_zonaEnvio(
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    zona_id integer(2) NOT NULL,
    descripcionorte varchar(50) NOT NULL,
    costo float(6.2) NOT NULL,
    UNIQUE(id)
) $charset_collate";
include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);

    $tabla_palpodelivery = $wpdb->prefix . 'palpodelivery';
    $charset_collate = $wpdb->get_charset_collate();
    // Prepara la consulta que vamos a lanzar para crear la tabla_zonaEnvio
    $query = "CREATE TABLE IF NOT EXISTS $tabla_palpodelivery(
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    fecped text (5) NOT NULL,
    fecent text (5) NOT NULL,
    express_1 float(6.2),
    express_2 float(6.2),
    express_3 float(6.2),
    express_4 float(6.2),
    express_5 float(6.2),
    select_zona float(6.2) NOT NULL,
    cosenv float(6.2) NOT NULL,
    aceptacion smallint(4) NOT NULL,
    UNIQUE(id)
) $charset_collate";
include_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($query);

     if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.js', false, '3.5.1');
        wp_enqueue_script('jquery');
    }
}
// function remove_Delivery_palpo_init(){
//     remove_Delivery_palpo('tabla_zonaEnvio');
// }
add_shortcode('delivery_palpo', 'Delivery_Palpo');

function Delivery_Palpo()
{
    global $wpdb;
    $zonaEnvios = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}zonaEnvio` ORDER BY descripcionorte");
    wp_enqueue_script(
        'js_funciones_delivery_palpo',
        plugins_url( '../public/js/funciones_delivery_palpo.js', __FILE__ ),
        'jquery',
        true,
        '1'
    );

$tabla_zonaEnvio = $wpdb->prefix . 'zonaEnvio';

if ($_post['fecped'] !=''){
    $wpdb->insert($tabla_zonaEnvio, array('fecped' => $_post['fecped']));
}

    ob_start();
?>
<form action="<?php get_the_permalink(); ?>" method="post" >
    <div>
    <label>Hora/Pedido</label>
    <!-- <input type="time" name="hora" id ="fecped" value="" max="17:00:00" min="06:00:00" step="1"> -->
    <!-- <input type="time" name="hora" id ="fecped" value="" max="05:00:00" min="06:00:00" step="1"> -->
    <input type="text" name="hora" id ="fecped" value="" max="17:00" min="06:00" step="1" required="" placeholder="06:00">

    </div>
    <!-- <input type="submit" value="enviar"> -->

    <div>
    <label>Hora/Entrega</label>
    <!-- <input type="time" name="hora" id="fecent" value="" max="22:00:00" min="09:00:00" step="1"> -->
    <!-- <input type="time" name="hora" id="fecent" value="" max="10:00:00" min="09:00:00" step="1"> -->
    <input type="text" name="hora" id="fecent" value="" max="22:00" min="09:00" step="1" required="" placeholder="22:00">
    </div>
    <br>

    <div>
    <label>
        <input type="radio" id="express_1" name="gender" value="8.000">&nbsp;Express menor de 3 horas, costo 8.000$
    </label>
    </div>

    <div>
    <label>
        <input type="radio" id="express_2" name="gender" value="3.900">&nbsp;Entre 5 y 10 horas, costo 3.900$
    </label>
    </div>

    <div>
        <label>
          <input type="radio" id="express_3" name="gender" value="2.800">&nbsp;Entre 10 y 15 horas, costo 2.800$
        </label>
    </div>

    <div>
        <label>
            <input type="radio" id="express_4" name="gender" value="1.500">&nbsp;Entre 15 y 24 horas, costo 1.500$
        </label>
    </div>

    <div>
        <label>
            <input type="radio" id="express_5" name="gender" value="0">&nbsp;Mayor a 24 horas, no tiene costo
        </label>
    </div>
    <br>
    <center>
        <label>Lugar de Entrega</label>

    <select name="zona" class="form-control" id="select_zona" required="" name="select_zona" onchange="ShowSelected();">
        <option value="">Selecciona el destino</option>
                <?php
                foreach ( $zonaEnvios as $zonaEnvio ) {
                    echo(
                        '<option value="' . esc_attr( $zonaEnvio->costo ) . '">'
                        . esc_attr( $zonaEnvio->descripcionorte ) . '</option>'
                    );
                }
                ?>
    </select>
</center>
    <br>
    <label>Costo por envio &nbsp;<input type="text" id="cosenv" name="cosenv" value=""></label>

    <input type="checkbox" name="aceptacion" id="aceptacion" value="1" required="">&nbsp;Entiendo y Acepto el Costo

<center>
    <div class="form-inline">
        <input class="btn btn-info" type="submit" value="Enviar">&nbsp;&nbsp;
    <input type="reset">
    </div>
    </center>
</form>
<?php
return ob_get_clean();
}