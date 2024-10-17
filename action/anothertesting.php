<?php

include '../database/db_connect.php';

function sanitize_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // House Leader
    $house_number = sanitize_input($_POST['house_number']);
    $lastname_hl = sanitize_input($_POST['lastname_hl']);
    $firstname_hl = sanitize_input($_POST['firstname_hl']);
    $middlename_hl = sanitize_input($_POST['middlename_hl']);
    $exname_hl = sanitize_input($_POST['exname_hl']);
    $province_hl = sanitize_input($_POST['province_hl']);
    $municipality_hl = sanitize_input($_POST['municipality_hl']);
    $barangay_hl = sanitize_input($_POST['barangay_hl']);
    $purok_hl = sanitize_input($_POST['purok_hl']);
    $dob_hl = sanitize_input($_POST['dob_hl']);
    $sex_hl = sanitize_input($_POST['sex_hl']);
    $age_hl = sanitize_input($_POST['age_hl']);
    $occupation_hl = sanitize_input($_POST['occupation_hl']);
    $lcro_hl = sanitize_input($_POST['lcro_hl']);
    $marital_hl = sanitize_input($_POST['marital_hl']);
    $contactnumber_hl = sanitize_input($_POST['contactnumber_hl']);
    $religion = sanitize_input($_POST['religion']);

    // Insert House Leader
    $sql_house_leader = "INSERT INTO house_leader (house_number, lastname, firstname, middlename, exname, 
                         province, municipality, barangay, purok, dob, sex, age, occupation, lcro, 
                         marital_status, contact_number, religion) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_house_leader);
    $stmt->bind_param("sssssssssssssssss", $house_number, $lastname_hl, $firstname_hl, $middlename_hl, 
                      $exname_hl, $province_hl, $municipality_hl, $barangay_hl, $purok_hl, $dob_hl, 
                      $sex_hl, $age_hl, $occupation_hl, $lcro_hl, $marital_hl, $contactnumber_hl, $religion);
    $stmt->execute();
    $house_leader_id = $stmt->insert_id;
    $stmt->close();

    // Spouse
    $lastname_spouse = sanitize_input($_POST['lastname_spouse']);
    $firstname_spouse = sanitize_input($_POST['firstname_spouse']);
    $middlename_spouse = sanitize_input($_POST['middlename_spouse']);
    $extension_spouse = sanitize_input($_POST['extension_spouse']);
    $age_spouse = sanitize_input($_POST['age_spouse']);
    $occupation_spouse = sanitize_input($_POST['occupation_spouse']);
    $dob_spouse = sanitize_input($_POST['dob_spouse']);
    $lcro_spouse = sanitize_input($_POST['lcro_spouse']);
    $address_spouse = sanitize_input($_POST['address_spouse']);
    $status_spouse = sanitize_input($_POST['status_spouse']);

    // Insert Spouse
    $sql_spouse = "INSERT INTO spouse (house_leader_id, lastname, firstname, middlename, extension, 
                   age, occupation, dob, lcro, address, status) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_spouse);
    $stmt->bind_param("issssssssss", $house_leader_id, $lastname_spouse, $firstname_spouse, $middlename_spouse, 
                      $extension_spouse, $age_spouse, $occupation_spouse, $dob_spouse, $lcro_spouse, 
                      $address_spouse, $status_spouse);
    $stmt->execute();
    $stmt->close();

    // Public Transportation
    $public_transportation = isset($_POST['transportation']);

    // Insert Public Transportation
    $sql_public_transportation = "INSERT INTO public_transportation (house_leader_id, transportation) 
                                  VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql_public_transportation);
    $stmt->bind_param("ii", $house_leader_id, $public_transportation);
    $stmt->execute();
    $stmt->close();

    // Financial Accounts
    $bank_account = isset($_POST['bankaccount']) ? 1 : 0;
    $digital_bank_account = isset($_POST['digitalbankaccount']) ? 1 : 0;
    $emoney_account = isset($_POST['emoneyaccount']) ? 1 : 0;
    $nssla_account = isset($_POST['nssla']) ? 1 : 0;
    $cooperative_account = isset($_POST['awc']) ? 1 : 0;
    $microfinance_ngo_account = isset($_POST['ngo']) ? 1 : 0;
    $remittance_center_account = isset($_POST['amrc']) ? 1 : 0;
    $financial_prefer_not_answer = isset($_POST['notanswer']) ? 1 : 0;
    $financial_none = isset($_POST['none']) ? 1 : 0;
    $financial_other = sanitize_input($_POST['othersLivingSpecify']);

    // Insert Financial Accounts
    $sql_financial_accounts = "INSERT INTO financial_accounts (house_leader_id, bank_account, digital_bank_account, 
                               emoney_account, nssla_account, cooperative_account, microfinance_ngo_account, 
                               remittance_center_account, prefer_not_answer, none, other) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_financial_accounts);
    $stmt->bind_param("iiiiiiiiiss", $house_leader_id, $bank_account, $digital_bank_account, $emoney_account, 
                      $nssla_account, $cooperative_account, $microfinance_ngo_account, $remittance_center_account, 
                      $financial_prefer_not_answer, $financial_none, $financial_other);
    $stmt->execute();
    $stmt->close();

    // Internet Access
    $internet_fixed_wired = isset($_POST['ko3network']) ? 1 : 0;
    $internet_fixed_wireless = isset($_POST['fixednetwork']) ? 1 : 0;
    $internet_satellite = isset($_POST['satellitenetwork']) ? 1 : 0;
    $internet_mobile = isset($_POST['mobilenetwork']) ? 1 : 0;

    // Insert Internet Access
    $sql_internet_access = "INSERT INTO internet_access (house_leader_id, fixed_wired, fixed_wireless, satellite, mobile) 
                            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_internet_access);
    $stmt->bind_param("iiiii", $house_leader_id, $internet_fixed_wired, $internet_fixed_wireless, 
                      $internet_satellite, $internet_mobile);
    $stmt->execute();
    $stmt->close();

    // Public Safety
    $publicsafety = sanitize_input($_POST['publicsafety'] ?? '');

    $sql_supply = "INSERT INTO public_safety (house_leader_id, safety_level) 
                VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql_supply);
    $stmt->bind_param("is", $house_leader_id, $publicsafety);
    $stmt->execute();
    $stmt->close();

    // Social Protection and Assistance Programs
    $sss = isset($_POST['sss']) ? 1 : 0;
    $gsis = isset($_POST['gsis']) ? 1 : 0;
    $philhealth = isset($_POST['philhealth']) ? 1 : 0;
    $healthormedical = isset($_POST['healthormedical']) ? 1 : 0;
    $nevergoout = isset($_POST['nevergoout']) ? 1 : 0;
    $dontwork = isset($_POST['dontwork']) ? 1 : 0;
    $sss2 = isset($_POST['sss2']) ? 1 : 0;
    $gsis2 = isset($_POST['gsis2']) ? 1 : 0;
    $philhealth2 = isset($_POST['philhealth2']) ? 1 : 0;
    $healthormedical2 = isset($_POST['healthormedical2']) ? 1 : 0;
    $nevergoout2 = isset($_POST['nevergoout2']) ? 1 : 0;
    $dontknow2 = isset($_POST['dontknow2']) ? 1 : 0;

    // Insert Social Protection
    $sql_social_protection = "INSERT INTO social_protection (house_leader_id, sss, gsis, philhealth, health_or_medical, 
                              never_go_out, dont_work, sss2, gsis2, philhealth2, health_or_medical2, never_go_out2, dont_know2) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_social_protection);
    $stmt->bind_param("iiiiiiiiiiiii", $house_leader_id, $sss, $gsis, $philhealth, $healthormedical, $nevergoout, 
                      $dontwork, $sss2, $gsis2, $philhealth2, $healthormedical2, $nevergoout2, $dontknow2);
    $stmt->execute();
    $stmt->close();

    // Water, Sanitation, and Hygiene
    $community_water_supply = sanitize_input($_POST['community_water_supply'] ?? '');
    $point_source_water_supply = sanitize_input($_POST['point_source_water_supply'] ?? '');
    
    $sql_supply = "INSERT INTO water_sanitation_hygiene (house_leader_id, community_water_supply, point_source_water_supply) 
                VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql_supply);
    $stmt->bind_param("iss", $house_leader_id, $community_water_supply, $point_source_water_supply);
    $stmt->execute();
    $stmt->close();
    

     // Improved Source
     $dwelling2 = isset($_POST['dwelling2']) ? 1 : 0;
     $yardorplot2 = isset($_POST['yardorplot2']) ? 1 : 0;
     $PipedtoNeighbor = isset($_POST['PipedtoNeighbor']) ? 1 : 0;
     $PublicTap2 = isset($_POST['PublicTap2']) ? 1 : 0;
     $TubeWell2 = isset($_POST['TubeWell2']) ? 1 : 0;
     $ProtectedWell2 = isset($_POST['ProtectedWell2']) ? 1 : 0;
     $RainWater2 = isset($_POST['RainWater2']) ? 1 : 0;
     $UnprotectedSpring2 = isset($_POST['UnprotectedSpring2']) ? 1 : 0;
     $TankerTruck = isset($_POST['TankerTruck']) ? 1 : 0;
     $CartwithSmallTank = isset($_POST['CartwithSmallTank']) ? 1 : 0;
     $WaterRefillingStation = isset($_POST['WaterRefillingStation']) ? 1 : 0;
     $BottledWater = isset($_POST['BottledWater']) ? 1 : 0;

        // Insert into Improved Source table
