<?php
/**
 * File: delivery_palpo/public/inc/delivery_palpo_crear_datos
 *
 */

defined( 'ABSPATH' ) || die();
/**
 * Inserta datos en la tabla zonaEnvio si esta vacia
 *
 * @return void
 */
function delivery_palpo_crear_datos() {
    global $wpdb;
    $tabla_zonaEnvio          = $wpdb->prefix . 'zonaEnvio';
    if ( $wpdb->get_var( "SELECT COUNT(*) FROM `{$wpdb->prefix}zonaEnvio`" ) === 0 ) {
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>1,
                'zona_id'           =>2,
                'descripcionorte'   =>'USAQUEN',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>2,
                'zona_id'           =>2,
                'descripcionorte'   =>'SUBA',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>3,
                'zona_id'           =>3,
                'descripcionorte'   =>'CHAPINERO',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>4,
                'zona_id'           =>3,
                'descripcionorte'   =>'BARRIOS UNIDOS',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>5,
                'zona_id'           =>3,
                'descripcionorte'   =>'TEUSAQUILIO',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>6,
                'zona_id'           =>4,
                'descripcionorte'   =>'ENGATIVA',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>7,
                'zona_id'           =>4,
                'descripcionorte'   =>'FONTIBON',
                'costo'             =>0,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>8,
                'zona_id'           =>5,
                'descripcionorte'   =>'LOS MARTIRES',
                'costo'             =>1000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>9,
                'zona_id'           =>5,
                'descripcionorte'   =>'LA CANDELARIA',
                'costo'             =>1000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>10,
                'zona_id'           =>5,
                'descripcionorte'   =>'ANTONIO NARIÑO',
                'costo'             =>1000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>11,
                'zona_id'           =>6,
                'descripcionorte'   =>'KENNEDY',
                'costo'             =>2000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>12,
                'zona_id'           =>6,
                'descripcionorte'   =>'PUENTE ARANDA',
                'costo'             =>2000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>13,
                'zona_id'           =>7,
                'descripcionorte'   =>'SAN CRISTOBAL',
                'costo'             =>3000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>14,
                'zona_id'           =>7,
                'descripcionorte'   =>'USME',
                'costo'             =>3000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>15,
                'zona_id'           =>8,
                'descripcionorte'   =>'BOSA',
                'costo'             =>3000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>16,
                'zona_id'           =>8,
                'descripcionorte'   =>'TUNJUELITO',
                'costo'             =>3000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>17,
                'zona_id'           =>9,
                'descripcionorte'   =>'RAFAEL URIBE',
                'costo'             =>3000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>18,
                'zona_id'           =>8,
                'descripcionorte'   =>'CIUDAD BOLIVAR',
                'costo'             =>3000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>19,
                'zona_id'           =>9,
                'descripcionorte'   =>'CHIA',
                'costo'             =>1500,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>20,
                'zona_id'           =>9,
                'descripcionorte'   =>'CAJICA',
                'costo'             =>1500,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>21,
                'zona_id'           =>10,
                'descripcionorte'   =>'TENJO',
                'costo'             =>2000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>22,
                'zona_id'           =>9,
                'descripcionorte'   =>'COTA',
                'costo'             =>1500,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>23,
                'zona_id'           =>10,
                'descripcionorte'   =>'MADRID',
                'costo'             =>2000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>24,
                'zona_id'           =>10,
                'descripcionorte'   =>'MOSQUERA',
                'costo'             =>2000,
            )
        ); // db call ok; no-cache ok.
        $wpdb->insert(
            $tabla_zonaEnvio,
            array(
                'id'                =>25,
                'zona_id'           =>10,
                'descripcionorte'   =>'FUNZA',
                'costo'             =>2000,
            )
        ); // db call ok; no-cache ok.
    }
}