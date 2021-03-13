<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use jonmadval\LaravelWubook\Facades\WuBook;

class IndexController extends Controller
{
    public function hook()
    {
        WuBook::auth()->acquire_token();

        $bookings = WuBook::reservations()->fetch_new_bookings(1430902629, 1)['data'];

        $this->dispatch($bookings);
    }

    public function dispatch($bookings = null)
    {
        if(count($bookings) > 0) {

            foreach ($bookings as $booking) {

                $data[] = self::buildData($booking);
            }

            if($data)
                self::curl($data);
        }
    }

    private static function curl($data)
    {
        if( $curl = curl_init() ) {
            curl_setopt($curl, CURLOPT_URL, 'https://hub.integrat.pro/api/otelbp/wubook/amocrm/server.php');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

            $out = curl_exec($curl);

            curl_close($curl);
        }
    }

    private static function buildData($array)
    {
        $data = [
            "reservation_code" => $array['reservation_code'],
            "arrival_hour" => $array['arrival_hour'],
            "customer_mail" => $array['customer_mail'],
            "currency" => $array['currency'],
            "booked_rate" => $array['booked_rate'],
            "rooms" => $array['rooms'],
            "children" => $array['children'],
            "customer_surname" => $array['customer_surname'],
            "date_received_time" => $array['date_received_time'],
            "date_departure" => $array['date_departure'],
            "date_received" => $array['date_received'],
            "customer_name" => $array['customer_name'],
            "date_arrival" => $array['date_arrival'],
            "customer_phone" => $array['customer_phone'],
            "orig_amount" => $array['orig_amount'],
            "customer_notes" => $array['customer_notes'],
            "customer_address" => $array['customer_address'],
            "roomnight" => $array['roomnight'],
            "amount" => $array['amount'],
        ];

        return $data;
    }
}
