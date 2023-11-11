<!doctype html>
<html lang="en">
<head>
	<title>Add or Remove Input Fields Dynamically</title>
	<link rel="stylesheet"
		href=
"//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet"
		href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	<style>
		body {
			display: flex;
			flex-direction: column;
			margin-top: 1%;
			justify-content: center;
			align-items: center;
		}

		#rowAdder {
			margin-left: 17px;
		}
	</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
	<h2 style="color:Black">Dynamic Image Field <span><a href="<?= base_url('/slider') ?>">slider</a></span></h2>
	
	<div style="width:40%;">
		<form id="uploadForm" action="" method="post">
			<div class="">
				<div class="col-lg-12">
                
					
                    <div class="row">
                        <div class="col-lg-4">
                            <button id="rowAdder" type="button" class="btn btn-dark">
                                <span class="bi bi-plus-square-dotted">
                                </span> ADD
                            </button>
                        </div>
                        <div class="col-lg-4">
                            <input type="hidden" id="url" value="<?php echo base_url('upload-image'); ?>">
                            <input type="submit" value="Submit" id="btn-file-submit" class="btn btn-success"/>
                            <span id="validation-message-info"
                            class="validation-message"></span>
                        </div>
                        <div class="col-lg-4 d-none">
                        <div id="loader-icon">
                            <img src="loader.gif"  alt="loading....."/>
                        </div>
                        </div>
                    </div>
                    
					<div id="row">
						<div class="input-group m-3">
							<div class="input-group-prepend">
								<button class="btn btn-danger"
										id="DeleteRow"
										type="button">
									<i class="bi bi-trash"></i>
									Delete
								</button>
							</div>
							<input type="file" name="file[]" class="form-control m-input" accept=".jpg, .jpeg, .png, .gif">
						</div>
					</div>
					<div id="newinput"></div>

					
				</div>
			</div>
		</form>
        <h3>Image Preview</h3>
        <div id="gallery">No Images in Gallery</div>
	</div>
	<script type="text/javascript">
		$("#rowAdder").click(function () {
			newRowAdd =
				'<div id="row"> <div class="input-group m-3">' +
				'<div class="input-group-prepend">' +
				'<button class="btn btn-danger" id="DeleteRow" type="button">' +
				'<i class="bi bi-trash"></i> Delete</button> </div>' +
				'<input type="file" name="file[]" class="form-control m-input" accept=".jpg, .jpeg, .png, .gif"> </div> </div>';

			$('#newinput').append(newRowAdd);
		});
		$("body").on("click", "#DeleteRow", function () {
			$(this).parents("#row").remove();
		})
// file actions
        $(document).ready(function() {
          $("#uploadForm").on('submit',function(event) {
		    event.preventDefault();
            var valid = false;
            $("input[type='file']").each(function() {
			if ($(this).val() != '') {
				valid = true;
			}
            
		    });
            $("#validation-message-info").html("");
            if (valid) {
                $("#loader-icon").show();
			    //$("#btn-file-submit").hide();
                var formData = new FormData($("#uploadForm")[0])
                $.ajax({
                    url: $('#url').val(),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
				    processData: false,
                    success: function(data) {
					if (data) {
						$("#gallery").html(data);
						$("#loader-icon").hide();
						$("#validation-message-info").remove();
						//$("#btn-file-submit").hide();
						
					}
				}
                });
            }else {
			$("#validation-message-info").html("Please choose atleast one file.");
		}
        });

        });
	</script>
</body>
</html>
