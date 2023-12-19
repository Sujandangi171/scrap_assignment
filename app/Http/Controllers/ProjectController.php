<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Models\Employee;

class ProjectController extends Controller
{
    public function scraper(){

        $url="https://moics.gov.np/en/staff";
        $client = new client();
        $crawler = $client -> request('GET',$url);

        $table = $crawler->filter('.table-striped');

        $data=[];
        $table->filter('tbody tr')->each(function ($row) use (&$data){
            $rowdata=[];
            $row->filter('td')->each(function ($column) use (&$rowData) {
                $rowData[] = $column->text();
            });
            $data[] = $rowData;
        });

        if(!empty($data)) {
            foreach($data as $abc) {
            $employee = Employee::create([
                "staff_name" => $abc[1] ?? "N/A", 
                "designation" => $abc[2] ?? "N/A", 
                "phone" => $abc[3] ?? "N/A", 
                "email" => $abc[4] ?? "N/A"
            ]);
        }

    }
}
}
