<?php
$basePath = __DIR__ . '/..';
require_once $basePath . '/core/Autoloader.php';
\Core\Autoloader::register($basePath);
\Core\Dotenv::load($basePath . '/.env');
if (file_exists($basePath . '/core/helpers.php')) {
    require_once $basePath . '/core/helpers.php';
}

use App\Models\Setting;

$sections = Setting::getLuxuryVillasSections();

$faqs = [
    ['q' => 'What is the price of a luxury villa in Vrindavan and Mathura?', 'a' => 'In MVDA-sanctioned gated townships such as Shri Vrinda Aakruti Village and Shri Vrinda Orchids, duplex villas and villa plots range from ₹35,000 to ₹65,000 per square yard. Complete ready-to-move duplex villas typically start from ₹75 Lakhs to ₹1.65 Crores depending on plot size and construction specifications.'],
    ['q' => 'What is the difference between buying a villa and buying an apartment in Vrindavan?', 'a' => 'A villa grants you 100% freehold ownership of both the land and roof (ancestral right to vertical and horizontal expansion). An apartment only grants undivided share of land (UDS) with shared walls and recurring maintenance disputes. Villas provide superior privacy for prayer, private Tulsi courtyards, and significantly higher long-term land appreciation.'],
    ['q' => 'Is Shri Vrinda Aakruti Village MVDA approved?', 'a' => 'Yes. Shri Vrinda Aakruti Village is fully sanctioned by the Mathura Vrindavan Development Authority under approval order number MTDA/ZA/ANI2025/0000577, providing complete legal protection and easy bank loan financing.'],
    ['q' => 'Who maintains the villa when we are away in our home city or overseas?', 'a' => 'Gated villa townships have dedicated on-site property management, 24×7 manned security checkpoints, and gardening staff. Housekeeping and key-holding services ensure your villa is kept clean, safe, and ready for your arrival anytime.'],
    ['q' => 'Can we rent out our villa on Airbnb or to pilgrims when not in use?', 'a' => 'Yes, managed villa leasing is highly lucrative in Vrindavan. Due to the chronic shortage of quality hotel rooms, well-maintained 2 and 3 BHK villas in gated communities command high daily tariff rates from visiting pilgrim families.'],
    ['q' => 'What plot sizes are available for building custom villas?', 'a' => 'Standard villa plot sizes range from 116 sq. yards (compact 2 BHK duplex) to 150, 200, and 300+ sq. yards (spacious 3-4 BHK villas with private courtyards and parking).'],
    ['q' => 'Are home loans available for villas in Vrindavan and Mathura?', 'a' => 'Yes. Because our projects carry formal MVDA sanctions, premier banks including State Bank of India (SBI), HDFC Bank, and ICICI Bank offer residential plot purchase and home construction loans up to 75-80% of property value.'],
    ['q' => 'What amenities are included in Shri Vrinda Aakruti Village?', 'a' => 'Amenities include a grand gated entrance, 24×7 security with CCTV, wide paved internal avenues, landscaped meditation parks, children\'s play lawns, community gazebo, underground drainage, and dedicated sweet water supply.'],
    ['q' => 'How far is Shri Vrinda Aakruti Village from major temples?', 'a' => 'Aakruti Village is located off Govardhan Road on Satoha-Naugaon Road. It is approximately 15 minutes from Shri Krishna Janmasthan, 20 minutes from Prem Mandir & ISKCON Vrindavan, and 15 minutes from Govardhan Parikrama Marg.'],
    ['q' => 'Can NRIs buy villas in Vrindavan?', 'a' => 'Yes. NRIs and OCIs can purchase residential immovable property in India under RBI general permission guidelines with repatriation rights and seamless registry.'],
    ['q' => 'Are the villas compliant with Vastu Shastra?', 'a' => 'Yes, our architectural layouts follow strict Braj Vastu Shastra principles, with Ishanya (Northeast) puja orientation, central Brahmasthan courtyards, and well-placed kitchens and bedrooms.'],
    ['q' => 'What is the process to book a villa with GLEAMREALTY PRIVATE LIMITED?', 'a' => 'Simply book a free site tour, select your preferred plot and villa floorplan, submit KYC documents, and pay the booking amount. We handle 100% of title vetting, bank loan coordination, and sale deed registration.'],
    ['q' => 'Why buy through GLEAMREALTY PRIVATE LIMITED?', 'a' => 'Over 10 years of unblemished local reputation, 3,000+ satisfied devotee families, zero brokerage fees, and 100% verified government-approved developments.']
];

$sections['faqs']['list'] = $faqs;
Setting::saveLuxuryVillasSections($sections);

echo "FAQs updated successfully.\n";
