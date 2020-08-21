<?php 

//index.php
    include('source/session.php');
    include ('source/security.php');
    include('productfilter/database_connection.php');
    include ('include/header.php');
    include ('include/navbar.php');
    
?>

<!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br />

            <div class="col-md-3">                				
				<div class="list-group">
					<h3 class="mb-2">Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p class="mb-2" id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3 class="my-2">Division</h3>
                    <div >
					<?php

                    $query = "SELECT DISTINCT(divisions_name) FROM divisions";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector division" value="<?php echo $row['divisions_name']; ?>"> <?php echo $row['divisions_name']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>
				
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var division = get_filter('division');
        $.ajax({
            url:"productfilter/fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, division:division},
            success:function(data){
                $('.filter_data').html(data);
            }
        });

    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

<?php 
    include ('include/footer.php');
?>