<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">DESKRIPSI VIGENERE CIPHER</h1>
	
</div>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-3">
  			  <div class="card-body p-0">
      				<div class="row">
      				  <div class="col-lg-12">
      				    <div class="p-5">
      				      <div>
								<h1 class="h1 text-gray-900 mb-4 text-center">Form Input</h1>       
                                <!--form input text dan key -->
								<form class="user" method="POST"> 
							        <div class="form-group">
								        <input id="username" type="text" name="input_text" class="form-control form-control-user" placeholder="Masukkan text" required>
							        </div>
							        <div class="form-group">
								        <input id="username" type="text" name="input_key" class="form-control form-control-user" placeholder="key caesar" required>
							        </div>
								        <input type="submit" name="deskripsi_vigere" value="Deskripsi" class="btn btn-success btn-user">
							        <hr>
						        </form>

							  	<h1 class="h6 text-gray-900 mb-4 fw-blod">Output Vigenere Cipher: </h1> 
								<!-- output hasil enkripsi dan deskripsi -->
                                <div class="my-2">
                                    <?php

                                    $output_vigere ="";

                                    // membuat fungsi dekripsi
                                    function deskripsi($key, $text) {
                                    	$key = strtolower($key);
                                    
                                    	// inisialisasi variable
                                    	$ki = 0;
                                    	$kl = strlen($key);
                                    	$length = strlen($text);
                                    
                                    	// lakukan perulangan untuk setiap abjad
                                    	for ($i = 0; $i < $length; $i++)
                                    	{
                                    		// jika text merupakan alphabet
                                    		if (ctype_alpha($text[$i]))
                                    		{
                                    			// jika text merupakan huruf kapital (semua)
                                    			if (ctype_upper($text[$i])) {
                                    				$x = (ord($text[$i]) - ord("A")) - (ord($key[$ki]) - ord("a"));
                                                
                                    				if ($x < 0){
                                    					$x += 26;
                                    				}
                                                
                                    				$x = $x + ord("A");
                                                
                                    				$text[$i] = chr($x);
                                    			}
                                            
                                    			// jika text merupakan huruf kecil (semua)
                                    			else
                                    			{
                                    				$x = (ord($text[$i]) - ord("a")) - (ord($key[$ki]) - ord("a"));
                                                
                                    				if ($x < 0) {
                                    					$x += 26;
                                    				}
                                                
                                    				$x = $x + ord("a");
                                                
                                    				$text[$i] = chr($x);
                                    			}
                                            
                                    			// update the index of key
                                    			$ki++;
                                    			if ($ki >= $kl) {
                                    				$ki = 0;
                                    			}
                                    		}
                                    	}
                                    
                                    	// mengembalikan nilai text
                                    	return $text;
                                    }

                                    if(isset($_POST['enkripsi_vigere'])){ //cek enkripsi
                                        $text = $_POST['input_text'];; //deklarasi text inputan
                                        $kunci = $_POST['input_key']; //deklarasi number key
	
	                                    // cek password
	                                    if (empty($kunci)){
	                                    	$error = "Masukkan Password";
	                                    	$valid = false;
	                                    }
                                    
	                                    // cek password tidak boleh angka
	                                    else if (isset($_POST['key']))
	                                    {
	                                    	if (!ctype_alpha($_POST['key']))
	                                    	{
	                                    		$error = "Password harus text!";
	                                    		$valid = false;
	                                    	}
	                                    }

                                        $output_vigere = enkripsi($kunci, $text);

                                        //pemanggilan variable untuk ditampilkan di output
                                        echo "	
                                                <p> Text yang dienkripsi : <strong>"."$text"."</strong></p>
                                                <p> Key : <strong>"."$kunci"."</strong></p>
                                                <p> Hasil : </p>
                                        ";
                                    }
                                    if(isset($_POST['deskripsi_vigere'])){ //cek deskripsi
                                        $text = $_POST['input_text'];; //deklarasi text inputan
                                        $kunci = $_POST['input_key']; //deklarasi number key
	
	                                    // cek password
	                                    if (empty($kunci)){
	                                    	$error = "Masukkan Password";
	                                    	$valid = false;
	                                    }
                                    
	                                    // cek password tidak boleh angka
	                                    else if (isset($_POST['key']))
	                                    {
	                                    	if (!ctype_alpha($_POST['key']))
	                                    	{
	                                    		$error = "Password harus text!";
	                                    		$valid = false;
	                                    	}
	                                    }

                                        $output_vigere = deskripsi($kunci, $text);

                                        //pemanggilan variable untuk ditampilkan di output
                                        echo "	
                                                <p> Text yang dienkripsi : <strong>"."$text"."</strong></p>
                                                <p> Key : <strong>"."$kunci"."</strong></p>
                                                <p> Hasil : "."$output_vigere"."</p>
                                        ";
                                    
                                    }


                                    ?>

                                </div> 

            			  </div>
      				    </div>
         			  </div>
        			</div>
             </div>
            </div>
  
		</div>
	</div>
</div>  