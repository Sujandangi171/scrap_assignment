<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController2 extends Controller
{
    public function scraper2()
    {
        $url = 'https://moics.gov.np/en/staff';
        $client = new Client();

        $crawler = $client->request('GET', $url);

        $crawler->filter('.single-profile')->each(function ($profile) {
            $name = $profile->filter('.name')->text();
            $position = $profile->filter('.position')->text();
            $email = $profile->filter('.email-s')->text();
            $imageSrc = $profile->filter('.profile-img img')->attr('src');

            // Extract the staff ID from the "View More" link
            $viewMoreLink = $profile->filter('.view-detail')->attr('href');
            preg_match('/\/(\d+)$/', $viewMoreLink, $matches);
            $staffId = $matches[1] ?? 'NA';

            // Create or update the Employee model
            $employee = Employee::create([
                "staff_name" => $name ?? "N/A",
                "designation" => $position ?? "N/A",
                "email" => $email ?? "N/A",
                "image_url" => $imageSrc ?? "no-image",
            ]);
        });
    }
}
