<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Position;
use App\Department;
use App\Province;
use App\District;
use App\Municipality;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    # =========================================================================
    # POSITIONS SEEDS
    # =========================================================================


        DB::table('positions')->delete();

        $positions = [
                ['name' => 'Acting Maintenance Manager', 'slug' => "Acting-Maintenance-Manager"] ,
                ['name' => 'Acting Technical Officer','slug' => 'Acting-Technical-Officer'],
                ['name' => 'Acting Technical supervisor repair line','slug' => 'Acting-Technical-supervisor-repair-line'],
                ['name' => 'Continuous improvement manager','slug' => 'Continuous-improvement-manager'],
                ['name' => 'Engineer In training','slug' => 'Engineer-In-training'],
                ['name' => 'Environment Manager','slug' => 'Environment-Manager'],
                ['name' => 'Environment Officer','slug' => 'Environment-Officer'],
                ['name' => 'Environmental Specialist','slug' => 'Environmental-Specialist'],
                ['name' => 'Fire Officer','slug' => 'Fire-Officer'],
                ['name' => 'Fire Services','slug' => 'Fire-Services'],
                ['name' => 'Human Environment Manager','slug' => 'Human-Environment-Manager'],
                ['name' => 'Maintenance manager roads & tracks','slug' => 'Maintenance-manager-roads-tracks'],
                ['name' => 'Manager: Safety, Health & Environment','slug' => 'Manager-Safety-Health-Environment'],
                ['name' => 'Operations centre manager','slug' => 'Operations-centre-manager'],
                ['name' => 'Port Security Officer','slug' => 'Port-Security-Officer'],
                ['name' => 'Real Estate Manager','slug' => 'Real-Estate-Manager'],
                ['name' => 'Risk ','slug' => 'Risk'],
                ['name' => 'Risk Control Officer','slug' => 'Risk-Control-Officer'],
                ['name' => 'Risk Manager','slug' => 'Risk-Manager'],
                ['name' => 'Risk Specialist','slug' => 'Risk-Specialist'],
                ['name' => 'Security Operations Manager','slug' => 'Security-Operations-Manager'],
                ['name' => 'Senior Electrical Engineer','slug' => 'Senior-Electrical-Engineer'],
                ['name' => 'Senior Engineer','slug' => 'Senior-Engineer'],
                ['name' => 'Senior Manager: Operations Cont','slug' => 'Senior-Manager-Operations-Cont'],
                ['name' => 'Senior Manager: Operations MW','slug' => 'Senior-Manager-Operations-MW'],
                ['name' => 'SHE Field Officer','slug' => 'SHE-Field-Officer'],
                ['name' => 'Supervisor','slug' => 'Supervisor'],
                ['name' => 'Supervisor [Earthworks]','slug' => 'Supervisor-Earthworks'],
                ['name' => 'Technical manager Power supplies','slug' => 'Technical-manager-Power-supplies'],
                ['name' => 'Technical Officer','slug' => 'Technical-Officer'],
                ['name' => 'Technical Supervisor','slug' => 'Technical-Supervisor'],
                ['name' => 'Technical Supervisor (Control Officer)','slug' => 'Technical-Supervisor-Control-Officer)'],
                ['name' => 'Technical Supervisor (Pier 1)','slug' => 'Technical-Supervisor-Pier-1'],
                ['name' => 'Technical Supervisor (Point)','slug' => 'Technical-Supervisor-Point'],
                ['name' => 'Technical Supervisor [Dockyard]','slug' => 'Technical-Supervisor-Dockyard'],
                ['name' => 'Technical Supervisor building & marine','slug' => 'Technical-Supervisor-building-marine'],
                ['name' => 'Technical Supervisor diving','slug' => 'Technical-Supervisor-diving'],
                ['name' => 'Technician','slug' => 'Technician'],
                ['name' => 'Track inspector','slug' => 'Track-inspector'],
                ['name' => 'Trackmaster','slug' => 'Trackmaster'],
                ['name' => 'Waste Management Officer','slug' => 'Waste-Management-Officer'],

        ];

        foreach ($positions as $position) {
            Position::create($position);
        }


    # =========================================================================
    # DEPARTMENTS SEEDS
    # =========================================================================


        DB::table('departments')->delete();

        $departments = [
                ['name' => 'Bayhead Precinct', 'slug' => "Bayhead-Precinct"] ,
                ['name' => 'Container Precinct', 'slug' => "Container-Precinct"] ,
                ['name' => 'Continuous Improvement', 'slug' => "Continuous-Improvement"] ,
                ['name' => 'Corporate Affairs', 'slug' => "Corporate-Affairs"] ,
                ['name' => 'Customer Relations Management', 'slug' => "Customer-Relations-Management"] ,
                ['name' => 'Finance', 'slug' => "Finance"] ,
                ['name' => 'Harbour Master', 'slug' => "Harbour-Master"] ,
                ['name' => 'Human Resources', 'slug' => "Human-Resources"] ,
                ['name' => 'IMS/ICT', 'slug' => "IMS-ICT"] ,
                ['name' => 'Island view Precinct', 'slug' => "Island-view-Precinct"] ,
                ['name' => 'Legal & Compliance', 'slug' => "Legal-Compliance"] ,
                ['name' => 'Marine Operations', 'slug' => "Marine-Operations"] ,
                ['name' => 'Maydon Wharf Precinct', 'slug' => "Maydon-Wharf-Precinct"] ,
                ['name' => 'New Business Development', 'slug' => "New-Business-Development"] ,
                ['name' => 'Planning & Development', 'slug' => "Planning-Development"] ,
                ['name' => 'Point Precinct', 'slug' => "Point-Precinct"] ,
                ['name' => 'Port Engineer', 'slug' => "Port-Engineer"] ,
                ['name' => 'Port Management', 'slug' => "Port-Management"] ,
                ['name' => 'Procurement', 'slug' => "Procurement"] ,
                ['name' => 'Real Estate', 'slug' => "Real-Estate"] ,
                ['name' => 'Security', 'slug' => "Security"] ,
                ['name' => 'SHEQ & Fire', 'slug' => "SHEQ-Fire"] ,
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }


    # =========================================================================
    # PROVINCES SEEDS
    # =========================================================================


        DB::table('provinces')->delete();

        $provinces = [
                ['name' => 'KZN', 'slug' => "KZN"] ,
                ['name' => 'EC', 'slug' => "EC"] ,
                ['name' => 'WC', 'slug' => "WC"] ,

        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }




# =========================================================================
# DISTRICTS SEEDS
# =========================================================================


        DB::table('districts')->delete();

        $districts = [
                ['name' => 'Richards Bay', 'slug' => "Richards-Bay", 'province' => 1] ,
                ['name' => 'Durban', 'slug' => "Durban", 'province' => 1] ,
                ['name' => 'East London', 'slug' => "East-London", 'province' => 2] ,
                ['name' => 'Ngqura', 'slug' => "Ngqura", 'province' => 2] ,
                ['name' => 'Port Elizabeth', 'slug' => "Port-Elizabeth", 'province' => 2],
                ['name' => 'Mossel Bay', 'slug' => "Mossel-Bay", 'province' => 2],
                ['name' => 'Cape Town', 'slug' => "Cape-Town", 'province' => 3],
                ['name' => 'Saldanha ', 'slug' => "Saldanha ", 'province' => 3],
        ];

        foreach ($districts as $district) {
            District::create($district);
        }

    # =========================================================================
    # MUNICIPALITIES SEEDS
    # =========================================================================


        DB::table('municipalities')->delete();

        $municipalites = [
                ['name' => 'Point', 'slug' => "Point", 'district' => 2] ,
                ['name' => 'Bayhead', 'slug' => "Bayhead", 'district' => 2] ,
                ['name' => 'Containers', 'slug' => "Containers", 'district' => 2] ,
                ['name' => 'Island view', 'slug' => "Island-view", 'district' => 2] ,
                ['name' => 'Maydon Wharf', 'slug' => "Maydon-Wharf", 'district' => 2] ,
        ];

        foreach ($municipalites as $municipality) {
            Municipality::create($municipality);
        }



    # =========================================================================
    # CATEGORIES SEEDS
    # =========================================================================


        DB::table('categories')->delete();

        $categories = [
                ['name' => 'Maintenance (Civil)', 'slug' => "Maintenance-Civil)",'department' => 17 ] ,
                ['name' => 'Maintenance (Electrical)', 'slug' => "Maintenance-Electrical",'department' => 17 ] ,
                ['name' => 'Maintenance (Mechanical)', 'slug' => "Maintenance-Mechanical",'department' => 17 ] ,
                ['name' => 'Maintenance (Marine)', 'slug' => "Maintenance-Marine",'department' => 17 ] ,
                ['name' => 'Security', 'slug' => "Security",'department' => 21 ] ,
                ['name' => 'House Keeping', 'slug' => "House-Keeping",'department' => 3 ] ,
                ['name' => 'Traffic Management', 'slug' => "Traffic-Management",'department' => 21 ] ,
                ['name' => 'Property', 'slug' => "Property",'department' => 20 ] ,
                ['name' => 'Environment', 'slug' => "Environment",'department' => 22 ] ,
                ['name' => 'Safety-Risk-Fire', 'slug' => "Safety-Risk-Fire",'department' => 22 ],
                ['name' => 'Health', 'slug' => "Health",'department' => 22 ],
                ['name' => 'Port Operations Centre', 'slug' => "Port-Operations-Centre",'department' => 13 ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }


    # =========================================================================
    # SUB-CATEGORIES SEEDS
    # =========================================================================


        DB::table('sub-categories')->delete();

        $subcategories = [
                ['name' => 'Water Supply', 'slug' => "Water-Supply",'category' => 1 ] ,
                ['name' => 'Plumbing', 'slug' => "Plumbing",'category' => 1 ] ,
                ['name' => 'Building', 'slug' => "Building",'category' => 1 ] ,
                ['name' => 'Civil projects', 'slug' => "Civil-projects",'category' => 1 ] ,
                ['name' => 'Road', 'slug' => "Road",'category' => 1 ] ,
                ['name' => 'Tracks', 'slug' => "Tracks",'category' => 1 ] ,
                ['name' => 'Welding', 'slug' => "Welding",'category' => 1 ] ,
                ['name' => 'Cables', 'slug' => "Cables",'category' => 2 ] ,
                ['name' => 'Poles', 'slug' => "Poles",'category' => 2 ] ,
                ['name' => 'Electrical box', 'slug' => "Electrical-box",'category' => 2 ] ,
                ['name' => 'No supply', 'slug' => "No-supply",'category' => 2 ] ,
                ['name' => 'aircon', 'slug' => "aircon",'category' => 2 ] ,
                ['name' => 'pump stations', 'slug' => "pump-stations",'category' => 3 ] ,
                ['name' => 'Marine', 'slug' => "Marine",'category' => 4 ] ,
                ['name' => 'Cameras', 'slug' => "Cameras",'category' => 5 ] ,
                ['name' => 'perimeter fences', 'slug' => "perimeter-fences",'category' => 5 ] ,
                ['name' => 'lighting', 'slug' => "lighting",'category' => 5 ],
                ['name' => 'Theft', 'slug' => "Theft",'category' => 5 ],
                ['name' => 'damage fence', 'slug' => "damage-fence",'category' => 5 ],
                ['name' => 'boom gates', 'slug' => "boom-gates",'category' => 5 ],
                ['name' => 'biometric readers', 'slug' => "biometric-readers",'category' => 5 ],
                ['name' => 'spikes', 'slug' => "spikes",'category' => 5 ],
                ['name' => 'Guard rooms', 'slug' => "Guard-rooms",'category' => 5 ],
                ['name' => 'Security Guards', 'slug' => "Security-Guards",'category' => 5 ],
                ['name' => 'Trespassers', 'slug' => "Trespassers",'category' => 5 ],
                ['name' => 'Trucks broken down', 'slug' => "Trucks-broken-down",'category' => 5 ],
                ['name' => 'Accidents', 'slug' => "Accidents",'category' => 5 ],
                ['name' => 'Congestion/buildup of trucks', 'slug' => "Congestion-buildup-of-trucks",'category' => 5 ],
                ['name' => 'Unapproved work', 'slug' => "Unapproved-work",'category' => 5 ],
                ['name' => 'Reckless driving', 'slug' => "Reckless-driving",'category' => 5 ],
                ['name' => 'Unsafe act', 'slug' => "Unsafe-act",'category' => 5 ],
                ['name' => 'illegal parking', 'slug' => "illegal-parking",'category' => 5 ],
                ['name' => 'illegal hawking', 'slug' => "illegal-hawking",'category' => 5 ],
                ['name' => 'vagrants', 'slug' => "vagrants",'category' => 5 ],
                ['name' => 'informal settlements', 'slug' => "informal-settlements",'category' => 5 ],
                ['name' => 'violence', 'slug' => "violence",'category' => 5 ],
                ['name' => 'illegal fishing', 'slug' => "illegal fishing",'category' => 5 ],
                ['name' => 'Quayside', 'slug' => "Quayside",'category' => 6 ],
                ['name' => 'Cargo spillages', 'slug' => "Cargo-spillages",'category' => 6 ],
                ['name' => 'Grass cutting', 'slug' => "Grass-cutting",'category' => 6 ],
                ['name' => 'Debri & rubbish', 'slug' => "Debri-rubbish",'category' => 6 ],
                ['name' => 'Signage', 'slug' => "Signage",'category' => 6 ],
                ['name' => 'misplaced equipment', 'slug' => "misplaced-equipment",'category' => 6 ],
                ['name' => 'poor demarcation', 'slug' => "poor-demarcation",'category' => 6 ],
                ['name' => 'potholes', 'slug' => "potholes",'category' => 6 ],
                ['name' => 'uneven road', 'slug' => "uneven-road",'category' => 6 ],
                ['name' => 'Trucks broken down', 'slug' => "Trucks-broken-down-2",'category' => 7 ],
                ['name' => 'Accidents', 'slug' => "Accidents-2",'category' => 7 ],
                ['name' => 'Congestion/buildup of trucks', 'slug' => "Congestion-buildup-of-trucks-2",'category' => 7 ],
                ['name' => 'damage to property', 'slug' => "damage-to-property",'category' => 8 ],
                ['name' => 'informal settlements', 'slug' => "informal-settlements-2",'category' => 8 ],
                ['name' => 'illegal vending', 'slug' => "illegal-vending",'category' => 8 ],
                ['name' => 'Pollution Control', 'slug' => "Pollution-Control",'category' => 9 ],
                ['name' => 'Floating Debris/Loggs', 'slug' => "Floating-Debris-Loggs",'category' => 9 ],
                ['name' => 'potholes', 'slug' => "potholes-2",'category' => 10],
                ['name' => 'illegal trading', 'slug' => "illegal-trading",'category' => 10],
                ['name' => 'open fire', 'slug' => "open-fire",'category' => 10],
                ['name' => 'contractors', 'slug' => "contractors",'category' => 10],
                ['name' => 'unsafe transportation', 'slug' => "unsafe-transportation",'category' => 10],
                ['name' => 'truck staging', 'slug' => "truck-staging",'category' => 10],
                ['name' => 'railway safety', 'slug' => "railway-safety",'category' => 10],
                ['name' => 'reckless driving', 'slug' => "reckless-driving-2",'category' => 10],
                ['name' => 'speeding', 'slug' => "speeding",'category' => 10],
                ['name' => 'lack of signage', 'slug' => "lack-of-signage",'category' => 10],
                ['name' => 'alcohol consumption', 'slug' => "alcohol-consumption",'category' => 10],
                ['name' => 'smoking in non designated areas', 'slug' => "smoking-in-non-designated-areas",'category' => 10],
                ['name' => 'unsafe working conditions - quayside', 'slug' => "unsafe-working-conditions-quayside",'category' => 10],
                ['name' => 'unsafe hotwork', 'slug' => "unsafe-hotwork",'category' => 10],
                ['name' => 'unsafe trenching/no barricade', 'slug' => "unsafe-trenching-no-barricade",'category' => 10],
                ['name' => 'breathylising', 'slug' => "breathylising",'category' => 10],
                ['name' => 'reverse parking', 'slug' => "reverse-parking",'category' => 10],
                ['name' => 'unidentifiable vehicles', 'slug' => "unidentifiable-vehicles",'category' => 10],
                ['name' => 'No PPE', 'slug' => "No-PPE",'category' => 10],
                ['name' => 'pedestrians', 'slug' => "pedestrians",'category' => 10],
                ['name' => 'safety belts', 'slug' => "safety-belts",'category' => 10],
                ['name' => 'cellphone use while driving', 'slug' => "cellphone-use-while-driving",'category' => 10],
                ['name' => 'unsafe loading', 'slug' => "unsafe-loading",'category' => 10],
                ['name' => 'unroad worthy trucks', 'slug' => "unroad-worthy-trucks",'category' => 10],
                ['name' => 'no safety harness (working at heights)', 'slug' => "no-safety-harness-working-at-heights",'category' => 10],
                ['name' => 'no life jacket/quayside safety', 'slug' => "no-life-jacket-quayside-safety",'category' => 10],
                ['name' => 'IOD', 'slug' => "IOD",'category' => 11],
                ['name' => 'PPE', 'slug' => "PEE",'category' => 11],
                ['name' => 'First Aid Boxes', 'slug' => "First-Aid-Boxes",'category' => 11],
                ['name' => 'Occupational Diseases', 'slug' => "Occupational-Diseases",'category' => 11],
                ['name' => 'Fire Extinguisher', 'slug' => "Fire-Extinguisher",'category' => 11],
                ['name' => 'OPS', 'slug' => "OPS",'category' => 12],

        ];

        foreach ($subcategories as $subcategory) {
            SubCategory::create($subcategory);
        }




    # =========================================================================
    # SUB-SUB-CATEGORIES SEEDS
    # =========================================================================


        DB::table('sub-sub-categories')->delete();

        $subSubcategories = [
                ['name' => 'Burst Pipes', 'slug' => "Burst-Pipes",'sub-category' => 1 ] ,
                ['name' => 'No water supply', 'slug' => "No-water-supply",'sub-category' => 1 ] ,
                ['name' => 'Landing Valves', 'slug' => "Landing-Valves",'sub-category' => 1 ] ,
                ['name' => 'Blocked toilets', 'slug' => "Blocked-toilets",'sub-category' => 2 ] ,
                ['name' => 'leaking toilets', 'slug' => "leaking-toilets",'sub-category' => 2 ] ,
                ['name' => 'leaking taps', 'slug' => "leaking-taps",'sub-category' => 2 ] ,
                ['name' => 'Missing toilet seats', 'slug' => "Missing-toilet-seats",'sub-category' => 2 ] ,
                ['name' => 'lockers', 'slug' => "lockers",'sub-category' => 3 ] ,
                ['name' => 'doors', 'slug' => "doors",'sub-category' => 3 ] ,
                ['name' => 'roof leakages', 'slug' => "roof-leakages",'sub-category' => 3 ] ,
                ['name' => 'Tiles etc', 'slug' => "Tiles-etc",'sub-category' => 3 ] ,
                ['name' => 'broken glass/windows', 'slug' => "broken-glass-windows",'sub-category' => 3 ] ,
                ['name' => 'abandoned buildings', 'slug' => "abandoned-buildings",'sub-category' => 3 ] ,
                ['name' => 'Big civil projects', 'slug' => "Big civil projects",'sub-category' => 4 ] ,
                ['name' => 'Road marking', 'slug' => "Road-marking",'sub-category' => 5 ] ,
                ['name' => 'Potholes', 'slug' => "Potholes",'sub-category' => 5 ] ,
                ['name' => 'damaged manholes', 'slug' => "damaged-manholes",'sub-category' => 5 ] ,
                ['name' => 'blocked manholes', 'slug' => "blocked-manholes",'sub-category' => 5 ] ,
                ['name' => 'damaged tracks', 'slug' => "damaged-tracks",'sub-category' => 6 ] ,
                ['name' => 'derailments', 'slug' => "derailments",'sub-category' => 6 ] ,
                ['name' => 'other track issues', 'slug' => "other-track-issues",'sub-category' => 6 ] ,
                ['name' => 'rail crossing', 'slug' => "rail-crossing",'sub-category' => 6 ] ,
                ['name' => 'general & tracks', 'slug' => "general-tracks",'sub-category' => 7 ] ,
                ['name' => 'Exposed cable', 'slug' => "Exposed cable",'sub-category' => 8 ] ,
                ['name' => 'Damaged cable', 'slug' => "Damaged-cable",'sub-category' => 8 ] ,
                ['name' => 'cable theft', 'slug' => "cable-theft",'sub-category' => 8 ] ,
                ['name' => 'knocked poles', 'slug' => "knocked-poles",'sub-category' => 9 ] ,
                ['name' => 'light off', 'slug' => "light-off",'sub-category' => 9 ] ,
                ['name' => 'exposed wire', 'slug' => "exposed-wire",'sub-category' => 9 ] ,
                ['name' => 'damaged', 'slug' => "damaged",'sub-category' => 10 ] ,
                ['name' => 'unsecured', 'slug' => "unsecured",'sub-category' => 10 ] ,
                ['name' => 'illegal dumping', 'slug' => "illegal-dumping",'sub-category' => 10 ] ,
                ['name' => 'load shedding', 'slug' => "load-shedding",'sub-category' => 11 ] ,
                ['name' => 'local power failure', 'slug' => "local-power-failure",'sub-category' => 11 ] ,
                ['name' => 'lights', 'slug' => "lights",'sub-category' => 11 ] ,
                ['name' => 'plugs', 'slug' => "plugs",'sub-category' => 11 ] ,
                ['name' => 'Quay  wall damaged', 'slug' => "Quay-wall-damaged",'sub-category' => 14 ] ,
                ['name' => 'sinkholes', 'slug' => "sinkholes",'sub-category' => 14 ] ,
                ['name' => 'High spot', 'slug' => "High-spot",'sub-category' => 14 ] ,
                ['name' => 'expansion joints', 'slug' => "expansion-joints",'sub-category' => 14 ] ,
                ['name' => 'Bollards', 'slug' => "Bollards",'sub-category' => 14 ] ,
                ['name' => 'damaged fenders', 'slug' => "damaged-fenders",'sub-category' => 14 ] ,
                ['name' => 'seawalls undermining', 'slug' => "seawalls undermining",'sub-category' => 14 ] ,
                ['name' => 'Diving', 'slug' => "Diving",'sub-category' => 14 ] ,
                ['name' => 'illegal dumping', 'slug' => "illegal-dumping-2",'sub-category' => 56 ] ,
                ['name' => 'Oil Spillage', 'slug' => "Oil-Spillage",'sub-category' => 56 ] ,
                ['name' => 'cargo spillage', 'slug' => "cargo-spillage",'sub-category' => 56 ] ,
                ['name' => 'offensive odour', 'slug' => "offensive-odour",'sub-category' => 57 ] ,
                ['name' => 'over flowing skips', 'slug' => "over-flowing-skips",'sub-category' => 57 ] ,
                ['name' => 'unmarked skips', 'slug' => "unmarked-skips",'sub-category' => 57 ] ,
                ['name' => 'overflowing wheely bins', 'slug' => "overflowing-wheely-bins",'sub-category' => 57 ] ,
                ['name' => 'clogged storm water drains', 'slug' => "clogged-storm-water-drains",'sub-category' => 57 ] ,
                ['name' => 'overflowing sewer', 'slug' => "overflowing-sewer",'sub-category' => 57 ] ,
                ['name' => 'stagnant water', 'slug' => "stagnant-water ",'sub-category' => 57 ] ,
                ['name' => 'Debris & accumulated litter', 'slug' => "Debris-accumulated-litter",'sub-category' => 57 ] ,
                ['name' => 'Body', 'slug' => "Body",'sub-category' => 84 ] ,
                ['name' => 'PPE', 'slug' => "PPE",'sub-category' => 85 ] ,
                ['name' => 'Inspection', 'slug' => "Inspection",'sub-category' => 86 ] ,
                ['name' => 'OCC Asthmas', 'slug' => "OCC-Asthmas",'sub-category' => 87 ] ,
                ['name' => 'Noise induced hearing Loss', 'slug' => "Noise-induced-hearing-Loss",'sub-category' => 87 ] ,
                ['name' => 'OCC Dermatitis', 'slug' => "OCC-Dermatitis",'sub-category' => 87 ] ,
                ['name' => 'inspection', 'slug' => "inspection-2",'sub-category' => 88 ] ,
                ['name' => 'ALL OPS ISSUES', 'slug' => "ALL-OPS-ISSUES",'sub-category' => 89 ] ,
        ];

        foreach ($subSubcategories as $subSubcategory) {
            SubSubCategory::create($subSubcategory);
        }




    }
}
