<?php

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function update_house_leader($conn, $data) {
    $sql = "UPDATE house_leader SET 
            house_number = ?, lastname = ?, firstname = ?, middlename = ?,
            exname = ?, province = ?, municipality = ?, barangay = ?,
            purok = ?, dob = ?, age = ?, sex = ?, occupation = ?,
            lcro = ?, marital_status = ?, contact_number = ?, religion = ?, coordinates = ?
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssi",
        $data['housenumber'], $data['lastname_hl'], $data['firstname_hl'], $data['middlename_hl'],
        $data['exname_hl'], $data['province_hl'], $data['municipality_hl'], $data['Barangay_hl'],
        $data['purok_hl'], $data['dob_hl'], $data['age_hl'], $data['sex_hl'], $data['occupation_hl'],
        $data['lcro_hl'], $data['marital_hl'], $data['contactnumber_hl'], $data['religion'], $data['coordinates'],
        $data['house_leader_id']
    );
    
    return $stmt->execute();
}

function update_spouse($conn, $data) {
    $sql = "UPDATE spouse SET 
            spouse_lastname = ?, spouse_firstname = ?, spouse_middlename = ?, extension = ?,
            spouse_age = ?, spouse_occupation = ?, spouse_dob = ?, spouse_lcro = ?, province_spouse = ?, municipality_spouse = ?, barangay_spouse = ?,
            purok_spouse = ?, status = ?, spouse_sex = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssi",
        $data['lastname_spouse'], $data['firstname_spouse'], $data['middlename_spouse'],
        $data['extension_spouse'], $data['age_spouse'], $data['occupation_spouse'],
        $data['dob_spouse'], $data['lcro_spouse'], $data['province_spouse'], $data['municipality_spouse'], $data['Barangay_spouse'],
        $data['purok_spouse'],
        $data['status_spouse'], $data['sex_spouse'], $data['house_leader_id']
    );
    
    return $stmt->execute();
}

function update_older_household_members($conn, $house_leader_id, $data) {
    // First delete existing records
    $delete_sql = "DELETE FROM older_household_members WHERE house_leader_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $house_leader_id);
    $delete_stmt->execute();
    
    // Insert new/updated records
    $success = true;
    for ($i = 1; $i <= 5; $i++) {
        if (!empty($data["oldername_$i"])) {
            $sql = "INSERT INTO older_household_members 
                    (house_leader_id, name, age, working, occupation, income) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssd",
                $house_leader_id,
                $data["oldername_$i"],
                $data["olderage_$i"],
                $data["olderworking_$i"],
                $data["olderoccupation_$i"],
                $data["olderincome_$i"]
            );
            
            if (!$stmt->execute()) {
                $success = false;
            }
        }
    }
    return $success;
}

function update_younger_household_members($conn, $house_leader_id, $data) {
    // First delete existing records
    $delete_sql = "DELETE FROM younger_household_members WHERE house_leader_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $house_leader_id);
    $delete_stmt->execute();
    
    // Insert new/updated records
    $success = true;
    for ($i = 1; $i <= 5; $i++) {
        if (!empty($data["youngername_$i"])) {
            $sql = "INSERT INTO younger_household_members 
                    (house_leader_id, name, age, education_level, academic_status) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isiss",
                $house_leader_id,
                $data["youngername_$i"],
                $data["youngerage_$i"],
                $data["younglevel_$i"],
                $data["youngacademic_$i"]
            );
            
            if (!$stmt->execute()) {
                $success = false;
            }
        }
    }
    return $success;
}

//Radio part
function update_transportation($conn, $house_leader_id, $data) {
    $sql = "UPDATE public_transportation SET 
            transportation = ? 
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data['transportation'], $house_leader_id);
    
    return $stmt->execute();
}

