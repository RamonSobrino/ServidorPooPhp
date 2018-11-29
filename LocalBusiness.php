<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 27/11/2018
 * Time: 23:38
 */
require_once ('persistencia.php');


class LocalBusiness
{
    public $context, $type, $address, $description, $name, $telephone, $url, $openingHours, $id;

    function __construct($object)
    {
        $this->context = "http://schema.org";
        $this->type = "LocalBusiness";
        $this->address = $object->address;
        $this->description = $object->description;
        $this->name = $object->name;
        $this->telephone = $object->telephone;
        $this->url = $object->url;
        $this->openingHours = $object->openingHours;
        $this->id = $object->id;
    }
    function actualizarParentesis($object)
    {
        if($object["address"] != null)
            $this->address = $object["address"];
        if($object["description"] != null)
            $this->description = $object["description"];
        if($object["name"] != null)
            $this->name = $object["name"];
        if($object["name"] != null)
            $this->telephone = $object["name"];
        if($object["url"] != null)
            $this->url = $object["url"];
        if($object["openingHours"] != null)
            $this->openingHours = $object["openingHours"];

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
        if($object->address != null)
            $this->url = $object->url;
        if($object->openning_hours != null)
            $this->openingHours = $object->openingHours;

    }

    function get_opening_hours(){

    }

    function toHTML() {
        return '<section> <h3> Tipo LocalBussines: </h3> ' .
            '<p> ' . 'Id: ' . $this->id . '</p>' .
            '<p> ' . "@Context: " . $this->context . '</p>' .
            '<p> ' . '@Context: ' . $this->type . '</p>' .
            '<p> ' . 'Name: ' . $this->name . '</p>' .
            '<p> ' . 'Adress: ' . $this->address . '</p>' .
            '<p> ' . 'Description: ' . $this->description . '</p>' .
            '<p> ' . 'Telephone: ' . $this->telephone . '</p>' .
            '<p> ' . 'Url: ' . $this->url . '</p>' .
            '<p> ' . 'OpenningHours: ' . implode(" , ",$this->openingHours) . '</p>' .
            '</section>';
    }


    function   toText() {
        return 'LocalBusiness: \n' .
            '\t- ' . 'Id: ' . $this->id . '\n ' .
            '\t- ' . '@Context: ' . $this->context . '\n ' .
            '\t- ' . '@Type: ' . $this->type . ' \n' .
            '\t- ' . 'Name: ' . $this->name . '\n' .
            '\t- ' . 'Adress: ' . $this->address . '\n' .
            '\t- ' . 'Description: ' . $this->description . '\n' .
            '\t- ' . 'Telephone: ' . $this->telephone . '\n' .
            '\t- ' . 'Url: ' . $this->url . '\n' .
            '\t- ' . 'OpenningHours: ' . implode(" , ",$this->openingHours). '\n' .
            '\n';
    }


    function toXML() {
        return '<LocalBusiness> ' .
            '<Id>' . $this->id . '</Id>' .
            '<@Context>' . $this->context . '</@Context>' .
            '<@Type> ' . $this->type . '</@Type>' .
            '<Name>' . $this->name . '</Name>' .
            '<Adress> ' . $this->address . '</Adress>' .
            '<Description> ' . $this->description . '</Description>' .
            '<Telephone> ' . $this->telephone . '</Telephone>' .
            '<Url> ' . $this->url . '</Url>' .
            '<OpenningHours> ' .implode(" , ",$this->openingHours) . '</OpenningHours>' .
            '</LocalBusiness>';
    }

    function toJSON(){
        /*return "\n{\n".
            "@context: ". $this->context . ",\n".
            "@type: ". $this->type . ",\n".
            "name: ". $this->name . ",\n".
            "description: ". $this->description . ",\n".
            "telephone: ". $this->telephone . ",\n".
            "openingHours: [\n ". implode(" ,\n ",$this->openingHours) . "],\n".
            "}\n";*/

        $string = json_encode($this);
        $string2 = str_replace("type","@type", $string);
        $string3 = str_replace("context","@context", $string2);
        return $string3;
    }

}