$sql_improved_source = "INSERT INTO improved_source (house_leader_id, dwelling2, yardorplot2, PipedtoNeighbor, 
PublicTap2, TubeWell2, ProtectedWell2, RainWater2, UnprotectedSpring2, 
TankerTruck, CartwithSmallTank, WaterRefillingStation, BottledWater) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql_improved_source);
$stmt->bind_param("iiiiiiiiiiiii", $house_leader_id, $dwelling2, $yardorplot2, $PipedtoNeighbor, $PublicTap2, 
$TubeWell2, $ProtectedWell2, $RainWater2, $UnprotectedSpring2, $TankerTruck, 
$CartwithSmallTank, $WaterRefillingStation, $BottledWater);
$stmt->execute();
$stmt->close();
    
 //Unimproved Source
$UnprotectedWell = isset($_POST['UnprotectedWell']) ? 1 : 0;
$UnprotectedSpring3 = isset($_POST['UnprotectedSpring3']) ? 1 : 0;
$SurfacedWater3 = isset($_POST['SurfacedWater3']) ? 1 : 0;

        // Insert into Improved Source table
        $sql_unimproved_source = "INSERT INTO unimproved_source (house_leader_id, UnprotectedWell, UnprotectedSpring3, SurfacedWater3) 
        VALUES (?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql_unimproved_source);
        $stmt->bind_param("iiii", $house_leader_id, $UnprotectedWell, $UnprotectedSpring3, $SurfacedWater3);
        $stmt->execute();
        $stmt->close();
            


