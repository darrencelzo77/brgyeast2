<?php

require_once('main.class.php');


class ResidentClass extends BMISClass
{
    //------------------------------------ RESIDENT CRUD FUNCTIONS ----------------------------------------


    public function create_resident_admin()
    {
        // if (isset($_POST['add_resident_admin'])) {
        //     $admin_id = $_POST['admin_id'];
        //     // Retrieve form data
        //     $lname = $_POST['lname'];
        //     $fname = $_POST['fname'];
        //     $mi = $_POST['mi'];
        //     $contact = $_POST['contact'];
        //     $email = $_POST['email'];
        //     $password = md5($_POST['password']); // Hash the password
        //     $houseno = $_POST['houseno'];
        //     $street = $_POST['street'];
        //     $brgy = $_POST['brgy'];
        //     $municipal = $_POST['municipal'];
        //     $bdate = $_POST['bdate'];
        //     $bplace = $_POST['bplace'];
        //     $nationality = $_POST['nationality'];
        //     $status = $_POST['status'];
        //     $age = $_POST['age'];
        //     $sex = $_POST['sex'];
        //     $voter = $_POST['voter'];
        //     //$family_role = $_POST['family_role'];
        //     $pwd = $_POST['pwd'];
        //     $indigent = $_POST['indigent'];
        //     $single_parent = $_POST['single_parent'];
        //     $pregnant = $_POST['pregnant'];
        //     $malnourished = $_POST['malnourished'];
        //     $four_ps = $_POST['four_ps'];
        //     $role = $_POST['role'];
        //     $request_status = 'pending';

        //     // Add the new IP Community field
        //     $ip_community = $_POST['ip_community'];
        //     $out_of_school_youth = $_POST['out_of_school_youth'];
        //     $senior = $_POST['senior_citizen'];
        //     $lgbtq = $_POST['lgbtq'];
        //     $psa_holder = isset($_POST['psa']) ? $_POST['psa'] : '';
        //     $psa_correction = isset($_POST['psa_correction']) ? $_POST['psa_correction'] : '';
        //     $ntnl_id = isset($_POST['ntnlid']) ? $_POST['ntnlid'] : '';
        //     $animals = isset($_POST['d_a']) ? $_POST['d_a'] : '';
        //     $trees = isset($_POST['trees']) ? $_POST['trees'] : '';
        //     $farmer = isset($_POST['farmer']) ? $_POST['farmer'] : '';
        //     $veges = isset($_POST['veges']) ? $_POST['veges'] : '';
        //     $soi = $_POST['soi'];
        //     $occupation = $_POST['occupation'];
        //     $table = $_POST['tbl_name'];
        //     $hof = isset($_POST['hof']) ? $_POST['hof'] : '';



        //     if ($psa_correction == "Yes") {
        //         $psa_correction = $_POST['psa_c'];
        //     } else {
        //         $psa_correction = "No";
        //     }

        //     if ($ntnl_id == "Yes") {
        //         $ntnlid_num = $_POST['ntlid_'];
        //     } else {
        //         $ntnlid_num = "No";
        //     }

        //     if ($animals == "Yes") {
        //         $animals_ = $_POST['dom_a'];
        //     } else {
        //         $animals_ = "No";
        //     }

        //     if ($trees == "Yes") {
        //         $trees_ = $_POST['trees_'];
        //     } else {
        //         $trees_ = "No";
        //     }

        //     if ($farmer == "Yes") {
        //         $farmer_ = $_POST['farmer_'];
        //     } else {
        //         $farmer_ = "No";
        //     }

        //     if ($veges == "Yes") {
        //         $veges_ = $_POST['veges_'];
        //     } else {
        //         $veges_ = "No";
        //     }


        //     //echo $farmer_;
        //     //echo $ntnlid_nu

        //     // Open the database connection
        //     $connection = $this->openConn();

        //     try {
        //         $r_status = 'approved';
        //         $stmt = $connection->prepare("INSERT INTO tbl_resident (request_status, lname, fname, mi, contact, email, password, houseno, street, brgy, 
        //                                                             municipal, bdate, bplace, s_of_income, occupation, nationality, head_of_family, psa_holder, psa_correction, ntnlId, 
        //                                                             status, age, sex, voter, pwd, indigent, single_parent, malnourished, four_ps, pregnancy, domesticated_animals, 
        //                                                             trees, farmer, vegetables, role, ip_community, out_of_school_youth, lgbtq, senior_citizen, addedby)
        //                                                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        //         $stmt->execute([
        //             $r_status,
        //             $lname,
        //             $fname,
        //             $mi,
        //             $contact,
        //             $email,
        //             $password,
        //             $houseno,
        //             $street,
        //             $brgy,
        //             $municipal,
        //             $bdate,
        //             $bplace,
        //             $soi,
        //             $occupation,
        //             $nationality,
        //             $hof,
        //             $psa_holder,
        //             $psa_correction,
        //             $ntnlid_num,
        //             $status,
        //             $age,
        //             $sex,
        //             $voter,
        //             $pwd,
        //             $indigent,
        //             $single_parent,
        //             $malnourished,
        //             $four_ps,
        //             $pregnant,
        //             $animals_,
        //             $trees_,
        //             $farmer_,
        //             $veges_,
        //             $role,
        //             $ip_community,
        //             $out_of_school_youth,
        //             $lgbtq,
        //             $senior,
        //             $admin_id
        //         ]);


        //         $resident_id = $connection->lastInsertId();
        //         // echo $resident_id . '<br>';
        //         // echo $table;

        //         $q = $connection->prepare("SELECT * FROM $table");
        //         $q->execute();

        //         // while ($rw = $q->fetch()) {
        //         //     $qr = $connection->prepare('INSERT INTO tbl_family_member SET resident_id=' . $resident_id . ',family_lastname=\''
        //         //         . $rw['family_lastname'] . '\',family_firstname=\''
        //         //         . $rw['family_firstname'] . '\',family_middleinitial=\''
        //         //         . $rw['family_middleinitial'] . '\',relationshipid=\''
        //         //         . $rw['relationshipid'] . '\',family_age=\''
        //         //         . $rw['family_age'] . '\',familycivilid=\''
        //         //         . $rw['familycivilid'] . '\',occupation=\''
        //         //         . $rw['occupation'] . '\',income=\''
        //         //         . $rw['income'] . '\' ');
        //         //     $qr->execute();
        //         // }

        //         // $qq = $connection->prepare("DROP TABLE $table");
        //         // $qq->execute();



        //         $message = "Resident account added successfully!";
        //         echo "<script type='text/javascript'>alert('$message');</script>";
        //         header("Refresh:0;");
        //         exit;
        //     } catch (PDOException $e) {
        //         // Handle any potential errors
        //         echo "Error: " . $e->getMessage();
        //     }

        //     // Close the database connection
        //     $connection = null;
        // }
        if (isset($_POST['add_resident_admin'])) {
            // Retrieve form data
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $houseno = $_POST['houseno'];
            $street = $_POST['street'];
            $brgy = $_POST['brgy'];
            $municipal = $_POST['municipal'];
            $bdate = $_POST['bdate'];
            $bplace = $_POST['bplace'];
            $nationality = $_POST['nationality'];
            $status = $_POST['status'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $soi = $_POST['soi'];
            $occupation = $_POST['occupation'];
            $hof = $_POST['hof'] ?? '';
            $psa_holder = $_POST['psa'] ?? '';
            $psa_correction = $_POST['psa_correction'] ?? '';
            $ntnl_id = $_POST['ntnlid'] ?? '';
            $animals = $_POST['d_a'] ?? '';
            $trees = $_POST['trees'] ?? '';
            $farmer = $_POST['farmer'] ?? '';
            $veges = $_POST['veges'] ?? '';
            $role = $_POST['role'];
            $request_status = "pending";

            // Convert dependent fields
            $psa_correction = ($psa_correction == "Yes") ? $_POST['psa_c'] : "No";
            $ntnlid_num = ($ntnl_id == "Yes") ? $_POST['ntlid_'] : "No";
            $animals_ = ($animals == "Yes") ? $_POST['dom_a'] : "No";
            $trees_ = ($trees == "Yes") ? $_POST['trees_'] : "No";
            $farmer_ = ($farmer == "Yes") ? $_POST['farmer_'] : "No";
            $veges_ = ($veges == "Yes") ? $_POST['veges_'] : "No";


            $voter = $_POST['voter'];
            $pwd = $_POST['pwd'];
            $indigent = $_POST['indigent'];
            $single_parent = $_POST['single_parent'];
            $pregnant = $_POST['pregnant'];
            $malnourished = $_POST['malnourished'];
            $four_ps = $_POST['four_ps'];
            $senior_citizen = $_POST['senior_citizen'];
            $out_of_school_youth = $_POST['out_of_school_youth'];
            $lgbtq = $_POST['lgbtq'];

            $valid1 = $_POST['valid1'];
            $valid2 = $_POST['valid2'];

            // ------------------------------
            // IMAGE UPLOAD HANDLING
            // ------------------------------

            $upload_dir = "uploads/validID/";

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // --- Valid ID 1 Upload ---
            $valid_id1_path = null;
            if (!empty($_FILES['valid_id_front1']['name'])) {
                $ext1 = pathinfo($_FILES['valid_id_front1']['name'], PATHINFO_EXTENSION);
                $filename1 = uniqid("ID1_") . "." . $ext1;
                $valid_id1_path = $upload_dir . $filename1;

                move_uploaded_file($_FILES['valid_id_front1']['tmp_name'], $valid_id1_path);
            }

            $valid_id2_path = null;
            if (!empty($_FILES['valid_id_front2']['name'])) {
                $ext2 = pathinfo($_FILES['valid_id_front2']['name'], PATHINFO_EXTENSION);
                $filename2 = uniqid("ID2_") . "." . $ext2;
                $valid_id2_path = $upload_dir . $filename2;

                move_uploaded_file($_FILES['valid_id_front2']['tmp_name'], $valid_id2_path);
            }

            $connection = $this->openConn();

            try {


                // ------------------------------
                // 5. GENERATE CONTROL NUMBER
                // Format: CN-0001
                // ------------------------------
                $stmtCN = $connection->prepare("
            SELECT control_no 
            FROM tbl_resident 
            ORDER BY id_resident DESC 
            LIMIT 1
        ");
                $stmtCN->execute();
                $lastCN = $stmtCN->fetch(PDO::FETCH_ASSOC);

                if ($lastCN && !empty($lastCN['control_no'])) {
                    $number = (int) str_replace('CN-', '', $lastCN['control_no']);
                    $number++;
                } else {
                    $number = 1;
                }

                $control_no = 'CN-' . str_pad($number, 4, '0', STR_PAD_LEFT);


                // ------------------------------
                // 6. INSERT INTO DATABASE
                // ------------------------------
                $stmt = $connection->prepare("
            INSERT INTO tbl_resident (
                control_no,
                lname, fname, mi, contact, email, password, houseno, street, brgy, municipal,
                bdate, bplace, s_of_income, occupation, nationality, head_of_family, psa_holder,
                psa_correction, ntnlId, status, age, sex, 
                domesticated_animals, trees, farmer, vegetables, role, request_status,
                id1, id2,
                voter, pwd, indigent, single_parent, pregnancy, malnourished, four_ps,
                    senior_citizen, out_of_school_youth, lgbtq, valid1, valid2
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

                $stmt->execute([
                    $control_no,
                    $lname,
                    $fname,
                    $mi,
                    $contact,
                    $email,
                    $password,
                    $houseno,
                    $street,
                    $brgy,
                    $municipal,
                    $bdate,
                    $bplace,
                    $soi,
                    $occupation,
                    $nationality,
                    $hof,
                    $psa_holder,
                    $psa_correction,
                    $ntnlid_num,
                    $status,
                    $age,
                    $sex,
                    $animals_,
                    $trees_,
                    $farmer_,
                    $veges_,
                    $role,
                    $request_status,
                    $filename1,
                    $filename2,
                    $voter,

                    $pwd,
                    $indigent,
                    $single_parent,
                    $pregnant,
                    $malnourished,
                    $four_ps,
                    $senior_citizen,
                    $out_of_school_youth,
                    $lgbtq,
                    $valid1,
                    $valid2,
                ]);

                // $message = "Resident account added successfully!\\nControl Number: $control_no";
                // echo "<script type='text/javascript'>alert('$message');</script>";
                // header("Refresh:0;");
                // exit;

                /* ------------------------------
               ✅ POPUP RECEIPT WINDOW
            ------------------------------ */
                $lastId = $connection->lastInsertId();

                echo "
            <script>
                alert('Resident added successfully!\\nControl No: $control_no');
                window.open('receipt.php?id=$lastId', '_blank');
                
            </script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $connection = null;
        }
    }

    // public function create_resident()
    // {
    //     if (isset($_POST['add_resident'])) {
    //         // Retrieve form data
    //         $lname = $_POST['lname'];
    //         $fname = $_POST['fname'];
    //         $mi = $_POST['mi'];
    //         $contact = $_POST['contact'];
    //         $email = $_POST['email'];
    //         $password = md5($_POST['password']); // Hash the password
    //         $houseno = $_POST['houseno'];
    //         $street = $_POST['street'];
    //         $brgy = $_POST['brgy'];
    //         $municipal = $_POST['municipal'];
    //         $bdate = $_POST['bdate'];
    //         $bplace = $_POST['bplace'];
    //         $nationality = $_POST['nationality'];
    //         $status = $_POST['status'];
    //         $age = $_POST['age'];
    //         $sex = $_POST['sex'];
    //         $voter = $_POST['voter'];
    //         //$family_role = $_POST['family_role'];
    //         $pwd = $_POST['pwd'];
    //         $indigent = $_POST['indigent'];
    //         $single_parent = $_POST['single_parent'];
    //         $pregnant = $_POST['pregnant'];
    //         $malnourished = $_POST['malnourished'];
    //         $four_ps = $_POST['four_ps'];
    //         $role = $_POST['role'];
    //         $request_status = 'pending';

    //         // Add the new IP Community field
    //         $ip_community = $_POST['ip_community'];
    //         $out_of_school_youth = $_POST['out_of_school_youth'];
    //         $senior = $_POST['senior_citizen'];
    //         $lgbtq = $_POST['lgbtq'];
    //         $psa_holder = isset($_POST['psa']) ? $_POST['psa'] : '';
    //         $psa_correction = isset($_POST['psa_correction']) ? $_POST['psa_correction'] : '';
    //         $ntnl_id = isset($_POST['ntnlid']) ? $_POST['ntnlid'] : '';
    //         $animals = isset($_POST['d_a']) ? $_POST['d_a'] : '';
    //         $trees = isset($_POST['trees']) ? $_POST['trees'] : '';
    //         $farmer = isset($_POST['farmer']) ? $_POST['farmer'] : '';
    //         $veges = isset($_POST['veges']) ? $_POST['veges'] : '';
    //         $soi = $_POST['soi'];
    //         $occupation = $_POST['occupation'];
    //         $table = $_POST['tbl_name'];
    //         $hof = isset($_POST['hof']) ? $_POST['hof'] : '';



    //         if ($psa_correction == "Yes") {
    //             $psa_correction = $_POST['psa_c'];
    //         } else {
    //             $psa_correction = "No";
    //         }

    //         if ($ntnl_id == "Yes") {
    //             $ntnlid_num = $_POST['ntlid_'];
    //         } else {
    //             $ntnlid_num = "No";
    //         }

    //         if ($animals == "Yes") {
    //             $animals_ = $_POST['dom_a'];
    //         } else {
    //             $animals_ = "No";
    //         }

    //         if ($trees == "Yes") {
    //             $trees_ = $_POST['trees_'];
    //         } else {
    //             $trees_ = "No";
    //         }

    //         if ($farmer == "Yes") {
    //             $farmer_ = $_POST['farmer_'];
    //         } else {
    //             $farmer_ = "No";
    //         }

    //         if ($veges == "Yes") {
    //             $veges_ = $_POST['veges_'];
    //         } else {
    //             $veges_ = "No";
    //         }



    //         //echo $farmer_;
    //         //echo $ntnlid_num;
    //         // Open the database connection
    //         $connection = $this->openConn();

    //         try {
    //             $stmt = $connection->prepare("INSERT INTO tbl_resident (lname, fname, mi, contact, email, password, houseno, street, brgy, municipal, 
    //                                                                 bdate, bplace, s_of_income, occupation, nationality, head_of_family, psa_holder, psa_correction, ntnlId, status, age,
    //                                                                 sex, voter, pwd, indigent, single_parent, malnourished, four_ps, pregnancy, domesticated_animals, trees,
    //                                                                 farmer, vegetables, role, request_status, ip_community, out_of_school_youth, lgbtq, senior_citizen)
    //                                                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    //             $stmt->execute([
    //                 $lname,
    //                 $fname,
    //                 $mi,
    //                 $contact,
    //                 $email,
    //                 $password,
    //                 $houseno,
    //                 $street,
    //                 $brgy,
    //                 $municipal,
    //                 $bdate,
    //                 $bplace,
    //                 $soi,
    //                 $occupation,
    //                 $nationality,
    //                 $hof,
    //                 $psa_holder,
    //                 $psa_correction,
    //                 $ntnlid_num,
    //                 $status,
    //                 $age,
    //                 $sex,
    //                 $voter,
    //                 $pwd,
    //                 $indigent,
    //                 $single_parent,
    //                 $malnourished,
    //                 $four_ps,
    //                 $pregnant,
    //                 $animals_,
    //                 $trees_,
    //                 $farmer_,
    //                 $veges_,
    //                 $role,
    //                 $request_status,
    //                 $ip_community,
    //                 $out_of_school_youth,
    //                 $lgbtq,
    //                 $senior
    //             ]);


    //             $resident_id = $connection->lastInsertId();
    //             // echo $resident_id . '<br>';
    //             // echo $table;

    //             $q = $connection->prepare("SELECT * FROM $table");
    //             $q->execute();

    //             while ($rw = $q->fetch()) {
    //                 $qr = $connection->prepare('INSERT INTO tbl_family_member SET resident_id=' . $resident_id . ',family_lastname=\''
    //                     . $rw['family_lastname'] . '\',family_firstname=\''
    //                     . $rw['family_firstname'] . '\',family_middleinitial=\''
    //                     . $rw['family_middleinitial'] . '\',relationshipid=\''
    //                     . $rw['relationshipid'] . '\',family_age=\''
    //                     . $rw['family_age'] . '\',familycivilid=\''
    //                     . $rw['familycivilid'] . '\',occupation=\''
    //                     . $rw['occupation'] . '\',income=\''
    //                     . $rw['income'] . '\' ');
    //                 $qr->execute();
    //             }

    //             $qq = $connection->prepare("DROP TABLE $table");
    //             $qq->execute();



    //             $message = "Resident account added successfully!";
    //             echo "<script type='text/javascript'>alert('$message'); window.location.href = 'index_login.php';</script>";
    //             header("Refresh:0;");
    //             exit;
    //         } catch (PDOException $e) {
    //             // Handle any potential errors
    //             echo "Error: " . $e->getMessage();
    //         }

    //         // Close the database connection
    //         $connection = null;
    //     }
    // }

    public function create_resident()
    {
        if (isset($_POST['add_resident'])) {
            // Retrieve form data
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $houseno = $_POST['houseno'];
            $street = $_POST['street'];
            $brgy = $_POST['brgy'];
            $municipal = $_POST['municipal'];
            $bdate = $_POST['bdate'];
            $bplace = $_POST['bplace'];
            $nationality = $_POST['nationality'];
            $status = $_POST['status'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $soi = $_POST['soi'];
            $occupation = $_POST['occupation'];
            $hof = $_POST['hof'] ?? '';
            $psa_holder = $_POST['psa'] ?? '';
            $psa_correction = $_POST['psa_correction'] ?? '';
            $ntnl_id = $_POST['ntnlid'] ?? '';
            $animals = $_POST['d_a'] ?? '';
            $trees = $_POST['trees'] ?? '';
            $farmer = $_POST['farmer'] ?? '';
            $veges = $_POST['veges'] ?? '';
            $role = $_POST['role'];
            $request_status = "pending";

            // Convert dependent fields
            $psa_correction = ($psa_correction == "Yes") ? $_POST['psa_c'] : "No";
            $ntnlid_num = ($ntnl_id == "Yes") ? $_POST['ntlid_'] : "No";
            $animals_ = ($animals == "Yes") ? $_POST['dom_a'] : "No";
            $trees_ = ($trees == "Yes") ? $_POST['trees_'] : "No";
            $farmer_ = ($farmer == "Yes") ? $_POST['farmer_'] : "No";
            $veges_ = ($veges == "Yes") ? $_POST['veges_'] : "No";

            $voter = $_POST['voter'];
            $pwd = $_POST['pwd'];
            $indigent = $_POST['indigent'];
            $single_parent = $_POST['single_parent'];
            $pregnant = $_POST['pregnant'];
            $malnourished = $_POST['malnourished'];
            $four_ps = $_POST['four_ps'];
            $senior_citizen = $_POST['senior_citizen'];
            $out_of_school_youth = $_POST['out_of_school_youth'];
            $lgbtq = $_POST['lgbtq'];



            $valid1 = $_POST['valid1'];
            $valid2 = $_POST['valid2'];










            // ------------------------------
            // IMAGE UPLOAD HANDLING
            // ------------------------------

            $upload_dir = "uploads/validID/";

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // --- Valid ID 1 Upload ---
            $valid_id1_path = null;
            if (!empty($_FILES['valid_id_front1']['name'])) {
                $ext1 = pathinfo($_FILES['valid_id_front1']['name'], PATHINFO_EXTENSION);
                $filename1 = uniqid("ID1_") . "." . $ext1;
                $valid_id1_path = $upload_dir . $filename1;

                move_uploaded_file($_FILES['valid_id_front1']['tmp_name'], $valid_id1_path);
            }

            $valid_id2_path = null;
            if (!empty($_FILES['valid_id_front2']['name'])) {
                $ext2 = pathinfo($_FILES['valid_id_front2']['name'], PATHINFO_EXTENSION);
                $filename2 = uniqid("ID2_") . "." . $ext2;
                $valid_id2_path = $upload_dir . $filename2;

                move_uploaded_file($_FILES['valid_id_front2']['tmp_name'], $valid_id2_path);
            }

            $connection = $this->openConn();



            try {
                // ------------------------------
                // 5. GENERATE CONTROL NUMBER
                // Format: CN-0001
                // ------------------------------
                $stmtCN = $connection->prepare("
                SELECT control_no 
                FROM tbl_resident 
                ORDER BY id_resident DESC 
                LIMIT 1
            ");
                $stmtCN->execute();
                $lastCN = $stmtCN->fetch(PDO::FETCH_ASSOC);

                if ($lastCN && !empty($lastCN['control_no'])) {
                    $number = (int) str_replace('CN-', '', $lastCN['control_no']);
                    $number++;
                } else {
                    $number = 1;
                }

                $control_no = 'CN-' . str_pad($number, 4, '0', STR_PAD_LEFT);
                // ------------------------------
                // 6. INSERT INTO DATABASE
                // ------------------------------
                $stmt = $connection->prepare("
                INSERT INTO tbl_resident (
                    control_no,
                    lname, fname, mi, contact, email, password, houseno, street, brgy, municipal,
                    bdate, bplace, s_of_income, occupation, nationality, head_of_family, psa_holder,
                    psa_correction, ntnlId, status, age, sex, 
                    domesticated_animals, trees, farmer, vegetables, role, request_status,
                    id1, id2, voter, pwd, indigent, single_parent, pregnancy, malnourished, four_ps,
                    senior_citizen, out_of_school_youth, lgbtq, valid1, valid2
                )
                VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ");

                $stmt->execute([
                    $control_no,
                    $lname,
                    $fname,
                    $mi,
                    $contact,
                    $email,
                    $password,
                    $houseno,
                    $street,
                    $brgy,
                    $municipal,
                    $bdate,
                    $bplace,
                    $soi,
                    $occupation,
                    $nationality,
                    $hof,
                    $psa_holder,
                    $psa_correction,
                    $ntnlid_num,
                    $status,
                    $age,
                    $sex,
                    $animals_,
                    $trees_,
                    $farmer_,
                    $veges_,
                    $role,
                    $request_status,
                    $filename1,
                    $filename2,
                    $voter,

                    $pwd,
                    $indigent,
                    $single_parent,
                    $pregnant,
                    $malnourished,
                    $four_ps,
                    $senior_citizen,
                    $out_of_school_youth,
                    $lgbtq,
                    $valid1,
                    $valid2
                ]);

                // echo "<script>
                //         alert('Resident account added successfully!\\nControl Number: $control_no');
                //         window.location.href='index_login.php';
                //       </script>";
                // exit;

                /* ------------------------------
               ✅ POPUP RECEIPT WINDOW
            ------------------------------ */
                $lastId = $connection->lastInsertId();

                echo "
            <script>
                alert('Resident added successfully!\\nControl No: $control_no');
                window.open('receipt.php?id=$lastId', '_blank');
                
            </script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $connection = null;
        }
    }


    public function view_residents()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND sex='male'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_vaccinated()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND vaccinated = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_pregnant()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND pregnancy = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_minor()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = 'approved' and age <= 18");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_senior()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE age > 60");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_pwd()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND pwd = 'yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_single()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND single_parent = 'yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_4ps()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND four_ps = 'yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_indigent()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND indigent = 'yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_malnuorished()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND malnourished = 'yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_residente()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'pending'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_female()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' AND sex='Female'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }
    public function view_residented()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE role = 'resident'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }



    public function view_resident()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function update_resident()
    {
        if (isset($_POST['update_resident'])) {
            $id_resident = $_POST['resident_id'];
            $id_admin = $_POST['id_admin'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $contact = $_POST['contact'];
            //$email = $_POST['email'];
            $houseno = $_POST['houseno'];
            $street = $_POST['street'];
            $psa = $_POST['psa_holder'];
            $psa_correction = $_POST['psa_correction'];
            $ntnlId = $_POST['ntnlId'];
            $dom_a = $_POST['domesticated_animals'];
            $trees = $_POST['trees'];
            $farmer = $_POST['farmer'];
            $bdate = $_POST['bdate'];
            $bplace = $_POST['bplace'];
            $nationality = $_POST['nationality'];
            $status = $_POST['status'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $soi = $_POST['soi'];
            $occupation = $_POST['occupation'];
            $voter = $_POST['voter'];
            $pwd = $_POST['pwd'];
            $indigent = $_POST['indigent'];
            $single_parent = $_POST['single_parent'];
            $pregnancy = $_POST['pregnancy'];
            $malnourished = $_POST['malnourished'];
            $four_ps = $_POST['four_ps'];
            $senior = $_POST['senior'];
            $out_of_school_youth = $_POST['out_of_school_youth'];
            $lgbtq = $_POST['lgbtq'];
            $ip_community = $_POST['ip_community'];

            $connection = $this->openConn();

            $stmt = $connection->prepare("UPDATE `tbl_resident` SET 
                    `lname`=?, `fname`=?, `mi`=?, `age`=?, `sex`=?,
                    `status`=?, `houseno`=?, `street`=?, `contact`=?, `bdate`=?, 
                    `bplace`=?, `s_of_income`=?, `occupation`=?, `nationality`=?, `psa_holder`=?, 
                    `psa_correction`=?, `ntnlId`=?, `voter`=?, `pwd`=?, `indigent`=?, 
                    `single_parent`=?, `malnourished`=?, `four_ps`=?, `pregnancy`=?, `domesticated_animals`=?, 
                    `trees`=?, `farmer`=?, `ip_community`=?, `out_of_school_youth`=?, 
                    `lgbtq`=?, `senior_citizen`=?, `addedby`=? 
                    WHERE `id_resident` = ?");

            $ss = $stmt->execute([
                $lname,
                $fname,
                $mi,
                $age,
                $sex,
                $status,
                $houseno,
                $street,
                $contact,
                $bdate,
                $bplace,
                $soi,
                $occupation,
                $nationality,
                $psa,
                $psa_correction,
                $ntnlId,
                $voter,
                $pwd,
                $indigent,
                $single_parent,
                $malnourished,
                $four_ps,
                $pregnancy,
                $dom_a,
                $trees,
                $farmer,
                $ip_community,
                $out_of_school_youth,
                $lgbtq,
                $senior,
                $id_admin,
                $id_resident
            ]);

            if ($ss) {
                $message2 = "Resident Data Updated";
                echo "<script type='text/javascript'>alert('$message2');</script>";
                header("refresh: 0");
            } else {
                echo '<script>alert("Failed")</script>';
            }
        }
    }

    public function delete_resident()
    {
        if (isset($_POST['delete_resident'])) {
            $id = $_POST['resident_id'];

            try {
                $connection = $this->openConn();
                $stmt = $connection->prepare("DELETE FROM tbl_resident WHERE id = ?");
                $stmt->execute([$id]);

                echo "<script>alert('Resident deleted successfully!'); window.location.href='{$_SERVER['PHP_SELF']}';</script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $this->closeConn();
        }
    }

    //-------------------------------- EXTRA FUNCTIONS FOR RESIDENT CLASS ---------------------------------




    public function get_single_resident($id_resident)
    {

        $id_resident = $_GET['id_resident'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident where id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
            return $resident;
        } else {
            return false;
        }
    }

    public function get_single_admin($id_admin)
    {

        $id_admin = $_GET['id_admin'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_admin where id_admin = ?");
        $stmt->execute([$id_admin]);
        $admin = $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
            return $admin;
        } else {
            return false;
        }
    }

    public function check_resident($email)
    {

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE email = ?");
        $stmt->Execute([$email]);
        $total = $stmt->rowCount();

        return $total;
    }

    public function count_resident()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status = 'approved' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();
        return $rescount;
    }

    public function check_household($lname, $mi)
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE lname = ? AND mi = ?");
        $stmt->Execute([$lname, $mi]);
        $total = $stmt->rowCount();
        return $total;
    }

    public function view_household_list()
    {
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];

        if (isset($_POST['search_household'])) {
            $connection = $this->openConn();
            $stmt1 = $connection->prepare("SELECT * FROM `tbl_resident` WHERE `lname` LIKE '%$lname%' and  `mi` LIKE '%$mi%'");
            $stmt1->execute();
        }
    }

    public function count_male_resident()
    {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where request_status= 'approved' and  sex = 'male' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_female_resident()
    {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where request_status= 'approved' and sex = 'female'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_head_resident()
    {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where family_role = 'Yes'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_hof()
    {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where head_of_family = 'Yes'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_member_resident()
    {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where family_role = 'Family Member'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_farmers()
    {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(id_resident) from tbl_resident where farmer = 'Yes' OR 'yes'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function profile_update()
    {
        $id_resident = $_GET['id_resident'];
        $age = $_POST['age'];
        $status = $_POST['status'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];

        if (isset($_POST['profile_update'])) {

            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_resident SET  `age` = ?,  `status` = ?, 
            `address` = ?, `contact` = ? WHERE id_resident = ?");
            $stmt->execute([
                $age,
                $status,
                $address,
                $contact,
                $id_resident
            ]);

            $message2 = "Resident Profile Updated";

            echo "<script type='text/javascript'>alert('$message2');</script>";
            header("Refresh:0");
        }
    }

    public function profile_update_admin()
    {
        $id_admin = $_GET['id_admin'];
        $email = $_POST['email'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];

        if (isset($_POST['profile_update_admin'])) {
            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_admin SET `email` = ?, `lname` = ?, `fname` = ?, `mi` = ? WHERE id_admin = ?");
            $stmt->execute([$email, $lname, $fname, $mi, $id_admin]);

            $message2 = "Profile Updated";

            echo "<script type='text/javascript'>alert('$message2');</script>";
            // Redirect the user to a specific page after updating the profile
            header("Refresh:0");
            exit();
        }
    }




    //------------------------------------- RESIDENT FILTERING QUERIES --------------------------------------

    public function view_resident_minor()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = `approved` and `age` <= 17");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_adult()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE `age` >= 18 AND `age` <= 59");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_senior()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE `age` >= 60");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function count_resident_senior()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) FROM tbl_resident WHERE request_status='approved' and `age` >= 60");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }





    //-------------------------------------- EXTRA FUNCTIONS ------------------------------------------------

    public function resident_changepass()
    {
        $id_resident = $_GET['id_resident'];
        $oldpassword = ($_POST['oldpassword']);
        $oldpasswordverify = ($_POST['oldpasswordverify']);
        $newpassword = ($_POST['newpassword']);
        $checkpassword = $_POST['checkpassword'];

        if (isset($_POST['resident_changepass'])) {

            $connection = $this->openConn();
            $stmt = $connection->prepare("SELECT `password` FROM tbl_resident WHERE id_resident = ?");
            $stmt->execute([$id_resident]);
            $result = $stmt->fetch();

            if ($result == 0) {

                echo "Old Password is Incorrect";
            } elseif ($oldpassword != $oldpasswordverify) {
                echo "Old Password is Incorrect";
            } elseif ($newpassword != $checkpassword) {
                echo "New Password and Verification Password does not Match";
            } else {
                $connection = $this->openConn();
                $stmt = $connection->prepare("UPDATE tbl_resident SET password =? WHERE id_resident = ?");
                $stmt->execute([$newpassword, $id_resident]);

                $message2 = "Password Updated";
                echo "<script type='text/javascript'>alert('$message2');</script>";
                header("refresh: 0");
            }
        }
    }


    public function admin_changepass()
    {
        $id_admin = $_GET['id_admin'];
        if (isset($_POST['oldpassword'], $_POST['oldpasswordverify'], $_POST['newpassword'], $_POST['confirm_password'])) {
            $oldpassword = $_POST['oldpassword'];
            $oldpasswordverify = $_POST['oldpasswordverify'];
            $newpassword = $_POST['newpassword'];
            $checkpassword = $_POST['confirm_password'];

            $connection = $this->openConn();
            $stmt = $connection->prepare("SELECT `password` FROM tbl_admin WHERE id_admin = ?");
            $stmt->execute([$id_admin]);
            $result = $stmt->fetch();

            $hashed_old_password = md5($oldpassword);

            if ($hashed_old_password !== $result['password']) {
                echo "Old Password is Incorrect";
            } elseif ($oldpassword != $oldpasswordverify) {
                echo "Old Password is Incorrect";
            } elseif ($newpassword != $checkpassword) {
                echo "New Password and Verification Password does not Match";
            } else {
                // Hash the new password using MD5
                $hashed_password = md5($newpassword);

                // Update the password in the database
                $stmt = $connection->prepare("UPDATE tbl_admin SET password = ? WHERE email = ?");
                $stmt->execute([$hashed_password, $id_admin]);

                $message2 = "Password Updated";
                echo "<script type='text/javascript'>alert('$message2');</script>";
            }
        } else {
            echo "All password fields are required";
        }
    }






    //========================================== SCOPE CHANGED FUNCTIONS ===========================================

    public function view_resident_household()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `family_role` = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_voters()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' and `voter` = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_hof()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE head_of_family = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }


    public function view_resident_nonvoters()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' and `voter` = 'No'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_male()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' and `sex` = 'Male'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_female()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE request_status = 'approved' and `sex` = 'Female'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function count_voters()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where request_status = 'approved' and `voter` = 'Yes' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_nonvoters()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where request_status = 'approved' and `voter` = 'No' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    //update

    public function count_psa_holder()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(id_resident) from tbl_resident where request_status = 'approved' and `psa_holder` = 'Yes' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_psa_correction()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(id_resident) from tbl_resident where request_status = 'approved' and `psa_correction` = 'Yes' OR psa_correction != 'No' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_nationalid_holder()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(id_resident) from tbl_resident where request_status = 'approved' and `ntnlId` = 'Yes' OR `ntnlId` != 'No' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_number_farmers()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(id_resident) from tbl_resident where request_status = 'approved' and `farmer` = 'Yes' OR `farmer` != 'No' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_animal_lover()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(id_resident) from tbl_resident where request_status = 'approved' and `domesticated_animals` = 'Yes' OR `domesticated_animals` != 'No' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }


    public function view_psa_holder()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = 'approved' AND psa_holder = 'Yes' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function view_psa_holder_correction()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = 'approved' AND psa_correction = 'Yes' OR psa_correction != 'No' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function view_natioanlId_holder()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = 'approved' AND ntnlId = 'Yes' OR ntnlId != 'No' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function view_farmer()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = 'approved' AND farmer = 'Yes' OR farmer != 'No' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function view_animal_lover()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status = 'approved' AND domesticated_animals = 'Yes' OR domesticated_animals != 'No' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }
    //end update

    //========================= SEARCH =====================================
    public function search_admn_voter()
    {

        $search = $_GET['search'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `fname` = '$search'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function search_official()
    {

        $search = $_POST['search'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_officials WHERE `fname` = '$search'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    //--------------------------------REQUEST--//
    public function get_pending_requests()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM approval WHERE status = 'pending'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Function to approve a pending request
    public function approve_request()
    {
        if (isset($_POST['approve_request'])) {
            // Retrieve the resident ID from the form submission
            $id_resident = $_POST['id_resident'];
            // Open the database connection
            $connection = $this->openConn();

            // Prepare and execute the SQL query to update the request status
            $stmt = $connection->prepare("UPDATE tbl_resident SET request_status = 'approved' WHERE id_resident = ?");
            $stmt->execute([$id_resident]);


            $message = "Request status updated successfully.";


            // Close the database connection
            $connection = null;

            // Display the message using JavaScript
            echo "<script type='text/javascript'>alert('$message');</script>";

            header("Refresh:0");
        }
    }



    // Function to reject a pending request
    public function reject_request()
    {

        if (isset($_POST['reject_request'])) {
            $id_resident = $_POST['id_resident'];
            $connection = $this->openConn();
            $stmt = $connection->prepare("DELETE FROM tbl_resident where id_resident = ?");
            $stmt->execute([$id_resident]);

            $message2 = "Resident Request Rejected";

            echo "<script type='text/javascript'>alert('$message2');</script>";
            header("Refresh:0");
        }
        // Optionally, you can perform additional actions here, such as notifying the user of the rejection.
    }

    public function count_request()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from approval WHERE apstatus = 'pending' ");
        $stmt->execute();
        $reqscount = $stmt->fetchColumn();
        return $reqscount;
    }

    // Function to view requests with user information
    // Function to view requests with user information
    public function view_request()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE request_status='pending'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function delete_approval()
    {
        $id_announcement = $_POST['id_approval'];

        if (isset($_POST['delete_announcement'])) {
            $connection = $this->openConn();
            $stmt = $connection->prepare("DELETE FROM approval where id_approval = ?");
            $stmt->execute([$id_approval]);

            header("Refresh:0");
        }
    }

    public function count_approval()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status='pending'");
        $stmt->execute();
        $reqscount = $stmt->fetchColumn();
        return $reqscount;
    }

    public function get_single_request($id_resident)
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE id_resident = ? AND request_status = 'pending'");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
            return $resident;
        } else {
            return false;
        }
    }



    //======================= COUNTS ==============================

    public function count_minor()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status='approved' and age <= 17 ");
        $stmt->execute();
        $minorcount = $stmt->fetchColumn();
        return $minorcount;
    }

    public function count_pwd()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status= 'approved' and pwd = 'yes' ");
        $stmt->execute();
        $pwdcount = $stmt->fetchColumn();
        return $pwdcount;
    }

    public function count_single_parent()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status= 'approved' and single_parent = 'yes' ");
        $stmt->execute();
        $spcount = $stmt->fetchColumn();
        return $spcount;
    }

    public function count_fourps()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status= 'approved' and four_ps = 'yes' ");
        $stmt->execute();
        $fourpscount = $stmt->fetchColumn();
        return $fourpscount;
    }

    public function count_indigent()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status='approved' and indigent = 'yes' ");
        $stmt->execute();
        $indigentcount = $stmt->fetchColumn();
        return $indigentcount;
    }

    public function count_malnourished()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE request_status='approved' and malnourished = 'yes' ");
        $stmt->execute();
        $malcount = $stmt->fetchColumn();
        return $malcount;
    }

    public function count_vaccinated()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE vaccinated = 'yes' ");
        $stmt->execute();
        $vacxcount = $stmt->fetchColumn();
        return $vacxcount;
    }

    public function count_pregnancy()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident WHERE pregnancy = 'yes' ");
        $stmt->execute();
        $pregnancycount = $stmt->fetchColumn();
        return $pregnancycount;
    }
    public function count_residency()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_rescert");
        $stmt->execute();
        $residencycount = $stmt->fetchColumn();

