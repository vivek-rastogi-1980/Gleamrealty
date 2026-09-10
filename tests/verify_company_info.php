<?php
/**
 * Verification script for address, phone numbers, company name and unified fonts.
 */

$pages = [
    '/' => 'Home',
    '/property-in-vrindavan' => 'Property in Vrindavan',
    '/residential-plots-in-vrindavan' => 'Residential Plots',
    '/commercial-property-in-vrindavan' => 'Commercial Property',
    '/luxury-villas-in-vrindavan' => 'Luxury Villas',
    '/property-in-mathura' => 'Property in Mathura',
    '/plot-rate-vrindavan' => 'Plot Rate Vrindavan',
    '/plot-rate-mathura' => 'Plot Rate Mathura',
    '/flats-apartments-in-vrindavan' => 'Flats & Apartments',
    '/contact-us' => 'Contact Us',
    '/about-us' => 'About Us',
];

$baseUrl = 'http://localhost/Gleamrealty';
$allPassed = true;

echo "========================================================\n";
echo "VERIFYING ADDRESS, PHONE, COMPANY NAME & UNIFIED FONTS\n";
echo "========================================================\n\n";

foreach ($pages as $uri => $name) {
    $url = $baseUrl . $uri;
    $html = @file_get_contents($url);

    if ($html === false) {
        echo "❌ [FAILED TO FETCH] $name ($url)\n";
        $allPassed = false;
        continue;
    }

    $checks = [
        'Universal Font (Plus Jakarta Sans)' => str_contains($html, "'Plus Jakarta Sans'"),
        'Address: Flat no 10, LIG 09, Suncity Anantam Kunj, Vrindavan-281406' => str_contains($html, 'Flat no 10, LIG 09, Suncity Anantam Kunj, Vrindavan-281406'),
        'Company: GLEAMREALTY PRIVATE LIMITED' => str_contains($html, 'GLEAMREALTY PRIVATE LIMITED'),
        'Phone 1: 9871731303' => str_contains($html, '9871731303'),
        'Phone 2: 7409767452' => str_contains($html, '7409767452'),
    ];

    echo "Testing: $name ($uri)\n";
    foreach ($checks as $label => $pass) {
        if ($pass) {
            echo "  ✅ $label\n";
        } else {
            echo "  ❌ $label\n";
            $allPassed = false;
        }
    }
    echo "\n";
}

if ($allPassed) {
    echo "🎉 ALL PAGES PERFECTLY SATISFY ALL USER REQUIREMENTS!\n";
} else {
    echo "⚠️ SOME CHECKS FAILED. PLEASE REVIEW.\n";
}
