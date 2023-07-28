<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class GetCountry extends Component
{
    public $zip_code;
    public $country_details = [];

    public function render()
    {
        return view('livewire.get-country');
    }

    public function updated($property){
        if($property == 'zip_code'){
            //get address from zip code
            $client = new Client(['base_uri' => 'https://api.zippopotam.us/']);
                try {
                    $response = $client->request('GET', 'US/'.$this->zip_code);
                    $data = json_decode($response->getBody(), true);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                if(isset($data)){
                    $this->country_details['country'] = $data['country'] ? $data['country'] : '';
                    $this->country_details['country_abbr'] = $data['country abbreviation'] ? $data['country abbreviation'] : '';
                    $this->country_details['state'] = $data['places'][0]['state'] ? $data['places'][0]['state'] : '';
                    $this->country_details['state_abbr'] = $data['places'][0]['state abbreviation'] ? $data['places'][0]['state abbreviation'] : '';
                    $this->country_details['address'] = $data['places'][0]['place name'] ? $data['places'][0]['place name'] : '';
                }
                else{
                    $this->country_details['country'] = '';
                    $this->country_details['country_abbr'] = '';
                    $this->country_details['state'] = '';
                    $this->country_details['state_abbr'] = '';
                    $this->country_details['address'] = '';
                }
            }
    }
}
