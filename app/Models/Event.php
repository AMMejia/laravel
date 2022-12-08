<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Relationship Belongs To Address
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'start',
        'color',
        'draggable',
        'resizable',
        'products',
        'salon',
        'cliente',
        'gte_de_gpos',
        'pax',
        'montaje',
        'notas',
        'equipment',
        'operation',
        'entertainment',
        'subtotal',
        'final',
        'iva',
        'total',
        'costo_unitario',
        'flete',
        'mano_de_obra',
        'hotel',
        'comision',
        'comisionFinal',
        'coordinacion',
        'ctoOperacion',
        'entretenimiento',
        'finalDlrs',
        'group',
        'ivaDlrs',
        'ivaFinal',
        'mn',
        'proveedores',
        'subEntretainment',
        'subEquipment',
        'subOperacion',
        'subTotalDlrs',
        'subtotalFinal',
        'totalDlrs',
        'totalIvaFinal',
        'utilidad',
        'workforce',
        'cambio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getColorAttribute($value)
    {
        return json_decode($value);
    }

     /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getResizableAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getProductsAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getStartAttribute($value)
    {
        $dt = Carbon::createFromDate($value);
        return $dt->toISOString(); 
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getEquipmentAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getOperationAttribute($value)
    {
        return floatval($value);
    }

     /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getEntertainmentAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getSubtotalAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getFinalAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getIvaAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getTotalAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Costo Unitario Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getCostoUnitarioAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Costo Unitario Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getFleteAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Costo Unitario Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getManoDeObraAttribute($value)
    {
        return floatval($value);
    }

     /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getWorkforceAttribute($value)
    {
        return json_decode($value);
    }

     /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getCoordinacionAttribute($value)
    {
        return json_decode($value);
    }

     /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getEntretenimientoAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Value Attribute
     *
     * @param  string  $value
     * @return json
     */
    public function getProveedoresAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Costo Unitario Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getMnAttribute($value)
    {
        return floatval($value);
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['finalDlrs'] = $this->finalDlrs;
        $toArray['ivaDlrs'] = $this->ivaDlrs;
        $toArray['ivaFinal'] = $this->ivaFinal;
        $toArray['subEntretainment'] = $this->subEntretainment;
        $toArray['subEquipment'] = $this->subEquipment;
        $toArray['subOperacion'] = $this->subOperacion;
        $toArray['subTotalDlrs'] = $this->subTotalDlrs;
        $toArray['subtotalFinal'] = $this->subtotalFinal;
        $toArray['totalDlrs'] = $this->totalDlrs;
        $toArray['totalIvaFinal'] = $this->totalIvaFinal;
        return $toArray;
    }

    public function getFinalDlrsAttribute($value)
    {
        return floatval($value);
    }

    public function getIvaDlrsAttribute($value)
    {
        return floatval($value);
    }

    public function getSubEntretainmentAttribute($value)
    {
        return floatval($value);
    }

    public function getSubEquipmentAttribute($value)
    {
        return floatval($value);
    }

    public function getSubOperacionAttribute($value)
    {
        return floatval($value);
    }

    public function getSubTotalDlrsAttribute($value)
    {
        return floatval($value);
    }

    public function getSubtotalFinalAttribute($value)
    {
        return floatval($value);
    }

    public function getTotalDlrsAttribute($value)
    {
        return floatval($value);
    }

    public function getIvaFinalAttribute($value)
    {
        return floatval($value);
    }

    public function getTotalIvaFinalAttribute($value)
    {
        return floatval($value);
    }

    
    public function getUtilidadAttribute($value)
    {
        return floatval($value);
    }

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getCambioAttribute($value)
    {
        return floatval($value);
    }
}
