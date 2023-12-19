<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Models\Employee;

class ProjectController2 extends Controller
{
    public function scraper2()
    {
        $url = 'https://moics.gov.np/en/staff';
        $client = new Client();

        $crawler = $client->request('GET', $url);
        $employees = [];
        $abc = $crawler->filter('.iins')->each(function($employee) use (&$employees){
            $temp_employee = [];
           $temp_employee["profile_pic"] = $employee->filter('.profile-img')->children()->attr('src');
           $temp_employee["name"] = $employee->filter('.name')->text();
           $temp_employee["position"] = $employee->filter('.position')->text();
           $employees[] = $temp_employee;
            // $email = $employee->filter('.email-s')->text()?? "N/A";
            // dd($employees);
        });
        // dd($employees);

        foreach($employees as $key => $employee){

            Employee::create([
                "staff_name" => $employee["name"] ?? "N/A", 
                "designation" => $employee["position"] ?? "N/A", 
                "phone" => $employee["phone"] ?? "N/A", 
                "email" => $employee["email"] ?? "N/A",
                "profile_pic" => $employee["profile_pic"] ?? "N/A"
            ]);

        }

        // $crawler->filter('.single-profile')->each(function ($profile) {
        //     $name = $profile->filter('.name')->text();
        //     $position = $profile->filter('.position')->text();
        //     $email = $profile->filter('.email-s')->text();
        //     $imageSrc = $profile->filter('.profile-img img')->attr('src');

        //     // Extract the staff ID from the "View More" link
        //     $viewMoreLink = $profile->filter('.view-detail')->attr('href');
        //     preg_match('/\/(\d+)$/', $viewMoreLink, $matches);
        //     $staffId = $matches[1] ?? 'NA';

        //     // Create or update the Employee model
        //     $employee = Employee::create([
        //         "staff_name" => $name ?? "N/A",
        //         "designation" => $position ?? "N/A",
        //         "email" => $email ?? "N/A",
        //         "image_url" => $imageSrc ?? "no-image",
        //     ]);
        // });
    }
}
