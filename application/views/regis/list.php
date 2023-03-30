<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration International Conference Poltekkes Jakarta III</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
    <!-- SWEETALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="hold-transition register-page">
    <script type="text/javascript">
        function Kep() {
            var Kepesertaan1 = document.getElementById("kepesertaan");
            var dvPekerjaan = document.getElementById("pekerjaan");
            pekerjaan.style.display = Kepesertaan.value == "Other" ? "flex" : "none";
        }

        function Jur() {
            var Jurusan1 = document.getElementById("jurusan");
            var jur_lain = document.getElementById("jurusan_lain");
            jurusan_lain.style.display = Jurusan.value == "Other" ? "flex" : "none";
        }
    </script>
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo base_url('/') ?>" class="h1"><b>Registration</b></a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Registration International Conference 4th Poltekkes Jakarta III</p>

                <?php
                // Notifikasi error
                echo validation_errors('<p class="alert alert-warning">', '</p>');

                // Form open
                echo form_open_multipart(base_url('regis/tambah'));
                ?>
                <!-- Input Hide -->
                <input type="text" class="form-control" name="status" value="Process" hidden>
                <input type="text" class="form-control" name="presensi" value="Belum" hidden>
                <!-- /Input Hide -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" name="nama_lengkap" autofocus required>
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Mobile Phone" name="handphone" required>
                </div>

                <div class="input-group mb-3">
                    <select name="kepesertaan" id="Kepesertaan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style=" width: 100%;" onchange="Kep()" required>
                        <option value="">-Institution-</option>
                        <option value="Poltekkes Jakarta III">Poltekkes Jakarta III</option>
                        <option value="Other">Non Poltekkes Jakarta III</option>
                    </select>
                </div>

                <div class="input-group mb-3" id="pekerjaan" style="display: none">
                    <input type="text" class="form-control" placeholder="Entry Your Institution" name="pekerjaan">
                </div>

                <div class="input-group mb-3">
                    <select name="jurusan" id="Jurusan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style=" width: 100%;" onchange="Jur()" required>
                        <option value="">-Major-</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Midwife">Midwife</option>
                        <option value="Medical Laboratory Technician">Medical Laboratory Technician</option>
                        <option value="Physiotherapy">Physiotherapy</option>
                        <option value="Other">Other Majors</option>
                    </select>
                </div>
                <div class="input-group mb-3" id="jurusan_lain" style="display: none">
                    <input type="text" class="form-control" placeholder="Entry If Other Major" name="jurusan_lain">
                </div>

                <div class="input-group mb-3">
                    <select name="jenis_peserta" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style=" width: 100%;" required>
                        <option value="">-Participants-</option>
                        <option value="Participants">Seminar Participants</option>
                        <option value="Seminars and Oral">Participants Seminars and Oral Presentations</option>
                        <option value="Seminars and Poster">Participants Seminars and Poster Presentations</option>
                    </select>
                </div>

                <div class=" input-group mb-3">
                    <select name="negara" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style=" width: 100%;" required>
                        <option value="">-Select Country-</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Aland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire, Sint Eustatius and Saba">Caribbean Netherlands</option>
                        <option value="Bosnia and Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo - Brazzaville</option>
                        <option value="Congo, Democratic Republic of the Congo">Congo - Kinshasa</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'Ivoire">Côte d’Ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curacao">Curaçao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czechia</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Islas Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard & McDonald Islands</option>
                        <option value="Holy See (Vatican City State)">Vatican City</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">North Korea</option>
                        <option value="Korea, Republic of">South Korea</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, the Former Yugoslav Republic of">North Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia</option>
                        <option value="Moldova, Republic of">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar (Burma)</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Curaçao</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn Islands</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Réunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Barthelemy">St. Barthélemy</option>
                        <option value="Saint Helena">St. Helena</option>
                        <option value="Saint Kitts and Nevis">St. Kitts & Nevis</option>
                        <option value="Saint Lucia">St. Lucia</option>
                        <option value="Saint Martin">St. Martin</option>
                        <option value="Saint Pierre and Miquelon">St. Pierre & Miquelon</option>
                        <option value="Saint Vincent and the Grenadines">St. Vincent & Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">São Tomé & Príncipe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Serbia and Montenegro">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Sint Maarten">Sint Maarten</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and the South Sandwich Islands">South Georgia & South Sandwich Islands</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard & Jan Mayen</option>
                        <option value="Swaziland">Eswatini</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syria</option>
                        <option value="Taiwan, Province of China">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-Leste">Timor-Leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks & Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Vietnam</option>
                        <option value="Virgin Islands, British">British Virgin Islands</option>
                        <option value="Virgin Islands, U.s.">U.S. Virgin Islands</option>
                        <option value="Wallis and Futuna">Wallis & Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>

                <div class="input-group">
                    <label><small> Proof of Payment :</small></label>
                </div>
                <div class="input-group mb-3">

                    <input type="file" class="form-control" name="bukti" required>
                </div>

                <div class="row">
                    <div class="col-8">
                        <p class="mb-0">
                            <a href="<?php echo base_url('guide'); ?>" class="text-center">Registration Guide</a>
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
                <?php
                // Form close
                echo form_close();
                ?>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </div>
    <!-- /.register-box -->
    <!-- SWEETALERT -->

    <?php if ($this->session->flashdata('sukses')) { ?>
        <script>
            swal("Berhasil", "<?php echo $this->session->flashdata('sukses'); ?>", "success")
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('warning')) { ?>
        <script>
            swal("Oops...", "<?php echo $this->session->flashdata('warning'); ?>", "warning")
        </script>
    <?php } ?>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
</body>

</html>