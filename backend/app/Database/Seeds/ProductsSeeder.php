<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $dateNow = date('Y-m-d H:i:s');

        $productsData = [
            // Helicopter
            [
                'product_name' => 'Robinson R44 Raven II',
                'product_description' => 'A reliable 4-seat light helicopter perfect for personal use, aerial tours, or light patrol. Known for its fuel efficiency and low maintenance cost, the R44 Raven II is a favorite among private owners and local tour operators.',
                'product_Specs' =>
                '
                    <p>
                    <strong>Specifications:</strong>
                    <ul>
                        <li>Engine: Lycoming IO-540-AE1A5 (245 hp)</li>
                        <li>Cruise Speed: 110 knots (204 km/h)</li>
                        <li>Range: 300 nautical miles (560 km)</li>
                        <li>Service Ceiling: 14,000 ft</li>
                        <li>Maximum Takeoff Weight: 2,500 lbs (1,134 kg)</li>
                        <li>Seating Capacity: 1 pilot + 3 passengers</li>
                        <li>Fuel Capacity: 73.6 gallons</li>
                        <li>Typical Use: Private flying, aerial tours, patrol</li>
                    </ul>
                    </p>
                    
                ',
                'price' => 2550000.00,
                'type' => 'Helicoptor',
                'product_image' => '/assets/image/aircrafts/r44.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Airbus H125',
                'product_description' => 'A powerful single-engine utility helicopter ideal for high-performance missions in hot and high environments. Trusted for emergency services, corporate transport, and aerial work.',
                'product_Specs' =>
                '
                    <strong>Specifications:</strong>
                    <ul>
                        <li>Engine: Safran Arriel 2D Turboshaft</li>
                        <li>Cruise Speed: 133 knots (246 km/h)</li>
                        <li>Range: 340 nautical miles (630 km)</li>
                        <li>Service Ceiling: 23,000 ft</li>
                        <li>Maximum Takeoff Weight: 4,960 lbs (2,250 kg)</li>
                        <li>Seating Capacity: 1 pilot + 5 passengers</li>
                        <li>Fuel Capacity: 143 gallons</li>
                        <li>Typical Use: Rescue missions, high-altitude operations, tourism</li>
                    </ul>
                ',
                'price' => 5600000.00,
                'type' => 'Helicoptor',
                'product_image' => '/assets/image/aircrafts/h125.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Bell 505 Jet Ranger X',
                'product_description' => 'Sleek, smart, and modern — the Bell 505 is a premium light helicopter suited for executives, VIP transport, or luxury tourism. Offers cutting-edge avionics and a glass cockpit system.',
                'product_Specs' =>
                '
                    <strong>Specifications:</strong>
                    <ul>
                        <li>Engine: Safran Arrius 2R Turboshaft</li>
                        <li>Cruise Speed: 125 knots (232 km/h)</li>
                        <li>Range: 306 nautical miles (567 km)</li>
                        <li>Service Ceiling: 18,610 ft</li>
                        <li>Maximum Takeoff Weight: 3,680 lbs (1,670 kg)</li>
                        <li>Seating Capacity: 1 pilot + 4 passengers</li>
                        <li>Avionics: Garmin G1000H Glass Cockpit</li>
                        <li>Typical Use: Corporate transport, VIP flights, training</li>
                    </ul>
                ',
                'price' => 7800000.00,
                'type' => 'Helicoptor',
                'product_image' => '/assets/image/aircrafts/bell505.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Leonardo AW109 Trekker',
                'product_description' => 'A twin-engine light utility helicopter with unmatched versatility. The AW109 Trekker is used by emergency services, VIPs, and government operations for its speed, safety, and reliability.',
                'product_Specs' =>
                '
                    <strong>Specifications:</strong>
                    <ul>
                        <li>Engine: Twin Pratt & Whitney PW207C</li>
                        <li>Cruise Speed: 154 knots (285 km/h)</li>
                        <li>Range: 515 nautical miles (954 km)</li>
                        <li>Service Ceiling: 19,600 ft</li>
                        <li>Maximum Takeoff Weight: 7,000 lbs (3,175 kg)</li>
                        <li>Seating Capacity: 1 pilot + 6 passengers</li>
                        <li>Avionics: Garmin G1000H Integrated System</li>
                        <li>Typical Use: Emergency medical services, VIP transport, law enforcement</li>
                    </ul>
                ',
                'price' => 21000000.00,
                'type' => 'Helicoptor',
                'product_image' => '/assets/image/aircrafts/aw109.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            // Modification
            [
                'product_name' => 'Luxury Interior Retrofit',
                'product_description' => 'Premium upgrade featuring custom leather seating, noise-insulated panels, wood veneer finish, and LED mood lighting. Transformed for executive transport.',
                'product_Specs' =>
                '
                    <strong>Upgrade Details:</strong>
                    <ul>
                        <li>Hand-stitched premium leather seating</li>
                        <li>Cabin soundproofing panels</li>
                        <li>LED ambient lighting system</li>
                        <li>Custom wood veneer dashboard trim</li>
                        <li>Optional champagne storage compartment</li>
                    </ul>
                ',
                'price' => 2700000.00,
                'type' => 'Modification',
                'product_image' => '/assets/image/mods/interior.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'External Cargo Hook System Installation',
                'product_description' => 'Outfitted with a certified external cargo hook system for sling load operations. Ideal for delivering supplies to remote sites, lifting heavy loads, or supporting disaster relief missions across the Philippine islands..',
                'product_Specs' =>
                '
                    <strong>Upgrade Details:</strong>
                    <ul>
                        <li>External cargo hook rated up to 1,500 kg</li>
                        <li>Remote cockpit hook release system</li>
                        <li>High-strength reinforced mounting frame</li>
                        <li>Emergency quick-release safety feature</li>
                        <li>Compatible with most light utility helicopters</li>
                    </ul>
                ',
                'price' => 500000.00,
                'type' => 'Modification',
                'product_image' => '/assets/image/mods/cargo.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Custom Paint & Branding',
                'product_description' => 'Applied full custom livery with UV-resistant clear coat and brand-accurate colors. Boosted visual identity for Palawan-based aerial tours.',
                'product_Specs' =>
                    '
                    <strong>Service Details:</strong>
                    <ul>
                        <li>Aircraft-grade polyurethane paint</li>
                        <li>UV and salt corrosion protection</li>
                        <li>Full custom logo and livery design</li>
                        <li>Weather-resistant clear coat finish</li>
                        <li>Professional airframe polishing</li>
                    </ul>
                    ',
                'price' => 1300000.00,
                'type' => 'Modification',
                'product_image' => '/assets/image/mods/paint.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Avionics Suite Upgrade',
                'product_description' => 'Installed Garmin GTN 750 avionics, real-time mapping, and enhanced communications. Ideal for medevac, VIP, and high-precision operations.',
                'product_Specs' =>
                '
                    <strong>Service Details:</strong>
                    <ul>
                        <li>Garmin GTN 750 GPS/NAV/COM system</li>
                        <li>Glass cockpit integration</li>
                        <li>Real-time terrain and weather mapping</li>
                        <li>Enhanced autopilot compatibility</li>
                        <li>Emergency locator transmitter integration</li>
                    </ul>
                ',
                'price' => 10500000.00,
                'type' => 'Modification',
                'product_image' => '/assets/image/mods/avionics.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            // Repairs
            [
                'product_name' => 'Main Rotor Overhaul',
                'product_description' => 'Comprehensive rotor head disassembly, bearing replacement, and dynamic balancing. The aircraft was cleared for flight in under a week — ideal for patrol and light utility operations.',
                'product_Specs' =>
                '
                    <strong>Repair Procedure:</strong>
                    <ul>
                        <li>Complete rotor hub disassembly</li>
                        <li>Bearing and seal replacement</li>
                        <li>Blade pitch calibration</li>
                        <li>Dynamic rotor balancing</li>
                        <li>Post-repair flight testing</li>
                    </ul>
                ',
                'price' => 2800000.00,
                'type' => 'Repair',
                'product_image' => '/assets/image/repairs/rotor.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Engine Diagnostics & Repair',
                'product_description' => 'Resolved mid-flight engine roughness through precision diagnostics. Faulty magneto replaced and performance tested. Returned to full service with improved reliability.',
                'product_Specs' =>
                '
                    <strong>Repair Procedure:</strong>
                    <ul>
                        <li>Full engine performance diagnostics</li>
                        <li>Magneto and ignition system testing</li>
                        <li>Fuel system inspection and calibration</li>
                        <li>Component replacement where required</li>
                        <li>Ground and flight operational testing</li>
                    </ul>
                ',
                'price' => 9500000.00,
                'type' => 'Repair',
                'product_image' => '/assets/image/repairs/engine.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Hydraulic System Restoration',
                'product_description' => 'Repaired leaks, replaced filters, and flushed hydraulic systems. Ensured stable control responsiveness for high-demand air tour operations.',
                'product_Specs' =>
                '
                    <strong>Repair Procedure:</strong>
                    <ul>
                        <li>Hydraulic line pressure testing</li>
                        <li>Fluid flushing and replacement</li>
                        <li>Filter and pump inspection</li>
                        <li>Seal and valve replacement</li>
                        <li>System performance verification</li>
                    </ul>
                ',
                'price' => 3200000.00,
                'type' => 'Repair',
                'product_image' => '/assets/image/repairs/hydraulics.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Crash Damage Repair',
                'product_description' => 'Post-landing recovery included landing skid replacement, tail rotor repair, and structural inspection. Aircraft fully restored for pilot training use.',
                'product_Specs' =>
                '
                    <strong>Repair Procedure:</strong>
                    <ul>
                        <li>Structural airframe inspection</li>
                        <li>Landing skid replacement</li>
                        <li>Tail rotor and drive shaft repair</li>
                        <li>Composite panel restoration</li>
                        <li>Final airworthiness certification</li>
                    </ul>
                ',
                'price' => 6500000.00,
                'type' => 'Repair',
                'product_image' => '/assets/image/repairs/crash.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],

            // Plans
            [
                'product_name' => 'Angel Check',
                'product_description' =>
                '
                    <p>
                        Our essential care package, perfect for owners flying short domestic routes. 
                        It provides the peace of mind every pilot deserves with basic yet crucial pre-flight inspections and diagnostics.
                    </p>
                    <strong>Includes:</strong>
                    <ul>
                        <li>10% discount</li>
                        <li>Mechanical and avionics inspection</li>
                        <li>Engine and battery diagnostics</li>
                    </ul>
                ',
                'product_Specs' => null,
                'price' => 25000.00,
                'type' => 'Plan',
                'product_image' => '/assets/image/lfn-maintenance-slider-6.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Halo Maintenance',
                'product_description' =>
                '
                    <p>
                        A full-service maintenance plan designed for regular fliers and tour operators. 
                        Keep your aircraft in peak condition with preventive servicing and faster turnaround.
                    </p>
                    <strong>Includes:</strong>
                    <ul>
                        <li>All Angel Check services (Except 10% discount)</li>
                        <li>15% discount</li>
                        <li>Lubrication and system cleaning</li>
                        <li>Engine and battery diagnostics</li>
                        <li>Consultation with licensed technician</li>
                    </ul>
                ',
                'product_Specs' => null,
                'price' => 85000.00,
                'type' => 'Plan',
                'product_image' => '/assets/image/TECHNIKAI025.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Wings of Ownership',
                'product_description' =>
                '
                    <p>
                        Step into the skies with your very own aircraft. This plan guides you through 
                        purchasing a helicopter with full legal, safety, and mechanical support.
                    </p>
                    <strong>Includes:</strong>
                    <ul>
                        <li>All Angel Check services (Except 10% discount)</li>
                        <li>All Halo Maintenance services (Except 15% discount)</li>
                        <li>20% discount</li>
                    </ul>
                ',
                'product_Specs' => null,
                'price' => 100000.00,
                'type' => 'Plan',
                'product_image' => '/assets/image/news-O1rSzG.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'product_name' => 'Guardian Fleet',
                'product_description' =>
                '
                    <p>
                        For corporations, LGUs, and emergency service operators managing a helicopter fleet. This program offers 
                        full support with dedicated teams and inspections across Luzon, Visayas, and Mindanao.
                    </p>
                    <strong>Includes:</strong>
                    <ul>
                        <li>All Angel Check services (Except 10% discount)</li>
                        <li>All Halo Maintenance services (Except 15% discount)</li>
                        <li>All Wings of Ownership services (Except 20% discount)</li>
                        <li>30% discount</li>
                    </ul>
                ',
                'product_Specs' => null,
                'price' => 100500.00,
                'type' => 'Plan',
                'product_image' => '/assets/image/AERO-IDAG-helicopter-hangar-7-scaled.jpg',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ];

        $this->db->table('products')->insertBatch($productsData);
    }
}