// Main Source of Water
$PipedintoDwelling = isset($_POST['PipedintoDwelling']) ? 1 : 0;
$Pipedintoyardorplot = isset($_POST['Pipedintoyardorplot']) ? 1 : 0;
$PipedtoNeighbor = isset($_POST['PipedtoNeighbor']) ? 1 : 0;
$PublicTap3 = isset($_POST['PublicTap3']) ? 1 : 0;
$TubeWell3 = isset($_POST['TubeWell3']) ? 1 : 0;
$ProtectedWell3 = isset($_POST['ProtectedWell3']) ? 1 : 0;
$RainWater3 = isset($_POST['RainWater3']) ? 1 : 0;
$UnprotectedSpring3 = isset($_POST['UnprotectedSpring3']) ? 1 : 0;
$TankerTruck3 = isset($_POST['TankerTruck3']) ? 1 : 0;
$CartwithSmallTank3 = isset($_POST['CartwithSmallTank3']) ? 1 : 0;
$WaterRefillingStation3 = isset($_POST['WaterRefillingStation3']) ? 1 : 0;
$BottledWater3 = isset($_POST['BottledWater3']) ? 1 : 0;
$UnprotectedWell3 = isset($_POST['UnprotectedWell3']) ? 1 : 0;
$SurfacedWater3 = isset($_POST['SurfacedWater3']) ? 1 : 0;