        $color = ($residencycount > 0) ? "crimson" : "black";

        return array(
            "count" => $residencycount,
            "color" => $color
        );
    }

    public function count_bspermit()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_bspermit");
        $stmt->execute();
        $bspermitcount = $stmt->fetchColumn();

        $color = ($bspermitcount > 0) ? "crimson" : "black";

        return array(
            "count" => $bspermitcount,
            "color" => $color
        );
    }

    public function count_blotter()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_blotter");
        $stmt->execute();
        $blottercount = $stmt->fetchColumn();

        $color = ($blottercount > 0) ? "crimson" : "black";

        return array(
            "count" => $blottercount,
            "color" => $color
        );
    }

    public function count_clearance()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_clearance");
        $stmt->execute();
        $clearancecount = $stmt->fetchColumn();

        $color = ($clearancecount > 0) ? "crimson" : "black";

        return array(
            "count" => $clearancecount,
            "color" => $color
        );
    }

    public function count_indigency()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_indigency");
        $stmt->execute();
        $indigencycount = $stmt->fetchColumn();

        $color = ($indigencycount > 0) ? "crimson" : "black";

        return array(
            "count" => $indigencycount,
            "color" => $color
        );
    }
    // Inside resident.class.php

    public function view_male_resident()
    {
        $sql = "SELECT * FROM tbl_resident WHERE sex = 'Male'";
        $result = $this->db->query($sql);
        $rows = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }


    public function view_logs()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT activity_log.*, tbl_admin.lname as admin_lname
                                  FROM activity_log
                                  JOIN tbl_admin ON activity_log.id_resident = tbl_admin.id_admin
                                  WHERE activity_log.id_resident IS NOT NULL");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function update_system_info()
    {
        // Fetch the values from $_POST
        $name = $_POST['name'];
        $acronym = $_POST['acronym'];
        $poweredBy = $_POST['poweredBy'];

        if (isset($_POST['update_system_info'])) {
            // Prepare the SQL query with placeholders
            $sql = "UPDATE system_info SET `name` = ?, `acronym` = ?, `poweredBy` = ? WHERE id_system = 1";

            // Open database connection
            $connection = $this->openConn();

            // Prepare the statement
            $stmt = $connection->prepare($sql);

            // Bind parameters and execute the statement
            $stmt->execute([$name, $acronym, $poweredBy]);

            // Check if update was successful
            if ($stmt->rowCount() > 0) {
                $message2 = "System Information Updated";
            } else {
                $message2 = "No changes were made to system information";
            }

            // Display message
            echo "<script type='text/javascript'>alert('$message2');</script>";

            // Redirect to a new page after update
            header("Location: chairman_modal.php?id_system=1");
            exit(); // Terminate script execution after redirection
        }
    }




    public function view_system()
    {

        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT * from system_info");
        $stmt->execute();
        $view = $stmt->fetchAll();

        //$rows = $stmt->
        return $view;
    }


    public function get_single_system($id_system)
    {
        // Remove the following line, as $id_system is already passed as a parameter
        // $id_system = $_GET['id_system'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM system_info WHERE id_system = ?");
        $stmt->execute([$id_system]); // Remove $id_system from here
        $system = $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
            return $system;
        } else {
            return false;
        }
    }


    public function create_system()
    {

        if (isset($_POST['add_system'])) {
            $name = $_POST['name'];
            $acronym = ($_POST['acronym']);
            $poweredBy = $_POST['poweredBy'];

            $connection = $this->openConn();
            $stmt = $connection->prepare("INSERT INTO system_info (`name`,`acronym`,`poweredBy`) VALUES (?, ?, ?)");

            $stmt->Execute([$name, $acronym, $poweredBy]);
            $message2 = "New System Information Adedd";

            echo "<script type='text/javascript'>alert('$message2');</script>";
            header('refresh:0');
        }
    }

    public function update_blotter()
    {
        if (isset($_POST['update_blotter'])) {
            $id_blotter = $_POST['id_blotter'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
            $mi = $_POST['mi'];
            $contact = $_POST['contact'];
            $houseno = $_POST['houseno'];
            $street = $_POST['street'];
            $brgy = $_POST['brgy'];
            $municipal = $_POST['municipal'];
            $narrative = $_POST['narrative'];

            // Open database connection
            $connection = $this->openConn();

            // Prepare and execute the update query
            $stmt = $connection->prepare("UPDATE tbl_blotter SET lname = ?, fname = ?, mi = ?, contact = ?, houseno = ?, street = ?, brgy = ?, municipal = ?, narrative = ?, timeapplied = NOW() WHERE id_blotter = ?");
            $stmt->execute([$lname, $fname, $mi, $contact, $houseno, $street, $brgy, $municipal, $narrative, $id_blotter]);

            // Check if the update was successful
            if ($stmt->rowCount() > 0) {
                $message2 = "Complain/Blotter Data Updated";
            } else {
                $message2 = "Error updating data";
            }

            // Redirect to the form page after update
            header("Location: update_blotter_form.php?id_blotter=$id_blotter");
            exit(); // Terminate script execution after redirection
        }
    }



    public function get_single_blotter($id_blotter)
    {

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_blotter where id_blotter = ?");
        $stmt->execute([$id_blotter]);
        $resident = $stmt->fetch();
        $total = $stmt->rowCount();

        if ($total > 0) {
            return $resident;
        } else {
            return false;
        }
    }

    public function count_out_of_school_youth()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM tbl_resident WHERE out_of_school_youth = 'Yes'");
        $stmt->execute();
        $result = $stmt->fetch();
        $this->closeConn();
        return $result['count'];
    }

    public function count_lgbtq()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) as count FROM tbl_resident WHERE lgbtq = 'Yes'");
        $stmt->execute();
        $result = $stmt->fetch();
        $this->closeConn();
        return $result['count'];
    }

    public function count_ip_community()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT ip_community, COUNT(*) as count FROM tbl_resident WHERE ip_community IS NOT NULL AND ip_community != 'N/A' GROUP BY ip_community");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $this->closeConn();
        return $result;
    }

    public function view_resident_osy()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE out_of_school_youth = 'Yes' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function view_resident_lgbtq()
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE lgbtq = 'Yes' ORDER BY lname ASC");
        $stmt->execute();
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function view_resident_ip($community)
    {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE ip_community = ? ORDER BY lname ASC");
        $stmt->execute([$community]);
        $view = $stmt->fetchAll();
        $this->closeConn();
        return $view;
    }

    public function update_resident_status()
    {
        if (isset($_POST['update_resident'])) {
            $id = $_POST['resident_id'];
            $out_of_school_youth = $_POST['out_of_school_youth'];
            $lgbtq = $_POST['lgbtq'];
            $ip_community = $_POST['ip_community'];

            try {
                $connection = $this->openConn();
                $stmt = $connection->prepare("UPDATE tbl_resident SET 
                    out_of_school_youth = ?,
                    lgbtq = ?,
                    ip_community = ?
                    WHERE id = ?");

                $stmt->execute([$out_of_school_youth, $lgbtq, $ip_community, $id]);

                echo "<script>alert('Resident information updated successfully!'); window.location.href='{$_SERVER['HTTP_REFERER']}';</script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $this->closeConn();
        }
    }

    public function randomStr($length = 5)
    {
        //$characters = '2345679ACDEFGHJKLMNPQRSTUVWXYZ';
        $characters = '0123456789ABCDE';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}


$residentbmis = new ResidentClass();
