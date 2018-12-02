<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 27/11/2018
 * Time: 23:59
 */
require_once ('LocalBusiness.php');

class FoodEstablishment extends LocalBusiness
{
    public $servesCuisine, $acceptsReservations;
    /**
     * FoodEstablishment constructor.
     * @param $object
     */
    function __construct($object)
    {
        parent::__construct($object);
        $this->type = "FoodEstablishment";
        if(is_array( $object->servesCuisine)) {
            $this->servesCuisine = $object->servesCuisine;
        }else{
            $this->servesCuisine= [];
            $this->servesCuisine[] = $object->servesCuisine;
        }
        $this->acceptsReservations = $object->acceptsReservations;

    }


    function actualizar($object)
    {
        if($object->address != null)
            $this->address = $object->address;
        if($object->description != null)
            $this->description = $object->description;
        if($object->name != null)
            $this->name = $object->name;
        if($object->telephone != null)
            $this->telephone = $object->telephone;
        if($object->url != null)
            $this->url = $object->url;
        if($object->openingHours != null)
            $this->openingHours = $object->openingHours;
        if($object->servesCuisine != null)
            $this->servesCuisine = $object->servesCuisine;
        if($object->acceptsReservations != null)
            $this->acceptsReservations = $object->acceptsReservations;

    }

    function toHTML() {
        return '<section> <h3> Tipo FoodEstablishment: </h3> ' .
            '<p> ' . 'Id: ' . $this->id . '</p>' .
            '<p> ' . "@Context: " . $this->context . '</p>' .
            '<p> ' . '@Type: ' . $this->type . '</p>' .
            '<p> ' . 'Name: ' . $this->name . '</p>' .
            '<p> ' . 'Adress: ' . $this->address . '</p>' .
            '<p> ' . 'Description: ' . $this->description . '</p>' .
            '<p> ' . 'Telephone: ' . $this->telephone . '</p>' .
            '<p> ' . 'Url: ' . $this->url . '</p>' .
            '<p> ' . 'OpeningHours: ' . implode(" , ",$this->openingHours) . '</p>' .
            '<p> ' . 'ServerCuisine: ' . implode( " , ",$this->servesCuisine) . '</p>' .
            '<p> ' . 'AcceptsReservation: ' . $this->acceptsReservations . '</p>' .
            '</section>';
    }


    function   toText() {
        return 'FoodEstablishment: \n' .
            '\t- ' . 'Id: ' . $this->id . '\n ' .
            '\t- ' . '@Context: ' . $this->context . '\n ' .
            '\t- ' . '@Type: ' . $this->type . ' \n' .
            '\t- ' . 'Name: ' . $this->name . '\n' .
            '\t- ' . 'Adress: ' . $this->address . '\n' .
            '\t- ' . 'Description: ' . $this->description . '\n' .
            '\t- ' . 'Telephone: ' . $this->telephone . '\n' .
            '\t- ' . 'Url: ' . $this->url . '\n' .
            '\t- ' . 'OpeningHours: ' . implode(" , ",$this->openingHours) . '\n' .
            '\t- ' . 'ServerCuisine: ' . implode(" , ", $this->servesCuisine) . '\n' .
            '\t- ' . 'AcceptsReservation: ' . $this->acceptsReservations . '\n' .
            '\n';
    }


    function toXML() {
        return '<FoodEstablishment> ' .
            '<Id>' . $this->id . '</Id>' .
            '<@Context>' . $this->context . '</@Context>' .
            '<@Type>' . $this->type . '</@Type>' .
            '<Name>' . $this->name . '</Name>' .
            '<Adress> ' . $this->address . '</Adress>' .
            '<Description> ' . $this->description . '</Description>' .
            '<Telephone> ' . $this->telephone . '</Telephone>' .
            '<Url> ' . $this->url . '</Url>' .
            '<OpeningHours> ' . implode(" , ",$this->openingHours) . '</OpeningHours>' .
            '<ServerCuisine> ' . implode(" , ",$this->servesCuisine) . '</ServerCuisine>' .
            '<AcceptsReservation> ' . $this->acceptsReservations . '</AcceptsReservation>' .
            '</FoodEstablishment>';
    }

}