// Insert into Main Water Source table
$sql_mainsource = "INSERT INTO main_water_source (house_leader_id, PipedintoDwelling, Pipedintoyardorplot, PipedtoNeighbor, PublicTap3, 
                    TubeWell3, ProtectedWell3, RainWater3, UnprotectedSpring3, TankerTruck3, CartwithSmallTank3, WaterRefillingStation3, 
                    BottledWater3, UnprotectedWell3, SurfacedWater3) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql_mainsource);
$stmt->bind_param("iiiiiiiiiiiiiii", $house_leader_id, $PipedintoDwelling, $Pipedintoyardorplot, $PipedtoNeighbor, $PublicTap3, 
                  $TubeWell3, $ProtectedWell3, $RainWater3, $UnprotectedSpring3, $TankerTruck3, $CartwithSmallTank3, 
                  $WaterRefillingStation3, $BottledWater3, $UnprotectedWell3, $SurfacedWater3);
$stmt->execute();
$stmt->close();

    // Water source located
    $watersourcelocated = sanitize_input($_POST['watersourcelocated'] ?? '');

    // Insert into water_source_location table
    $sql_watersourcelocated = "INSERT INTO water_source_location (house_leader_id, watersource_location) 
                               VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql_watersourcelocated);
    $stmt->bind_param("is", $house_leader_id, $watersourcelocated);
    $stmt->execute();
    $stmt->close();

       // sanitation
$improvedsanitation = sanitize_input($_POST['improvedsanitation'] ?? '');
$unimprovedsanitation = sanitize_input($_POST['unimprovedsanitation'] ?? '');
$opendefecation = sanitize_input($_POST['opendefecation'] ?? '');

// Insert into sanitation table
$sql_sanitation = "INSERT INTO sanitation (house_leader_id, improved_sanitation, unimproved_sanitation, open_defecation) 
                   VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql_sanitation);
$stmt->bind_param("isss", $house_leader_id, $improvedsanitation, $unimprovedsanitation, $opendefecation);
$stmt->execute();
$stmt->close();

//Toilet facility 
$toiletfacility = sanitize_input($_POST['toiletfacility'] ?? '');
$facilitywithothers = sanitize_input($_POST['facilitywithothers'] ?? '');
$facilitywithmembers = sanitize_input($_POST['facilitywithmembers'] ?? '');


$sql_facility = "INSERT INTO toiletfacility (house_leader_id, toilet_facility, facility_with_others, facility_with_members) 
                   VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql_facility);
$stmt->bind_param("isss", $house_leader_id, $toiletfacility, $facilitywithothers, $facilitywithmembers);
$stmt->execute();
$stmt->close();


//Garbage disposal
$SegregatingWaste = isset($_POST['SegregatingWaste']) ? 1 : 0;
$Lettinggarbagetruckcollectwaste = isset($_POST['Lettinggarbagetruckcollectwaste']) ? 1 : 0;
$Recycling = isset($_POST['Recycling']) ? 1 : 0;
$Composting = isset($_POST['Composting']) ? 1 : 0;
$Burning = isset($_POST['Burning']) ? 1 : 0;
$Dumpinginpitwithcover = isset($_POST['Dumpinginpitwithcover']) ? 1 : 0;
$Throwinginunhabitedlocations = isset($_POST['Throwinginunhabitedlocations']) ? 1 : 0;

