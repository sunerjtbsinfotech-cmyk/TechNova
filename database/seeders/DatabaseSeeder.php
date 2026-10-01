<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 public function run(): void {
  User::updateOrCreate(['email'=>'admin@technova.test'],['name'=>'TechNova Administrator','password'=>'password','role'=>'admin']);
  foreach ([
   ['name'=>'TechNova Pro Laptop','category'=>'Laptops','description'=>'Business-ready laptop for productivity and development.','price'=>45999,'stock'=>12,'status'=>'active'],
   ['name'=>'NovaPad X10','category'=>'Tablets','description'=>'Lightweight tablet for study, work, and entertainment.','price'=>18999,'stock'=>20,'status'=>'active'],
   ['name'=>'TechNova Wireless Hub','category'=>'Accessories','description'=>'Multi-port USB-C hub for modern devices.','price'=>2499,'stock'=>35,'status'=>'active'],
   ['name'=>'NovaKey Mechanical Keyboard','category'=>'Accessories','description'=>'Compact mechanical keyboard with a clean professional layout.','price'=>3299,'stock'=>18,'status'=>'active'],
  ] as $item) Product::updateOrCreate(['name'=>$item['name']],$item);
  foreach ([
   ['name'=>'Web Development','short_description'=>'Responsive websites and business portals.','description'=>'Custom Laravel and modern web development for organizations and entrepreneurs.','price_from'=>15000,'icon'=>'🌐','status'=>'active'],
   ['name'=>'Software Solutions','short_description'=>'Custom systems for everyday business workflows.','description'=>'Business applications that organize records, tasks, and customer requests.','price_from'=>25000,'icon'=>'⚙️','status'=>'active'],
   ['name'=>'Technical Support','short_description'=>'Reliable digital troubleshooting and assistance.','description'=>'Practical technical support for small teams, devices, and digital workflows.','price_from'=>2500,'icon'=>'🛠️','status'=>'active'],
   ['name'=>'Digital Setup','short_description'=>'Tools, forms, and online workflow setup.','description'=>'Setup and optimization of digital tools for schools, startups, and small businesses.','price_from'=>5000,'icon'=>'📱','status'=>'active'],
  ] as $item) Service::updateOrCreate(['name'=>$item['name']],$item);
 }
}