function update_financial_accounts($conn, $house_leader_id, $data) {
    $sql = "UPDATE financial_accounts SET 
            bank_account = ?, digital_bank_account = ?, emoney_account = ?,
            nssla_account = ?, cooperative_account = ?, microfinance_ngo_account = ?,
            remittance_center_account = ?, prefer_not_answer = ?
            WHERE house_leader_id = ?";
    
    $bank_account = isset($data['bankaccount']) ? 1 : 0;
    $digital_bank = isset($data['digitalbankaccount']) ? 1 : 0;
    $emoney = isset($data['emoneyaccount']) ? 1 : 0;
    $nssla = isset($data['nssla']) ? 1 : 0;
    $cooperative = isset($data['awc']) ? 1 : 0;
    $microfinance = isset($data['ngo']) ? 1 : 0;
    $remittance = isset($data['amrc']) ? 1 : 0;
    $prefer_not = isset($data['notanswer']) ? 1 : 0;
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiii",
        $bank_account, $digital_bank, $emoney, $nssla,
        $cooperative, $microfinance, $remittance, $prefer_not,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_internet_access($conn, $house_leader_id, $data) {
    $sql = "UPDATE internet_access SET 
            fixed_wired = ?, fixed_wireless = ?, satellite = ?, mobile = ?
            WHERE house_leader_id = ?";
    
    $fixed_wired = isset($data['ko3network']) ? 1 : 0;
    $fixed_wireless = isset($data['fixednetwork']) ? 1 : 0;
    $satellite = isset($data['satellitenetwork']) ? 1 : 0;
    $mobile = isset($data['mobilenetwork']) ? 1 : 0;
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiii",
        $fixed_wired, $fixed_wireless, $satellite, $mobile,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_public_safety($conn, $house_leader_id, $data) {
    $sql = "UPDATE public_safety SET 
            safety_level = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data['publicsafety'], $house_leader_id);
    
    return $stmt->execute();
}

function update_social_protection($conn, $house_leader_id, $data) {
    $sql = "UPDATE social_protection SET 
            sss = ?, gsis = ?, philhealth = ?, health_or_medical = ?, dont_work = ?,
             sss2 = ?, gsis2 = ?, philhealth2 = ?, health_or_medical2 = ?, dont_know2 = ?
            WHERE house_leader_id = ?";
    
    $sss = isset($data['sss']) ? 1 : 0;
    $gsis = isset($data['gsis']) ? 1 : 0;
    $philhealth = isset($data['philhealth']) ? 1 : 0;
    $healthormedical = isset($data['healthormedical']) ? 1 : 0;
    $dontwork = isset($data['dontwork']) ? 1 : 0;
    $sss2 = isset($data['sss2']) ? 1 : 0;
    $gsis2 = isset($data['gsis2']) ? 1 : 0;
    $philhealth2 = isset($data['philhealth2']) ? 1 : 0;
    $healthormedical2 = isset($data['healthormedical2']) ? 1 : 0;
    $dontknow2 = isset($data['dontknow2']) ? 1 : 0;
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiii",
    $sss, $gsis, $philhealth, $healthormedical, $dontwork, $sss2, $gsis2, $philhealth2, $healthormedical2, $dontknow2,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_water_sanitation_hygiene($conn, $house_leader_id, $data) {
    $sql = "UPDATE water_sanitation_hygiene SET 
           community_water_supply = ?, point_source_water_supply = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $data['community_water_supply'], $data['point_source_water_supply'], $house_leader_id);
    
    return $stmt->execute();
}

function update_improved_source($conn, $house_leader_id, $data) {
    $sql = "UPDATE improved_source SET 
            dwelling2 = ?, yardorplot2 = ?, PipedtoNeighbor = ?, PublicTap2 = ?, TubeWell2= ?,
             ProtectedWell2 = ?, RainWater2 = ?, UnprotectedSpring2 = ?, TankerTruck = ?, CartwithSmallTank = ?,
             WaterRefillingStation = ?, BottledWater = ?
            WHERE house_leader_id = ?";
    
    $dwelling2 = isset($data['dwelling2']) ? 1 : 0;
    $yardorplot2 = isset($data['yardorplot2']) ? 1 : 0;
    $PipedtoNeighbor = isset($data['PipedtoNeighbor']) ? 1 : 0;
    $PublicTap2 = isset($data['PublicTap2']) ? 1 : 0;
    $TubeWell2 = isset($data['TubeWell2']) ? 1 : 0;
    $ProtectedWell2 = isset($data['ProtectedWell2']) ? 1 : 0;
    $RainWater2 = isset($data['RainWater2']) ? 1 : 0;
    $UnprotectedSpring2 = isset($data['UnprotectedSpring2']) ? 1 : 0;
    $TankerTruck = isset($data['TankerTruck']) ? 1 : 0;
    $CartwithSmallTank = isset($data['CartwithSmallTank']) ? 1 : 0;
    $WaterRefillingStation = isset($data['WaterRefillingStation']) ? 1 : 0;
    $BottledWater = isset($data['BottledWater']) ? 1 : 0;
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiiiii",
    $dwelling2, $yardorplot2, $PipedtoNeighbor, $PublicTap2, $TubeWell2, $ProtectedWell2, $RainWater2, $UnprotectedSpring2, $TankerTruck,  $CartwithSmallTank, $WaterRefillingStation, $BottledWater,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_unimproved_source($conn, $house_leader_id, $data) {
    $sql = "UPDATE unimproved_source SET 
            UnprotectedWell = ?, UnprotectedSpring3 = ?, SurfacedWater3 = ?
            WHERE house_leader_id = ?";
    
    $UnprotectedWell = isset($data['UnprotectedWell']) ? 1 : 0;
    $UnprotectedSpring3 = isset($data['UnprotectedSpring3']) ? 1 : 0;
    $SurfacedWater3 = isset($data['SurfacedWater3']) ? 1 : 0;
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii",
    $UnprotectedWell, $UnprotectedSpring3, $SurfacedWater3, 
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_main_water_source($conn, $house_leader_id, $data) {
    $sql = "UPDATE main_water_source SET 
            PipedintoDwelling = ?, Pipedintoyardorplot = ?, PipedtoNeighbor = ?, PublicTap3 = ?, TubeWell3 = ?,
           	ProtectedWell3 = ?, RainWater3 = ?, ProtectedSpring3 = ?, TankerTruck3 = ?, CartwithSmallTank3 = ?, WaterRefillingStation3 = ?,
            BottledWater3 = ?, UnprotectedWell3 = ?, UnprotectedSpring4 = ?, SurfacedWater4 = ?
            WHERE house_leader_id = ?";
    
    $PipedintoDwelling = isset($data['PipedintoDwelling']) ? 1 : 0;
    $Pipedintoyardorplot = isset($data['Pipedintoyardorplot']) ? 1 : 0;
    $PipedtoNeighbor = isset($data['PipedtoNeighbor']) ? 1 : 0;
    $PublicTap3 = isset($data['PublicTap3']) ? 1 : 0;
    $TubeWell3 = isset($data['TubeWell3']) ? 1 : 0;
    $ProtectedWell3 = isset($data['ProtectedWell3']) ? 1 : 0;
    $RainWater3 = isset($data['RainWater3']) ? 1 : 0;
    $ProtectedSpring3 = isset($data['ProtectedSpring3']) ? 1 : 0;
    $TankerTruck3 = isset($data['TankerTruck3']) ? 1 : 0;
    $CartwithSmallTank3 = isset($data['CartwithSmallTank3']) ? 1 : 0;
    $WaterRefillingStation3 = isset($data['WaterRefillingStation3']) ? 1 : 0;
    $BottledWater3 = isset($data['BottledWater3']) ? 1 : 0;
    $UnprotectedWell3 = isset($data['UnprotectedWell3']) ? 1 : 0;
    $UnprotectedSpring4 = isset($data['UnprotectedSpring4']) ? 1 : 0;
    $SurfacedWater4 = isset($data['SurfacedWater4']) ? 1 : 0;
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiiiiiiii",
    $PipedintoDwelling, $Pipedintoyardorplot, $PipedtoNeighbor, $PublicTap3, $TubeWell3, $ProtectedWell3,
    $RainWater3, $ProtectedSpring3, $TankerTruck3, $CartwithSmallTank3, $WaterRefillingStation3,
    $BottledWater3, $UnprotectedWell3, $UnprotectedSpring4, $SurfacedWater4,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_water_source_location($conn, $house_leader_id, $data) {
    $sql = "UPDATE water_source_location SET 
            watersource_location = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data['watersourcelocated'], $house_leader_id);
    
    return $stmt->execute();
}

function update_sanitation($conn, $house_leader_id, $data) {
    $sql = "UPDATE sanitation SET 
           improved_sanitation = ?, unimproved_sanitation = ?, open_defecation = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $data['improvedsanitation'], $data['unimprovedsanitation'], $data['opendefecation'], $house_leader_id);
    
    return $stmt->execute();
}

function update_toiletfacility($conn, $house_leader_id, $data) {
    $sql = "UPDATE toiletfacility SET 
           toilet_facility = ?, facility_with_others = ?, facility_with_members = ?
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $data['toiletfacility'], $data['facilitywithothers'], $data['facilitywithmembers'], $house_leader_id);
    
    return $stmt->execute();
}

function update_garbage($conn, $house_leader_id, $data) {
    $sql = "UPDATE garbage SET 
            SegregatingWaste = ?, Lettinggarbagetruckcollectwaste = ?, Recycling = ?, Composting = ?, Burning = ?, Dumpinginpitwithcover = ?
            , Throwinginunhabitedlocations = ?
            WHERE house_leader_id = ?";
    
    $SegregatingWaste = isset($data['SegregatingWaste']) ? 1 : 0;
    $Lettinggarbagetruckcollectwaste = isset($data['Lettinggarbagetruckcollectwaste']) ? 1 : 0;
    $Recycling = isset($data['Recycling']) ? 1 : 0;
    $Composting = isset($data['Composting']) ? 1 : 0;
    $Burning = isset($data['Burning']) ? 1 : 0;
    $Dumpinginpitwithcover = isset($data['Dumpinginpitwithcover']) ? 1 : 0;
    $Throwinginunhabitedlocations = isset($data['Throwinginunhabitedlocations']) ? 1 : 0;
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiii",
    $SegregatingWaste, $Lettinggarbagetruckcollectwaste, $Recycling, $Composting, $Burning, $Dumpinginpitwithcover, $Throwinginunhabitedlocations,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_housing_characteristics($conn, $house_leader_id, $data) {
    $sql = "UPDATE housing_characteristics SET 
            SINGLEHOUSE = ?, DUPLEX = ?, AAROW_HOUSE = ?, Multi_urb = ?, Cominag = ?, Institution_living = ?
            , none = ?, Othertype = ?, Temporaryevac = ? , Metalroofing = ?, concreteslateslate = ?, HG_concrete = ?, Woodbamboo = ?
            , Sodthatch = ?, Asbestos = ?, Msi_materials = ?, CMG = ?, CBS = ?, WBP = ?, WTP = ?, VCT = ?, Linoleum = ?, concrete = ?, earthsandmud = ?, wood = ?, coconutlumber = ?, bamboo = ?, msim = ?
            WHERE house_leader_id = ?";
    
   // Housing Characteristics
   $SINGLEHOUSE = isset($data['SINGLEHOUSE']) ? 1 : 0;
   $DUPLEX = isset($data['DUPLEX']) ? 1 : 0;
   $AAROW_HOUSE = isset($data['AAROW_HOUSE']) ? 1 : 0;
   $Multi_urb = isset($data['Multi_urb']) ? 1 : 0;
   $Cominag = isset($data['Cominag']) ? 1 : 0;
   $Institution_living = isset($data['Institution_living']) ? 1 : 0;
   $none = isset($data['none']) ? 1 : 0;
   $Othertype = isset($data['Othertype']) ? 1 : 0;
   $Temporaryevac = isset($data['Temporaryevac']) ? 1 : 0;

   

   $Metalroofing = isset($data['Metalroofing']) ? 1 : 0;
   $concretslayslate = isset($data['concretslayslate']) ? 1 : 0;
   $HG_concrete = isset($data['HG_concrete']) ? 1 : 0;
   $Woodbamboo = isset($data['Woodbamboo']) ? 1 : 0;
   $Sodthatch = isset($data['Sodthatch']) ? 1 : 0;
   $Asbestos = isset($data['Asbestos']) ? 1 : 0;
   $Msi_materials = isset($data['Msi_materials']) ? 1 : 0;

   $CMG = isset($data['CMG']) ? 1 : 0;
   $CBS = isset($data['CBS']) ? 1 : 0;
   $WBP = isset($data['WBP']) ? 1 : 0;
   $WTP = isset($data['WTP']) ? 1 : 0;
   $VCT = isset($data['VCT']) ? 1 : 0;
   $Linoleum = isset($data['Linoleum']) ? 1 : 0;

   $concrete = isset($data['concrete']) ? 1 : 0;
   $earthsandmud = isset($data['earthsandmud']) ? 1 : 0;
   $wood = isset($data['wood']) ? 1 : 0;
   $coconutlumber = isset($data['coconutlumber']) ? 1 : 0;
   $bamboo = isset($data['bamboo']) ? 1 : 0;
   $msim = isset($data['msim']) ? 1 : 0;
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiiiiiiiiii",
    $SINGLEHOUSE, $DUPLEX, $AAROW_HOUSE, $Multi_urb, $Cominag, $Institution_living, $none,
    $Othertype, $Temporaryevac, $Metalroofing, $concretslayslate,
    $HG_concrete, $Woodbamboo, $Sodthatch, $Asbestos,
    $Msi_materials, $CMG, $CBS, $WBP, $WTP, $VCT, $Linoleum, $concrete, $earthsandmud, $wood, $coconutlumber, 
    $bamboo, $msim,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_floor_bedroom($conn, $house_leader_id, $data) {
    $sql = "UPDATE floor_bedroom SET floor = ?, floor2 = ?, bedrooms = ? WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $data['floor'], $data['floor2'], $data['bedrooms'], $house_leader_id);
    
    return $stmt->execute();
}

function update_tenturestatus($conn, $house_leader_id, $data) {
    $sql = "UPDATE tenturestatus SET 
            tentures_status = ? 
            WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data['tenturestatus'], $house_leader_id);
    
    return $stmt->execute();
}

function update_housing($conn, $house_leader_id, $data) {
    $sql = "UPDATE housing SET housing = ?, electricity = ? WHERE house_leader_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $data['housing'], $data['electricities'], $house_leader_id);
    
    return $stmt->execute();
}

function update_energy_source($conn, $house_leader_id, $data) {
    $sql = "UPDATE energy_sources SET 
            electricity = ?, kerosene = ?, liquefied_petroleum = ?, oil = ?, solar_panel_lamp = ?, candle = ?
            , battery = ?
            WHERE house_leader_id = ?";
    
    $electricity = isset($data['electricity']) ? 1 : 0;
    $kerosene = isset($data['kerosene']) ? 1 : 0;
    $liquefiedpetroleum = isset($data['liquefiedpetroleum']) ? 1 : 0;
    $oil = isset($data['oil']) ? 1 : 0;
    $Solapanelandlamp = isset($data['Solapanelandlamp']) ? 1 : 0;
    $candle = isset($data['candle']) ? 1 : 0;
    $battery = isset($data['battery']) ? 1 : 0;
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiii",
    $electricity, $kerosene, $liquefiedpetroleum, $oil, $Solapanelandlamp, $candle, $battery,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_energy_souce_cooking($conn, $house_leader_id, $data) {
    $sql = "UPDATE energy_souce_cooking SET 
            electricity = ?, kerosene = ?, liquefied_petroleum = ?, charcoal = ?, wood = ?
            WHERE house_leader_id = ?";
    
    $electricity1 = isset($data['electricity1']) ? 1 : 0;
    $kerosene = isset($data['kerosene']) ? 1 : 0;
    $liquefiedpetroleum = isset($data['liquefiedpetroleum']) ? 1 : 0;
    $charcoal = isset($data['charcoal']) ? 1 : 0;
    $wood = isset($data['wood']) ? 1 : 0;
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiii",
    $electricity1, $kerosene, $liquefiedpetroleum, $charcoal, $wood,
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_household_assets($conn, $house_leader_id, $data) {
    $sql = "UPDATE household_assets SET 
            refrigerator = ?, air_conditioner = ?, washing_machine = ?, stove_gas_range = ?, radio_cassette = ?, television = ?
            , cd_vcd_dvd = ?, landline_telephone = ?, cellular_phone_basic = ? , cellular_phone_smart = ?, tablet = ?, personal_computer = ?
            WHERE house_leader_id = ?";
    
   // Housing Characteristics
   $regrigerator = isset($data['regrigerator']) ? 1 : 0;
   $Airconditioner = isset($data['Airconditioner']) ? 1 : 0;
   $WashingMachine = isset($data['WashingMachine']) ? 1 : 0;
   $StoveGasrange = isset($data['StoveGasrange']) ? 1 : 0;
   $Radiocassette = isset($data['Radiocassette']) ? 1 : 0;
   $Television = isset($data['Television']) ? 1 : 0;
   $Askv = isset($data['Askv']) ? 1 : 0;
   $Landwiretelephone = isset($data['Landwiretelephone']) ? 1 : 0;
   $Cellularphonebasic = isset($data['Cellularphonebasic']) ? 1 : 0;
   $Cellularphonemodern = isset($data['Cellularphonemodern']) ? 1 : 0;
   $Tablet = isset($data['Tablet']) ? 1 : 0;
   $Personalcomputer = isset($data['Personalcomputer']) ? 1 : 0;
  
   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiiiii",
    $regrigerator, $Airconditioner, $WashingMachine, $StoveGasrange, $Radiocassette, $Television, $Askv,
    $Landwiretelephone, $Cellularphonebasic, $Cellularphonemodern, $Tablet,
    $Personalcomputer, 
        $house_leader_id
    );
    
    return $stmt->execute();
}

function update_vehicles($conn, $house_leader_id, $data) {
    $sql = "UPDATE vehicles SET 
            car = ?, van = ?, jeep = ?, truck = ?, motorcycle_scooter = ?, motorcycle_scooter = ?
            , tricycle = ?, bicycle = ?, pedicab = ? , motorized_boat = ?, non_motorized_boat = ?
            WHERE house_leader_id = ?";
    
   // Housing Characteristics
   $Car = isset($data['Car']) ? 1 : 0;
   $Van = isset($data['Van']) ? 1 : 0;
   $Jeep = isset($data['Jeep']) ? 1 : 0;
   $Truck = isset($data['Truck']) ? 1 : 0;
   $Motorcycleandscooter = isset($data['Motorcycleandscooter']) ? 1 : 0;
   $E_bike = isset($data['E-bike']) ? 1 : 0;
   $Tricycle = isset($data['Tricycle']) ? 1 : 0;
   $Bicycle = isset($data['Bicycle']) ? 1 : 0;
   $Pedicab = isset($data['Pedicab']) ? 1 : 0;
   $Motorizedboat = isset($data['Motorizedboat']) ? 1 : 0;
   $Nonmotorized = isset($data['Nonmotorized']) ? 1 : 0;
   

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiiiii",
    $Car, $Van, $Jeep, $Truck, $Motorcycleandscooter, $E_bike, $Tricycle,
    $Bicycle, $Pedicab, $Motorizedboat, $Nonmotorized,
        $house_leader_id
    );
    
    return $stmt->execute();
}
