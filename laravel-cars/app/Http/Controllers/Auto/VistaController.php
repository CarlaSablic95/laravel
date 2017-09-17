<?php

namespace App\Http\Controllers\Auto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VistaController extends Controller
{
    public function vistaDelAuto($id, $titulo)
    {
        $data['car']=DB::table('autos as a')
            ->join('provincias as pro','pro.id','=','a.id_provincia')
            ->join('departamentos as dep','dep.id','=','a.id_ciudad')
            ->join('localidades as loc','loc.id','=','a.id_barrio')
            ->join('marcas as mar','mar.id','=','a.id_marca')
            ->join('modelos as mod','mod.id','=','a.id_modelo')
            ->join('users as use','use.id','=','a.id_usuario')
            ->select('a.id','a.titulo','a.descripcion','pro.nombre as provincia','dep.nombre as ciudad',
                'loc.nombre as barrio','a.telefono','a.anio','a.puertas','a.combustible','a.km','a.color',
                'a.direccion','a.transmision','a.duenio','a.version','a.precio','mar.marca',
                'mod.modelo','use.nombre as usuario','use.apellido')
            ->where('a.id',$id)
            ->get();

        $data['sonido']=DB::table('detalle_sonido as so')
            ->join('autos as a','a.id','=','so.id_autos')
            ->select('so.am_fm','so.bluetooth','so.caja_cd','so.cargador_cd','so.cd','so.comando_satelital_stereo',
                'so.dvd','so.entrada_auxiliar','so.entrada_usb','so.mp3','so.pasacasete','so.tarjeta_sd')
            ->where('a.id',$id)
            ->get();

        $data['exterior']=DB::table('detalle_exterior as ex')
            ->join('autos as a','a.id','=','ex.id_autos')
            ->select('ex.limpia_lava_luneta','ex.llantas_aleacion','ex.paragolpes_pintados','ex.vidrios_polarizados')
            ->where('a.id',$id)
            ->get();

        $data['confort']=DB::table('detalle_confort as co')
            ->join('autos as a','a.id','=','co.id_autos')
            ->select('co.aire_acondicionado','co.alarma_luces_encendidas','co.apertura_remota_baul',
                'co.asiento_conductor_regulable_altura','co.asiento_trasero_rebatible','co.asientos_electronicos',
                'co.cierre_centralizado_puertas','co.climatizador_automatico','co.computadora_abordo',
                'co.control_velocidad_crucero','co.cristales_electricos','co.espejos_electricos',
                'co.faros_regulables_interior','co.gps','co.sensor_estacionamiento','co.sensor_lluvia',
                'co.sensor_luz','co.tapizado_cuero')
            ->where('a.id',$id)
            ->get();

        $data['seguridad']=DB::table('detalle_seguridad as se')
            ->join('autos as a','a.id','=','se.id_autos')
            ->select('se.airbag_conductor','se.airbag_cortina','se.airbag_laterales','se.alarma',
                'se.apoya_cabeza','se.blindado','se.control_estabilidad','se.control_traccion','se.doble_traccion',
                'se.faros_delanteros','se.faros_traseros','se.faros_xenon','se.frenos_abs','se.inmobilizador_motor',
                'se.isofix','se.repartidor_electronico','se.tercer_stop')
            ->where('a.id',$id)
            ->get();

        $data['img_cars']=DB::table('img_autos as img')
            ->join('autos as a','a.id','=','img.id_autos')
            ->select('img.imagen1','img.imagen2','img.imagen3','img.imagen4','img.imagen5','img.imagen6','img.imagen7')
            ->where('a.id',$id)
            ->get();

        return view('auto.vista_auto',$data);
    }

    public function telefono($id, $titulo)
    {
        $telefono=DB::table('autos')
            ->select('telefono')
            ->where('id',$id)
            ->get();
        sleep(1);
        return response()->json($telefono);
    }
}