$sql_garbage = "INSERT INTO garbage (house_leader_id, SegregatingWaste, Lettinggarbagetruckcollectwaste, Recycling, Composting, Burning, 
                 Dumpinginpitwithcover, Throwinginunhabitedlocations) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql_garbage);
$stmt->bind_param("iiiiiiii", $house_leader_id, $SegregatingWaste, $Lettinggarbagetruckcollectwaste, $Recycling, $Composting, $Burning, 
                  $Dumpinginpitwithcover, $Throwinginunhabitedlocations);
$stmt->execute();
$stmt->close();






    // Housing Characteristics
    $SINGLEHOUSE = isset($_POST['SINGLEHOUSE']) ? 1 : 0;
    $DUPLEX = isset($_POST['DUPLEX']) ? 1 : 0;
    $AAROW_HOUSE = isset($_POST['AAROW_HOUSE']) ? 1 : 0;
    $Multi_urb = isset($_POST['Multi_urb']) ? 1 : 0;
    $Cominag = isset($_POST['Cominag']) ? 1 : 0;
    $Institution_living = isset($_POST['Institution_living']) ? 1 : 0;
    $none = isset($_POST['none']) ? 1 : 0;
    $Othertype = isset($_POST['Othertype']) ? 1 : 0;
    $Temporaryevac = isset($_POST['Temporaryevac']) ? 1 : 0;

    $floor = sanitize_input($_POST['floor']);

    $Metalroofing = isset($_POST['Metalroofing']) ? 1 : 0;
    $concretslayslate = isset($_POST['concretslayslate']) ? 1 : 0;
    $HG_concrete = isset($_POST['HG_concrete']) ? 1 : 0;
    $Woodbamboo = isset($_POST['Woodbamboo']) ? 1 : 0;
    $Sodthatch = isset($_POST['Sodthatch']) ? 1 : 0;
    $Asbestos = isset($_POST['Asbestos']) ? 1 : 0;
    $Msi_materials = isset($_POST['Msi_materials']) ? 1 : 0;

    $CMG = isset($_POST['CMG']) ? 1 : 0;
    $CBS = isset($_POST['CBS']) ? 1 : 0;
    $WBP = isset($_POST['WBP']) ? 1 : 0;
    $WTP = isset($_POST['WTP']) ? 1 : 0;
    $VCT = isset($_POST['VCT']) ? 1 : 0;
    $Linoleum = isset($_POST['Linoleum']) ? 1 : 0;

    $concrete = isset($_POST['concrete']) ? 1 : 0;
    $earthsandmud = isset($_POST['earthsandmud']) ? 1 : 0;
    $wood = isset($_POST['wood']) ? 1 : 0;
    $coconutlumber = isset($_POST['coconutlumber']) ? 1 : 0;
    $bamboo = isset($_POST['bamboo']) ? 1 : 0;
    $msim = isset($_POST['msim']) ? 1 : 0;
    $notobserved = isset($_POST['notobserved']) ? 1 : 0;

    $floor2 = sanitize_input($_POST['floor2']);
    $bedrooms = sanitize_input($_POST['bedrooms']);

    // Insert Housing Characteristics
    $sql_housing = "INSERT INTO housing_characteristics (house_leader_id, single_house, duplex, row_house, 
                    multi_unit_residential, commercial_industrial_agricultural, institutional_living_quarters, 
                    other, other_type, temporary_shelter, floor_area, metal_roofing, concrete_clay_slate, 
                    half_concrete, wood_bamboo, cogon_nipa, asbestos, makeshift_salvaged_improvised, 
                    concrete_brick_stone, wood_plywood, galvanized_iron_aluminum, bamboo_sawali_cogon_nipa, 
                    asbestos2, makeshift_salvaged_improvised2, floor_material, bedrooms) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_housing);
    $stmt->bind_param("iiiiiiiisisiiiiiiiiiiiiisi", $house_leader_id, $SINGLEHOUSE, $DUPLEX, $AAROW_HOUSE, 
                      $Multi_urb, $Cominag, $Institution_living, $none, $Othertype, $Temporaryevac, $floor, 
                      $Metalroofing, $concretslayslate, $HG_concrete, $Woodbamboo, $Sodthatch, $Asbestos, 
                      $Msi_materials, $CMG, $CBS, $WBP, $WTP, $VCT, $Linoleum, $floor2, $bedrooms);
    $stmt->execute();
    $stmt->close();

   
     // Tenure Status
     $tenturestatus = sanitize_input($_POST['tenturestatus'] ?? ''); 
     // Insert into sanitation table
     $sql_tenturestatus = "INSERT INTO tenturestatus (house_leader_id, tentures_status) 
                        VALUES (?, ?)";
     
     $stmt = $conn->prepare($sql_tenturestatus);
     $stmt->bind_param("is", $house_leader_id, $tenturestatus);
     $stmt->execute();
     $stmt->close();
 
    // Housing 
       $housing = sanitize_input($_POST['housing']);
       $electricity = sanitize_input($_POST['electricity'] ?? ''); 
   
   
       // Insert Housing
       $sql_housingandelec = "INSERT INTO housing (house_leader_id, housing, electricity) 
                            VALUES (?, ?, ?)";
       
       $stmt = $conn->prepare($sql_housingandelec);
       $stmt->bind_param("iss", $house_leader_id, $housing, $electricity);
       $stmt->execute();
       $stmt->close();


    // Energy Sources
      $electricity = isset($_POST['electricity']) ? 1 : 0;
    $kerosene = isset($_POST['kerosene']) ? 1 : 0;
    $liquefiedpetroleum = isset($_POST['liquefiedpetroleum']) ? 1 : 0;
    $oil = isset($_POST['oil']) ? 1 : 0;
    $Solapanelandlamp = isset($_POST['Solapanelandlamp']) ? 1 : 0;
    $candle = isset($_POST['candle']) ? 1 : 0;
    $battery = isset($_POST['battery']) ? 1 : 0;

    // Insert Energy Sources
    $sql_energy = "INSERT INTO energy_sources (house_leader_id, electricity, kerosene, liquefied_petroleum, 
                   oil, solar_panel_lamp, candle, battery) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_energy);
    $stmt->bind_param("iiiiiiii", $house_leader_id, $electricity, $kerosene, $liquefiedpetroleum, 
                      $oil, $Solapanelandlamp, $candle, $battery);
    $stmt->execute();
    $stmt->close();

    // Household Appliances
    $regrigerator = isset($_POST['regrigerator']) ? 1 : 0;
    $Airconditioner = isset($_POST['Airconditioner']) ? 1 : 0;
    $WashingMachine = isset($_POST['WashingMachine']) ? 1 : 0;
    $StoveGasrange = isset($_POST['StoveGasrange']) ? 1 : 0;
    $Radiocassette = isset($_POST['Radiocassette']) ? 1 : 0;
    $Television = isset($_POST['Television']) ? 1 : 0;
    $Askv = isset($_POST['Askv']) ? 1 : 0;
    $Landwiretelephone = isset($_POST['Landwiretelephone']) ? 1 : 0;
    $Cellularphonebasic = isset($_POST['Cellularphonebasic']) ? 1 : 0;
    $Cellularphonemodern = isset($_POST['Cellularphonemodern']) ? 1 : 0;
    $Tablet = isset($_POST['Tablet']) ? 1 : 0;
    $Personalcomputer = isset($_POST['Personalcomputer']) ? 1 : 0;

    // Insert Household Appliances
    $sql_appliances = "INSERT INTO household_assets (house_leader_id, refrigerator, air_conditioner, 
                       washing_machine, stove_gas_range, radio_cassette, television, cd_vcd_dvd, 
                       landline_telephone, cellular_phone_basic, cellular_phone_smart, tablet, personal_computer) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_appliances);
    $stmt->bind_param("iiiiiiiiiiiii", $house_leader_id, $regrigerator, $Airconditioner, $WashingMachine, 
                      $StoveGasrange, $Radiocassette, $Television, $Askv, $Landwiretelephone, 
                      $Cellularphonebasic, $Cellularphonemodern, $Tablet, $Personalcomputer);
    $stmt->execute();
    $stmt->close();

    // Vehicles
    $Car = isset($_POST['Car']) ? 1 : 0;
    $Van = isset($_POST['Van']) ? 1 : 0;
    $Jeep = isset($_POST['Jeep']) ? 1 : 0;
    $Truck = isset($_POST['Truck']) ? 1 : 0;
    $Motorcycleandscooter = isset($_POST['Motorcycleandscooter']) ? 1 : 0;
    $E_bike = isset($_POST['E-bike']) ? 1 : 0;
    $Tricycle = isset($_POST['Tricycle']) ? 1 : 0;
    $Bicycle = isset($_POST['Bicycle']) ? 1 : 0;
    $Pedicab = isset($_POST['Pedicab']) ? 1 : 0;
    $Motorizedboat = isset($_POST['Motorizedboat']) ? 1 : 0;
    $Nonmotorized = isset($_POST['Nonmotorized']) ? 1 : 0;

    // Insert Vehicles
    $sql_vehicles = "INSERT INTO vehicles (house_leader_id, car, van, jeep, truck, motorcycle_scooter, 
                     e_bike, tricycle, bicycle, pedicab, motorized_boat, non_motorized_boat) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql_vehicles);
    $stmt->bind_param("iiiiiiiiiiii", $house_leader_id, $Car, $Van, $Jeep, $Truck, $Motorcycleandscooter, 
                      $E_bike, $Tricycle, $Bicycle, $Pedicab, $Motorizedboat, $Nonmotorized);
    $stmt->execute();
    $stmt->close();

    // Older Household Members
    for ($i = 1; $i <= 5; $i++) {
        $name = sanitize_input($_POST["oldername_$i"]);
        $age = sanitize_input($_POST["olderage_$i"]);
        $working = sanitize_input($_POST["olderworking_$i"]);
        $occupation = sanitize_input($_POST["olderoccupation_$i"]);
        $income = sanitize_input($_POST["olderincome_$i"]);

        if (!empty($name)) {
            $sql_older = "INSERT INTO older_household_members (house_leader_id, name, age, working, occupation, income) 
                          VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_older);
            $stmt->bind_param("issssd", $house_leader_id, $name, $age, $working, $occupation, $income);
            $stmt->execute();
            $stmt->close();
        }
    }

    // Younger Household Members
    for ($i = 1; $i <= 5; $i++) {
        $name = sanitize_input($_POST["youngername_$i"]);
        $age = sanitize_input($_POST["youngerage_$i"]);
        $level = sanitize_input($_POST["younglevel_$i"]);
        $academic = sanitize_input($_POST["youngacademic_$i"]);

        if (!empty($name)) {
            $sql_younger = "INSERT INTO younger_household_members (house_leader_id, name, age, education_level, academic_status) 
                            VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql_younger);
            $stmt->bind_param("isiss", $house_leader_id, $name, $age, $level, $academic);
            $stmt->execute();
            $stmt->close();
        }
    }

    header('Content-Type: application/json');
    if (!$conn->error) {
        $conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'New record created successfully']);
    } else {
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }

    $conn->close();
}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form'); // Adjust this selector if needed
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Optionally, redirect or reset the form here
                        // window.location.href = 'some-page.php';
                        // form.reset();
                    }
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: 'Error!',
                text: 'An unexpected error occurred. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
});
</script>
?>